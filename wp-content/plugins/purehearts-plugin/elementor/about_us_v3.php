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
class About_Us_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_about_us_v3';
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
		return esc_html__( 'About Us V3', 'purehearts' );
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
			'about_us_v3',
			[
				'label' => esc_html__( 'About Us V3', 'purehearts' ),
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
				'default'     => __( 'About Pure Hearts', 'purehearts' ),
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
			'text',
			[
				'label'       => __( 'Description', 'purehearts' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'purehearts' ),
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
			'designation',
			[
				'label'       => __( 'designation', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your designation', 'purehearts' ),
				'default'     => __( 'Founder', 'purehearts' ),
			]
		);
		$this->add_control(
			'author_title',
			[
				'label'       => __( 'Author Title', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Title', 'purehearts' ),
				'default'     => __( 'Benjie Alphonso', 'purehearts' ),
			]
		);
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'social_icon',
                    			'label' => esc_html__('Enter The Social Icons', 'purehearts'),
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
			'about_img1',
			[
				'label' => __( 'About Image V1', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_img2',
			[
				'label' => __( 'About Image V2', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
            'pattern',
			[
				'label' => __( 'Enable/Disable Icons', 'purehearts' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enable/Disable Icons', 'purehearts' ),
			]
		);
		$this->add_control(
			'rotate_text_img',
			[
				'label' => __( 'Rotate Text Image', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'bird_img',
			[
				'label' => __( 'Brid Image', 'purehearts' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'experience_description',
			[
				'label'       => __( 'Experience Description', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Experience Description', 'purehearts' ),
				'default'     => __( '16+ Years of Experience', 'purehearts' ),
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
        
        <!-- about-style-three -->
        <section class="about-style-three" <?php if($settings['bg_img']['id']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"<?php } ?>>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_6">
                            <div class="content-box">
                                <?php if($settings['subtitle'] || $settings['title']){ ?>
                                <div class="sec-title">
                                    <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                    <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                </div>
                                <?php } ?>
                                <ul class="award-list clearfix">
                                    <?php foreach($settings['clients'] as $key => $item): ?>
                                    <li><a href="<?php echo esc_url($item['image_link']['url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['sponsor_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if($settings['text']){ ?>
                                <div class="text">
                                    <p><?php echo wp_kses($settings['text'], true);?></p>
                                </div>
                                <?php } ?>
                                <div class="inner-box clearfix">
                                    
                                    <div class="author-box">
                                        <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "",  $settings['icons']), true); ?>"></i></div>
                                        <span><?php echo wp_kses($settings['designation'], true); ?></span>
                                        <h3><?php echo wp_kses($settings['author_title'], true); ?></h3>
                                    </div>
                                    <ul class="social-links clearfix">
                                        <?php foreach($settings['social_icons'] as $key => $item): ?>
                                        <li><a href="<?php echo esc_url($item['social_link']['url']); ?>"><i class="fa <?php echo wp_kses(str_replace( "icon ",  "",  $item['social_icon']), true); ?>"></i></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_2">
                            <div class="image-box">
                                <?php if($settings['about_img1']['id']){ ?><figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                <?php if($settings['about_img2']['id']){ ?><figure class="image image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                
                                <?php if($settings['rotate_text_img']['id'] || $settings['bird_img']['id']){ ?>
                                <div class="rotate-text">
                                    <?php if($settings['rotate_text_img']['id']){ ?><figure class="text-box rotate-me"><img src="<?php echo esc_url(wp_get_attachment_url($settings['rotate_text_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                    <?php if($settings['bird_img']['id']){ ?><figure class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bird_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                </div>
                                <?php } ?>
                                
                                <?php if($settings['pattern']){ ?><figure class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/heart-7.png" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                <?php if($settings['experience_description']){ ?>
                                <div class="text">
                                    <h4><i class="icon-donation-1"></i><?php echo wp_kses($settings['experience_description'], true);?></h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-three end -->
                
		<?php 
	}

}
