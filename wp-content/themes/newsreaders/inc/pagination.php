<?php
/**
 *
 * Pagination Functions
 *
 * @package True News
 */

if( !function_exists('newsreaders_archive_pagination_x') ):

	// Archive Page Navigation
	function newsreaders_archive_pagination_x(){

		// Global Query
	    if( is_front_page() ){

	    	$posts_per_page = absint( get_option('posts_per_page') );
	        $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	        $posts_args = array(
	            'posts_per_page'        => $posts_per_page,
	            'paged'                 => $paged,
	        );
	        $posts_qry = new WP_Query( $posts_args );
	        $max = $posts_qry->max_num_pages;

	    }else{
	        global $wp_query;
	        $max = $wp_query->max_num_pages;
	        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	    }

		$newsreaders_default = newsreaders_get_default_theme_options();
		$newsreaders_pagination_layout = esc_html( get_theme_mod( 'newsreaders_pagination_layout',$newsreaders_default['newsreaders_pagination_layout'] ) );
		$newsreaders_pagination_load_more = esc_html__('Load More Posts','newsreaders');
		$newsreaders_pagination_no_more_posts = esc_html__('No More Posts','newsreaders');

		if( $newsreaders_pagination_layout == 'next-prev' ){

			if( is_front_page() && is_page() ){

	            $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	            $latest_post_query = new WP_Query( array( 'post_type'=>'post', 'paged'=>$paged ) );?>
	            
	            <nav class="navigation posts-navigation" role="navigation" aria-label="Posts">
	                <div class="nav-links">
	                    <div class="nav-previous">
	                    	<?php echo wp_kses_post(get_next_posts_link( __( 'Older posts', 'newsreaders' ), $latest_post_query->max_num_pages )); ?>
	                    </div>
	                    <div class="nav-next"><?php echo wp_kses_post(get_previous_posts_link( __( 'Newer posts', 'newsreaders' ) )); ?></div>
	                </div>

	            </nav>
	        <?php

	        }else{

	            the_posts_navigation();

	        }

		}elseif( $newsreaders_pagination_layout == 'load-more' ){ ?>

			<div class="twp-ajax-post-load twp-hide-js">

				<div  style="display: none;" class="twp-loaded-content"></div>
				<div style="display: none;" class="twp-loging-status"></div>

				<?php if( $max > 1 ){ ?>

					<a class="twp-loading-button twp-loading-style" href="javascript:void(0)"><?php echo esc_html( $newsreaders_pagination_load_more ); ?></a>

				<?php }else{ ?>

					<a class="twp-loading-button twp-loading-style twp-no-posts" href="javascript:void(0)">
						<?php echo esc_html( $newsreaders_pagination_no_more_posts ); ?>
					</a>

				<?php } ?>

			</div>

		<?php }elseif( $newsreaders_pagination_layout == 'auto-load' ){

			if( $max > 1 ){
				echo '<div style="display: none;" class="twp-loaded-content"></div>';
				echo '<div class="newsreaders-auto-pagination"></div>';
			}else{
				echo '<div style="display: none;" class="twp-loaded-content"></div>';
				echo '<div class="newsreaders-auto-pagination twp-no-posts">'.esc_html( $newsreaders_pagination_no_more_posts ).'</div>';
			}

		}else{

			the_posts_pagination();

		}
			
	}

endif;
add_action('newsreaders_archive_pagination','newsreaders_archive_pagination_x',20);


add_action('wp_ajax_newsreaders_single_infinity', 'newsreaders_single_infinity_callback');
add_action('wp_ajax_nopriv_newsreaders_single_infinity', 'newsreaders_single_infinity_callback');

// Recommendec Post Ajax Call Function.
function newsreaders_single_infinity_callback() {

    if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'newsreaders_ajax_nonce' ) ) {

        $postid = $_POST['postid'];
        $newsreaders_default = newsreaders_get_default_theme_options();
        $post_single_next_posts = new WP_Query( array( 'post_type' => 'post','post_status' => 'publish','posts_per_page' => 1, 'post__in' => array( absint( $postid ) ) ) );

        if ( $post_single_next_posts->have_posts() ) :
            while ( $post_single_next_posts->have_posts() ) :
                $post_single_next_posts->the_post();
                ob_start(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('after-load-ajax '); ?>> 
					
                	<?php if( has_post_thumbnail() ){ ?>

						<div class="post-thumbnail">

							<?php newsreaders_post_thumbnail(); ?>

						</div>

					<?php } ?>


					<header class="entry-header entry-header-1">

						<h1 class="entry-title">

				            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

				        </h1>

					</header>

					<div class="entry-meta pagination-meta-tag">
						<?php
						newsreaders_posted_by();
						newsreaders_posted_on();
						?>

					</div>
					<div class="pagination-category">
						<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false); ?>
					</div>
					
					<div class="post-content">

						<div class="entry-content">

							<?php

							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'newsreaders' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );


							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsreaders' ),
								'after'  => '</div>',
							) ); ?>

						</div>

						<?php if ( is_singular() && 'post' === get_post_type() ) { ?>

							<div class="entry-footer">
								<?php newsreaders_entry_footer( $cats = false, $tags = true, $edits = true ); ?>

							</div>

						<?php } ?>

					</>

					<?php
					if ( function_exists('has_block') && has_block('gallery', get_the_content()) ) {

				        echo '<div class="footer-galleries">';
				        $post_blocks = parse_blocks( get_the_content() );
				        if( $post_blocks ){
				            foreach( $post_blocks as $post_block ){

				                if( isset( $post_block['blockName'] ) && 
				                    isset( $post_block['innerHTML'] ) && 
				                    $post_block['blockName'] == 'core/gallery' ){

				                    echo wp_kses_post( $post_block['innerHTML'] );

				                }
				            }
				        }

				        echo '</div>';

				    } ?>

				</article>

                <?php
                $next_post_id = '';
                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){ 
                    $next_post_id = $next_post->ID;
                }
                $output['postid'][] = $next_post_id;
                $output['content'][] = ob_get_clean();

            endwhile;

            wp_send_json_success($output);
            wp_reset_postdata();
        endif;
    }
    wp_die();
}
