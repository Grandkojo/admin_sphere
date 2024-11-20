<?php

namespace App\Classes;

use App\Models\User;

class UserClass
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}



    public function generateUniqueId()
    {
        do {
            $uniqueNumber = rand(10000, 99999);
            $exists = User::where('user_id', $uniqueNumber)->exists();
        } while ($exists);

        return $uniqueNumber;
    }


    public function login() {}

    public function signup() {}

    public function logout() {}

    public function updateProfile() {}

    public function changeIdentityKey() {}
}
