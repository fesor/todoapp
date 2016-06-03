<?php

namespace App\Domain\User;

class SocialAccount
{
    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $identity;


    public function __construct(string $provider, string $identity)
    {
        $this->provider = $provider;
        $this->identity = $identity;
    }
}
