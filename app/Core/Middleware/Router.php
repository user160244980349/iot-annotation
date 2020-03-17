<?php

namespace App\Core\Middleware;

use App\Core\ServiceBus;
use App\Core\Request;
use App\Core\Route;
use App\Core\Middleware\MiddlewareInterface;

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
     * StageInterface method.
     *
     * @param Request $request.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        foreach ($this->_routes as $route) {

            if ($route['method'] == $request->method &&
                preg_match($route['pattern'], $request->parameters['route'], $params_matches)) {
                array_shift($params_matches);

                $request->route = new Route (
                    $route['name'],
                    $route['controller'],
                    $params_matches
                );

                return $request;
            }
        }

        $request->route = new Route ('notFound', ['App\Core\Controller\RouteException', 'notFound'], []);

        return $request;
    }

    /**
     * Router constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->_routes = ServiceBus::get('conf')->get('routes');
    }

}
