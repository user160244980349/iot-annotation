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
        $id = ServiceBus::get('session')->get('user_id');

        if (!isset($id)) {
            $request->view = new View('welcome.tpl', [
                'title' => 'Welcome',
            ]);
            return;
        }

        $data = User::getById($id);
        $request->view = new View('welcome.tpl', [
            'title' => 'Welcome',
            'user_id' => $data['user_id'],
            'username' => $data['user_name'],
        ]);
    }

}
