<?php
/**
 * Theme config file.
 *
 * @package PUREHEARTS
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['purehearts_main_header'][] 	= array( 'purehearts_preloader', 98 );
$config['default']['purehearts_main_header'][] 	= array( 'purehearts_main_header_area', 99 );

$config['default']['purehearts_main_footer'][] 	= array( 'purehearts_preloader', 98 );
$config['default']['purehearts_main_footer'][] 	= array( 'purehearts_main_footer_area', 99 );

$config['default']['purehearts_sidebar'][] 	    = array( 'purehearts_sidebar', 99 );

$config['default']['purehearts_banner'][] 	    = array( 'purehearts_banner', 99 );


return $config;
