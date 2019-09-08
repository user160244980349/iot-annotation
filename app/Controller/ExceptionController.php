<?php

namespace App\Controller;

use App\Core\AppState;
use App\Core\View;

/**
 * ExceptionController.php
 *
 * Controller class to load exception page.
 */
class ExceptionController
{
    /**
     * Go to not found page.
     *
     * @param AppState $state
     * @access public.
     */
    public static function notFound (AppState $state)
    {
        $state->session->get('username', $auth);
        $view = new View('404.tpl', ['title' => '404 Exception', 'auth' => $auth]);
        $view->display();
    }

    /**
     * Go to access forbidden page.
     *
     * @param AppState $state
     * @access public.
     */
    public static function accessForbidden (AppState $state)
    {
        $state->session->get('username', $auth);
        $view = new View('403.tpl', ['title' => '403 Exception', 'auth' => $auth]);
        $view->display();
    }

}