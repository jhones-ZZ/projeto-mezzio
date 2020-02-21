<?php

declare(strict_types=1);

namespace App\Handler\Usuarios;

use App\Handler\HandlerAbstract;
use App\Service\UsuariosService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class UsuariosDeletarHandler
 * @package App\Handler\Usuarios
 */
class UsuariosDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        try {
            $service = $this->container->get(UsuariosService::class);
            $service->delete($id);

            $response = $this->successResponse([
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao deletar o usuário com o id ' . $id,
                400
            );
        }

        return $response;
    }
}