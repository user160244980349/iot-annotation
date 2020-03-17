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
        $session = ServiceBus::get('session');
        $request->view = new View('Welcome.tpl', [
            'title' => 'Home',
            'auth' => $session->get('auth'),
            'username' => $session->get('username')
        ]);
    }

}
