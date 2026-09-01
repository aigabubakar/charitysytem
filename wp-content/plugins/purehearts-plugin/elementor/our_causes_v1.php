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
class Our_Causes_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_our_causes_v1';
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
		return esc_html__( 'Our Causes V1', 'purehearts' );
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
			'our_causes_v1',
			[
				'label' => esc_html__( 'Our Causes V1', 'purehearts' ),
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
				'default'     => __( 'Our Global Causes', 'purehearts' ),
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
              'project_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['tab_btn_title' => esc_html__('All Categories', 'purehearts')],
                			['tab_btn_title' => esc_html__('Education', 'purehearts')],
							['tab_btn_title' => esc_html__('Health & Food', 'purehearts')],
							['tab_btn_title' => esc_html__('Hunger & Nutrition', 'purehearts')],
							['tab_btn_title' => esc_html__('Treatment', 'purehearts')],
							['tab_btn_title' => esc_html__('Water & Environment', 'purehearts')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'tab_btn_title',
                    			'label' => esc_html__('Tab Button Title', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
								'name' => 'text_limit',
								'label'   => esc_html__( 'Text Limit', 'purehearts' ),
								'type'    => Controls_Manager::NUMBER,
								'default' => 110,
								'min'     => 1,
								'max'     => 1000,
								'step'    => 1,
							],
							[
								'name' => 'query_number',
								'label'   => esc_html__( 'Number of post', 'purehearts' ),
								'type'    => Controls_Manager::NUMBER,
								'default' => 3,
								'min'     => 1,
								'max'     => 100,
								'step'    => 1,
							],
							[
								'name' => 'query_orderby',
								'label'   => esc_html__( 'Order By', 'purehearts' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'date',
								'options' => array(
									'date'       => esc_html__( 'Date', 'purehearts' ),
									'title'      => esc_html__( 'Title', 'purehearts' ),
									'menu_order' => esc_html__( 'Menu Order', 'purehearts' ),
									'rand'       => esc_html__( 'Random', 'purehearts' ),
								),
							],
							[
								'name' => 'query_order',
								'label'   => esc_html__( 'Order', 'purehearts' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'DESC',
								'options' => array(
									'DESC' => esc_html__( 'DESC', 'purehearts' ),
									'ASC'  => esc_html__( 'ASC', 'purehearts' ),
								),
							],
							[
							  'name' => 'query_category',
							  'type' => Controls_Manager::SELECT,
						      'label' => esc_html__('Category', 'purehearts'),
							  'label_block' => true,
							  'options' => get_campaign_categories()
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
		$allowed_tags = wp_kses_allowed_html('post');
		
		?>
        
        <!-- case-section -->
        <section class="case-section" id="case">
            <div class="auto-container">
                <div class="tabs-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                            <div class="title-inner text-right">
                                <?php if($settings['subtitle'] || $settings['title']){ ?>
                                <div class="sec-title">
                                    <?php if($settings['subtitle']){ ?><span class="top-text"><?php echo wp_kses($settings['subtitle'], true);?></span><?php } ?>
                                    <?php if($settings['title']){ ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                </div>
                                <?php } ?>
                                
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <?php $count = 1; foreach($settings['project_tab'] as $key => $item):?>
                                        <li class="tab-btn <?php if($count == 1) echo 'active-btn';?>" data-tab="#tab-<?php echo esc_attr($count);?>">
                                            <h5><?php echo wp_kses($item['tab_btn_title'], true);?></h5>
                                            <div class="icon"><i class="fa fa-angle-left"></i></div>
                                        </li>
                                        <?php $count++; endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                            <div class="tabs-content">
                                <?php $count = 1; foreach($settings['project_tab'] as $keys => $item):
								
									$paged = get_query_var('paged');
									$paged = purehearts_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
							
									$this->add_render_attribute( 'wrapper', 'class', 'templatepath-purehearts' );
									$args = array(
										'post_type'      => 'campaign',
										'posts_per_page' => purehearts_set( $item, 'query_number' ),
										'orderby'        => purehearts_set( $item, 'query_orderby' ),
										'order'          => purehearts_set( $item, 'query_order' ),
										'text_limit'     => purehearts_set( $item, 'text_limit' ),
										'paged'         => $paged
									);
							
									if( purehearts_set( $item, 'query_category' ) ) $args['campaign_category'] = purehearts_set( $item, 'query_category' );
									$query = new \WP_Query( $args );
							
									if ( $query->have_posts()):	
								?>
                                <div class="tab <?php if($count == 1) echo 'active-tab';?>" id="tab-<?php echo esc_attr($count);?>">
                                    <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                                        <?php 
											global $post ; 
											while ( $query->have_posts() ) : $query->the_post();
											$campaign = charitable_get_current_campaign();
											$term_list = wp_get_post_terms(get_the_id(), 'campaign_category', array("fields" => "names"));
										?>
                                        <div class="case-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box"><?php the_post_thumbnail('purehearts_370x240'); ?></figure>
                                                <div class="lower-content">
                                                    <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-11.png);"></div>
                                                    <div class="donate-amount clearfix">
                                                        <div class="donate-percentage">
                                                            <div class="donate-bar">
                                                                <div class="bar-inner"><div class="bar progress-line" data-width="<?php echo esc_attr($campaign->get_percent_donated_raw());?>"><div class="count-box"><span class="count-text" data-speed="2500" data-stop="<?php echo esc_attr($campaign->get_percent_donated_raw());?>"><?php esc_html_e('0', 'charityhub'); ?></span><?php esc_html_e('%', 'charityhub'); ?></div></div></div>
                                                            </div>
                                                            <div class="donate-bar-info">
                                                                <div class="donate-percent"></div>
                                                            </div>
                                                            <?php if ( $campaign->has_goal() ):?>
                                                            <div class="amounts clearfix">
                                                                <div class="pull-left number"><?php echo wp_kses($campaign->get_donation_summary(), true); ?></div>
                                                            </div>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>    
                                                    <div class="inner">
                                                        <div class="text">
                                                            <div class="category"><?php echo implode( ', ', (array)$term_list );?></div>
                                                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                                                            <p><?php echo wp_kses(wp_trim_words( get_the_content(), $item['text_limit'] ), true); ?></p>
                                                        </div>
                                                        <ul class="info-box clearfix">
                                                            <li>
                                                                <i class="fa fa-calendar"></i>
                                                                <h5><?php esc_html_e('Date:', 'purehearts'); ?></h5>
                                                                <p><?php echo esc_attr(get_the_date()); ?></p>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-users"></i>
                                                                <h5><?php esc_html_e('By:', 'purehearts'); ?></h5>
                                                                <p><?php the_author(); ?></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif;?>
								<?php $count++; endforeach;?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- case-section end -->
                        
		<?php 
	}

}
