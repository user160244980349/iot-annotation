<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\ServiceBus;
use App\Model\User;

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
        $id = ServiceBus::get('session')->get('user_id');

        if (!isset($id)) {
            $request->view = new View('404.tpl', [
                'title' => '404 Exception',
            ]);
            return;
        }

        $data = User::getById($id);
        $request->view = new View('404.tpl', [
            'title' => '404 Exception',
            'user_id' => $data['user_id'],
            'username' => $data['user_name'],
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
        $id = ServiceBus::get('session')->get('user_id');

        if (!isset($id)) {
            $request->view = new View('403.tpl', [
                'title' => '403 Exception',
            ]);
            return;
        }

        $data = User::getById($id);
        $request->view = new View('403.tpl', [
            'title' => '403 Exception',
            'user_id' => $data['user_id'],
            'username' => $data['user_name'],
        ]);
    }
}
