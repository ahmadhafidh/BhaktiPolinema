<?php
/**
 * Template Name: Read Later Page Template
 *
 * Pinned Posts Template File
 *
 * @package Newsreaders
 */
	get_header();
	
	$pin_posts = newsreaders_add_pin_posts_lists();
	$pin_posts_query = new WP_Query( array('post_type' => 'post','ignore_sticky_posts' => true, 'post__in' => $pin_posts ) );
	if( $pin_posts ){

		$newsreaders_default = newsreaders_get_default_theme_options(); ?>
		<div class="block-elements block-elements-archive">
			<div class="wrapper">
				<div class="wrapper-inner">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">
						
						<?php
							if ( $pin_posts_query->have_posts() ) : ?>

								<div class="archive-layout-full  all-item-content tn-content-active content-loded">
	                                <?php
	                                while( $pin_posts_query->have_posts() ):
	                                    $pin_posts_query->the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class("twp-archive-items"); ?>> 

											<?php if( has_post_thumbnail() ){ ?>
												<div class="post-thumbnail">
													<?php newsreaders_post_thumbnail(); ?>
													<div class="nr-bookmark">
														<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
													</div>

												</div>
											<?php } ?>

											<div class="post-content">
									            <div class="nr-meta-categories">
												    <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false ,$text = false,$icon = false); ?>

									            </div>
												<header class="entry-header">

													<h2 class="entry-title">

									                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

									                
									                </h2>

												</header>
												<div class="entry-meta">

													<?php
													newsreaders_posted_by();
													newsreaders_posted_on();
													?>
													
												</div>

												<div class="entry-content">

													<?php

													if( has_excerpt() ){
															
														the_excerpt();

													}else{

														echo esc_html( wp_trim_words( get_the_content(),25,'...' ) );

													} ?>

												</div>

												

											</div>

										</article>
										<?php

	                                endwhile; ?>
	                            </div>
								
								<?php 
								wp_reset_postdata();
							endif; ?>

						</main>
					</div>
					<?php 
						get_sidebar();
					?>
					
				</div>
			</div>
		</div>
		
	<?php
	}

get_footer();