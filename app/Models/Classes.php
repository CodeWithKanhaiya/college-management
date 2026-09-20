<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'course_id',
        'name',
        'section',
        'semester',
        'academic_year',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class); 
    }
}