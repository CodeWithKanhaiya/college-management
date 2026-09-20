<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with([
            'student.user',
            'exam',
            'subject'
        ])->latest()->get();

        return view(
            'admin.results.index',
            compact('results')
        );
    }

    public function create()
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $exams = Exam::where('status', true)
            ->latest()
            ->get();

        $subjects = Subject::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.results.create',
            compact('students', 'exams', 'subjects')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'marks_obtained' => 'required|numeric|min:0',
            'total_marks' => 'required|numeric|min:1',
            'grade' => 'nullable|string|max:10',
            'remarks' => 'nullable|string|max:500',
        ]);

        if ($validated['marks_obtained'] > $validated['total_marks']) {
            return back()
                ->withInput()
                ->withErrors([
                    'marks_obtained' =>
                    'Marks obtained cannot be greater than total marks.'
                ]);
        }

        Result::create($validated);

        return redirect()
            ->route('admin.results.index')
            ->with('success', 'Result added successfully.');
    }

    public function edit(Result $result)
    {
        $students = Student::with('user')
            ->where('status', true)
            ->latest()
            ->get();

        $exams = Exam::where('status', true)
            ->latest()
            ->get();

        $subjects = Subject::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.results.edit',
            compact(
                'result',
                'students',
                'exams',
                'subjects'
            )
        );
    }

    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'marks_obtained' => 'required|numeric|min:0',
            'total_marks' => 'required|numeric|min:1',
            'grade' => 'nullable|string|max:10',
            'remarks' => 'nullable|string|max:500',
        ]);

        if ($validated['marks_obtained'] > $validated['total_marks']) {
            return back()
                ->withInput()
                ->withErrors([
                    'marks_obtained' =>
                    'Marks obtained cannot be greater than total marks.'
                ]);
        }

        $result->update($validated);

        return redirect()
            ->route('admin.results.index')
            ->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()
            ->route('admin.results.index')
            ->with('success', 'Result deleted successfully.');
    }
}