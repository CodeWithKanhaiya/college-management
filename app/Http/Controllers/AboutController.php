<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Fees;
use App\Models\Payments;
use App\Models\Timetables;

class AboutController extends Controller
{
    public function index()
    {
        // ==============================
        // BASIC STATISTICS
        // ==============================

        $studentsCount = Student::count();

        $teachersCount = Teacher::count();

        $departmentsCount = Department::count();

        $coursesCount = Course::count();

        $subjectsCount = Subject::count();

        // ==============================
        // DEPARTMENTS
        // ==============================

        $departments = Department::latest()->get();

        // ==============================
        // COURSES
        // ==============================

        $courses = Course::latest()
            ->take(8)
            ->get();

        // ==============================
        // TEACHERS
        // ==============================

        $teachers = Teacher::latest()
            ->take(6)
            ->get();

        // ==============================
        // OTHER STATISTICS
        // ==============================

        $attendanceCount = Attendance::count();

        $examsCount = Exam::count();

        $resultsCount = Result::count();

        $feesCount = Fees::count();

        $paymentsCount = Payments::count();

        $timetablesCount = Timetables::count();

        // ==============================
        // RETURN VIEW
        // ==============================

        return view('frontend.about', compact(

            'studentsCount',
            'teachersCount',
            'departmentsCount',
            'coursesCount',
            'subjectsCount',

            'departments',
            'courses',
            'teachers',

            'attendanceCount',
            'examsCount',
            'resultsCount',
            'feesCount',
            'paymentsCount',
            'timetablesCount'
        ));
    }
}