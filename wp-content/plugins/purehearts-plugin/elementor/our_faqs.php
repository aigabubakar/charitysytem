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
class Our_Faqs extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_our_faqs';
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
		return esc_html__( 'Our Faqs', 'purehearts' );
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
			'our_faqs',
			[
				'label' => esc_html__( 'Our Faqs', 'purehearts' ),
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
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'purehearts'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
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
              'accordion', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['acc_title' => esc_html__('What is Save the Pure Hearts?', 'purehearts')],
                			['acc_title' => esc_html__('How do I make a matching gift?', 'purehearts')],
							['acc_title' => esc_html__('What is Save the Tax ID Number?', 'purehearts')],
							['acc_title' => esc_html__('What is an Anti-Charity?', 'purehearts')],
							['acc_title' => esc_html__('Who can access Pure Hearts research?', 'purehearts')],
							['acc_title' => esc_html__('How is Pure Hearts different from others?', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'acc_title',
                    			'label' => esc_html__('Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'acc_text',
                    			'label' => esc_html__('Description', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
						],
            	    'title_field' => '{{acc_title}}',
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
        
        <!-- faq-page-section -->
        <section class="faq-page-section">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_10">
                            <div class="content-box">
                                <?php if($settings['feature_img']['id']){ ?><figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                <div class="text wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "",  $settings['icons']), true); ?>"></i></div>
                                    <h3><?php echo wp_kses($settings['title'], true);?></h3>
                                    <p><?php echo wp_kses($settings['text'], true);?></p>
                                    <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                                    <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true);?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <ul class="accordion-box">
                            <?php
								$count = 1;
								foreach($settings['accordion'] as $key => $item): 
							?>
                            <li class="accordion block <?php if($count == 2) echo 'active-block'; ?>">
                                <div class="acc-btn <?php if($count == 2) echo 'active'; ?>">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i><?php echo wp_kses($item['acc_title'], true);?></h5>
                                </div>
                                <div class="acc-content <?php if($count == 2) echo 'current'; ?>">
                                    <div class="text">
                                        <p><?php echo wp_kses($item['acc_text'], true);?></p>
                                    </div>
                                </div>
                            </li>
                            <?php $count++; endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-page-section end -->
                
		<?php 
	}

}
