<?php

namespace Engine\Middleware;

use Engine\Entity\Request;
use Engine\Entity\Route;
use Engine\Entity\ServiceBus;

/**
 * Router.php
 *
 * Simple router class for manage url's.
 */
class Router implements MiddlewareInterface
{
    /**
     * Map for url's and controllers.
     *
     * @var array.
     * @access private.
     */
    private $_routes;

    /**
     * Router constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        $this->_routes = ServiceBus::get('conf')->get('routes');
    }

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request .
     * @return Request Modified request.
     * @access public.
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

        $request->route = new Route ('not_found.get', ['App\Controller\RouteException', 'toNotFoundPage'], []);

        return $request;
    }

}
