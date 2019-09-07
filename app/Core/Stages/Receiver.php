<?php

namespace App\Core\Stages;

use App\Core\AppState;

/**
 * Receiver.php
 *
 * Service class for parsing incoming request.
 */
class Receiver implements StageInterface
{
    /**
     * StageInterface method.
     *
     * @param AppState $null Null because not needed.
     * @return AppState Initialized request object.
     * @access public.
     */
    public function let (AppState $null = null)
    {
        return new AppState();
    }

}