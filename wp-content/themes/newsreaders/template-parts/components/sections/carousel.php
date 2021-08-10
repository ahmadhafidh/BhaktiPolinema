<?php

if( !function_exists('newsreaders_carousel_section') ):

	function newsreaders_carousel_section(){

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_carousel = get_theme_mod( 'ed_block_carousel',$newsreaders_default['ed_block_carousel'] );
		

		if( $ed_block_carousel ){

			$block_carousel_ctegory = get_theme_mod('block_carousel_ctegory');
			$slider_autoplay = get_theme_mod( 'ed_block_carousel_slider_autoplay',$newsreaders_default['ed_block_carousel_slider_autoplay'] );
			$slider_arrows = get_theme_mod( 'ed_block_carousel_slider_arrow',$newsreaders_default['ed_block_carousel_slider_arrow'] );
			$slider_dots = get_theme_mod( 'ed_block_carousel_slider_dots',$newsreaders_default['ed_block_carousel_slider_dots'] );
			$block_carousel_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 7,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_carousel_ctegory ) ) );
			$ed_block_5_cat = get_theme_mod( 'ed_block_5_cat',$newsreaders_default['ed_block_5_cat'] );
			$ed_block_5_date = get_theme_mod( 'ed_block_5_date',$newsreaders_default['ed_block_5_date'] );
			$ed_block_5_author = get_theme_mod( 'ed_block_5_author',$newsreaders_default['ed_block_5_author'] );

			if ( $slider_autoplay ) {
	            $autoplay = 'true';
	        }else{
	            $autoplay = 'false';
	        }
	        if( $slider_dots ) {
	            $dots = 'true';
	        }else {
	            $dots = 'false';
	        }
	        if( $slider_arrows ) {
	            $arrows = 'true';
	        }else {
	            $arrows = 'false';
	        }
	        if( is_rtl() ) {
	            $rtl = 'true';
	        }else{
	            $rtl = 'false';
	        }
			
			if( $block_carousel_query->have_posts() ): ?>

				<div class="nr-carousel-post-section">
				    <div class="nr-carousel-slider nr-slick-arrow" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

				        <?php
		            	while( $block_carousel_query->have_posts() ):
		            		$block_carousel_query->the_post();
		            		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
		            		$fallback_images = get_theme_mod('fallback_images');
							if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

					        <div class="nr-post nr-post-style-3">
								<div class="nr-image-section  nr-image-450 nr-overlay nr-image-hover-effect">
									<a href="<?php the_permalink(); ?>"></a>
									<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
									<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
									<div class="nr-bookmark">
										<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
									</div>
					                <div class="nr-desc">
										
										<?php newsreaders_post_read_time(); ?>
										
										<?php if( $ed_block_5_cat ){ ?>
											<div class="nr-category nr-category-with-bg">
												<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
											</div>
										<?php } ?>

										<h3 class="nr-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										
										<?php if( $ed_block_5_author || $ed_block_5_date ){ ?>

											<div class="nr-meta-tag nr-meta-sm">
												
												<?php
												if( $ed_block_5_author ){
													newsreaders_posted_by();
												}

												if( $ed_block_5_date ){
													newsreaders_posted_on();
												} ?>
												
												<?php newsreaders_post_social_share(); ?>
												
											</div>
										
										<?php } ?>

					                </div>
					            </div>
					        </div>

				        <?php endwhile; ?>

				    </div>
				</div>

			<?php
			endif;

		}

	}

endif;