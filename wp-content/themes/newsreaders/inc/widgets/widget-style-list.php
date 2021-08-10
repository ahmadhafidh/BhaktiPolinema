<?php
/**
 * List Post Widgets.
 *
 * @package Newsreaders
 */


if ( !function_exists('newsreaders_recent_post_widgets') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newsreaders_recent_post_widgets(){
        // List Post widget.
        register_widget('Newsreaders_Sidebar_List_Style');

    }

endif;
add_action('widgets_init', 'newsreaders_recent_post_widgets');

// List Post widget
if ( !class_exists('Newsreaders_Sidebar_List_Style') ) :

    /**
     * List Post.
     *
     * @since 1.0.0
     */
    class Newsreaders_Sidebar_List_Style extends Newsreaders_Widget_Base
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
                'description' => esc_html__('Displays post form selected category specific for list post in sidebars.', 'newsreaders'),
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
                'enable_counter' => array(
                    'label' => esc_html__('Enable Counter:', 'newsreaders'),
                    'type' => 'checkbox',
                    'default' => true,
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

            parent::__construct( 'newsreaders-list-post-layout', esc_html__('TWP: list Post Style', 'newsreaders'), $opts, array(), $fields );
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

                <div class="nr-widget-section nr-widget-layout-4 nr-section-border nr-single-column nr-list--">
                    <div class="wrapper">
                        
                        <?php
                        if ( !empty( $params['title'] ) ) {
                            echo $args['before_title'] . $params['title'] . $args['after_title'];
                        }
                        ?>
                       
                        <div class="nr-post-list"> 
                            <?php
                            while( $post_category_query->have_posts() ):
                                $post_category_query->the_post(); ?>

                                <div class="nr-post nr-post-style-4 nr-post-style-2-- nr-post-sm  nr-d-flex"> 

                                    <?php
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                                    if( empty( $thumb[0] ) ){ $thumb[0] = $fallback_images; }
                                    ?>

                                    <div class="nr-image-section nr-image-with-content  nr-overlay nr-image-hover-effect">

                                        <a href="<?php the_permalink(); ?>"></a>

                                        <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $thumb[0] ); ?>')"></div>

                                        <?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>

                                        <div class="nr-bookmark">
                                            <?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
                                        </div>
                                        
                                        <?php newsreaders_post_read_time(); ?>

                                        <div class="nr-category nr-category-with-bg">
                                            <?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
                                        </div>

                                    </div>

                                    <div class="nr-desc">

                                        <h3 class="nr-post-title nr-post-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        <div class="nr-meta-tag nr-meta-sm">
                                            <?php
                                            newsreaders_posted_by();
                                            newsreaders_posted_on();
                                            ?>
                                            
                                            <?php newsreaders_post_social_share(); ?>
                                            
                                        </div>

                                        <?php
    					                if( has_excerpt() ){
    										the_excerpt();
    									}else{
    										echo '<p>'.esc_html( wp_trim_words( get_the_content(),25,'...' ) ).'</p>';
    									} ?>

    					                <div class="nr-btn-section">
    					                    <a href="<?php the_permalink(); ?>" class="nr-btn nr-btn-primary-bg"><?php esc_html_e('Read more','newsreaders'); ?></a>
    					                </div>
                                    </div>

                                </div>

                            <?php
                            endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>

            <?php 
            endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;