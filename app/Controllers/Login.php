<?php

namespace App\Controllers;

use App\Models\User;
use Engine\Decorators\Auth;
use Engine\Decorators\Redirection;
use Engine\Request;
use Engine\View;

/**
 * Login.php
 *
 * Controller class for login management.
 */
class Login
{

    /**
     * Goes to login page.
     *
     * @access public
     * @param Request $request
     */
    public static function toLoginPage(Request $request)
    {
        if (Auth::authenticated()) {
            Redirection::redirect('/home');
        }

        $request->view = new View('login.php', [
            'title' => 'Login',
        ]);
    }

    /**
     * Logs user in.
     *
     * @access public
     * @param Request $request
     */
    public static function login(Request $request)
    {
        $id = User::getByName($request->parameters['user']['name'])['id'];
        $password = $request->parameters['user']['password'];
        if (Auth::login($id, $password)) {
            Redirection::redirect('/home');
        }
        Redirection::redirect('/login');
    }

    /**
     * Logs user out.
     *
     * @access public
     * @param Request $request
     */
    public static function logout()
    {
        Auth::logout();
        Redirection::redirect('/');
    }

}
