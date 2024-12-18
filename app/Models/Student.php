<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    //
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'gender',
        'department_id',
        'password',
        'student_id'
    ];
}
