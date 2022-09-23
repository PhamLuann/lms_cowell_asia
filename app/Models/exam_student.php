<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_student extends Model
{
    use HasFactory;
    protected $table = 'student_exams';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'exam_id'];
}
