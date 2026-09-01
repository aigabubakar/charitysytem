<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $wp_query;
$data  = \PUREHEARTS\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}

if( !$layout || $layout == 'full' ) $classes[] = 'col-lg-3 col-md-6 col-sm-12 shop-block'; else $classes[] = 'col-lg-3 col-md-6 col-sm-12 shop-block'; ?>

<div <?php post_class( $classes ); ?>>
	<div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500m">
        <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
			<div class="inner-box">
				<?php
                /**
                 * Hook: woocommerce_before_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_open - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_before_shop_loop_item_title.
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                 
                 ?>
                 <figure class="image-box">
                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                    <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>" class="cart-btn"><i class="icon-shopping-bag"></i><h6><?php esc_html_e('Add to cart', 'purehearts'); ?></h6></a>
                 </figure>
                 
                <?php do_action( 'woocommerce_before_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                //do_action( 'woocommerce_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
                <div class="lower-content">
                    <?php woocommerce_template_loop_rating(); ?>
                    <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
                    <div class="price"><h5><?php woocommerce_template_loop_price(); ?></h5></div>
                </div>
                <?php
                /**
                 * Hook: woocommerce_after_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
        	</div>
		</div>
	</div>
</div>