<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'code'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}