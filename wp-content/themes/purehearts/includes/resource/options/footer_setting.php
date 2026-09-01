<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'purehearts' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'purehearts' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'purehearts' ),
				'e' => esc_html__( 'Elementor', 'purehearts' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'purehearts' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'purehearts' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'purehearts' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'purehearts' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'card_icon_image_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Visa Card Image', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'card_link_v1',
			'type'    => 'text',
			'title'   => __( 'Visa Card Link', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'card_icon_image_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Master Card Image', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'card_link_v2',
			'type'    => 'text',
			'title'   => __( 'Master Card Link', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'card_icon_image_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Gift Card Image', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'card_link_v3',
			'type'    => 'text',
			'title'   => __( 'Gift Card Link', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'card_icon_image_v4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Ebay Card Image', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'card_link_v4',
			'type'    => 'text',
			'title'   => __( 'Ebay Card Link', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'card_icon_image_v5',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Paypal Card Image', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'card_link_v5',
			'type'    => 'text',
			'title'   => __( 'Paypal Card Link', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'purehearts' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
            'id'    => 'footer_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'purehearts' ),
            'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
