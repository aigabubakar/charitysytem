<?php
/**
 * Footer Template  File
 *
 * @package PUREHEARTS
 * @author  Template Path
 * @version 1.0
 */

$options = purehearts_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- main-footer -->
    <section class="main-footer">
        <?php if ( is_active_sidebar( 'footer-sidebar-v2' ) ) { ?>
        <div class="footer-top-two">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar-v2' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php 
			$icons = $options->get( 'footer_social_share_v2' );
			if ( !empty( $icons ) ) : 
		?>
        <div class="footer-bottom-two">
            <div class="auto-container">
                <ul class="social-links clearfix">
                    <?php foreach ( $icons as $h_icon ) :
					$header_social_icons = json_decode( urldecode( purehearts_set( $h_icon, 'data' ) ) );
					if ( purehearts_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', purehearts_set( $header_social_icons, 'icon' ) ); ?>
					<li><a href="<?php echo esc_url(purehearts_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(purehearts_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(purehearts_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fa <?php echo esc_attr( purehearts_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <!-- main-footer end -->