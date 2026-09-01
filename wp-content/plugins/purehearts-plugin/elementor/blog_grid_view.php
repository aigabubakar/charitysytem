<?php namespace PUREHEARTSPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Blog_Grid_View extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'purehearts_blog_grid_view';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Blog Grid View', 'purehearts' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-briefcase';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'purehearts' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'blog_grid_view',
            [
                'label' => esc_html__( 'Blog Grid View', 'purehearts' ),
            ]
        );
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'purehearts' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'purehearts' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'purehearts' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'purehearts' ),
					'title'      => esc_html__( 'Title', 'purehearts' ),
					'menu_order' => esc_html__( 'Menu Order', 'purehearts' ),
					'rand'       => esc_html__( 'Random', 'purehearts' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'purehearts' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'purehearts' ),
					'ASC'  => esc_html__( 'ASC', 'purehearts' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'purehearts'),
			  'label_block' => true,
			  'options' => get_blog_categories()
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'purehearts' ),
				'default'     => __( 'Read More', 'purehearts' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'purehearts' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = get_query_var('paged');
		$paged = purehearts_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-purehearts' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => purehearts_set( $settings, 'query_number' ),
			'orderby'        => purehearts_set( $settings, 'query_orderby' ),
			'order'          => purehearts_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( purehearts_set( $settings, 'query_category' ) ) $args['category_name'] = purehearts_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- blog-grid -->
        <section class="blog-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('purehearts_370x500'); ?></a></figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date"><?php echo esc_attr(get_the_date()); ?></span>
                                        <?php if(has_category()){ ?><div class="category"><?php the_category(' ,'); ?></div><?php } ?>
                                        <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Read More', 'purehearts'); ?></a></div>
                                        <div class="comment-box pull-right"><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="fa fa-comments"></i><?php comments_number( wp_kses(__('0 Comments' , 'purehearts'), true), wp_kses(__('1 Comment' , 'purehearts'), true), wp_kses(__('% Comments' , 'purehearts'), true)); ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                <div class="more-btn centred"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($settings['btn_title'], true);?></a></div>
            	<?php } ?>
            </div>
        </section>
        <!-- blog-grid end -->
        
        <?php }

        wp_reset_postdata();
    }
}
