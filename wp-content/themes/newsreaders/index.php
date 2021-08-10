<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
    $newsreaders_archive_layout = esc_attr( get_theme_mod( 'newsreaders_archive_layout', $newsreaders_default['newsreaders_archive_layout'] ) );?>

    <div class="archive-main-block">
        <div class="wrapper">
            <div class="wrapper-inner">

                <div id="primary" class="content-area">
                    <main id="site-content" role="main">
                        
                        <?php
                        if( !is_front_page() ) {
                            newsreaders_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper <?php echo 'archive-layout-' . esc_attr( $newsreaders_archive_layout ); ?>">
                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php do_action('newsreaders_archive_pagination');

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main><!-- #main -->
                </div>

                <?php if( $sidebar != 'no-sidebar' ){

                    get_sidebar();
                    
                } ?>

            </div>
        </div>
    </div>

<?php get_footer();
