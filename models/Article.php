<?php

Class Article
{
    const ARTICLES_LIMIT = 3;
    const SHOW_IN_CATEGORY = 2;

    /**
     * @param $id
     * @return mixed
     */
    public static function getArticleById(int $id)
    {
        $id = intval($id);

        if ($id) {

            $db = DB::getConnection();

            $result = $db->query('SELECT * FROM articles WHERE id=' . $id);

            $article = $result->fetch();

            return $article;
        }
    }

    /**
     * @param int $limit
     * @param string $orderby
     * @param int $offset
     * @return array
     */
    public static function getArticlesList(int $limit = self::ARTICLES_LIMIT, string $orderby = "id", int $offset = 0)
    {
        $orders = array("id", "views_count", "rating");
        $key = array_search($orderby, $orders);

        if ($key) {
            $order = $orders[$key];
        } else {
            $order = "id";
        }

        $db = DB::getConnection();

        $sql = 'SELECT id, title, preview_text, category_id, pubdate ' .
             'FROM articles ' .
             'ORDER BY ' . $order . ' DESC ' .
             'LIMIT :limit ' .
             'OFFSET :offset';


        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':limit', $limit, PDO::PARAM_INT);
        $queryResult->bindParam(':offset', $offset, PDO::PARAM_INT);
        $queryResult->execute();

        $articlesList = $queryResult->fetchAll();

        self::getCategoriesName($articlesList);

        return $articlesList;
    }

    /**
     * @return array
     */
    public static function getArticlesListAdmin()
    {
        $db = DB::getConnection();

        $sql = 'SELECT id, title, category_id ' .
               'FROM articles ' .
               'ORDER BY id DESC';

        $queryResult = $db->query($sql);

        $articlesList = $queryResult->fetchAll();

        self::getCategoriesName($articlesList);

        return $articlesList;
    }

    /**
     * @param $category_id
     * @param int $page
     * @return array
     */
    public static function getArticlesListByCategoryId(int $category_id, int $page = 1)
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

    /**
     * @param int $count
     * @return array
     */
    public static function getRandomList(int $count = self::ARTICLES_LIMIT)
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

    /**
     * @param $post_data
     * @return int|string
     */
    public static function createArticle(array $post_data)
    {
        $db = DB::getConnection();

        $sql = 'INSERT INTO articles ' .
               '(title, category_id, preview_text, content) ' .
               'VALUES (:title, :category_id, :preview_text, :content)';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':title', $post_data['title'], PDO::PARAM_STR);
        $queryResult->bindParam(':category_id', $post_data['category_id'], PDO::PARAM_INT);
        $queryResult->bindParam(':preview_text', $post_data['preview_text'], PDO::PARAM_STR);
        $queryResult->bindParam(':content', $post_data['content'], PDO::PARAM_STR);

        if($queryResult->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    /**
     * @param $id
     * @param $post_data
     * @return bool
     */
    public static function updateArticle(int $id, array $post_data)
    {
        $db = DB::getConnection();

        $sql = 'UPDATE articles ' .
               'SET title = :title, category_id = :category_id, preview_text = :preview_text, content =  :content ' .
               'WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id', $id, PDO::PARAM_STR);
        $queryResult->bindParam(':title', $post_data['title'], PDO::PARAM_STR);
        $queryResult->bindParam(':category_id', $post_data['category_id'], PDO::PARAM_INT);
        $queryResult->bindParam(':preview_text', $post_data['preview_text'], PDO::PARAM_STR);
        $queryResult->bindParam(':content', $post_data['content'], PDO::PARAM_STR);

        return $queryResult->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteArticle(int $id)
    {
        $db = DB::getConnection();

        $sql = 'DELETE FROM articles WHERE id = :id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':id', $id, PDO::PARAM_STR);

        return $queryResult->execute();
    }

    /**
     * @param $id
     * @return string
     */
    public static function getImage(int $id)
    {
        $noImage = 'noimage.png';

        $path = '/upload/images/articles/';

        $pathToArticleImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToArticleImage)) {
            return $pathToArticleImage;
        }

        return $path . $noImage;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function increaseViews(int $id)
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

    /**
     * @param $category_id
     * @return mixed
     */
    public static function getArticlesCountInCategory(int $category_id)
    {
        $db = DB::getConnection();

        $sql = 'SELECT count(id) AS count FROM articles WHERE category_id = :category_id';

        $queryResult = $db->prepare($sql);
        $queryResult->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $queryResult->execute();

        $row = $queryResult->fetch();
        return $row['count'];
    }

    /**
     * @param $articlesList
     */
    private static function getCategoriesName(array &$articlesList)
    {
        $i = 0;
        $categories = Category::getCategoriesList();
        foreach ($articlesList as $row) {
            foreach ($categories as $cat){
                if ($cat['id'] == $row['category_id']){
                    $articlesList[$i]['category_name'] = $cat['name'];
                    break;
                }
            }
            $i++;
        }
    }

    /**
     * @param $count
     * @param $range
     * @return array|bool
     */
    private static function getRandomArray(int $count, int $range) {

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