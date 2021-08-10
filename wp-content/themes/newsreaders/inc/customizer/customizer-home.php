<?php
/**
* Header Options.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();
$newsreaders_post_category_list = newsreaders_post_category_list();

$wp_customize->add_panel( 'newsreaders_home_panel',
    array(
        'title'      => esc_html__( 'Homepage Section Settings', 'newsreaders' ),
        'priority'   => 150,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Block 1
**/
$wp_customize->add_section( 'home_section_block_1',
	array(
	'title'      => esc_html__( 'Block Section Style One', 'newsreaders' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'newsreaders_home_panel',
	)
);


$wp_customize->add_setting('ed_block_1',
    array(
        'default' => $newsreaders_default['ed_block_1'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_1',
    array(
        'label' => esc_html__('Enable Block One Section', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'block_1_verticle_slide_area_title',
    array(
    'default'           => $newsreaders_default['block_1_verticle_slide_area_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'block_1_verticle_slide_area_title',
    array(
    'label'    => esc_html__( 'Vertical Slide Section Title', 'newsreaders' ),
    'section'  => 'home_section_block_1',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'block_1_verticle_slide_area_title_icon',
    array(
    'default'           => $newsreaders_default['block_1_verticle_slide_area_title_icon'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control( 'block_1_verticle_slide_area_title_icon',
    array(
    'label'    => esc_html__( 'Vertical Slide Section Title Icon', 'newsreaders' ),
    'section'  => 'home_section_block_1',
    'type' => 'select',
    'choices' => array(
        'ion-ios-trending-up' => esc_html__('Trending Up','newsreaders'),
        'ion-ios-pulse' => esc_html__('Pulse','newsreaders'),
        'ion-ios-flash' => esc_html__('Flash','newsreaders'),
        'ion-ios-megaphone' => esc_html__('Megaphone','newsreaders'),
        'ion-ios-repeat' => esc_html__('Repeat','newsreaders'),
    )
    )
);

$wp_customize->add_setting('block_1_verticle_slide_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_1_verticle_slide_area_ctegory',
    array(
        'label' => esc_html__('Vertical Slide Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('block_1_mid_slide_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_1_mid_slide_area_ctegory',
    array(
        'label' => esc_html__('Mid Slide Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);


$wp_customize->add_setting('block_1_right_grid_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_1_right_grid_area_ctegory',
    array(
        'label' => esc_html__('Right Grid Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('ed_block_1_cat',
    array(
        'default' => $newsreaders_default['ed_block_1_cat'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_1_cat',
    array(
        'label' => esc_html__('Enable Category', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_1_date',
    array(
        'default' => $newsreaders_default['ed_block_1_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_1_date',
    array(
        'label' => esc_html__('Enable Date', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_1_author',
    array(
        'default' => $newsreaders_default['ed_block_1_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_1_author',
    array(
        'label' => esc_html__('Enable Author', 'newsreaders'),
        'section' => 'home_section_block_1',
        'type' => 'checkbox',
    )
);

/**
 * Block 2
**/

$wp_customize->add_section( 'home_section_block_2',
    array(
    'title'      => esc_html__( 'Block Section Style Two', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);

$wp_customize->add_setting('ed_block_2',
    array(
        'default' => $newsreaders_default['ed_block_2'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_2',
    array(
        'label' => esc_html__('Enable Block Two Section', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting( 'block_2_left_side_content_area_title',
    array(
    'default'           => $newsreaders_default['block_2_left_side_content_area_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'block_2_left_side_content_area_title',
    array(
    'label'    => esc_html__( 'Left Side Content Title', 'newsreaders' ),
    'section'  => 'home_section_block_2',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('block_2_left_side_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_2_left_side_ctegory',
    array(
        'label' => esc_html__('Left Side Content Post Category', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('block_2_right_side_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_2_right_side_ctegory',
    array(
        'label' => esc_html__('Right Side Content Post Category', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('ed_block_2_cat',
    array(
        'default' => $newsreaders_default['ed_block_2_cat'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_2_cat',
    array(
        'label' => esc_html__('Enable Category', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_2_date',
    array(
        'default' => $newsreaders_default['ed_block_2_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_2_date',
    array(
        'label' => esc_html__('Enable Date', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_2_author',
    array(
        'default' => $newsreaders_default['ed_block_2_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_2_author',
    array(
        'label' => esc_html__('Enable Author', 'newsreaders'),
        'section' => 'home_section_block_2',
        'type' => 'checkbox',
    )
);

/**
 * Block 4
**/

$wp_customize->add_section( 'home_section_block_3',
    array(
    'title'      => esc_html__( 'Block Section Style Three', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);


$wp_customize->add_setting('ed_block_3',
    array(
        'default' => $newsreaders_default['ed_block_3'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_3',
    array(
        'label' => esc_html__('Enable Block Three Section', 'newsreaders'),
        'section' => 'home_section_block_3',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('block_3_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_3_ctegory',
    array(
        'label' => esc_html__('Post Category', 'newsreaders'),
        'section' => 'home_section_block_3',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('block_3_background_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'block_3_background_image',
        array(
            'label'      => esc_html__( 'Background Image', 'newsreaders' ),
            'section'    => 'home_section_block_3',
        )
    )
);

$wp_customize->add_setting('ed_block_3_cat',
    array(
        'default' => $newsreaders_default['ed_block_3_cat'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_3_cat',
    array(
        'label' => esc_html__('Enable Category', 'newsreaders'),
        'section' => 'home_section_block_3',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_3_date',
    array(
        'default' => $newsreaders_default['ed_block_3_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_3_date',
    array(
        'label' => esc_html__('Enable Date', 'newsreaders'),
        'section' => 'home_section_block_3',
        'type' => 'checkbox',
    )
);


/**
 * Block 4
**/
$wp_customize->add_section( 'home_section_block_4',
    array(
    'title'      => esc_html__( 'Block Section Style Four', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);


$wp_customize->add_setting('ed_block_4',
    array(
        'default' => $newsreaders_default['ed_block_4'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_4',
    array(
        'label' => esc_html__('Enable Block Four Section', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('block_4_left_slide_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_4_left_slide_area_ctegory',
    array(
        'label' => esc_html__('left Side Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('block_4_mid_slide_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_4_mid_slide_area_ctegory',
    array(
        'label' => esc_html__('Mid Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);


$wp_customize->add_setting( 'block_4_right_content_area_title',
    array(
    'default'           => $newsreaders_default['block_4_right_content_area_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'block_4_right_content_area_title',
    array(
    'label'    => esc_html__( 'Right Slide Section Title', 'newsreaders' ),
    'section'  => 'home_section_block_4',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('block_4_right_area_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_4_right_area_ctegory',
    array(
        'label' => esc_html__('Right Side Section Post Category', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('ed_block_4_cat',
    array(
        'default' => $newsreaders_default['ed_block_4_cat'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_4_cat',
    array(
        'label' => esc_html__('Enable Category', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_4_date',
    array(
        'default' => $newsreaders_default['ed_block_4_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_4_date',
    array(
        'label' => esc_html__('Enable Date', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_4_author',
    array(
        'default' => $newsreaders_default['ed_block_4_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_4_author',
    array(
        'label' => esc_html__('Enable Author', 'newsreaders'),
        'section' => 'home_section_block_4',
        'type' => 'checkbox',
    )
);

/**
 * Carousel Section
**/

$wp_customize->add_section( 'home_section_block_carousel',
    array(
    'title'      => esc_html__( 'Carousel Section', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);


$wp_customize->add_setting('ed_block_carousel',
    array(
        'default' => $newsreaders_default['ed_block_carousel'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_carousel',
    array(
        'label' => esc_html__('Enable Block Two Section', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('block_carousel_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_carousel_ctegory',
    array(
        'label' => esc_html__('Carousel Post Category', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

$wp_customize->add_setting('ed_block_carousel_slider_autoplay',
    array(
        'default' => $newsreaders_default['ed_block_carousel_slider_autoplay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_carousel_slider_autoplay',
    array(
        'label' => esc_html__('Enable Slider Autoplay', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_carousel_slider_arrow',
    array(
        'default' => $newsreaders_default['ed_block_carousel_slider_arrow'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_carousel_slider_arrow',
    array(
        'label' => esc_html__('Enable Slider Arrow', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_carousel_slider_dots',
    array(
        'default' => $newsreaders_default['ed_block_carousel_slider_dots'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_carousel_slider_dots',
    array(
        'label' => esc_html__('Enable Slider Dots', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_5_cat',
    array(
        'default' => $newsreaders_default['ed_block_5_cat'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_5_cat',
    array(
        'label' => esc_html__('Enable Category', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_5_date',
    array(
        'default' => $newsreaders_default['ed_block_5_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_5_date',
    array(
        'label' => esc_html__('Enable Date', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_block_5_author',
    array(
        'default' => $newsreaders_default['ed_block_5_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_5_author',
    array(
        'label' => esc_html__('Enable Author', 'newsreaders'),
        'section' => 'home_section_block_carousel',
        'type' => 'checkbox',
    )
);


/**
 * Breaking News Section
**/

$wp_customize->add_section( 'home_section_block_breaking_news',
    array(
    'title'      => esc_html__( 'Breaking News Section', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);


$wp_customize->add_setting('ed_block_breaking_news',
    array(
        'default' => $newsreaders_default['ed_block_breaking_news'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_block_breaking_news',
    array(
        'label' => esc_html__('Enable Breaking News Section Section', 'newsreaders'),
        'section' => 'home_section_block_breaking_news',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'block_breaking_news_title',
    array(
    'default'           => $newsreaders_default['block_breaking_news_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'block_breaking_news_title',
    array(
    'label'    => esc_html__( 'Section Title', 'newsreaders' ),
    'section'  => 'home_section_block_breaking_news',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('block_breaking_news_ctegory',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('block_breaking_news_ctegory',
    array(
        'label' => esc_html__('Breaking News Post Category', 'newsreaders'),
        'section' => 'home_section_block_breaking_news',
        'type' => 'select',
        'choices' => $newsreaders_post_category_list
    )
);

/**
 * Latest Posts Section
**/

$wp_customize->add_section( 'home_section_latest_posts',
    array(
    'title'      => esc_html__( 'Selected Homepage Content Section', 'newsreaders' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'newsreaders_home_panel',
    )
);


$wp_customize->add_setting('ed_latest_post_section',
    array(
        'default' => $newsreaders_default['ed_latest_post_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_latest_post_section',
    array(
        'label' => esc_html__('Enable Selected Homepage Content Section', 'newsreaders'),
        'section' => 'home_section_latest_posts',
        'type' => 'checkbox',
    )
);



$home_section_reorder_value = get_theme_mod( 'home_section_reorder_value', $newsreaders_default['home_section_reorder_value'] );
$home_section_reorder_value = explode(",",$home_section_reorder_value );

$j = 1;
foreach( $home_section_reorder_value as $home_section_reorder ){

    if(  $home_section_reorder != 'sidebar-widgets-newsreaders-homepage-sidebar' ){

        $wp_customize->get_section( $home_section_reorder )->priority = $j;

    }
    
    $j ++;
}
