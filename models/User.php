<?php

class User
{
    /**
     * @param $name
     * @param $email
     * @param $password
     * @return bool
     */
    public static function register($name, $email, $password)
    {
        $db = DB::getConnection();

        $sql = 'INSERT INTO users (name, email, password) ' .
               'VALUES (:name, :email, :password)';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':name', $name, PDO::PARAM_STR);
        $queryResult->bindParam(':email', $email, PDO::PARAM_STR);
        $queryResult->bindParam(':password', $password, PDO::PARAM_STR);

        return $queryResult->execute();
    }

    /**
     * @param $id
     * @param $name
     * @param $password
     * @return bool
     */
    public static function edit($id, $name, $password)
    {
        $db = DB::getConnection();

        $sql = 'UPDATE users ' .
               'SET name = :name, password = :password ' .
               'WHERE id = :id';

        $queryResult = $db->prepare($sql);

        $queryResult->bindParam(':id', $id, PDO::PARAM_INT);
        $queryResult->bindParam(':name', $name, PDO::PARAM_STR);
        $queryResult->bindParam(':password', $password, PDO::PARAM_STR);

        return $queryResult->execute();
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUserData($email, $password)
    {
        $db = DB::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':email', $email, PDO::PARAM_INT);
        $queryResult->execute();

        $user = $queryResult->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }

    /**
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * @return mixed
     */
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    /**
     * @return bool
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * @param $name
     * @return bool
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * @param $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':email', $email, PDO::PARAM_STR);
        $queryResult->execute();

        if ($queryResult->fetchColumn()) {
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id', $id, PDO::PARAM_INT);
        $queryResult->execute();

        return $queryResult->fetch();
    }
}