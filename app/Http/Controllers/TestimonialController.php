<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Testimonial List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view(
            'admin.testimonials.index',
            compact('testimonials')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.testimonials.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'course'       => 'required|string|max:150',
            'feedback'     => 'required|string',
            'status'       => 'required|boolean',
        ]);

        Testimonial::create([
            'student_name' => $request->student_name,
            'course'       => $request->course,
            'feedback'     => $request->feedback,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show(Testimonial $testimonial)
    {
        return view(
            'admin.testimonials.show',
            compact('testimonial')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Testimonial $testimonial)
    {
        return view(
            'admin.testimonials.edit',
            compact('testimonial')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Testimonial $testimonial
    ) {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'course'       => 'required|string|max:150',
            'feedback'     => 'required|string',
            'status'       => 'required|boolean',
        ]);

        $testimonial->update([
            'student_name' => $request->student_name,
            'course'       => $request->course,
            'feedback'     => $request->feedback,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}