<?php

namespace Engine\Auth;

use Engine\Middleware\Bundled\IMiddleware;
use Engine\Receive\Request;
use Engine\Config;
use Error;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class AuthMiddleware implements IMiddleware
{

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    private array $_permissions_sets;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public function __construct()
    {
        $this->_permissions_sets = Config::get('permissions');
    }

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request
     * @throws Error
     */
    public function let(?Request $request): Request
    {
        foreach ($this->_permissions_sets as $permission_set) {
            if ($permission_set->test($request->route->name)) {

                $id = Facade::authenticated();
                if (isset($id) && Facade::allowed($id, $permission_set->permissions)) {
                    return $request;
                } else {
                    throw new Error('You do not have access to this page!', 403);
                }
            }
        }

        return $request;

    }

}
