<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Container\ContainerInterface;

/**
 * Class HandlerAbstract
 * @package App\Handler
 */
abstract class HandlerAbstract
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * HandlerAbstract constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $response
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function successResponse(array $response, int $statusCode = 200): JsonResponse
    {
        return new JsonResponse([
            'data' => $response
        ], $statusCode);
    }

    /**
     * @param \Exception $e
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function errorResponse(\Exception $e, string $message, int $statusCode = 400): JsonResponse
    {
        return new JsonResponse([
            'error' => true,
            'status_code'=> $statusCode,
            'message' => $message,
            'message_description' => $e->getMessage()
        ], $statusCode);
    }
 }
