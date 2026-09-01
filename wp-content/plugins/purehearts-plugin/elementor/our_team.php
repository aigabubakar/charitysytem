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
class Our_Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_our_team';
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
		return esc_html__( 'Our Team', 'purehearts' );
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
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'purehearts' ),
			]
		);
		$this->add_control(
			'bg_img',
			[
				'label' => __( 'BG Image', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'purehearts' ),
				'default'     => __( 'Meet Our Team', 'purehearts' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'purehearts' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'purehearts' ),
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
			  'options' => get_team_categories()
			]
		);
		$this->add_control(
            'style_two',
            [
                'label'   => esc_html__( 'Choose Carousel Style', 'purehearts' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__( 'Four Items Carousel Style', 'purehearts' ),
                    'style2' => esc_html__( 'Five Items Carousel Style', 'purehearts' ),
                ),
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
			'post_type'      => 'team',
			'posts_per_page' => purehearts_set( $settings, 'query_number' ),
			'orderby'        => purehearts_set( $settings, 'query_orderby' ),
			'order'          => purehearts_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( purehearts_set( $settings, 'query_category' ) ) $args['team_cat'] = purehearts_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- team-section -->
        <section class="team-section centred" id="team">
            <?php if($settings['bg_img']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"></div><?php } ?>
            <div class="<?php if($settings['style_two'] == 'style2') echo 'fluid-container'; else echo 'auto-container'; ?>">
                <?php if($settings['subtitle'] || $settings['title'] || $settings['text']){ ?>
                <div class="sec-title centred">
                    <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                    <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                    <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                </div>
                <?php } ?>
                <div class="<?php if($settings['style_two'] == 'style2') echo 'five-item-carousel'; else echo 'four-item-carousel'; ?> owl-carousel owl-theme owl-nav-none">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><?php the_post_thumbnail('purehearts_270x400'); ?></figure>
                            <div class="content-box">
                                <div class="info">
                                    <span class="designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                                    <h3><a href="<?php echo (get_post_meta( get_the_id(), 'team_link', true ));?>"><?php the_title(); ?></a></h3>
                                </div>
                                <figure class="thumb-box"><?php the_post_thumbnail('purehearts_140x140'); ?></figure>
                                <div class="text">
                                    <p><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                                </div>
                            </div>
                            <?php
								$icons = get_post_meta( get_the_id(), 'social_profile', true );
								if ( ! empty( $icons ) ) :
							?>
                            <ul class="social-links clearfix">
                                <?php
								foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
									if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) );
									?>
									<li><a target="_blank" href="<?php echo purehearts_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo purehearts_set( $header_social_icons, 'background' ); ?>; color: <?php echo purehearts_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- team-section end -->
                
        <?php }
		wp_reset_postdata();
	}
}