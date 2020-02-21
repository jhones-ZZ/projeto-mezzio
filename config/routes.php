<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Mezzio\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
    $app->get(
        '/api/test-doctrine-connection',
        App\Handler\TestDoctrineConnectionHandler::class,
        'api.test-doctrine-connection'
    );
    $app->get(
        '/api/tipos-de-usuario',
        App\Handler\TiposUsuario\TiposUsuarioListarHandler::class,
        'api.tipos-de-usuario.listar-todos'
    );
    $app->get(
        '/api/tipos-de-usuario/{id}',
        App\Handler\TiposUsuario\TiposUsuarioListarUmHandler::class,
        'api.tipos-de-usuario.listar-um'
    );
    $app->post(
        '/api/tipos-de-usuario',
        App\Handler\TiposUsuario\TiposUsuarioCriarHandler::class,
        'api.tipos-de-usuario.criar'
    );
    $app->put(
        '/api/tipos-de-usuario/{id}',
        App\Handler\TiposUsuario\TiposUsuarioAlterarHandler::class,
        'api.tipos-de-usuario.alterar'
    );
    $app->delete(
        '/api/tipos-de-usuario/{id}',
        App\Handler\TiposUsuario\TiposUsuarioDeletarHandler::class,
        'api.tipos-de-usuario.deletar'
    );
    $app->get(
        '/api/usuarios',
        App\Handler\Usuarios\UsuariosListarHandler::class,
        'api.usuarios.listar-todos'
    );
    $app->get(
        '/api/usuarios/{id}',
        App\Handler\Usuarios\UsuariosListarUmHandler::class,
        'api.usuarios.listar-um'
    );
    $app->post(
        '/api/usuarios',
        App\Handler\Usuarios\UsuariosCriarHandler::class,
        'api.usuarios.criar'
    );
    $app->put(
        '/api/usuarios/{id}',
        App\Handler\Usuarios\UsuariosAlterarHandler::class,
        'api.usuarios.alterar'
    );
    $app->delete(
        '/api/usuarios/{id}',
        App\Handler\Usuarios\UsuariosDeletarHandler::class,
        'api.usuarios.deletar'
    );
    $app->get(
        '/api/mensagens',
        App\Handler\Mensagens\MensagensListarHandler::class,
        'api.mensagens.listar-todas'
    );
    $app->get(
        '/api/mensagens/{id}',
        App\Handler\Mensagens\MensagensListarUmaHandler::class,
        'api.mensagens.listar-uma'
    );
    $app->post(
        '/api/mensagens',
        App\Handler\Mensagens\MensagensCriarHandler::class,
        'api.mensagens.criar'
    );
    $app->put(
        '/api/mensagens/{id}',
        App\Handler\Mensagens\MensagensAlterarHandler::class,
        'api.mensagens.alterar'
    );
    $app->delete(
        '/api/mensagens/{id}',
        App\Handler\Mensagens\MensagensDeletarHandler::class,
        'api.mensagens.deletar'
    );
};
