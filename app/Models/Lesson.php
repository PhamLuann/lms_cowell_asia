<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'name',
        'chapter',
        'description',
        'file',
        'video_url',
        'exam_id',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
