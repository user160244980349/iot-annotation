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
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toLoginPage (Request $request)
    {
        $request->view = new View('login.tpl', [
            'title' => 'Login',
        ]);
    }

    /**
     * Go to home page.
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
     * Log user in.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function logout (Request $state)
    {
        ServiceBus::get('auth')->logout();
        header("location: /");
        exit;
    }
}
