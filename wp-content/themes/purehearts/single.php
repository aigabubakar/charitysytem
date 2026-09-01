<?php
/**
 * Blog Post Main File.
 *
 * @package PUREHEARTS
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \PUREHEARTS\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = purehearts_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-details-content">
                	
                    <div class="thm-unit-test">    
                        
                        <div class="content-one">
                            <div class="upper-box">
                                <?php if(has_category()){ ?><span><?php the_category(' , ');?></span><?php } ?>
                                <ul class="post-info clearfix">
                                    <?php if( $options->get( 'single_post_author' ) ){ ?><li><i class="fa fa-user"></i><?php esc_html_e('By', 'purehearts'); ?> <?php the_author(); ?></li><?php } ?>
                                    <?php if( $options->get( 'single_post_comments' ) ){ ?><li><i class="fa fa-comment"></i><?php comments_number( wp_kses(__('0 Comments' , 'purehearts'), true), wp_kses(__('1 Comment' , 'purehearts'), true), wp_kses(__('% Comments' , 'purehearts'), true)); ?></li><?php } ?>
                                </ul>
                            </div>
                            <?php if( has_post_thumbnail() ){ ?>
                            <figure class="image-box">
                                <?php the_post_thumbnail('purehearts_1170x500'); ?>
                                <span class="post-date"><?php echo esc_attr(get_the_date()); ?></span>
                            </figure>
                            <?php }?>
                        </div>
                        
                        <div class="text">
							<?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'purehearts'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                        </div>
                        
						<?php if(function_exists('bunch_share_us_two') || has_tag()):?>
                        <div class="post-share-option clearfix">
                            
							<?php if(has_tag()){ ?>
                            <ul class="tags-list pull-left clearfix">
                                <li><h5><?php esc_html_e('Tags:', 'purehearts'); ?></h5></li>
                                <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                            </ul>
                            <?php } ?>
                            
                            <?php if(function_exists('bunch_share_us_two')):?>
							<?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                        	<?php endif;?>
                            
                        </div>
                        <?php endif;?>
                        
                        <?php if( $options->get( 'single_post_author_box' ) ):?>
                        <div class="author-box">
                            <figure class="author-thumb">
                            	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
									<?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
                                <?php endif; ?>
                            </figure>
                                
                            <div class="content-box">
                                <h3><?php the_author(); ?></h3>
                                <?php if( $options->get( 'single_post_author_links' ) ):?>
                                <h6><?php esc_html_e('Visit:', 'purehearts'); ?> <a href="<?php the_author_meta( 'url', get_the_author_meta('ID') ); ?>"><?php the_author_meta( 'url', get_the_author_meta('ID') ); ?></a></h6>
                                <?php endif; ?>
                                
								<p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                
								<?php if( $options->get( 'single_post_author_links' ) ):?>
								<?php $icons = $options->get( 'single_post_author_social_share' );
                                if ( ! empty( $icons ) ) :
                                ?>
                                <ul class="social-links clearfix">
                                    <?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
									if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) );
									?>
									<li><a href="<?php echo esc_url(purehearts_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(purehearts_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(purehearts_set( $header_social_icons, 'color' )); ?>"><i class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
									<?php endforeach; ?>
                                </ul>
                                <?php endif; endif;?>
                            </div>
                        </div>
                        <?php endif;?>
                        
                        <?php if((get_previous_post()) || (get_next_post())): ?>
                        <div class="nav-btn-box clearfix">
                            <?php global $post; $prev_post = get_previous_post();
        					if (!empty($prev_post)): 
							?>
                            <div class="single-item text-left pull-left">
                                <h5><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo wp_kses_post($prev_post->post_title); ?></a></h5>
                                <span><?php echo esc_attr(get_the_date()); ?></span>
                            </div>
                            <?php endif ?>
                            
                            <?php global $post; $next_post = get_next_post();
        					if (!empty($next_post)): 
							?>
                            <div class="single-item text-right pull-right">
                                <h5><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo wp_kses_post($next_post->post_title); ?></a></h5>
                                <span><?php echo esc_attr(get_the_date()); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif;?>
                        
                        <!--End post-details-->
                        <?php comments_template(); ?>
                    
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
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
