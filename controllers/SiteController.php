<?php

class SiteController
{
    public function actionIndex()
    {
        $blocksList = array();
        $blocksList['recent']['list'] = Article::getArticlesList();
        $blocksList['recent']['header'] = 'Новые статьи';
        $blocksList['recent']['id'] = 'articles_recent';
        $blocksList['popular']['list'] = Article::getArticlesList(Article::ARTICLES_LIMIT, "views_count");
        $blocksList['popular']['header'] = 'Популярные статьи';
        $blocksList['popular']['id'] = 'articles_popular';
        $blocksList['best']['list'] = Article::getArticlesList(Article::ARTICLES_LIMIT, "rating");
        $blocksList['best']['header'] = 'Лучшие статьи';
        $blocksList['best']['id'] = 'articles_best';

        require_once (ROOT . '/views/site/index.php');

        return true;
    }
}