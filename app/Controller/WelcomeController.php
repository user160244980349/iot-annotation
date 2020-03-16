<?php

namespace App\Controller;

use App\Core\AppState;
use App\Core\View;

/**
 * HomeController.php
 *
 * Controller class to load home page.
 */
class WelcomeController
{
    /**
     * Go to home page.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function toWelcomePage (AppState $state)
    {
        if ($state->session->get('auth', $out)) {
            header("location: /home");
        }

        $view = new View('welcome.tpl', ['title' => 'Welcome']);
        $view->display();
    }

}
