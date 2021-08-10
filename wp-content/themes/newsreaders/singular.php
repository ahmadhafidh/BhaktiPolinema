<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Newsreaders
 * @since 1.0.0
 */
get_header();

    $newsreaders_default = newsreaders_get_default_theme_options();
    $sidebar = esc_html( get_theme_mod( 'global_sidebar_layout', $newsreaders_default['global_sidebar_layout'] ) );
    $newsreaders_post_sidebar = esc_html( get_post_meta( $post->ID, 'newsreaders_post_sidebar_option', true ) );
    $twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
    $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
    $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
    $newsreaders_archive_layout = esc_attr( get_theme_mod( 'newsreaders_archive_layout', $newsreaders_default['newsreaders_archive_layout'] ) );
    $current_id = '';
    $article_wrap_class = '';
    global $post;
    $current_id = $post->ID;
    $single_layout_class = ' single-layout-default';

    if( $twp_navigation_type == '' || $twp_navigation_type == 'global-layout' ){
        $twp_navigation_type = get_theme_mod('twp_navigation_type', $newsreaders_default['twp_navigation_type']);
    }

    if( $newsreaders_post_sidebar == 'global-sidebar' || empty( $newsreaders_post_sidebar ) ){
        $sidebar = $sidebar;
    }else{
        $sidebar = $newsreaders_post_sidebar;
    }
    $newsreaders_post_layout = esc_html( get_post_meta( $post->ID, 'newsreaders_post_layout', true ) );
    if( $newsreaders_post_layout == '' || $newsreaders_post_layout == 'global-layout' ){
        
        $newsreaders_post_layout = get_theme_mod( 'newsreaders_single_post_layout',$newsreaders_default['newsreaders_archive_layout'] );
    }
    if( $newsreaders_post_layout == 'layout-2' ){
        $single_layout_class = ' single-layout-banner';
    }
    if( $newsreaders_header_trending_page == $current_id || $newsreaders_header_popular_page == $current_id ){
        $article_wrap_class = 'archive-layout-' . esc_attr($newsreaders_archive_layout);
        $single_layout_class = '';
    }
    $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
    $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
    if( $newsreaders_header_trending_page == get_the_ID() || $newsreaders_header_popular_page == get_the_ID() ){

        $breadcrumb = true;

    } ?>
    <?php
        if( isset( $breadcrumb ) || $newsreaders_post_layout != 'layout-2' ) {
            newsreaders_breadcrumb();
        }
    ?>

    <div class="singular-main-block">
        <div class="wrapper">
            <div class="wrapper-inner">

                <div id="primary" class="content-area">
                    <main id="site-content" role="main">

                        <?php
                        
                        if( have_posts() ): ?>

                            <div class="article-wraper <?php echo esc_attr($article_wrap_class.$single_layout_class); ?>">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    /**
                                     *  Output comments wrapper if it's a post, or if comments are open,
                                     * or if there's a comment number – and check for password.
                                    **/
                                    if ( $newsreaders_header_trending_page != $current_id && $newsreaders_header_popular_page != $current_id ) {

                                        if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                            <div class="comments-wrapper">
                                                <?php comments_template(); ?>
                                            </div><!-- .comments-wrapper -->

                                        <?php
                                        }
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked newsreaders_post_floating_nav - 10
                         * @hooked newsreaders_related_posts - 20  
                         * @hooked newsreaders_single_post_navigation - 30  
                        */

                        do_action('newsreaders_navigation_action'); ?>

                    </main><!-- #main -->
                </div>

                <?php if ($sidebar != 'no-sidebar') {
                    get_sidebar();
                } ?>

            </div>
        </div>
    </div>

<?php
get_footer();
