<?php

class ArticleController
{
    /**
     * @param $article_id
     * @return bool
     */
    public function actionShow(int $article_id)
    {
        if (isset($_POST['submit'])) {
            if (isset($_SESSION['user'])) {
                $user = User::getUserById($_SESSION['user']);

                $author_name = $user['name'];
                $email = $user['email'];
                $comment_text = $_POST['text'];

                $result = Comment::addComment($article_id, $author_name, $email, $comment_text);
            } else {
                header("Location: /user/login");
            }
        }

        $article = Article::getArticleById($article_id);

        if ($article) {
            $commentsList = Comment::getCommentsList($article_id);

            $date = new DateTime($article['pubdate']);
            $article['pubdate'] = $date->format('d.m.Y H:i');

            Article::increaseViews($article_id);

            require_once(ROOT . '/views/article/index.php');
        } else {
            header("HTTP/1.0 404 Not Found");
        }

        return true;
    }
}