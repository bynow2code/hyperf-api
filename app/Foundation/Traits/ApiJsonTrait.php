<?php

namespace App\Foundation\Traits;

use App\Constants\ErrorCode;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;

trait ApiJsonTrait
{
    #[Inject]
    protected ContainerInterface $container;

    #[Inject]
    protected RequestInterface $request;

    #[Inject]
    protected ResponseInterface $response;

    protected function success(array $data = [], string $message = null, int $code = ErrorCode::SERVER_OK)
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message ?? ErrorCode::getMessage($code),
            'data' => $data,
        ]);
    }

    protected function error(string $message = null, $code = ErrorCode::SERVER_ERROR, array $data = [])
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message ?? ErrorCode::getMessage($code),
            'data' => $data,
        ]);
    }
}