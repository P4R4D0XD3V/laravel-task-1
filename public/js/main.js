$(document).ready(function () {

    $('.alertNotification').click(function () {
        $('.alertNotification').hide();
    });


    setTimeout(function () {
        $('.alert-custom').fadeOut();
    }, 600);
})
