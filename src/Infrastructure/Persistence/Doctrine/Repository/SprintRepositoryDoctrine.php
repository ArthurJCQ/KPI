<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Sprint\Entity\Sprint;
use App\Domain\Sprint\SprintRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

/** @extends DoctrineBaseRepository<Sprint> */
class SprintRepositoryDoctrine extends DoctrineBaseRepository implements SprintRepositoryInterface
{
}
