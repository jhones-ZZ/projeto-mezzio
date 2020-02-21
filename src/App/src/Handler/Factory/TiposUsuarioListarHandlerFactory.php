<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TiposUsuario\TiposUsuarioListarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioListarHandlerFactory
 * @package App\Handler\TiposUsuario
 */
class TiposUsuarioListarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioListarHandler
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioListarHandler
    {
        return new TiposUsuarioListarHandler($container);
    }
}
