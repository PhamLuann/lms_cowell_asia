<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes_course extends Model
{
    use HasFactory;
    protected $table = 'classes_course';
    protected $primaryKey = 'id';
    protected $fillable = ['classes_id', 'course_id'];
}
