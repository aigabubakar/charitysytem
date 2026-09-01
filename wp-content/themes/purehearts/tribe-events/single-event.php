<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;
$event_id = get_the_ID();

$data    = \PUREHEARTS\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'blog-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = purehearts_WSH()->option();


$event_thumbnail_id = get_post_thumbnail_id($event_id);
$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

$start_datetime = tribe_get_start_date( $event_id );
$end_datetime = tribe_get_end_date( $event_id );

$start_date = tribe_get_start_date($event_id, true, 'Y/m/d' );
$end_date = tribe_get_end_date($event_id, true, 'Y/m/d' );

$start_time = tribe_get_start_time ( $event_id, 'h:i A' );
$end_time = tribe_get_end_time ( $event_id, 'h:i A' );

$location = get_option('location');

?>

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

<!-- event-details -->
<section class="event-details">
    <div class="auto-container">
        <div class="row clearfix">
        	
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar default-sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
            
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="event-details-content">
					<?php while ( have_posts() ) : the_post(); ?>
                    
                        <div class="upper-box centred">
                            <ul class="events-info clearfix">
                                <li><i class="fa fa-calendar"></i><?php echo wp_kses($start_date, true); ?></li>
                                <li><i class="fa fa-clock-o"></i><?php echo wp_kses($start_time, true); ?></li>
                                <li><i class="fa fa-map"></i><?php echo tribe_get_venue( $event_id ); ?></li>
                            </ul>
                            <figure class="image-box"><?php the_post_thumbnail('purehearts_1170x500'); ?></figure>
                        </div>
                        

						<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                        <?php the_content();?>
                        <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                    
                    <?php endwhile; ?>
                </div>
            </div>
        	
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar default-sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
			
        </div>
    </div>
</section>
<!--End blog area-->
