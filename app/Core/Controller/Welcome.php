<?php

namespace App\Core\Controller;

use App\Core\Request;
use App\Core\ServiceBus;

/**
 * WelcomeController.php
 *
 * Controller class to load home page.
 */
class Welcome
{
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toWelcomePage (Request $request)
    {
        $var = ServiceBus::get('session')->set('user', 'this is test session variable');
        print("Welcome!");
    }

    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function testSessions (Request $request)
    {
        $var = ServiceBus::get('session')->get('user');
        print("Welcome! $var");
    }

    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function logout (Request $request)
    {
        $var = ServiceBus::get('session')->destroy();
        print("Bye!");
    }

}
