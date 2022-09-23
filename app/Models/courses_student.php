<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses_student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
    ];
    protected $table='courses_student';
}
