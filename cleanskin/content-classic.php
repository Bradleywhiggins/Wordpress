<?php
/**
 * The Classic template to display the content
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
$cleanskin_expanded   = ! cleanskin_sidebar_present() && cleanskin_is_on( cleanskin_get_theme_option( 'expand_content' ) );
$cleanskin_animation  = cleanskin_get_theme_option( 'blog_animation' );
$cleanskin_components = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) );
$cleanskin_counters   = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) );

$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );

?><div class="
<?php
if ( ! empty( $cleanskin_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $cleanskin_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $cleanskin_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $cleanskin_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $cleanskin_columns )
					. ' post_layout_' . esc_attr( $cleanskin_blog_style[0] )
					. ' post_layout_' . esc_attr( $cleanskin_blog_style[0] ) . '_' . esc_attr( $cleanskin_columns )
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

	// Featured image
	$cleanskin_hover = ! empty( $cleanskin_template_args['hover'] ) && ! cleanskin_is_inherit( $cleanskin_template_args['hover'] )
						? $cleanskin_template_args['hover']
						: cleanskin_get_theme_option( 'image_hover' );
	cleanskin_show_post_featured(
		array(
			'thumb_size' => cleanskin_get_thumb_size(
				'classic' == $cleanskin_blog_style[0]
						? ( strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $cleanskin_columns > 2 ? 'big' : 'huge' )
								: ( $cleanskin_columns > 2
									? ( $cleanskin_expanded ? 'med' : 'small' )
									: ( $cleanskin_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $cleanskin_columns > 2 ? 'masonry-big' : 'full' )
								: ( $cleanskin_columns <= 2 && $cleanskin_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $cleanskin_hover,
			'no_links'   => ! empty( $cleanskin_template_args['no_links'] ),
			'singular'   => false,
		)
	);

	if ( ! in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'cleanskin_action_before_post_title' );

			// Post title
			if ( empty( $cleanskin_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'cleanskin_action_before_post_meta' );

			// Post meta
			if ( ! empty( $cleanskin_components ) && ! in_array( $cleanskin_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				cleanskin_show_post_meta(
					apply_filters(
						'cleanskin_filter_post_meta_args', array(
							'components' => $cleanskin_components,
							'counters'   => $cleanskin_counters,
							'seo'        => false,
						), $cleanskin_blog_style[0], $cleanskin_columns
					)
				);
			}

			do_action( 'cleanskin_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
	<?php
	if ( empty( $cleanskin_template_args['hide_excerpt'] ) ) {
		?>
			<div class="post_content_inner">
			<?php
			if ( has_excerpt() ) {
				the_excerpt();
			} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
				the_content( '' );
			} elseif ( in_array( $cleanskin_post_format, array( 'link', 'aside', 'status' ) ) ) {
				the_content();
			} elseif ( 'quote' == $cleanskin_post_format ) {
				$quote = cleanskin_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );
				if ( ! empty( $quote ) ) {
					cleanskin_show_layout( wpautop( $quote ) );
				} else {
					the_excerpt();
				}
			} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
				the_excerpt();
			}
			?>
			</div>
			<?php
	}
		// Post meta
	if ( in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		if ( ! empty( $cleanskin_components ) ) {
			cleanskin_show_post_meta(
				apply_filters(
					'cleanskin_filter_post_meta_args', array(
						'components' => $cleanskin_components,
						'counters'   => $cleanskin_counters,
					), $cleanskin_blog_style[0], $cleanskin_columns
				)
			);
		}
	}
		// More button
	if ( false && empty( $cleanskin_template_args['no_links'] ) && ! in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
			<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'cleanskin' ); ?></a></p>
			<?php
	}
	?>
	</div><!-- .entry-content -->

</article></div>
