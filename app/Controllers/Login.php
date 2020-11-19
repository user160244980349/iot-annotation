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
 * Controller class for loading login page.
 */
class Login
{

    /**
     * Go to login page.
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
     * Log user in.
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
     * Log user out.
     *
     * @access public
     * @param Request $request
     */
    public static function logout(Request $request)
    {
        Auth::logout();
        Redirection::redirect('/');
    }

}
