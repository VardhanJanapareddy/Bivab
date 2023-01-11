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
    <header class="main-header header-style-six">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler style-two"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icons/icon-bar4.png" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo">
                        <?php echo bluebell_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <div class="right-column">
                        <div class="navbar-right">
							<?php if($options->get('phone_no_v6') ){?>
                            <div class="header-phone-number">
							    <a href="tel:<?php echo esc_attr($options->get('phone_no_v6'));?>"><i class="flaticon-smartphone"></i> <?php echo wp_kses($options->get('phone_no_v6'), true);?></a>
                            </div>
							<?php } ?>
                            
							<?php if($options->get('btn_title_v6') ){?>
                            <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v6')); ?>" class="theme-btn btn-style-one btn-md"><?php echo wp_kses($options->get('btn_title_v6'), true); ?></a></div>
                       		<?php } ?>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler style-two"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icons/icon-bar4.png" alt="<?php esc_attr_e('Awesome Image', 'bluebell'); ?>"></div>
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo">
								<?php echo bluebell_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                            </div>
                        </div>
                        <div class="right-column">
                            <div class="navbar-right">
								<?php if($options->get('phone_no_v6') ){?>
                                <div class="header-phone-number">
                                	<a href="tel:<?php echo esc_attr($options->get('phone_no_v6'));?>"><i class="flaticon-smartphone"></i> <?php echo wp_kses($options->get('phone_no_v6'), true);?></a>
                                </div>
								<?php } ?>
                                
								<?php if($options->get('btn_title_v6') ){?>
                                <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v6')); ?>" class="theme-btn btn-style-one btn-md"><?php echo wp_kses($options->get('btn_title_v6'), true); ?></a></div>
                           		<?php } ?>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu style-two">
            <div class="close-btn"><i class="fal fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="menu-outer">
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
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->

	<?php if($options->get('show_search_v6')){ ?>
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