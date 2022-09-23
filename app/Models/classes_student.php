<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes_student extends Model
{
    use HasFactory;
    protected $table = 'classes_student';
    protected $primaryKey = 'id';
    protected $fillable = ['classes_id', 'student_id'];
}
