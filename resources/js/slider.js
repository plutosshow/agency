$(document).ready(function(){
    $('.slider').bxSlider({
        controls: false,
        auto: true,
        pager: false,
        keyboardEnabled: true,
        mode: 'fade',
    });

    $('.slider-control').bxSlider({
        controls: true,
        auto: true,
        pager: true,
        keyboardEnabled: true,
        mode: 'fade',
    });
});
