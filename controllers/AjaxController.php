<?php

class AjaxController
{
    /**
     * @return bool
     */
    public function actionLoad()
    {
        if (isset($_POST['offset']) && isset($_POST['block_id'])) {
            $block = array();
            $offset = $_POST['offset'];
            $orderby = 'id';

            switch ($_POST['block_id']) {
                case 'articles_popular' :
                    {
                        $orderby = 'views_count';
                        break;
                    }
                case 'articles_best' :
                    {
                        $orderby = 'rating';
                        break;
                    }
            }

            $block['list'] = Article::getArticlesList(Article::ARTICLES_LIMIT, $orderby, $offset);

            require_once ROOT . '/views/layouts/articles_block.php';
        }

        return true;
    }
}
