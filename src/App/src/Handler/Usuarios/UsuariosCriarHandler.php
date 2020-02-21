<?php

declare(strict_types=1);

namespace App\Handler\Usuarios;

use App\Handler\HandlerAbstract;
use App\Service\UsuariosService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Json\Json;

/**
 * Class UsuariosCriarHandler
 * @package App\Handler\Usuarios
 */
class UsuariosCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

            $service = $this->container->get(UsuariosService::class);
            $user = $service->insert($data);

            $response = $this->successResponse($user, 201);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao criar um novo usuário',
                400
            );
        }

        return $response;
    }
}