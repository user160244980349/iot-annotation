<?php

namespace App\Controller;

use App\Object\Request;
use App\Object\View;
use App\Object\ServiceBus;
use App\Model\User;

/**
 * RouteException.php
 *
 * Controller class to load exciption pages.
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

        if (!ServiceBus::get('auth')->authenticated()) {
            $request->view = new View('404.tpl', [
                'title' => '404 Exception',
            ]);
            return;
        }

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
     * @param Request $request.
     * @access public.
     */
    public static function toForbiddenPage (Request $request)
    {

        if (!ServiceBus::get('auth')->authenticated()) {
            $request->view = new View('403.tpl', [
                'title' => '403 Exception',
            ]);
            return;
        }

        $data = ServiceBus::get('auth')->user();
        $request->view = new View('403.tpl', [
            'title' => '403 Exception',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
