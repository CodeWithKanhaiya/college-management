<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'course_id',
        'admission_no',
        'roll_no',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'admission_date',
        'photo',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_date' => 'date',
        'status' => 'boolean',
    ];

    // Student belongs to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Student belongs to Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // Student belongs to Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}