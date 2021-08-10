<?php
/**
 * Newsreaders functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newsreaders
 */


if ( ! function_exists( 'newsreaders_after_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function newsreaders_after_theme_support() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f5efe0',
			)
		);

		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'eportfolio_content_width', 1140 );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Posts Formate.
		 *
		 * https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Newsreaders, use a find and replace
		 * to change 'newsreaders' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newsreaders', get_template_directory() . '/languages' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

	}

endif;

add_action( 'after_setup_theme', 'newsreaders_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function newsreaders_register_styles() {

	 $fonts_url = Newsreaders_Fonts::newsreaders_get_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('newsreaders-google-fonts', $fonts_url, array(), null);
    }

	$theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'newsreaders-font-ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons.min.css');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/css/slick.min.css');
	wp_enqueue_style( 'newsreaders-style', get_stylesheet_uri(), array(), $theme_version );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/js/slick.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'theiaStickySidebar', get_template_directory_uri() . '/assets/lib/theiaStickySidebar/theia-sticky-sidebar.js', array('jquery'), '', 1);
	wp_enqueue_script( 'newsreaders-ajax', get_template_directory_uri() . '/assets/lib/custom/js/ajax.js', array('jquery'), '', true );
	wp_enqueue_script( 'newsreaders-pagination', get_template_directory_uri() . '/assets/lib/custom/js/pagination.js', array('jquery'), '', 1 );
	wp_enqueue_script( 'newsreaders-custom', get_template_directory_uri() . '/assets/lib/custom/js/custom.js', array('jquery'), '', 1);
	wp_enqueue_script( 'newsreaders-main', get_template_directory_uri() . '/assets/lib/custom/js/main.js', array('jquery'), '', 2);

    $ajax_nonce = wp_create_nonce('newsreaders_ajax_nonce');

    wp_localize_script( 
        'newsreaders-ajax', 
        'newsreaders_ajax',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
            'ajax_nonce' => $ajax_nonce,
         )
    );

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $newsreaders_default = newsreaders_get_default_theme_options();
    $newsreaders_pagination_layout = get_theme_mod( 'newsreaders_pagination_layout',$newsreaders_default['newsreaders_pagination_layout'] );

    // Pagination Data
    wp_localize_script( 
	    'newsreaders-pagination', 
	    'newsreaders_pagination',
	    array(
	        'paged'  => absint( $paged ),
	        'maxpage'   => absint( $max ),
	        'nextLink'   => next_posts( $max, false ),
	        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
	        'loadmore'   => esc_html__( 'Load More Posts', 'newsreaders' ),
	        'nomore'     => esc_html__( 'No More Posts', 'newsreaders' ),
	        'loading'    => esc_html__( 'Loading...', 'newsreaders' ),
	        'pagination_layout'   => esc_html( $newsreaders_pagination_layout ),
	        'ajax_nonce' => $ajax_nonce,
	     )
	);

    global $post;
    $single_post = 0;
    $newsreaders_ed_post_reaction = '';
    if( isset( $post->ID ) && isset( $post->post_type ) && $post->post_type == 'post' ){

    	$newsreaders_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_reaction', true ) );
    	$single_post = 1;

    }
	wp_localize_script(
	    'newsreaders-custom', 
	    'newsreaders_custom',
	    array(
	    	'single_post'	=> absint( $single_post ),
	        'newsreaders_ed_post_reaction'  		=> esc_html( $newsreaders_ed_post_reaction ),
	     )
	);

}

add_action( 'wp_enqueue_scripts', 'newsreaders_register_styles' );

/**
 * Admin enqueue script
 */
function newsreaders_admin_scripts($hook){

    wp_enqueue_style('newsreaders-admin', get_template_directory_uri() . '/assets/lib/custom/css/admin.css');
    wp_enqueue_script('newsreaders-admin', get_template_directory_uri() . '/assets/lib/custom/js/admin.js', array('jquery'), '', 1);
    
}

add_action('admin_enqueue_scripts', 'newsreaders_admin_scripts');

if( !function_exists( 'newsreaders_js_no_js_class' ) ) :

	// js no-js class toggle
	function newsreaders_js_no_js_class() { ?>

		<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	
	<?php
	}
	
endif;

add_action( 'wp_head', 'newsreaders_js_no_js_class' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function newsreaders_menus() {

	$locations = array(
		'na-primary-menu'  => __( 'Primary Menu', 'newsreaders' ),
		'na-primary-footer'  => __( 'Footer Menu', 'newsreaders' ),
		'na-social-menu'  => __( 'Social Menu', 'newsreaders' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'newsreaders_menus' );

$newsreaders_header_layout_1 = get_theme_mod( 'newsreaders_header_layout');
if ($newsreaders_header_layout_1 != "layout-2") {
	add_filter('wp_nav_menu_items', 'newsreaders_add_admin_link', 1, 2);
	function newsreaders_add_admin_link($items, $args){
	    if( $args->theme_location == 'na-primary-menu' ){
	        $item = '<li class="brand-home"><a title="'.esc_html__('Home','newsreaders').'" href="'. esc_url( home_url() ) .'">' . "<span class='icon ion-ios-home'></span>" . '</a></li>';
	        $items = $item . $items;
	    }
	    return $items;
	}
}

/**
 * Recommended Plugins
 */
require get_template_directory() . '/assets/lib/tgmpa/recommended-pligins.php';

/**
 * SVG Icons
 */
require get_template_directory() . '/classes/class-svg-icons.php';

/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Related Posts
 */
require get_template_directory() . '/inc/single-related-posts.php';

/**
 * Custom Functions
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom Header
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Template Functions
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Body Classes
 */
require get_template_directory() . '/classes/body-classes.php';

/**
 * Fonts
 */
require get_template_directory() . '/classes/classes-fonts.php';


/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Read Later
 */
require get_template_directory() . '/inc/read-later.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Breadcrumbs
 */
require get_template_directory() . '/assets/lib/breadcrumbs/breadcrumbs.php';

/**
 * Dynamic Color.
 */
require get_template_directory() . '/assets/lib/custom/css/style.php';

/**
 * Block 1 Home Section.
 */
require get_template_directory() . '/template-parts/components/sections/block-1.php';
require get_template_directory() . '/template-parts/components/sections/block-2.php';
require get_template_directory() . '/template-parts/components/sections/block-3.php';
require get_template_directory() . '/template-parts/components/sections/block-4.php';
require get_template_directory() . '/template-parts/components/sections/carousel.php';
require get_template_directory() . '/template-parts/components/sections/latest-post.php';
require get_template_directory() . '/template-parts/components/sections/breaking-news.php';