<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Usuarios\UsuariosListarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosListarHandler
 * @package App\Handler\Factory
 */
class UsuariosListarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosListarHandler
     */
    public function __invoke(ContainerInterface $container): UsuariosListarHandler
    {
        return new UsuariosListarHandler($container);
    }
}