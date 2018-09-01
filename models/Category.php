<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = DB::getConnection();

        $query_result = $db->query('SELECT id, name FROM categories');

        $i = 0;
        $categoriesList = array();
        while ($row = $query_result->fetch()) {
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoriesList;

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