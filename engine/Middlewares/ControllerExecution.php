<?php

namespace Engine\Middlewares;

use Engine\Request;

/**
 * ControllerExecution.php
 *
 * Middleware class for execing controllers.
 */
class ControllerExecution implements IMiddleware
{
    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request Modified container
     */
    public function let(Request $request): Request
    {
        forward_static_call($request->route->controller, $request, ...$request->route->args);
        return $request;
    }

}
