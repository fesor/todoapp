<?php

namespace App\Domain\User;

class UserProfile
{
    private $firstName;

    private $lastName;

    /**
     * UserProfile constructor.
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}
