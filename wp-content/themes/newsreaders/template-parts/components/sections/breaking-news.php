<?php

if( !function_exists('newsreaders_breaking_news_section') ):

	function newsreaders_breaking_news_section(){

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_breaking_news = get_theme_mod( 'ed_block_breaking_news',$newsreaders_default['ed_block_breaking_news'] );
		if( $ed_block_breaking_news ){

			$fallback_images = get_theme_mod('fallback_images');
			$block_breaking_news_title = get_theme_mod( 'block_breaking_news_title',$newsreaders_default['block_breaking_news_title'] );
			$block_breaking_news_ctegory = get_theme_mod( 'block_breaking_news_ctegory' );

			$block_breaking_news_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 10,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_breaking_news_ctegory ) ) );
			
			if( $block_breaking_news_query->have_posts() ): ?>

                <div class="nr-customizer-section nr-customizer-breaking-news-section"> 
                    <div class="wrapper">
                        <div class="nr-title-section">
                        	<h2 class="nr-section-title nr-title-style-1">
	                                <?php echo esc_html( $block_breaking_news_title ); ?>
	                        </h2>
                        </div>
                        <div class="nr-post-list nr-customizer-breaking-news-slider nr-slick-arrow">

                            <?php
                            while( $block_breaking_news_query->have_posts() ):
                                $block_breaking_news_query->the_post();

                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; } ?>
                                <div class="nr-post-wrapper">
                                    <div class="nr-post nr-post-style-2 nr-post-sm  nr-d-flex"> 
                                        <?php if ( has_post_thumbnail() ) {
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                        } ?>
                                        <div class="nr-image-section nr-image-70 nr-image-hover-effect">
                                            <a href="<?php the_permalink(); ?>"></a>
                                            <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')"></div>
                                        </div>  
                                        <div class="nr-desc">
                                            <h3 class="nr-post-title nr-post-title-xs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="nr-meta-tag nr-meta-sm">
                                                <?php newsreaders_posted_by(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        </div>

                    </div>
                </div><!--  nr-breaking-news-section-->
                <?php 
                wp_reset_postdata();

            endif;
		}

	}

endif;