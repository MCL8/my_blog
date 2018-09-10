<?php

return array(

    'article/([0-9]+)' => 'article/show/$1',

    'category/([0-9]+)/page-([0-9]+)' => 'category/show/$1/$2',
    'category/([0-9]+)' => 'category/show/$1',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    '' => 'site/index',
);