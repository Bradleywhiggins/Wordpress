<?php
/**
 * The default template to display the content
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
	if ( ! empty( $cleanskin_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $cleanskin_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $cleanskin_columns ); ?>">
		<?php
	}
}
$cleanskin_expanded    = ! cleanskin_sidebar_present() && cleanskin_is_on( cleanskin_get_theme_option( 'expand_content' ) );
$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );
$cleanskin_animation   = cleanskin_get_theme_option( 'blog_animation' );

?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $cleanskin_post_format ) ); ?>
	<?php echo ( ! cleanskin_is_off( $cleanskin_animation ) && empty( $cleanskin_template_args['slider'] ) ? ' data-animation="' . esc_attr( cleanskin_get_animation_classes( $cleanskin_animation ) ) . '"' : '' ); ?>
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
			'singular'   => false,
			'no_links'   => ! empty( $cleanskin_template_args['no_links'] ),
			'hover'      => $cleanskin_hover,
			'thumb_size' => cleanskin_get_thumb_size( strpos( cleanskin_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $cleanskin_expanded ? 'huge' : 'big' ) ),
		)
	);

	// Title and post meta
	if ( get_the_title() != '' ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'cleanskin_action_before_post_title' );

			// Post title
			if ( empty( $cleanskin_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}			
			?>
		</div><!-- .post_header -->
		<?php
	}
	do_action( 'cleanskin_action_before_post_meta' );

	// Post meta
	$cleanskin_components = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) );
	$cleanskin_counters   = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) );

	if ( ! empty( $cleanskin_components ) && ! in_array( $cleanskin_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
		cleanskin_show_post_meta(
			apply_filters(
				'cleanskin_filter_post_meta_args', array(
					'components' => $cleanskin_components,
					'counters'   => $cleanskin_counters,
					'seo'        => false,
				), 'excerpt', 1
			)
		);
	}
	// Post content
	if ( empty( $cleanskin_template_args['hide_excerpt'] ) ) {

		?>
		<div class="post_content entry-content">
		<?php
		if ( cleanskin_get_theme_option( 'blog_content' ) == 'fullpost' ) {
			// Post content area
			?>
				<div class="post_content_inner"><?php the_content( '' ); ?></div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'cleanskin' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'cleanskin' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
		} else {
			// Post content area
			?>
				<div class="post_content_inner"><?php
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
				?></div>
				<?php
				// More button
				if ( empty( $cleanskin_template_args['no_links'] ) && ! in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					?>
					<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read more', 'cleanskin' ); ?></a></p>
					<?php
				}
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
	</article>
<?php

if ( is_array( $cleanskin_template_args ) ) {
	if ( ! empty( $cleanskin_template_args['slider'] ) || $cleanskin_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
