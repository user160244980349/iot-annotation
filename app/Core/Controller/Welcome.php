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
        print("Welcome!");
    }

}
