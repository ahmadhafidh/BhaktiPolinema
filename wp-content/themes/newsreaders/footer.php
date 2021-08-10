<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Newsreaders
 * @since 1.0.0
 */
?>


<?php
/**
 * Toogle Contents
 * @hooked newsreaders_header_toggle_search - 10
 * @hooked newsreaders_content_gallery - 20
 * @hooked newsreaders_content_offcanvas - 30
*/

do_action('newsreaders_before_footer_content_action'); ?>

</div>

<footer id="site-footer" class="nr-site-footer">
        <?php
        /**
         * Footer Content
         * @hooked newsreaders_footer_content_widget - 10
         * @hooked newsreaders_footer_content_info - 20
        */

        do_action('newsreaders_footer_content_action'); ?>
</footer>
<?php wp_footer(); ?>

</body>
</html>
