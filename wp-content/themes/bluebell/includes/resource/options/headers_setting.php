<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'bluebell' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'bluebell' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'bluebell' ),
				'e' => esc_html__( 'Elementor', 'bluebell' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'bluebell' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'bluebell' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'bluebell' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'bluebell' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
			    ),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style 5', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v5.png',
			    ),
				'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style 6', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v6.png',
			    ),
				'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style 7', 'bluebell' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v7.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media icons', 'bluebell' ),
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_search_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
	
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media icons', 'bluebell' ),
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id' => 'show_search_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
	
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
            'id'    => 'header_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media icons', 'bluebell' ),
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_search_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		 /***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
			'id'      => 'phone_no_v4',
			'type'    => 'text',
			'title'   => __( 'Phone No', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
            'id'    => 'header_social_share_v4',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media icons', 'bluebell' ),
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_search_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Five Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'phone_no_v5',
			'type'    => 'text',
			'title'   => __( 'Phone No', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
            'id'    => 'header_social_share_v5',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media icons', 'bluebell' ),
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
            'id' => 'show_search_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Six Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
			'id'      => 'phone_no_v6',
			'type'    => 'text',
			'title'   => __( 'Phone No', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
			'id'      => 'btn_title_v6',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
			'id'      => 'btn_link_v6',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
            'id' => 'show_search_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		/***********************************************************************
								Header Version 7 Start
		************************************************************************/
		array(
			'id'       => 'header_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Seven Settings', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'phone_no_v7',
			'type'    => 'text',
			'title'   => __( 'Phone No', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_title_v7',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_link_v7',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'bluebell' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
            'id' => 'show_search_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable search', 'bluebell'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
	),
);
