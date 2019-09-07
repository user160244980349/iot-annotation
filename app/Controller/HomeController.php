<?php

namespace App\Controller;

use App\Core\AppState;
use App\Core\View;

/**
 * HomeController.php
 *
 * Controller class to load home page.
 */
class HomeController
{
    /**
     * Go to home page.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function toHomePage (AppState $state)
    {
        $state->session->get('username', $username);
        $view = new View('home.tpl', ['title' => 'Home', 'username' => $username]);
        $view->display();
    }

}