<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   public function courses()
{
    $fillable = [
    'student_number',
    'first_name',
    'last_name',
    'email'
    ];
    
    return $this->belongsToMany(Course::class, 'enrollments')
                ->withTimestamps();

}

}

