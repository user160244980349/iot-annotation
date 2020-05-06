<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Decorators\Redirection;
use Engine\Request;
use Engine\View;

/**
 * WelcomeController.php
 *
 * Controller class for loading login page.
 */
class Login
{

    /**
     * Go to login page.
     *
     * @access public.
     * @param Request $request .
     */
    public static function toLoginPage(Request $request)
    {
        if (Auth::authenticated()) {
            Redirection::redirect('/home');
            exit;
        }

        $request->view = new View('login.tpl', [
            'title' => 'Login',
        ]);
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param Request $request .
     */
    public static function login(Request $request)
    {
        if (Auth::login($request->parameters['user'])) {
            Redirection::redirect('/home');
        }
        Redirection::redirect('/login');
    }

    /**
     * Log user out.
     *
     * @access public.
     * @param Request $request .
     */
    public static function logout(Request $request)
    {
        Auth::logout();
        Redirection::redirect('/');
    }

}
