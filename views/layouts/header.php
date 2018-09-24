<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="/template/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="/template/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
    <div class="wrapper">
    <div class="header__top">
        <div class="container">
            <a href="/">
                <div class="header__logo"><p>my blog</p></div>
            </a>
            <nav>
                <ul class="main-menu">
                    <li><a class="header__link" href="#">ОБ АВТОРЕ</a></li>
                    <?php if (User::isGuest()): ?>
                        <li><a class="header__link" href="/user/login/">ВОЙТИ</a></li>
                    <?php else: ?>
                        <li><a class="header__link" href="/user/logout/">ВЫХОД</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php foreach (Category::getCategoriesList() as $category): ?>
                        <li><a href="/category/<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>