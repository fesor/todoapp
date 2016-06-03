<?php

namespace App\Domain\User;

interface UserRepository
{
    public function add(User $user) : void;
}
