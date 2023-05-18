<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\DevSprintConfig\DevSprintConfigRepositoryInterface;
use App\Domain\DevSprintConfig\Entity\DevSprintConfig;

/** @extends DoctrineBaseRepository<DevSprintConfig> */
class DevSprintConfigRepositoryDoctrine extends DoctrineBaseRepository implements DevSprintConfigRepositoryInterface
{
}
