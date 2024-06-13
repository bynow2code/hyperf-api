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

namespace App\Controller;


use App\Service\IndexService;
use Hyperf\Di\Annotation\Inject;

class IndexController extends AbstractController
{
    #[inject]
    protected IndexService $indexService;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        $result = $this->indexService->index($user, $method);
        
        return $this->success($result);
    }
}
