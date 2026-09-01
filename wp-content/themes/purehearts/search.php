<?php
/**
 * Tag Main File.
 *
 * @package PUREHEARTS
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \PUREHEARTS\Includes\Classes\Common::instance()->data( 'search' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <?php if ( class_exists( '\Elementor\Plugin' )):?>
		<?php do_action( 'purehearts_banner', $data );?>
    <?php else:?>
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <?php echo purehearts_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <?php endif;?>
    
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <?php
					if ( $data->get( 'layout' ) == 'left' ) {
						do_action( 'purehearts_sidebar', $data );
					}
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                	<div class="blog-list-content">
						<?php if( have_posts() ) : ?>
                        <div class="thm-unit-test">
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    purehearts_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    
                        <!--Pagination-->
                        <div class="pagination-wrapper centred">
                            <?php purehearts_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                        
						<?php else : ?>
                        <div class="search-notfound">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'purehearts' ); ?></p>
                            <div class="blog-sidebar default-sidebar">
                                <?php get_search_form() ?>
                            </div>
                        </div>
                        
                    	<?php endif; ?>
                	</div>  
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'purehearts_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section> 
    <!--End blog area--> 
<?php
}
get_footer();

