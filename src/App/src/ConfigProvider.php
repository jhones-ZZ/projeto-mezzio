<?php

declare(strict_types=1);

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
                Handler\PingHandler::class => Handler\PingHandler::class,
            ],
            'factories'  => [
                Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,
                Handler\TestDoctrineConnectionHandler::class => Handler\Factory\TestDoctrineConnectionHandlerFactory::class,

                //Handlers de Tipos de Usuário
                Handler\TiposUsuario\TiposUsuarioListarHandler::class => Handler\Factory\TiposUsuarioListarHandlerFactory::class,
                Handler\TiposUsuario\TiposUsuarioListarUmHandler::class => Handler\Factory\TiposUsuarioListarUmHandlerFactory::class,
                Handler\TiposUsuario\TiposUsuarioCriarHandler::class => Handler\Factory\TiposUsuarioCriarHandlerFactory::class,
                Handler\TiposUsuario\TiposUsuarioAlterarHandler::class => Handler\Factory\TiposUsuarioAlterarHandlerFactory::class,
                Handler\TiposUsuario\TiposUsuarioDeletarHandler::class => Handler\Factory\TiposUsuarioDeletarHandlerFactory::class,

                //Handlers de Usuários
                Handler\Usuarios\UsuariosListarHandler::class => Handler\Factory\UsuariosListarHandlerFactory::class,
                Handler\Usuarios\UsuariosListarUmHandler::class => Handler\Factory\UsuariosListarUmHandlerFactory::class,
                Handler\Usuarios\UsuariosCriarHandler::class => Handler\Factory\UsuariosCriarHandlerFactory::class,
                Handler\Usuarios\UsuariosAlterarHandler::class => Handler\Factory\UsuariosAlterarHandlerFactory::class,
                Handler\Usuarios\UsuariosDeletarHandler::class => Handler\Factory\UsuariosDeletarHandlerFactory::class,

                //Handlers de Mensagens
                Handler\Mensagens\MensagensListarHandler::class => Handler\Factory\MensagensListarHandlerFactory::class,
                Handler\Mensagens\MensagensListarUmaHandler::class => Handler\Factory\MensagensListarUmaHandlerFactory::class,
                Handler\Mensagens\MensagensCriarHandler::class => Handler\Factory\MensagensCriarHandlerFactory::class,
                Handler\Mensagens\MensagensAlterarHandler::class => Handler\Factory\MensagensAlterarHandlerFactory::class,
                Handler\Mensagens\MensagensDeletarHandler::class => Handler\Factory\MensagensDeletarHandlerFactory::class,


                //Registrando Serviços
                Service\TiposUsuarioService::class => Service\Factory\TiposUsuarioServiceFactory::class,
                Service\UsuariosService::class => Service\Factory\UsuariosServiceFactory::class,
                Service\MensagensService::class => Service\Factory\MensagensServiceFactory::class
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
