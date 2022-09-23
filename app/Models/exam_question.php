<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_question extends Model
{
    protected $table = 'exam_question';
    protected $primaryKey = 'id';
    protected $fillable = ['question_id', 'exam_id'];
    public function question(){
        return $this->hasOne(Question::class,'questionid','id');
    }
}
