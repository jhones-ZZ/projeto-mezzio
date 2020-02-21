<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Mensagens\MensagensListarUmaHandler;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensListarUmaHandlerFactory
 * @package App\Handler\Factory
 */
class MensagensListarUmaHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensListarUmaHandler
     */
    public function __invoke(ContainerInterface $container): MensagensListarUmaHandler
    {
        return new MensagensListarUmaHandler($container);
    }
}