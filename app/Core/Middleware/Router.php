<?php

namespace App\Core\Middleware;

use App\Core\ControllerCall;
use App\Core\Request;
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
     * @param Request $state.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        foreach ($this->_routes[$request->method] as $route_pattern => $controller) {
            if (preg_match($route_pattern, $request->parameters['route'], $params_matches)) {
                array_shift($params_matches);
                $controllerCall = new ControllerCall($controller, $params_matches);
                break;
            }
        }

        if (isset($controllerCall)) {
            $request->controllerCall = $controllerCall;
        } else {
            $request->controllerCall = new ControllerCall(['App\Controller\ExceptionController', 'notFound'], []);
        }

        return $request;
    }

    /**
     * Router constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        global $fsmap;
        $this->_routes = require_once $fsmap['routes'];
    }

    /**
     * Router destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->_routes = null;
    }

}
