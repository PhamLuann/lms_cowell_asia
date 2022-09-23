<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examRequest extends Model
{
    use HasFactory;
    protected $table = 'exam_request';
    protected $primaryKey = 'id';
    protected $fillable = ['question_id', 'exam_history_id','answer','point'];
}
