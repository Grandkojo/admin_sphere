<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $fillable = [
        'course_code',
        'teacher_id',
        'material_description',
        'file_path',
        'file_name'
    ];
}
