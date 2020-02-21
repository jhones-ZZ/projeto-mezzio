<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class UsuariosRepository
 * @package App\Repository
 */
class UsuariosRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        try {
            $data = $this->findAll();
            $dataArray = [];

            foreach ($data as $object) {
                $dataArray[] = $object->toArray();
            }

            return $dataArray;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getOne(int $id): array
    {
        try {
            $entity = $this->findOneBy(['id' => $id]);
            return !empty($entity) ? $entity->toArray() : [];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getAllWithDQL(): array
    {
        $dql = <<<DQL
        SELECT
            u.id,
            u.nomeCompleto,
            u.ativo,
            u.cpf,
            u.dataNascimento,
            u.email,
            u.ativo,
            t.id as tipoUsuario
        FROM App\Entity\Usuarios u
        INNER JOIN u.tipoUsuario t
        ORDER BY u.nomeCompleto ASC
DQL;

        try {
            $query = $this->getEntityManager()->createQuery($dql);
            $result = $query->getResult();

            return $result ?? [];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getOneWithDQL(int $id): array
    {
        $dql = <<<DQL
        SELECT
            u.id,
            u.nomeCompleto,
            u.ativo,
            u.cpf,
            u.dataNascimento,
            u.email,
            u.ativo,
            t.id as tipoUsuario
        FROM App\Entity\Usuarios u
        INNER JOIN u.tipoUsuario t
        WHERE 
            u.id = $id
DQL;

        try {
            $query = $this->getEntityManager()->createQuery($dql);
            $result = $query->getResult();

            return $result ?? [];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}