<?php
/**
 * Default Values.
 *
 * @package Newsreaders
 */

if ( ! function_exists( 'newsreaders_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function newsreaders_get_default_theme_options() {

        $newsreaders_defaults = array();

        // Options.
        $newsreaders_defaults['global_sidebar_layout']					= 'right-sidebar';
        $newsreaders_defaults['newsreaders_archive_layout']				= 'default';
        $newsreaders_defaults['newsreaders_pagination_layout']				= 'numeric';
        $newsreaders_defaults['footer_column_layout'] 					= 3;
        $newsreaders_defaults['footer_copyright_text'] 					= esc_html__( 'All rights reserved.', 'newsreaders' );
        $newsreaders_defaults['ed_header_date'] 					= 1;
        $newsreaders_defaults['ed_header_search']                                       = 1;
        $newsreaders_defaults['ed_image_content_inverse'] 				= 0;
        $newsreaders_defaults['ed_header_responsive_menu'] 				= 0;
        $newsreaders_defaults['newsreaders_body_font'] 					= 'Roboto';
        $newsreaders_defaults['newsreaders_heading_font'] 				= 'Poppins';
        $newsreaders_defaults['newsreaders_heading_weight'] 				= '400';
        $newsreaders_defaults['newsreaders_heading_case'] 				= 'normal';
        $newsreaders_defaults['newsreaders_heading_language'] 				= 'latin';
        $newsreaders_defaults['ed_related_post']                			= 1;
        $newsreaders_defaults['related_post_title']             			= esc_html__('Related Post','newsreaders');
        $newsreaders_defaults['ed_header_ticker_posts']                                = 'latin';
        $newsreaders_defaults['ed_header_ticker_posts_title']                           = esc_html__('Breaking News','newsreaders');
        $newsreaders_defaults['twp_navigation_type']              			= 'norma-navigation';
        $newsreaders_defaults['newsreaders_single_post_layout']              		= 'layout-1';
        $newsreaders_defaults['ed_post_author']                				= 1;
        $newsreaders_defaults['ed_post_date']                				= 1;
        $newsreaders_defaults['ed_post_category']                			= 1;
        $newsreaders_defaults['ed_post_tags']                				= 1;
        $newsreaders_defaults['ed_header_overlay']                			= 0;
        $newsreaders_defaults['ed_floating_next_previous_nav']                          = 1;
        $newsreaders_defaults['ed_read_time']                                           = 1;
        $newsreaders_defaults['ed_social_share']                                        = 1;
        $newsreaders_defaults['newsreaders_header_layout']               		= 'layout-1';
        $newsreaders_defaults['footer_background_color']               		        = '#000';
        $newsreaders_defaults['footer_text_color']               			= '#fff';
        $newsreaders_defaults['ed_footer_copyright']               			= 1;
        $newsreaders_defaults['footer_background_copyright_color']                      = '#000';
        $newsreaders_defaults['footer_copyright_text_color']               	        = '#fff';
        $newsreaders_defaults['newsreaders_primary_color']               		= '#FFA500';
        $newsreaders_defaults['newsreaders_primary_bg_color']               		= '#fff';
        $newsreaders_defaults['newsreaders_secondary_color']               		= '#d0021b';
        $newsreaders_defaults['newsreaders_secondary_bg_color']               		= '#fff';
        $newsreaders_defaults['newsreaders_text_color']                                 = '#000000';
        $newsreaders_defaults['ed_block_1']                                             = 1;
        $newsreaders_defaults['block_1_verticle_slide_area_title']             	        = esc_html__('Live','newsreaders');
        $newsreaders_defaults['block_1_verticle_slide_area_title_icon']                 = 'ion-ios-trending-up';
        $newsreaders_defaults['ed_block_carousel']                                      = 0;
        $newsreaders_defaults['ed_block_carousel_slider_arrow']                         = 1;
        $newsreaders_defaults['ed_block_carousel_slider_autoplay']                      = 1;
        $newsreaders_defaults['ed_block_carousel_slider_dots']                          = 0;
        $newsreaders_defaults['ed_block_2']                                             = 0;
        $newsreaders_defaults['block_2_left_side_content_area_title']             	= esc_html__('Recent Post','newsreaders');
        $newsreaders_defaults['ed_block_3']                                             = 0;
        $newsreaders_defaults['ed_block_4']                                             = 0;
        $newsreaders_defaults['block_4_right_content_area_title']             	        = esc_html__('Fashion','newsreaders');
        $newsreaders_defaults['footer_info_layout']               		        = 'layout-1';
        $newsreaders_defaults['ed_latest_post_section']                                 =  1;
        $newsreaders_defaults['ed_header_read_later_icon']                              =  0;
        $newsreaders_defaults['ed_block_1_cat']                                         =  1;
        $newsreaders_defaults['ed_block_1_date']                                        =  1;
        $newsreaders_defaults['ed_block_1_author']                                      =  1;
        $newsreaders_defaults['ed_block_2_cat']                                         =  1;
        $newsreaders_defaults['ed_block_2_date']                                        =  1;
        $newsreaders_defaults['ed_block_2_author']                                      =  1;
        $newsreaders_defaults['ed_block_3_cat']                                         =  1;
        $newsreaders_defaults['ed_block_3_date']                                        =  1;
        $newsreaders_defaults['ed_block_3_author']                                      =  1;
        $newsreaders_defaults['ed_block_4_cat']                                         =  1;
        $newsreaders_defaults['ed_block_4_date']                                        =  1;
        $newsreaders_defaults['ed_block_4_author']                                      =  1;
        $newsreaders_defaults['ed_block_5_cat']                                         =  1;
        $newsreaders_defaults['ed_block_5_date']                                        =  1;
        $newsreaders_defaults['ed_block_5_author']                                      =  1;
        $newsreaders_defaults['ed_block_breaking_news_cat']                             =  1;
        $newsreaders_defaults['ed_block_breaking_news_date']                            =  1;
        $newsreaders_defaults['ed_block_breaking_news_author']                          =  1;
        $newsreaders_defaults['ed_block_breaking_news']                                 =  1;
        $newsreaders_defaults['block_breaking_news_title']                              = esc_html__('Breaking News','newsreaders');

        $newsreaders_defaults['home_section_reorder_value']                             =  'home_section_block_1,home_section_block_2,home_section_block_3,home_section_block_4,home_section_block_carousel,home_section_latest_posts,sidebar-widgets-newsreaders-homepage-sidebar';
	// Pass through filter.
	$newsreaders_defaults = apply_filters( 'newsreaders_filter_default_theme_options', $newsreaders_defaults );

	return $newsreaders_defaults;

	}

endif;
