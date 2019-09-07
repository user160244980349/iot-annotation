<?php

namespace App\Controller;

use App\Core\AppState;
use App\Core\View;
use App\Model\User;

/**
 * RegisterController.php
 *
 * Controller class to manage user registration process.
 */
class RegisterController
{
    /**
     * Go to register page.
     *
     * @access public.
     */
    public static function toRegisterPage ()
    {
        $view = new View('register.tpl', []);
        $view->display();
    }

    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public static function registerUser (AppState $state)
    {
        $username = $state->request->parameters['username'];
        $password = md5(md5($state->request->parameters['password']));
        $password_confirm = md5(md5($state->request->parameters['password_confirm']));

        if ($password == $password_confirm) {
            User::add($state->database, [
                'user_name' => $username,
                'user_password' => $password,
            ]);
        }

        LoginController::logUserIn($state);
    }

}