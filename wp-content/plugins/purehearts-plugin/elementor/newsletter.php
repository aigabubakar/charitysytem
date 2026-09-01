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
class Newsletter extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_newsletter';
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
		return esc_html__( 'Newsletter', 'purehearts' );
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
			'newsletter',
			[
				'label' => esc_html__( 'Newsletter', 'purehearts' ),
			]
		);
		$this->add_control(
			'logo_img',
			[
				'label' => __( 'Logo Image', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'mailchimp_form_url',
			[
				'label'       => __( 'Mailchimp Form Url', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Mailchimp Form Url', 'purehearts' ),
			]
		);
		$this->add_control(
              'social_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                		],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'purehearts'),
								'label_block' => true,
								'type' => Controls_Manager::SELECT2,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Url', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
                 ]
        );
		$this->add_control(
            'style_two',
            [
                'label'   => esc_html__( 'Choose Different Style', 'purehearts' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__( 'Disable Bottom Space', 'purehearts' ),
                    'style2' => esc_html__( 'Enable Bottom Space', 'purehearts' ),
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
		?>
        
        <!-- subscribe-section -->
        <section class="subscribe-section <?php if($settings['style_two'] == 'style2') echo 'comingsoon-page'; else echo ''; ?>">
            <div class="<?php if($settings['style_two'] == 'style2') echo ''; else echo 'bg-layer'; ?>"></div>
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="left-column pull-left">
                        <?php if($settings['logo_img']['id']){ ?>
                        <div class="logo-box">
                            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-1.png);"></div>
                            <figure class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($settings['logo_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></figure>
                        </div>
                        <?php } ?>
                        <?php if($settings['title']){ ?>
                        <div class="text">
                            <h3><i class="icon-email-open-sketched-envelope"></i><?php echo wp_kses($settings['title'], true);?></h3>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <?php if($settings['mailchimp_form_url']){ ?>
                        <div class="form-inner">
                            <div class="subscribe-form">
                                <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                            </div>
                        </div>
                        <?php } ?>
                        <ul class="social-style-one clearfix">
                            <?php foreach($settings['social_info'] as $key => $item): ?>
                            <li><a href="<?php echo esc_url($item['social_link']['url']);?>"><i class="fa <?php echo wp_kses($item['icons'], true); ?>"></i></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->
                
		<?php 
	}

}
