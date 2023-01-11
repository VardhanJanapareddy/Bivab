<?php
return array(
	'title'      => 'Bluebell Setting',
	'id'         => 'bluebell_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'project', 'product', 'tribe_events', 'service', 'hb_booking', 'hb_room' ),
	'sections'   => array(
		require_once BLUEBELLPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once BLUEBELLPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once BLUEBELLPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once BLUEBELLPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);