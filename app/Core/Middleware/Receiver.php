<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Middleware\MiddlewareInterface;

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
     * @param Request $null Null because not needed.
     * @return Request Initialized request object.
     * @access public.
     */
    public function let (Request $null = null) : Request
    {
        return new Request();
    }

}
