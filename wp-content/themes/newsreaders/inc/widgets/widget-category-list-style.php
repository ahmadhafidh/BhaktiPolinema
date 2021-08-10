<?php
/**
 * Category List Post Widgets.
 *
 * @package Newsreaders
 */


if ( !function_exists('newsreaders_category_list_widgets') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newsreaders_category_list_widgets(){
        // category list post widget.
        register_widget('Newsreaders_Sidebar_Category_list_Style');

    }

endif;
add_action('widgets_init', 'newsreaders_category_list_widgets');

// category list post widget
if ( !class_exists('Newsreaders_Sidebar_Category_list_Style') ) :

    /**
     * Grod Post.
     *
     * @since 1.0.0
     */
    class Newsreaders_Sidebar_Category_list_Style extends Newsreaders_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => '',
                'description' => esc_html__('Displays post form selected category specific for Category List Post in sidebars.', 'newsreaders'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'post_category_1' => array(
                    'label' => esc_html__('Select Category 1:', 'newsreaders'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'newsreaders'),
                ), 
                'post_category_2' => array(
                    'label' => esc_html__('Select Category 2:', 'newsreaders'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'newsreaders'),
                ),
                'post_category_3' => array(
                    'label' => esc_html__('Select Category 3:', 'newsreaders'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'newsreaders'),
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'newsreaders'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 9,
                ),
            );

            parent::__construct( 'newsreaders-category-list-post-layout', esc_html__('TWP: Category List Post Style', 'newsreaders'), $opts, array(), $fields );
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance )
        {

            $params = $this->get_params( $instance );
            $fallback_images = get_theme_mod('fallback_images');
            echo $args['before_widget'];
            ?>
            <div class="nr-widget-section nr-widget-layout-2 nr-section-border">
                <div class="wrapper">
                    <div class="wrapper-inner">
                        <?php for ($i=1; $i <= 3 ; $i++) {  ?>

                            <?php
                            $post_category_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $params['post_number'],'post__not_in' => get_option("sticky_posts"), 'cat' => esc_html( $params['post_category_'.$i] ) ) );

                            $count = 1; 

                            if( $post_category_query->have_posts() ):
                                ?>
                                <div class="column column-4">

                                    <?php if (!empty($params['post_category_'.$i])) { ?>
                                        <h2 class="widget-title"><?php echo esc_html( get_the_category_by_ID( absint( $params['post_category_'.$i] ) ) );?></h2>
                                    <?php } ?>

                                    <?php while( $post_category_query->have_posts() ):
                                    $post_category_query->the_post(); ?>


                                            <?php
                                            if ( $count == 1 ) { ?>
                                                <div class="nr-post">
                                                    <?php
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                    if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; }
                                                    ?>
                                                    <div class="nr-image-section nr-image-with-content  nr-image-250  nr-overlay nr-image-hover-effect" >   
                                                        <a href="<?php the_permalink(); ?>"></a>
                                                        <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')">
                                                        </div>
                                                        
                                                        <?php newsreaders_post_read_time(); ?>
                                                        
                                                        <?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
                                                        <div class="nr-bookmark">
                                                            <?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
                                                        </div>
                                                        <div class="nr-category nr-category-with-bg">
                                                            <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
                                                        </div>
                                                    </div>

                                                    <div class="nr-desc">
                                                        <h3 class="nr-post-title nr-post-title-sm">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                        <div class="nr-meta-tag nr-meta-sm">
                                                            <?php
                                                                newsreaders_posted_by();
                                                                newsreaders_posted_on();
                                                            ?>
                                                            
                                                            <?php newsreaders_post_social_share(); ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php 
                                            }else{ ?>
                                                <div class="nr-post nr-post-style-2 nr-post-sm  nr-d-flex">

                                                    <?php
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                    if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; }
                                                    ?>

                                                    <div class="nr-image-section  nr-image-70 nr-image-hover-effect">
                                                        <a href="<?php the_permalink(); ?>"></a>
                                                        <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')">
                                                        </div>

                                                    </div>
                                                    
                                                    <div class="nr-desc">
                                                        <h3 class="nr-post-title nr-post-title-xs">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                        <div class="nr-meta-tag nr-meta-sm">
                                                            <?php
                                                                newsreaders_posted_by();
                                                                newsreaders_posted_on();
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            <?php } ?>


                                    <?php 
                                    $count++;
                                    endwhile; ?>

                                    <?php wp_reset_postdata(); ?>
                                
                                </div>

                            <?php 
                            endif; ?>

                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;