<?php

if( !function_exists('newsreaders_block_2_section') ):

	function newsreaders_block_2_section(){

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_2 = get_theme_mod( 'ed_block_2',$newsreaders_default['ed_block_2'] );
		if( $ed_block_2 ){

			$fallback_images = get_theme_mod('fallback_images');
			$block_2_left_side_content_area_title = get_theme_mod( 'block_2_left_side_content_area_title',$newsreaders_default['block_2_left_side_content_area_title'] );
			$block_2_left_side_ctegory = get_theme_mod( 'block_2_left_side_ctegory' );
			$block_2_right_side_ctegory = get_theme_mod( 'block_2_right_side_ctegory' );

			$block_2_left_side_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 7,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_2_left_side_ctegory ) ) );
			$block_2_right_side_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 7,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_2_right_side_ctegory ) ) );

			$ed_block_2_cat = get_theme_mod( 'ed_block_2_cat',$newsreaders_default['ed_block_2_cat'] );
			$ed_block_2_date = get_theme_mod( 'ed_block_2_date',$newsreaders_default['ed_block_2_date'] );
			$ed_block_2_author = get_theme_mod( 'ed_block_2_author',$newsreaders_default['ed_block_2_author'] );

			$post_ids_1 = array();
			$post_ids_2 = array();
			$post_ids_3 = array();

			if( $block_2_right_side_query->have_posts() ):

				$count = 1;
		    	while( $block_2_right_side_query->have_posts() ):
		    		$block_2_right_side_query->the_post();

		    		if( $count == 1 ){ $post_ids_1[] = get_the_ID(); }
		    		if( $count == 2 || $count == 3 || $count == 4 || $count == 5 ){ $post_ids_2[] = get_the_ID(); }
		    		if( $count == 6 ){ $post_ids_3[] = get_the_ID(); }

		    		$count++;
		    		if( $count == 7 ){ break; }

		    	endwhile;

		    endif;

		    if( $post_ids_1 ){
			    $block_2_query_1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'post__in' => $post_ids_1, 'post__not_in' => get_option("sticky_posts") ) );
			}
			if( $post_ids_2 ){
			    $block_2_query_2 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4, 'post__in' => $post_ids_2, 'post__not_in' => get_option("sticky_posts") ) );
			}

			if( $post_ids_3 ){
			    $block_2_query_3 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'post__in' => $post_ids_3, 'post__not_in' => get_option("sticky_posts") ) );
			}


			?>
		
			<div class="nr-recent-post-section nr-section-border">
			    <div class="wrapper">
			        <div class="wrapper-inner">

			            <div class="column column-3">
			                <div class="nr-recent-post-list nr-post-with-border">
			                    
			                    <?php if( $block_2_left_side_content_area_title ){ ?>
				                    <h2 class="nr-section-title"> <?php echo esc_html( $block_2_left_side_content_area_title ); ?></h2>
				                <?php } ?>

				                <?php if( $block_2_left_side_query->have_posts() ): ?>

				                    <div class="nr-post-list">

				                    	<?php
				                    	while( $block_2_left_side_query->have_posts() ):
				                    		$block_2_left_side_query->the_post();
				                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			                    			if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

				                    		<div class="nr-post nr-post-style-2 nr-post-sm  nr-d-flex">

												<div class="nr-image-section nr-image-70 nr-image-hover-effect">
													<a href="<?php the_permalink(); ?>"></a>
													<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
					                            </div>

					                            <div class="nr-desc">
					                                <h3 class="nr-post-title nr-post-title-xs">
					                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h3>
													
													<?php if( $ed_block_2_author ){ ?>
														<div class="nr-meta-tag nr-meta-sm">
															<?php newsreaders_posted_by(); ?>
														</div>
													<?php } ?>

					                            </div>

					                        </div><!--nr-post-->

				                    	<?php endwhile; ?>

				                    </div>

			                    <?php endif; ?>

			                </div>

			            </div>

			            <?php if( $block_2_right_side_query->have_posts() ): ?>

				            <div class="column column-9">

				                <div class="nr-recent-block-post nr-d-flex">

				                	<?php if( $post_ids_1 && $block_2_query_1->have_posts() ):

				                    	while( $block_2_query_1->have_posts() ):
				                    		$block_2_query_1->the_post();
				                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    			if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

						                    <div class="nr-col-half">
						                        <div class="nr-post">
													<div class="nr-image-section bg-image nr-image-300 nr-image-with-content nr-overlay nr-image-hover-effect" >
														<a href="<?php the_permalink(); ?>"></a>
														<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
														
														<?php echo esc_attr(newsreaders_post_format( get_the_ID() ) ); ?>

														<div class="nr-bookmark">
															<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
														</div>
														
														<?php if( $ed_block_2_cat ){ ?>
															<div class="nr-category nr-category-with-bg">
																<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
															</div>
														<?php } ?>

														<?php newsreaders_post_read_time(); ?>


						                            </div>

						                            <div class="nr-desc">
						                                <h3 class="nr-post-title nr-post-title-sm">
						                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>

														<?php if( $ed_block_2_author || $ed_block_2_date ){ ?>

															<div class="nr-meta-tag  nr-meta-sm">
																
																<?php
																if( $ed_block_2_author ){
																	newsreaders_posted_by();
																}

																if( $ed_block_2_date ){
																	newsreaders_posted_on();
																} ?>
																
																<?php newsreaders_post_social_share(); ?>

															</div>
															
														
														<?php } ?>

						                            </div>

						                        </div><!--/post-->
						                    </div><!--/col-half-->

						               	<?php endwhile;

						            endif; ?>

						            <?php if( $post_ids_2 && $block_2_query_2->have_posts() ): ?>

						            	<div class="nr-col-half">
					                        <div class="nr-post-list nr-d-flex">

						                        <?php
						                        $count = 1;
						                    	while( $block_2_query_2->have_posts() ):
						                    		$block_2_query_2->the_post();
						                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
			                    					if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

								                    <div class="nr-post">
								                    	<?php if( $count == 1 || $count == 2 ){ ?>
															<div class="nr-image-section nr-image-130  nr-image-hover-effect nr-overlay-hover-effect">
																<a href="<?php the_permalink(); ?>"></a>
																<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
																<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
																<div class="nr-bookmark">
																	<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
																</div>

																<?php newsreaders_post_read_time(); ?>
																
						                                    </div>
						                                <?php } ?>

					                                    <div class="nr-desc">
															
															<?php if( $ed_block_2_cat ){ ?>
																<div class="nr-category nr-category-with-bg">
																	<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
																</div>
															<?php } ?>

					                                        <h3 class="nr-post-title nr-post-title-sm">
							                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
															</h3>
						                    
															<?php if( $ed_block_2_date ){ ?>
																<div class="nr-meta-tag nr-meta-sm">
																	<?php newsreaders_posted_on(); ?>
																</div>
															<?php } ?>

					                                    </div>
					                                </div><!--post-->

								               	<?php
								               	$count++;
								               	endwhile; ?>

							               	</div><!--/nr-post-list-->
							           	</div><!--col-half-->

						            <?php endif; ?>

				                </div>

				                <?php if( $post_ids_3 && $block_2_query_3->have_posts() ): ?>

			                        <?php
			                        $count = 1;
			                    	while( $block_2_query_3->have_posts() ):
			                    		$block_2_query_3->the_post();
			                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			                    		if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

					                    <div class="nr-full-post nr-post nr-post-style-3">
											<div class="nr-image-section nr-image-320 nr-overlay nr-image-hover-effect">
												<a href="<?php the_permalink(); ?>"></a>
												<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')">

												</div>
												<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
												<div class="nr-bookmark">
													<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
												</div>

												<?php newsreaders_post_read_time(); ?>

						                        <div class="nr-desc">
													<?php if( $ed_block_2_cat ){ ?>
														<div class="nr-category nr-category-with-bg">
															<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
														</div>
													<?php } ?>
						                            
						                            <h3 class="nr-post-title">
							                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h3>

													<?php if( $ed_block_2_author || $ed_block_2_date ){ ?>

														<div class="nr-meta-tag nr-meta-sm">
															
															<?php
															if( $ed_block_2_author ){
																newsreaders_posted_by();
															}

															if( $ed_block_2_date ){
																newsreaders_posted_on();
															} ?>
															
															<?php newsreaders_post_social_share(); ?>
															
														</div>
													
													<?php } ?>

						                        </div>

						                    </div>
						                </div><!--nr-post-->

					               	<?php
					               	$count++;
					               	endwhile; ?>

						        <?php endif; ?>

				            </div>

			            <?php endif; ?>

			        </div>
			    </div>
			</div>

		<?php
		}

	}

endif;