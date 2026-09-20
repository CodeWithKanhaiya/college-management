<?php
use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamSubjectController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeesController;
 use App\Http\Controllers\PaymentController;
 use App\Http\Controllers\TimetableController;
use App\Http\Controllers\BookController;
 use App\Http\Controllers\BookIssueController;
 use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

 //Home page
  Route::get('/',  [HomeController::class, 'index'])->name('home');

// Apply Page
// =====================================================

Route::get('/apply', [ApplyController::class, 'index'])
    ->name('apply');

Route::post('/apply', [ApplyController::class, 'store'])
    ->name('apply.store');


// =====================================================
// Contact 
// =====================================================

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');
   
// Public   Details
Route::get('/courses', [CourseController::class, 'publicIndex'])
    ->name('courses');
Route::get(
    '/courses/{course}',
    [CourseController::class, 'show']
)->name('courses.show');

Route::get('/departments', [DepartmentController::class, 'publicIndex'])
    ->name('departments.index');

Route::get('/departments/{department}', [DepartmentController::class, 'show'])
    ->name('departments.show');
    Route::get('/teachers', [TeacherController::class, 'publicIndex'])
    ->name('teachers.index');
     

Route::get('/notices', [NoticeController::class, 'publicIndex'])
    ->name('notices.index');

Route::get('/notices/{notice}', [NoticeController::class, 'show'])
    ->name('notices.show');

//about page ke li
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
 
    Route::get('/courses', [HomeController::class, 'courses'])
    ->name('courses');

    Route::get('/departments', [HomeController::class, 'Departments'])
    ->name('departments');
    Route::get('/teachers', [HomeController::class, 'Teachers'])
    ->name('teachers');
    Route::get('/notices', [HomeController::class, 'Notices'])
    ->name('notices');
    Route::get('/events', [HomeController::class, 'Events'])
    ->name('events');
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

});


/*
|--------------------------------------------------------------------------
| Teacher Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard',
        [TeacherDashboardController::class, 'index']
    )->name('teacher.dashboard');

});


/*
|--------------------------------------------------------------------------
| Student Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard',
        [StudentDashboardController::class, 'index']
    )->name('student.dashboard');

});
//COURSE CRUD ROUT
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('courses', CourseController::class);

        
});
//crud department
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('departments', DepartmentController::class);

});
//subject crud route
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('subjects', SubjectController::class);

    });
    //teacher crud route
   Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('admin/teachers', TeacherController::class)
        ->names('admin.teachers');

});
    //student crud route
    Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('students', StudentController::class);

    });
    //class crud route
    use App\Http\Controllers\ClassController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('classes', ClassController::class);

});
//exam route crud
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('exams', ExamController::class);

    });
    //exmassubject crud route
    

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'exam-subjects',
            ExamSubjectController::class
        );

    });
    //attendance crud route
    Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'attendances',
            AttendanceController::class
        );

    });
    //result crud route
    



Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('results', ResultController::class)
            ->except(['show']);

    });
    //fee route 
   

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'fees',
            FeesController::class
        )->except(['show']);

    });
    //payment route url
   

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'payments',
            PaymentController::class
        )->except(['show']);

    });
    //timetable route url



Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'timetables',
            TimetableController::class
        )->except(['show']);

    });
    
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'books',
            BookController::class
        );

        Route::resource(
            'book-issues',
            BookIssueController::class
        );
    });
    Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'notices',
            NoticeController::class
        )->except(['show']);

    });
    Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'events',
            EventController::class
        )->except(['show']);

    });
    Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource(
        'admin/testimonials',
        TestimonialController::class
    )->names('admin.testimonials');

});