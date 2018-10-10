<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container">
        <div class="main__content">
            <article>
                <div class="article__content">
                    <div class="article__header">
                        <h1><?php echo $article['title'];?></h1>
                    </div>
                    <div class="article__info">
                        <span class="article__pubdate"><?php echo $article['pubdate'];?></span>

                        <?php include ROOT . '/views/layouts/icons/views_icon.php'; ?>

                        <span class="article__views"><?php echo $article['views_count'];?></span>
                    </div>
                    <img src="https://picsum.photos/500/400" alt="">
                    <?php echo $article['content'] ;?>
                </div>
                <div class="comments-block">
                    <h2>Комментарии (<?php echo count($commentsList); ?>)</h2>
                    <?php foreach ($commentsList as $comment): ?>
                        <div class="comment">
                            <div class="avatar">
                                <img src="https://picsum.photos/128/128" alt="">
                            </div>
                            <div class="comment__content">
                                <h3><?php echo $comment['author_name']; ?></h3>
                                <a href="#" class="comment__link"><?php echo $comment['created_at']; ?></a>
                                <p><?php echo $comment['comment_text']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="comment__respond">
                        <h2>Написать комментарий</h2>
                        <form action="#" method="post" class="comment__form">
                            <textarea name="text" rows="10" placeholder="Оставьте комментарий"></textarea>
                            <input type="submit" name="submit" value="ДОБАВИТЬ">
                        </form>
                    </div>
                </div>
            </article>
        </div>

        <?php include  ROOT . '/views/layouts/sidebar.php'; ?>

    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>