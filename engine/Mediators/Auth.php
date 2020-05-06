<?php

namespace Engine\Mediators;

use Engine\Request;
use Engine\ServiceBus;
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

        $permissions = ServiceBus::get('conf')->get('permissions')[$request->route->name];

        if (!isset($permissions)) {
            return $request;
        }

        if (ServiceBus::get('auth')->allowed($permissions)) {
            return $request;
        }

        throw new Error('You do not have access to this page!', 403);
    }

}
