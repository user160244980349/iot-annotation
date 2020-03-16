<?php

namespace App\Core\Controller;

use App\Core\Request;

/**
 * WelcomeController.php
 *
 * Controller class to load home page.
 */
class RouteException
{
    /**
     * Go to 404 page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function notFound (Request $request)
    {
        print("Route not found 404");
    }

    /**
     * Go to 403 page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function forbidden (Request $request)
    {
        print("Forbidden 403");
    }
}
