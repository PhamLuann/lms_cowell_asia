<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamHistory extends Model
{
    use HasFactory;
    protected $table = 'student_exam_histories';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'exam_id', 'test_time','point'];
}
