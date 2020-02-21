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
 * Class UsuariosAlterarHandler
 * @package App\Handler\Usuario
 */
class UsuariosAlterarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);
            $data['id'] = (int)$request->getAttribute('id');

            $service = $this->container->get(UsuariosService::class);
            $user = $service->update($data);

            $response = $this->successResponse($user);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao alterar os dados do usuário!',
                400
            );
        }

        return $response;
    }
}