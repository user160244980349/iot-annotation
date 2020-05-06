<?php

namespace Engine\Mediators;

use Engine\Request;
use Engine\Decorators\Configuration;
use Engine\Decorators\Auth as AuthService;
use Error;

/**
 * Service.php
 *
 * Class Service checks access to pages.
 */
class Auth implements IMediator
{

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request .
     * @return Request Modified request.
     * @access public.
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
