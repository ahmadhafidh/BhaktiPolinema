<?php
/**
 * Newsreaders Theme Customizer
 *
 * @package Newsreaders
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('newsreaders_customize_register')) :

function newsreaders_customize_register( $wp_customize ) {

	/** Active Callback Functions. **/
	require get_template_directory() . '/inc/customizer/active-callback.php';

	/** Custom Controls. **/
	require get_template_directory() . '/inc/customizer/custom-classes.php';

	/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/sanitize.php';

	/** Home Section **/
	require get_template_directory() . '/inc/customizer/customizer-home.php';

	/** Sidebar Options. **/
	require get_template_directory() . '/inc/customizer/layout.php';

	/** Header Options. **/
	require get_template_directory() . '/inc/customizer/header.php';

	/** Header Typography. **/
	require get_template_directory() . '/inc/customizer/typography.php';

	/** Pagination **/
	require get_template_directory() . '/inc/customizer/pagination.php';

	/** Posts Options. **/
	require get_template_directory() . '/inc/customizer/post.php';
	
	/** Single Page Options. **/
	require get_template_directory() . '/inc/customizer/single.php';

	/** Footer Options. **/
	require get_template_directory() . '/inc/customizer/footer.php';

	/** Color Schema. **/
	require get_template_directory() . '/inc/customizer/color-schema.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section( 'title_tagline' )->panel = 'general_setting';

	$wp_customize->get_section( 'header_image' )->panel = 'general_setting';
    $wp_customize->get_section( 'header_image' )->priority = '20';  

	$wp_customize->get_section( 'background_image' )->panel = 'general_setting';
	$wp_customize->get_section( 'header_image' )->priority = '25';  

    $wp_customize->get_section( 'colors' )->panel = 'general_setting';
    $wp_customize->get_section( 'colors' )->priority = '100';

    

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'newsreaders_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'newsreaders_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel( 'general_setting',
		array(
			'title'      => esc_html__( 'General Setting', 'newsreaders' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'newsreaders' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Newsreaders_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Newsreaders_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Newsreaders Pro', 'newsreaders' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'newsreaders' ),
				'pro_url'  => esc_url('https://www.themeinwp.com/theme/newsreaders-pro/'),
				'priority'  => 1,
			)
		)
	);

}

endif;
add_action( 'customize_register', 'newsreaders_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('newsreaders_customizer_scripts')) :

    function newsreaders_customizer_scripts(){   
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('newsreaders-customizer', get_template_directory_uri() . '/assets/lib/custom/css/customizer.css');
        wp_enqueue_script('newsreaders-customizer', get_template_directory_uri() . '/assets/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $home_section_reorder_value = get_theme_mod( 'home_section_reorder_value' );
        $home_section_reorder_value = explode(",",$home_section_reorder_value );
        $key_sidebar = array_search ('sidebar-widgets-newsreaders-homepage-sidebar', $home_section_reorder_value);
        $home_url = esc_url( home_url('/') );

        $ajax_nonce = wp_create_nonce('newsreaders_ajax_nonce');
        wp_localize_script( 
		    'newsreaders-customizer', 
		    'newsreaders_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		        'key_sidebar' => $key_sidebar,
		        'home_url' => $home_url,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'newsreaders_customizer_scripts');
add_action('customize_controls_init', 'newsreaders_customizer_scripts');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('newsreaders_customize_partial_blogname')) :

	function newsreaders_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */

if (!function_exists('newsreaders_customize_partial_blogdescription')) :

	function newsreaders_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

endif;


add_action('wp_ajax_newsreaders_customizer_font_weight', 'newsreaders_customizer_font_weight_callback');

// Recommendec Post Ajax Call Function.
function newsreaders_customizer_font_weight_callback() {

    if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( wp_unslash( $_POST['_wpnonce'] ), 'newsreaders_ajax_nonce' ) && isset( $_POST['currentfont'] ) && wp_unslash( $_POST['currentfont'] )  ) {

       $currentfont = wp_unslash( $_POST['currentfont'] );
       $headings_fonts_property = Newsreaders_Fonts::newsreaders_get_fonts_property( $currentfont );

       foreach( $headings_fonts_property['weight'] as $key => $value ){
       		echo '<option value="'.esc_attr( $key ).'">'.esc_html( $value ).'</option>';
       }
    }
    wp_die();
}


add_action( 'wp_ajax_newsreaders_reorder_home_section', 'newsreaders_reorder_home_section' );
function newsreaders_reorder_home_section() {

	if ( isset( $_POST['sections'] ) ) {

		set_theme_mod( 'home_section_reorder_value', wp_unslash( $_POST['sections'] ) );
		
	}
	wp_die(); // this is required to terminate immediately and return a proper response
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsreaders_customize_preview_js() {
	wp_enqueue_script( 'newsreaders-customizer-preview', get_template_directory_uri() . '/assets/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'newsreaders_customize_preview_js' );
