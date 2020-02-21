<?php

declare(strict_types=1);

namespace App\Handler\Mensagens;

use App\Handler\HandlerAbstract;
use App\Service\MensagensService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Json\Json;

/**
 * Class MensagensCriarHandler
 * @package App\Handler\Mensagens
 */
class MensagensCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

            $service = $this->container->get(MensagensService::class);
            $message = $service->insert($data);

            $response = $this->successResponse($message, 201);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao criar um novo registro de mensagem!',
                400
            );
        }

        return $response;
    }
}