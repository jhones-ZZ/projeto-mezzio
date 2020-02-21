<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Usuarios\UsuariosDeletarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosDeletarHandlerFactory
 * @package App\Handler\Factory
 */
class UsuariosDeletarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosDeletarHandler
     */
    public function __invoke(ContainerInterface $container): UsuariosDeletarHandler
    {
        return new UsuariosDeletarHandler($container);
    }
}