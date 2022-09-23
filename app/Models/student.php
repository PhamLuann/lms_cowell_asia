<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class Student extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The primary key associated with the table
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\HasMany
     */
    public function Classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function Courses()
    {
        return $this->belongsToMany(Courses::class);
    }

    public function Exams()
    {
        return $this->belongsToMany(Exams::class);
    }
}
