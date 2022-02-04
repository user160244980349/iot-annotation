<?php

namespace Engine\Middlewares;

use Engine\Services\CSRFService;
use Engine\Middlewares\IMiddleware;
use Engine\Request;
use Engine\Config;
use Error;

/**
 * Auth.php
 *
 * Class Auth checks access to pages.
 */
class CSRFMiddleware implements IMiddleware
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
        if ($request->parameters['method'] == 'get') return $request;
        
        if (!isset($request->parameters['csrf_token'])) {
            throw new Error('Cross-Site request forgery!', 403);
        }

        if (!CSRFService::test($request->parameters['csrf_token'])) {
            throw new Error('Cross-Site request forgery!', 403);
        }

        return $request;
        
    }

}
