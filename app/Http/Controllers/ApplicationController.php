<?php
namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('frontend.apply');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:150',
            'address' => 'nullable|string',
        ]);

        Application::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course' => $request->course,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('apply')
            ->with('success', 'Application submitted successfully!');
    }
}