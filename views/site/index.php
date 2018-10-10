<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="content">
<main>
    <div class="container-block">
        <?php foreach ($blocksList as $block): ?>
            <div class="articles-block" id="<?php echo $block['id']; ?>" data-qty="3">
               <div class="title">
                   <h1><?php echo $block['header']; ?></h1>
               </div>

                <?php include ROOT . '/views/layouts/articles_block.php'; ?>

                <button id="btn_<?php echo $block['id']?>">Загрузить еще</button>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</div>

<script src="/template/js/ajax.js"></script>

<?php include ROOT . '/views/layouts/footer.php'; ?>