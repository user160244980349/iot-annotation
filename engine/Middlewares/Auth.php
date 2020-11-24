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
     * Method providing middlewares chain call.
     *
     * @access public.
     * @param Request $request
     * @return Request Modified request
     * @throws Error
     */
    public function let(Request $request): Request
    {

        $permission_sets = Configuration::get('permissions');

        foreach ($permission_sets as $permission_set) {
            if ($permission_set->test($request->route->name)) {

                $id = AuthService::authenticated();
                if (isset($id) && AuthService::allowed($id, $permission_set->permissions)) {
                    return $request;
                } else {
                    throw new Error('You do not have access to this page!', 403);
                }
            }
        }

        return $request;

    }

}
