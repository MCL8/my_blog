<div class="main__sidebar">
    <div class="side-block" id="popular">
        <h3>Популярные статьи</h3>
        <?php foreach (Article::getArticlesList(5, "views_count") as $article): ?>
            <a href="/article/<?php echo $article['id']?>">
                <div class="side__article">
                    <img src=https://picsum.photos/128/90" alt="">
                    <p><?php echo $article['title']; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="side-block" id="random">
        <h3>Случайные статьи</h3>
        <?php foreach (Article::getRandomList(5) as $article): ?>
            <a href="/article/<?php echo $article['id']?>">
                <div class="side__article">
                    <img src=https://picsum.photos/128/90" alt="">
                    <p><?php echo $article['title']; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>