<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="content">
<main>
    <div class="container-block">
        <div class="articles-block" id="articles_recent">
            <h1>Новые статьи</h1>
            <div class="articles__content">
                <?php foreach ($articlesListRecent as $article): ?>
                    <article class="article">
                        <a href="/article/<?php echo $article['id']?>">
                            <img src="<?php echo Article::getImage($article['id']);?>" alt="">
                            <h1>
                                <?php echo $article['title']; ?>
                            </h1>
                        </a>
                        <div class="article__category">
                            <small>Категория: <a href="template"><?php echo $article['category_name']?></a></small>
                        </div>
                        <p>
                            <?php echo $article['preview_text']; ?>
                        </p>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="articles-block" id="articles_popular">
            <h1>Популярные статьи</h1>
            <div class="articles__content">
                <?php foreach ($articlesListPopular as $article): ?>
                    <article class="article">
                        <a href="/article/<?php echo $article['id']?>">
                            <img src="<?php echo Article::getImage($article['id']);?>" alt="">
                            <h1>
                                <?php echo $article['title']; ?>
                            </h1>
                        </a>
                        <div class="article__category">
                            <small>Категория: <a href="template"><?php echo $article['category_name']?></a></small>
                        </div>
                        <p>
                            <?php echo $article['preview_text']; ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="articles-block" id="articles_best">
            <h1>Лучшие статьи</h1>
            <div class="articles__content">
                <?php foreach ($articlesListBest as $article): ?>
                    <article class="article">
                        <a href="/article/<?php echo $article['id']?>">
                            <img src="<?php echo Article::getImage($article['id']);?>" alt="">
                            <h1>
                                <?php echo $article['title']; ?>
                            </h1>
                        </a>
                        <div class="article__category">
                            <small>Категория: <a href="template"><?php echo $article['category_name']?></a></small>
                        </div>
                        <p>
                            <?php echo $article['preview_text']; ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>