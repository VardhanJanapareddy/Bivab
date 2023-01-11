<?php
/**
 * The Template for displaying all single products
 *
 * Override this template by copying it to yourtheme/tp-hotel-booking/single-room.php
 *
 * @author        ThimPress
 * @package       wp-hotel-booking/templates
 * @version       1.6
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();
$data    = \BLUEBELL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = bluebell_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>
<!--Start breadcrumb area paroller-->     
<section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
    <div class="auto-container">
        <div class="text-center">
            <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- room details -->
<section class="room-details-section light-bg mx-60 border-shape-top border-shape-bottom">
    <div class="auto-container">
     	<div class="row clearfix">      
            <!-- sidebar area -->
			<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'bluebell_sidebar', $data );
				}
			?>
			
			<div class="<?php echo esc_attr($class);?> column">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="single-items-carousel">
                    <div class="swiper-container single-item-with-pager-carousel">
                    	<div class="swiper-wrapper">
							<?php
                                /**
                                 * hotel_booking_single_room_gallery hook
                                 */
                                do_action( 'hotel_booking_single_room_gallery' );
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="room-block">
                    <div class="pricing"><?php do_action( 'hotel_booking_loop_room_price' );?></div>
                    <?php do_action( 'hotel_booking_loop_room_title' );?></h2>
                </div>
                
                <?php the_content();?>
                
                <?php endwhile; // end of the loop. ?>
            </div>
            <!-- sidebar area -->
			<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'bluebell_sidebar', $data );
				}
			?>
            
        </div>
    </div>
</section>
<?php
}
get_footer();