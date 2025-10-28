<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'date', 'description'];
       // Add this line
    protected $casts = [
        'date' => 'date',
    ];
}
