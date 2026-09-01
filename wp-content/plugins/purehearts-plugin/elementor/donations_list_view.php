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
class Donations_List_View extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'purehearts_donations_list_view';
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
        return esc_html__( 'Donations List View', 'purehearts' );
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
            'donations_list_view',
            [
                'label' => esc_html__( 'Donations List View', 'purehearts' ),
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
        
        <!-- case-page-section -->
        <section class="case-page-section list-view">
            <div class="auto-container">
                <?php
					global $post; 
					while ( $query->have_posts() ) : $query->the_post();
					$campaign = charitable_get_current_campaign(); 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
					$term_list = wp_get_post_terms(get_the_id(), 'campaign_category', array("fields" => "names"));
				?>
                <div class="case-block-four">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><?php the_post_thumbnail('purehearts_530x252')?></figure>
                            <div class="donate-inner clearfix">
                                <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-8.png);"></div>
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
                        </div>
                        <div class="content-box">
                            <div class="text">
                                <div class="category"><?php echo implode( ', ', (array)$term_list );?></div>
                                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                                <p><?php echo wp_kses(purehearts_trim(get_the_content(), $settings['text_limit']), true); ?></p>
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
                <?php endwhile; ?>
                <div class="pagination-wrapper centred">
                    <?php purehearts_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-arrow-right"></i> ', 'prev_text' => '<i class="fa fa-arrow-left"></i>')); ?>
                </div>
            </div>
        </section>
        <!-- case-page-section end -->
                
        <?php }

        wp_reset_postdata();
    }
}
