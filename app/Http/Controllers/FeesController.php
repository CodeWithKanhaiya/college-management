<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $fees = Fees::with([
            'student.user',
            'course'
        ])
        ->latest()
        ->get();

        return view(
            'admin.fees.index',
            compact('fees')
        );
    }


    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $courses = Course::latest()->get();

        return view(
            'admin.fees.create',
            compact('students', 'courses')
        );
    }


    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'course_id' => [
                'required',
                'exists:courses,id'
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'paid_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'status' => [
                'required',
                'in:paid,partial,pending'
            ],

            'due_date' => [
                'required',
                'date'
            ],
        ]);


        // Paid amount validation
        if (
            $validated['paid_amount']
            > $validated['total_amount']
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'paid_amount' =>
                    'Paid amount cannot be greater than total amount.'
                ]);
        }


        // Calculate due amount
        $validated['due_amount'] =
            $validated['total_amount']
            - $validated['paid_amount'];


        // Save
        Fees::create($validated);


        return redirect()
            ->route('admin.fees.index')
            ->with(
                'success',
                'Fee added successfully.'
            );
    }


    // =========================
    // EDIT
    // =========================
    public function edit(Fees $fee)
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $courses = Course::latest()->get();

        return view(
            'admin.fees.edit',
            compact(
                'fee',
                'students',
                'courses'
            )
        );
    }


    // =========================
    // UPDATE
    // =========================
    public function update(
        Request $request,
        Fees $fee
    ) {

        $validated = $request->validate([

            'student_id' => [
                'required',
                'exists:students,id'
            ],

            'course_id' => [
                'required',
                'exists:courses,id'
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'paid_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'status' => [
                'required',
                'in:paid,partial,pending'
            ],

            'due_date' => [
                'required',
                'date'
            ],
        ]);


        // Paid amount validation
        if (
            $validated['paid_amount']
            > $validated['total_amount']
        ) {

            return back()
                ->withInput()
                ->withErrors([
                    'paid_amount' =>
                    'Paid amount cannot be greater than total amount.'
                ]);
        }


        // Calculate due amount
        $validated['due_amount'] =
            $validated['total_amount']
            - $validated['paid_amount'];


        // Update
        $fee->update($validated);


        return redirect()
            ->route('admin.fees.index')
            ->with(
                'success',
                'Fee updated successfully.'
            );
    }


    // =========================
    // DELETE
    // =========================
    public function destroy(Fees $fee)
    {
        $fee->delete();

        return redirect()
            ->route('admin.fees.index')
            ->with(
                'success',
                'Fee deleted successfully.'
            );
    }
}