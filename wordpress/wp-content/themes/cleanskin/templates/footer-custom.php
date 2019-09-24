<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */

$cleanskin_footer_id = str_replace( 'footer-custom-', '', cleanskin_get_theme_option( 'footer_style' ) );
if ( 0 == (int) $cleanskin_footer_id ) {
	$cleanskin_footer_id = cleanskin_get_post_id(
		array(
			'name'      => $cleanskin_footer_id,
			'post_type' => defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts',
		)
	);
} else {
	$cleanskin_footer_id = apply_filters( 'cleanskin_filter_get_translated_layout', $cleanskin_footer_id );
}
$cleanskin_footer_meta = get_post_meta( $cleanskin_footer_id, 'trx_addons_options', true );
if ( ! empty( $cleanskin_footer_meta['margin'] ) != '' ) {
	cleanskin_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( cleanskin_prepare_css_value( $cleanskin_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $cleanskin_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $cleanskin_footer_id ) ) ); ?>
						<?php
						if ( ! cleanskin_is_inherit( cleanskin_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( cleanskin_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'cleanskin_action_show_layout', $cleanskin_footer_id );
	?>
</footer><!-- /.footer_wrap -->
