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
class Login
{
    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toLoginPage (Request $request)
    {
        $session = ServiceBus::get('session');
        $request->view = new View('login.tpl', [
            'title' => 'Login',
            'auth' => $session->get('auth'),
            'username' => $session->get('username')
        ]);
    }

    /**
     * Go to home page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function login (Request $request)
    {
        $session = ServiceBus::get('session');
        $username = $request->parameters['username'];
        $password = md5(md5($request->parameters['password']));

        $user = User::get($username);

        if ($user['user_password'] == $password) {
            $session->set('auth', true);
            $session->set('username', $username);
            header("location: /home");
            exit;
        } else {
            header("location: /login");
            exit;
        }
    }

    /**
     * Log user in.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function logout (Request $state)
    {
        ServiceBus::get('session')->destroy();
        header("location: /");
        exit;
    }
}
