(function($) {
    "use strict";

    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $('.header_menu').addClass('navbar-sticky')
        } else {
            $('.header_menu').removeClass('navbar-sticky')
        }
    });
    $(window).scroll(function() {
        if ($(window).scrollTop() > 10) {
            $('.tabs-navbar').addClass('navbar-sticky')
        } else {
            $('.tabs-navbar').removeClass('navbar-sticky')
        }
    });

    $(document).on('click', '#back-to-top, .back-to-top', () => {
        $('html, body').animate({
            scrollTop: 0
        }, '500');
        return false;
    });
    $(window).on('scroll', () => {
        if ($(window).scrollTop() > 500) {
            $('#back-to-top').fadeIn(200);
        } else {
            $('#back-to-top').fadeOut(200);
        }
    });

    $('.rental-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: true,
        draggable: false,
        responsive: [{
            breakpoint: 1000,
            settings: {
                slidesToShow: 2,
                arrows: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }]
    });
    $('.about-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 1000
    });
    var $grid = $('.blog-main').masonry({
        itemSelector: '.mansonry-item',
        columnWidth: 200
    });
    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
    });
    jQuery(document).ready(() => {
        jQuery('.js-video-button').modalVideo({
            channel: 'youtube'
        });
    });
    $('.niceSelect').niceSelect();

}(jQuery));


jQuery(window).on('resize load', () => {
    resize_eb_slider();
}).resize();

function resize_eb_slider() {
    let bodyheight = jQuery(this).height();
    if (jQuery(window).width() > 1400) {
        bodyheight *= 0.90;
        jQuery('.slider').css('height', `${bodyheight}px`);
    }
}
