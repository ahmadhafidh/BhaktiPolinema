<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Newsreaders
 * @since 1.0.0
 */
$newsreaders_default = newsreaders_get_default_theme_options();
$newsreaders_archive_layout = esc_attr( get_theme_mod( 'newsreaders_archive_layout',$newsreaders_default['newsreaders_archive_layout'] ) );
$global_sidebar_layout = esc_attr( get_theme_mod( 'global_sidebar_layout',$newsreaders_default['global_sidebar_layout'] ) );

if(  $newsreaders_archive_layout == 'default' || $newsreaders_archive_layout == 'grid' || $newsreaders_archive_layout == 'masonry' ){
	$image_size = 'medium';
}else{

	if( $global_sidebar_layout == 'no-sidebar' ){
		$image_size = 'full';
	}else{
		$image_size = 'large';
	}
	
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('twp-archive-items'); ?>> 

	<?php 
	$fallback_images = get_theme_mod('fallback_images');
	if( has_post_thumbnail() || $fallback_images  ){ ?>
		<div class="post-thumbnail">
			<?php newsreaders_post_thumbnail( $image_size ); ?>
			<div class="nr-bookmark">
				<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
			</div>
			<?php newsreaders_post_read_time(); ?>
		</div>

	<?php } ?>
	
	<div class="post-content">

		<?php 
		if( $newsreaders_archive_layout == 'grid' || $newsreaders_archive_layout == 'masonry' ){ ?>

	        <div class="nr-category-- nr-category-with-bg--">
			    <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false ,$text = false,$icon = false); ?>
	        </div>

	    <?php } ?>

		<header class="entry-header">

			<h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>

		</header>

		<div class="entry-meta nr-meta-tag">
			<?php
			newsreaders_posted_by();
			newsreaders_posted_on();
			?>
			
			<?php newsreaders_post_social_share(); ?>
			
		</div>
		<?php
			if( $newsreaders_archive_layout != 'grid' && $newsreaders_archive_layout != 'masonry' ){ 
		?>
			<div class="nr-category nr-category-with-bg">
			    <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false ,$text = false,$icon = false); ?>
	        </div>

	    <?php } ?>

		<div class="entry-content">
			<?php
			if( has_excerpt() ){
						
					the_excerpt();

			}else{

				echo esc_html( wp_trim_words( get_the_content(),25,'...' ) );

			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsreaders' ),
				'after'  => '</div>',
			) ); ?>

		</div>

	</div>

</article>