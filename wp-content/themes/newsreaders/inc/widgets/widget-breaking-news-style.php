<?php
/**
 * Opinion Widgets.
 *
 * @package Newsreaders
 */


if ( !function_exists('newsreaders_Opinion_widgets') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newsreaders_Opinion_widgets(){
        // List Post widget.
        register_widget('Newsreaders_Opinion_Style');

    }

endif;
add_action('widgets_init', 'newsreaders_Opinion_widgets');

// List Post widget
if ( !class_exists('Newsreaders_Opinion_Style') ) :

    /**
     * List Post.
     *
     * @since 1.0.0
     */
    class Newsreaders_Opinion_Style extends Newsreaders_Widget_Base
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
                'description' => esc_html__('Displays post form selected category specific for opinion post in sidebars.', 'newsreaders'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'newsreaders'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'newsreaders'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'newsreaders'),
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'newsreaders'),
                    'type' => 'number',
                    'default' => 10,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 20,
                ),
            );

            parent::__construct( 'newsreaders-opinion-post-layout', esc_html__('TWP: Opinion', 'newsreaders'), $opts, array(), $fields );
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

                $post_category_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $params['post_number'],'post__not_in' => get_option("sticky_posts"), 'cat' => esc_html( $params['post_category'] ) ) );

                if( $post_category_query->have_posts() ): ?>

                    <div class="nr-widget-section nr-widget-layout-3 nr-section-border"> 
                        <div class="wrapper">
                            
                            <div class="nr-title-section">
                                <?php if ( !empty( $params['title'] ) ) {
                                    echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
                                } ?>
                            </div>

                            <div class="nr-post-list">
                                <div class="wrapper-inner">
                                    <?php
                                    while( $post_category_query->have_posts() ):
                                        $post_category_query->the_post();

                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                        if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; } ?>
                                        <div class="column column-12 column-xs-6 column-md-4 column-lg-3">
                                            <div class="nr-post nr-post-style-3 nr-post-with-bg-title"> 
                                                <?php if ( has_post_thumbnail() ) {
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
                                                } ?>
                                                
                                                <div class="nr-image-section nr-image-350  nr-image-hover-effect">
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                    <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')"></div>
                                                    <?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
									                <div class="nr-bookmark">
										                <?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
									                </div>
                                                    <div class="nr-desc">
                                                        <h3 class="nr-post-title nr-post-title-xs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
                            </div><!--wrapper-inner-->
                        </div><!--/wrapper-->
                    </div><!--  nr-widget-section-->
                    <?php 
                    wp_reset_postdata();

                endif;

            echo $args['after_widget'];
        }
    }
endif;