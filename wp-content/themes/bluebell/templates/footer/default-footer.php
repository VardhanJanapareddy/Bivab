<?php
/**
 * Footer Template  File
 *
 * @package BLUEBELL
 * @author  Template Path
 * @version 1.0
 */

$options = bluebell_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
  	<!--footer section  -->
    <footer class="main-footer">
        <div class="auto-container">
            <!-- footer gallery -->
            <?php if( $options->get('show_gallery') ){ ?>
            <div class="footer-gallery">
                <div class="row">
                    
					<?php 
						$gall_images = $options->get( 'gallery_imgs' );
						$gall_images = explode(',', $gall_images);
						if ($gall_images) :
						foreach ($gall_images as $gall) :
					?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="image gallery-overlay">
                            <div class="inner-box">
                                <img src="<?php echo esc_url(wp_get_attachment_url($gall)); ?>" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>">
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="<?php echo esc_url(wp_get_attachment_url($gall)); ?>" class="lightbox-image link" data-fancybox="gallery"><span class="icon fas fa-eye"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
			<?php } ?>
            
            <!--Widgets Section-->
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?> 
            <div class="widgets-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
            <?php }?>
        </div>

        <div class="auto-container">
       		 <div class="boder-bottom-four"></div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="copyright text-center">
                        <div class="text"><?php echo wp_kses( $options->get( 'copyright_text', 'Copyright &copy;<a href="#"> 2021 Bluebell.</a> All Rights Reserved. ' ), true ); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
	<!--End pagewrapper-->