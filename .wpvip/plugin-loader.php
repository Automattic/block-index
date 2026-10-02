<?php

defined( 'ABSPATH' ) || die();

if ( ! defined( 'WP_TESTS_DOMAIN' ) && function_exists( 'wpcom_vip_load_plugin' ) ) {
	if ( ! defined( 'VIP_BLOCK_INDEX_CONFIG' ) ) {
		// Mirror the VIP platform: runtime config is defined before the plugin loads.
		// A git-ignored fixtures/config-local.php overrides the committed fixture —
		// handy for local secrets and experiments (see fixtures/README.md).
		$vip_block_index_fixtures = WP_CONTENT_DIR . '/plugins/block-index/fixtures';
		define(
			'VIP_BLOCK_INDEX_CONFIG',
			file_exists( $vip_block_index_fixtures . '/config-local.php' )
				? require $vip_block_index_fixtures . '/config-local.php'
				: require $vip_block_index_fixtures . '/config-valid.php'
		);
		unset( $vip_block_index_fixtures );
	}

	wpcom_vip_load_plugin( 'block-index/block-index.php' );
}
