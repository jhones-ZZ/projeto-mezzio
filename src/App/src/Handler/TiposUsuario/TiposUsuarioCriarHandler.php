<?php

declare(strict_types=1);

namespace App\Handler\TiposUsuario;

use App\Handler\HandlerAbstract;
use App\Service\TiposUsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Json\Json;

/**
 * Class TiposUsuarioCriarHandler
 * @package App\Handler\TiposUsuario
 */
class TiposUsuarioCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

            $service = $this->container->get(TiposUsuarioService::class);
            $userType = $service->insert($data);

            $response = $this->successResponse($userType, 201);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao criar o tipo de usuário!',
                400
            );
        }

        return $response;
    }
}