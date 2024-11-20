<?php

namespace App\Classes;

use App\Models\Teacher;

class TeacherClass extends UserClass
{
    public $uniqueId;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generateUniqueId()
    {
        do {
            $uniqueNumber = rand(10000, 99999);
            $exists = Teacher::where('teacher_id', $uniqueNumber)->exists();
        } while ($exists);

        $this->uniqueId = $uniqueNumber; 
        return $uniqueNumber;
    
    }
}
