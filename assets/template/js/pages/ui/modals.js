$(function () {
    $('.js-modal-buttons .btn').on('click', function () {
        var color = $(this).data('color');
        $('#mdModal .').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModal').modal('show');
    });
});