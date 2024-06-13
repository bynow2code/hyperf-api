<?php
declare(strict_types=1);

namespace App\Service;

use App\Constants\ErrorCode;

class IndexService extends BaseService
{
    public function index($user, $method)
    {
//        $this->throwException("service error message", ErrorCode::SERVER_ERROR);

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}