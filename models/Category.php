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

        $sql = 'SELECT * FROM categories WHERE id=:id';

        $query_result = $db->prepare($sql);
        $query_result->bindParam(':id', $id, PDO::PARAM_INT);

        $query_result->execute();

        return $query_result->fetch();
    }

    public static function createCategory($name)
    {
        $db = DB::getConnection();

        $sql = 'INSERT INTO categories (name) VALUES (:name)';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':name', $name, PDO::PARAM_STR);

        return $queryResult->execute();
    }

    public static function updateCategory($id, $name)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE categories SET name = :name WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id',$id, PDO::PARAM_INT);
        $queryResult->bindParam(':name', $name, PDO::PARAM_STR);

        return $queryResult->execute();
    }

    public static function deleteCategory($id)
    {
        $db = DB::getConnection();

        $sql = 'DELETE FROM categories WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id',$id, PDO::PARAM_INT);

        return $queryResult->execute();
    }
}