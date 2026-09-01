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
class Portfolio_4_Column extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'purehearts_portfolio_4_column';
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
		return esc_html__( 'Portfolio 4 Column', 'purehearts' );
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
			'portfolio_4_column',
			[
				'label' => esc_html__( 'Portfolio 4 Column', 'purehearts' ),
			]
		);
		$this->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number of post', 'purehearts' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'purehearts' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'purehearts' ),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'purehearts' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'purehearts' ),
					'ASC'  => esc_html__( 'ASC', 'purehearts' ),
				),
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
		
		$this->add_render_attribute( 'wrapper', 'class', 'themeexpo-purehearts' );
		$args = array(
			'post_type'      => 'project',
			'posts_per_page' => purehearts_set( $settings, 'number' ),
			'orderby'        => purehearts_set( $settings, 'query_orderby' ),
			'order'          => purehearts_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",purehearts_set( $settings, 'cat_exclude' ));
		if(purehearts_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
                <div class="portfolio-block-one">
                    <div class="inner-box">
                        <figure class="image"><?php the_post_thumbnail('purehearts_291x291'); ?></figure>
                        <div class="content-box">
                            <ul class="links-list clearfix">
                                <li><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-expand"></i></a></li>
                                <li><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_url', true ));?>" ><i class="fa fa-file"></i></a></li>
                            </ul>
                            <div class="text">
                                <span><?php echo implode( ', ', (array)$term_list );?></span>
                                <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_url', true ));?>">Educate Children</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
			
            <!-- portfolio-section -->
            <section class="portfolio-section four-columns centred">
                <div class="auto-container">
                    <div class="sortable-masonry">
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="active filter" data-role="button" data-filter=".all"><?php esc_attr_e('View All', 'purehearts');?></li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(purehearts_set( $t, 'slug' )); ?>"><?php echo purehearts_set( $t, 'name'); ?></li>
                            	<?php endforeach;?>
                            </ul>
                        </div>
                        <div class="items-container row clearfix">
                            <?php echo wp_kses($data_posts, true); ?>
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="pagination clearfix">
                            <?php purehearts_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-arrow-right"></i> ', 'prev_text' => '<i class="fa fa-arrow-left"></i>')); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- portfolio-section end -->
                                    
       <?php }
	}

}
