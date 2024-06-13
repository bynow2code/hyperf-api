<?php

namespace App\Foundation\Traits;

use App\Constants\ErrorCode;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;

trait ApiResponseTrait
{
    #[Inject]
    protected ContainerInterface $container;

    #[Inject]
    protected RequestInterface $request;

    #[Inject]
    protected ResponseInterface $response;

    protected function success(array $data = [], string $message = null, int $code = ErrorCode::SERVER_OK)
    {
        if (is_null($message)) {
            $message = ErrorCode::getMessage($code);
        }

        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function error($code = ErrorCode::SERVER_ERROR, string $message = null, array $data = [])
    {
        if (is_null($message)) {
            $message = ErrorCode::getMessage($code);
        }

        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }
}