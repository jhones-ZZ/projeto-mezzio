<?php

declare(strict_types=1);

namespace App\Handler\Mensagens;

use App\Handler\HandlerAbstract;
use App\Service\MensagensService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class MensagensDeletarHandler
 * @package App\Handler\Mensagens
 */
class MensagensDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        try {
            $service = $this->container->get(MensagensService::class);
            $service->delete($id);

            $response = $this->successResponse([
                'message' => 'Mensagem deletada com sucesso!'
            ]);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao deletar a mensagem com o id ' . $id,
                400
            );
        }

        return $response;
    }
}