<?php
/**
 * Newsreaders Dynamic Styles
 *
 * @package Newsreaders
 */
function newsreaders_dynamic_css()
{

    $newsreaders_default = newsreaders_get_default_theme_options();
    $newsreaders_primary_color = newsreaders_sanitize_hex_color( get_theme_mod( 'newsreaders_primary_color', $newsreaders_default['newsreaders_primary_color'] ) );
    $newsreaders_primary_bg_text_color = newsreaders_sanitize_hex_color( get_theme_mod( 'newsreaders_primary_bg_color', $newsreaders_default['newsreaders_primary_bg_color'] ) );
    $newsreaders_hover_color = newsreaders_sanitize_hex_color( get_theme_mod( 'newsreaders_secondary_color', $newsreaders_default['newsreaders_secondary_color'] ) );
    $newsreaders_hover_bg_text_color = newsreaders_sanitize_hex_color( get_theme_mod( 'newsreaders_secondary_bg_color', $newsreaders_default['newsreaders_secondary_bg_color'] ) );
    $newsreaders_text_color = newsreaders_sanitize_hex_color( get_theme_mod( 'newsreaders_text_color', $newsreaders_default['newsreaders_text_color'] ) );

    $newsreaders_body_font =  get_theme_mod( 'newsreaders_body_font', $newsreaders_default['newsreaders_body_font'] );
    $newsreaders_heading_font =  get_theme_mod( 'newsreaders_heading_font', $newsreaders_default['newsreaders_heading_font'] );
    $newsreaders_heading_weight =  get_theme_mod( 'newsreaders_heading_weight', $newsreaders_default['newsreaders_heading_weight'] );
    $newsreaders_heading_case =  get_theme_mod( 'newsreaders_heading_case', $newsreaders_default['newsreaders_heading_case'] );

    $footer_background_color = newsreaders_sanitize_hex_color( get_theme_mod( 'footer_background_color', $newsreaders_default['footer_background_color'] ) );
    $footer_text_color = newsreaders_sanitize_hex_color( get_theme_mod( 'footer_text_color', $newsreaders_default['footer_text_color'] ) );
    $footer_background_copyright_color = newsreaders_sanitize_hex_color( get_theme_mod( 'footer_background_copyright_color', $newsreaders_default['footer_background_copyright_color'] ) );
    $footer_copyright_text_color = newsreaders_sanitize_hex_color( get_theme_mod( 'footer_copyright_text_color', $newsreaders_default['footer_copyright_text_color'] ) );
?>
    
    <style type='text/css'>
    <?php if( !empty($newsreaders_text_color) ){ ?>
        body,
        body a,
        body a:visited,
        body .widget a,
        body .widget a:visited,
        body .nr-meta-tag .entry-meta-item a,
        body .nr-meta-tag .entry-meta-item a:visited{
            color: <?php echo esc_attr( $newsreaders_text_color) ; ?>; 
        }
    <?php } ?>
    /*********PRIMARY COLOR*******/
    <?php if( !empty($newsreaders_primary_color) ){ ?>
        body .nr-navigation-section .main-navigation ul li.brand-home,
        body .widget-title:after,
        body .nr-title-style-1:after,
        body .twp-loading-button,
        body a.nr-btn-primary-bg,
        body .nr-btn-primary-bg,
        body .nr-btn-border-primary:hover,
        body .nr-category-with-bg span a:hover,
        body .nr-image-section:hover .nr-post-format,
        body .nr-slick-arrow .slick-arrow,
        body .nr-navigation-section:after,
        body .nr-navigation-section .main-navigation .menu > li:hover,
        body .nr-post-layout-1 .nr-title-section,
        body .nr-breaking-news-section .nr-title-section,
        body #scroll-top span:hover,
        body .comments-area .logged-in-as a,
        body button:hover,
        body .button:hover,
        body .wp-block-button__link:hover,
        body .wp-block-file__button:hover,
        body input[type=button]:hover,
        body input[type=reset]:hover,
        body input[type=submit]:hover,
        body button:focus,
        body .button:focus,
        body .wp-block-button__link:focus,
        body .wp-block-file__button:focus,
        body input[type=button]:focus,
        body input[type=reset]:focus,
        body input[type=submit]:focus,
        body .pagination .nav-links .page-numbers.current,
        body .site-header-layout button .nr-tooltip{
            background-color: <?php echo esc_attr( $newsreaders_primary_color) ; ?>;
        }
        body .twp-loading-button,
        body a.nr-btn-primary-bg,
        body .nr-btn-primary-bg,
        body .nr-btn-border-primary,
        body .nr-image-section:hover .nr-post-format,
        body .nr-slick-arrow .slick-arrow,
        body .nr-slick-arrow .slick-arrow:hover,
        body .nr-post-layout-1 .nr-post-list,
        body .singular-main-block .entry-meta-tags .tags-links a,
        body .comments-area .logged-in-as a{
            border-color: <?php echo esc_attr( $newsreaders_primary_color) ; ?>;
        }
        body .site-header-layout button .nr-tooltip:after{
            border-top-color: <?php echo esc_attr( $newsreaders_primary_color) ; ?>;
        }
        body .nr-slick-arrow .slick-arrow:hover{
            background-color: transparent;
        }
        body .nr-btn-border-primary,
        body .nr-btn-border-primary:visited,
        body .nr-category.nr-category-with-primary-text a:hover,
        body .nr-image-section .nr-bookmark a,
        body .nr-image-section .nr-bookmark a:visited,
        body .nr-bookmark a.twp-pin-post.twp-pp-active,
        body .nr-slick-arrow .slick-arrow:hover,
        body .nr-footer-widgetarea .widget_rss ul li a:hover,
        body .singular-main-block blockquote.wp-block-quote:before,
        body .singular-main-block blockquote.wp-block-quote:after,
        body .singular-main-block .wp-block-categories a,
        body .header-layout-2.site-header-with-image .sub-menu a:hover,
        body .nr-navigation-section .main-navigation .menu .sub-menu a:hover,
        body .nr-site-footer a:hover,
        body .nr-site-footer .widget a:hover,
        body .nr-site-footer .nr-post-style-3 .nr-desc a:hover,
        body .nr-site-footer .nr-meta-tag .entry-meta-item a:hover,
        body .nr-site-footer .site-info a:hover,
        body .nr-site-footer .site-info .nr-copyright-text a,
        body .nr-site-footer .site-info .nr-copyright-text a:visited,
        body .header-layout-1 .nr-navigation-section .sub-menu a:hover,
        body .header-layout-1 .nr-navigation-section .children a:hover,
        body .header-layout-3 .nr-navigation-section .sub-menu a:hover,
        body .header-layout-3 .nr-navigation-section .children a:hover,
        body .singular-main-block .entry-meta-tags .tags-links a,
        body .singular-main-block .entry-meta-tags .tags-links a:visited,
        body .singular-main-block .entry-meta-tags .entry-meta-icon,
        body .comments-area .logged-in-as a:last-child,
        body .comments-area .logged-in-as a:last-child:visited,
        body .twp-archive-items .post-thumbnail a,
        body .twp-archive-items .post-thumbnail a:visited{
            color: <?php echo esc_attr( $newsreaders_primary_color) ; ?>;
        }
        body .nr-site-footer .site-info .nr-copyright-text a:hover{
            color: #fff;
        }
        
    <?php } ?>
    /*************PRIMARY BG TEXT COLOR************/
    <?php if(!empty( $newsreaders_primary_bg_text_color )){ 
        ?>
        body .nr-breaking-news-section .nr-title-section:after,
        body .nr-breaking-news-section .nr-title-section:before{
            background-color: <?php echo esc_attr( $newsreaders_primary_bg_text_color) ; ?>;
        }
        body .twp-loading-button,
        body .twp-loading-button:visited,
        body a.nr-btn-primary-bg,
        body .nr-btn-primary-bg,
        body a.nr-btn-primary-bg:visited,
        body a.nr-btn-primary-bg:active,
        body .nr-btn-primary-bg:visited,
        body .nr-btn-primary-bg:active,
        body .nr-btn-border-primary:hover,
        body .nr-category-with-bg span a:hover,
        body .nr-image-section:hover .nr-post-format,
        body .nr-slick-arrow .slick-arrow,
        body .nr-post-format,
        body .nr-navigation-section .main-navigation .menu > li:hover > .link-icon-wrapper > a,
        body .nr-navigation-section .main-navigation .menu > li:hover > .link-icon-wrapper svg,
        body .nr-post-layout-1 .nr-title-section,
        body .nr-breaking-news-section .nr-title-section,
        body .nr-customizer-layout-1 .nr-btn:visited,
        body #scroll-top span:hover,
        body .comments-area .logged-in-as a,
        body .comments-area .logged-in-as a:visited,
        body button:hover,
        body .button:hover,
        body .wp-block-button__link:hover,
        body .wp-block-file__button:hover,
        body input[type=button]:hover,
        body input[type=reset]:hover,
        body input[type=submit]:hover,
        body button:focus,
        body .button:focus,
        body .wp-block-button__link:focus,
        body .wp-block-file__button:focus,
        body input[type=button]:focus,
        body input[type=reset]:focus,
        body input[type=submit]:focus,
        body .pagination .nav-links .page-numbers.current,
        body .site-header-layout button .nr-tooltip{
            color: <?php echo esc_attr( $newsreaders_primary_bg_text_color) ; ?>;
        }
        body .nr-post-format {
            border-color: <?php echo esc_attr( $newsreaders_primary_bg_text_color) ; ?>;
        }

    <?php } ?>
    
    /*************HOVER COLOR**************/
    <?php if(!empty($newsreaders_hover_color)){ ?>
        body button,
        body .button,
        body .wp-block-button__link,
        body .wp-block-file__button,
        body input[type=button],
        body input[type=reset],
        body input[type=submit],
        body button,
        body .button,
        body .wp-block-button__link,
        body .wp-block-file__button,
        body input[type=button],
        body input[type=reset],
        body input[type=submit],
        body .nr-navigation-section .main-navigation ul li.brand-home:hover,
        body .twp-loading-button:hover,
        body a.nr-btn-primary-bg:hover,
        body .nr-btn-primary-bg:hover,
        body .nr-category-with-bg span a,
        body #scroll-top span,
        body .comments-area .logged-in-as a:hover,
        body .comments-area .logged-in-as a:last-child:hover,
        body .post-navigation .nav-links .nav-previous a:hover,
        body .post-navigation .nav-links .nav-next a:hover,
        body .posts-navigation .nav-links .nav-previous a:hover,
        body .posts-navigation .nav-links .nav-next a:hover,
        body .pagination .nav-links .page-numbers:hover{
            background-color: <?php echo esc_attr( $newsreaders_hover_color) ; ?>;
        }
        
        body .post-thumbnail-effects::after{
            border-left-color: <?php echo esc_attr( $newsreaders_hover_color) ; ?>;
        }
        body .search-form .search-submit,
        body .nr-post-layout-2 .nr-post-list,
        body .twp-loading-button:hover,
        body a.nr-btn-primary-bg:hover,
        body .nr-btn-primary-bg:hover,
        body .singular-main-block .entry-meta-tags .tags-links a:hover,
        body .comments-area .logged-in-as a:hover,
        body .comments-area .logged-in-as a:last-child:hover{
            border-color: <?php echo esc_attr( $newsreaders_hover_color) ; ?>;
        }
        body a:hover,
        body .widget a:hover,
        body .nr-meta-tag .entry-meta-item a:hover,
        body .nr-category.nr-category-with-primary-text a,
        body .nr-category.nr-category-with-primary-text a:visited,
        body .nr-image-section .nr-bookmark a:hover,
        body .nr-post-style-3 .nr-desc a:hover,
        body .nr-post-style-3 .nr-meta-tag .entry-meta-item a:hover,
        body .singular-main-block .wp-block-categories a:hover,
        body .nr-customizer-layout-1 a:hover,
        body .nr-customizer-layout-1 .nr-meta-tag .entry-meta-item a:hover,
        body .single-featured-banner.banner-has-image a:hover,
        body .singular-main-block .entry-meta-tags .tags-links a:hover,
        body .twp-archive-items .post-thumbnail a:hover,
        body .nr-breaking-post .nr-desc a:hover,
        body div.nr-footer-widgetarea a:hover{
            color: <?php echo esc_attr( $newsreaders_hover_color) ; ?>;
        }


    <?php } ?>

    /***********HOVER BG TEXT COLOR************/
    <?php if(!empty($newsreaders_hover_bg_text_color)){ ?>
        body .nr-navigation-section .main-navigation ul li.brand-home:hover a,
        body .twp-loading-button:hover,
        body a.nr-btn-primary-bg:hover,
        body .nr-btn-primary-bg:hover,
        body .nr-category-with-bg span a,
        body .nr-category-with-bg span a:visited,
        body .nr-customizer-layout-1 .nr-btn:hover,
        body #scroll-top span,
        body .comments-area .logged-in-as a:hover,
        body .comments-area .logged-in-as a:last-child:hover,
        body button,
        body .button,
        body .wp-block-button__link,
        body .wp-block-file__button,
        body input[type=button],
        body input[type=reset],
        body input[type=submit],
        body button,
        body .button,
        body .wp-block-button__link,
        body .wp-block-file__button,
        body input[type=button],
        body input[type=reset],
        body input[type=submit],
        body .post-navigation .nav-links .nav-previous a:hover,
        body .post-navigation .nav-links .nav-next a:hover,
        body .posts-navigation .nav-links .nav-previous a:hover,
        body .posts-navigation .nav-links .nav-next a:hover,
        body .pagination .nav-links .page-numbers:hover{
            color: <?php echo esc_attr( $newsreaders_hover_bg_text_color) ; ?>;
        }
    <?php } ?>

    /***********HOVER BG TEXT COLOR************/
    <?php if(!empty($newsreaders_text_color)){ ?>
        body .site-info{
            color: <?php echo esc_attr( $newsreaders_text_color) ; ?>;
        }
    <?php } ?>

    /*************FONT*************/
    <?php if( !empty( $newsreaders_body_font ) ){ ?>
        body{
            font-family: <?php echo esc_attr( $newsreaders_body_font ); ?>
        }
    <?php } ?>
    <?php if( !empty( $newsreaders_heading_font ) ){ ?>
        body h1,
        body h2,
        body h3,
        body h4,
        body h5,
        body h6{
            font-family: <?php echo esc_attr( $newsreaders_heading_font ); ?>
        }
    <?php } ?>
    <?php if( !empty( $newsreaders_heading_weight ) ){ ?>
        body h1,
        body h2,
        body h3,
        body h4,
        body h5,
        body h6{
            font-weight: <?php echo esc_attr( $newsreaders_heading_weight ); ?>
        }
    <?php } ?>
    <?php if( !empty( $newsreaders_heading_case ) ){ ?>
        body h1,
        body h2,
        body h3,
        body h4,
        body h5,
        body h6,
        .site-title{
            text-transform: <?php echo esc_attr( $newsreaders_heading_case ); ?>
        }
    <?php } ?>

    /************FOOTER WIDGET****************/
    <?php if(!empty($footer_background_color)){ ?>
        .nr-footer-widgetarea{
            background-color: <?php echo esc_attr($footer_background_color); ?>
        }
    <?php } ?>
    <?php if(!empty($footer_text_color)){ ?>
        body .nr-footer-widgetarea,
        .nr-footer-widgetarea .widget a,
        .nr-footer-widgetarea .widget a:visited,
        .nr-footer-widgetarea .nr-post-style-3 .nr-desc a,
        .nr-footer-widgetarea .nr-post-style-3 .nr-desc a:visited,
        .nr-footer-widgetarea .nr-meta-tag .entry-meta-item a,
        .nr-footer-widgetarea .nr-meta-tag .entry-meta-item a:visited,
        .nr-footer-widgetarea a,
        .nr-footer-widgetarea a:visited{
            color: <?php echo esc_attr($footer_text_color); ?>
        }
    <?php } ?>
    /*****************COPYRIGHT**********/
    <?php if(!empty($footer_background_copyright_color)){ ?>
        .nr-site-footer .site-info{
            background-color: <?php echo esc_attr($footer_background_copyright_color); ?>
        }
    <?php } ?>
    <?php if(!empty($footer_copyright_text_color)){ ?>
        .nr-site-footer .site-info,
        .nr-site-footer .site-info a,
        .nr-site-footer .site-info a:visited{
            color: <?php echo esc_attr($footer_copyright_text_color); ?>
        }
    <?php } ?>
    </style>
<?php     
}

add_action('wp_head', 'newsreaders_dynamic_css', 100);

/**
 * Sanitizing Hex color function.
 */
function newsreaders_sanitize_hex_color($color)
{

    if ('' === $color)
        return '';
    if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color))
        return $color;

}