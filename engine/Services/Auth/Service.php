<?php

namespace Engine\Services\Auth;

use App\Models\User;
use Engine\ServiceBus;
use PDOStatement;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Service
{

    /**
     * Register new user.
     *
     * @access public.
     * @param array $user User credentials.
     * @return bool
     */
    public function register(array $user)
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
     * @access public.
     * @param string $username.
     * @param string $password.
     * @return bool
     */
    public function login(string $username, string $password)
    {
        $user = User::getByName($username);

        if ($user['password'] != md5(md5($password))) {
            return false;
        }

        ServiceBus::get('session')->set('id', $user['id']);
        return true;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return false|PDOStatement
     */
    public function user()
    {
        $id = ServiceBus::get('session')->get('id');

        if (isset($id)) {
            return User::getById($id);
        }
        return null;
    }

    /**
     * Check if user has permissions.
     *
     * @access public.
     * @param array $permissions Permissions list.
     * @return bool
     */
    public function allowed(array $permissions)
    {
        $id = ServiceBus::get('session')->get('id');
        if (!isset($id)) {
            return false;
        }

        $user_permissions = array_column(User::permissions($id), 'for');
        $difference = array_diff($permissions, $user_permissions);
        if (count($difference) != count($user_permissions) - count($permissions)) {
            return false;
        }

        return true;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return bool
     */
    public function authenticated()
    {
        $id = ServiceBus::get('session')->get('id');

        if (isset($id)) {
            return true;
        }
        return false;
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public function logout()
    {
        ServiceBus::get('session')->destroy();
    }

}
