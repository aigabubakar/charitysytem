<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'purehearts'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'purehearts' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'purehearts'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'purehearts' ),
			'desc'    => esc_html__( 'Enter the Preloader Text', 'purehearts' ),
			'default' => 'Purehearts',
		),
    ),
);
