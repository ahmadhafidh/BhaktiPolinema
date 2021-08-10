<?php

if( !function_exists('newsreaders_block_4_section') ):

	function newsreaders_block_4_section(){

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_4 = get_theme_mod( 'ed_block_4',$newsreaders_default['ed_block_4'] );
		

		if( $ed_block_4 ){ 

			$fallback_images = get_theme_mod('fallback_images');
			$block_4_left_slide_area_ctegory = get_theme_mod('block_4_left_slide_area_ctegory');
			$block_4_mid_slide_area_ctegory = get_theme_mod('block_4_mid_slide_area_ctegory');
			$block_4_right_content_area_title = get_theme_mod('block_4_right_content_area_title',$newsreaders_default['block_4_right_content_area_title']);
			$block_4_right_area_ctegory = get_theme_mod('block_4_right_area_ctegory');
			$ed_block_4_cat = get_theme_mod( 'ed_block_4_cat',$newsreaders_default['ed_block_4_cat'] );
			$ed_block_4_date = get_theme_mod( 'ed_block_4_date',$newsreaders_default['ed_block_4_date'] );
			$ed_block_4_author = get_theme_mod( 'ed_block_4_author',$newsreaders_default['ed_block_4_author'] );

			$block_4_left_slide_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 5,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_4_left_slide_area_ctegory ) ) );
			$block_4_mid_slide_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 5,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_4_mid_slide_area_ctegory ) ) );
			$block_4_right_area_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 7,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_4_right_area_ctegory ) ) ); ?>

			<div class="nr-customizer-section nr-customizer-layout-2 nr-section-border">
			    <div class="wrapper">
			        <div class="wrapper-inner">

			        	<?php 
			        	$count = 1;
			        	if( $block_4_left_slide_query->have_posts() ): ?>

			            	<div class="column column-3 nr-order-1">
								<div class="nr-post-layout-2">
									<div class="nr-post-list nr-post-with-border nr-post-list-with-bg-black">

										<?php
										while( $block_4_left_slide_query->have_posts() ):
											$block_4_left_slide_query->the_post();
											$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    			if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; }

											if( $count == 1 ){ ?>

												<div class="nr-post">

													<div class="nr-image-section nr-image-200 nr-image-hover-effect nr-overlay-hover-effect">
														<a href="<?php the_permalink(); ?>"></a>
														<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
														<div class="nr-bookmark">
															<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
														</div>
														<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
														
														<?php newsreaders_post_read_time(); ?>

													</div>

													<div class="nr-desc">

														<h3 class="nr-post-title nr-post-title-sm">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>

														<?php if( $ed_block_4_author || $ed_block_4_date ){ ?>

															<div class="nr-meta-tag nr-meta-sm">
																
																<?php
																if( $ed_block_4_author ){
																	newsreaders_posted_by();
																}

																if( $ed_block_4_date ){
																	newsreaders_posted_on();
																} ?>
															</div>
														
														<?php } ?>

													</div>

												</div>

											<?php
											}else{ ?>

												<div class="nr-post nr-post-style-2 nr-post-sm  nr-d-flex">
													<div class="nr-image-section nr-image-70 nr-image-hover-effect">
														<a href="<?php the_permalink(); ?>"></a>
														<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
													</div>
													<div class="nr-desc">
														
														<h3 class="nr-post-title nr-post-title-xs">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														
														<?php if( $ed_block_4_date ){ ?>
															<div class="nr-meta-tag nr-meta-sm">
																<?php newsreaders_posted_on(); ?>
															</div>
														<?php } ?>

													</div>
												</div>

											<?php
											}

										
										$count++;
										endwhile; ?>

									</div>
								</div>
				           </div>
				           
			            <?php endif;

			            if( $block_4_mid_slide_query->have_posts() ): ?>

			            	<div class="column column-12 column-lg-6 nr-order-2">
			                	<div class="nr-block-post-list">

					            	<?php
			                    	while( $block_4_mid_slide_query->have_posts() ):
			                    		$block_4_mid_slide_query->the_post();
			                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    		if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

			                    		<div class="nr-post nr-post-style-2 nr-post-md nr-d-flex">

											<div class="nr-image-section bg-image nr-image-130 nr-image-hover-effect nr-overlay-hover-effect">
												<a href="<?php the_permalink(); ?>"></a>
												<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
												<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
												<div class="nr-bookmark">
													<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
												</div>
												
												<?php newsreaders_post_read_time(); ?>

											</div>

				                            <div class="nr-desc">
												
												<?php if( $ed_block_4_cat ){ ?>
													<div class="nr-category nr-category-with-bg">
														<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
													</div>
												<?php } ?>
 
				                                <h3 class="nr-post-title nr-post-title-xs">
				                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				                                </h3>

				                                <?php if( $ed_block_4_author || $ed_block_4_date ){ ?>

													<div class="nr-meta-tag nr-meta-sm">
														
														<?php
														if( $ed_block_4_author ){
															newsreaders_posted_by();
														}

														if( $ed_block_4_date ){
															newsreaders_posted_on();
														} ?>
														<?php newsreaders_post_social_share(); ?>
														
													</div>
												
												<?php } ?>

				                            </div>

				                        </div>
					                    	
					               	<?php endwhile; ?>

				               </div>
				           </div>
				           
			            <?php endif;
					    $counts = 1;
			            if( $block_4_right_area_query->have_posts() ): ?>

			            	<div class="column column-3 nr-order-3">
								<div class="nr-post-with-icon-list nr-post-with-border">

									<?php
									if( $block_4_right_content_area_title ){ ?>
										<h2 class="nr-section-title"><?php echo esc_html( $block_4_right_content_area_title ); ?></h2>
									<?php } ?>

						            <div class="nr-post-list">
					            	<?php
			                    	while( $block_4_right_area_query->have_posts() ):
			                    		$block_4_right_area_query->the_post();
			                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    		if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

			                            <div class="nr-post nr-post-with-number nr-post-sm nr-d-flex">
											<div class="nr-num">
												<?php echo esc_html($counts); ?>
											</div>
											<div class="nr-desc">
												<h3 class="nr-post-title nr-post-title-xs">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												
												<?php if( $ed_block_4_date ){ ?>
													<div class="nr-meta-tag">
														<?php newsreaders_posted_on( $icon = false ); ?>
													</div>
												<?php } ?>

											</div>
			                            </div>
			                            <?php $counts++;?>
					               	<?php endwhile; ?>

					               </div>

				               </div>
				           </div>
				           
			            <?php endif; ?>

			        </div>
			    </div>
			</div>

		<?php
		}

	}

endif;