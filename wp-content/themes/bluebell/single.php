<?php
/**
 * Blog Post Main File.
 *
 * @package BLUEBELL
 * @author  Theme Arc
 * @version 1.0
 */

get_header();
$data    = \BLUEBELL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-9 pr-lg-5';
$options = bluebell_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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

<!--Start Blog Details Area-->
 <div class="sidebar-page-container light-bg mx-60 border-shape-top border-shape-bottom">
    <div class="auto-container">            
        <div class="row">

        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'bluebell_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="news-block-two style-two blog-single-post">
                    <div class="thm-unit-test">    
                    
                        <div class="inner-box">
                       	    <?php if(has_post_thumbnail()){ ?>
                            <div class="image"><?php the_post_thumbnail('bluebell_1170x440'); ?></div>
                            <?php }?>
						    <div class="lower-content">
                                <div class="post-meta">
                                    <div class="date"><?php echo esc_attr(get_the_date()); ?></div>
                                    <ul>
                                        <li><?php esc_html_e('By:', 'bluebell'); ?> <?php the_author(); ?>  /  <?php if(has_category()){ ?><?php the_category(' '); ?> /<?php } ?> <?php comments_number( wp_kses(__('0 Comments' , 'bluebell'), true), wp_kses(__('1 Comment' , 'bluebell'), true), wp_kses(__('% Comments' , 'bluebell'), true)); ?></li>
                                    </ul>
                                </div>
                                <div class="text">
									<?php the_content(); ?>
                                    <div class="clearfix"></div>
                                    <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'bluebell'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                </div>
                        
								<?php if(function_exists('bunch_share_us_two')):?>
                                <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                                <?php endif;?>
                        	</div>
                        
                        </div>
                        <!-- Comment Form -->
                        <?php comments_template(); ?>
                        <!--End Comment Form -->   
                    </div>       
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
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
