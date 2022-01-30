<?php

namespace Engine\Auth;

use App\Models\Password;
use App\Models\Permission;
use Engine\Session\Facade as Session;

/**
 * Auth.php
 *
 * Auth service.
 */
class AuthService
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'auth';

    /**
     * Gives authorized user id.
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
     * Checks if user has permissions.
     *
     * @access public
     * @param int $id - User id
     * @param array $permissions - Permissions list
     * @return bool
     */
    public function allowed(int $id, array $permissions): bool
    {
        $user_permissions = Permission::getForUser($id);
        $difference = array_diff($permissions, $user_permissions);
        if (count($difference)) {
            return false;
        }
        return true;
    }

    /**
     * Registers new user.
     *
     * @access public
     * @param int $user - User id
     * @param string $password - User password
     * @return bool
     */
    public function register(int $id, string $password): bool
    {   
        Password::create($id, $this->encrypt($password));
        return true;
    }

    /**
     * Logs user in.
     *
     * @access public
     * @param id $user - User id
     * @param string $password - His password
     * @return bool
     */
    public function login(int $id, string $password): bool
    {
        $stored_password = Password::getValue($id);
        if ($stored_password['value'] != $this->encrypt($password)) {
            return false;
        }
        
        Session::set('id', $id);
        return true;
    }

    /**
     * Encrypts passwords.
     *
     * @param string $password - Account password
     * @access public
     * @return string
     */
    public function encrypt(string $password): string
    {
        return md5(md5($password));
    }

    /**
     * Logs user out.
     *
     * @access public
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
    }

}
