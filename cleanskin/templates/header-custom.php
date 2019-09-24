<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.06
 */

$cleanskin_header_css   = '';
$cleanskin_header_image = get_header_image();
$cleanskin_header_video = cleanskin_get_header_video();
if ( ! empty( $cleanskin_header_image ) && cleanskin_trx_addons_featured_image_override( is_singular() || cleanskin_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$cleanskin_header_image = cleanskin_get_current_mode_image( $cleanskin_header_image );
}

$cleanskin_header_id = str_replace( 'header-custom-', '', cleanskin_get_theme_option( 'header_style' ) );
if ( 0 == (int) $cleanskin_header_id ) {
	$cleanskin_header_id = cleanskin_get_post_id(
		array(
			'name'      => $cleanskin_header_id,
			'post_type' => defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts',
		)
	);
} else {
	$cleanskin_header_id = apply_filters( 'cleanskin_filter_get_translated_layout', $cleanskin_header_id );
}
$cleanskin_header_meta = get_post_meta( $cleanskin_header_id, 'trx_addons_options', true );
if ( ! empty( $cleanskin_header_meta['margin'] ) != '' ) {
	cleanskin_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( cleanskin_prepare_css_value( $cleanskin_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $cleanskin_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $cleanskin_header_id ) ) ); ?>
				<?php
				echo ! empty( $cleanskin_header_image ) || ! empty( $cleanskin_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'cleanskin_action_show_layout', $cleanskin_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
