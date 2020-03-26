<?php

namespace App\Controller;

use App\Object\Request;
use App\Object\View;
use App\Object\ServiceBus;
use App\Model\User;

/**
 * Home.php
 *
 * Controller class to load home page.
 */
class Home
{

    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toHomePage (Request $request)
    {
        $data = ServiceBus::get('auth')->user();
        $request->view = new View('home.tpl', [
            'title' => 'Home',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
