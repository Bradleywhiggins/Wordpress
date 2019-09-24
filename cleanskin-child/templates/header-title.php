<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

// Page (category, tag, archive, author) title

if ( cleanskin_need_page_title() ) {
	cleanskin_sc_layouts_showed( 'title', true );
	cleanskin_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								cleanskin_show_post_meta(
									apply_filters(
										'cleanskin_filter_post_meta_args', array(
											'components' => cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) ),
											'counters'   => cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) ),
											'seo'        => cleanskin_is_on( cleanskin_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$cleanskin_blog_title           = cleanskin_get_blog_title();
							$cleanskin_blog_title_text      = '';
							$cleanskin_blog_title_class     = '';
							$cleanskin_blog_title_link      = '';
							$cleanskin_blog_title_link_text = '';
							if ( is_array( $cleanskin_blog_title ) ) {
								$cleanskin_blog_title_text      = $cleanskin_blog_title['text'];
								$cleanskin_blog_title_class     = ! empty( $cleanskin_blog_title['class'] ) ? ' ' . $cleanskin_blog_title['class'] : '';
								$cleanskin_blog_title_link      = ! empty( $cleanskin_blog_title['link'] ) ? $cleanskin_blog_title['link'] : '';
								$cleanskin_blog_title_link_text = ! empty( $cleanskin_blog_title['link_text'] ) ? $cleanskin_blog_title['link_text'] : '';
							} else {
								$cleanskin_blog_title_text = $cleanskin_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $cleanskin_blog_title_class ); ?>">
								<?php
								$cleanskin_top_icon = cleanskin_get_category_icon();
								if ( ! empty( $cleanskin_top_icon ) ) {
									$cleanskin_attr = cleanskin_getimagesize( $cleanskin_top_icon );
									?>
									<img src="<?php echo esc_url( $cleanskin_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'cleanskin' ); ?>"
										<?php
										if ( ! empty( $cleanskin_attr[3] ) ) {
											cleanskin_show_layout( $cleanskin_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $cleanskin_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $cleanskin_blog_title_link ) && ! empty( $cleanskin_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $cleanskin_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $cleanskin_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs"><?php do_action( 'cleanskin_action_breadcrumbs' ); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
