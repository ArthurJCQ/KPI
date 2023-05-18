<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Infrastructure\Persistence\BaseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @template T as object
 * @implements BaseRepository<T> as object
 */
abstract class DoctrineBaseRepository implements BaseRepository
{
    /** @var EntityRepository<T> */
    protected EntityRepository $repository;

    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    /** @param T $object */
    public function store(object $object): void
    {
        $this->entityManager->persist($object);
    }

    /** @param T $object */
    public function remove(object $object): void
    {
        $this->entityManager->remove($object);
    }

    /** @return ?T */
    public function find(mixed $id): ?object
    {
        return $this->repository->find($id);
    }

    /** @return array<object> */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function findBy(array $options, ?array $orderBy = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->repository->findBy($options, $orderBy, $limit, $offset);
    }

    /** @return ?T */
    public function findOneBy(array $options, ?array $orderBy = null): ?object
    {
        return $this->repository->findOneBy($options);
    }


    /** @param class-string<T> $class */
    public function setRepository(string $class): void
    {
        $this->repository = $this->entityManager->getRepository($class);
    }
}
