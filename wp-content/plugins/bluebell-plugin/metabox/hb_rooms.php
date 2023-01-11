<?php
return array(
	'title'      => 'Bluebell HB Room Setting',
	'id'         => 'bluebell_room_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'hb_room' ),
	'sections'   => array(
		array(
			'id'     => 'bluebell_room_meta_setting',
			'fields' => array(
				array(
					'id'    => 'total_bed',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Total Beds', 'bluebell' ),
				),
				array(
					'id'    => 'total_bath',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Total Bathroom', 'bluebell' ),
				),
				array(
					'id'    => 'room_square_ft',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Room Square Feets', 'bluebell' ),
				),
				array(
					'id'    => 'room_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra Width', 'bluebell' ),
					'options'  => array(
						'extra_width' => esc_html__( 'Extra Width', 'bluebell' ),
						'normal_width' => esc_html__( 'Normal Width', 'bluebell' ),
					),
					'default'  => 'normal_width',
				),
			),
		),
	),
);