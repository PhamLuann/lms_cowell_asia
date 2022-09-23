<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'exam_id',
    ];
}
