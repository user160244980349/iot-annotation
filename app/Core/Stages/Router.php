<?php

namespace App\Core\Stages;

use App\Core\ControllerCall;
use App\Core\AppState;

/**
 * Router.php
 *
 * Simple router class for manage url's.
 */
class Router implements StageInterface
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
     * @param AppState $state.
     * @return AppState Modified container.
     * @access public.
     */
    public function let (AppState $state)
    {
        foreach ($this->_routes[$state->request->method] as $route_pattern => $controller) {
            if (preg_match($route_pattern, $state->request->parameters['route'], $params_matches)) {
                array_shift($params_matches);
                $controllerCall = new ControllerCall($controller, $params_matches);
                break;
            }
        }

        if (isset($controllerCall)) {
            $state->controllerCall = $controllerCall;
        } else {
            $state->controllerCall = new ControllerCall(['App\Controller\ExceptionController', 'notFound'], []);
        }

        return $state;
    }

    /**
     * Router constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        global $config;
        $this->_routes = require_once $config['routes'];
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