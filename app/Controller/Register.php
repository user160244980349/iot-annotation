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
class Register
{
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toRegisterPage (Request $request)
    {
        $request->view = new View('register.tpl', ['title' => 'Register', 'auth' => 0]);
    }
    
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function register (Request $request)
    {
        $request->view = new View('register.tpl', ['title' => 'Register', 'auth' => 0]);
    }

}
