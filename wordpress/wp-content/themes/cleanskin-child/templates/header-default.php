<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

$cleanskin_header_css   = '';
$cleanskin_header_image = get_header_image();
$cleanskin_header_video = cleanskin_get_header_video();
if ( ! empty( $cleanskin_header_image ) && cleanskin_trx_addons_featured_image_override( is_singular() || cleanskin_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$cleanskin_header_image = cleanskin_get_current_mode_image( $cleanskin_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $cleanskin_header_image ) || ! empty( $cleanskin_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $cleanskin_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $cleanskin_header_image ) {
		echo ' ' . esc_attr( cleanskin_add_inline_css_class( 'background-image: url(' . esc_url( $cleanskin_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( cleanskin_is_on( cleanskin_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight cleanskin-full-height';
	}
	if ( ! cleanskin_is_inherit( cleanskin_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( cleanskin_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $cleanskin_header_video ) ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( cleanskin_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( cleanskin_is_on( cleanskin_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-title' ) );

	// Header widgets area
	get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-widgets' ) );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-single' ) );

	?>
</header>
