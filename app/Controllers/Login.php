<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Redirection\Facade as Redirection;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;

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
