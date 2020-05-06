<?php

namespace Engine\Services\Auth;

use Engine\ServiceBus;
use PDOStatement;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Service_new
{

    /**
     * Register new user.
     *
     * @access public.
     * @param int $id
     * @param string $password
     * @return bool
     */
    public function register(int $id, string $password)
    {

        return false;
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param int $id
     * @param string $password .
     * @return bool
     */
    public function login(int $id, string $password)
    {
        ServiceBus::get('session')->set('id', $id);
        return true;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return int.
     */
    public function user() : int
    {
        return ServiceBus::get('session')->get('id');
    }

    /**
     * Check if user has permissions.
     *
     * @access public.
     * @param int $id
     * @param array $permissions Permissions list.
     * @return bool
     */
    public function allowed(int $id, array $permissions)
    {
        $id = ServiceBus::get('session')->get('id');
        if (!isset($id)) {
            return false;
        }

        $stored_permissions = self::permissions($id);
        $difference = array_diff($permissions, $stored_permissions);
        if (count($difference) != count($stored_permissions) - count($permissions)) {
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
     * @param int $id
     * @return array
     */
    public function permissions(int $id)
    {
        return array_column(ServiceBus::get('database')->fetchAll(
            "SELECT `for` FROM `users`
                INNER JOIN `group_user`         ON `users`.`id` = `group_user`.`user_id`
                INNER JOIN `groups`             ON `group_user`.`group_id` = `groups`.`id`
                INNER JOIN `group_permission`   ON `groups`.`id` = `group_permission`.`group_id` 
                INNER JOIN `permissions`        ON `group_permission`.`id` = `permissions`.`id` 
                WHERE `users`.`id` = '$id'"), 'for');
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
