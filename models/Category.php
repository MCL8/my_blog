<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = DB::getConnection();

        $queryResult = $db->query('SELECT id, name FROM categories');

        return $queryResult->fetchAll();
    }

    public static function getCategoryById($id)
    {
        $db = DB::getConnection();

        $sql = 'SELECT * FROM categories WHERE id = :id';

        $query_result = $db->prepare($sql);
        $query_result->bindParam(':id', $id, PDO::PARAM_INT);

        $query_result->execute();

        return $query_result->fetch();

    }
}