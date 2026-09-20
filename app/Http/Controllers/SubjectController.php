<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Subject List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $subjects = Subject::with('course')
            ->latest()
            ->get();

        return view('admin.subjects.index', compact('subjects'));
    }


    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $courses = Course::where('status', true)
            ->orderBy('course_name')
            ->get();

        return view('admin.subjects.create', compact('courses'));
    }


    /*
    |--------------------------------------------------------------------------
    | Store Subject
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'course_id' => 'required|exists:courses,id',

            'name' => 'required|string|max:150',

            'code' => [
                'required',
                'string',
                'max:50',
                'unique:subjects,code,NULL,id,course_id,' . $request->course_id
            ],

            'semester' => 'required|integer|min:1|max:20',

            'credits' => 'required|integer|min:0|max:20',

            'status' => 'required|boolean',

        ]);


        Subject::create([

            'course_id' => $request->course_id,

            'name' => $request->name,

            'code' => $request->code,

            'semester' => $request->semester,

            'credits' => $request->credits,

            'status' => $request->status,

        ]);


        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Subject created successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit(Subject $subject)
    {
        $courses = Course::where('status', true)
            ->orderBy('course_name')
            ->get();

        return view(
            'admin.subjects.edit',
            compact('subject', 'courses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Subject
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Subject $subject)
    {
        $request->validate([

            'course_id' => 'required|exists:courses,id',

            'name' => 'required|string|max:150',

            'code' => [
                'required',
                'string',
                'max:50',
                'unique:subjects,code,' . $subject->id . ',id,course_id,' . $request->course_id
            ],

            'semester' => 'required|integer|min:1|max:20',

            'credits' => 'required|integer|min:0|max:20',

            'status' => 'required|boolean',

        ]);


        $subject->update([

            'course_id' => $request->course_id,

            'name' => $request->name,

            'code' => $request->code,

            'semester' => $request->semester,

            'credits' => $request->credits,

            'status' => $request->status,

        ]);


        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Subject updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Subject
    |--------------------------------------------------------------------------
    */

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('admin.subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}