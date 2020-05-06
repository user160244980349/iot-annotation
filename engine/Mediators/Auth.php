<?php

namespace Engine\Mediators;

use Engine\Decorators\Auth as AuthService;
use Engine\Decorators\Configuration;
use Engine\Request;
use Error;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class Auth implements IMediator
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

        $permissions = Configuration::get('permissions')[$request->route->name];
        if (!isset($permissions)) {
            return $request;
        }

        $id = AuthService::userId();
        if (isset($id) && AuthService::allowed($id, $permissions)) {
            return $request;
        }

        throw new Error('You do not have access to this page!', 403);
    }

}
