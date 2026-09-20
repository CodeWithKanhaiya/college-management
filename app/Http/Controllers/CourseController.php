<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin - Course List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $courses = Course::with('department')
            ->latest()
            ->get();

        return view(
            'admin.courses.index',
            compact('courses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Create Course
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.courses.create',
            compact('departments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Store Course
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'course_name' => 'required|string|max:150',
            'course_code' => 'required|string|max:50|unique:courses,course_code',
            'duration' => 'required|string|max:50',
            'total_semesters' => 'required|integer|min:1|max:20',
            'fees' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);


        Course::create([
            'department_id' => $request->department_id,
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'duration' => $request->duration,
            'total_semesters' => $request->total_semesters,
            'fees' => $request->fees,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('admin.courses.index')
            ->with(
                'success',
                'Course created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Public - Course Details
    |--------------------------------------------------------------------------
    */

    public function show(Course $course)
    {
        $course->load('department');

        return view(
            'frontend.courses.show',
            compact('course')
        );
    }
    public function publicIndex()
{
    $courses = Course::with('department')
        ->latest()
        ->get();

    return view(
        'frontend.courses.index',
        compact('courses')
    );
}


    /*
    |--------------------------------------------------------------------------
    | Admin - Edit Course
    |--------------------------------------------------------------------------
    */

    public function edit(Course $course)
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.courses.edit',
            compact('course', 'departments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Update Course
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Course $course
    ) {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'course_name' => 'required|string|max:150',
            'course_code' => 'required|string|max:50|unique:courses,course_code,' . $course->id,
            'duration' => 'required|string|max:50',
            'total_semesters' => 'required|integer|min:1|max:20',
            'fees' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);


        $course->update([
            'department_id' => $request->department_id,
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'duration' => $request->duration,
            'total_semesters' => $request->total_semesters,
            'fees' => $request->fees,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('admin.courses.index')
            ->with(
                'success',
                'Course updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Delete Course
    |--------------------------------------------------------------------------
    */

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with(
                'success',
                'Course deleted successfully.'
            );
    }
}