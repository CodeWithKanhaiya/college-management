<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'publish_date',
        'expiry_date',
        'status',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expiry_date' => 'date',
        'status' => 'boolean',
    ];
}