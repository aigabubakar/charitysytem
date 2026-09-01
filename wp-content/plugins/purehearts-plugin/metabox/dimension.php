<?php
	return array(
		'title'      => 'purehearts post Setting',
		'id'         => 'purehearts_post',
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
						'title' => esc_html__('Quote Description', 'purehearts'),
					),
				),
			),
		),
	);


?>