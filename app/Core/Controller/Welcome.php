<?php

namespace App\Core\Controller;

use App\Core\Request;

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
     * @param Request $state.
     * @access public.
     */
    public static function toWelcomePage (Request $request)
    {
        // if ($state->session->get('auth', $out)) {
        //     header("location: /home");
        // }
    }

}
