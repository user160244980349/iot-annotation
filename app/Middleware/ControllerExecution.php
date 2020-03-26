<?php

namespace App\Middleware;

use App\Object\Request;
use App\Middleware\MiddlewareInterface;

/**
 * ControllerExecution.php
 *
 * Middleware class for exec controllers.
 */
class ControllerExecution implements MiddlewareInterface
{
    /**
     * Method providing middlewares chain call.
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
