<?php

declare(strict_types=1);

namespace App\Domain\User\Factory;

use App\Domain\User\Entity\User;

class UserFactory
{
    public function create(string $email, string $name, ?string $pictureUrl): User
    {
        return (new User())
            ->setEmail($email)
            ->setName($name)
            ->setPictureUrl($pictureUrl);
    }
}
