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
        $request->view = new View('welcome.tpl', ['title' => 'Welcome', 'auth' => 0]);
    }

}
