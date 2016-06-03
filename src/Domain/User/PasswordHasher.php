<?php

namespace App\Domain\User;

interface PasswordHasher
{
    public function hash(string $password) : string;
}
