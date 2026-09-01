<?php
return array(
	'title'      => 'Purehearts Team Setting',
	'id'         => 'purehearts_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'purehearts_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'purehearts' ),
				),
				array(
					'id'    => 'team_phone',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'purehearts' ),
				),
				array(
					'id'    => 'team_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'purehearts' ),
				),
				array(
					'id'    => 'team_url',
					'type'  => 'text',
					'title' => esc_html__( 'Website Link', 'purehearts' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'purehearts' ),
				),
			),
		),
	),
);