<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Route;
use App\Core\Middleware\MiddlewareInterface;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Auth implements MiddlewareInterface
{
    /**
     * StageInterface method.
     *
     * @param Request $null Null because not needed.
     * @return Request Initialized request object.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        if (0) {
            $request->route = new Route('forbidden', ['App\Core\Controller\RouteException', 'forbidden'], []);
        }
        return $request;
    }

}
