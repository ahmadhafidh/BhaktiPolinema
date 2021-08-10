<?php
/**
 * Newsreaders Customizer Active Callback Functions
 *
 * @package Newsreaders
 */

function newsreaders_header_archive_layout_ac( $control ){

    $newsreaders_archive_layout = $control->manager->get_setting( 'newsreaders_archive_layout' )->value();
    if( $newsreaders_archive_layout == 'default' ){

        return true;
        
    }
    
    return false;
}

function newsreaders_overlay_layout_ac( $control ){

    $newsreaders_single_post_layout = $control->manager->get_setting( 'newsreaders_single_post_layout' )->value();
    if( $newsreaders_single_post_layout == 'layout-2' ){

        return true;
        
    }
    
    return false;
}

function newsreaders_read_later_page_ac( $control ){

    $ed_header_read_later_icon = $control->manager->get_setting( 'ed_header_read_later_icon' )->value();
    if( $ed_header_read_later_icon ){

        return true;
        
    }
    
    return false;
}