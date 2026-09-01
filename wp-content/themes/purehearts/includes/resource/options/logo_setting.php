<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'purehearts' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'purehearts' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'purehearts' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Color Logo', 'purehearts'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Main Logo Image', 'purehearts' ),
			'subtitle' => esc_html__( 'Insert site Main logo image', 'purehearts' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Main Logo Dimentions', 'purehearts' ),
			'subtitle' => esc_html__( 'Select Main Logo Dimentions', 'purehearts' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Red Color Logo', 'purehearts'),
            'default' => true,
        ),
		array(
			'id'       => 'red_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Red Color Logo Image', 'purehearts' ),
			'subtitle' => esc_html__( 'Insert site Red Color logo image', 'purehearts' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'red_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Red Color Logo Dimentions', 'purehearts' ),
			'subtitle' => esc_html__( 'Select Red Color Logo Dimentions', 'purehearts' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
