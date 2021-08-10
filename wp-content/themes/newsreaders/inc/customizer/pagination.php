<?php
/**
 * Pagination Settings
 *
 * @package Newsreaders
 */

$newsreaders_default = newsreaders_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'newsreaders_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'newsreaders' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'theme_option_panel',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'newsreaders_pagination_layout',
	array(
	'default'           => $newsreaders_default['newsreaders_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'newsreaders_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'newsreaders' ),
	'section'     => 'newsreaders_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','newsreaders'),
		'numeric' => esc_html__('Numeric Method','newsreaders'),
		'load-more' => esc_html__('Ajax Load More Button','newsreaders'),
		'auto-load' => esc_html__('Ajax Auto Load','newsreaders'),
	),
	)
);