<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\ServiceBus;
use App\Model\User;

/**
 * WelcomeController.php
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
        dump($data);
        $request->view = new View('home.tpl', [
            'title' => 'Home',
            'username' => $data['user_name'],
        ]);
    }

}
