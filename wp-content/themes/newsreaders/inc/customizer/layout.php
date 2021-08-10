<?php
/**
* Layouts Settings.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Layout Settings', 'newsreaders' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Global Sidebar Layout.
$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $newsreaders_default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'newsreaders_sanitize_sidebar_option',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Global Sidebar Layout', 'newsreaders' ),
	'section'     => 'layout_setting',
	'type'        => 'select',
	'choices'     => array(
		'right-sidebar' => esc_html__( 'Right Sidebar', 'newsreaders' ),
		'left-sidebar'  => esc_html__( 'Left Sidebar', 'newsreaders' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'newsreaders' ),
	    ),
	)
);

// Archive Layout.
$wp_customize->add_setting(
    'newsreaders_archive_layout',
    array(
        'default' 			=> $newsreaders_default['newsreaders_archive_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_archive_layout'
    )
);
$wp_customize->add_control(
    new Newsreaders_Custom_Radio_Image_Control( 
        $wp_customize,
        'newsreaders_archive_layout',
        array(
            'settings'      => 'newsreaders_archive_layout',
            'section'       => 'layout_setting',
            'label'         => esc_html__( 'Archive Layout', 'newsreaders' ),
            'choices'       => array(
            	'default'  => get_template_directory_uri() . '/assets/images/default-layout.png',
                'full'  => get_template_directory_uri() . '/assets/images/fullwidth.png',
                'grid'  => get_template_directory_uri() . '/assets/images/grid-layout.png',
                'masonry'  => get_template_directory_uri() . '/assets/images/grid-layout.png',
            )
        )
    )
);

// Related Posts Enable Disable.
$wp_customize->add_setting('ed_image_content_inverse',
    array(
        'default' => $newsreaders_default['ed_image_content_inverse'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_image_content_inverse',
    array(
        'label' => esc_html__('Enable Inverse Image and Content', 'newsreaders'),
        'section' => 'layout_setting',
        'type' => 'checkbox',
        'active_callback' => 'newsreaders_header_archive_layout_ac',
    )
);
