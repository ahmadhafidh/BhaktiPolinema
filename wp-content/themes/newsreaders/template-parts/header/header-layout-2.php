<?php
/**
 * Header Layout 2
 *
 * @package Newsreaders
 */
$newsreaders_default = newsreaders_get_default_theme_options();
?>
<?php 
    if(!empty(get_header_image())){
        $header_class = "bg-image site-header-with-image nr-overlay";
    } else {
        $header_class = " ";
    }
?>
<?php $ed_header_responsive_menu = get_theme_mod('ed_header_responsive_menu', $newsreaders_default['ed_header_responsive_menu']); ?>

<header id="site-header" class="site-header-layout header-layout-2 <?php echo $header_class; ?>" style="background-image:url('<?php echo esc_url(get_header_image()); ?>')">
    <div class="header-navbar">
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


            <div class="navbar-item navbar-item-mid">
                <div class="header-navigation-wrapper">
                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        if (!$ed_header_responsive_menu) {
                            wp_nav_menu(array(
                                'theme_location' => 'na-primary-menu',
                                'container' => 'div',
                                'container_class' => 'navigation-area'
                            ));
                        } ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .header-navigation-wrapper -->

                
            </div><!-- .navbar-item-right -->
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
                        <span class="menu-label">
                            <?php esc_html_e('Menu', 'newsreaders'); ?>
                        </span>
                        <span class="bars">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </span>
                    </button>
                </div>
            </div><!-- .navbar-item-right -->
        </div>
    </div>
</header><!-- #site-header -->

