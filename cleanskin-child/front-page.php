<?php
/**
 * The Front Page template file.
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( cleanskin_is_on( cleanskin_get_theme_option( 'front_page_enabled' ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$cleanskin_sections = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'front_page_sections' ), 1, false );
		if ( is_array( $cleanskin_sections ) ) {
			foreach ( $cleanskin_sections as $cleanskin_section ) {
				get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'front-page/section', $cleanskin_section ), $cleanskin_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'index' ) );
}

get_footer();
