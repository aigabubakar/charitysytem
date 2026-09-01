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
class Video_Tour extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_video_tour';
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
		return esc_html__( 'Video Tour', 'purehearts' );
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
			'video_tour',
			[
				'label' => esc_html__( 'Video Tour', 'purehearts' ),
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
              'video', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['subtitle' => esc_html__('Charity VideoTour', 'purehearts')],
                			['subtitle' => esc_html__('Charity VideoTour', 'purehearts')],
							['subtitle' => esc_html__('Charity VideoTour', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'feature_img',
                    			'label' => __( 'Feature Image', 'purehearts' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'purehearts'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'purehearts'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Play Button Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Play Video', 'purehearts')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'Video Url', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
            	    'title_field' => '{{subtitle}}',
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
        
        <!-- video-section -->
        <section class="video-section" <?php if($settings['bg_img']['id']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"<?php } ?>>
            <div class="auto-container">
                <div class="video-carousel owl-carousel owl-theme owl-dots-none">
                    <?php foreach($settings['video'] as $key => $item): ?>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                            <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                            <div class="content-box">
                                <?php if($item['subtitle'] || $item['title']){ ?>
                                <div class="sec-title light">
                                    <?php if($item['subtitle']){ ?><span class="top-text"><?php echo wp_kses($item['subtitle'], true);?></span><?php } ?>
                                    <?php if($item['title']){ ?><h2><?php echo wp_kses($item['title'], true);?></h2><?php } ?>
                                </div>
                                <?php } ?>
                                <?php if($item['text']){ ?>
                                <div class="text">
                                    <p><?php echo wp_kses($item['text'], true);?></p>
                                </div>
                                <?php } ?>
                                <?php if($item['btn_link']['url'] || $item['btn_title']){ ?>
                                <div class="video-btn">
                                    <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-16.png);"></div>
                                    <a href="<?php echo esc_url($item['btn_link']['url']);?>" data-fancybox><i class="icon-play-arrow"></i><?php echo wp_kses($item['btn_title'], true);?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- video-section end -->
                
		<?php 
	}

}
