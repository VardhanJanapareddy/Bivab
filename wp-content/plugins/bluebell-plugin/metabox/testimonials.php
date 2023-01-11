<?php
return array(
	'title'      => 'Bluebell Testimonials Setting',
	'id'         => 'bluebell_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'bluebell_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'author_name',
					'type'  => 'text',
					'title' => esc_html__( 'Author Name/Designation', 'bluebell' ),
				),
			),
		),
	),
);