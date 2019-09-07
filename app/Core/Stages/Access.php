<?php

namespace App\Core\Stages;

use App\Core\AppState;

/**
 * Access.php
 *
 * Service class for checking if user has access to controller actions.
 */
class Access implements StageInterface
{
    /**
     * StageInterface method.
     *
     * @param AppState $state.
     * @return AppState Container, that modified on this stage.
     * @access public.
     */
    public function let (AppState $state)
    {
        return $state;
    }

}