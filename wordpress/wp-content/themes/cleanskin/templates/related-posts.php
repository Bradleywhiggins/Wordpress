<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

$cleanskin_link        = get_permalink();
$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item related_item_style_1 post_format_' . esc_attr( $cleanskin_post_format ) ); ?>>
	<?php
	cleanskin_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'cleanskin_filter_related_thumb_size', cleanskin_get_thumb_size( (int) cleanskin_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => cleanskin_get_theme_setting( 'allow_no_image' ),
			'singular'      => false,
			'post_info'     => '<div class="post_header entry-header">'
						. '<div class="post_categories">' . wp_kses_post( cleanskin_get_post_categories( '' ) ) . '</div>'
						. '<h6 class="post_title entry-title"><a href="' . esc_url( $cleanskin_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
						. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
								? '<span class="post_date"><a href="' . esc_url( $cleanskin_link ) . '">' . wp_kses_data( cleanskin_get_date() ) . '</a></span>'
								: '' )
					. '</div>',
		)
	);
	?>
</div>
