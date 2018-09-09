<?php

Class Article
{
    const ARTICLES_LIMIT = 3;

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

    public static function getArticlesList($count = self::ARTICLES_LIMIT, $orderby = "id")
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
            . 'LIMIT :count';


        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':count', $count, PDO::PARAM_INT);
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

    public static function getRandomList($count = self::ARTICLES_LIMIT)
    {
        $db = DB::getConnection();

        $resultCount = $db->query('SELECT COUNT(*) FROM articles');
        $row = $resultCount->fetch();
        $rowCount = reset($row);

        $randomArray = self::getRandomArray($count, $rowCount-1);
        print_r($randomArray);

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

    private static function getRandomArray($count, $range) {

        if ($count >= $range) {

            $arr = range(0, $range);
            return shuffle($arr);
        }

        $randomArray = array();

        if ($count < $range%2) {

            while (count($randomArray) < $count) {
                $rnd = rand(0, $range );
                if (!in_array($rnd, $randomArray)) {
                    $randomArray[] = $rnd;
                }
            }
        } else {
            $arr = range(0, $range);
            while (count($arr) > $count) {
                $index = rand(0, count($arr));
                array_slice($arr, $index, 1);
            }

            return shuffle($arr);
        }
        return $randomArray;
    }
}