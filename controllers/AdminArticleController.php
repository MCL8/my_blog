<?php

class AdminArticleController extends AdminBase
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        self::checkAdmin();

        $articlesList = Article::getArticlesListAdmin();

        require_once (ROOT . '/views/admin_article/index.php');
        return true;
    }

    /**
     * @return bool
     */
    public function actionCreate()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        if (isset($_POST['submit'])) {
            $post_data['title'] = $_POST['title'];
            $post_data['category_id'] = $_POST['category_id'];
            $post_data['preview_text'] = $_POST['preview_text'];
            $post_data['content'] = $_POST['content'];

            $errors = false;

            foreach ($post_data as $field) {
                if (!isset($field) || empty($field)) {
                    $errors[] = 'Заполните поля';
                    break;
                }
            }

            if ($errors == false) {
                $id = Article::createArticle($post_data);

                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'],
                            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/{$id}.jpg");
                    }
                }

                header("Location: /admin/article");
            }
        }
        require_once (ROOT . '/views/admin_article/create.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionUpdate(int $id)
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();
        $article = Article::getArticleById($id);
        $article['image'] = Article::getImage($id);

        if (isset($_POST['submit'])) {
            $post_data['title'] = $_POST['title'];
            $post_data['category_id'] = $_POST['category_id'];
            $post_data['preview_text'] = $_POST['preview_text'];
            $post_data['content'] = $_POST['content'];

            $errors = false;

            foreach ($post_data as $field) {
                if (!isset($field) || empty($field)) {
                    $errors[] = 'Заполните поля';
                    break;
                }
            }

            if ($errors == false) {
                if (Article::updateArticle($id, $post_data)) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'],
                            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/{$id}.jpg");
                    }

                    header("Location: /admin/article");
                }
            }
        }

        require_once(ROOT . '/views/admin_article/update.php');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete(int $id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Article::deleteArticle($id);

            header("Location: /admin/article");
        }

        require_once(ROOT . '/views/admin_article/delete.php');
        return true;
    }
}