<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TiposUsuario\TiposUsuarioListarUmHandler;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioListarUmHandlerFactory
 * @package App\Handler\Factory
 */
class TiposUsuarioListarUmHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioListarUmHandler
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioListarUmHandler
    {
        return new TiposUsuarioListarUmHandler($container);
    }
}