<?php
/**
* Posts Settings.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Posts Settings', 'newsreaders' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_post_author',
    array(
        'default' => $newsreaders_default['ed_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_date',
    array(
        'default' => $newsreaders_default['ed_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_category',
    array(
        'default' => $newsreaders_default['ed_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_post_tags',
    array(
        'default' => $newsreaders_default['ed_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_read_time',
    array(
        'default' => $newsreaders_default['ed_read_time'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_read_time',
    array(
        'label' => esc_html__('Enable Read Time', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('ed_social_share',
    array(
        'default' => $newsreaders_default['ed_social_share'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_social_share',
    array(
        'label' => esc_html__('Enable Social Share', 'newsreaders'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);


$wp_customize->add_setting('fallback_images',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'fallback_images',
        array(
            'label'      => esc_html__( 'Posts Fallback Image', 'newsreaders' ),
            'section'    => 'posts_settings',
        )
    )
);