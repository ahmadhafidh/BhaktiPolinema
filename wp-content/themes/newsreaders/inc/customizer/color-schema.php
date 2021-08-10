<?php
/**
* Color Settings.
*
* @package Newsreaders
*/

$newsreaders_default = newsreaders_get_default_theme_options();

$wp_customize->add_section( 'color_schema',
    array(
    'title'      => esc_html__( 'Color Schema', 'newsreaders' ),
    'priority'   => 110,
    'capability' => 'edit_theme_options',
    'panel'      => 'general_setting',
    )
);

// Color Schema.
$wp_customize->add_setting(
    'newsreaders_color_schema',
    array(
        'default' 			=>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreaders_sanitize_select'
    )
);
$wp_customize->add_control(
    new Newsreaders_Custom_Radio_Color_Schema( 
        $wp_customize,
        'newsreaders_color_schema',
        array(
            'settings'      => 'newsreaders_color_schema',
            'section'       => 'color_schema',
            'label'         => esc_html__( 'Color Schema', 'newsreaders' ),
            'choices'       => array(
                'simple'  => array(
                	'color' => array('#FFA500','#ffffff','#d0021b','#ffffff'),
                	'title' => esc_html__('Classic','newsreaders'),
                ),
                'black'  => array(
                	'color' => array('#d0021b','#ffffff','#e1e1e1','#000000'),
                	'title' => esc_html__('Black','newsreaders'),
                )
            )
        )
    )
);

$wp_customize->add_setting( 'newsreaders_primary_color',
    array(
    'default'           => $newsreaders_default['newsreaders_primary_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'newsreaders_primary_color', 
    array(
        'label'      => __( 'Primary Color', 'newsreaders' ),
        'section'    => 'colors',
        'settings'   => 'newsreaders_primary_color',
    ) ) 
);

$wp_customize->add_setting( 'newsreaders_primary_bg_color',
    array(
    'default'           => $newsreaders_default['newsreaders_primary_bg_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'newsreaders_primary_bg_color', 
    array(
        'label'      => __( 'Primary Background Text Color', 'newsreaders' ),
        'section'    => 'colors',
        'settings'   => 'newsreaders_primary_bg_color',
    ) ) 
);

$wp_customize->add_setting( 'newsreaders_secondary_color',
    array(
    'default'           => $newsreaders_default['newsreaders_secondary_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'newsreaders_secondary_color', 
    array(
        'label'      => __( 'Hover Color', 'newsreaders' ),
        'section'    => 'colors',
        'settings'   => 'newsreaders_secondary_color',
    ) ) 
);

$wp_customize->add_setting( 'newsreaders_secondary_bg_color',
    array(
    'default'           => $newsreaders_default['newsreaders_secondary_bg_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'newsreaders_secondary_bg_color', 
    array(
        'label'      => __( 'Hover Background Text Color', 'newsreaders' ),
        'section'    => 'colors',
        'settings'   => 'newsreaders_secondary_bg_color',
    ) ) 
);

$wp_customize->add_setting( 'newsreaders_text_color',
    array(
    'default'           => $newsreaders_default['newsreaders_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'newsreaders_text_color', 
    array(
        'label'      => __( 'Text Color', 'newsreaders' ),
        'section'    => 'colors',
        'settings'   => 'newsreaders_text_color',
    ) ) 
);