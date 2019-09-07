<?php

namespace App\Controller;

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
     * @access public.
     */
    public static function notFound ()
    {
        $view = new View('404.tpl', ['title' => '404 Exception']);
        $view->display();
    }

    /**
     * Go to access forbidden page.
     *
     * @access public.
     */
    public static function accessForbidden ()
    {
        $view = new View('403.tpl', ['title' => '403 Exception']);
        $view->display();
    }

}