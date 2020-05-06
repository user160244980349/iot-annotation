<?php

namespace Engine\Services;

use App\Models\User;
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
     * Registers new user.
     *
     * @access public.
     * @param array $user User credentials.
     * @return bool.
     */
    public function register(array $user): bool
    {
        if ($user['password'] == $user['password_confirm']) {
            $user['password'] = md5(md5($user['password']));
            $user['password_confirm'] = md5(md5($user['password_confirm']));
            if (User::add($user)) {
                $id = User::getByName($user['name'])['id'];
                $this->associate($id, 'authenticated');
                return true;
            }
        }
        return false;
    }

    /**
     * Log user out.
     *
     * @access public.
     * @param int $id .
     * @param string $group .
     * @return array.
     */
    public function associate(int $id, string $group): array
    {
        return Database::fetchAll(
            "INSERT INTO `group_user` (
                `user_id`, 
                `group_id`
                ) VALUE 
                ($id, (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group'))");
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param array $user .
     * @return bool.
     */
    public function login(array $user): bool
    {
        $stored_user = User::getByName($user['name']);

        if ($stored_user['password'] != md5(md5($user['password']))) {
            return false;
        }

        Session::set('id', $stored_user['id']);
        return true;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return false|int.
     */
    public function userId()
    {
        $id = Session::get('id');

        if (isset($id)) {
            return $id;
        }
        return null;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return null|array.
     */
    public function user()
    {
        $id = Session::get('id');

        if (isset($id)) {
            return User::getById($id);
        }
        return null;
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return bool.
     */
    public function authenticated(): bool
    {
        $id = Session::get('id');

        if (isset($id)) {
            return true;
        }
        return false;
    }

    /**
     * Check if user has permissions.
     *
     * @access public.
     * @param int $id .
     * @param array $permissions Permissions list.
     * @return bool.
     */
    public function allowed(int $id, array $permissions): bool
    {
        $user_permissions = $this->permissions($id);
        $difference = array_diff($permissions, $user_permissions);
        if (count($difference) != count($user_permissions) - count($permissions)) {
            return false;
        }

        return true;
    }

    /**
     * Log user out.
     *
     * @access public.
     * @param int $id .
     * @return array.
     */
    public function permissions(int $id): array
    {
        return array_column(Database::fetchAll(
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
    public function logout(): void
    {
        Session::destroy();
    }

}
