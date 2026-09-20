<?php
namespace App\Http\Controllers;
use App\Models\Timetables;
use App\Models\Course;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
class TimetableController
{
    public function index()
    {
        $timetables = Timetables::with([
            'course',
            'subject',
            'teacher.user'
        ])
        ->latest()
        ->get();

        return view(
            'admin.timetables.index',
            compact('timetables')
        );
    }

    public function create()
    {
        $courses = Course::latest()->get();

        $subjects = Subject::latest()->get();

        $teachers = teacher::with('user')
            ->latest()
            ->get();

        return view(
            'admin.timetables.create',
            compact('courses', 'subjects', 'teachers')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',

            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',

            'start_time' => 'required|date_format:H:i',

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time'
            ],

            'room_no' => 'nullable|string|max:40',
        ]);

        Timetables::create($validated);

        return redirect()
            ->route('admin.timetables.index')
            ->with('success', 'Timetable created successfully.');
    }

    public function edit(Timetables $timetable)
    {
        $courses = Course::latest()->get();

        $subjects = Subject::latest()->get();

        $teachers = teacher::with('user')
            ->latest()
            ->get();

        return view(
            'admin.timetables.edit',
            compact(
                'timetable',
                'courses',
                'subjects',
                'teachers'
            )
        );
    }

    public function update(
        Request $request,
        Timetables $timetable
    ) {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',

            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',

            'start_time' => 'required|date_format:H:i',

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time'
            ],

            'room_no' => 'nullable|string|max:40',
        ]);

        $timetable->update($validated);

        return redirect()
            ->route('admin.timetables.index')
            ->with('success', 'Timetable updated successfully.');
    }

    public function destroy(Timetables $timetable)
    {
        $timetable->delete();

        return redirect()
            ->route('admin.timetables.index')
            ->with('success', 'Timetable deleted successfully.');
    }
}
