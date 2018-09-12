<?php

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        require_once (ROOT . '/views/admin_category/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                Category::createCategory($name);

                header("Location: /admin/category");
            }
        }

        require_once (ROOT . '/views/admin_category/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                Category::updateCategory($id, $name);

                header("Location: /admin/category");
            }
        }

        require_once (ROOT . '/views/admin_category/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Category::deleteCategory($id);

            header("Location: /admin/category");
        }

        require_once (ROOT . '/views/admin_category/delete.php');
        return true;
    }
}