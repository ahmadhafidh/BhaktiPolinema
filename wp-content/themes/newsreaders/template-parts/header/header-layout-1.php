<?php
/**
 * Header Layout 1
 *
 * @package Newsreaders
 */

$newsreaders_default = newsreaders_get_default_theme_options();

newsreaders_header_breaking_news_posts(); ?>

<header id="site-header" class="site-header-layout header-layout-1">
    <?php 
        if(!empty(get_header_image())){
            $header_class = "bg-image site-header-with-image nr-overlay";
        } else {
            $header_class = " ";
        }
    ?>
    <div class="header-navbar  <?php echo $header_class; ?>" style="background-image:url('<?php echo esc_url(get_header_image()); ?>')">
        <div class="wrapper">
            <div class="navbar-item navbar-item-left">
                
                <div class="site-branding">
                    <?php
                    the_custom_logo();

                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </h1>
                    <?php
                    else :
                        ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </p>
                    <?php
                    endif;
                    $ed_description = get_bloginfo('description', 'display');
                    if ($ed_description || is_customize_preview()) :
                        ?>
                        <p class="site-description">
                           <span><?php echo esc_html( $ed_description ); /* WPCS: xss ok. */ ?></span>
                        </p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <?php
                $ed_header_date = get_theme_mod( 'ed_header_date', $newsreaders_default['ed_header_date'] );
                if( $ed_header_date ){ ?>
                    <div class="nr-date-time nr-secondary-font"><?php echo esc_html( current_time("j F Y, l") ); ?></div>
                <?php } ?>
                
            </div><!-- .navbar-item-left -->

            <div class="navbar-item navbar-item-right">

                <div class="navbar-controls twp-hide-js">
                    <?php

                    $ed_header_search = get_theme_mod( 'ed_header_search', $newsreaders_default['ed_header_search'] );
                    if( $ed_header_search ){ ?>
                        <button type="button" class="navbar-control button-style button-transparent navbar-control-search">
                            <?php newsreaders_the_theme_svg('search'); ?>
                            <span class="nr-tooltip">Search</span>
                        </button>

                    <?php }

                    $ed_header_read_later_icon = get_theme_mod( 'ed_header_read_later_icon', $newsreaders_default['ed_header_read_later_icon'] );
                    $ed_header_read_later_page = get_theme_mod( 'ed_header_read_later_page' );
                    if( $ed_header_read_later_icon && $ed_header_read_later_page ){ 
                        
                        $ed_header_read_later_page_link = get_page_link( $ed_header_read_later_page ); ?>

                        <a href="<?php echo esc_url( $ed_header_read_later_page_link ); ?>">
                            <button type="button" class="navbar-control button-style button-transparent nr-navbar-readmore">
                                <i class="ion ion-md-bookmark"></i>
                                <span class="nr-tooltip">Read later</span>
                            </button>
                        </a>

                    <?php } ?>

                    <button type="button" class="navbar-control button-style button-transparent navbar-control-offcanvas">
                        <span class="bars">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </span>
                        <span class="menu-label">
                            <?php esc_html_e('Menu', 'newsreaders'); ?>
                        </span>
                        
                    </button>

                </div>

            </div><!-- .navbar-item-right -->

        </div><!-- .header-inner -->
    </div>

    <?php
    $ed_header_responsive_menu = get_theme_mod('ed_header_responsive_menu', $newsreaders_default['ed_header_responsive_menu']);
    ?>
    <div id="sticky-nav-menu" class="sticky-nav-menu" style="height:1px;"></div>
    <div id="navigation" class="nr-navigation-section header-navigation-wrapper">
        <div class="wrapper">
            <nav id="site-navigation" class="main-navigation nr-navigation">
                <?php
                if( !$ed_header_responsive_menu ){
                    wp_nav_menu(array(
                        'theme_location' => 'na-primary-menu',
                        'container' => 'div',
                        'container_class' => 'navigation-area',
                    ));
                } ?>
            </nav><!-- #site-navigation -->
        </div>
        <div class="nr-progress-bar" id="progressbar">
        </div>
    </div><!-- .header-navigation-wrapper -->
</header><!-- #site-header -->
