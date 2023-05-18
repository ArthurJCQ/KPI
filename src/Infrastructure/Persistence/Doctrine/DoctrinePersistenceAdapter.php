<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine;

use App\Infrastructure\Persistence\PersistenceAdapterInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePersistenceAdapter implements PersistenceAdapterInterface
{
    public function __construct(readonly private EntityManagerInterface $entityManager)
    {
    }

    public function persist(object $object): void
    {
        $this->entityManager->persist($object);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }
}
