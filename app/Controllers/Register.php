<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Group;
use Engine\Decorators\Auth;
use Engine\Decorators\Redirection;
use Engine\Request;
use Engine\View;

/**
 * Register.php
 *
 * Controller class for registration management.
 */
class Register
{

    /**
     * Goes to register page.
     *
     * @access public
     * @param Request $request
     */
    public static function toRegisterPage(Request $request)
    {
        if (Auth::authenticated()) {
            Redirection::redirect('/home');
        }

        $request->view = new View('register.php', array(
            'title' => 'Register',
        ));
    }

    /**
     * Registers new user.
     *
     * @access public
     * @param Request $request
     */
    public static function register(Request $request)
    {
        $user = $request->parameters['user'];

        if ($user['password'] != $user['password_confirm']) {
            Redirection::redirect('/register');
        }

        if (User::create($user)) {
            $stored_user = User::getByName($user['name']);

            if (Auth::register($stored_user['id'], $user['password'])) {
                Group::associateByName($stored_user['id'], 'Authenticated');
                if (Auth::login($stored_user['id'], $user['password'])) {
                    Redirection::redirect('/home');
                }
            }
        }

        Redirection::redirect('/register');
    }

}
