<?php

namespace App\Entity\User;

use EndyJasmi\Cuid;

class User
{
    private $id;

    private $email;

    private $password;

    private $profile;

    public function __construct(string $email, string $password, UserProfile $profile)
    {
        $this->id = Cuid::cuid();
        $this->email = $email;
        $this->password = $password;
        $this->profile = $profile;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function updateProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }

}
