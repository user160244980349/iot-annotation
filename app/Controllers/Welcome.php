<?php

namespace App\Controllers;

use Engine\Request;
use Engine\ServiceBus;
use Engine\View;

/**
 * Welcome.php
 *
 * Controller class for loading welcome page.
 */
class Welcome
{

    /**
     * Go to welcome page.
     *
     * @access public.
     * @param Request $request.
     */
    public static function toWelcomePage(Request $request)
    {
        $data = ServiceBus::get('auth')->user();
        $request->view = new View('welcome.tpl', [
            'title' => 'Welcome',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
