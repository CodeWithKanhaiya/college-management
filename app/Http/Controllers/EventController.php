<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // READ
    public function index()
    {
        $events = Event::latest()->get();

        return view(
            'admin.events.index',
            compact('events')
        );
    }


    // CREATE FORM
    public function create()
    {
        return view('admin.events.create');
    }


    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255',

            'description' => 'required|string',

            'event_date' => 'required|date',

            'start_time' => 'required|date_format:H:i',

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],

            'location' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|boolean',

        ]);


        // Image Upload
        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                public_path('uploads/events'),
                $imageName
            );

            $validated['image'] = $imageName;
        }


        Event::create($validated);


        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event created successfully.'
            );
    }


    // EDIT FORM
    public function edit(Event $event)
    {
        return view(
            'admin.events.edit',
            compact('event')
        );
    }


    // UPDATE
    public function update(
        Request $request,
        Event $event
    ) {

        $validated = $request->validate([

            'title' => 'required|string|max:255',

            'description' => 'required|string',

            'event_date' => 'required|date',

            'start_time' => 'required|date_format:H:i',

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],

            'location' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|boolean',

        ]);


        // New Image
        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                public_path('uploads/events'),
                $imageName
            );

            $validated['image'] = $imageName;
        }


        $event->update($validated);


        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event updated successfully.'
            );
    }


    // DELETE
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event deleted successfully.'
            );
    }
}