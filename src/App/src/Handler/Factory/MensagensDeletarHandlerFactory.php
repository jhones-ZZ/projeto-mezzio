<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Mensagens\MensagensDeletarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensDeletarHandlerFactory
 * @package App\Handler\Factory
 */
class MensagensDeletarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensDeletarHandler
     */
    public function __invoke(ContainerInterface $container): MensagensDeletarHandler
    {
        return new MensagensDeletarHandler($container);
    }
}