<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

cleanskin_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	cleanskin_blog_archive_start();

	?><div class="posts_container">
		<?php

		$cleanskin_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
		$cleanskin_sticky_out = cleanskin_get_theme_option( 'sticky_style' ) == 'columns'
								&& is_array( $cleanskin_stickies ) && count( $cleanskin_stickies ) > 0 && get_query_var( 'paged' ) < 1;
		if ( $cleanskin_sticky_out ) {
			?>
			<div class="sticky_wrap columns_wrap">
			<?php
		}
		while ( have_posts() ) {
			the_post();
			if ( $cleanskin_sticky_out && ! is_sticky() ) {
				$cleanskin_sticky_out = false;
				?>
				</div>
				<?php
			}
			$cleanskin_part = $cleanskin_sticky_out && is_sticky() ? 'sticky' : 'excerpt';
			get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', $cleanskin_part ), $cleanskin_part );
		}
		if ( $cleanskin_sticky_out ) {
			$cleanskin_sticky_out = false;
			?>
			</div>
			<?php
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
