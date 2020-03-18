<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\ServiceBus;
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
        $data = User::getById(ServiceBus::get('session')->get('user_id'));
        $request->view = new View('home.tpl', [
            'title' => 'Home',
            'user_id' => $data['user_id'],
            'username' => $data['user_name'],
        ]);
    }

}
