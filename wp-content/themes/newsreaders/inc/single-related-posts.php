<?php
/**
* Related Posts Functions.
*
* @package Newsreaders
*/
if( !function_exists('newsreaders_related_posts') ):

	// Single Posts Related Posts.
	function newsreaders_related_posts(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
        $newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;

        if( $newsreaders_header_trending_page != $current_id && $newsreaders_header_popular_page != $current_id && is_single() && 'post' === get_post_type() ){

    		$cats = get_the_category( $post->ID );
    		$category = array();
            if( $cats ){
                foreach( $cats as $cat ){
                    $category[] = $cat->term_id; 
                }
            }

            $related_posts_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => array( $post->ID ), 'category__in' => $category ) );
    		$ed_related_post = absint( get_theme_mod( 'ed_related_post',$newsreaders_default['ed_related_post'] ) );

    		if( $ed_related_post && $related_posts_query->have_posts() ): ?>

    			<div class="theme-block related-posts-area">

    	        	<?php $related_post_title = esc_html( get_theme_mod( 'related_post_title',$newsreaders_default['related_post_title'] ) ); 
    	        	if( $related_post_title ){ ?>

    		            <div class="theme-block-headline">
    	                    <h2 class="theme-block-title font-size-big">
    	                        <?php echo esc_html( $related_post_title ); ?>
    	                    </h2>
    		            </div>
                        
    		        <?php } ?>

    	            <div class="related-posts">

                        <?php while( $related_posts_query->have_posts() ):
                            $related_posts_query->the_post();

                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' ); ?>

                            <div class="related-post-item">
                                <div class="wrapper-inner">
                                    <?php if( has_post_thumbnail() ): ?>
                                        <div class="column column-4">
                                            <div class="post-thumbnail">
                                                <div class="nr-image-section bg-image  post-thumbnail-effects" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')">
                                                    <a href="<?php the_permalink(); ?>" ></a>
                                                </div>
                                            </div>
                                            <!-- <div class="post-thumbnail">
                                                <div class="post-thumbnail-effects">
                                                    <a href="<?php //the_permalink(); ?>" >
                                                        <img src="<?php //echo esc_url( $featured_image[0] ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                                                    </a>
                                                </div>
                                            </div> -->
                                        </div>
                                    <?php endif; ?>

                                    <div class="column column-8">
                                        <div class="post-content">
                                            <header class="entry-header">
                                                <h3 class="entry-title font-size-medium">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </header>

                                            <div class="entry-meta">
                                                <?php
                                                newsreaders_posted_by();
                                                newsreaders_posted_on();
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php endwhile; ?>

    	            </div>

    			</div>

    		<?php
    		wp_reset_postdata();
    		endif;

        }

	}

endif;
add_action( 'newsreaders_navigation_action','newsreaders_related_posts',20 );