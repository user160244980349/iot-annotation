<?php

namespace Engine\Mediators;

use Engine\Request;

/**
 * ControllerExecution.php
 *
 * Mediator class for exec controllers.
 */
class ControllerExecution implements IMediator
{
    /**
     * Method providing mediators chain call.
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
