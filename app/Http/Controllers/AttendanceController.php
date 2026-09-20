<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with([
            'student',
            'subject',
            'teacher'
        ])
        ->latest()
        ->get();

        return view(
            'admin.attendances.index',
            compact('attendances')
        );
    }

    public function create()
    {
        $students = Student::where('status', true)
            ->latest()
            ->get();

        $subjects = Subject::where('status', true)
            ->latest()
            ->get();

        $teachers = Teacher::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.attendances.create',
            compact(
                'students',
                'subjects',
                'teachers'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'date'       => 'required|date',
            'status'     => 'required|in:present,absent,late',
            'remarks'    => 'nullable|string|max:500',
        ]);

        Attendance::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'date'       => $request->date,
            'status'     => $request->status,
            'remarks'    => $request->remarks,
        ]);

        return redirect()
            ->route('admin.attendances.index')
            ->with('success', 'Attendance added successfully.');
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::where('status', true)
            ->latest()
            ->get();

        $subjects = Subject::where('status', true)
            ->latest()
            ->get();

        $teachers = Teacher::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.attendances.edit',
            compact(
                'attendance',
                'students',
                'subjects',
                'teachers'
            )
        );
    }

    public function update(
        Request $request,
        Attendance $attendance
    ) {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'date'       => 'required|date',
            'status'     => 'required|in:present,absent,late',
            'remarks'    => 'nullable|string|max:500',
        ]);

        $attendance->update([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'date'       => $request->date,
            'status'     => $request->status,
            'remarks'    => $request->remarks,
        ]);

        return redirect()
            ->route('admin.attendances.index')
            ->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('admin.attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}