<?php
return array(
	'title'      => 'Purehearts Testimonials Setting',
	'id'         => 'purehearts_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'purehearts_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'author_name',
					'type'  => 'text',
					'title' => esc_html__( 'Author Name', 'purehearts' ),
				),
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'purehearts' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'purehearts' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
			),
		),
	),
);