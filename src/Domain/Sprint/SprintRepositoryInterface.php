<?php

declare(strict_types=1);

namespace App\Domain\Sprint;

use App\Domain\Sprint\Entity\Sprint;
use App\Infrastructure\Persistence\BaseRepository;

/** @extends BaseRepository<Sprint> */
interface SprintRepositoryInterface extends BaseRepository
{
}
