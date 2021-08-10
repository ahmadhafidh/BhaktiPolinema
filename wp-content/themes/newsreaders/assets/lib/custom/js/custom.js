jQuery(document).ready(function ($) {
    "use strict";


    // Content Gallery Start
    var i = 1;
    $('.entry-content .wp-block-gallery ').each(function () {
        $(this).attr('gallery-data', 'gallery-num-' + i);
        $(this).addClass('gallery-data-slick');
        $(this).addClass('gallery-data-gallery-num-' + i);
        i++;

        var k = 0;
        $(this).find('.blocks-gallery-item').each(function () {
            $(this).attr('gallery-index', k);
            k++;
        });
    });

    var j = 1;
    $('.footer-galleries .wp-block-gallery ').each(function () {

        $(this).append('<div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div>');
        $(this).append('<div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div>');

        $(this).addClass('gallery-num-' + j);
        j++;

        $(this).addClass('newsreaders-slick-dactivated');
    });

    $('.gallery-data-slick .blocks-gallery-item a').click(function (event) {
        event.preventDefault();

    });
    $('.gallery-data-slick .blocks-gallery-item').click(function () {

        if (!$(this).closest('.gallery-data-slick').hasClass('columns-1')) {

            $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');

            var galid = $(this).closest('.gallery-data-slick').attr('gallery-data');
            $('.' + galid).addClass('gallery-show fullscreen');

            if ($('.' + galid).hasClass('newsreaders-slick-dactivated')) {

                $('.' + galid + ' .blocks-gallery-grid').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    autoplay: false,
                    autoplaySpeed: 8000,
                    infinite: true,
                    nextArrow: '<button type="button" class="slide-btn slide-next-icon ion ion-ios-arrow-forward"></button>',
                    prevArrow: '<button type="button" class="slide-btn slide-prev-icon ion ion-ios-arrow-back"></button>',
                    dots: false,
                });
            }
            var galindex = $(this).attr('gallery-index');
            $('.' + galid + ' .blocks-gallery-grid').slick('slickGoTo', galindex);
            $('.' + galid).removeClass('newsreaders-slick-dactivated');

        }

    });

    $('.wp-block-gallery.columns-1').append('<div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div>');
    $('.wp-block-gallery.columns-1').append('<div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div>');
    $('.gallery-popup').click(function () {
        $(this).closest('.wp-block-gallery').addClass('fullscreen');
        $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');
        $('.wp-block-gallery.columns-1 .blocks-gallery-grid').slick("slickSetOption", "speed", 500, !0);

    });

    $('.gallery-popup-close').click(function () {
        $(this).closest('.wp-block-gallery').removeClass('fullscreen gallery-show');
        $('html').attr('style', '');
        $('.wp-block-gallery.columns-1 .blocks-gallery-grid').slick("slickSetOption", "speed", 500, !0);

    });

    // Content Gallery End

    // Widget Gallery Start

    $('.widget_media_gallery a').click(function (event) {
        event.preventDefault();
    });

    var k = 1;
    $('.widget_media_gallery').each(function () {

        if (!$(this).find('.gallery').hasClass('gallery-columns-1')) {

            $(this).attr('gallery-id', 'gallery-' + k);
            var gallhtml = $(this).find('.gallery').html();
            $('.widget-footer-galleries').append('<div class="footer-gallery-main"><div class="footer-gallery-' + k + '">' + gallhtml + '</div><div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div><div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div></div>');

            var l = 0;
            $(this).find('.gallery-item').each(function () {
                $(this).attr('index-item', l);
                l++;
            });

            k++;
        }

        if ($(this).find('.gallery').hasClass('gallery-columns-1')) {

            $(this).append('<div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div>');
            $(this).append('<div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div>');

        }

    });

    $('.footer-gallery-main a').click(function (event) {
        event.preventDefault();
    });

    $('figure.gallery-item').click(function () {

        if (!$(this).closest('.gallery').hasClass('gallery-columns-1')) {
            $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');
        }
        var clickedgal = $(this).closest('.widget_media_gallery').attr('gallery-id');
        $('.footer-' + clickedgal).closest('.footer-gallery-main').addClass('fullscreen');
        if (!$('.footer-' + clickedgal).hasClass('widget-slider-active')) {

            $('.footer-' + clickedgal).addClass('widget-slider-active');

            $('.footer-' + clickedgal).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: false,
                autoplaySpeed: 8000,
                infinite: true,
                nextArrow: '<button type="button" class="slide-btn slide-next-icon ion ion-ios-arrow-forward"></button>',
                prevArrow: '<button type="button" class="slide-btn slide-prev-icon ion ion-ios-arrow-back"></button>',
                dots: false,
            });

        }
        var galindex = $(this).attr('index-item');
        $('.footer-' + clickedgal).slick('slickGoTo', galindex);

    });

    $('.gallery-popup-close').click(function () {

        $(this).closest('.footer-gallery-main').removeClass('fullscreen gallery-show');
        $('html').attr('style', '');

    });

    $('.widget.widget_media_gallery .gallery-popup').click(function () {
        $(this).closest('.widget_media_gallery').addClass('fullscreen');
        $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');
        $('.gallery-columns-1').slick("slickSetOption", "speed", 500, !0);

    });

    $('.widget.widget_media_gallery .gallery-popup-close').click(function () {
        $(this).closest('.widget_media_gallery').removeClass('fullscreen');
        $('html').attr('style', '');
        $('.gallery-columns-1').slick("slickSetOption", "speed", 500, !0);

    });

    // Widget Gallery End

    // Rating disable
    if (newsreaders_custom.single_post == 1 && newsreaders_custom.newsreaders_ed_post_reaction) {

        $('.tpk-single-rating').remove();
        $('.tpk-comment-rating-label').remove();
        $('.comments-rating').remove();
        $('.tpk-star-rating').remove();

    }
    // Add Class on article
    $('.twp-archive-items.post').each(function () {
        $(this).addClass('twp-article-loded');
    });

    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });

    // Toggle Search
    $('.navbar-control-search').click(function () {
        $('.header-searchbar').toggleClass('header-searchbar-active');

        $('#search-closer').focus();

    });

    $('.skip-link-search-start').focus(function(){
        $('#search-closer').focus();
    });

    $('.skip-link-search-end').focus(function(){
        $('.header-searchbar-area .search-field').focus();
    });

    $('.header-searchbar').click(function () {

        $('.header-searchbar').removeClass('header-searchbar-active');

    });

    $(".header-searchbar-inner").click(function (e) {

        e.stopPropagation(); //stops click event from reaching document

    });

    $('#search-closer').click(function () {

        $('.header-searchbar').removeClass('header-searchbar-active');
        $('.navbar-control-search').focus();

    });

    // Action On Esc Button
    $(document).keyup(function (j) {
        if (j.key === "Escape") { // escape key maps to keycode `27`

            if( $('.header-searchbar').hasClass('header-searchbar-active') ){
                $('.header-searchbar').removeClass('header-searchbar-active');
                $('.navbar-control-search').focus();
            }

            if( $('#offcanvas-menu').hasClass('offcanvas-menu-active') ){
                $('#offcanvas-menu').removeClass('offcanvas-menu-active');
                $('.navbar-control-offcanvas').removeClass('active');
                $('.navbar-control-offcanvas').focus();
            }
            $('html').removeAttr('style');

        }
    });

    // Toggle Menu
    $('.navbar-control-offcanvas').click(function () {

        $(this).addClass('active');
        $('html').attr('style', 'overflow-y: scroll; position: fixed; width: 100%; left: 0px; top: 0px;');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();

    });

    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('html').removeAttr('style');
        $('.navbar-control-offcanvas').focus();

    })

    $('#offcanvas-menu').click(function () {

        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('html').removeAttr('style');

    });

    $('.skip-link-menu-start').focus(function(){

        
        if( !$("#offcanvas-menu #primary-nav-offcanvas").length == 0 ){
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }

        if( !$("#offcanvas-menu #social-nav-offcanvas").length == 0 ){
            $("#offcanvas-menu #social-nav-offcanvas ul li:last-child a").focus();
        }

    });

    $(".offcanvas-wraper").click(function (e) {

        e.stopPropagation(); //stops click event from reaching document

    });

    $('input, a, button').on('focus', function () {
        if ($('#offcanvas-menu').hasClass('offcanvas-menu-active')) {

            if (!$(this).parents('#offcanvas-menu').length) {
                $('.button-offcanvas-close').focus();
            }
        }
    });

    $("ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid, .gallery-columns-1").each(function () {
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: false,
            autoplaySpeed: 8000,
            infinite: true,
            nextArrow: '<button type="button" class="slide-btn slide-next-icon ion ion-ios-arrow-forward"></button>',
            prevArrow: '<button type="button" class="slide-btn slide-prev-icon ion ion-ios-arrow-back"></button>',
            dots: false,
        });
    });

    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    // Masonry Grid
    if ($('.archive-layout-masonry').length > 0) {
        /*Default masonry animation*/
        var grid;
        var hidden = 'scale(0.5)';
        var visible = 'scale(1)';
        grid = $('.archive-layout-masonry').imagesLoaded(function () {
            grid.masonry({
                itemSelector: '.twp-archive-items',
                hiddenStyle: {
                    transform: hidden,
                    opacity: 0
                },
                visibleStyle: {
                    transform: visible,
                    opacity: 1
                }
            });
        });
    }

    // Sticky Components

    $('.widget-area, .post-content-share').theiaStickySidebar({
        additionalMarginTop: 30
    });
    
});

/*	-----------------------------------------------------------------------------------------------
	Intrinsic Ratio Embeds
--------------------------------------------------------------------------------------------------- */

var newsreaders = newsreaders || {},
    $ = jQuery;

var $doc = $(document),
    $win = $(window),
    winHeight = $win.height(),
    winWidth = $win.width();

var viewport = {};
viewport.top = $win.scrollTop();
viewport.bottom = viewport.top + $win.height();

newsreaders.instrinsicRatioVideos = {

    init: function () {

        newsreaders.instrinsicRatioVideos.makeFit();

        $win.on('resize fit-videos', function () {

            newsreaders.instrinsicRatioVideos.makeFit();

        });

    },

    makeFit: function () {

        var vidSelector = "iframe, object, video";

        $(vidSelector).each(function () {

            var $video = $(this),
                $container = $video.parent(),
                iTargetWidth = $container.width();

            // Skip videos we want to ignore
            if ($video.hasClass('intrinsic-ignore') || $video.parent().hasClass('intrinsic-ignore')) {
                return true;
            }

            if (!$video.attr('data-origwidth')) {

                // Get the video element proportions
                $video.attr('data-origwidth', $video.attr('width'));
                $video.attr('data-origheight', $video.attr('height'));

            }

            // Get ratio from proportions
            var ratio = iTargetWidth / $video.attr('data-origwidth');

            // Scale based on ratio, thus retaining proportions
            $video.css('width', iTargetWidth + 'px');
            $video.css('height', ($video.attr('data-origheight') * ratio) + 'px');

        });

    }

}

$doc.ready(function () {

    newsreaders.instrinsicRatioVideos.init();		// Retain aspect ratio of videos on window resize

});