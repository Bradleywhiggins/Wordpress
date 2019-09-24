<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_portfolio'
										. ' post_layout_portfolio_' . esc_attr( $cleanskin_columns )
										. ' post_format_' . esc_attr( $cleanskin_post_format )
										. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
										. ( ! empty( $cleanskin_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! cleanskin_is_off( $cleanskin_animation ) && empty( $cleanskin_template_args['slider'] ) ? ' data-animation="' . esc_attr( cleanskin_get_animation_classes( $cleanskin_animation ) ) . '"' : '' );
									?>
	>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$cleanskin_image_hover = ! empty( $cleanskin_template_args['hover'] ) && ! cleanskin_is_inherit( $cleanskin_template_args['hover'] )
								? $cleanskin_template_args['hover']
								: cleanskin_get_theme_option( 'image_hover' );
	// Featured image
	cleanskin_show_post_featured(
		array(
			'singular'      => false,
			'hover'         => $cleanskin_image_hover,
			'no_links'      => ! empty( $cleanskin_template_args['no_links'] ),
			'thumb_size'    => cleanskin_get_thumb_size(
				strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false || $cleanskin_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $cleanskin_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $cleanskin_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article>
