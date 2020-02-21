<?php

declare(strict_types=1);

namespace App\Handler\TiposUsuario;

use App\Handler\HandlerAbstract;
use App\Service\TiposUsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class TiposUsuarioDeletarHandler
 * @package App\Handler\TiposUsuario
 */
class TiposUsuarioDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = (int)$request->getAttribute('id');

            $service = $this->container->get(TiposUsuarioService::class);
            $service->delete($id);

            $response = $this->successResponse([
                'message' => 'O tipo de usuário foi deletado com sucesso!'
            ]);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao deletar o tipo de usuário!',
                400
            );
        }

        return $response;
    }
}