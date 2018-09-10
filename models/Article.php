<?php

Class Article
{
    const ARTICLES_LIMIT = 3;
    const SHOW_IN_CATEGORY = 2;

    public static function getArticleById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = DB::getConnection();

            $result = $db->query('SELECT * FROM articles WHERE id=' . $id);

            $article = $result->fetch();

            return $article;
        }
    }

    public static function getArticlesList($limit = self::ARTICLES_LIMIT, $orderby = "id")
    {
        $orders = array("id", "views_count", "rating");
        $key = array_search($orderby, $orders);

        if ($key) {
            $order = $orders[$key];
        } else {
            $order = "id";
        }

        $db = DB::getConnection();

        $sql = 'SELECT id, title, preview_text, category_id, pubdate '
            . 'FROM articles '
            . 'ORDER BY ' . $order . ' DESC '
            . 'LIMIT :limit';


        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':limit', $limit, PDO::PARAM_INT);
        $queryResult->execute();

        $categories = Category::getCategoriesList();

        $i = 0;

        $articlesList = $queryResult->fetchAll();

        foreach ($articlesList as $row) {
            foreach ($categories as $cat){
                if ($cat['id'] == $row['category_id']){
                    $articlesList[$i]['category_name'] = $cat['name'];
                    break;
                }
            }
            $i++;
        }

        return $articlesList;
    }

    public static function getArticlesListByCategoryId($category_id, $page = 1)
    {
        $limit = self::SHOW_IN_CATEGORY;
        $offset = ($page - 1) * $limit;

        $db = DB::getConnection();

        $sql = 'SELECT id, title, preview_text, pubdate ' .
               'FROM articles ' .
               'WHERE category_id = :category_id ' .
               'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $queryResult->bindParam(':limit', $limit, PDO::PARAM_INT);
        $queryResult->bindParam(':offset', $offset, PDO::PARAM_INT);
        $queryResult->execute();

        return $queryResult->fetchAll();

    }

    public static function getRandomList($count = self::ARTICLES_LIMIT)
    {
        $db = DB::getConnection();

        $resultCount = $db->query('SELECT COUNT(*) FROM articles');
        $row = $resultCount->fetch();
        $rowCount = reset($row);

        $randomArray = self::getRandomArray($count, $rowCount-1);

        $sql = array();
        foreach ($randomArray as $offset) {
            $sql[] = '(SELECT id, title, pubdate FROM articles LIMIT ' . $offset . ', 1)';
        }
        $sql = implode(' UNION ', $sql);

        $result = $db->query($sql);

        return $result->fetchAll();
    }

    public static function getImage($id)
    {
        $noImage = 'noimage.png';

        $path = '/upload/images/articles/';

        $pathToArticleImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToArticleImage)) {
            return $pathToArticleImage;
        }

        return $path . $noImage;
    }

    public static function increaseViews($id)
    {
        $db = DB::getConnection();

        $sql = 'UPDATE articles ' .
            'SET views_count = views_count + 1 ' .
            'WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id', $id, PDO::PARAM_INT);
        $queryResult->execute();

        return true;
    }

    public static function getArticlesCountInCategory($category_id)
    {
        $db = DB::getConnection();

        $sql = 'SELECT count(id) AS count FROM articles WHERE category_id = :category_id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $queryResult->execute();

        $row = $queryResult->fetch();
        return $row['count'];
    }

    private static function getRandomArray($count, $range) {

        if (($count <= 0) || ($range <= 0)) {
            return false;
        }

        if ($count > $range) {
            $arr = range(0, $range);
            return $arr;
        }

        $arr = array();

        if ($count < $range/2) {
            while (count($arr) < $count) {
                $rnd = rand(0, $range );
                if (!in_array($rnd, $arr)) {
                    $arr[] = $rnd;
                }
            }
            sort($arr);
        } else {
            $arr = range(0, $range);
            for ($i = 0; $i <= $range-$count; $i++) {
                $index = rand(0, $range - $i);
                array_splice($arr, $index, 1);
            }
        }
        return $arr;
    }
}