<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\MensagensService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensServiceFactory
 * @package App\Service\Factory
 */
class MensagensServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensService
     */
    public function __invoke(ContainerInterface $container): MensagensService
    {
        $em = $container->get(EntityManager::class);
        return new MensagensService($em);
    }
}