<?php
return array(
	'title'      => 'Purehearts Project Setting',
	'id'         => 'purehearts_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'purehearts_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'purehearts' ),
				),
			),
		),
	),
);