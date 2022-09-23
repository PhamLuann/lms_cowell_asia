<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'duration',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
