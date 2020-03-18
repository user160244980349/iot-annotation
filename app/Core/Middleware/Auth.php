<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Route;
use App\Core\ServiceBus;
use App\Core\Middleware\MiddlewareInterface;

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
