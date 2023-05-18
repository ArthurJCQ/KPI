<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

interface PersistenceAdapterInterface
{
    public function persist(object $object): void;

    public function flush(): void;
}
