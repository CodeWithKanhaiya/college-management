<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display departments.
     */
    public function index()
    {
        $departments = Department::latest()->get();

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store department.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'code' => 'required|string|max:50|unique:departments,code',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Department::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
    }
// public department code

public function publicIndex()
{
    $departments = Department::where('status', true)
        ->latest()
        ->get();

    return view(
        'frontend.departments.index',
        compact('departments')
    );
}


public function show(Department $department)
{
    return view(
        'frontend.departments.show',
        compact('department')
    );
}



    /**
     * Show edit form.
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update department.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'code' => 'required|string|max:50|unique:departments,code,' . $department->id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $department->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Delete department.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}