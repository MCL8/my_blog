<?php

abstract  class AdminBase
{
    public static function checkAdmin()
    {
        $user_id = User::checkLogged();

        $user = User::getUserById($user_id);

        if ($user['role'] == 'admin') {
            return true;
        }

        die('Доступ только для пользователей с правами администратора');
    }
}