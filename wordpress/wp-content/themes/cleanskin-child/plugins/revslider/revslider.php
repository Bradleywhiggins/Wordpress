<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'cleanskin_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_revslider_theme_setup9', 9 );
	function cleanskin_revslider_theme_setup9() {

		add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_revslider_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'cleanskin_filter_tgmpa_required_plugins', 'cleanskin_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'cleanskin_revslider_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('cleanskin_filter_tgmpa_required_plugins',	'cleanskin_revslider_tgmpa_required_plugins');
	function cleanskin_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( cleanskin_storage_isset( 'required_plugins', 'revslider' ) ) {
			$path = cleanskin_get_file_dir( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || cleanskin_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => cleanskin_storage_get_array( 'required_plugins', 'revslider' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'cleanskin_exists_revslider' ) ) {
	function cleanskin_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Merge custom styles
if ( ! function_exists( 'cleanskin_revslider_merge_styles' ) ) {
	//Handler of the add_filter('cleanskin_filter_merge_styles', 'cleanskin_revslider_merge_styles');
	function cleanskin_revslider_merge_styles( $list ) {
		if ( cleanskin_exists_revslider() ) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}

