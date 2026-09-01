<?php
/**
 * Footer Template  File
 *
 * @package PUREHEARTS
 * @author  Template Path
 * @version 1.0
 */

$options = purehearts_WSH()->option();

$card_icon_img_v1 = $options->get( 'card_icon_image_v1');
$card_icon_img_v1 = purehearts_set( $card_icon_img_v1, 'url', PUREHEARTS_URI . 'assets/images/resource/card-1.png' );

$card_icon_img_v2 = $options->get( 'card_icon_image_v2');
$card_icon_img_v2 = purehearts_set( $card_icon_img_v2, 'url', PUREHEARTS_URI . 'assets/images/resource/card-2.png' );

$card_icon_img_v3 = $options->get( 'card_icon_image_v3');
$card_icon_img_v3 = purehearts_set( $card_icon_img_v3, 'url', PUREHEARTS_URI . 'assets/images/resource/card-3.png' );

$card_icon_img_v4 = $options->get( 'card_icon_image_v4');
$card_icon_img_v4 = purehearts_set( $card_icon_img_v4, 'url', PUREHEARTS_URI . 'assets/images/resource/card-4.png' );

$card_icon_img_v5 = $options->get( 'card_icon_image_v5');
$card_icon_img_v5 = purehearts_set( $card_icon_img_v5, 'url', PUREHEARTS_URI . 'assets/images/resource/card-5.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <!-- main-footer -->
    <section class="main-footer">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <div class="footer-top">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="copyright pull-left">
                        <p><?php echo wp_kses( $options->get( 'copyright_text', '&copy; 2021 <a href="#">Pure Hearts,</a> All Rights Reserved. ' ), true ); ?></p>
                    </div>
                    <?php if($card_icon_img_v1 || $card_icon_img_v2 || $card_icon_img_v3 || $card_icon_img_v4 || $card_icon_img_v5) { ?>
                    <ul class="footer-card pull-right clearfix">
                        <li><span><?php esc_html_e('Ways to Donate:', 'purehearts'); ?></span></li>
                        <?php if($card_icon_img_v1){ ?><li><a href="<?php echo esc_url($options->get('card_link_v1')); ?>"><img src="<?php echo esc_url($card_icon_img_v1); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li><?php } ?>
                        <?php if($card_icon_img_v2){ ?><li><a href="<?php echo esc_url($options->get('card_link_v2')); ?>"><img src="<?php echo esc_url($card_icon_img_v2); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li><?php } ?>
                        <?php if($card_icon_img_v3){ ?><li><a href="<?php echo esc_url($options->get('card_link_v3')); ?>"><img src="<?php echo esc_url($card_icon_img_v3); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li><?php } ?>
                        <?php if($card_icon_img_v4){ ?><li><a href="<?php echo esc_url($options->get('card_link_v4')); ?>"><img src="<?php echo esc_url($card_icon_img_v4); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li><?php } ?>
                        <?php if($card_icon_img_v5){ ?><li><a href="<?php echo esc_url($options->get('card_link_v5')); ?>"><img src="<?php echo esc_url($card_icon_img_v5); ?>" alt="<?php esc_attr_e('Awesome Image', 'purehearts'); ?>"></a></li><?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->