<?php

namespace BLUEBELLPLUGIN\Element;


class Elementor {
	static $widgets = array(
	
	  //Home Page One
		'slider_v1',
		'about_us',
		'features_services',
		'our_rooms_v1',
		'eat_and_drink',
		'luxurious_experience',
		'summer_offer',
		'testimonials',
		'our_funfacts',
		'our_news',
		
	  //Home Page Two
		'slider_v2',
		'about_us_v2',
		'why_choose_us',
		'our_rooms_v2',
		'our_funfacts_v2',
		'gallery_v2',
		'our_discount',
		'eat_and_drink_v2',
		'our_news_v2',
		
      //Home Page Three
		'slider_v3',
		'about_us_v3',
		'our_rooms_v3',
		'eat_and_drink_v3',
		'features_services_v2',
		'map_and_news',
		
	  //Home Page Four
		'slider_v4',
		'welcome',
		'features_services_v3',
		'eat_and_drink_v4',
		'our_team',
		'gallery_v3',
		'map_v2',
		
	  //Home Page Five
		'banner_v2',
		'welcome_section_v2',
		'about_us_v4',
		'our_rooms_v4',
		
	  //Home Page Six	
		'slider_v6',
		'welcome_section_v3',
		'our_faclilites',
		'our_rooms_v5',
		
	  //Home Page Seven		
		'slider_v7',
		'welcome_section_v4',
		'testimonials_v2',
		
	  //Home Page Eight	
		'slider_v8',
		'welcome_section_v5',
		'room_features',
		
     //Home Page Nine		
		'banner_v6',
		'aminities_services',
		'about_us_v5',
		
	//Home Page Ten
		'slider_v9',		
		'our_story',
		'our_rooms_v6',
		
	//Inner pages	
		'our_history',
		'faqs',
		'room_grid_view',
		'room_list_view',
		'features_services_v4',
		'our_restaurant',
		'our_specilities',
		'menu_list',
		'spa_wellness',
		'our_packages',
		'our_facilities_v2',
		'our_discount_v2',
		'our_gallery_v1',
		'our_gallery_v2',
		'blog_2_column',
		'contact_us',
		'map_v3',
		'coming_soon',
		
		
		
		
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = BLUEBELLPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\BLUEBELLPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'bluebell',
			[
				'title' => esc_html__( 'Bluebell', 'bluebell' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'bluebell' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();