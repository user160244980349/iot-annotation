<?php

namespace App\Core\Service;

use App\Core\ServiceBus;
use App\Model\User;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Auth
{
    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public function register (array $user)
    {
        if ($user['user_password'] == $user['password_confirm']) {
            $user['user_password'] = md5(md5($user['user_password']));
            $user['password_confirm'] = md5(md5($user['password_confirm']));
            if (User::add($user)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public function login (string $username, string $password)
    {
        $user = User::getByName($username);

        if ($user['user_password'] != md5(md5($password))) {
            return false;
        }
        ServiceBus::get('session')->set('user_id', $user['user_id']);
        return true;
    }

    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public function user (int $id)
    {
        return User::getById($id);
    }

    /**
     * Register new user.
     *
     * @param AppState $state.
     * @access public.
     */
    public function logout ()
    {
        ServiceBus::get('session')->destroy();
    }
}
