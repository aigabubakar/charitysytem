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
class Emergency_Cause extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_emergency_cause';
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
		return esc_html__( 'Emergency Cause', 'purehearts' );
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
			'emergency_cause',
			[
				'label' => esc_html__( 'Emergency Cause', 'purehearts' ),
			]
		);
		$this->add_control(
			'feature_img',
			[
				'label' => __( 'Feature Image', 'purehearts' ),
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
				'default'     => __( '# Health & Food', 'purehearts' ),
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
			'charity_raised_title',
			[
				'label'       => __( 'Charity Raised Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Charity Raised Title', 'purehearts' ),
				'default'     => __( 'Charity Raised', 'purehearts' ),
			]
		);
		$this->add_control(
			'price',
			[
				'label'       => __( 'Total Price', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Total Price', 'purehearts' ),
			]
		);
		$this->add_control(
			'raised_value',
			[
				'label'       => __( 'Raised Value', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Raised Value', 'purehearts' ),
				'default'     => __( '53', 'purehearts' ),
			]
		);
		$this->add_control(
			'remaining_raised_value',
			[
				'label'       => __( 'Remaining Raised Value', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Remaining Raised Value', 'purehearts' ),
				'default'     => __( '-38,000', 'purehearts' ),
			]
		);
		$this->add_control(
			'day_left',
			[
				'label'       => __( 'Days Left', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Days Left', 'purehearts' ),
				'default'     => __( '65 Days Left', 'purehearts' ),
			]
		);
		$this->add_control(
			'total_suppoters',
			[
				'label'       => __( 'Total Suppoters', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Total Suppoters', 'purehearts' ),
				'default'     => __( '40+ Suppoters', 'purehearts' ),
			]
		);
		$this->add_control(
			'share_title',
			[
				'label'       => __( 'Share Title', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Social Share Title', 'purehearts' ),
				'default'     => __( 'Share:', 'purehearts' ),
			]
		);
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			[],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The Social icons', 'purehearts'),
								'label_block' => true,
								'type' => Controls_Manager::SELECT2,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Link', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
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
				'default'     => __( 'Donate Now', 'purehearts' ),
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
		?>
        
        <!-- emergency-cause -->
        <section class="emergency-cause">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="upper-content clearfix">
                        <div class="left-column pull-left">
                            <?php if($settings['feature_img']['id']){ ?><figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                            <?php if($settings['subtitle'] || $settings['title']){ ?>
                            <div class="text">
                                <?php if($settings['subtitle']){ ?><h5><?php echo wp_kses($settings['subtitle'], true);?></h5><?php } ?>
                                <?php if($settings['title']){ ?><h3><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="right-column pull-right">
                            <div class="donate-amount-info clearfix">
                                <div class="amount-box">
                                    <div class="icon-box"><i class="fa fa-dollar"></i></div>
                                    <h5><?php echo wp_kses($settings['charity_raised_title'], true);?></h5>
                                    <div class="price"><?php echo wp_kses($settings['price'], true);?></div>
                                </div>
                                <div class="percentage-box">
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="<?php echo wp_kses($settings['raised_value'], true);?><?php esc_html_e('%', 'purehearts'); ?>"></div>
                                    </div>
                                    <div class="count-text"><?php echo wp_kses($settings['raised_value'], true);?><?php esc_html_e('% Raised', 'purehearts'); ?> <span><?php echo wp_kses($settings['remaining_raised_value'], true);?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content clearfix">
                        <div class="info-column pull-left clearfix">
                            <ul class="info-box clearfix">
                                <?php if($settings['day_left']){ ?>
                                <li>
                                    <div class="icon"><i class="fa fa-calendar"></i></div>
                                    <p><?php echo wp_kses($settings['day_left'], true);?></p>
                                </li>
                                <?php } ?>
                                <?php if($settings['total_suppoters']){ ?>
                                <li>
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <p><?php echo wp_kses($settings['total_suppoters'], true);?></p>
                                </li>
                                <?php } ?>
                                <?php if($settings['share_title']){ ?>
                                <li class="share">
                                    <div class="icon"><i class="fa fa-share-alt"></i></div>
                                    <p><?php echo wp_kses($settings['share_title'], true);?></p>
                                </li>
                                <?php } ?>
                            </ul>
                            <ul class="social-links clearfix">
                                <?php foreach($settings['social_icons'] as $key => $item): ?>
                                <li><a href="<?php echo esc_url($item['social_link']['url']);?>"><i class="fa <?php echo wp_kses(str_replace( "icon ",  "",  $item['icons']), true); ?>"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                        <div class="btn-box pull-right">
                            <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="donate-box-btn"><i class="fa fa-arrow-right"></i> <?php echo wp_kses($settings['btn_title'], true);?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- emergency-cause end -->
                
		<?php 
	}

}
