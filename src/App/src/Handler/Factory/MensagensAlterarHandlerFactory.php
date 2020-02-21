<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Mensagens\MensagensAlterarHandler;
use Psr\Container\ContainerInterface;

/**
 * Class MensagensAlterarHandlerFactory
 * @package App\Handler\Factory
 */
class MensagensAlterarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagensAlterarHandler
     */
    public function __invoke(ContainerInterface $container): MensagensAlterarHandler
    {
        return new MensagensAlterarHandler($container);
    }
}