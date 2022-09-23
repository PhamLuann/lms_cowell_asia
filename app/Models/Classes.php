<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'semester',
        'description',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\HasMany
     */

    public function Student()
    {
        return $this->belongsToMany(
            Student::class,
        );
    }
    public function courses()
    {
        return $this->belongsToMany(
            Courses::class,
        );
    }
}
