<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'age',
        'date_of_birth',
        'class',
        'div',
        'guardian_name',
        'address',
        'image',
    ];
}
