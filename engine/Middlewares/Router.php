<?php

namespace Engine\Middlewares;

use Engine\Decorators\Configuration;
use Engine\Request;
use Error;

/**
 * Router.php
 *
 * Simple router class for managing url's.
 */
class Router implements IMiddleware
{
    /**
     * Map for url's and controllers.
     *
     * @access private
     * @var array
     */
    private $_routes;

    /**
     * Router constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $this->_routes = Configuration::get('routes');
    }

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request Modified request
     * @throws Error
     */
    public function let(Request $request): Request
    {
        foreach ($this->_routes as $route) {
            if ($route->test($request->parameters['uri'],
                             $request->parameters['method'])) {
                
                $request->route = $route;
                return $request;
            }
        }

        throw new Error('The requested route does not exist!', 404);
    }

}
