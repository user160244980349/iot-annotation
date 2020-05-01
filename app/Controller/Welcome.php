<?php

namespace App\Controller;

use Engine\Entity\Request;
use Engine\Entity\ServiceBus;
use Engine\Entity\View;

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
     * @param Request $request .
     * @access public.
     */
    public static function toWelcomePage(Request $request)
    {

        if (!ServiceBus::get('auth')->authenticated()) {
            $request->view = new View('welcome.tpl', [
                'title' => 'Welcome',
            ]);
            return;
        }

        $data = ServiceBus::get('auth')->user();
        $request->view = new View('welcome.tpl', [
            'title' => 'Welcome',
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);
    }

}
