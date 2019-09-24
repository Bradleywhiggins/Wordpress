<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'cleanskin_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_essential_grid_theme_setup9', 9 );
	function cleanskin_essential_grid_theme_setup9() {

		add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_essential_grid_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'cleanskin_filter_tgmpa_required_plugins', 'cleanskin_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'cleanskin_essential_grid_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('cleanskin_filter_tgmpa_required_plugins',	'cleanskin_essential_grid_tgmpa_required_plugins');
	function cleanskin_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( cleanskin_storage_isset( 'required_plugins', 'essential-grid' ) ) {
			$path = cleanskin_get_file_dir( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || cleanskin_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => cleanskin_storage_get_array( 'required_plugins', 'essential-grid' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'cleanskin_exists_essential_grid' ) ) {
	function cleanskin_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Merge custom styles
if ( ! function_exists( 'cleanskin_essential_grid_merge_styles' ) ) {
	//Handler of the add_filter('cleanskin_filter_merge_styles', 'cleanskin_essential_grid_merge_styles');
	function cleanskin_essential_grid_merge_styles( $list ) {
		if ( cleanskin_exists_essential_grid() ) {
			$list[] = 'plugins/essential-grid/_essential-grid.scss';
		}
		return $list;
	}
}

