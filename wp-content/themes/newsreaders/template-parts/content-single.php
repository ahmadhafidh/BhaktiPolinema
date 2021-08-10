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
$newsreaders_post_layout = esc_html( get_post_meta( get_the_ID(), 'newsreaders_post_layout', true ) );
$newsreaders_header_trending_page = get_theme_mod( 'newsreaders_header_trending_page' );
$newsreaders_header_popular_page = get_theme_mod( 'newsreaders_header_popular_page' );
$newsreaders_ed_feature_image = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_feature_image', true ) );
$ed_social_share = get_theme_mod('ed_social_share',$newsreaders_default['ed_social_share'] );
newsreaders_disable_post_read_time();

if( is_page() ){

	$newsreaders_post_layout = 'layout-1';
	
}
if( $newsreaders_post_layout == '' || $newsreaders_post_layout == 'global-layout' ){
    
    $newsreaders_post_layout = get_theme_mod( 'newsreaders_single_post_layout',$newsreaders_default['newsreaders_single_post_layout'] );

}

if( $newsreaders_header_trending_page != get_the_ID() && $newsreaders_header_popular_page != get_the_ID() ){
	
	$newsreaders_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_views', true ) );
	$newsreaders_ed_post_read_time = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_read_time', true ) );
	$newsreaders_ed_post_like_dislike = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_like_dislike', true ) );
	$newsreaders_ed_post_author_box = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_author_box', true ) );
	$newsreaders_ed_post_social_share = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_social_share', true ) );
	$newsreaders_ed_post_reaction = esc_html( get_post_meta( get_the_ID(), 'newsreaders_ed_post_reaction', true ) );

	$ed_read_time = get_theme_mod('ed_read_time',$newsreaders_default['ed_read_time'] );

	if( $newsreaders_ed_post_views ){ newsreaders_disable_post_views(); }
	if( $newsreaders_ed_post_read_time || !$ed_read_time ){ newsreaders_disable_post_read_time(); }
	if( $newsreaders_ed_post_like_dislike ){ newsreaders_disable_post_like_dislike(); }
	if( $newsreaders_ed_post_author_box ){ newsreaders_disable_post_author_box(); }
	if( $newsreaders_ed_post_reaction ){ newsreaders_disable_post_reaction(); }
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

		<?php if( has_post_thumbnail() ){
			
			if( is_single() ){

				if( empty( $newsreaders_ed_feature_image ) && $newsreaders_post_layout != 'layout-2' ){
					?><div class="post-thumbnail"><?php
					newsreaders_post_thumbnail();
					?>
				</div><?php
				}

			}else{ ?>	

				<div class="post-thumbnail">
					<?php newsreaders_post_thumbnail(); ?>
				</div>
			
			<?php
			}
		}

		if ( is_singular() && $newsreaders_post_layout != 'layout-2' ) { ?>

			<header class="entry-header entry-header-1">
				<h1 class="entry-title">
		            <?php the_title(); ?>
		        </h1>

			</header>

		<?php }

		if ( $newsreaders_post_layout != 'layout-2' && is_single() && 'post' === get_post_type() ) { ?>

			<div class="nr-category">
				<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
			</div>
			<div class="entry-meta">
				<?php
				newsreaders_posted_by();
				newsreaders_posted_on();
				newsreaders_post_read_time();
				?>

			</div>

		<?php  } ?>
		
		<div class="post-content-wrap">

			<?php if( $ed_social_share && is_singular() && empty( $newsreaders_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>

				<div class="post-content-share">
					<?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
				</div>

			<?php } ?>

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

				<?php
				if ( is_singular() && 'post' === get_post_type() ) { ?>

					<div class="entry-footer">
                        <div class="entry-meta">
                            <?php newsreaders_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
                        </div>
					</div>

				<?php } ?>

			</div>

		</div>

	</article>

<?php }else{

	newsreaders_trending_popular_posts( get_the_ID() );

} ?>