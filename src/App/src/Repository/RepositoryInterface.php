<?php

declare(strict_types=1);

namespace App\Repository;

interface RepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $id
     * @return array
     */
    public function getOne(int $id): array;

    /**
     * @return array
     */
    public function getAllWithDQL(): array;

    /**
     * @param int $id
     * @return array
     */
    public function getOneWithDQL(int $id): array;
}