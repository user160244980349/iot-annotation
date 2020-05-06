<?php

namespace App\Controllers;

use Engine\Request;
use Engine\ServiceBus;
use Engine\View;

/**
 * Home.php
 *
 * Controller class for loading home page.
 */
class Home
{

    /**
     * Go to home page.
     *
     * @access public.
     * @param Request $request.
     */
    public static function toHomePage(Request $request)
    {
        $data = ServiceBus::get('auth')->user();
        $request->view = new View('home.tpl', [
            'title' => 'Home',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
