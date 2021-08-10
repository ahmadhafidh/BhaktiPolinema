<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Newsreaders
 */

get_header();
?>
<div class="singular-main-block nr-404-section">
    <div class="wrapper">
        <div class="nr-section-wrapper">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'newsreaders' ); ?></h1>
			</header><!-- .page-header -->
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'newsreaders' ); ?></p>
				<?php
					get_search_form();
				?>
			</div><!-- .page-content -->
		</div>
	</div><!-- .error-404 -->
</div>

<?php
get_footer();
