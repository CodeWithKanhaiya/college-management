<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable = [
        'name',
        'exam_type',
        'semester',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
    ];

    public function examSubjects()
    {
        return $this->hasMany(ExamSubject::class, 'exam_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'exam_id');
    }
}