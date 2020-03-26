<?php

namespace App\Controller;

use App\Object\Request;
use App\Object\View;
use App\Object\ServiceBus;

/**
 * Register.php
 *
 * Controller class to manage registration.
 */
class Register
{

    /**
     * Go to register page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toRegisterPage (Request $request)
    {
        if (ServiceBus::get('auth')->authenticated()) {
            header("location: /home");
            exit;
        }

        $request->view = new View('register.tpl', [
            'title' => 'Register',
        ]);
    }

    /**
     * Register new user.
     *
     * @param Request $request.
     * @access public.
     */
    public static function register (Request $request)
    {
        $auth = ServiceBus::get('auth');

        if ($auth->register([
            'name' => $request->parameters['username'],
            'password' => $request->parameters['password'],
            'password_confirm' => $request->parameters['password_confirm'],
            'email' => $request->parameters['email'] ])) {

            if ($auth->login(   $request->parameters['username'],
                                $request->parameters['password'] )) {
                header("location: /home");
                exit;
            }
        }

        header("location: /register");
        exit;
    }

}
