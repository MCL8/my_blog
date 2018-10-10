<?php include ROOT . '/views/layouts/header.php'; ?>

    <main>
        <div class="container">
            <div class="main__content">
                <div class="articles-block" id="articles_recent">
                    <div class="title">
                        <h1>Категория: <?php echo $categoryName; ?></h1>
                    </div>
                    <div class="category-content">
                        <?php foreach ($categoryContent as $article): ?>
                            <article class="article">
                                <a href="/article/<?php echo $article['id']?>">
                                    <img src="https://picsum.photos/360/240" alt="">
                                    <h1><?php echo $article['title']; ?></h1>
                                </a>
                                <p><?php echo $article['preview_text']; ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <?php echo $pagination->get(); ?>
                </div>
            </div>

            <?php include  ROOT . '/views/layouts/sidebar.php'; ?>

        </div>
    </main>

<?php include ROOT . '/views/layouts/footer.php'; ?>