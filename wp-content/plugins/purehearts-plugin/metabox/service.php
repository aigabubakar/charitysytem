<?php
return array(
	'title'      => 'Purehearts Service Setting',
	'id'         => 'purehearts_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'purehearts_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'purehearts' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'purehearts' ),
				),
			),
		),
	),
);