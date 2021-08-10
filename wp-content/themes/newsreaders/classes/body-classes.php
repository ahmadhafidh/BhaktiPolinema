<?php
/**
* Body Classes.
*
* @package Newsreaders
*/
 
 if (!function_exists('newsreaders_body_classes')) :

    function newsreaders_body_classes($classes) {

        $newsreaders_default = newsreaders_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $sidebar = esc_html( get_theme_mod( 'global_sidebar_layout', $newsreaders_default['global_sidebar_layout'] ) );

        if( is_page() ){

            $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
            $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
            
            if( $newsreaders_header_trending_page == $post->ID || $newsreaders_header_popular_page == $post->ID ){

                $newsreaders_archive_layout = get_theme_mod( 'newsreaders_archive_layout',$newsreaders_default['newsreaders_archive_layout'] );
                $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$newsreaders_default['ed_image_content_inverse'] );
                if( $newsreaders_archive_layout == 'default' && $ed_image_content_inverse ){

                    $classes[] = 'twp-archive-alternative-'.$newsreaders_archive_layout;

                }

                $classes[] = 'twp-archive-'.$newsreaders_archive_layout;
                
            }

            $newsreaders_post_sidebar_option = esc_html( get_post_meta( $post->ID, 'newsreaders_post_sidebar_option', true ) );
            if( $newsreaders_post_sidebar_option != 'global-sidebar' ){

                $classes[] = $newsreaders_post_sidebar_option;

            }else{
                $classes[] = $sidebar;
            }

        }

        if( is_singular('post') ){

            $newsreaders_post_layout = esc_html( get_post_meta( $post->ID, 'newsreaders_post_layout', true ) );
            

            if( $newsreaders_post_layout == '' || $newsreaders_post_layout == 'global-layout' ){
                
                $newsreaders_post_layout = get_theme_mod( 'newsreaders_single_post_layout',$newsreaders_default['newsreaders_archive_layout'] );

            }

            $classes[] = 'twp-single-'.$newsreaders_post_layout;

            if( $newsreaders_post_layout == 'layout-2' ){
                
                $newsreaders_header_overlay = esc_html( get_post_meta( $post->ID, 'newsreaders_header_overlay', true ) );

                if( $newsreaders_header_overlay == '' || $newsreaders_header_overlay == 'global-layout' ){

                    $ed_header_overlay = get_theme_mod( 'ed_header_overlay',$newsreaders_default['ed_header_overlay'] );

                    if( $ed_header_overlay ){

                        $ed_header_overlay_status = true;

                    }else{

                        $ed_header_overlay_status = false;
                    }

                }else{

                    $ed_header_overlay_status = true;

                }

                if( $ed_header_overlay_status ){

                    $classes[] = 'twp-single-header-overlay';

                }

            }

            $newsreaders_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_reaction', true ) );
            if( $newsreaders_ed_post_reaction ){
                $classes[] = 'hide-comment-rating';
            }

            $newsreaders_post_sidebar_option = esc_html( get_post_meta( $post->ID, 'newsreaders_post_sidebar_option', true ) );
            if( $newsreaders_post_sidebar_option != 'global-sidebar' && !empty( $newsreaders_post_sidebar_option ) ){

                $classes[] = $newsreaders_post_sidebar_option;

            }else{

                $classes[] = $sidebar;
            }


        }

        if( is_archive() || is_home() || is_search() ){

           $newsreaders_archive_layout = get_theme_mod( 'newsreaders_archive_layout',$newsreaders_default['newsreaders_archive_layout'] );
            $ed_image_content_inverse = get_theme_mod( 'ed_image_content_inverse',$newsreaders_default['ed_image_content_inverse'] );
            if( $newsreaders_archive_layout == 'default' && $ed_image_content_inverse ){

                $classes[] = 'twp-archive-alternative-'.$newsreaders_archive_layout;

            }

            $classes[] = 'twp-archive-'.$newsreaders_archive_layout;
            
            $classes[] = $sidebar;
        }

        return $classes;
    }

endif;

add_filter('body_class', 'newsreaders_body_classes');