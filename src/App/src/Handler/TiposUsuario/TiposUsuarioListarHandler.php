<?php

declare(strict_types=1);

namespace App\Handler\TiposUsuario;

use App\Handler\HandlerAbstract;
use App\Service\TiposUsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class TiposUsuarioListarHandler
 * @package App\Handler\TiposUsuario
 */
class TiposUsuarioListarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $service = $this->container->get(TiposUsuarioService::class);
            $resultWithDQL = $service->getAll();
            $resultWithoutDQL = $service->getAllWithDQL();

            $response = $this->successResponse([
                'result_with_dql' => $resultWithDQL,
                'result_without_dql' => $resultWithoutDQL
            ]);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao listar os tipos de usuário',
                400
            );
        }

        return $response;
    }
}