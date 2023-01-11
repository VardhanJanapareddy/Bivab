<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Bluebell
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );

$error_img   = $options->get( 'error_image' );
$error_img   = bluebell_set( $error_img, 'url', BLUEBELL_URI . 'assets/images/resource/comming-soon.jpg' );

?>
<?php get_header();
$data = \BLUEBELL\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'bluebell_banner', $data );
$options = bluebell_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	
	
	?>
	
    <section class="error-section light-bg mx-60 border-shape-top border-shape-bottom" style="background-image:url(<?php echo esc_url($error_img); ?>)">
        <div class="auto-container">
            <div class="content text-center">
                <h1>
					<?php 
                        if( $options->get( '404_page_title' ) ){
                            echo wp_kses( $options->get( '404_page_title' ), true );
                        }else{
                            esc_html_e( '404', 'bluebell' );
                        }
                    ?>
                </h1>
                <h2>
					<?php 
                        if( $options->get( '404_bold_text' ) ){
                            echo wp_kses( $options->get( '404_bold_text' ), true );
                        }else{
                            esc_html_e( 'Oops! That page can’t be found', 'bluebell' );
                        }
                    ?>
                </h2>
                <div class="text">
				<?php 
					if( $options->get( '404_page_text' ) ){
						echo wp_kses( $options->get( '404_page_text' ), true );
					}else{
						esc_html_e( 'Sorry, but the page you are looking for does not existing.', 'bluebell' );
					}
				?>
                </div>
                
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one">
                <?php 
					if( $options->get( 'back_home_btn_label' ) ){
						echo wp_kses( $options->get( 'back_home_btn_label' ), true );
					}else{
						esc_html_e( 'GO TO HOME PAGE', 'bluebell' );
					}
				?>
                </a>
            </div>
        </div>
    </section>
        
<?php
}
get_footer(); ?>
