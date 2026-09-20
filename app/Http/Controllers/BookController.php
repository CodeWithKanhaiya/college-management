<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // INDEX
    public function index()
    {
        $books = Book::latest()->get();

        return view(
            'admin.books.index',
            compact('books')
        );
    }


    // CREATE
    public function create()
    {
        return view('admin.books.create');
    }


    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'author' => [
                'required',
                'string',
                'max:255'
            ],

            'isbn' => [
                'required',
                'string',
                'max:255',
                'unique:books,isbn'
            ],

            'category' => [
                'required',
                'string',
                'max:255'
            ],

            'publisher' => [
                'nullable',
                'string',
                'max:255'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:0'
            ],

            'available_quantity' => [
                'required',
                'integer',
                'min:0',
                'lte:quantity'
            ],

            'shelf_no' => [
                'nullable',
                'string',
                'max:50'
            ],

            'status' => [
                'required',
                'in:Active,Inactive'
            ],
        ]);


        Book::create($validated);


        return redirect()
            ->route('admin.books.index')
            ->with(
                'success',
                'Book created successfully.'
            );
    }


    // SHOW
    public function show(Book $book)
    {
        return view(
            'admin.books.show',
            compact('book')
        );
    }


    // EDIT
    public function edit(Book $book)
    {
        return view(
            'admin.books.edit',
            compact('book')
        );
    }


    // UPDATE
    public function update(
        Request $request,
        Book $book
    ) {

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'author' => [
                'required',
                'string',
                'max:255'
            ],

            'isbn' => [
                'required',
                'string',
                'max:255',
                'unique:books,isbn,' . $book->id
            ],

            'category' => [
                'required',
                'string',
                'max:255'
            ],

            'publisher' => [
                'nullable',
                'string',
                'max:255'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:0'
            ],

            'available_quantity' => [
                'required',
                'integer',
                'min:0'
            ],

            'shelf_no' => [
                'nullable',
                'string',
                'max:50'
            ],

            'status' => [
                'required',
                'in:Active,Inactive'
            ],
        ]);


        $book->update($validated);


        return redirect()
            ->route('admin.books.index')
            ->with(
                'success',
                'Book updated successfully.'
            );
    }


    // DELETE
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('admin.books.index')
            ->with(
                'success',
                'Book deleted successfully.'
            );
    }
}
