<?php
/**
* Read Later Posts
*
* @package Newsreaders
*/

add_action('wp_ajax_newsreaders_pin_post_ajax', 'newsreaders_pin_post_ajax_callback');
add_action('wp_ajax_nopriv_newsreaders_pin_post_ajax', 'newsreaders_pin_post_ajax_callback');
if (!function_exists('newsreaders_pin_post_ajax_callback')) :

    // Read Later posts
    function newsreaders_pin_post_ajax_callback(){
            
        if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( wp_unslash( $_POST['_wpnonce'] ), 'newsreaders_ajax_nonce' ) && isset( $_POST['pid'] ) && wp_unslash( $_POST['pid'] ) ) {

            $post_id = wp_unslash( $_POST['pid'] );
            $AddRemove = wp_unslash( $_POST['AddRemove'] );
            $pined_posts = get_option('twp_pined_posts');
            
            
            if( $AddRemove == 'add' ){

                if( empty( $pined_posts ) ){
                    $pined_posts = array();
                    update_option( 'twp_pined_posts', $pined_posts);
                }

                set_transient('twp-posts-' . absint($post_id), $post_id, HOUR_IN_SECONDS * 24 );

                $transient_name = 'twp-posts-' . absint( $post_id );
                if ( ! in_array( $transient_name,  $pined_posts ) ) {
                    $pined_posts[] = $transient_name;
                    update_option( 'twp_pined_posts', $pined_posts);
                }

                echo '<div class="twp-innet-notification">';
                echo '<a id="twp-close-popup" href="javascript:void(0)"><i class="ion ion-md-close"></i></a>';
                echo '<h2>'.esc_html( get_the_title($post_id) ).'</h2>';
                echo '<span>'.esc_html__(' is added to your Read Later List.','newsreaders').'</span>';
                echo '</div>';

            }else{

                delete_transient('twp-posts-' . absint($post_id));
                echo '<div class="twp-innet-notification">';
                echo '<a id="twp-close-popup" href="javascript:void(0)"><i class="ion ion-md-close"></i></a>';
                echo '<h2>'.esc_html( get_the_title($post_id) ).'</h2>';
                echo '<span>'.esc_html__(' is removed from your Read Later List.','newsreaders').'</span>';
                echo '</div>';
            }

        }
        die();
    }

endif;

if( !function_exists( 'newsreaders_add_pin_post_html' ) ):

    // Read Later Post html
    function newsreaders_add_pin_post_html($id){

        $pin_posts = newsreaders_add_pin_posts_lists();
        $class = in_array( get_the_ID(),$pin_posts );
        ?>
        <a data-ui-tooltip="<?php echo esc_attr('Read it Later','newsreaders'); ?>" pid="pp-post-<?php the_ID(); ?>" class="twp-pin-post <?php if( $class ){ echo 'twp-pp-active'; } ?> pp-post-<?php the_ID(); ?> twp-hide-js" post-id="<?php the_ID(); ?>" href="javascript:void(0)" data-description="red">
            <?php //newsreaders_the_theme_svg('bookmark'); ?>
            <i class="ion ion-md-book"></i>
        </a>
        <?php

    }

endif;

if( !function_exists( 'newsreaders_add_pin_posts_ids' ) ):

    // Read Later Posts Ids
    function newsreaders_add_pin_posts_ids(){

        $pined_posts = get_option('twp_pined_posts');
        $posts_ids = array();
        if( empty( $pined_posts ) ){ $pined_posts = array(); }

        foreach( $pined_posts as $key => $id ){

            if( get_transient($id) ){
                $posts_ids[] =  get_transient($id).'<br>';
            }else{
                unset( $pined_posts[$key] );
            }

        }
        update_option( 'twp_pined_posts', $pined_posts);
        return $posts_ids;
    }

endif;

if( !function_exists( 'newsreaders_add_pin_posts_lists' ) ):

    // Show Read Later
    function newsreaders_add_pin_posts_lists(){
        
        $posts_ids = newsreaders_add_pin_posts_ids();
        return $posts_ids;
        
    }

endif;
