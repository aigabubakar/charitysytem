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
class Event_Grid_View extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_event_grid_view';
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
		return esc_html__( 'Event Grid View', 'purehearts' );
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
			'event_grid_view',
			[
				'label' => esc_html__( 'Event_grid_view', 'purehearts' ),
			]
		);
		$this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'purehearts' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'purehearts'),
				'label_block' => true,
                'options' => get_events_categories(),
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
		
		$count = 1;
		$events = tribe_get_events(array(
			'posts_per_page' => $settings['query_number'],
			'tax_query'=> array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => $settings['query_category']
				)
			)
		)); ?>
        
        <!-- events-page-section -->
        <section class="events-page-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php 
						if ( empty( $events ) ) :
						echo 'Sorry, nothing found.';
						else: 
						foreach( $events as $event ) : 
						
						$event_thumbnail_id = get_post_thumbnail_id($event->ID);
						$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);
						
						$start_datetime = tribe_get_start_date( $event->ID );
						$end_datetime = tribe_get_end_date( $event->ID );
						
						$start_date = tribe_get_start_date($event->ID, true, 'd' );
						$end_date = tribe_get_end_date($event->ID, true, 'M' );
						
						$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
						$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );
						
						$location = get_option('location');
					?>
                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3><?php echo wp_kses($start_date, true); ?><span><?php echo wp_kses($end_date, true); ?></span></h3></div>
                                <figure class="image-box"><?php echo (get_the_post_thumbnail($event->ID, 'purehearts_370x440')); ?></figure>
                                <div class="content-box">
                                    <ul class="category">
									<?php
									echo str_replace( ': ', '', tribe_get_event_categories(
										$event->ID, array(
											'echo'         => false,
											'label'        => '', // An appropriate plural/singular label will be provided
											'label_before' => '',
											'label_after'  => '',
											'wrap_before'  => '',
											'wrap_after'   => '',
										)
									));
									?>
                                    </ul>
                                    <ul class="info clearfix">
                                        <li><i class="fa fa-calendar"></i><?php echo wp_kses($start_time, true); ?></li>
                                        <li><i class="fa fa-map"></i><?php echo tribe_get_venue( $event->ID ); ?></li>
                                    </ul>
                                    <h3><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true);?></a></h3>
                                    <div class="links"><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php esc_html_e('More Details', 'purehearts'); ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif;  ?>
                </div>
                <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                <div class="more-btn centred"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($settings['btn_title'], true);?></a></div>
            	<?php } ?>
            </div>
        </section>
        <!-- events-page-section -->
                
		<?php 
	}

}
