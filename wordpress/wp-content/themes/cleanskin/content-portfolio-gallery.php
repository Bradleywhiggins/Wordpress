<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

$cleanskin_template_args = get_query_var( 'cleanskin_template_args' );
if ( is_array( $cleanskin_template_args ) ) {
	$cleanskin_columns    = empty( $cleanskin_template_args['columns'] ) ? 2 : max( 2, $cleanskin_template_args['columns'] );
	$cleanskin_blog_style = array( $cleanskin_template_args['type'], $cleanskin_columns );
} else {
	$cleanskin_blog_style = explode( '_', cleanskin_get_theme_option( 'blog_style' ) );
	$cleanskin_columns    = empty( $cleanskin_blog_style[1] ) ? 2 : max( 2, $cleanskin_blog_style[1] );
}
$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );
$cleanskin_animation   = cleanskin_get_theme_option( 'blog_animation' );
$cleanskin_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_portfolio'
										. ' post_layout_gallery'
										. ' post_layout_gallery_' . esc_attr( $cleanskin_columns )
										. ' post_format_' . esc_attr( $cleanskin_post_format )
										. ( ! empty( $cleanskin_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! cleanskin_is_off( $cleanskin_animation ) && empty( $cleanskin_template_args['slider'] ) ? ' data-animation="' . esc_attr( cleanskin_get_animation_classes( $cleanskin_animation ) ) . '"' : '' );
									?>
	data-size="
	<?php
	if ( ! empty( $cleanskin_image[1] ) && ! empty( $cleanskin_image[2] ) ) {
		echo intval( $cleanskin_image[1] ) . 'x' . intval( $cleanskin_image[2] );}
	?>
	"
	data-src="
	<?php
	if ( ! empty( $cleanskin_image[0] ) ) {
		echo esc_url( $cleanskin_image[0] );}
	?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$cleanskin_image_hover = 'icon';  // !empty($cleanskin_template_args['hover']) && !cleanskin_is_inherit($cleanskin_template_args['hover']) ? $cleanskin_template_args['hover'] : cleanskin_get_theme_option('image_hover');
if ( in_array( $cleanskin_image_hover, array( 'icons', 'zoom' ) ) ) {
	$cleanskin_image_hover = 'dots';
}
	$cleanskin_components = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) );
	$cleanskin_counters   = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) );
	cleanskin_show_post_featured(
		array(
			'hover'         => $cleanskin_image_hover,
			'singular'      => false,
			'no_links'      => ! empty( $cleanskin_template_args['no_links'] ),
			'thumb_size'    => cleanskin_get_thumb_size( strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false || $cleanskin_columns < 3 ? 'masonry-big' : 'masonry' ),
			'thumb_only'    => true,
			'show_no_image' => true,
			'post_info'     => '<div class="post_details">'
							. '<h2 class="post_title">'
								. ( empty( $cleanskin_template_args['no_links'] )
									? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
									: esc_html( get_the_title() )
									)
							. '</h2>'
							. '<div class="post_description">'
								. ( ! empty( $cleanskin_components )
									? cleanskin_show_post_meta(
										apply_filters(
											'cleanskin_filter_post_meta_args', array(
												'components' => $cleanskin_components,
												'counters' => $cleanskin_counters,
												'seo'      => false,
												'echo'     => false,
											), $cleanskin_blog_style[0], $cleanskin_columns
										)
									)
									: ''
									)
								. ( empty( $cleanskin_template_args['hide_excerpt'] )
									? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
									: ''
									)
								. ( empty( $cleanskin_template_args['no_links'] )
									? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'cleanskin' ) . '</span></a>'
									: ''
									)
							. '</div>'
						. '</div>',
		)
	);
	?>
	</article>
