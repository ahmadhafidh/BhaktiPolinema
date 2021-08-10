<?php
/**
* Typography Settings.
*
* @package Newsreaders
*/
$body_fonts = Newsreaders_Fonts::newsreaders_get_fonts();
$headings_fonts = Newsreaders_Fonts::newsreaders_get_fonts( $font_type = true );
$newsreaders_default = newsreaders_get_default_theme_options();
$newsreaders_heading_font = get_theme_mod( 'newsreaders_heading_font',$newsreaders_default['newsreaders_heading_font'] );
$headings_fonts_property = Newsreaders_Fonts::newsreaders_get_fonts_property( $newsreaders_heading_font );

// Typography Section.
$wp_customize->add_section( 'typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'newsreaders' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	'panel'      => 'general_setting',
	)
);

$wp_customize->add_setting( 'newsreaders_body_font',
	array(
	'default'           => $newsreaders_default['newsreaders_body_font'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'newsreaders_sanitize_select',
	)
);
$wp_customize->add_control( 'newsreaders_body_font',
	array(
	'label'       => esc_html__( 'Body Font', 'newsreaders' ),
	'section'     => 'typography_setting',
	'type'        => 'select',
	'choices'     => $body_fonts 
	)
);

$wp_customize->add_setting( 'newsreaders_heading_font',
	array(
		'default'           => $newsreaders_default['newsreaders_heading_font'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'newsreaders_sanitize_select',
	)
);
$wp_customize->add_control( 'newsreaders_heading_font',
	array(
	'label'       => esc_html__( 'Headings Font', 'newsreaders' ),
	'section'     => 'typography_setting',
	'type'        => 'select',
	'choices'     => $headings_fonts
	)
);

$wp_customize->add_setting( 'newsreaders_heading_weight',
	array(
		'default'           => $newsreaders_default['newsreaders_heading_weight'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'newsreaders_sanitize_select',
	)
);
$wp_customize->add_control( 'newsreaders_heading_weight',
	array(
		'label'       => esc_html__( 'Headings Weight', 'newsreaders' ),
		'section'     => 'typography_setting',
		'type'        => 'select',
		'choices'     => $headings_fonts_property['weight'],
	)
);

$wp_customize->add_setting( 'newsreaders_heading_case',
	array(
		'default'           => $newsreaders_default['newsreaders_heading_case'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'newsreaders_sanitize_select',
	)
);
$wp_customize->add_control( 'newsreaders_heading_case',
	array(
	'label'       => esc_html__( 'Headings Case', 'newsreaders' ),
	'section'     => 'typography_setting',
	'type'        => 'select',
	'choices'               => array(
		'normal'  	=> esc_html__( 'Normal', 'newsreaders' ),
		'uppercase' => esc_html__( 'Uppercase', 'newsreaders' ),
		'lowercase' => esc_html__( 'Lowercase', 'newsreaders' ),
	    ),
	)
);