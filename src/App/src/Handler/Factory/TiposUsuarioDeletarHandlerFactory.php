<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TiposUsuario\TiposUsuarioDeletarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioDeletarHandlerFactory
 * @package App\Handler\Factory
 */
class TiposUsuarioDeletarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioDeletarHandler
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioDeletarHandler
    {
        return new TiposUsuarioDeletarHandler($container);
    }
}