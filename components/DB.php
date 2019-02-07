<?php

require_once 'W:/domains/my_blog/config/db_config.php';

class DB{

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        $configPath = 'W:/domains/my_blog/config/db_config.php';
        $params = include($configPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $db = new PDO($dsn, $params['user'], $params['password'], $opt);

        return $db;
    }
}