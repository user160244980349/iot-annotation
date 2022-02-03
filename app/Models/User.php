<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
use PDO;

/**
 * User.php
 *
 * Class that provides user model.
 */
class User
{

    /**
     * Adds new user into database.
     *
     * @access public
     * @param array $user - Array of values
     * @return bool
     */
    public static function create(array $user): bool
    {
        $sql = <<<SQL

        INSERT INTO `users` (
            `name`,
            `email`
        ) VALUE 
            (?, ?)

        SQL;
        
        $q = SQL::prepare($sql);
        $r = $q->execute([$user['name'], $user['email']]);
        return isset($r);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param string $name - User`s name
     * @return null|array.
     */
    public static function getByName(string $name): array
    {
        $sql = <<<SQL
        
        SELECT * FROM `users` WHERE `name` = ?
        
        SQL;
        
        $q = SQL::prepare($sql);
        $q->execute([$name]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param string $name - User`s name
     * @return null|array.
     */
    public static function getByEmail(string $email): array
    {
        $sql = <<<SQL
        
        SELECT * FROM `users` WHERE `email` = ?

        SQL;
        
        $q = SQL::prepare($sql);
        $q->execute([$email]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id - User id
     * @return null|array
     */
    public static function getById(int $id): array
    {
        $sql = <<<SQL

        SELECT * FROM `users` WHERE `id` = ?

        SQL;
        
        $q = SQL::prepare($sql);
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        $sql = <<<SQL

        SELECT * FROM `users`

        SQL;
        
        $q = SQL::query($sql);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

}