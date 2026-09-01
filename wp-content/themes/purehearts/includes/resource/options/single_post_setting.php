<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'purehearts' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'purehearts' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'purehearts' ),
				'e' => esc_html__( 'Elementor', 'purehearts' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'purehearts' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'purehearts' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'purehearts' ),
			'default' => true,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'purehearts' ),
			'default' => true,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'purehearts' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'purehearts' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'purehearts' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'purehearts' ),
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





