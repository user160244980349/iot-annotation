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
class Home
{
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toHomePage (Request $request)
    {
        $request->view = new View('home.tpl', ['title' => 'Home', 'auth' => 0]);
    }

}
