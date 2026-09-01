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
class Our_History extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_our_history';
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
		return esc_html__( 'Our History', 'purehearts' );
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
			'our_history',
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
		$this->end_controls_section();
		
		//Image Carousel
		$this->start_controls_section(
            'image_carousel',
            [
                'label' => esc_html__( 'Image Carousel', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
              'history_carousel', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'carousel_img',
                    			'label' => __( 'Slider Image', 'purehearts' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
						],
                 ]
        );
		$this->end_controls_section();
		
		//History Tab
		$this->start_controls_section(
            'tabs',
            [
                'label' => esc_html__( 'History Tab', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
              'history_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['tab_btn_title' => esc_html__('2005', 'purehearts')],
                			['tab_btn_title' => esc_html__('2006', 'purehearts')],
							['tab_btn_title' => esc_html__('2007', 'purehearts')],
							['tab_btn_title' => esc_html__('2008', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'tab_btn_title',
                    			'label' => esc_html__('Counter Start', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'block_text',
                    			'label' => esc_html__('Description', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Read More', 'purehearts')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
            	    'title_field' => '{{tab_btn_title}}',
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
        
        <!-- history-section -->
        <section class="history-section">
            <?php if($settings['bg_img']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"></div><?php } ?>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                            <div class="image-box">
                                <div class="history-carousel owl-carousel owl-theme owl-dots-none">
                                    <?php foreach($settings['history_carousel'] as $key => $item): ?>
                                    <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['carousel_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 image-column">
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <?php foreach($settings['history_tab'] as $key => $item): ?>
                                        <li class="tab-btn <?php if($key == 1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($key); ?>"><i class="fa fa-calendar-alt"></i><?php echo wp_kses($item['tab_btn_title'], true); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="tabs-content">
                                    <?php foreach($settings['history_tab'] as $key => $item): ?>
                                    <div class="tab <?php if($key == 1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($key); ?>">
                                        <div class="text">
                                            <h3><?php echo wp_kses($item['block_title'], true); ?></h3>
                                            <p><?php echo wp_kses($item['block_text'], true); ?></p>
                                            <?php if($item['btn_link']['url']){ ?><a href="<?php echo esc_url($item['btn_link']['url']); ?>"><i class="fa fa-angle-right"></i><?php echo wp_kses($item['btn_title'], true); ?></a><?php } ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- history-section end -->
        
		<?php 
	}

}
