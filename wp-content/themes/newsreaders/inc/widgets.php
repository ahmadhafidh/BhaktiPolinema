<?php
/**
* Widget FUnctions.
*
* @package Newsreaders
*/

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function newsreaders_widgets_init(){
    
    register_sidebar( array(
        'name' => esc_html__('Main Sidebar', 'newsreaders'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'newsreaders'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title font-size-big">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => esc_html__('Top Header Widget Area', 'newsreaders'),
        'id' => 'top-header-sidebar',
        'description' => esc_html__('Add widgets here.', 'newsreaders'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title font-size-big">',
        'after_title' => '</h2>',
    ));
    register_sidebar( array(
        'name' => esc_html__('Homepage Widget Area', 'newsreaders'),
        'id' => 'newsreaders-homepage-sidebar',
        'description' => esc_html__('Add widgets here.', 'newsreaders'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title font-size-big">',
        'after_title' => '</h2>',
    ));


    $newsreaders_default = newsreaders_get_default_theme_options();
    $footer_column_layout = absint( get_theme_mod( 'footer_column_layout',$newsreaders_default['footer_column_layout'] ) );

    for( $i = 0; $i < $footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','newsreaders'); }
    	if( $i == 1 ){ $count = esc_html__('Two','newsreaders'); }
    	if( $i == 2 ){ $count = esc_html__('Three','newsreaders'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'newsreaders').$count,
	        'id' => 'newsreaders-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'newsreaders'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title font-size-big">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'newsreaders_widgets_init');

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widget-base.php';
require get_template_directory() . '/inc/widgets/widget-style-list.php';
require get_template_directory() . '/inc/widgets/widget-post-style-grid.php';
require get_template_directory() . '/inc/widgets/widget-category-list-style.php';
require get_template_directory() . '/inc/widgets/widget-breaking-news-style.php';