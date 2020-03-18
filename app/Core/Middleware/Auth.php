<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Route;
use App\Core\ServiceBus;
use App\Core\Middleware\MiddlewareInterface;

/**
 * View.php
 *
 * Class View - template manager, that collects variables and injects those in templates.
 */
class Auth implements MiddlewareInterface
{
    /**
     * StageInterface method.
     *
     * @param Request $request.
     * @return Request Modified container.
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
