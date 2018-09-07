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
        $orders = array("id", "views_count");
        $key = array_search($orderby, $orders);

        if ($key) {
            $order = $orders[$key];
        } else {
            $order = "id";
        }

        $db = DB::getConnection();

        $articlesList = array();

        $sql = 'SELECT id, title, preview_text, category_id, pubdate '
            . 'FROM articles '
            . 'ORDER BY ' . $order . ' DESC '
            . 'LIMIT :count';


        $queryResult = $db->prepare($sql);
        //$queryResult->bindParam(':orderby', $orderby, PDO::PARAM_STR);
        $queryResult->bindParam(':count', $count, PDO::PARAM_INT);
        $queryResult->execute();

        $categories = Category::getCategoriesList();

        $i = 0;

        /*while ($row = $queryResult->fetch()) {
            $articlesList[$i]['id'] = $row['id'];
            $articlesList[$i]['title'] = $row['title'];
            $articlesList[$i]['preview_text'] = $row['preview_text'];
            $articlesList[$i]['category_id'] = $row['category_id'];
            $articlesList[$i]['pubdate'] = $row['pubdate'];
            $articlesList[$i]['category_id'] = 'Other';

            foreach ($categories as $cat){
                if ($cat['id'] == $row['category_id']){
                    $articlesList[$i]['category_name'] = $cat['name'];
                    break;
                }
            }
            $i++;
        }*/

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

        $sql = array();
        while (count($sql) < $count) {
            $sql[] = '(SELECT * FROM articles LIMIT ' . rand(0 , $rowCount) . ', 1)';
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
}