<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'college_name',
        'introduction',
        'established_year',
        'image',
    ];
}