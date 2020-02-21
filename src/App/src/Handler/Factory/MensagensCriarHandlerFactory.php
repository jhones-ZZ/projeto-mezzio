<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Mensagens\MensagensCriarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensCriarHandlerFactory
 * @package App\Handler\Factory
 */
class MensagensCriarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensCriarHandler
     */
    public function __invoke(ContainerInterface $container): MensagensCriarHandler
    {
        return new MensagensCriarHandler($container);
    }
}