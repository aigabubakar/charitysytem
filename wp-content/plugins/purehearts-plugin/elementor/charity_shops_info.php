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
class Charity_Shops_Info extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_charity_shops_info';
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
		return esc_html__( 'Charity Shops Info', 'purehearts' );
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
			'charity_shops_info',
			[
				'label' => esc_html__( 'Charity Shops Info', 'purehearts' ),
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
				'default'     => __( 'Charity Shops', 'purehearts' ),
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
              'contact_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('United States', 'purehearts')],
                			['block_title' => esc_html__('Australia', 'purehearts')],
							['block_title' => esc_html__('United Kingdom', 'purehearts')],
							['block_title' => esc_html__('India', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'flag_img',
                    			'label' => __( 'Flag Image', 'purehearts' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'address',
                    			'label' => esc_html__('Address', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'phone_no',
                    			'label' => esc_html__('Phone Number', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'email_address',
                    			'label' => esc_html__('Email Address', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
						],
            	    'title_field' => '{{block_title}}',
                 ]
        );
		$this->add_control(
			'bottom_description',
			[
				'label'       => __( 'Bottom Description', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Bottom Description', 'purehearts' ),
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
        
        <!-- charity-shops -->
        <section class="charity-shops centred">
            <div class="auto-container">
                <?php if($settings['subtitle'] || $settings['title']){ ?>
                <div class="sec-title centred">
                    <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                    <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                </div>
                <?php } ?>
                <div class="row clearfix">
                    <?php foreach($settings['contact_info'] as $key => $item): ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <figure class="flag"><img src="<?php echo esc_url(wp_get_attachment_url($item['flag_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                            <h4><?php echo wp_kses($item['block_title'], true);?></h4>
                            <p><?php echo wp_kses($item['address'], true);?></p>
                            <div class="phone"><a href="tel:<?php echo esc_attr($item['phone_no'], true);?>"><?php echo wp_kses($item['phone_no'], true);?></a></div>
                            <div class="mail"><a href="mailto:<?php echo esc_attr($item['email_address'], true);?>"><?php echo wp_kses($item['email_address'], true);?></a></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if($settings['bottom_description']){ ?>
                <div class="more-text"><span><?php echo wp_kses($settings['bottom_description'], true);?></span></div>
                <?php } ?>
            </div>
        </section>
        <!-- charity-shops end -->
                
		<?php 
	}

}
