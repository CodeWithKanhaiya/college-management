<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display exam list
     */
    public function index()
    {
        $exams = Exam::latest()->get();

        return view('admin.exam.index', compact('exams'));
    }


    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.exam.create');
    }


    /**
     * Store exam
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'exam_type' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:12',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|boolean',
        ]);

        Exam::create($request->all());

        return redirect()
            ->route('admin.exams.index')
            ->with('success', 'Exam created successfully.');
    }


    /**
     * Show edit form
     */
    public function edit(Exam $exam)
    {
        return view('admin.exam.edit', compact('exam'));
    }


    /**
     * Update exam
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'exam_type' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:12',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|boolean',
        ]);

        $exam->update($request->all());

        return redirect()
            ->route('admin.exams.index')
            ->with('success', 'Exam updated successfully.');
    }


    /**
     * Delete exam
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()
            ->route('admin.exams.index')
            ->with('success', 'Exam deleted successfully.');
    }
}