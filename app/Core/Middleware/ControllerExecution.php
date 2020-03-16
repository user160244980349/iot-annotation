<?php

namespace App\Core\Middleware;

use App\Core\AppState;
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
     * @param AppState $state.
     * @return AppState Modified container.
     * @access public.
     */
    public function let (AppState $state)
    {
        $state->controllerCall->exec($state);
        return $state;
    }

}
