<?php
$options = bluebell_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_logo = $options->get( 'light_color_logo' );
$light_logo_dimension = $options->get( 'light_color_logo_dimension' );

//Mobile Logo
$mobile_logo = $options->get( 'mobile_logo' );
$mobile_logo_dimension = $options->get( 'mobile_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

    <!-- Main Header -->
    <header class="main-header header-style-three">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Logo-->
                        <div class="logo-box mr_85">
                            <div class="logo">
                            	<?php echo bluebell_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                            </div>
                        </div>
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icons/icon-bar4.png" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false,
									'items_wrap' => '%3$s',
									'container'=>false,
									'depth'=>'3',
									'walker'=> new Bootstrap_walker()
								) ); ?>
                               </ul>
                            </div>
                        </nav>
                    </div>
					
					<?php if($options->get('btn_title_v3') ){?>
                    <div class="right-column">
                        <div class="navbar-right">
                        	<div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v3')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses($options->get('btn_title_v3'), true); ?></a></div>
                        </div>
                    </div>
					<?php } ?>                     
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo">
                            	<?php echo bluebell_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                            </div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icons/icon-bar4.png" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
    
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                            
							<?php if($options->get('show_search_v3')){ ?>
                            <div class="search-toggler"><i class="far fa-search"></i></div>
                            <?php } ?>
                        </div>
						
						<?php if($options->get('btn_title_v3') ){?>
                        <div class="right-column">
                            <div class="navbar-right">
                             	<div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v3')); ?>" class="theme-btn btn-style-one"><?php echo wp_kses($options->get('btn_title_v3'), true); ?></a></div>
                          	</div>
                        </div>
						<?php } ?>                     
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="icon far fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo">
                	<?php echo bluebell_logo( $logo_type, $mobile_logo, $mobile_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>
                
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
                
				<?php 
					$icons = $options->get( 'header_social_share_v3' );
					if ( !empty( $icons ) ) : 
				?>
				<div class="social-links">
					<ul class="clearfix">
						<?php foreach ( $icons as $h_icon ) :
						$header_social_icons = json_decode( urldecode( bluebell_set( $h_icon, 'data' ) ) );
						if ( bluebell_set( $header_social_icons, 'enable' ) == '' ) {
							continue;
						}
						$icon_class = explode( '-', bluebell_set( $header_social_icons, 'icon' ) ); ?>
						<li><a href="<?php echo esc_url(bluebell_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(bluebell_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(bluebell_set( $header_social_icons, 'color' )); ?>" target="_blank"><span class="fab <?php echo esc_attr( bluebell_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
						<?php endforeach; ?>
					</ul>
                </div>
                <?php endif; ?>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->

	<?php if($options->get('show_search_v3')){ ?>
    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><i class="far fa-times"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <?php get_template_part('searchform1'); ?>
            </div>
        </div>
    </div>
	<?php } ?>

