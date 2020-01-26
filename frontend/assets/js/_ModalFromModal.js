$('#calculate-osago-modal, #feedback-modal').on('shown.bs.modal', function () {
    $(this).css({'overflow': 'auto'});
    $('body').css({'overflow': 'hidden'});
});
$('#calculate-osago-modal, #feedback-modal').on('hidden.bs.modal', function () {
    $('body').css({'overflow': 'auto'});
});

$('.btn-in-modal').on('click', function () {
    //закрывает первую модалку
    $(this).closest('div.modal').modal('hide');

    //открывает вторую
    $('html').animate({scrollTop: '0px'}, 1000, 'swing');
    var $secondModal = $($(this).data('target'));
    $secondModal.modal('show');
});