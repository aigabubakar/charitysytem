<?php namespace PUREHEARTSPLUGIN\Element;

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
class Slider_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'purehearts_slider_v1';
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
        return esc_html__( 'Slider V1', 'purehearts' );
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
            'slider_v1',
            [
                'label' => esc_html__( 'Slider Info', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
              'slides', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Donate', 'purehearts')],
                			['title' => esc_html__('Happiness', 'purehearts')],
							['title' => esc_html__('Help Today', 'purehearts')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'bg_image',
								'label' => esc_html__('Slide BG Image', 'purehearts'),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'sub_heading',
                    			'label' => esc_html__('Sub Heading', 'purehearts'),
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
                    			'label' => esc_html__('Button Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Read More', 'purehearts')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'Button Link', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
            	    'title_field' => '{{title}}',
                 ]
        );
		
		$this->end_controls_section();
		
		//Feature Block
		$this->start_controls_section(
            'feature_block',
            [
                'label' => esc_html__( 'Our Features', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'bg_image2',
				[
				  'label' => __( 'Background Pattern Image', 'purehearts' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_subtitle' => esc_html__('Donate to', 'purehearts')],
                			['block_subtitle' => esc_html__('Donate to', 'purehearts')],
							['block_subtitle' => esc_html__('Donate to', 'purehearts')],
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
                    			'name' => 'block_subtitle',
                    			'label' => esc_html__('Sub Title', 'purehearts'),
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
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title V2', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'purehearts')
                			],
							[
                    			'name' => 'btn_link2',
								'label' => __( 'Button Link V2', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
								'name' => 'feature_image',
								'label' => esc_html__('Feature Image', 'purehearts'),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
						],
            	    'title_field' => '{{block_subtitle}}',
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
        ?>
		
        <!-- banner-section -->
        <section class="banner-section" id="home">
            <div class="banner-carousel">
                <div class="swiper-container banner-content">
                    <div class="swiper-wrapper">
                        <?php foreach($settings['slides'] as $key => $item): ?>
                        <div class="swiper-slide">
                            <?php if($item['bg_image']['id']){ ?><div class="image-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);"></div><?php } ?>
                            <div class="auto-container">
                                <div class="content-box">
                                    <?php if($item['title']){ ?><h2><?php echo wp_kses($item['title'], true); ?></h2><?php } ?>
                                    <?php if($item['subtitle']){ ?><span><?php echo wp_kses($item['subtitle'], true); ?></span><?php } ?>
                                    <?php if($item['sub_heading']){ ?><h2><?php echo wp_kses($item['sub_heading'], true); ?></h2><?php } ?>
                                    <?php if($item['text']){ ?><p><?php echo wp_kses($item['text'], true); ?></p><?php } ?>
                                    <?php if($item['btn_link']['url'] || $item['btn_title']){ ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="banner-btn"><?php echo wp_kses($item['btn_title'], true); ?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="othre-text centred">
                                <span class="animation_text_word"></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-nav-button">
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"><i class="fa fa-arrow-right"></i></div>
                        <div class="swiper-button-prev"><i class="fa fa-arrow-left"></i></div>
                    </div>                    
                </div>
            </div>
            
            <div class="banner-thumbs-carousel">
                <?php if($settings['bg_image2']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id'])); ?>);"></div><?php } ?>
                <div class="swiper-container banner-thumbs">
                    <div class="swiper-wrapper">
                        <?php $count = 1; foreach($settings['features'] as $key => $item): ?>
                        <div class="swiper-slide">
                            <div class="single-item">
                                <div class="icon-box">
                                    <div class="icon"><i class="<?php echo wp_kses(str_replace( "icon ",  "",  $item['icons']), true); ?>"></i></div>
                                    <span><?php $count = sprintf('%02d', $count); echo $count; ?></span>
                                </div>
                                <div class="text">
                                    <span class="top-text"><?php echo wp_kses($item['block_subtitle'], true); ?></span>
                                    <h3><?php echo wp_kses($item['block_title'], true); ?></h3>
                                    <?php if($item['btn_link2']['url'] || $item['btn_title2']){ ?>
                                    <a href="<?php echo esc_url($item['btn_link2']['url']); ?>"><?php echo wp_kses($item['btn_title2'], true); ?></a>
                                	<?php } ?>
                                </div>
                                <?php if($item['feature_image']['id']){ ?><figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                            </div>
                        </div>
                        <?php $count++; endforeach; ?>
                    </div>
                    <div class="swiper-nav-button">
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"><i class="fa fa-arrow-left"></i></div>
                        <div class="swiper-button-prev"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- banner-section end -->
                 
        <?php
    }
}
