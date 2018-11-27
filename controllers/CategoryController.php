<?php

class CategoryController
{
    /**
     * @param $category_id
     * @param int $page
     * @return bool
     */
    public function actionShow(int $category_id, int $page = 1)
    {
        $categoryName = Category::getCategoryById($category_id)['name'];

        if ($categoryName) {
            $categoryContent = Article::getArticlesListByCategoryId($category_id, $page);

            $total = Article::getArticlesCountInCategory($category_id);
            $pagination = new Pagination($total, $page, Article::SHOW_IN_CATEGORY, 'page-');

            require_once(ROOT . '/views/category/index.php');
        } else {
            header("HTTP/1.0 404 Not Found");
        }

        return true;
    }
}