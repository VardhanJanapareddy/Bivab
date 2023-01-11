<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'bluebell_setup_theme' );
add_action( 'after_setup_theme', 'bluebell_load_default_hooks' );


function bluebell_setup_theme() {

	load_theme_textdomain( 'bluebell', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'bluebell_60x59', 60, 59, true ); //bluebell_60x59 Our Testimonials 
	add_image_size( 'bluebell_370x272', 370, 272, true ); //bluebell_370x272 Our News
	add_image_size( 'bluebell_370x350', 370, 350, true ); //bluebell_370x350 Our gallery
	add_image_size( 'bluebell_380x417', 380, 417, true ); //bluebell_380x417 Our gallery V3
	add_image_size( 'bluebell_270x324', 270, 324, true ); //bluebell_270x324 Our Team
	add_image_size( 'bluebell_370x499', 370, 499, true ); //bluebell_370x499 Our gallery_v2
	add_image_size( 'bluebell_370x307', 370, 307, true ); //bluebell_370x307 Our gallery_v2
	add_image_size( 'bluebell_840x435', 840, 435, true ); //bluebell_840x435 archieve_page
	add_image_size( 'bluebell_570x435', 570, 435, true ); //bluebell_570x435 blog 2 grid
	add_image_size( 'bluebell_70x61', 70, 61, true );     //bluebell_70x61 Bluebell_Popular_Post
	add_image_size( 'bluebell_770x374', 770, 374, true ); //bluebell_770x374 Our Rooms V1
	add_image_size( 'bluebell_370x374', 770, 374, true ); //bluebell_370x374 Our Rooms V1
	add_image_size( 'bluebell_370x514', 370, 514, true ); //bluebell_370x514 Our Rooms V2
	add_image_size( 'bluebell_520x360', 520, 360, true ); //bluebell_520x360 Our Rooms V3
	add_image_size( 'bluebell_924x575', 924, 575, true ); //bluebell_924x575 Our Rooms V4
	add_image_size( 'bluebell_182x183', 182, 183, true ); //bluebell_182x183 Footer Gallery Widget
	add_image_size( 'bluebell_370x486', 370, 486, true ); //bluebell_370x393 Our Gallery V2
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'bluebell' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'bluebell_admin_init', 2000000 );
}

/**
 * [bluebell_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function bluebell_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [bluebell_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function bluebell_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'bluebell' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'bluebell' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'bluebell' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="border-box"></div><div class="title"><h2>',
		'after_title'   => '</h2></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'bluebell'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'bluebell'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 wow animated fadeInUp"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'bluebell' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'bluebell' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="border-box"></div><div class="title"><h2>',
	  'after_title' => '</h2><div class="decor"></div></div>'
	));
	if ( ! is_object( bluebell_WSH() ) ) {
		return;
	}

	$sidebars = bluebell_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( bluebell_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="border-box"></div><div class="title"><h2>',
			'after_title'   => '</h2><div class="decor"></div></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'bluebell_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function bluebell_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'bluebell' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'bluebell' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'bluebell' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'bluebell' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'bluebell' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'bluebell' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'bluebell' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'bluebell' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'bluebell' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'bluebell_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function bluebell_enqueue_scripts() {
	$options = bluebell_WSH()->option();
	
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'bluebell-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/css/custom-animate.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css' );
	wp_enqueue_style( 'bluebell-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );
	wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'elpath', get_template_directory_uri() . '/assets/css/elpath.css' );
	wp_enqueue_style( 'bluebell-main', get_stylesheet_uri() );	
	wp_enqueue_style( 'bluebell-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'bluebell-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'bluebell-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'bluebell-color', get_template_directory_uri() . '/assets/css/color.css' );
	
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/assets/js/jquery.countdown.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tweenmax', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bluebell-swiper', get_template_directory_uri().'/assets/js/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ajaxchimp', get_template_directory_uri().'/assets/js/jquery.ajaxchimp.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/assets/js/parallax-scroll.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bluebell-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bluebell-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'bluebell_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function bluebell_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Playfair+Display']      = 'Playfair Display:wght@400,700,800&display=swap';
		$font_families['Roboto']      = 'Roboto:wght@400,700&display=swap';
		$font_families['Poppins']      = 'Poppins:wght@400,500,600,700&display=swap';

		$font_families = apply_filters( 'REXAR/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function bluebell_theme_styles() {
    wp_enqueue_style( 'bluebell-theme-fonts', bluebell_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'bluebell_theme_styles' );
add_action( 'admin_enqueue_scripts', 'bluebell_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) bluebell_set function

/**
 * [bluebell_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'bluebell_set' ) ) {
	function bluebell_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) bluebell_add_editor_styles function

function bluebell_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'bluebell_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = bluebell_WSH()->option(); 
if( bluebell_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);