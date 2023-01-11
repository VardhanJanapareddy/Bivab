<?php
	return array(
		'title'      => 'bluebell post Setting',
		'id'         => 'bluebell_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'quote_description',
						'type'  => 'textarea',
						'title' => esc_html__('Quote Description', 'bluebell'),
					),
				),
			),
		),
	);


?>