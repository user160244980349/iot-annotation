<?php

namespace App\Controller;

use Engine\Entity\Request;
use Engine\Entity\ServiceBus;
use Engine\Entity\View;

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
