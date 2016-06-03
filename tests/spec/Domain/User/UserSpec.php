<?php

namespace spec\App\Domain\User;

use App\Domain\User\PasswordHasher;
use App\Domain\User\UserProfile;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('registerViaSocialLogin', [
            new UserProfile('John', 'Doe'),
            'google',
            'google_user_id',
        ]);
    }

    function it_can_be_registered(PasswordHasher $hasher)
    {
        $hasher->hash('example')->willReturnArgument(0)->shouldBeCalled();

        $this->beConstructedThrough('register', [
            'john.doe@example.com',
            'example',
            $hasher,
            new UserProfile('John', 'Doe'),
        ]);

        $this->shouldNotThrow()->duringInstantiation();
    }

    function it_can_be_registered_via_social_accounts()
    {
        $this->beConstructedThrough('registerViaSocialLogin', [
            new UserProfile('John', 'Doe'),
            'google',
            'google_user_id',
        ]);

        $this->shouldNotThrow()->duringInstantiation();
    }

    function it_can_change_password(PasswordHasher $hasher)
    {
        $hasher->hash('new_password')->willReturnArgument(0)->shouldBeCalled();

        $this->changePassword('new_password', $hasher);
    }
}
