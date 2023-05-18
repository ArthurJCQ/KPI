<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\User\Entity\User;
use App\Domain\User\UserRepositoryInterface;

/** @extends DoctrineBaseRepository<User> */
class UserRepositoryDoctrine extends DoctrineBaseRepository implements UserRepositoryInterface
{
}
