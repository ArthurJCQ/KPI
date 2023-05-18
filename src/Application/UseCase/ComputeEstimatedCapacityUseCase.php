<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\ConfigurableUserTrait;
use App\Domain\Sprint\Entity\Sprint;
use App\Infrastructure\Persistence\Doctrine\Repository\UserRepositoryDoctrine;

// Example/Idea of what could happen
class ComputeEstimatedCapacityUseCase
{
//    public function __construct(UserRepositoryDoctrine $userRepository)
//    {
//    }

//    public function calculateCapacity(Sprint $sprint): float
//    {
//        $totalDevCapacity = 0;
//
//        // Get Dev with related sprint config, create method in repo to reduce db call cost
//        foreach ($sprint->getDeveloppers() as $developer) {
//            $totalDevCapacity += $this->computeDevCapa(
//                $developer->getDevSprintConfig($sprint->getId()) ?? $developer
//            );
//        }
//
//        return $totalDevCapacity;
//    }
//
//    private function computeDevCapa(ConfigurableUserTrait $user): float
//    {
//        // LOGIC HERE
//        return 0;
//    }
}
