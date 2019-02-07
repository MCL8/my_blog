<?php include ROOT . '/views/layouts/header.php'; ?>

    <main>
        <div class="container">
            <div class="main__content">
                <div class="articles-block" id="articles_recent">
                    <div class="title">
                        <h1>Категория: <?php echo $categoryName; ?></h1>
                    </div>
                    <div class="category-content">

                        <?php if (count($categoryContent) == 0): ?>
                            <h2>Статей не найдено</h2>
                        <?php endif; ?>

                        <?php $left = true; ?>
                        <?php foreach ($categoryContent as $article): ?>

                            <?php if ($left) echo '<div class="row">'; ?>

                            <article class="article">
                                <a href="/article/<?php echo $article['id']?>">
                                    <div class="text-center">
                                        <img class="img-large" src="<?php echo Article::getImage($article['id']);?>" alt="<?php echo $article['title']; ?>">
                                    </div>
                                    <h1><?php echo $article['title']; ?></h1>
                                </a>
                                <p><?php echo $article['preview_text']; ?></p>
                            </article>

                            <?php if (!$left) {
                                echo '</div>';
                                $left = true;
                            } else {
                                $left = false;
                            } ?>

                        <?php endforeach; ?>

                        <?php if (!$left) echo '</div>'; ?>

                    </div>
                    <?php echo $pagination->get(); ?>
                </div>
            </div>

            <?php include  ROOT . '/views/layouts/sidebar.php'; ?>

        </div>
    </main>

<?php include ROOT . '/views/layouts/footer.php'; ?>