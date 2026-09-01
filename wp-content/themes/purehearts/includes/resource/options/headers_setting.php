<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'purehearts' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'purehearts' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'purehearts' ),
				'e' => esc_html__( 'Elementor', 'purehearts' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'purehearts' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'purehearts' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'purehearts' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'purehearts' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'One Page Header Style', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'RTL Page Header Style', 'purehearts' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id' => 'show_header_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'purehearts' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'email_address_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'address_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'welcome_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Text', 'purehearts' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
            'id' => 'show_donate_btn',
            'type' => 'switch',
            'title' => esc_html__('Enable Donate Button', 'purehearts'),
            'default' => false,
            'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'purehearts' ),
			'required' => array( 'show_donate_btn', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'purehearts' ),
			'required' => array( 'show_donate_btn', '=', true ),
		),
		array(
			'id'      => 'vol_link',
			'type'    => 'text',
			'title'   => __( 'Volunteer Link', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
			'id'      => 'volunteer_text',
			'type'    => 'text',
			'title'   => __( 'Become Volunteer Text', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'purehearts' ),
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_cart_icon_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Shoping Cart Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_sidebar_icon_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sidebar Info Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'sidebar_info_title_v1',
			'type'    => 'text',
			'title'   => __( 'Sidebar Info Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v1', '=', true ),
		),
		array(
			'id'      => 'sidebar_info_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Text', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v1', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_title_v1',
			'type'    => 'text',
			'title'   => __( 'Sidebar Form Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v1', '=', true ),
		),
		array(
			'id'      => 'sidebar_contact_form_url_v1',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Contact Form 7 Url', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v1', '=', true ),
		),
		array(
			'id'      => 'info_title_v1',
			'type'    => 'text',
			'title'   => __( 'Mobile View Info Title', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
			
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_header_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'header_top_bar_menu_v2',
			'type'    => 'textarea',
			'title'   => __( 'TopBar Menu html', 'purehearts' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'purehearts' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'email_address_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'purehearts' ),
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
            'id' => 'show_donate_btn_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Donate Button', 'purehearts'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'donate_description_v2',
			'type'    => 'text',
			'title'   => __( 'Donate Button Description', 'purehearts' ),
			'required' => array( 'show_donate_btn_v2', '=', true ),
		),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Donate Button Text', 'purehearts' ),
			'required' => array( 'show_donate_btn_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Donate Button Link', 'purehearts' ),
			'required' => array( 'show_donate_btn_v2', '=', true ),
		),
		array(
			'id'      => 'volunteer_text_v2',
			'type'    => 'text',
			'title'   => __( 'Become Volunteer Text', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		array(
			'id'      => 'vol_link2',
			'type'    => 'text',
			'title'   => __( 'Volunteer Link', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id' => 'show_cart_icon_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Shoping Cart Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id' => 'show_sidebar_icon_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sidebar Info Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'sidebar_info_title_v2',
			'type'    => 'text',
			'title'   => __( 'Sidebar Info Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v2', '=', true ),
		),
		array(
			'id'      => 'sidebar_info_text_v2',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Text', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v2', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_title_v2',
			'type'    => 'text',
			'title'   => __( 'Sidebar Form Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v2', '=', true ),
		),
		array(
			'id'      => 'sidebar_contact_form_url_v2',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Contact Form 7 Url', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v2', '=', true ),
		),
		array(
			'id'      => 'info_title_v2',
			'type'    => 'text',
			'title'   => __( 'Mobile View Info Title', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'One Page Header Style Settings', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
            'id' => 'show_header_topbar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'phone_no_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'purehearts' ),
			'required' => array( 'show_header_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'email_address_v3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'address_v3',
			'type'    => 'text',
			'title'   => __( 'Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'welcome_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Text', 'purehearts' ),
			'required' => array( 'show_header_topbar_v3', '=', true ),
		),
		array(
            'id' => 'show_donate_btn_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Donate Button', 'purehearts'),
            'default' => false,
            'required' => array( 'show_header_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'purehearts' ),
			'required' => array( 'show_donate_btn_v3', '=', true ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'purehearts' ),
			'required' => array( 'show_donate_btn_v3', '=', true ),
		),
		array(
			'id'      => 'volunteer_text_v3',
			'type'    => 'text',
			'title'   => __( 'Become Volunteer Text', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'vol_link3',
			'type'    => 'text',
			'title'   => __( 'Volunteer Link', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
            'id'    => 'header_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'purehearts' ),
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_cart_icon_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Shoping Cart Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_sidebar_icon_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sidebar Info Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'sidebar_info_title_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Info Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v3', '=', true ),
		),
		array(
			'id'      => 'sidebar_info_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Text', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v3', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_title_v3',
			'type'    => 'text',
			'title'   => __( 'Sidebar Form Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v3', '=', true ),
		),
		array(
			'id'      => 'sidebar_contact_form_url_v3',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Contact Form 7 Url', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v3', '=', true ),
		),
		array(
			'id'      => 'info_title_v3',
			'type'    => 'text',
			'title'   => __( 'Mobile View Info Title', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'RTL Page Header Style Settings', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
            'id' => 'show_header_topbar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'phone_no_v4',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'purehearts' ),
			'required' => array( 'show_header_topbar_v4', '=', true ),
		),
		array(
			'id'      => 'email_address_v4',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v4', '=', true ),
		),
		array(
			'id'      => 'address_v4',
			'type'    => 'text',
			'title'   => __( 'Address', 'purehearts' ),
			'required' => array( 'show_header_topbar_v4', '=', true ),
		),
		array(
			'id'      => 'welcome_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Text', 'purehearts' ),
			'required' => array( 'show_header_topbar_v4', '=', true ),
		),
		array(
            'id' => 'show_donate_btn_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable Donate Button', 'purehearts'),
            'default' => false,
            'required' => array( 'show_header_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'purehearts' ),
			'required' => array( 'show_donate_btn_v4', '=', true ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'purehearts' ),
			'required' => array( 'show_donate_btn_v4', '=', true ),
		),
		array(
			'id'      => 'volunteer_text_v4',
			'type'    => 'text',
			'title'   => __( 'Become Volunteer Text', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
			'id'      => 'vol_link4',
			'type'    => 'text',
			'title'   => __( 'Volunteer Link', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
            'id'    => 'header_social_share_v4',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'purehearts' ),
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_seach_form_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_cart_icon_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Shoping Cart Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_sidebar_icon_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sidebar Info Icon', 'purehearts'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'sidebar_info_title_v4',
			'type'    => 'text',
			'title'   => __( 'Sidebar Info Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v4', '=', true ),
		),
		array(
			'id'      => 'sidebar_info_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Text', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v4', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_title_v4',
			'type'    => 'text',
			'title'   => __( 'Sidebar Form Title', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v4', '=', true ),
		),
		array(
			'id'      => 'sidebar_contact_form_url_v4',
			'type'    => 'textarea',
			'title'   => __( 'Sidebar Info Contact Form 7 Url', 'purehearts' ),
			'required' => array( 'show_sidebar_icon_v4', '=', true ),
		),
		array(
			'id'      => 'info_title_v4',
			'type'    => 'text',
			'title'   => __( 'Mobile View Info Title', 'purehearts' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
