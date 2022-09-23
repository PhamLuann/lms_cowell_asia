<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    
    /**
     *
     * @return \Illuminate\Database\Eloquent\HasMany
     */
    public function courses(){
        return $this->belongsToMany(Courses::class);
    }
}
