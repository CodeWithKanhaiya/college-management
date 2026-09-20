<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'image',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean',
    ];
}