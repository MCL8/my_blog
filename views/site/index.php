<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="content">
<main>
    <div class="container-block">
        <?php foreach ($blocksList as $block): ?>
            <div class="articles-block" id="articles_recent">
                <h1><?php echo $block['header']; ?></h1>
                <div class="articles__content">
                    <?php foreach ($block['list'] as $article): ?>
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
        <?php endforeach; ?>
    </div>
</main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>