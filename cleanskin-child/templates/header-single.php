<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

if ( get_query_var( 'cleanskin_header_image' ) == '' && cleanskin_trx_addons_featured_image_override( is_singular() && has_post_thumbnail() && in_array( get_post_type(), array( 'post', 'page' ) ) ) ) {
	$cleanskin_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if ( ! empty( $cleanskin_src[0] ) ) {
		cleanskin_sc_layouts_showed( 'featured', true );
		?>
		<div class="sc_layouts_featured with_image without_content <?php echo esc_attr( cleanskin_add_inline_css_class( 'background-image:url(' . esc_url( $cleanskin_src[0] ) . ');' ) ); ?>"></div>
		<?php
	}
}
