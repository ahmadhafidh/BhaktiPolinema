<?php
/**
 * Custom Functions.
 *
 * @package Newsreaders
 */

if( !function_exists( 'newsreaders_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'newsreaders_page_lists' ) ) :

    // Page List.
    function newsreaders_page_lists(){

        $page_lists = array();
        $page_lists[''] = esc_html__( '-- Select Page --','newsreaders' );
        $pages = get_pages(
            array (
                'parent'  => 0, // replaces 'depth' => 1,
            )
        );
        foreach( $pages as $page ){

            $page_lists[$page->ID] = $page->post_title;

        }
        return $page_lists;
    }

endif;

if( !function_exists( 'newsreaders_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

if( !function_exists( 'newsreaders_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

/**
 * Newsreaders SVG Icon helper functions
 *
 * @package WordPress
 * @subpackage Newsreaders
 * @since 1.0.0
 */
if ( ! function_exists( 'newsreaders_the_theme_svg' ) ):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the Newsreaders_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function newsreaders_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return newsreaders_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in newsreaders_get_theme_svg();.

        }else{

            echo newsreaders_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in newsreaders_get_theme_svg();.
            
        }
    }

endif;

if ( ! function_exists( 'newsreaders_get_theme_svg' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function newsreaders_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Newsreaders_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if ( ! function_exists( 'newsreaders_sub_menu_toggle_button' ) ) :

    function newsreaders_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'na-primary-menu' && isset( $args->show_toggles ) ) {
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';
            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {
                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';
                // Add the sub menu toggle
                $args->after .= '<button type="button" class="button-style button-transparent submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="screen-reader-text">' . __( 'Show sub menu', 'newsreaders' ) . '</span>' . newsreaders_get_theme_svg( 'chevron-down' ) . '</button>';
            }
            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)
        } elseif ( $args->theme_location == 'na-primary-menu' ) {
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {
                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = newsreaders_get_theme_svg( 'chevron-down' ) . '</div>';
            } else {
                $args->before = '';
                $args->after  = '';
            }
        }
        return $args;

    }

    add_filter( 'nav_menu_item_args', 'newsreaders_sub_menu_toggle_button', 10, 3 );

endif;

if( !function_exists( 'newsreaders_post_category_list' ) ) :

    // Post Category List.
    function newsreaders_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','newsreaders' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;


if (!function_exists('newsreaders_trending_popular_posts')) :

    // Trending posts list
    function newsreaders_trending_popular_posts( $current_post_id ){

        $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
        $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );

        if( $newsreaders_header_trending_page == $current_post_id ){
            $posts_list = booster_extension_posts_visits(32);
        }else{
            $posts_list = booster_extension_rating_count_list();
        }
        
        arsort( $posts_list );
        if( $posts_list ){

            foreach( $posts_list as $post_id => $visit ) {

                $popular_trending_query = new WP_Query(
                    array( 
                        'post_type' => 'post',
                        'post__in' => array( $post_id ),
                        'ignore_sticky_posts' => 1
                    )
                );

                if ( $popular_trending_query->have_posts() ) :

                    /* Start the Loop */
                    while ( $popular_trending_query->have_posts() ) :
                        $popular_trending_query->the_post();

                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile;

                endif;
            }

        }
    }

endif;

if( !function_exists('newsreaders_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function newsreaders_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists('newsreaders_disable_post_views') ):

    /** Disable Post Views **/
    function newsreaders_disable_post_views() {

        add_filter('booster_extension_filter_views_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('newsreaders_disable_post_read_time') ):

    /** Disable Read Time **/
    function newsreaders_disable_post_read_time() {

        add_filter('booster_extension_filter_readtime_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('newsreaders_disable_post_like_dislike') ):

    /** Disable Like Dislike **/
    function newsreaders_disable_post_like_dislike() {

        add_filter('booster_extension_filter_like_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('newsreaders_disable_post_author_box') ):

    /** Disable Author Box **/
    function newsreaders_disable_post_author_box() {

        add_filter('booster_extension_filter_ab_ed', function ( ) {
            return false;
        });

    }

endif;


add_filter('booster_extension_filter_ss_ed', function ( ) {
    return false;
});

if( !function_exists('newsreaders_disable_post_reaction') ):

    /** Disable Reaction **/
    function newsreaders_disable_post_reaction() {

        add_filter('booster_extension_filter_reaction_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('newsreaders_post_floating_nav') ):

    function newsreaders_post_floating_nav(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_floating_next_previous_nav = get_theme_mod( 'ed_floating_next_previous_nav',$newsreaders_default['ed_floating_next_previous_nav'] );

        if( 'post' === get_post_type() && $ed_floating_next_previous_nav ){

            $next_post = get_next_post();
            $prev_post = get_previous_post();

            if( isset( $prev_post->ID ) ){

                $prev_link = get_permalink( $prev_post->ID );?>

                <div class="floating-nav-arrow floating-nav-prev">
                    <div class="nav-arrow-area">
                        <?php newsreaders_the_theme_svg('arrow-left' ); ?>
                    </div>
                    <article class="nav-arrow-content">

                        <?php if( get_the_post_thumbnail( $prev_post->ID,'thumbnail' ) ){ ?>
                            <div class="post-thumbnail">
                                <?php echo wp_kses_post( get_the_post_thumbnail( $prev_post->ID,'thumbnail' ) ); ?>
                            </div>
                        <?php } ?>

                        <header class="entry-header">
                            <h3 class="entry-title font-size-small">
                                <a href="<?php echo esc_url( $prev_link ); ?>" rel="bookmark">
                                    <?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
                                </a>
                            </h3>
                        </header>
                    </article>
                </div>

            <?php }

            if( isset( $next_post->ID ) ){

                $next_link = get_permalink( $next_post->ID );?>

                <div class="floating-nav-arrow floating-nav-next">
                    <div class="nav-arrow-area">
                        <?php newsreaders_the_theme_svg('arrow-right' ); ?>
                    </div>
                    <article class="nav-arrow-content">

                        <?php if( get_the_post_thumbnail( $next_post->ID,'thumbnail' ) ){ ?>
                        <div class="post-thumbnail">
                            <?php echo wp_kses_post( get_the_post_thumbnail( $next_post->ID,'thumbnail' ) ); ?>
                        </div>
                        <?php } ?>
                        
                        <header class="entry-header">
                            <h3 class="entry-title font-size-small">
                                <a href="<?php echo esc_url( $next_link ); ?>" rel="bookmark">
                                    <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                                </a>
                            </h3>
                        </header>

                    </article>

                </div>

            <?php
            }

        }

    }

endif;

add_action( 'newsreaders_navigation_action','newsreaders_post_floating_nav',10 );

if( !function_exists('newsreaders_single_post_navigation') ):

    function newsreaders_single_post_navigation(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
        $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
        $newsreaders_archive_layout = esc_attr( get_theme_mod( 'newsreaders_archive_layout', $newsreaders_default['newsreaders_archive_layout'] ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $twp_navigation_type == '' || $twp_navigation_type == 'global-layout' ){
            $twp_navigation_type = get_theme_mod('twp_navigation_type', $newsreaders_default['twp_navigation_type']);
        }

        if( $newsreaders_header_trending_page != $current_id && $newsreaders_header_popular_page != $current_id ){

            if( $twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

                if( $twp_navigation_type == 'norma-navigation' ){ ?>

                    <div class="navigation-wrapper">
                        <?php
                        // Previous/next post navigation.
                        the_post_navigation(array(
                            'prev_text' => '<span class="arrow" aria-hidden="true">' . newsreaders_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . __('Previous post:', 'newsreaders') . '</span><span class="post-title">%title</span>',
                            'next_text' => '<span class="arrow" aria-hidden="true">' . newsreaders_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . __('Next post:', 'newsreaders') . '</span><span class="post-title">%title</span>',
                        )); ?>
                    </div>
                    <?php

                }else{

                    $next_post = get_next_post();
                    if( isset( $next_post->ID ) ){

                        $next_post_id = $next_post->ID;
                        echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                    }
                }

            }

        }

    }

endif;

add_action( 'newsreaders_navigation_action','newsreaders_single_post_navigation',30 );


if( !function_exists('newsreaders_header_banner') ):

    function newsreaders_header_banner(){

        global $post;
        $newsreaders_post_layout = '';
        $newsreaders_default = newsreaders_get_default_theme_options();
        if( is_singular() ){

            $newsreaders_post_layout = esc_html( get_post_meta( $post->ID, 'newsreaders_post_layout', true ) );
            if( $newsreaders_post_layout == '' || $newsreaders_post_layout == 'global-layout' ){
                
                $newsreaders_post_layout = get_theme_mod( 'newsreaders_single_post_layout',$newsreaders_default['newsreaders_archive_layout'] );
            }

        }

        if( $newsreaders_post_layout == 'layout-2' && is_singular('post') ) {
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();

                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
                    $newsreaders_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_feature_image', true ) );
                    ?>

                    <div class="single-featured-banner  <?php if( empty( $newsreaders_ed_feature_image ) && $featured_image[0] ){ echo 'banner-has-image'; } ?>">

                        <div class="featured-banner-content">
                            <div class="wrapper">
                                <?php
                                if ( !is_404() && !is_home() && !is_front_page() ) {
                                    newsreaders_breadcrumb();
                                } ?>

                                <div class="wrapper-inner">
                                    <div class="column column-12">
                                        <header class="entry-header entry-header-1">
                                            <h1 class="entry-title">
                                                <?php the_title(); ?>
                                            </h1>
                                        </header>
                                        <div class="entry-meta">
                                            <?php
                                            newsreaders_posted_by();
                                            newsreaders_posted_on();
                                            newsreaders_post_read_time();
                                            
                                            ?>
                                        </div>
                                        <div class="nr-category">
                                            <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php if( empty( $newsreaders_ed_feature_image ) && $featured_image[0] ){ ?>
                            <div class="featured-banner-media">
                                <div class="data-bg data-bg-fixed data-bg-banner" data-background="<?php echo esc_url( $featured_image[0] ); ?>"></div>
                            </div>
                        <?php } ?>

                    </div>

                <?php
                endwhile;
            endif;
               
        }

    }

endif;

if ( ! function_exists( 'newsreaders_header_toggle_search' ) ):

    /**
     * Header Search
     **/
    function newsreaders_header_toggle_search() {

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_header_search = get_theme_mod('ed_header_search', $newsreaders_default['ed_header_search']);
        if( $ed_header_search ){ ?>
            <div class="header-searchbar">
                <div class="header-searchbar-inner primary-bgcolor">
                    <div class="wrapper">
                        <div class="header-searchbar-area">
                            <a href="javascript:void(0)" class="skip-link-search-start"></a>
                            <?php get_search_form(); ?>
                            <button type="button" id="search-closer" class="button-style button-transparent close-popup">
                                <?php newsreaders_the_theme_svg('cross'); ?>
                            </button>
                            <a href="javascript:void(0)" class="skip-link-search-end"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

    }

endif;

add_action( 'newsreaders_before_footer_content_action','newsreaders_header_toggle_search',10 );

if( !function_exists('newsreaders_content_gallery') ):

    // Gallery Contents
    function newsreaders_content_gallery(){ ?>

        <div class="footer-gallery-wrap">
            <div class="wrapper">

            <?php
            global $post;

            if( is_singular('post') || is_singular('page') ){

                if ( !is_page_template('templates/template-home-page.php') && $post->post_content && function_exists('has_block') && has_block('gallery', get_the_content() ) ) {
                    
                    echo '<div class="footer-galleries">';
                    $post_blocks = parse_blocks( get_the_content() );
                    if( $post_blocks ){
                        foreach( $post_blocks as $post_block ){

                            if( isset( $post_block['blockName'] ) && 
                                isset( $post_block['innerHTML'] ) && 
                                $post_block['blockName'] == 'core/gallery' ){

                                echo wp_kses_post( $post_block['innerHTML'] );

                            }
                        }
                    }

                    echo '</div>';

                }
            }

            echo '<div class="widget-footer-galleries">';
            echo '</div>'; ?>

            </div>
        </div>
    <?php
    }

endif;

add_action( 'newsreaders_before_footer_content_action','newsreaders_content_gallery',20 );


if( !function_exists('newsreaders_content_offcanvas') ):

    // Offcanvas Contents
    function newsreaders_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper primary-bgcolor">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-style button-transparent button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'newsreaders'); ?>
                            </span>
                            <span class="bars">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'na-primary-menu',
                        'container' => 'div',
                        'container_class' => 'offcanvas-navigation-area',
                        'show_toggles' => true,
                    )); ?>
                </div>
                <?php if (has_nav_menu('na-social-menu')) { ?>
                    <div id="social-nav-offcanvas" class="offcanvas-item offcanvas-social-navigation">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'na-social-menu',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                            'container' => 'div',
                            'container_class' => 'social-menu',
                            'depth' => 1,
                        )); ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'newsreaders_before_footer_content_action','newsreaders_content_offcanvas',30 );

if( !function_exists('newsreaders_footer_content_widget') ):

    function newsreaders_footer_content_widget(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        if (is_active_sidebar('newsreaders-footer-widget-0') || 
            is_active_sidebar('newsreaders-footer-widget-1') || 
            is_active_sidebar('newsreaders-footer-widget-2')):
            $x = 1;
            $footer_sidebar = 0;
            do {
                if ($x == 3 && is_active_sidebar('newsreaders-footer-widget-2')) {
                    $footer_sidebar++;
                }
                if ($x == 2 && is_active_sidebar('newsreaders-footer-widget-1')) {
                    $footer_sidebar++;
                }
                if ($x == 1 && is_active_sidebar('newsreaders-footer-widget-0')) {
                    $footer_sidebar++;
                }
                $x++;
            } while ($x <= 3);
            if ($footer_sidebar == 1) {
                $footer_sidebar_class = 12;
            } elseif ($footer_sidebar == 2) {
                $footer_sidebar_class = 6;
            } else {
                $footer_sidebar_class = 4;
            }
            $footer_column_layout = absint(get_theme_mod('footer_column_layout', $newsreaders_default['footer_column_layout'])); ?>

            <div class="nr-footer-widgetarea">
                <div class="wrapper">
                    <div class="wrapper-inner">

                        <?php if (is_active_sidebar('newsreaders-footer-widget-0')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?>">
                                <?php dynamic_sidebar('newsreaders-footer-widget-0'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('newsreaders-footer-widget-1')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?>">
                                <?php dynamic_sidebar('newsreaders-footer-widget-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('newsreaders-footer-widget-2')): ?>
                            <div class="column <?php echo 'column-' . absint($footer_sidebar_class); ?>">
                                <?php dynamic_sidebar('newsreaders-footer-widget-2'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php
        endif;

    }

endif;

add_action( 'newsreaders_footer_content_action','newsreaders_footer_content_widget',10 );

if ( ! function_exists( 'newsreaders_footer_logo' ) ) :

    /**
     * Footer Logo HTML
    **/
    function newsreaders_footer_logo() {

        $footer_logo = get_theme_mod('footer_logo');
        if( $footer_logo ){ ?>

            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="footer-logo-link">
                    <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php esc_attr_e('Footer Logo','newsreaders'); ?>" title="<?php esc_attr_e('Footer Logo','newsreaders'); ?>">
                </a>
            </div>
        
        <?php
        }

    }

endif;

if( !function_exists('newsreaders_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function newsreaders_footer_content_info(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $footer_info_layout = get_theme_mod('footer_info_layout',$newsreaders_default['footer_info_layout'] ); ?>

        <?php if( $footer_info_layout != 'layout-1' ){ ?>

            <div class="site-info nr-footer-layout-2">
                <div class="wrapper">
                    <div class="nr-footer-logo">
                        <?php
                            // Site title or logo.
                            newsreaders_footer_logo();
                        ?>
                    </div>
                    <div class="nr-footer-menu">
                        <?php if( has_nav_menu( 'na-primary-footer' ) ){ ?>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'na-primary-footer',
                                'container' => 'div',
                                'container_class' => 'navigation-area',
                                'depth' => 1,
                                'menu_class' => "nr-footer-menu"
                            )); ?>
                
                        <?php } ?>
                    </div>
                    <div class="nr-copyright-text">
                        <?php
                        $ed_footer_copyright = wp_kses_post( get_theme_mod( 'ed_footer_copyright', $newsreaders_default['ed_footer_copyright'] ) );
                        $footer_copyright_text = wp_kses_post( get_theme_mod( 'footer_copyright_text', $newsreaders_default['footer_copyright_text'] ) );
                        echo esc_html__('Copyright ', 'newsreaders') . '&copy; ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '. </span></a> ' . esc_html( $footer_copyright_text );

                        if( $ed_footer_copyright ){
                            echo '<br>';
                            echo esc_html__('Theme: ', 'newsreaders') . 'Newsreaders ' . esc_html__('By ', 'newsreaders') . '<a href="' . esc_url('https://www.themeinwp.com/theme/newsreaders') . '"  title="' . esc_attr__('Themeinwp', 'newsreaders') . '" target="_blank" rel="author"><span>' . esc_html__('Themeinwp. ', 'newsreaders') . '</span></a>';
                            echo esc_html__('Powered by ', 'newsreaders') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'newsreaders') . '" target="_blank"><span>' . esc_html__('WordPress.', 'newsreaders') . '</span></a>';
                        }
                        ?>
                    </div>
                    <?php if (has_nav_menu('na-social-menu')) { ?>
                        <div>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'na-social-menu',
                                'link_before' => '<span class="screen-reader-text">',
                                'link_after' => '</span>',
                                'container' => 'div',
                                'container_class' => 'social-menu',
                                'depth' => 1,
                                'menu_class'=>"nr-footer-social-menu"
                            )); ?>
                        </div>
                    <?php } ?>
                </div><!--/wrapper-->
            </div>

        <?php }else{ ?>

            <div class="site-info nr-footer-layout-1">
                <div class="nr-footer-menu-section">
                    <div class="wrapper">
                        <div class="wrapper-inner">
                        <div class="column column-6 column-lg-4">
                            <?php if (has_nav_menu('na-social-menu')) { ?>
                                <div>
                                    <?php wp_nav_menu(array(
                                        'theme_location' => 'na-social-menu',
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                        'container' => 'div',
                                        'container_class' => 'social-menu',
                                        'depth' => 1,
                                        'menu_class'=>"nr-footer-social-menu"
                                    )); ?>
                            </div>
                            <?php } ?>
                        </div>
                            <div class="column column-6 column-lg-8">
                                <div class="nr-footer-menu">
                                    <?php if( has_nav_menu( 'na-primary-footer' ) ){ ?>
                                        <?php wp_nav_menu(array(
                                            'theme_location' => 'na-primary-footer',
                                            'container' => 'div',
                                            'container_class' => 'navigation-area',
                                            'depth' => 1,
                                            'menu_class' => "nr-footer-menu"
                                        )); ?>
                            
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nr-copyright-section">
                    <div class="wrapper">
                        <div class="wrapper-inner">
                            <div class="column column-6 column-lg-4">
                                <div class="nr-footer-logo">
                                    <?php
                                        // Site title or logo.
                                        newsreaders_footer_logo();
                                    ?>
                                </div>
                            </div>
                            <div class="column column-6 column-lg-8">
                                <div class="nr-copyright-text">
                                    <?php
                                    $ed_footer_copyright = wp_kses_post( get_theme_mod( 'ed_footer_copyright', $newsreaders_default['ed_footer_copyright'] ) );
                                    $footer_copyright_text = wp_kses_post( get_theme_mod( 'footer_copyright_text', $newsreaders_default['footer_copyright_text'] ) );
                                    echo esc_html__('Copyright ', 'newsreaders') . '&copy; ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '. </span></a> ' . esc_html( $footer_copyright_text );

                                    if( $ed_footer_copyright ){
                                        echo '<br>';
                                        echo esc_html__('Theme: ', 'newsreaders') . 'Newsreaders ' . esc_html__('By ', 'newsreaders') . '<a href="' . esc_url('https://www.themeinwp.com/theme/newsreaders') . '"  title="' . esc_attr__('Themeinwp', 'newsreaders') . '" target="_blank" rel="author"><span>' . esc_html__('Themeinwp. ', 'newsreaders') . '</span></a>';
                                        echo esc_html__('Powered by ', 'newsreaders') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'newsreaders') . '" target="_blank"><span>' . esc_html__('WordPress.', 'newsreaders') . '</span></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php } ?>
            
    <?php
    }

endif;

add_action( 'newsreaders_footer_content_action','newsreaders_footer_content_info',20 );

if( !function_exists('newsreaders_color_schema_color') ):

    function newsreaders_color_schema_color( $current_color ){

        $colors_schema = array(

            'simple' => array(
                'background_color' => '#ffffff',
                'newsreaders_primary_color' => '#FFA500',
                'newsreaders_primary_bg_color' => '#ffffff',
                'newsreaders_secondary_bg_color' => '#ffffff',
                'newsreaders_secondary_color' => '#d0021b',
                'newsreaders_text_color'     => '#010101',
            ),

            'fancy' => array(
                'background_color' => '#ffffff',
                'newsreaders_primary_color' => '#fd6375',
                'newsreaders_primary_bg_color' => '#ffffff',
                'newsreaders_secondary_bg_color' => '#ffffff',
                'newsreaders_secondary_color' => '#A9EEE6',
                'newsreaders_text_color'     => '#010101',
            ),

            'black' => array(
                'background_color' => '#2B2B2B',
                'newsreaders_primary_color' => '#d0021b',
                'newsreaders_primary_bg_color' => '#ffffff',
                'newsreaders_secondary_bg_color' => '#010101',
                'newsreaders_secondary_color' => '#e1e1e1',
                'newsreaders_text_color'     => '#ffffff'
            ),
            'fancy 2' => array(
                'background_color' => '#ffffff',
                'newsreaders_primary_color' => '#E56B6A',
                'newsreaders_primary_bg_color' => '#ffffff',
                'newsreaders_secondary_bg_color' => '#ffffff',
                'newsreaders_secondary_color' => '#5F9476',
                'newsreaders_text_color'     => '#010101',
            ),
            'fancy 3' => array(
                'background_color' => '#ffffff',
                'newsreaders_primary_color' => '#4A7CB1',
                'newsreaders_primary_bg_color' => '#ffffff',
                'newsreaders_secondary_bg_color' => '#ffffff',
                'newsreaders_secondary_color' => '#519196',
                'newsreaders_text_color'     => '#010101',
            ),

        );

        if( isset( $colors_schema[$current_color] ) ){
            
            return $colors_schema[$current_color];

        }

        return;

    }

endif;



if ( ! function_exists( 'newsreaders_color_schema_color_action' ) ) :
    function newsreaders_color_schema_color_action() {

        if( isset( $_POST['currentColor'] ) ){
            $current_color = wp_unslash( $_POST['currentColor'] );

            $color_schemes = newsreaders_color_schema_color( $current_color );

            if ( $color_schemes ) {
                echo json_encode( $color_schemes );
            }

        }

        wp_die();

    }

endif;

add_action( 'wp_ajax_nopriv_newsreaders_color_schema_color', 'newsreaders_color_schema_color_action' );
add_action( 'wp_ajax_newsreaders_color_schema_color', 'newsreaders_color_schema_color_action' );

/**
 * Returns post format.
 *
 * @since  newsreaders 1.0.0
 */
if (!function_exists('newsreaders_post_format')):
    function newsreaders_post_format($post_id)
    {
        $post_format = get_post_format($post_id);
        switch ($post_format) {
            case "image":
                $post_format = "<span class='nr-post-format'><i class='ion ion-md-image'></i></span>";
                break;
            case "video":
                $post_format = "<span class='nr-post-format'><i class='ion ion-md-videocam'></i></span>";
                break;
            case "gallery":
                $post_format = "<span class='nr-post-format'><i class='ion ion-md-images'></i></span>";
                break;
            case "quote":
                $post_format = "<span class='nr-post-format'><i class='ion ion-ios-quote'></i></span>";
                break; 
           case "audio":
                $post_format = "<span class='nr-post-format'><i class='ion ion-md-musical-notes'></i></span>";
                break;
            default:
                $post_format = "";
        }

        echo $post_format;
    }

endif;

if( !function_exists('newsreaders_disable_post_read_time_content') ):

    /** Disable Read Time **/
    function newsreaders_disable_post_read_time_content() {

        add_filter('booster_extension_filter_readtime_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists( 'newsreaders_post_read_time' ) ):

    function newsreaders_post_read_time(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_read_time = get_theme_mod('ed_read_time',$newsreaders_default['ed_read_time'] );
        global $post;

        if( $ed_read_time && class_exists( 'Booster_Extension_Class' ) && isset( $post->post_content ) && $post->post_content ): ?>

            <div class="nr-readtime-section">
                <div class="post-read-time">
                    <?php do_action('booster_extension_read_time'); ?> 
                </div>
            </div>
        
        <?php
        endif;
    }
endif;


if( !function_exists( 'newsreaders_post_social_share' ) ):

    function newsreaders_post_social_share(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_social_share = get_theme_mod('ed_social_share',$newsreaders_default['ed_social_share'] );

        if( $ed_social_share && class_exists( 'Booster_Extension_Class' ) ): 

            ?><div class="nr-social-share-section"><?php
            $args = array('layout'=>'layout-2','status'=>'enable');
            do_action('booster_extension_social_icons',$args);
            ?></div><?php

        endif;
    }
endif;



if( !function_exists( 'newsreaders_header_breaking_news_posts' ) ):

    function newsreaders_header_breaking_news_posts(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_header_ticker_posts = get_theme_mod( 'ed_header_ticker_posts',$newsreaders_default['ed_header_ticker_posts'] );
        

        if( $ed_header_ticker_posts ){

            $fallback_images = get_theme_mod('fallback_images');
            $ed_header_ticker_posts_title = get_theme_mod( 'ed_header_ticker_posts_title',$newsreaders_default['ed_header_ticker_posts_title'] );
            $newsreaders_header_ticker_cat = get_theme_mod( 'newsreaders_header_ticker_cat' );
            $block_breaking_news_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 10,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $newsreaders_header_ticker_cat ) ) );


            if( $block_breaking_news_query->have_posts() ): ?>

                <div class="nr-breaking-news-section"> 
                    <div class="nr-wrapper clearfix">
                        
                        <div class="nr-title-section">
                            <h2 class="widget-title font-size-big">
                                    <?php echo esc_html( $ed_header_ticker_posts_title ); ?>
                            </h2>
                        </div>

                        <div class="nr-breaking-news-slider">

                            <?php
                            while( $block_breaking_news_query->have_posts() ):
                                $block_breaking_news_query->the_post();

                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; } ?>

                                <div class="nr-breaking-post"> 
                                    <?php if ( has_post_thumbnail() ) {
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                    } ?>
                                    <div class="nr-image-section bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')">
                                        <a href="<?php the_permalink(); ?>"></a>
                                    </div>  
                                    <div class="nr-desc">
                                        <h3 class="nr-post-title nr-post-title-xs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        </div>

                    </div>
                </div><!--  nr-breaking-news-section-->
                <?php 
                wp_reset_postdata();

            endif;

        }

    }

endif;