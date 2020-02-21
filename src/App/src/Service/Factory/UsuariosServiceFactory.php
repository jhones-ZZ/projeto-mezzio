<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\UsuariosService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosServiceFactory
 * @package App\Service\Factory
 */
class UsuariosServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosService
     */
    public function __invoke(ContainerInterface $container): UsuariosService
    {
        $em = $container->get(EntityManager::class);
        return new UsuariosService($em);
    }
}