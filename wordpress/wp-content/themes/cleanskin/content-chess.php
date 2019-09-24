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
	$cleanskin_columns    = empty( $cleanskin_template_args['columns'] ) ? 1 : max( 1, min( 3, $cleanskin_template_args['columns'] ) );
	$cleanskin_blog_style = array( $cleanskin_template_args['type'], $cleanskin_columns );
} else {
	$cleanskin_blog_style = explode( '_', cleanskin_get_theme_option( 'blog_style' ) );
	$cleanskin_columns    = empty( $cleanskin_blog_style[1] ) ? 1 : max( 1, min( 3, $cleanskin_blog_style[1] ) );
}
$cleanskin_expanded    = ! cleanskin_sidebar_present() && cleanskin_is_on( cleanskin_get_theme_option( 'expand_content' ) );
$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );
$cleanskin_animation   = cleanskin_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $cleanskin_columns )
										. ' post_format_' . esc_attr( $cleanskin_post_format )
										. ( ! empty( $cleanskin_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! cleanskin_is_off( $cleanskin_animation ) && empty( $cleanskin_template_args['slider'] ) ? ' data-animation="' . esc_attr( cleanskin_get_animation_classes( $cleanskin_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $cleanskin_columns && ! is_array( $cleanskin_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . esc_attr( get_the_title() ) . '" icon="' . esc_attr( cleanskin_get_post_icon() ) . '"]' );
	}

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
			'class'         => 1 == $cleanskin_columns && ! is_array( $cleanskin_template_args ) ? 'cleanskin-full-height' : '',
			'singular'      => false,
			'hover'         => $cleanskin_hover,
			'no_links'      => ! empty( $cleanskin_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_bg'      => true,
			'thumb_size'    => cleanskin_get_thumb_size(
				strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $cleanskin_columns ? 'huge' : 'original' )
										: ( 2 < $cleanskin_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'cleanskin_action_before_post_title' );

			// Post title
		if ( empty( $cleanskin_template_args['no_links'] ) ) {
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( '<h3 class="post_title entry-title">', '</h3>' );
		}

			do_action( 'cleanskin_action_before_post_meta' );

			// Post meta
			$cleanskin_components = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) );
			$cleanskin_counters   = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) );
			$cleanskin_post_meta  = empty( $cleanskin_components ) || in_array( $cleanskin_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: cleanskin_show_post_meta(
											apply_filters(
												'cleanskin_filter_post_meta_args', array(
													'components' => $cleanskin_components,
													'counters' => $cleanskin_counters,
													'seo'  => false,
													'echo' => false,
												), $cleanskin_blog_style[0], $cleanskin_columns
											)
										);
			cleanskin_show_layout( $cleanskin_post_meta );
			?>
		</div><!-- .entry-header -->

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
			cleanskin_show_layout( $cleanskin_post_meta );
		}
			// More button
		if ( empty( $cleanskin_template_args['no_links'] ) && ! in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			?>
				<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'cleanskin' ); ?></a></p>
				<?php
		}
		?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>
