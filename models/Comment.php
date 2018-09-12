<?php

class Comment
{
    public static function getCommentsList($article_id)
    {
        $article_id = intval($article_id);

        $db = DB::getConnection();

        $queryResult = $db->query('SELECT * FROM comments WHERE article_id=' . $article_id .
                                           ' ORDER BY id DESC');
        return $queryResult->fetchAll();
    }

    public static function addComment($article_id, $author_name, $email, $comment_text)
    {
        if (strlen($comment_text) > 0) {
            $db = DB::getConnection();

            $sql = 'INSERT INTO comments(article_id, author_name, email, comment_text, created_at) ' .
                'VALUES (:article_id, :author_name, :email, :comment_text, NOW())';

            $queryResult = $db->prepare($sql);
            $queryResult->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $queryResult->bindParam(':author_name', $author_name, PDO::PARAM_STR);
            $queryResult->bindParam(':email', $email, PDO::PARAM_STR);
            $queryResult->bindParam(':comment_text', $comment_text, PDO::PARAM_STR);

            return $queryResult->execute();
        }
        return false;
    }
}