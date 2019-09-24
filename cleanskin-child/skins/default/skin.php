<?php
/**
 * Skins support: Main skin file for the skin 'Default'
 *
 * Setup skin-dependent fonts and colors, load scripts and styles,
 * and other operations that affect the appearance and behavior of the theme
 * when the skin is activated
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.46
 */


// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'cleanskin_skin_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_skin_theme_setup3', 3 );
	function cleanskin_skin_theme_setup3() {
		// ToDo: Add / Modify theme options, required plugins, etc.
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'cleanskin_skin_tgmpa_required_plugins' ) ) {
	add_filter( 'cleanskin_filter_tgmpa_required_plugins', 'cleanskin_skin_tgmpa_required_plugins' );
	function cleanskin_skin_tgmpa_required_plugins( $list = array() ) {
		// ToDo: Check if plugin is in the 'required_plugins' and add his parameters to the TGMPA-list
		//       Replace 'skin-specific-plugin-slug' to the real slug of the plugin
		if ( cleanskin_storage_isset( 'required_plugins', 'skin-specific-plugin-slug' ) ) {
			$list[] = array(
				'name'     => cleanskin_storage_get_array( 'required_plugins', 'skin-specific-plugin-slug' ),
				'slug'     => 'skin-specific-plugin-slug',
				'required' => false,
			);
		}
		return $list;
	}
}

// Enqueue skin-specific styles and scripts
if ( ! function_exists( 'cleanskin_skin_frontend_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'cleanskin_skin_frontend_scripts', 1100 );
	function cleanskin_skin_frontend_scripts() {
		if ( cleanskin_is_on( cleanskin_get_theme_option( 'debug_mode' ) ) ) {
			$cleanskin_url = cleanskin_get_file_url( CLEANSKIN_SKIN_DIR . 'skin.js' );
			if ( '' != $cleanskin_url ) {
				wp_enqueue_script( 'cleanskin-skin-' . esc_attr( CLEANSKIN_SKIN_NAME ), $cleanskin_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'cleanskin_skin_merge_styles' ) ) {
	add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_skin_merge_styles' );
	function cleanskin_skin_merge_styles( $list ) {
		if ( cleanskin_get_file_dir( CLEANSKIN_SKIN_DIR . '_skin.scss' ) != '' ) {
			$list[] = CLEANSKIN_SKIN_DIR . '_skin.scss';
		}
		return $list;
	}
}


// Merge responsive styles
if ( ! function_exists( 'cleanskin_skin_merge_styles_responsive' ) ) {
	add_filter( 'cleanskin_filter_merge_styles_responsive', 'cleanskin_skin_merge_styles_responsive' );
	function cleanskin_skin_merge_styles_responsive( $list ) {
		if ( cleanskin_get_file_dir( CLEANSKIN_SKIN_DIR . '_skin-responsive.scss' ) != '' ) {
			$list[] = CLEANSKIN_SKIN_DIR . '_skin-responsive.scss';
		}
		return $list;
	}
}

// Merge custom scripts
if ( ! function_exists( 'cleanskin_skin_merge_scripts' ) ) {
	add_filter( 'cleanskin_filter_merge_scripts', 'cleanskin_skin_merge_scripts' );
	function cleanskin_skin_merge_scripts( $list ) {
		if ( cleanskin_get_file_dir( CLEANSKIN_SKIN_DIR . 'skin.js' ) != '' ) {
			$list[] = CLEANSKIN_SKIN_DIR . 'skin.js';
		}
		return $list;
	}
}


// Add slin-specific colors and fonts to the custom CSS
require_once CLEANSKIN_THEME_DIR . CLEANSKIN_SKIN_DIR . 'skin-styles.php';

