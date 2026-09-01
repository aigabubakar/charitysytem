<?php
/**
 * Search Form template
 *
 * @package PUREHEARTS
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
        <div class="form-group">
            <input type="search"  name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search', 'purehearts' ); ?>" required="">
            <button type="submit"><i class="icon-search"></i></button>
        </div>
    </form>
</div>