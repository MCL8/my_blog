<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="content">
<main>
    <div class="container-block">
        <?php foreach ($blocksList as $block): ?>
            <div class="articles-block" id="<?php echo $block['id']; ?>" data-qty="3">
                <h1><?php echo $block['header']; ?></h1>

                <?php include ROOT . '/views/layouts/articles_block.php'; ?>

                <button id="btn_<?php echo $block['id']?>">Загрузить еще</button>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</div>

    <script type="text/javascript">
        $(function () {
            $('.articles-block > button').click(function (e) {
                var btn_id = '#' + e.target.id;
                var block = $(btn_id).parent();
                var block_id = block.attr('id');
                var qty = block.data('qty');
                $.post('ajax/load', {'offset': qty, 'block_id' : block_id}, function (data) {
                    block.children('.articles__content').append(data);
                    block.data('qty', qty + 3);
                });
            });
        });
    </script>

<?php include ROOT . '/views/layouts/footer.php'; ?>