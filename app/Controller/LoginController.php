<?php

namespace App\Controller;

use App\Core\AppState;
use App\Core\View;
use App\Model\User;

/**
 * LoginController.php
 *
 * Controller class to manage user login process.
 */
class LoginController
{
    /**
     * Go to login page.
     *
     * @param AppState $state.
     * @access public.
     */
    public function toLoginPage (AppState $state)
    {
        if ($state->session->contains('auth')) {
            header("location: /home");
            exit;
        }

        $view = new View('login.tpl', ['title' => 'Sign In']);
        $view->display();
    }

    /**
     * Log user in.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function logUserIn (AppState $state)
    {
        $username = $state->request->parameters['username'];
        $password = md5(md5($state->request->parameters['password']));

        $user = User::get($state->database, $username);

        if ($user['user_password'] == $password) {
            $state->session->set('auth', true);
            $state->session->set('username', $username);
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
    public static function logUserOut (AppState $state)
    {
        if ($state->session->exists()) {
            $state->session->destroy();
        }

        header("location: /");
        exit;
    }

}