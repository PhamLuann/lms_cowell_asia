<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'maxpoint','description','tag','time_limit'];
    
    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
