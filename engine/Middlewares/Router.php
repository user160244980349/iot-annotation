<?php

namespace Engine\Middlewares;

use Engine\Settings;
use Engine\Request;
use Error;

/**
 * Router.php
 *
 * Simple router class for managing urls.
 */
class Router implements IMiddleware
{
    /**
     * Map for url's and controllers.
     *
     * @access private
     * @var array
     */
    private static $_routes;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public static function register(array $routes): void
    {
        static::$_routes = $routes;
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
        foreach (static::$_routes as $route) {
            if ($route->test($request->parameters['uri'],
                             $request->parameters['method'])) {
                
                $request->route = $route;
                return $request;
            }
        }
        
        throw new Error('The requested route does not exist!', 404);
    }

}
