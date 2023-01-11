<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'bluebell' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'bluebell' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'bluebell' ),
				'e' => esc_html__( 'Elementor', 'bluebell' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'bluebell' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'bluebell' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'bluebell' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'bluebell' ),
			'default' => false,
		),
		
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





