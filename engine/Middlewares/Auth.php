<?php

namespace Engine\Middlewares;

use Engine\Decorators\Auth as AuthService;
use Engine\Decorators\Configuration;
use Engine\Request;
use Engine\Settings;
use Error;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class Auth implements IMiddleware
{

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    private static $_permissions_sets;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public static function register(array $permissions_sets): void
    {
        static::$_permissions_sets = $permissions_sets;
    }

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request
     * @throws Error
     */
    public static function let(Request $request): Request
    {
        foreach (static::$_permissions_sets as $permission_set) {
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
