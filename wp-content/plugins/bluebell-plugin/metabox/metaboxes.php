<?php
if ( ! function_exists( "bluebell_add_metaboxes" ) ) {
	function bluebell_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'hb_rooms.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( BLUEBELLPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/bluebell_options/boxes", "bluebell_add_metaboxes" );
}

