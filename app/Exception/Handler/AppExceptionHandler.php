<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Exception\Handler;

use App\Foundation\Traits\ApiResponseTrait;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    use ApiResponseTrait;

    public function __construct(protected StdoutLoggerInterface $logger)
    {
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $errorMessage = sprintf('Internal Server Error [%s]: %s[%s] in %s', $throwable->getCode(), $throwable->getMessage(), $throwable->getLine(), $throwable->getFile());
        $this->stopPropagation();
        return $this->error($throwable->getCode(), $errorMessage,);
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
