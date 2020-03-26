<?php

namespace App\Service;

use App\Object\ServiceBus;
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
     * @param array $user User credentials.
     * @access public.
     */
    public function register (array $user)
    {
        if ($user['password'] == $user['password_confirm']) {
            $user['password'] = md5(md5($user['password']));
            $user['password_confirm'] = md5(md5($user['password_confirm']));
            if (User::add($user)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Log user in.
     *
     * @param string $username.
     * @param string $password.
     * @access public.
     */
    public function login (string $username, string $password)
    {
        $user = User::getByName($username);

        if ($user['password'] != md5(md5($password))) {
            return false;
        }
        ServiceBus::get('session')->set('user_id', $user['id']);
        return true;
    }

    /**
     * Get authorized user.
     *
     * @param int $user.
     * @access public.
     */
    public function authenticated ()
    {
        if (ServiceBus::get('session')->get('user_id')) {
            return true;
        }
        return false;
    }

    /**
     * Get authorized user.
     *
     * @param int $user.
     * @access public.
     */
    public function user ()
    {
        return User::getById(ServiceBus::get('session')->get('user_id'));
    }

    /**
     * Check if user has permitions.
     *
     * @param array $permissions Permitions list.
     * @access public.
     */
    public function allowed (array $permissions)
    {
        return $this->authenticated();
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public function logout ()
    {
        ServiceBus::get('session')->destroy();
    }

}
