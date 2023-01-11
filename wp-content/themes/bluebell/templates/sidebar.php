<?php

/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage BLUEBELL
 * @author     ThemeArc
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<div class="col-lg-3 col-md-6 col-sm-12">
    	<aside class="sidebar">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</aside>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}
?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<div class="col-lg-3 col-md-6 col-sm-12">
    	<aside class="sidebar">
			<?php dynamic_sidebar( $options ); ?>
		</aside>
	</div>
<?php endif; ?>

