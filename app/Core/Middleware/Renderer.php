<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Middleware\MiddlewareInterface;

/**
 * View.php
 *
 * Class View - template manager, that collects variables and injects those in templates.
 */
class Renderer implements MiddlewareInterface
{
    /**
     * StageInterface method.
     *
     * @param Request $request.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        $request->view->display();
        return $request;
    }

}
