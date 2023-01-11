<?php

return array(
	'id'     => 'bluebell_header_settings',
	'title'  => esc_html__( "Bluebell Header Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'bluebell' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'bluebell' ),
				'e' => esc_html__( 'Elementor', 'bluebell' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'bluebell-plugin' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Header Styles', 'bluebell' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Header Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
				),
				'header_v2' => array(
					'alt' => 'Header Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
				),
				'header_v3' => array(
					'alt' => 'Header Style 3',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
				),
				'header_v4' => array(
					'alt' => 'Header Style 4',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
				),
				'header_v5' => array(
					'alt' => 'Header Style 5',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v5.png',
				),
				'header_v6' => array(
					'alt' => 'Header Style 6',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v6.png',
				),
				'header_v7' => array(
					'alt' => 'Header Style 7',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v7.png',
				),
			),
			'required' => array( array( 'header_source_type', 'equals', 'd' ) ),
		),
	),
);