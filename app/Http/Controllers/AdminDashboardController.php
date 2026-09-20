<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Department;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Event;
use App\Models\Notice;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function index()
    {
        $students = Student::count();
        $teachers = Teacher::count();
        $courses = Course::count();
        $departments = Department::count();

        $books = Book::count();
        $bookIssues = BookIssue::count();
        $events = Event::count();
        $notices = Notice::count();

        $recentStudents = Student::latest()
            ->take(5)
            ->get();

        $recentNotices = Notice::latest()
            ->take(5)
            ->get();

        $upcomingEvents = Event::where(
                'event_date',
                '>=',
                now()->toDateString()
            )
            ->orderBy('event_date')
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'students',
                'teachers',
                'courses',
                'departments',
                'books',
                'bookIssues',
                'events',
                'notices',
                'recentStudents',
                'recentNotices',
                'upcomingEvents'
            )
        );
    }
}