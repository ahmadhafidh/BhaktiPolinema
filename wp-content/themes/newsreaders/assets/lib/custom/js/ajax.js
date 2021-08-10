
function newsreaders_pin_posts( cruurenclass = '' ){
    
    jQuery(document).ready( function($) {

        "use scrict";
        if( cruurenclass ){
            var ClickClass = '.'+cruurenclass+' .twp-pin-post';
        }else{
            var ClickClass = '.twp-pin-post';
        }

        $(ClickClass).click(function () {

            var cid = $(this).attr('pid');
            var ppcount = $('.twp-pin-posts-count').attr('twp-pp-count');
            var current = '.'+cid;
            var AddRemove;
            if( $(current).hasClass('twp-pp-active') ){
                ppcount = ppcount - 1;
                $(current).removeClass('twp-pp-active');
                AddRemove = 'remove';

            }else{
                ppcount++;
                $(current).addClass('twp-pp-active');
                AddRemove = 'add';
            }

            $('.twp-pin-posts-count').empty();
            $('.twp-pin-posts-count').attr('twp-pp-count',ppcount);
            $('.twp-pin-posts-count').html(ppcount);

            var pid = $(current).attr('post-id');
            var ajaxurl = newsreaders_ajax.ajax_url;
            var data = {
                'action': 'newsreaders_pin_post_ajax',
                'pid': pid,
                'AddRemove': AddRemove,
                '_wpnonce': newsreaders_ajax.ajax_nonce,
            };
            $.post(ajaxurl, data, function (response) {
                $('.twp-read-later-notification').empty();
                $('.twp-read-later-notification').html(response);
                $('.twp-read-later-notification').fadeIn();
                setTimeout(function () { 
                    $('.twp-read-later-notification').fadeOut();
                }, 3000);

                $('#twp-close-popup').click(function(){
                    $('.twp-read-later-notification').fadeOut();
                });

            });
            
        });

    });
}

newsreaders_pin_posts();