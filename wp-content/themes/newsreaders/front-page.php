<?php
/**
 * @package Newsreaders
 */
get_header();
	
	$newsreaders_default = newsreaders_get_default_theme_options();
	$home_section_reorder_value = get_theme_mod( 'home_section_reorder_value', $newsreaders_default['home_section_reorder_value'] );
	$home_section_reorder_value = explode(",",$home_section_reorder_value );
	
	$paged_active = false;
	if ( !is_paged() ) {
		$paged_active = true;
	}

	foreach( $home_section_reorder_value as $home_section_reorder ){


		switch( $home_section_reorder ){

			case 'home_section_block_1':

				if( $paged_active ){
					newsreaders_block_1_section();
				}

	        break;

	        case 'home_section_block_2':

	        	if( $paged_active ){
					newsreaders_block_2_section();
				}

	        break;


			case 'home_section_block_3':

				if( $paged_active ){
					newsreaders_block_3_section();
				}

	        break;


			case 'home_section_block_4':

				if( $paged_active ){
					newsreaders_block_4_section();
				}

	        break;


	        case 'home_section_block_carousel':

	        	if( $paged_active ){
					newsreaders_carousel_section();
				}

	        break;

	        case 'home_section_block_breaking_news':

	        	if( $paged_active ){
					newsreaders_breaking_news_section();
				}

	        break;

	        case 'home_section_latest_posts':

				newsreaders_latest_posts_section();

	        break;

	        case 'sidebar-widgets-newsreaders-homepage-sidebar':

				if ( $paged_active && is_active_sidebar('newsreaders-homepage-sidebar') ) { ?>
				    <div class=" ">
				        <?php dynamic_sidebar('newsreaders-homepage-sidebar'); ?>
				    </div>
				<?php }

	        break;

		}

	}
	
	

get_footer();