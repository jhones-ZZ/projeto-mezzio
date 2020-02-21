<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\TiposUsuarioService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioServiceFactory
 * @package App\Service\Factory
 */
class TiposUsuarioServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioService
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioService
    {
        $em = $container->get(EntityManager::class);
        return new TiposUsuarioService($em);
    }
}