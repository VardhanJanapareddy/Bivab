<?php
/**
 * Theme config file.
 *
 * @package BLUEBELL
 * @author  ThemeArc
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['bluebell_main_header'][] 	= array( 'bluebell_preloader', 98 );
$config['default']['bluebell_main_header'][] 	= array( 'bluebell_main_header_area', 99 );

$config['default']['bluebell_main_footer'][] 	= array( 'bluebell_preloader', 98 );
$config['default']['bluebell_main_footer'][] 	= array( 'bluebell_main_footer_area', 99 );

$config['default']['bluebell_sidebar'][] 	    = array( 'bluebell_sidebar', 99 );

$config['default']['bluebell_banner'][] 	    = array( 'bluebell_banner', 99 );


return $config;
