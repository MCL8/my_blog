<?php

return array(

    'article/([0-9]+)' => 'article/show/$1',

    'category/([0-9]+)/page-([0-9]+)' => 'category/show/$1/$2',
    'category/([0-9]+)' => 'category/show/$1',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'admin/article/create' => 'adminArticle/create',
    'admin/article/update/([0-9]+)' => 'adminArticle/update/$1',
    'admin/article/delete/([0-9]+)' => 'adminArticle/delete/$1',
    'admin/article' => 'adminArticle/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin' => 'admin/index',

    'ajax/load' => 'ajax/load',

    '' => 'site/index',
);