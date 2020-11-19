<?php

namespace Engine\Services;

use Engine\Decorators\Database;
use Engine\Decorators\Session;

/**
 * Auth.php
 *
 * Auth service.
 */
class Auth
{

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return array.
     */
    public function associate(int $id, string $group): array
    {
        return Database::fetchAll(
            "INSERT INTO `group_user` 
                (`user_id`, 
                 `group_id`) VALUE 
                ($id, (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group'))");
    }

    /**
     * Get authorized user.
     *
     * @access public
     * @return int
     */
    public function authenticated(): int
    {
        $id = Session::get('id');
        if (isset($id)) {
            return $id;
        }
        return 0;
    }

    /**
     * Check if user has permissions.
     *
     * @access public
     * @param int $id
     * @param array $permissions Permissions list
     * @return bool
     */
    public function allowed(int $id, array $permissions): bool
    {
        $user_permissions = $this->permissions($id);
        $difference = array_diff($permissions, $user_permissions);
        if ($difference) {
            return false;
        }
        return true;
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @return array
     */
    public function permissions(int $id): array
    {
        $permissions = Database::fetchAll(
            "SELECT `for` FROM `users`
             INNER JOIN `group_user`         ON `users`.`id` = `group_user`.`user_id`
             INNER JOIN `groups`             ON `group_user`.`group_id` = `groups`.`id`
             INNER JOIN `group_permission`   ON `groups`.`id` = `group_permission`.`group_id` 
             INNER JOIN `permissions`        ON `group_permission`.`id` = `permissions`.`id` 
             WHERE `users`.`id` = '$id'"
        );
        return array_column($permissions, "for");
    }

    /**
     * Registers new user.
     *
     * @access public
     * @param array $user User credentials
     */
    public function register(int $id, string $password): bool
    {   
        $password = md5(md5($password));
        Database::fetch(
            "INSERT INTO `passwords`
            (`id`, `value`) VALUES
            ($id, '{$password}')"
        );
        $this->associate($id, 'authenticated');
        return true;
    }

    /**
     * Log user in.
     *
     * @access public
     * @param array $user
     * @return bool
     */
    public function login(int $id, string $password): bool
    {
        $stored_password = Database::fetch(
            "SELECT `value` FROM `passwords`
             WHERE `id` = $id"
        )['value'];

        if ($stored_password != md5(md5($password))) {
            return false;
        }
        
        Session::set('id', $id);
        return true;
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public function logout(): void
    {
        Session::destroy();
    }

}
