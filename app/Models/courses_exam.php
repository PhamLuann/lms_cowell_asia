<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses_exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'course_id',
    ];
}
