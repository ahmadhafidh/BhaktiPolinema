<?php
/**
* Single Post Options.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();

$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'newsreaders' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_related_post',
    array(
        'default' => $newsreaders_default['ed_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_post',
    array(
        'label' => esc_html__('Enable Related Posts', 'newsreaders'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'related_post_title',
    array(
    'default'           => $newsreaders_default['related_post_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'related_post_title',
    array(
    'label'    => esc_html__( 'Related Posts Section Title', 'newsreaders' ),
    'section'  => 'single_post_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('twp_navigation_type',
    array(
        'default' => $newsreaders_default['twp_navigation_type'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_single_pagination_layout',
    )
);
$wp_customize->add_control('twp_navigation_type',
    array(
        'label' => esc_html__('Single Post Navigation Type', 'newsreaders'),
        'section' => 'single_post_setting',
        'type' => 'select',
        'choices' => array(
                'no-navigation' => esc_html__('Disable Navigation','newsreaders' ),
                'norma-navigation' => esc_html__('Next Previous Navigation','newsreaders' ),
                'ajax-next-post-load' => esc_html__('Ajax Load Next 3 Posts Contents','newsreaders' )
            ),
    )
);

$wp_customize->add_setting('ed_floating_next_previous_nav',
    array(
        'default' => $newsreaders_default['ed_floating_next_previous_nav'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_floating_next_previous_nav',
    array(
        'label' => esc_html__('Enable Floating Next/Previous Post Nav', 'newsreaders'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreaders_single_post_layout',
    array(
        'default'           => $newsreaders_default['newsreaders_single_post_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_single_post_layout'
    )
);
$wp_customize->add_control(
    new Newsreaders_Custom_Radio_Image_Control( 
        $wp_customize,
        'newsreaders_single_post_layout',
        array(
            'settings'      => 'newsreaders_single_post_layout',
            'section'       => 'single_post_setting',
            'label'         => esc_html__( 'Glabal Single Post Layout', 'newsreaders' ),
            'choices'       => array(
                'layout-1'  => get_template_directory_uri() . '/assets/images/single-layout-1.png',
                'layout-2'  => get_template_directory_uri() . '/assets/images/single-layout-2.png',
            )
        )
    )
);

$wp_customize->add_setting('ed_header_overlay',
    array(
        'default' => $newsreaders_default['ed_header_overlay'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_header_overlay',
    array(
        'label' => esc_html__('Enable Header Overlay', 'newsreaders'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'active_callback' => 'newsreaders_overlay_layout_ac',
    )
);