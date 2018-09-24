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