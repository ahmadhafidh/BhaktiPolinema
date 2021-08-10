<?php

if( !function_exists('newsreaders_block_3_section') ):

	function newsreaders_block_3_section(){ 

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_3 = get_theme_mod( 'ed_block_3',$newsreaders_default['ed_block_3'] );
		

		if( $ed_block_3 ){

			$fallback_images = get_theme_mod('fallback_images');
			$block_3_ctegory = get_theme_mod('block_3_ctegory');
			$block_3_background_image = get_theme_mod('block_3_background_image');
			$block_3_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 5,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_3_ctegory ) ) );
			$ed_block_3_cat = get_theme_mod( 'ed_block_3_cat',$newsreaders_default['ed_block_3_cat'] );
			$ed_block_3_date = get_theme_mod( 'ed_block_3_date',$newsreaders_default['ed_block_3_date'] );

			$post_ids_1 = array();
			$post_ids_2 = array();

			if( $block_3_query->have_posts() ):

				$count = 1;
		    	while( $block_3_query->have_posts() ):
		    		$block_3_query->the_post();

		    		if( $count == 1 ){ $post_ids_1[] = get_the_ID(); }
		    		if( $count == 2 || $count == 3 || $count == 4 || $count == 5 ){ $post_ids_2[] = get_the_ID(); }

		    		$count++;
		    		if( $count == 7 ){ break; }

		    	endwhile;

		    endif;
		    if( $post_ids_1 ){
			    $block_3_query_1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'post__in' => $post_ids_1, 'post__not_in' => get_option("sticky_posts") ) );
			}
			if( $post_ids_2 ){
			    $block_3_query_2 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4, 'post__in' => $post_ids_2, 'post__not_in' => get_option("sticky_posts") ) );
			}
			 ?>

			<div class="nr-customizer-section nr-customizer-layout-1 bg-image nr-full-overlay" <?php if( $block_3_background_image ){ ?>style="background-image:url('<?php echo esc_url( $block_3_background_image ); ?>')" <?php } ?>>
			    <div class="wrapper">

			    	<?php if( $post_ids_1 && $block_3_query_1->have_posts() ):

                    	while( $block_3_query_1->have_posts() ):
                    		$block_3_query_1->the_post();
                    		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
							if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

		                    <div class="nr-single-post nr-post nr-post-style-4 nr-d-flex">
					            
								<div class="nr-image-section nr-image-hover-effect  nr-overlay-hover-effect">
									<a href="<?php the_permalink(); ?>"></a>
									<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
									<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
									<div class="nr-bookmark">
										<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
									</div>

									<?php newsreaders_post_read_time(); ?>

					            </div>

					            <div class="nr-desc">
					                
					                <h3 class="nr-post-title">
					                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					            	</h3>

					                <?php
					                if( has_excerpt() ){
										the_excerpt();
									}else{
										echo '<p>'.esc_html( wp_trim_words( get_the_content(),25,'...' ) ).'</p>';
									} ?>

					                <div class="nr-btn-section">
					                    <a href="<?php the_permalink(); ?>" class="nr-btn nr-btn-primary-bg"><?php esc_html_e('Read more','newsreaders'); ?></a>
					                </div>

					            </div>

					        </div>

		               	<?php endwhile;

		            endif; ?>

		            <?php if( $post_ids_2 && $block_3_query_2->have_posts() ): ?>

		            	<div class="nr-post-list">
				            <div class="wrapper-inner">
				            	<?php
		                    	while( $block_3_query_2->have_posts() ):
		                    		$block_3_query_2->the_post();
		                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    	if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

				                    <div class="column column-12 column-xs-6 column-lg-3">
				                        <div class="nr-post">

											<div class="nr-image-section nr-image-200 nr-image-hover-effect nr-overlay-hover-effect" >
												<a href="<?php the_permalink(); ?>"></a>
												<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
												<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
												<div class="nr-bookmark">
													<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
												</div>
												
												<?php newsreaders_post_read_time(); ?>
												
				                            </div>

				                            <div class="nr-desc">
												
												<?php if( $ed_block_3_cat ){ ?>
													<div class="nr-category nr-category-with-bg">
														<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
													</div>
												<?php } ?>

				                                <h3 class="nr-post-title nr-post-title-sm">
				                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				                            	</h3>
												
				                                <?php if( $ed_block_3_date ){ ?>
													<div class="nr-meta-tag nr-meta-sm">
														<?php newsreaders_posted_on(); ?>
														
														<?php newsreaders_post_social_share(); ?>
														
													</div>
												<?php } ?>

				                            </div>

				                        </div>
				                    </div>

				               	<?php endwhile; ?>
			               </div>
			           </div>
			           
		            <?php endif; ?>

			    </div>
			</div>

		<?php
		}

	}

endif;