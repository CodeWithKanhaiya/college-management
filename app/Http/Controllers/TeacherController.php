<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'department'])
            ->latest()
            ->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    //  public function create()
    //  {
    //      $users = User::where('role', 'teacher')
    //          ->whereDoesntHave('teacher')
    //          ->get();

    //      $departments = Department::where('status', true)
    //         ->orderBy('name')
    //          ->get();

    //      return view(
    //          'admin.teachers.create',
    //          compact('users', 'departments')
    //      );
    //  }


    public function create()
{
     $users = User::where('role', 'teacher')->get();

    $departments = Department::where('status', true)->get();

    return view('admin.teachers.create', compact(
        'users',
        'departments'
    ));
}
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:teachers,user_id',
            'department_id' => 'required|exists:departments,id',
            'employee_id' => 'required|string|max:50|unique:teachers,employee_id',
            'phone' => 'required|string|max:20',
            'qualification' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher created successfully.');
    }
    

    public function publicIndex()
{
    $teachers = Teacher::with('department')
        ->where('status', true)
        ->latest()
        ->get();

    return view(
        'frontend.teachers.index',
        compact('teachers')
    );
}

public function show(Teacher $teacher)
{
    $teacher->load(['user', 'department']);

    return view('admin.teachers.show', compact('teacher'));
}

    public function edit(Teacher $teacher)
    {
        $users = User::where('role', 'teacher')
            ->where(function ($query) use ($teacher) {
                $query->whereDoesntHave('teacher')
                      ->orWhere('id', $teacher->user_id);
            })
            ->get();

        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.teachers.edit',
            compact('teacher', 'users', 'departments')
        );
    }


    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:teachers,user_id,' . $teacher->id,
            'department_id' => 'required|exists:departments,id',
            'employee_id' => 'required|string|max:50|unique:teachers,employee_id,' . $teacher->id,
            'phone' => 'required|string|max:20',
            'qualification' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {

            $data['photo'] = $request->file('photo')
                ->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}