<?php

namespace Engine\Mediators;

use Engine\Request;

/**
 * ControllerExecution.php
 *
 * Middleware class for exec controllers.
 */
class ControllerExecution implements IMediator
{
    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request .
     * @return Request Modified container.
     * @access public.
     */
    public function let(Request $request): Request
    {
        forward_static_call($request->route->controller, $request, ...$request->route->args);
        return $request;
    }

}
