<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\ServiceBus;

/**
 * WelcomeController.php
 *
 * Controller class to load home page.
 */
class Login
{

    /**
     * Go to login page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toLoginPage (Request $request)
    {
        if (ServiceBus::get('session')->get('user_id')) {
            header("location: /home");
        }

        $request->view = new View('login.tpl', [
            'title' => 'Login',
        ]);
    }

    /**
     * Log user in.
     *
     * @param Request $request.
     * @access public.
     */
    public static function login (Request $request)
    {
        if (ServiceBus::get('auth')->login(
            $request->parameters['username'],
            $request->parameters['password'])) {
            header("location: /home");
            exit;
        }
        header("location: /login");
        exit;
    }

    /**
     * Log user out.
     *
     * @param Request $request.
     * @access public.
     */
    public static function logout (Request $state)
    {
        ServiceBus::get('auth')->logout();
        header("location: /");
        exit;
    }

}
