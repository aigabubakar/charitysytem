<?php

namespace PUREHEARTSPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Visit_Our_Store extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_visit_our_store';
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
		return esc_html__( 'Visit Our Store', 'purehearts' );
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
			'visit_our_store',
			[
				'label' => esc_html__( 'Visit Our Store', 'purehearts' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'purehearts' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'purehearts' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'purehearts' ),
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
				  'options' => get_product_categories(),
				  'label_block' => true,
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
			'post_type'      => 'product',
			'posts_per_page' => purehearts_set( $settings, 'query_number' ),
			'orderby'        => purehearts_set( $settings, 'query_orderby' ),
			'order'          => purehearts_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( purehearts_set( $settings, 'query_category' ) ) $args['product_cat'] = purehearts_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- shop-section -->
        <section class="shop-section sec-pad centred">
            <div class="auto-container">
                <?php if($settings['subtitle'] || $settings['title']){ ?>
                <div class="sec-title style-two centred">
                    <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                    <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                </div>
                <?php } ?>
                <div class="row clearfix">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <?php the_post_thumbnail('purehearts_270x293'); ?>
                                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-btn"><i class="icon-shopping-bag"></i><h6><?php esc_html_e('Add to cart', 'purehearts'); ?></h6></a>
                                </figure>
                                <div class="lower-content">
                                    <ul class="rating clearfix">
										<?php woocommerce_template_loop_rating();?>
                                    </ul>
                                    <h5><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title();?></a></h5>
                                    <div class="price"><h5><?php woocommerce_template_loop_price();?></h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                <div class="more-btn"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($settings['btn_title'], true);?></a></div>
                <?php } ?>
            </div>
        </section>
        <!-- shop-section end -->
                
        <?php }
		wp_reset_postdata();
	}

}
