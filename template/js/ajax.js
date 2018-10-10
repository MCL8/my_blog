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
