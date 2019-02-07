
    $(function () {
        $('.articles-block > .btn-load').click(function (e) {
            var btn_id = '#' + e.target.id;
            var block = $(btn_id).parent().parent();
            var block_id = block.attr('id');
            console.log(block);
            var qty = block.data('qty');
            $.post('ajax/load', {'offset': qty, 'block_id' : block_id}, function (data) {
                block.children('.articles__content').append(data);
                block.data('qty', qty + 3);
            });
        });
    });
