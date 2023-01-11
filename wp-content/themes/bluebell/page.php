<?php
/**
 * Default Template Main File.
 *
 * @package BLUEBELL
 * @author  ThemeArc
 * @version 1.0
 */

get_header();
$data  = \BLUEBELL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-9 pr-lg-5';
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'bluebell_banner', $data );?>
<?php else:?>
<!--Start breadcrumb area paroller-->     
 <section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
        <div class="auto-container">
            <div class="text-center">
                <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
            </div>
        </div>
    </section>
<!--End breadcrumb area-->
<?php endif;?>

<!--Start Blog Page Three-->
<div class="sidebar-page-container light-bg mx-60 border-shape-top border-shape-bottom">
    <div class="auto-container">            
    	<div class="row">
		
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'bluebell_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="news-block-two style-two blog-single-post">
                    <div class="thm-unit-test">
                            
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'bluebell' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                     
                     </div>
                </div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'bluebell_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</div>
<!-- blog section with pagination -->
<?php get_footer(); ?>
