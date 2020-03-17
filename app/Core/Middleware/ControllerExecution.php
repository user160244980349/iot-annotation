<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Middleware\MiddlewareInterface;

/**
 * ControllerExecution.php
 *
 * Service class for exec controller algorithm.
 */
class ControllerExecution implements MiddlewareInterface
{
    /**
     * MiddlewareInterface method.
     *
     * @param Request $request.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        forward_static_call($request->route->controller, $request, ...$request->route->args);
        return $request;
    }

}
