<?php

namespace Engine\Mediators;

use Engine\Decorators\Configuration;
use Engine\Request;
use Engine\Route;
use Error;

/**
 * Router.php
 *
 * Simple router class for manage url's.
 */
class Router implements IMediator
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
     * Method providing mediator chain call.
     *
     * @access public
     * @param Request $request
     * @return Request Modified request
     * @throws Error
     */
    public function let(Request $request): Request
    {
        foreach ($this->_routes as $route) {
            if ($route['method'] == $request->parameters['method'] &&
                preg_match($route['pattern'], $request->parameters['uri'], $params_matches)) {
                array_shift($params_matches);

                $request->route = new Route (
                    $route['name'],
                    $route['controller'],
                    $params_matches
                );

                return $request;
            }
        }

        throw new Error('The requested route does not exist!', 404);
    }

}
