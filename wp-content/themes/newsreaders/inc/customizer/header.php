<?php
/**
* Header Options.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();
$newsreaders_page_lists = newsreaders_page_lists();
$newsreaders_post_category_list = newsreaders_post_category_list();

// Header Advertise Area Section.
$wp_customize->add_section( 'main_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'newsreaders' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Enable Disable Header Date.
$wp_customize->add_setting('ed_header_date',
    array(
        'default' => $newsreaders_default['ed_header_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_date',
    array(
        'label' => esc_html__('Enable Header/Todays Date', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_search',
    array(
        'default' => $newsreaders_default['ed_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_search',
    array(
        'label' => esc_html__('Enable Search', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

// Enable Disable Search.
$wp_customize->add_setting('ed_header_responsive_menu',
    array(
        'default' => $newsreaders_default['ed_header_responsive_menu'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_responsive_menu',
    array(
        'label' => esc_html__('Disable Main Navigation Menu Bar', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_read_later_icon',
    array(
        'default' => $newsreaders_default['ed_header_read_later_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_read_later_icon',
    array(
        'label' => esc_html__('Enable Read Later Icon', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_header_read_later_page',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control('ed_header_read_later_page',
    array(
        'label' => esc_html__('Read Later Page', 'newsreaders'),
        'description' => esc_html__('Selected page should be assigned into "Read Later Page Template" Template.', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'select',
        'choices' => $newsreaders_page_lists,
        'active_callback' => 'newsreaders_read_later_page_ac',
    )
);

$wp_customize->add_setting('ed_header_ticker_posts',
    array(
        'default' => $newsreaders_default['ed_header_ticker_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_ticker_posts',
    array(
        'label' => esc_html__('Enable Breaking News Posts', 'newsreaders'),
        'section' => 'main_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'ed_header_ticker_posts_title',
    array(
    'default'           => $newsreaders_default['ed_header_ticker_posts_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'ed_header_ticker_posts_title',
    array(
    'label'       => esc_html__( 'Breaking News Section Title', 'newsreaders' ),
    'section'     => 'main_header_setting',
    'type'        => 'text',
    )
);


$wp_customize->add_setting( 'newsreaders_header_ticker_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'newsreaders_sanitize_select',
    )
);
$wp_customize->add_control( 'newsreaders_header_ticker_cat',
    array(
    'label'       => esc_html__( 'Breaking News Posts Category', 'newsreaders' ),
    'section'     => 'main_header_setting',
    'type'        => 'select',
    'choices'     => $newsreaders_post_category_list,
    )
);

// Archive Layout.
$wp_customize->add_setting(
    'newsreaders_header_layout',
    array(
        'default'           => $newsreaders_default['newsreaders_header_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_header_layout'
    )
);
$wp_customize->add_control(
    new Newsreaders_Custom_Radio_Image_Control( 
        $wp_customize,
        'newsreaders_header_layout',
        array(
            'settings'      => 'newsreaders_header_layout',
            'section'       => 'main_header_setting',
            'label'         => esc_html__( 'Header Layout', 'newsreaders' ),
            'choices'       => array(
                'layout-1'  => get_template_directory_uri() . '/assets/images/layout-1.png',
                'layout-2'  => get_template_directory_uri() . '/assets/images/layout-2.png',
                'layout-3'  => get_template_directory_uri() . '/assets/images/layout-3.png',
            )
        )
    )
);