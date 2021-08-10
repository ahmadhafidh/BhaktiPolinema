jQuery(document).ready(function ($) {

    var ajaxurl = newsreaders_pagination.ajax_url;

    function newsreaders_is_on_screen(elem) {

        if ($(elem)[0]) {

            var tmtwindow = jQuery(window);
            var viewport_top = tmtwindow.scrollTop();
            var viewport_height = tmtwindow.height();
            var viewport_bottom = viewport_top + viewport_height;
            var tmtelem = jQuery(elem);
            var top = tmtelem.offset().top;
            var height = tmtelem.height();
            var bottom = top + height;
            return (top >= viewport_top && top < viewport_bottom) ||
                (bottom > viewport_top && bottom <= viewport_bottom) ||
                (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom);
        }
    }

    var n = window.TWP_JS || {};
    var paged = parseInt(newsreaders_pagination.paged) + 1;
    var maxpage = newsreaders_pagination.maxpage;
    var nextLink = newsreaders_pagination.nextLink;
    var loadmore = newsreaders_pagination.loadmore;
    var loading = newsreaders_pagination.loading;
    var nomore = newsreaders_pagination.nomore;
    var pagination_layout = newsreaders_pagination.pagination_layout;

    $('.twp-loading-button').click(function () {
        if ((!$('.twp-no-posts').hasClass('twp-no-posts'))) {

            $('.twp-loading-button').text(loading);
            $('.twp-loging-status').addClass('twp-ajax-loading');
            $('.twp-loaded-content').load(nextLink + ' .post', function () {
                if (paged < 10) {
                    var newlink = nextLink.substring(0, nextLink.length - 2);
                } else {

                    var newlink = nextLink.substring(0, nextLink.length - 3);
                }
                paged++;
                nextLink = newlink + paged + '/';
                if (paged > maxpage) {
                    $('.twp-loading-button').addClass('twp-no-posts');
                    $('.twp-loading-button').text(nomore);
                } else {
                    $('.twp-loading-button').text(loadmore);
                }
                var lodedContent = $('.twp-loaded-content').html();
                $('.twp-loaded-content').html('');

                if ($('.article-wraper').hasClass('archive-layout-masonry')) {

                    if ($('.archive-layout-masonry').length > 0) {
                        var content = $(lodedContent);
                        content.hide();
                        grid = $('.archive-layout-masonry');
                        grid.append(content);
                        grid.imagesLoaded(function () {
                            content.show();

                            var winwidth = $(window).width();
                            $(window).resize(function () {
                                winwidth = $(window).width();
                            });

                            if (winwidth > 990) {
                                grid.masonry('appended', content).masonry();
                            } else {
                                grid.masonry('appended', content);
                            }

                        });
                    }

                } else {

                    $('.content-area .article-wraper').append(lodedContent);

                }

                $('.twp-loging-status').removeClass('twp-ajax-loading');

                $('.twp-archive-items.post').each(function () {

                    if (!$(this).hasClass('twp-article-loded')) {

                        $(this).addClass(paged + '-twp-article-ajax');
                        $(this).addClass('twp-article-loded');
                    }

                });

                newsreaders_pin_posts(paged + '-twp-article-ajax');

            });

        }
    });

    if (pagination_layout == 'auto-load') {
        $(window).scroll(function () {

            if (!$('.newsreaders-auto-pagination').hasClass('twp-ajax-loading') && !$('.newsreaders-auto-pagination').hasClass('twp-no-posts') && maxpage > 1 && newsreaders_is_on_screen('.newsreaders-auto-pagination')) {
                $('.newsreaders-auto-pagination').addClass('twp-ajax-loading');
                $('.newsreaders-auto-pagination').text(loading);
                $('.twp-loaded-content').load(nextLink + ' .post', function () {

                    if (paged < 10) {
                        var newlink = nextLink.substring(0, nextLink.length - 2);
                    } else {

                        var newlink = nextLink.substring(0, nextLink.length - 3);
                    }
                    paged++;
                    nextLink = newlink + paged + '/';
                    if (paged > maxpage) {
                        $('.newsreaders-auto-pagination').addClass('twp-no-posts');
                        $('.newsreaders-auto-pagination').text(nomore);
                    } else {
                        $('.newsreaders-auto-pagination').removeClass('twp-ajax-loading');
                        $('.newsreaders-auto-pagination').text(loadmore);
                    }
                    var lodedContent = $('.twp-loaded-content').html();
                    $('.twp-loaded-content').html('');

                    if ($('.article-wraper').hasClass('archive-layout-masonry')) {

                        if ($('.archive-layout-masonry').length > 0) {
                            var content = $(lodedContent);
                            content.hide();
                            grid = $('.archive-layout-masonry');
                            grid.append(content);
                            grid.imagesLoaded(function () {
                                content.show();

                                var winwidth = $(window).width();
                                $(window).resize(function () {
                                    winwidth = $(window).width();
                                });

                                if (winwidth > 990) {
                                    grid.masonry('appended', content).masonry();
                                } else {
                                    grid.masonry('appended', content);
                                }

                            });
                        }

                    } else {

                        $('.content-area .article-wraper').append(lodedContent);

                    }

                    $('.newsreaders-auto-pagination').removeClass('twp-ajax-loading');

                    $('.twp-archive-items.post').each(function () {

                        if (!$(this).hasClass('twp-article-loded')) {

                            $(this).addClass(paged + '-twp-article-ajax');
                            $(this).addClass('twp-article-loded');

                        }

                    });

                    newsreaders_pin_posts(paged + '-twp-article-ajax');

                });
            }

        });
    }

    $(window).scroll(function () {

        if (!$('.twp-single-infinity').hasClass('twp-single-loading') && $('.twp-single-infinity').attr('loop-count') <= 3 && newsreaders_is_on_screen('.twp-single-infinity')) {

            $('.twp-single-infinity').addClass('twp-single-loading');
            var loopcount = $('.twp-single-infinity').attr('loop-count');
            var postid = $('.twp-single-infinity').attr('next-post');

            var data = {
                'action': 'newsreaders_single_infinity',
                '_wpnonce': newsreaders_pagination.ajax_nonce,
                'postid': postid,
            };

            $.post(ajaxurl, data, function (response) {

                if (response) {
                    var content = response.data.content.join('');
                    var content = $(content);
                    $('.twp-single-infinity').before(content);
                    var newpostid = response.data.postid.join('');
                    var newpostid = $(newpostid);
                    $('.twp-single-infinity').attr('next-post', newpostid['selector']);

                    if ($('body').hasClass('booster-extension')) {
                        likedislike('after-load-ajax');
                        booster_extension_post_reaction('after-load-ajax');
                    }

                    $('article#post-' + postid + ' ul.wp-block-gallery.columns-1, article#post-' + postid + ' .wp-block-gallery.columns-1 .blocks-gallery-grid, article#post-' + postid + ' .gallery-columns-1').each(function () {
                        $(this).slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            fade: true,
                            autoplay: true,
                            autoplaySpeed: 8000,
                            infinite: true,
                            nextArrow: '<button type="button" class="slide-btn slide-next-icon ion ion-ios-arrow-forward"></button>',
                            prevArrow: '<button type="button" class="slide-btn slide-prev-icon ion ion-ios-arrow-back"></button>',
                            dots: false
                        });
                    });

                    var i = 1;
                    $('article#post-' + postid + ' .entry-content .wp-block-gallery ').each(function () {

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
                    $('article#post-' + postid + ' .footer-galleries .wp-block-gallery ').each(function () {

                        $(this).append('<div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div>');
                        $(this).append('<div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div>');

                        $(this).addClass('gallery-num-' + j);
                        j++;

                        $(this).addClass('newsreaders-slick-dactivated');
                    });

                    $('article#post-' + postid + ' .gallery-data-slick .blocks-gallery-item a').click(function (event) {

                        event.preventDefault();

                    });
                    $('article#post-' + postid + ' .gallery-data-slick .blocks-gallery-item').click(function () {

                        if (!$(this).closest('article#post-' + postid + ' .gallery-data-slick').hasClass('columns-1')) {

                            $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');

                            var galid = $(this).closest('.gallery-data-slick').attr('gallery-data');
                            $('article#post-' + postid + ' .' + galid).addClass('gallery-show fullscreen');

                            if ($('article#post-' + postid + ' .' + galid).hasClass('newsreaders-slick-dactivated')) {

                                $('article#post-' + postid + ' .' + galid + ' .blocks-gallery-grid').slick({
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
                            $('article#post-' + postid + ' .' + galid + ' .blocks-gallery-grid').slick('slickGoTo', galindex);
                            $('article#post-' + postid + ' .' + galid).removeClass('newsreaders-slick-dactivated');

                        }

                    });

                    $('article#post-' + postid + ' .wp-block-gallery.columns-1').append('<div class="gallery-popup"><i class="ion ion-ios-add-circle-outline" aria-hidden="true"></i></div>');
                    $('article#post-' + postid + ' .wp-block-gallery.columns-1').append('<div class="gallery-popup-close"><i class="ion ion-ios-close" aria-hidden="true"></i></div>');
                    $('article#post-' + postid + ' .gallery-popup').click(function () {
                        $(this).closest('article#post-' + postid + ' .wp-block-gallery').addClass('fullscreen');
                        $('html').attr('style', 'margin: 0; height: 100%; overflow: hidden');
                        $('article#post-' + postid + ' .wp-block-gallery.columns-1 .blocks-gallery-grid').slick("slickSetOption", "speed", 500, !0);

                    });

                    $('article#post-' + postid + ' .gallery-popup-close').click(function () {

                        $(this).closest('article#post-' + postid + ' .wp-block-gallery').removeClass('fullscreen gallery-show');
                        $('html').attr('style', '');
                        $('article#post-' + postid + ' .wp-block-gallery.columns-1 .blocks-gallery-grid').slick("slickSetOption", "speed", 500, !0);

                    });

                    $('article').each(function () {
                        $(this).removeClass('after-load-ajax');
                    });

                }

                $('.twp-single-infinity').removeClass('twp-single-loading');
                loopcount++;
                $('.twp-single-infinity').attr('loop-count', loopcount);

            });

        }

    });

});