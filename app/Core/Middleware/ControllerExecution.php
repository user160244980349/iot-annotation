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
     * StageInterface method.
     *
     * @param Request $state.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        $request->controllerCall->exec($request);
        return $request;
    }

}
