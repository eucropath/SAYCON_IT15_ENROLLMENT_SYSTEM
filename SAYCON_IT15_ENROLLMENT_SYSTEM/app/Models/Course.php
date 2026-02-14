<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
public function students()
{
      $fillable = [
        'course_code',
        'course_name',
        'capacity'
      ];

    return $this->belongsToMany(Student::class, 'enrollments')
                ->withTimestamps();
}

}
