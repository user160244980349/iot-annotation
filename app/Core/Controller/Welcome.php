<?php

namespace App\Core\Controller;

use App\Core\AppState;

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
     * @param AppState $state.
     * @access public.
     */
    public static function toWelcomePage (AppState $state)
    {
        // if ($state->session->get('auth', $out)) {
        //     header("location: /home");
        // }

        $state->controller = "welcome";
    }

}
