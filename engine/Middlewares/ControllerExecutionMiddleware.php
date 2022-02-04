<?php

namespace Engine\Middlewares;

use Engine\Middlewares\IMiddleware;
use Engine\Request;

/**
 * ControllerExecution.php
 *
 * Middleware class for executing controllers.
 */
class ControllerExecutionMiddleware implements IMiddleware
{
    
    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request
     */
    public function let(?Request $request): Request
    {
        $request->route->execute($request);
        return $request;
    }

}
