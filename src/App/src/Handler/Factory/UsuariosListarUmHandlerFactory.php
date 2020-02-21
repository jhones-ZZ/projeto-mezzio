<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Usuarios\UsuariosListarUmHandler;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosListarUmHandlerFactory
 * @package App\Handler\Factory
 */
class UsuariosListarUmHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosListarUmHandler
     */
    public function __invoke(ContainerInterface $container): UsuariosListarUmHandler
    {
        return new UsuariosListarUmHandler($container);
    }
}