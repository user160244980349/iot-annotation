<?php

namespace App\Core\Middlewares;

use App\Core\AppState;
use App\Core\Middlewares\MiddlewareInterface;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Receiver implements MiddlewareInterface
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
