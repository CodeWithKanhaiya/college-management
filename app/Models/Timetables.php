<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetables extends Model
{
    protected $fillable = [
        'course_id',
        'subject_id',
        'teacher_id',
        'day',
        'start_time',
        'end_time',
        'room_no',
    ];

         public function course() 
             {
                 return $this->belongsTo(Course::class, 'course_id'); 
                 }
          public function subject()
            { 
        return $this->belongsTo(Subject::class, 'subject_id'); 
        } 
             public function teacher() 
                {
          return $this->belongsTo(teacher::class, 'teacher_id');
           } 
           }