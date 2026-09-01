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
class About_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_about_us';
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
		return esc_html__( 'About Us', 'purehearts' );
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
			'about_us',
			[
				'label' => esc_html__( 'About Us', 'purehearts' ),
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
			'donation_description',
			[
				'label'       => __( 'Image Caption Description', 'purehearts' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image Caption Description', 'purehearts' ),
				'default'     => __( 'We’ve Funded 50k Dollars', 'purehearts' ),
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
              'funfacts', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Volunteers', 'purehearts')],
                			['block_title' => esc_html__('Beneficiaries', 'purehearts')]
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
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Letter', 'purehearts'),
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
						],
            	    'title_field' => '{{block_title}}',
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
        
         <!-- about-section -->
        <section class="about-section sec-pad" id="about">
            <?php if($settings['bg_img']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"></div><?php } ?>
            <div class="auto-container">
                <div class="row clearfix">
                    <?php if($settings['about_img1']['id'] || $settings['about_img2']['id'] || $settings['donation_description']){ ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
                                <?php if($settings['about_img1']['id']){ ?><figure class="image image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                <?php if($settings['about_img2']['id']){ ?><figure class="image image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure><?php } ?>
                                <?php if($settings['pattern']){ ?>
                                <figure class="image image-3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/heart-2.png" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                                <figure class="image image-4"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/heart-3.png" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                                <figure class="image image-5"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/imoji-1.png" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></figure>
                                <?php } ?>
								<?php if($settings['donation_description']){ ?>
                                <div class="text">
                                    <h4><i class="icon-donation"></i><?php echo wp_kses($settings['donation_description'], true);?></h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="inner">
                                    <?php if($settings['subtitle'] || $settings['title']){ ?>
                                    <div class="sec-title">
                                        <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                        <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['text']){ ?>
                                    <div class="text">
                                        <?php echo wp_kses($settings['text'], true);?>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['btn_link']['url'] || $settings['btn_title']){ ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($settings['btn_title'], true);?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="funfact-inner">
                                    <?php foreach($settings['funfacts'] as $key => $item): ?>
                                    <div class="counter-block-one wow fadeInRight animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="<?php echo wp_kses(str_replace( "icon ",  "",  $item['icons']), true); ?>"></i></div>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="1500" data-stop="<?php echo wp_kses($item['counter_stop'], true); ?>"><?php echo wp_kses($item['counter_start'], true); ?></span><?php if($item['alphabet_letter']){ ?><span><?php echo wp_kses($item['alphabet_letter'], true); ?></span><?php } ?>
                                            </div>
                                            <h4><?php echo wp_kses($item['block_title'], true); ?></h4>
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
        <!-- about-section end -->
        
		<?php 
	}

}
