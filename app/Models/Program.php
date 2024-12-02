<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'program_code',
        'program_type',
        'department_id',
        'program_description',
        'program_duration',
        'program_name'
    ];
}
