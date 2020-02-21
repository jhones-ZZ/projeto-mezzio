<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TiposUsuario;
use App\Entity\Usuarios;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Class UsuariosService
 * @package App\Service
 */
class UsuariosService extends ServiceAbstract
{
    protected $entity = Usuarios::class;

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insert(array $data): array
    {
        try {
            $entity = new $this->entity();

            $userType = $this->em->getReference(TiposUsuario::class, $data['tipoUsuario']);
            $data['tipoUsuario'] = $userType;
            $data['dataNascimento'] = new \DateTime($data['dataNascimento']);

            $classMethods = new ClassMethodsHydrator();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function update(array $data): array
    {
        try {
            $entity = $this->em->getReference($this->entity, $data['id']);

            if (!empty($data['tipoUsuario'])) {
                $userType = $this->em->getReference(TiposUsuario::class, $data['tipoUsuario']);
                $data['tipoUsuario'] = $userType;
            }

            if (!empty($data['dataNascimento'])) {
                $data['dataNascimento'] = new \DateTime($data['dataNascimento']);
            }

            $classMethods = new ClassMethodsHydrator();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}