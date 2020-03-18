<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\ServiceBus;
use App\Model\User;

/**
 * Welcome.php
 *
 * Controller class to load welcome page.
 */
class Welcome
{

    /**
     * Go to welcome page.
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
