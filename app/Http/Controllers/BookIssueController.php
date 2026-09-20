<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use App\Models\Book;
use App\Models\student;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    // INDEX
    public function index()
    {
        $bookIssues = BookIssue::with([
            'book',
            'student.user'
        ])
        ->latest()
        ->get();

        return view(
            'admin.book_issues.index',
            compact('bookIssues')
        );
    }


    // CREATE
    public function create()
    {
        // All books
        $books = Book::latest()->get();

        // All students
        $students = student::with('user')
            ->latest()
            ->get();

        return view(
            'admin.book_issues.create',
            compact(
                'books',
                'students'
            )
        );
    }


    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([

            'book_id' => [
                'required',
                'exists:books,id'
            ],

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'issue_date' => [
                'required',
                'date'
            ],

            'return_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date'
            ],

            'status' => [
                'required',
                'in:Issued,Returned'
            ],

            'remarks' => [
                'nullable',
                'string'
            ],
        ]);


        $book = Book::findOrFail(
            $validated['book_id']
        );


        // Book issue hone par quantity 1 kam
        if ($validated['status'] === 'Issued') {

            if ($book->available_quantity <= 0) {

                return back()
                    ->withErrors([
                        'book_id' =>
                            'This book is not available.'
                    ])
                    ->withInput();
            }

            $book->decrement(
                'available_quantity'
            );
        }


        BookIssue::create($validated);


        return redirect()
            ->route('admin.book-issues.index')
            ->with(
                'success',
                'Book issued successfully.'
            );
    }


    // EDIT
    public function edit(BookIssue $bookIssue)
    {
        $books = Book::latest()->get();

        $students = student::with('user')
            ->latest()
            ->get();

        return view(
            'admin.book_issues.edit',
            compact(
                'bookIssue',
                'books',
                'students'
            )
        );
    }


    // UPDATE
    public function update(
        Request $request,
        BookIssue $bookIssue
    ) {

        $validated = $request->validate([

            'book_id' => [
                'required',
                'exists:books,id'
            ],

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'issue_date' => [
                'required',
                'date'
            ],

            'return_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date'
            ],

            'status' => [
                'required',
                'in:Issued,Returned'
            ],

            'remarks' => [
                'nullable',
                'string'
            ],
        ]);


        // Issued → Returned
        if (
            $bookIssue->status === 'Issued' &&
            $validated['status'] === 'Returned'
        ) {

            $book = Book::find(
                $bookIssue->book_id
            );

            if ($book) {

                $book->increment(
                    'available_quantity'
                );
            }
        }


        // Returned → Issued
        if (
            $bookIssue->status === 'Returned' &&
            $validated['status'] === 'Issued'
        ) {

            $book = Book::findOrFail(
                $validated['book_id']
            );

            if ($book->available_quantity <= 0) {

                return back()
                    ->withErrors([
                        'book_id' =>
                            'This book is not available.'
                    ])
                    ->withInput();
            }

            $book->decrement(
                'available_quantity'
            );
        }


        $bookIssue->update(
            $validated
        );


        return redirect()
            ->route('admin.book-issues.index')
            ->with(
                'success',
                'Book issue updated successfully.'
            );
    }


    // DELETE
    public function destroy(BookIssue $bookIssue)
    {
        // Delete issued record → quantity वापस बढ़ेगी
        if ($bookIssue->status === 'Issued') {

            $book = Book::find(
                $bookIssue->book_id
            );

            if ($book) {

                $book->increment(
                    'available_quantity'
                );
            }
        }


        $bookIssue->delete();


        return redirect()
            ->route('admin.book-issues.index')
            ->with(
                'success',
                'Book issue deleted successfully.'
            );
    }
}
