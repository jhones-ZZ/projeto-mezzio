<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class MensagensRepository
 * @package App\Repository
 */
class MensagensRepository extends EntityRepository implements RepositoryInterface
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
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagens m
        INNER JOIN m.usuario u
        ORDER BY m.dataMensagem DESC
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
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagens m
        INNER JOIN m.usuario u
        WHERE 
            m.id = $id
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
     * @param int $userId
     * @return array
     * @throws \Exception
     */
    public function getMessagesFromUser(int $userId): array
    {
        $dql = <<<DQL
       SELECT
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagens m
        INNER JOIN m.usuario u
        WHERE 
            u.id = $userId
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