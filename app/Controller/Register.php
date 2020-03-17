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
class Register
{
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toRegisterPage (Request $request)
    {
        $session = ServiceBus::get('session');
        $request->view = new View('register.tpl', [
            'title' => 'Register',
            'auth' => $session->get('auth'),
            'username' => $session->get('username')
        ]);
    }

    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function register (Request $request)
    {
        $session = ServiceBus::get('session');

        $username = $request->parameters['username'];
        $password = md5(md5($request->parameters['password']));
        $password_confirm = md5(md5($request->parameters['password_confirm']));

        if ($password == $password_confirm) {
            User::add([
                'user_name' => $username,
                'user_password' => $password,
            ]);

            $session->set('auth', true);
            $session->set('username', $username);
            header("location: /home");
            exit;
        }
    }

}
