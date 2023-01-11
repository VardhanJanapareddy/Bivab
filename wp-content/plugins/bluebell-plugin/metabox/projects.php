<?php
return array(
	'title'      => 'Bluebell Project Setting',
	'id'         => 'bluebell_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'bluebell_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'bluebell' ),
				),
				array(
					'id'    => 'image_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'bluebell' ),
					'options'  => array(
						'normal_height' => esc_html__( 'Normal Height', 'bluebell' ),
						'medium_height' => esc_html__( 'Medium Height', 'bluebell' ),
						'extra_height' => esc_html__( 'Extra Height', 'bluebell' ),
					),
					'default'  => 'normal_height',
				),	
			),
		),
		
	),
);