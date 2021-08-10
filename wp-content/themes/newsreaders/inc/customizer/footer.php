<?php
/**
* Footer Settings.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();


$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Widget Area', 'newsreaders' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $newsreaders_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'newsreaders_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'newsreaders' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'newsreaders' ),
		'2' => esc_html__( 'Two Column', 'newsreaders' ),
		'3' => esc_html__( 'Three Column', 'newsreaders' ),
	    ),
	)
);

$wp_customize->add_setting( 'footer_background_color',
	array(
	'default'           => $newsreaders_default['footer_background_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'footer_background_color', 
    array(
        'label'      => __( 'Background Color', 'newsreaders' ),
        'section'    => 'footer_widget_area',
        'settings'   => 'footer_background_color',
    ) ) 
);

$wp_customize->add_setting( 'footer_text_color',
	array(
	'default'           => $newsreaders_default['footer_text_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'footer_text_color', 
    array(
        'label'      => __( 'Text Color', 'newsreaders' ),
        'section'    => 'footer_widget_area',
        'settings'   => 'footer_text_color',
    ) ) 
);

$wp_customize->add_section( 'footer_copyright_area',
	array(
	'title'      => esc_html__( 'Copyright Area', 'newsreaders' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('ed_footer_copyright',
    array(
        'default' => $newsreaders_default['ed_footer_copyright'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_checkbox',
    )
);

$wp_customize->add_setting('footer_logo',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'footer_logo',
    	array(
        	'label'      => esc_html__( 'Footer Logo', 'newsreaders' ),
          	'section'    => 'footer_copyright_area',
      	)
   	)
);


$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $newsreaders_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'newsreaders' ),
	'section'  => 'footer_copyright_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'footer_background_copyright_color',
	array(
	'default'           => $newsreaders_default['footer_background_copyright_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'footer_background_copyright_color', 
    array(
        'label'      => __( 'Background Color', 'newsreaders' ),
        'section'    => 'footer_copyright_area',
        'settings'   => 'footer_background_copyright_color',
    ) ) 
);

$wp_customize->add_setting( 'footer_copyright_text_color',
	array(
	'default'           => $newsreaders_default['footer_copyright_text_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'footer_copyright_text_color', 
    array(
        'label'      => __( 'Text Color', 'newsreaders' ),
        'section'    => 'footer_copyright_area',
        'settings'   => 'footer_copyright_text_color',
    ) ) 
);

// Pagination Layout Settings
$wp_customize->add_setting( 'footer_info_layout',
	array(
	'default'           => $newsreaders_default['footer_info_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_info_layout',
	array(
	'label'       => esc_html__( 'Footer Copyright Area Layout', 'newsreaders' ),
	'section'     => 'footer_copyright_area',
	'type'        => 'select',
	'choices'     => array(
		'layout-1' => esc_html__('Layout One','newsreaders'),
		'layout-2' => esc_html__('Layout Two','newsreaders'),
	),
	)
);