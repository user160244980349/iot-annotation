<?php

namespace App\Core\Stages;

use App\Core\AppState;

/**
 * ControllerExecution.php
 *
 * Service class for exec controller algorithm.
 */
class ControllerExecution implements StageInterface
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