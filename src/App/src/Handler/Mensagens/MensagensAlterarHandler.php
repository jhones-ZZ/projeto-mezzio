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
 * Class MensagensAlterarHandler
 * @package App\Handler\Mensagens
 */
class MensagensAlterarHandler extends HandlerAbstract implements RequestHandlerInterface
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

            $service = $this->container->get(MensagensService::class);
            $message = $service->update($data);

            $response = $this->successResponse($message);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao alterar os dados da mensagem!',
                400
            );
        }

        return $response;
    }
}