<?php

namespace App\Controller;

use Engine\Entity\Request;
use Engine\Entity\ServiceBus;
use Engine\Entity\View;

/**
 * WelcomeController.php
 *
 * Controller class for loading login page.
 */
class Login
{

    /**
     * Go to login page.
     *
     * @access public.
     * @param Request $request.
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
     * @access public.
     * @param Request $request.
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
     * @access public.
     * @param Request $request.
     */
    public static function logout(Request $request)
    {
        ServiceBus::get('auth')->logout();
        header("location: /");
        exit;
    }

}
