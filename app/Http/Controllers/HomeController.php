<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Notice;
use App\Models\Event;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // Latest Courses
        $courses = Course::latest()
            ->take(6)
            ->get();

        // Latest Departments
        $departments = Department::where('status', true)
            ->latest()
            ->take(5)
            ->get();

        // Latest Teachers
        $teachers = Teacher::where('status', true)
            ->latest()
            ->take(4)
            ->get();

        // Latest Notices
        $notices = Notice::latest('publish_date')
            ->take(6)
            ->get();
      $events = Event::where('event_date', '>=', now()->toDateString())
            ->where('status', true)
            ->orderBy('event_date')
            ->take(6)
            ->get();
    $testimonials = Testimonial::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.home', compact(
            'courses',
            'departments',
            'teachers',
            'notices',
            'events',
            'testimonials'
        ));
    }
    public function about()
{
    return view('frontend.about');
}


    public function courses()
    {
          $courses = Course::latest()->get();

        return view('frontend.courses', compact('courses'));

        
    }

     public function Departments()
    {
        $departments = Department::latest()->get();

        return view('frontend.departments', compact('departments'));
    
    }
    public function Teachers()
{
    $teachers = Teacher::with(['department', 'user'])
        ->where('status', 1)
        ->latest()
        ->get();

    return view('frontend.teachers', compact('teachers'));
}
public function Notices()
{
    $notices = Notice::where('status', 1)
        ->latest()
        ->get();

    return view('frontend.notices', compact('notices'));
}
public function Events()
{
    $events = Event::where('status', 1)
        ->orderBy('event_date', 'asc')
        ->get();

    return view('frontend.events', compact('events'));
}
}