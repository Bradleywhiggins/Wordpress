<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

cleanskin_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	cleanskin_blog_archive_start();

	$cleanskin_classes    = 'posts_container '
						. ( substr( cleanskin_get_theme_option( 'blog_style' ), 0, 7 ) == 'classic'
							? 'columns_wrap columns_padding_bottom'
							: 'masonry_wrap'
							);
	$cleanskin_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$cleanskin_sticky_out = cleanskin_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $cleanskin_stickies ) && count( $cleanskin_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $cleanskin_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $cleanskin_sticky_out ) {
		if ( cleanskin_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( cleanskin_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}

		?>
		<div class="<?php echo esc_attr( $cleanskin_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $cleanskin_sticky_out && ! is_sticky() ) {
			$cleanskin_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $cleanskin_classes ); ?>">
			<?php
		}
		$cleanskin_part = $cleanskin_sticky_out && is_sticky() ? 'sticky' : 'classic';
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', $cleanskin_part ), $cleanskin_part );
	}

	?>
	</div>
	<?php

	cleanskin_show_pagination();

	cleanskin_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
