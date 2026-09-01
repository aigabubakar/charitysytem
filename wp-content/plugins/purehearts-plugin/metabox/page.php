<?php
return array(
	'title'      => 'Purehearts Setting',
	'id'         => 'purehearts_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'project', 'campaign', 'tribe_events', 'service', 'product'),
	'sections'   => array(
		require_once PUREHEARTSPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once PUREHEARTSPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once PUREHEARTSPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once PUREHEARTSPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);