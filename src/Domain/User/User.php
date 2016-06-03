<?php

namespace App\Domain\User;

use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $id;

    private $connectedAccounts;

    private $email;

    private $password;

    private $profile;

    private function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->connectedAccounts = new ArrayCollection();
    }

    public static function registerViaSocialLogin(UserProfile $profile, string $provider, string $userId)
    {
        $user = new self();
        $user->profile = $profile;
        $user->connectAccount($provider, $userId);

        return $user;
    }

    public static function register(string $email, string $password, PasswordHasher $hasher, UserProfile $profile)
    {
        $user = new self();
        $user->profile = $profile;
        $user->email = $email;
        $user->password = $hasher->hash($password);

        return $user;
    }

    public function changeEmail(string $email)
    {
        $this->email = $email;
    }

    public function changePassword(string $password, PasswordHasher $hasher)
    {
        $this->password = $hasher->hash($password);
    }

    public function updateProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }

    public function connectAccount(string $provider, string $userId)
    {
        $this->connectedAccounts->add(new SocialAccount($provider, $userId));
    }

    public function getRoles()
    {
        return 'ROLE_USER';
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->id;
    }

    public function eraseCredentials()
    {
    }
}
