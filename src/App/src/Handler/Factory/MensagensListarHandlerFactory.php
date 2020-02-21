<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Mensagens\MensagensListarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensListarHandlerFactory
 * @package App\Handler\Factory
 */
class MensagensListarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensListarHandler
     */
    public function __invoke(ContainerInterface $container): MensagensListarHandler
    {
        return new MensagensListarHandler($container);
    }
}