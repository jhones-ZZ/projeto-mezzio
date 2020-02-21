<?php

declare(strict_types=1);

namespace App\Handler\Mensagens;

use App\Handler\HandlerAbstract;
use App\Service\MensagensService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class MensagensListarUmaHandler
 * @package App\Handler\Mensagens
 */
class MensagensListarUmaHandler extends HandlerAbstract implements RequestHandlerInterface
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
            $resultWithDQL = $service->getOne($id);
            $resultWithoutDQL = $service->getOneWithDQL($id);

            $response = $this->successResponse([
                'error' => true,
                'message' => 'Nenhum registro encontrado'
            ], 404);

            if (!empty($resultWithDQL) && !empty($resultWithoutDQL)) {
                $response = $this->successResponse([
                    'result_with_dql' => $resultWithDQL,
                    'result_without_dql' => $resultWithoutDQL
                ]);
            }
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Erro ao listar a mensagem com o id ' . $id,
                400
            );
        }

        return $response;
    }
}