<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'course_id',
        'name',
        'code',
        'semester',
        'credits',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function examSubjects()
    {
        return $this->hasMany(ExamSubject::class, 'subject_id');
    }
}