<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'employee_id',
        'phone',
        'qualification',
        'designation',
        'joining_date',
        'address',
        'photo',
        'status',
    ];

    protected $casts = [
        'joining_date' => 'date',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}