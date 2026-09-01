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
class Our_Recent_Events extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_our_recent_events';
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
		return esc_html__( 'Our Recent Events', 'purehearts' );
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
			'our_recent_events',
			[
				'label' => esc_html__( 'General', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
			'feature_img',
			[
				'label' => __( 'Right Side Image', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_img',
			[
				'label' => __( 'Pattern Image', 'purehearts' ),
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
				'default'     => __( 'Our Recent Events', 'purehearts' ),
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
		$this->add_control(
			'sponsors_title',
			[
				'label'       => __( 'Sponsor Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sponsor Title', 'purehearts' ),
				'default'     => __( 'Event Sponsors:', 'purehearts' ),
			]
		);
		$this->add_control(
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                		],
            		'fields' => 
						[
                			[
                    			'name' => 'sponsor_img',
                    			'label' => __( 'Sponsor Image', 'purehearts' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'image_link',
								'label' => __( 'External Url', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
                 ]
        );
		$this->add_control(
			'btn_title2',
			[
				'label'       => __( 'Button Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'purehearts' ),
				'default'     => __( 'Become a Sponsor', 'purehearts' ),
			]
		);
		$this->add_control(
			'btn_link2',
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
		
		//Our Events
		$this->start_controls_section(
            'events',
            [
                'label' => esc_html__( 'Our Events', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
        
        <!-- events-section -->
        <section class="events-section">
            <?php if($settings['bg_img']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"></div><?php } ?>
            <?php if($settings['feature_img']['id']){ ?><div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>);"></div><?php } ?>
            <div class="auto-container">
                <div class="inner-container">
                    <?php if($settings['pattern_img']['id']){ ?><div class="shape" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_img']['id'])); ?>);"></div><?php } ?>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_2">
                                <div class="content-box">
                                    <?php if($settings['subtitle'] || $settings['title']){ ?>
                                    <div class="sec-title light">
                                        <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                		<?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                    </div>
                                    <?php } ?>
                                    <div class="text">
                                        <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
										<?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                                        <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($settings['btn_title'], true);?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="sponsors-inner">
                                        <h3><?php echo wp_kses($settings['sponsors_title'], true);?></h3>
                                        <div class="sponsors-carousel owl-carousel owl-theme owl-dots-none">
                                            <?php foreach($settings['clients'] as $key => $item): ?>
                                            <figure class="sponsors-logo"><a href="<?php echo esc_url($item['image_link']['url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['sponsor_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></figure>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php if($settings['btn_link2']['url'] || $settings['btn_title2']){ ?>
                                        <h6><a href="<?php echo esc_url($settings['btn_link2']['url']);?>"><?php echo wp_kses($settings['btn_title2'], true);?></a></h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="right-column">
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
                                <div class="events-block-one wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-20.png);"></div>
                                        <figure class="image-box">
                                            <?php echo (get_the_post_thumbnail($event->ID, 'purehearts_150x160')); ?>
                                            <h3><?php echo wp_kses($start_date, true); ?><span><?php echo wp_kses($end_date, true); ?></span></h3>
                                        </figure>
                                        <div class="inner">
                                            <ul class="info clearfix">
                                                <li><i class="fa fa-calendar"></i><?php echo wp_kses($start_time, true); ?></li>
                                                <li><i class="fa fa-map"></i><?php echo tribe_get_venue( $event->ID ); ?></li>
                                            </ul>
                                            <h3><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true);?></a></h3>
                                            <div class="links"><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php esc_html_e('More Details', 'purehearts'); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- events-section end -->
        
		<?php 
	}

}
