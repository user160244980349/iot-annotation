<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\ServiceBus;
use App\Core\View;

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
        $request->view = new View('login.tpl', ['title' => 'Login', 'auth' => 0]);
    }

    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function login (Request $request)
    {
        $request->view = new View('home.tpl', ['title' => 'Home', 'auth' => 0]);
    }
}
