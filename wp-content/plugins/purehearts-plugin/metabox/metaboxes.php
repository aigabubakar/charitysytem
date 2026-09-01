<?php
if ( ! function_exists( "purehearts_add_metaboxes" ) ) {
	function purehearts_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( PUREHEARTSPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/purehearts_options/boxes", "purehearts_add_metaboxes" );
}

