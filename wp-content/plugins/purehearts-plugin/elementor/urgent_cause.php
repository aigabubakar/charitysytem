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
class Urgent_Cause extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'purehearts_urgent_cause';
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
        return esc_html__( 'Urgent Cause', 'purehearts' );
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
            'urgent_cause',
            [
                'label' => esc_html__( 'General', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'bg_image',
			[
			  'label' => __( 'Background Image', 'purehearts' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
              'features', 
			  	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Make the', 'purehearts')],
						['block_title' => esc_html__('Give a', 'purehearts')],
					],
            		'fields' => 
						[
                			[
								'name' => 'feature_bg_image',
								'label' => esc_html__('BG Image', 'purehearts'),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'purehearts'),
								'label_block' => true,
								'type' => Controls_Manager::SELECT2,
								'options'  => get_fontawesome_icons(),
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
                    			'label' => esc_html__('Text', 'purehearts'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'purehearts')
                			],
							[
                    			'name' => 'features_list',
                    			'label' => esc_html__('Feature List', 'purehearts'),
								'label_block' => true,
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
            	    'title_field' => '{{block_title}}',
                 ]
        );
		$this->end_controls_section();
		
		//Urgent Cause
		$this->start_controls_section(
            'causes',
            [
                'label' => esc_html__( 'Urgent Cause', 'purehearts' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'purehearts' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 110,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'purehearts' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
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
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'purehearts' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'purehearts' ),
                    'ASC'  => esc_html__( 'ASC', 'purehearts' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'purehearts'),
				'label_block' => true,
                'options' => get_campaign_categories()
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

        $paged = get_query_var('paged');
		$paged = purehearts_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-purehearts' );
        $args = array(
            'post_type'      => 'campaign',
            'posts_per_page' => purehearts_set( $settings, 'query_number' ),
            'orderby'        => purehearts_set( $settings, 'query_orderby' ),
            'order'          => purehearts_set( $settings, 'query_order' ),
            'paged'         => $paged
        );

        if( purehearts_set( $settings, 'query_category' ) ) $args['campaign_category'] = purehearts_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- urgent-case-section -->
        <section class="urgent-case-section" <?php if($settings['bg_image']['id']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>>
            <div class="outer-container">
                <div class="inner-box clearfix">
                    <?php foreach($settings['features'] as $key => $item): ?>
                    <div class="single-block" <?php if($item['feature_bg_image']['id']){ ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['feature_bg_image']['id'])); ?>);"<?php } ?>>
                        <div class="text">
                            <h3><i class="<?php echo wp_kses(str_replace( "icon ",  "",  $item['icons']), true); ?>"></i><?php echo wp_kses($item['block_title'], true); ?></h3>
                            <p><?php echo wp_kses($item['block_text'], true); ?></p>
                            <?php $features_list = $item['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
                            <ul class="list-style-one clearfix">
                                <?php foreach($features_list as $features): ?>
								<li><?php echo wp_kses($features, true); ?></li>
								<?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                            <a href="<?php echo esc_url($item['btn_link']['url']); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a>
                        	<?php } ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="right-column">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6">
                            <?php
								global $post; 
								while ( $query->have_posts() ) : $query->the_post();
								$campaign = charitable_get_current_campaign(); 
								$post_thumbnail_id = get_post_thumbnail_id($post->ID);
								$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
								$term_list = wp_get_post_terms(get_the_id(), 'campaign_category', array("fields" => "names"));
							?>
                            <div class="urgent-case-block">
                                <div class="upper-box" style="background-image: url(<?php echo esc_url($post_thumbnail_url);?>);">
                                    <div class="sec-title light">
                                        <span class="top-text"><?php echo implode( ', ', (array)$term_list );?></span>
                                        <h2><?php the_title();?></h2>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses(wp_trim_words( get_the_content(), $settings['text_limit'] ), true); ?></p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-two"><?php esc_html_e('Read More', 'purehearts'); ?></a>
                                    </div>
                                </div>
                                <div class="lower-box">
                                    <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-7.png);"></div>
                                    <div class="donate-inner clearfix">
                                        <div class="pattern-layer-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
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
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- urgent-case-section -->
        
        <?php }

        wp_reset_postdata();
    }
}
