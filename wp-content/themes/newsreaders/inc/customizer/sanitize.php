<?php
/**
* Custom Functions.
*
* @package Newsreaders
*/

if( !function_exists( 'newsreaders_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_sidebar_option( $newsreaders_input ){

        $newsreaders_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $newsreaders_input,$newsreaders_metabox_options ) ){

            return $newsreaders_input;

        }

        return;

    }

endif;

if( !function_exists( 'newsreaders_sanitize_single_pagination_layout' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_single_pagination_layout( $newsreaders_input ){

        $newsreaders_single_pagination = array( 'no-navigation','norma-navigation','ajax-next-post-load' );
        if( in_array( $newsreaders_input,$newsreaders_single_pagination ) ){

            return $newsreaders_input;

        }

        return;

    }

endif;

if( !function_exists( 'newsreaders_sanitize_archive_layout' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_archive_layout( $newsreaders_input ){

        $newsreaders_archive_option = array( 'default','full','grid','masonry' );
        if( in_array( $newsreaders_input,$newsreaders_archive_option ) ){

            return $newsreaders_input;

        }

        return;

    }

endif;

if( !function_exists( 'newsreaders_sanitize_header_layout' ) ) :

    // Sidebar Option Sanitize.
    function newsreaders_sanitize_header_layout( $newsreaders_input ){

        $newsreaders_header_options = array( 'layout-1','layout-2','layout-3' );
        if( in_array( $newsreaders_input,$newsreaders_header_options ) ){

            return $newsreaders_input;

        }

        return;

    }

endif;

if( !function_exists( 'newsreaders_sanitize_single_post_layout' ) ) :

    // Single Layout Option Sanitize.
    function newsreaders_sanitize_single_post_layout( $newsreaders_input ){

        $newsreaders_single_layout = array( 'layout-1','layout-2' );
        if( in_array( $newsreaders_input,$newsreaders_single_layout ) ){

            return $newsreaders_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'newsreaders_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function newsreaders_sanitize_checkbox( $newsreaders_checked ) {

		return ( ( isset( $newsreaders_checked ) && true === $newsreaders_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'newsreaders_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function newsreaders_sanitize_select( $newsreaders_input, $newsreaders_setting ) {

        // Ensure input is a slug.
        $newsreaders_input = sanitize_text_field( $newsreaders_input );

        // Get list of choices from the control associated with the setting.
        $choices = $newsreaders_setting->manager->get_control( $newsreaders_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $newsreaders_input, $choices ) ? $newsreaders_input : $newsreaders_setting->default );

    }

endif;