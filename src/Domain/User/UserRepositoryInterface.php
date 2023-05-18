<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\User\Entity\User;
use App\Infrastructure\Persistence\BaseRepository;

/** @extends BaseRepository<User> */
interface UserRepositoryInterface extends BaseRepository
{
}
