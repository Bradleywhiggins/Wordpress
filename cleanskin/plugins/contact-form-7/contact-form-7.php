<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'cleanskin_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_cf7_theme_setup9', 9 );
	function cleanskin_cf7_theme_setup9() {

		add_filter( 'cleanskin_filter_merge_scripts', 'cleanskin_cf7_merge_scripts' );
		add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_cf7_merge_styles' );

		if ( cleanskin_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'cleanskin_cf7_frontend_scripts', 1100 );
		}

		if ( is_admin() ) {
			add_filter( 'cleanskin_filter_tgmpa_required_plugins', 'cleanskin_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'cleanskin_cf7_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('cleanskin_filter_tgmpa_required_plugins',	'cleanskin_cf7_tgmpa_required_plugins');
	function cleanskin_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( cleanskin_storage_isset( 'required_plugins', 'contact-form-7' ) ) {
			// CF7 plugin
			$list[] = array(
				'name'     => cleanskin_storage_get_array( 'required_plugins', 'contact-form-7' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
			// CF7 extension - datepicker
			if ( ! CLEANSKIN_THEME_FREE ) {
				$params = array(
					'name'     => esc_html__( 'Contact Form 7 Datepicker', 'cleanskin' ),
					'slug'     => 'contact-form-7-datepicker',
					'required' => false,
				);
				$path   = cleanskin_get_file_dir( 'plugins/contact-form-7/contact-form-7-datepicker.zip' );
				if ( '' != $path ) {
					$params['source'] = $path;
				}
				$list[] = $params;
			}
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'cleanskin_exists_cf7' ) ) {
	function cleanskin_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'cleanskin_cf7_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'cleanskin_cf7_frontend_scripts', 1100 );
	function cleanskin_cf7_frontend_scripts() {
		if ( cleanskin_exists_cf7() ) {
			if ( cleanskin_is_on( cleanskin_get_theme_option( 'debug_mode' ) ) ) {
				$cleanskin_url = cleanskin_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
				if ( '' != $cleanskin_url ) {
					wp_enqueue_script( 'cleanskin-cf7', $cleanskin_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'cleanskin_cf7_merge_scripts' ) ) {
	//Handler of the add_filter('cleanskin_filter_merge_scripts', 'cleanskin_cf7_merge_scripts');
	function cleanskin_cf7_merge_scripts( $list ) {
		if ( cleanskin_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/contact-form-7.js';
		}
		return $list;
	}
}

// Merge custom styles
if ( ! function_exists( 'cleanskin_cf7_merge_styles' ) ) {
	//Handler of the add_filter('cleanskin_filter_merge_styles', 'cleanskin_cf7_merge_styles');
	function cleanskin_cf7_merge_styles( $list ) {
		if ( cleanskin_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/_contact-form-7.scss';
		}
		return $list;
	}
}

