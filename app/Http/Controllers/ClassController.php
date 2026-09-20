<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display classes
     */
    public function index()
    {
        $classes = Classes::with('course')
            ->latest()
            ->get();

        return view('admin.classes.index', compact('classes'));
    }


    /**
     * Show create form
     */
    public function create()
    {
        $courses = Course::where('status', true)
            ->get();

        return view('admin.classes.create', compact('courses'));
    }


    /**
     * Store class
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:150',
            'section' => 'required|string|max:50',
            'semester' => 'required|integer|min:1|max:12',
            'academic_year' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        classes::create($request->all());

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Class created successfully.');
    }


    /**
     * Show edit form
     */
    public function edit(classes $class)
    {
        $courses = Course::where('status', true)
            ->get();

        return view(
            'admin.classes.edit',
            compact('class', 'courses')
        );
    }


    /**
     * Update class
     */
    public function update(Request $request, classes $class)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:150',
            'section' => 'required|string|max:50',
            'semester' => 'required|integer|min:1|max:12',
            'academic_year' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        $class->update($request->all());

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Class updated successfully.');
    }


    /**
     * Delete class
     */
    public function destroy(classes $class)
    {
        $class->delete();

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}