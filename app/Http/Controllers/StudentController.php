<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'user',
            'department',
            'course',
        ])->latest()->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        // Only student-role users
        $users = User::where('role', 'student')
            ->whereDoesntHave('student')
            ->get();

        $departments = Department::where('status', true)
            //  ->orderBy('name')
            ->get();
              $courses = Course::all();

       // $courses = Course::orderBy('course_name')->get();

        return view(
            'admin.students.create',
            compact('users', 'departments', 'courses')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:students,user_id',
            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
            'admission_no' => 'required|string|max:50|unique:students,admission_no',
            'roll_no' => 'required|string|max:50|unique:students,roll_no',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        Student::create($data);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $users = User::where('role', 'student')
            ->where(function ($query) use ($student) {
                $query->whereDoesntHave('student')
                    ->orWhere('id', $student->user_id);
            })
            ->get();

        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        $courses = Course::orderBy('course_name')->get();

        return view(
            'admin.students.edit',
            compact('student', 'users', 'departments', 'courses')
        );
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:students,user_id,' . $student->id,
            'department_id' => 'required|exists:departments,id',
            'course_id' => 'required|exists:courses,id',
            'admission_no' => 'required|string|max:50|unique:students,admission_no,' . $student->id,
            'roll_no' => 'required|string|max:50|unique:students,roll_no,' . $student->id,
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        $student->update($data);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}