<?php

namespace App\Middleware;

use App\Object\Request;
use App\Object\Route;
use App\Object\ServiceBus;
use App\Middleware\MiddlewareInterface;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class Auth implements MiddlewareInterface
{

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request.
     * @return Request Modified request.
     * @access public.
     */
    public function let (Request $request) : Request
    {

        $permissions = ServiceBus::get('conf')->get('permissions')[$request->route->name];

        if (!isset($permissions)) {
            return $request;
        }

        if (ServiceBus::get('auth')->allowed($permissions)) {
            return $request;
        }

        $request->route = new Route('forbidden.get', ['App\Controller\RouteException', 'toForbiddenPage'], []);

        return $request;
    }

}
