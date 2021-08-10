<?php

if( !function_exists('newsreaders_latest_posts_section') ):

    function newsreaders_latest_posts_section(){

        $newsreaders_default = newsreaders_get_default_theme_options();
        $ed_latest_post_section = esc_html( get_theme_mod( 'ed_latest_post_section', $newsreaders_default['ed_latest_post_section'] ) );
        if( $ed_latest_post_section ){

            $sidebar = esc_html( get_theme_mod( 'global_sidebar_layout', $newsreaders_default['global_sidebar_layout'] ) );
            $newsreaders_archive_layout = esc_attr( get_theme_mod( 'newsreaders_archive_layout', $newsreaders_default['newsreaders_archive_layout'] ) );?>

            <div class="<?php if( !is_page() ){ ?>archive-main-block<?php }else{ ?> singular-main-block <?php } ?>">
                <div class="wrapper">
                    <div class="wrapper-inner">

                        <div id="primary" class="content-area">
                            <main id="site-content" role="main">
                                
                                <?php

                                if( have_posts() ): ?>

                                    <div class="article-wraper <?php echo 'archive-layout-' . esc_attr( $newsreaders_archive_layout ); ?>">
                                        <?php
                                        while( have_posts() ):
                                            the_post();

                                            if( !is_page() ){
                                                get_template_part( 'template-parts/content', get_post_format() );
                                            }else{
                                                get_template_part('template-parts/content', 'single');
                                            }

                                        endwhile; ?>
                                    </div>

                                    <?php 
                                    if( !is_page() ):
                                        do_action('newsreaders_archive_pagination');
                                    endif;

                                else :

                                    get_template_part('template-parts/content', 'none');

                                endif; ?>
                            </main><!-- #main -->
                        </div>

                        <?php if( $sidebar != 'no-sidebar' ){

                            get_sidebar();
                            
                        } ?>

                    </div>
                </div>
            </div>

        <?php
        }
    }

endif;