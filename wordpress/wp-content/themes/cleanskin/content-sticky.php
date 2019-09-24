<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

$cleanskin_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$cleanskin_post_format = get_post_format();
$cleanskin_post_format = empty( $cleanskin_post_format ) ? 'standard' : str_replace( 'post-format-', '', $cleanskin_post_format );
$cleanskin_animation   = cleanskin_get_theme_option( 'blog_animation' );

?><div class="column-1_<?php echo esc_attr( $cleanskin_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $cleanskin_post_format ) ); ?>
	<?php echo ( ! cleanskin_is_off( $cleanskin_animation ) ? ' data-animation="' . esc_attr( cleanskin_get_animation_classes( $cleanskin_animation ) ) . '"' : '' ); ?>
	>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	cleanskin_show_post_featured(
		array(
			'thumb_size' => cleanskin_get_thumb_size( 1 == $cleanskin_columns ? 'big' : ( 2 == $cleanskin_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $cleanskin_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			cleanskin_show_post_meta( apply_filters( 'cleanskin_filter_post_meta_args', array(), 'sticky', $cleanskin_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>
