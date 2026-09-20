<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // READ - Notice List
    public function index()
    {
        $notices = Notice::latest()->get();

        return view(
            'admin.notices.index',
            compact('notices')
        );
    }


    // CREATE - Show Form
    public function create()
    {
        return view('admin.notices.create');
    }


    // CREATE - Save Data
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'required',
                'string'
            ],

            'publish_date' => [
                'required',
                'date'
            ],

            'expiry_date' => [
                'nullable',
                'date',
                'after_or_equal:publish_date'
            ],

            'status' => [
                'required',
                'boolean'
            ],

        ]);

        Notice::create($validated);

        return redirect()
            ->route('admin.notices.index')
            ->with(
                'success',
                'Notice created successfully.'
            );
    }
    public function publicIndex()
{
     $notices = Notice::where('status', true)
        ->latest()
        ->get();
        
    return view(
        'frontend.notices.index',
        compact('notices')
    );
}
    //show method

    public function show(Notice $notice)
{
    return view('frontend.notices.show', compact('notice'));
}

    // UPDATE - Show Edit Form
    public function edit(Notice $notice)
    {
        return view(
            'admin.notices.edit',
            compact('notice')
        );
    }


    // UPDATE - Save Changes
    public function update(
        Request $request,
        Notice $notice
    ) {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'required',
                'string'
            ],

            'publish_date' => [
                'required',
                'date'
            ],

            'expiry_date' => [
                'nullable',
                'date',
                'after_or_equal:publish_date'
            ],

            'status' => [
                'required',
                'boolean'
            ],

        ]);

        $notice->update($validated);

        return redirect()
            ->route('admin.notices.index')
            ->with(
                'success',
                'Notice updated successfully.'
            );
    }


    // DELETE
    public function destroy(Notice $notice)
    {
        $notice->delete();

        return redirect()
            ->route('admin.notices.index')
            ->with(
                'success',
                'Notice deleted successfully.'
            );
    }
}