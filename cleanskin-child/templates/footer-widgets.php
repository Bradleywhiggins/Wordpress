<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */

// Footer sidebar
$cleanskin_footer_name    = cleanskin_get_theme_option( 'footer_widgets' );
$cleanskin_footer_present = ! cleanskin_is_off( $cleanskin_footer_name ) && is_active_sidebar( $cleanskin_footer_name );
if ( $cleanskin_footer_present ) {
	cleanskin_storage_set( 'current_sidebar', 'footer' );
	$cleanskin_footer_wide = cleanskin_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $cleanskin_footer_name ) ) {
		dynamic_sidebar( $cleanskin_footer_name );
	}
	$cleanskin_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $cleanskin_out ) ) {
		$cleanskin_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $cleanskin_out );
		$cleanskin_need_columns = true;   //or check: strpos($cleanskin_out, 'columns_wrap')===false;
		if ( $cleanskin_need_columns ) {
			$cleanskin_columns = max( 0, (int) cleanskin_get_theme_option( 'footer_columns' ) );
			if ( 0 == $cleanskin_columns ) {
				$cleanskin_columns = min( 4, max( 1, substr_count( $cleanskin_out, '<aside ' ) ) );
			}
			if ( $cleanskin_columns > 1 ) {
				$cleanskin_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $cleanskin_columns ) . ' widget', $cleanskin_out );
			} else {
				$cleanskin_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $cleanskin_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $cleanskin_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $cleanskin_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'cleanskin_action_before_sidebar' );
				cleanskin_show_layout( $cleanskin_out );
				do_action( 'cleanskin_action_after_sidebar' );
				if ( $cleanskin_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $cleanskin_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
