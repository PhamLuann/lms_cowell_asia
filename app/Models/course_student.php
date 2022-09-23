<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_student extends Model
{
    use HasFactory;
    protected $table = 'course_student';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'course_id'];
}
