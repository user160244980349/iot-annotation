<?php

namespace Engine\Middlewares;

use Engine\Decorators\Auth as AuthService;
use Engine\Decorators\Configuration;
use Engine\Request;
use Error;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class Auth implements IMiddleware
{

    /**
     * Method providing mediators chain call.
     *
     * @access public.
     * @param Request $request
     * @return Request Modified request
     * @throws Error
     */
    public function let(Request $request): Request
    {
        $permissions = Configuration::get('permissions');

        if (!array_key_exists($request->route->name, $permissions)) {
            return $request;
        }

        $route_permissions = $permissions[$request->route->name];
        $id = AuthService::authenticated();
        if (isset($id) && AuthService::allowed($id, $route_permissions)) {
            return $request;
        }

        throw new Error('You do not have access to this page!', 403);
    }

}
