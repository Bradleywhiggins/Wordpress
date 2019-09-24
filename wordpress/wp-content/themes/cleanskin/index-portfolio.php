<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

cleanskin_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	cleanskin_blog_archive_start();

	$cleanskin_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$cleanskin_sticky_out = cleanskin_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $cleanskin_stickies ) && count( $cleanskin_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$cleanskin_cat          = cleanskin_get_theme_option( 'parent_cat' );
	$cleanskin_post_type    = cleanskin_get_theme_option( 'post_type' );
	$cleanskin_taxonomy     = cleanskin_get_post_type_taxonomy( $cleanskin_post_type );
	$cleanskin_show_filters = cleanskin_get_theme_option( 'show_filters' );
	$cleanskin_tabs         = array();
	if ( ! cleanskin_is_off( $cleanskin_show_filters ) ) {
		$cleanskin_args           = array(
			'type'         => $cleanskin_post_type,
			'child_of'     => $cleanskin_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $cleanskin_taxonomy,
			'pad_counts'   => false,
		);
		$cleanskin_portfolio_list = get_terms( $cleanskin_args );
		if ( is_array( $cleanskin_portfolio_list ) && count( $cleanskin_portfolio_list ) > 0 ) {
			$cleanskin_tabs[ $cleanskin_cat ] = esc_html__( 'All', 'cleanskin' );
			foreach ( $cleanskin_portfolio_list as $cleanskin_term ) {
				if ( isset( $cleanskin_term->term_id ) ) {
					$cleanskin_tabs[ $cleanskin_term->term_id ] = $cleanskin_term->name;
				}
			}
		}
	}
	if ( count( $cleanskin_tabs ) > 0 ) {
		$cleanskin_portfolio_filters_ajax   = true;
		$cleanskin_portfolio_filters_active = $cleanskin_cat;
		$cleanskin_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters cleanskin_tabs cleanskin_tabs_ajax">
			<ul class="portfolio_titles cleanskin_tabs_titles">
				<?php
				foreach ( $cleanskin_tabs as $cleanskin_id => $cleanskin_title ) {
					?>
					<li><a href="<?php echo esc_url( cleanskin_get_hash_link( sprintf( '#%s_%s_content', $cleanskin_portfolio_filters_id, $cleanskin_id ) ) ); ?>" data-tab="<?php echo esc_attr( $cleanskin_id ); ?>"><?php echo esc_html( $cleanskin_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$cleanskin_ppp = cleanskin_get_theme_option( 'posts_per_page' );
			if ( cleanskin_is_inherit( $cleanskin_ppp ) ) {
				$cleanskin_ppp = '';
			}
			foreach ( $cleanskin_tabs as $cleanskin_id => $cleanskin_title ) {
				$cleanskin_portfolio_need_content = $cleanskin_id == $cleanskin_portfolio_filters_active || ! $cleanskin_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $cleanskin_portfolio_filters_id, $cleanskin_id ) ); ?>"
					class="portfolio_content cleanskin_tabs_content"
					data-blog-template="<?php echo esc_attr( cleanskin_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( cleanskin_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $cleanskin_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $cleanskin_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $cleanskin_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $cleanskin_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $cleanskin_cat ); ?>"
					data-need-content="<?php echo ( false === $cleanskin_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $cleanskin_portfolio_need_content ) {
						cleanskin_show_portfolio_posts(
							array(
								'cat'        => $cleanskin_id,
								'parent_cat' => $cleanskin_cat,
								'taxonomy'   => $cleanskin_taxonomy,
								'post_type'  => $cleanskin_post_type,
								'page'       => 1,
								'sticky'     => $cleanskin_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		cleanskin_show_portfolio_posts(
			array(
				'cat'        => $cleanskin_cat,
				'parent_cat' => $cleanskin_cat,
				'taxonomy'   => $cleanskin_taxonomy,
				'post_type'  => $cleanskin_post_type,
				'page'       => 1,
				'sticky'     => $cleanskin_sticky_out,
			)
		);
	}

	cleanskin_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
