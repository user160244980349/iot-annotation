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
        $view = new View('404.tpl', []);
        $view->display();
    }

    /**
     * Go to access forbidden page.
     *
     * @access public.
     */
    public static function accessForbidden ()
    {
        $view = new View('403.tpl', []);
        $view->display();
    }

}