<?php

class ArticleController
{
    public function actionShow($article_id)
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
        $commentsList = Comment::getCommentsList($article_id);

        require_once(ROOT . '/views/article/index.php');

        return true;
    }
}