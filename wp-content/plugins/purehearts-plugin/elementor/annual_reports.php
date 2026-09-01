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
class Annual_Reports extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_annual_reports';
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
		return esc_html__( 'Annual Reports', 'purehearts' );
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
			'annual_reports',
			[
				'label' => esc_html__( 'Annual Reports', 'purehearts' ),
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
				'default'     => __( 'Download', 'purehearts' ),
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
              'skills', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['skill_title' => esc_html__('Income Statement', 'purehearts')],
                			['skill_title' => esc_html__('Expense Statement', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'fill_circle_color',
                    			'label' => esc_html__('Fill Circle Color', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('#f65024', 'purehearts')
                			],
							[
                    			'name' => 'year_of_report',
                    			'label' => esc_html__('Year_of Report', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'fill_chart_value',
                    			'label' => esc_html__('Fill Piechart Value', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'skill_title',
                    			'label' => esc_html__('Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'skill_text',
                    			'label' => esc_html__('Text', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('View Details', 'purehearts')
                			],
							[
                    			'name' => 'btn_link2',
								'label' => __( 'External Url', 'purehearts' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
            	    'title_field' => '{{skill_title}}',
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
        
        <!-- reports-section -->
        <section class="reports-section sec-pad">
            <?php if($settings['bg_img']['id']){ ?><div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id'])); ?>);"></div><?php } ?>
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content_block_7">
                            <div class="content-box">
                                <?php if($settings['subtitle'] || $settings['title']){ ?>
                                <div class="sec-title">
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
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content_block_8">
                            <div class="content-box">
                                <div class="progress-inner">
                                    <?php foreach($settings['skills'] as $key => $item): ?>
                                    <div class="single-progress-box">
                                        <div class="box">
                                            <div class="piechart" data-fg-color="<?php echo wp_kses($item['fill_circle_color'], true);?>" data-value=".<?php echo wp_kses($item['fill_chart_value'], true);?>">
                                            </div>
                                            <span><?php echo wp_kses($item['year_of_report'], true);?></span>
                                        </div>
                                        <div class="text">
                                            <h2><?php echo wp_kses($item['fill_chart_value'], true);?><?php esc_html_e('%', 'purehearts'); ?></h2>
                                            <h3><?php echo wp_kses($item['skill_title'], true);?></h3>
                                            <p><?php echo wp_kses($item['skill_text'], true);?></p>
                                            <?php if($item['btn_link2']['url'] || $item['btn_title2']){ ?>
                                            <a href="<?php echo esc_url($item['btn_link2']['url']);?>"><i class="fa fa-angle-right"></i><?php echo wp_kses($item['btn_title2'], true);?></a>
                                            <?php } ?>
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
        <!-- reports-section end -->
                
		<?php 
	}

}
