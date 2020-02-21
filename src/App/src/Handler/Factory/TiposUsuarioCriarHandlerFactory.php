<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TiposUsuario\TiposUsuarioCriarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class TiposUsuarioCriarHandlerFactory
 * @package App\Handler\Factory
 */
class TiposUsuarioCriarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TiposUsuarioCriarHandler
     */
    public function __invoke(ContainerInterface $container): TiposUsuarioCriarHandler
    {
        return new TiposUsuarioCriarHandler($container);
    }
}