<?php

class SiteController
{
    public function actionIndex()
    {
        $blocksList = array();
        $blocksList['recent']['list'] = Article::getArticlesList();
        $blocksList['recent']['header'] = 'Новые статьи';
        $blocksList['popular']['list'] = Article::getArticlesList(Article::ARTICLES_LIMIT, "views_count");
        $blocksList['popular']['header'] = 'Популярные статьи';
        $blocksList['best']['list'] = Article::getArticlesList(Article::ARTICLES_LIMIT, "rating");
        $blocksList['best']['header'] = 'Лучшие статьи';

        require_once (ROOT . '/views/site/index.php');

        return true;
    }
}