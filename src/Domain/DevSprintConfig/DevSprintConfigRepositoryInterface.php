<?php

declare(strict_types=1);

namespace App\Domain\DevSprintConfig;

use App\Domain\DevSprintConfig\Entity\DevSprintConfig;
use App\Infrastructure\Persistence\BaseRepository;

/** @extends BaseRepository<DevSprintConfig> */
interface DevSprintConfigRepositoryInterface extends BaseRepository
{
}
