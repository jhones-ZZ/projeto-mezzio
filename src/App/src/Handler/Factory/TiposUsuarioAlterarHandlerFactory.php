<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TiposUsuario\TiposUsuarioAlterarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioAlterarHandlerFactory
 * @package App\Handler\Factory
 */
class TiposUsuarioAlterarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioAlterarHandler
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioAlterarHandler
    {
        return new TiposUsuarioAlterarHandler($container);
    }
}