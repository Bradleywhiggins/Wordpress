<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'cleanskin_wpml_get_css' ) ) {
	add_filter( 'cleanskin_filter_get_css', 'cleanskin_wpml_get_css', 10, 2 );
	function cleanskin_wpml_get_css( $css, $args ) {
		return $css;
	}
}

