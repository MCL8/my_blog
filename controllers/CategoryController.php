<?php
class CategoryController
{
    /**
     * @param $category_id
     * @param int $page
     * @return bool
     */
    public function actionShow($category_id, $page = 1)
    {
        $categoryName = Category::getCategoryById($category_id)['name'];
        $categoryContent = Article::getArticlesListByCategoryId($category_id, $page);

        $total = Article::getArticlesCountInCategory($category_id);
        $pagination = new Pagination($total, $page, Article::SHOW_IN_CATEGORY, 'page-');

        require_once(ROOT . '/views/category/index.php');
        return true;
    }
}