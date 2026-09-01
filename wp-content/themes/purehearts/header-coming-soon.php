<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package PUREHEARTS
 * @since   1.0
 * @version 1.0
 */
$options = purehearts_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$icon_href = $options->get( 'image_favicon' ); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
    <?php if($icon_href):?>
		<link rel="shortcut icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
	<?php endif; ?>
    <?php endif; ?>
	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<?php
if (! function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}?>


<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close"><?php esc_html_e('x', 'purehearts'); ?></div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="P" class="letters-loading">
                            <?php esc_html_e('P', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="u" class="letters-loading">
                            <?php esc_html_e('u', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="r" class="letters-loading">
                            <?php esc_html_e('r', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="e" class="letters-loading">
                            <?php esc_html_e('e', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="H" class="letters-loading">
                            <?php esc_html_e('H', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="e" class="letters-loading">
                            <?php esc_html_e('e', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="a" class="letters-loading">
                            <?php esc_html_e('a', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="r" class="letters-loading">
                            <?php esc_html_e('r', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="t" class="letters-loading">
                            <?php esc_html_e('t', 'purehearts'); ?>
                        </span>
                        <span data-text-preloader="s" class="letters-loading">
                            <?php esc_html_e('s', 'purehearts'); ?>
                        </span>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- preloader end -->
	<?php endif; ?>

