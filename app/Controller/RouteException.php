<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;

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
    public static function toNotFoundPage (Request $request)
    {
        $request->view = new View('404.tpl', ['title' => '404 Exception', 'auth' => $auth]);
    }

    /**
     * Go to 403 page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toForbiddenPage (Request $request)
    {
        $request->view = new View('403.tpl', ['title' => '403 Exception', 'auth' => $auth]);
    }
}
