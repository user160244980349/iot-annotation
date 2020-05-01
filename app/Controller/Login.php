<?php

namespace App\Controller;

use Engine\Entity\Request;
use Engine\Entity\ServiceBus;
use Engine\Entity\View;

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
    public static function toLoginPage(Request $request)
    {
        if (ServiceBus::get('auth')->authenticated()) {
            header("location: /home");
            exit;
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
    public static function login(Request $request)
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
    public static function logout(Request $request)
    {
        ServiceBus::get('auth')->logout();
        header("location: /");
        exit;
    }

}
