<?php
/**
* Sidebar Metabox.
*
* @package Newsreaders
*/
 
add_action( 'add_meta_boxes', 'newsreaders_metabox' );

if( ! function_exists( 'newsreaders_metabox' ) ):


    function  newsreaders_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newsreaders' ),
            'newsreaders_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newsreaders' ),
            'newsreaders_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$newsreaders_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'newsreaders' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'newsreaders' ),
                ),
    'left-sidebar' => array(
                    'id'		=> 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'newsreaders' ),
                ),
    'no-sidebar' => array(
                    'id'		=> 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'newsreaders' ),
                ),
);

$newsreaders_post_layout_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'newsreaders' ),
    'layout-1' => esc_html__( 'Simple Layout', 'newsreaders' ),
    'layout-2' => esc_html__( 'Banner Layout', 'newsreaders' ),
);

$newsreaders_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'newsreaders' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'newsreaders' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'newsreaders_post_metafield_callback' ) ):
    
	function newsreaders_post_metafield_callback() {
		global $post, $newsreaders_post_sidebar_fields, $newsreaders_post_layout_options, $newsreaders_header_overlay_options;
        $post_type = get_post_type($post->ID);
		wp_nonce_field( basename( __FILE__ ), 'newsreaders_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'newsreaders'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' ): ?>
                        <li>
                            <a id="metabox-navbar-appearance" href="javascript:void(0)">

                                <?php esc_html_e('Appearance Settings', 'newsreaders'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'newsreaders'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','newsreaders'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $newsreaders_post_sidebar = esc_html( get_post_meta( $post->ID, 'newsreaders_post_sidebar_option', true ) ); 
                            if( $newsreaders_post_sidebar == '' ){ $newsreaders_post_sidebar = 'global-sidebar'; }

                            foreach ( $newsreaders_post_sidebar_fields as $newsreaders_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="newsreaders_post_sidebar_option" value="<?php echo esc_attr( $newsreaders_post_sidebar_field['value'] ); ?>" <?php if( $newsreaders_post_sidebar_field['value'] == $newsreaders_post_sidebar ){ echo "checked='checked'";} if( empty( $newsreaders_post_sidebar ) && $newsreaders_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $newsreaders_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>

                <?php if( $post_type == 'post' ): ?>

                    <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','newsreaders'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreaders_post_layout = esc_html( get_post_meta( $post->ID, 'newsreaders_post_layout', true ) ); 
                                if( $newsreaders_post_layout == '' ){ $newsreaders_post_layout = 'global-layout'; }

                                foreach ( $newsreaders_post_layout_options as $key => $newsreaders_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newsreaders_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreaders_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newsreaders_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','newsreaders'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreaders_header_overlay = esc_html( get_post_meta( $post->ID, 'newsreaders_header_overlay', true ) ); 
                                if( $newsreaders_header_overlay == '' ){ $newsreaders_header_overlay = 'global-layout'; }

                                foreach ( $newsreaders_header_overlay_options as $key => $newsreaders_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newsreaders_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreaders_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newsreaders_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Feature Image Setting','newsreaders'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreaders_ed_feature_image = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_feature_image', true ) ); ?>

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_feature_image" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreaders_ed_feature_image ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Feature Image','newsreaders' ); ?>

                                </label>

                            </div>

                        </div>

                         <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Navigation Setting','newsreaders'); ?></h3>

                            <?php $twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label><b><?php esc_html_e( 'Navigation Type','newsreaders' ); ?></b></label>

                                <select name="twp_disable_ajax_load_next_post">

                                    <option <?php if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php esc_html_e('Global Layout','newsreaders'); ?></option>
                                    <option <?php if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php esc_html_e('Disable Navigation','newsreaders'); ?></option>
                                    <option <?php if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php esc_html_e('Next Previous Navigation','newsreaders'); ?></option>
                                    <option <?php if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php esc_html_e('Ajax Load Next 3 Posts Contents','newsreaders'); ?></option>

                                </select>

                            </div>
                        </div>

                    </div>

                <?php endif; ?>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $newsreaders_ed_post_views = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_views', true ) );
                    $newsreaders_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_read_time', true ) );
                    $newsreaders_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_like_dislike', true ) );
                    $newsreaders_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_author_box', true ) );
                    $newsreaders_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_social_share', true ) );
                    $newsreaders_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'newsreaders_ed_post_reaction', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','newsreaders'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_views" value="1" <?php if( $key == $newsreaders_ed_post_views ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Views','newsreaders' ); ?>

                                </label>

                            </div>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_read_time" value="1" <?php if( $key == $newsreaders_ed_post_read_time ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Read Time','newsreaders' ); ?>

                                </label>

                            </div>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_like_dislike" value="1" <?php if( $key == $newsreaders_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Like Dislike','newsreaders' ); ?>

                                </label>

                            </div>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_author_box" value="1" <?php if( $key == $newsreaders_ed_post_author_box ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Author Box','newsreaders' ); ?>

                                </label>

                            </div>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_social_share" value="1" <?php if( $key == $newsreaders_ed_post_social_share ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Social Share','newsreaders' ); ?>

                                </label>

                            </div>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <label class="description">

                                    <input type="checkbox" name="newsreaders_ed_post_reaction" value="1" <?php if( $key == $newsreaders_ed_post_reaction ){ echo "checked='checked'";} ?>/>&nbsp;<?php esc_html_e( 'Disable Post Reaction','newsreaders' ); ?>

                                </label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'newsreaders_save_post_meta' );

if( ! function_exists( 'newsreaders_save_post_meta' ) ):

    function newsreaders_save_post_meta( $post_id ) {

        global $post, $newsreaders_post_sidebar_fields, $newsreaders_post_layout_options, $newsreaders_header_overlay_options;

        if ( !isset( $_POST[ 'newsreaders_post_meta_nonce' ] ) || !wp_verify_nonce( wp_unslash( $_POST['newsreaders_post_meta_nonce'] ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $newsreaders_post_sidebar_fields as $newsreaders_post_sidebar_field ) {  
            
            $old = esc_html( get_post_meta( $post_id, 'newsreaders_post_sidebar_option', true ) ); 
            $new = newsreaders_sanitize_sidebar_option_meta( wp_unslash( $_POST['newsreaders_post_sidebar_option'] ) );

            if ( $new && $new != $old ){

                update_post_meta ( $post_id, 'newsreaders_post_sidebar_option', $new );

            }elseif( '' == $new && $old ) {

                delete_post_meta( $post_id,'newsreaders_post_sidebar_option', $old );

            }
            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = newsreaders_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) );
        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }

        foreach ( $newsreaders_post_layout_options as $newsreaders_post_layout_option ) {  
            
            $newsreaders_post_layout_old = esc_html( get_post_meta( $post_id, 'newsreaders_post_layout', true ) ); 
            $newsreaders_post_layout_new = newsreaders_sanitize_post_layout_option_meta( wp_unslash( $_POST['newsreaders_post_layout'] ) );

            if ( $newsreaders_post_layout_new && $newsreaders_post_layout_new != $newsreaders_post_layout_old ){

                update_post_meta ( $post_id, 'newsreaders_post_layout', $newsreaders_post_layout_new );

            }elseif( '' == $newsreaders_post_layout_new && $newsreaders_post_layout_old ) {

                delete_post_meta( $post_id,'newsreaders_post_layout', $newsreaders_post_layout_old );

            }
            
        }

        foreach ( $newsreaders_header_overlay_options as $newsreaders_header_overlay_option ) {  
            
            $newsreaders_header_overlay_old = esc_html( get_post_meta( $post_id, 'newsreaders_header_overlay', true ) ); 
            $newsreaders_header_overlay_new = newsreaders_sanitize_header_overlay_option_meta( wp_unslash( $_POST['newsreaders_header_overlay'] ) );

            if ( $newsreaders_header_overlay_new && $newsreaders_header_overlay_new != $newsreaders_header_overlay_old ){

                update_post_meta ( $post_id, 'newsreaders_header_overlay', $newsreaders_header_overlay_new );

            }elseif( '' == $newsreaders_header_overlay_new && $newsreaders_header_overlay_old ) {

                delete_post_meta( $post_id,'newsreaders_header_overlay', $newsreaders_header_overlay_old );

            }
            
        }

        $newsreaders_ed_feature_image_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_feature_image', true ) ); 
        $newsreaders_ed_feature_image_new = esc_html( wp_unslash( $_POST['newsreaders_ed_feature_image'] ) );

        if ( $newsreaders_ed_feature_image_new && $newsreaders_ed_feature_image_new != $newsreaders_ed_feature_image_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_feature_image', $newsreaders_ed_feature_image_new );

        }elseif( '' == $newsreaders_ed_feature_image_new && $newsreaders_ed_feature_image_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_feature_image', $newsreaders_ed_feature_image_old );

        }

        $newsreaders_ed_post_views_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_views', true ) ); 
        $newsreaders_ed_post_views_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_views'] ) );

        if ( $newsreaders_ed_post_views_new && $newsreaders_ed_post_views_new != $newsreaders_ed_post_views_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_views', $newsreaders_ed_post_views_new );

        }elseif( '' == $newsreaders_ed_post_views_new && $newsreaders_ed_post_views_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_views', $newsreaders_ed_post_views_old );

        }

        $newsreaders_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_read_time', true ) ); 
        $newsreaders_ed_post_read_time_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_read_time'] ) );

        if ( $newsreaders_ed_post_read_time_new && $newsreaders_ed_post_read_time_new != $newsreaders_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_read_time', $newsreaders_ed_post_read_time_new );

        }elseif( '' == $newsreaders_ed_post_read_time_new && $newsreaders_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_read_time', $newsreaders_ed_post_read_time_old );

        }

        $newsreaders_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_like_dislike', true ) ); 
        $newsreaders_ed_post_like_dislike_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_like_dislike'] ) );

        if ( $newsreaders_ed_post_like_dislike_new && $newsreaders_ed_post_like_dislike_new != $newsreaders_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_like_dislike', $newsreaders_ed_post_like_dislike_new );

        }elseif( '' == $newsreaders_ed_post_like_dislike_new && $newsreaders_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_like_dislike', $newsreaders_ed_post_like_dislike_old );

        }

        $newsreaders_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_author_box', true ) ); 
        $newsreaders_ed_post_author_box_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_author_box'] ) );

        if ( $newsreaders_ed_post_author_box_new && $newsreaders_ed_post_author_box_new != $newsreaders_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_author_box', $newsreaders_ed_post_author_box_new );

        }elseif( '' == $newsreaders_ed_post_author_box_new && $newsreaders_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_author_box', $newsreaders_ed_post_author_box_old );

        }

        $newsreaders_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_social_share', true ) ); 
        $newsreaders_ed_post_social_share_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_social_share'] ) );

        if ( $newsreaders_ed_post_social_share_new && $newsreaders_ed_post_social_share_new != $newsreaders_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_social_share', $newsreaders_ed_post_social_share_new );

        }elseif( '' == $newsreaders_ed_post_social_share_new && $newsreaders_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_social_share', $newsreaders_ed_post_social_share_old );

        }

        $newsreaders_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'newsreaders_ed_post_reaction', true ) ); 
        $newsreaders_ed_post_reaction_new = esc_html( wp_unslash( $_POST['newsreaders_ed_post_reaction'] ) );

        if ( $newsreaders_ed_post_reaction_new && $newsreaders_ed_post_reaction_new != $newsreaders_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'newsreaders_ed_post_reaction', $newsreaders_ed_post_reaction_new );

        }elseif( '' == $newsreaders_ed_post_reaction_new && $newsreaders_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'newsreaders_ed_post_reaction', $newsreaders_ed_post_reaction_old );

        }

    }

endif;   