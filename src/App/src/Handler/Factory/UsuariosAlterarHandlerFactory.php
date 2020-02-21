<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Usuarios\UsuariosAlterarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosAlterarHandlerFactory
 * @package App\Handler\Factory
 */
class UsuariosAlterarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosAlterarHandler
     */
    public function __invoke(ContainerInterface $container): UsuariosAlterarHandler
    {
        return new UsuariosAlterarHandler($container);
    }
}