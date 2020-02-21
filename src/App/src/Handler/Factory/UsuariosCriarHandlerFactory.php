<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Usuarios\UsuariosCriarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class UsuariosCriarHandlerFactory
 * @package App\Handler\Factory
 */
class UsuariosCriarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuariosCriarHandler
     */
    public function __invoke(ContainerInterface $container): UsuariosCriarHandler
    {
        return new UsuariosCriarHandler($container);
    }
}