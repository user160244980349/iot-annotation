<?php

namespace App\Controller;

use Engine\Entity\Request;
use Engine\Entity\ServiceBus;
use Engine\Entity\View;

/**
 * RouteException.php
 *
 * Controller class to load exception pages.
 */
class RouteException
{

    /**
     * Go to 404 page.
     *
     * @access public.
     * @param Request $request.
     */
    public static function toNotFoundPage(Request $request)
    {
        $data = ServiceBus::get('auth')->user();
        $request->view = new View('404.tpl', [
            'title' => '404 Exception',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

    /**
     * Go to 403 page.
     *
     * @access public.
     * @param Request $request.
     */
    public static function toForbiddenPage(Request $request)
    {
        $data = ServiceBus::get('auth')->user();
        $request->view = new View('403.tpl', [
            'title' => '403 Exception',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
