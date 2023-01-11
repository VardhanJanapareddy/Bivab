<?php
/**
 * Tag Main File.
 *
 * @package BLUEBELL
 * @author  Theme Arc
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \BLUEBELL\Includes\Classes\Common::instance()->data( 'tag' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-9 pr-lg-5';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
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
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                bluebell_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>  
                
                <!--Pagination-->
                <div class="styled-pagination">
                    <?php bluebell_the_pagination( $wp_query->max_num_pages );?>
                </div>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'bluebell_sidebar', $data );
				}
			?>
        </div>
    </div>
</div>
<!--End blog area--> 
<?php
}
get_footer();
