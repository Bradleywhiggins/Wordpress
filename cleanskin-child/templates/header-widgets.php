<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

// Header sidebar
$cleanskin_header_name    = cleanskin_get_theme_option( 'header_widgets' );
$cleanskin_header_present = ! cleanskin_is_off( $cleanskin_header_name ) && is_active_sidebar( $cleanskin_header_name );
if ( $cleanskin_header_present ) {
	cleanskin_storage_set( 'current_sidebar', 'header' );
	$cleanskin_header_wide = cleanskin_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $cleanskin_header_name ) ) {
		dynamic_sidebar( $cleanskin_header_name );
	}
	$cleanskin_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $cleanskin_widgets_output ) ) {
		$cleanskin_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $cleanskin_widgets_output );
		$cleanskin_need_columns   = strpos( $cleanskin_widgets_output, 'columns_wrap' ) === false;
		if ( $cleanskin_need_columns ) {
			$cleanskin_columns = max( 0, (int) cleanskin_get_theme_option( 'header_columns' ) );
			if ( 0 == $cleanskin_columns ) {
				$cleanskin_columns = min( 6, max( 1, substr_count( $cleanskin_widgets_output, '<aside ' ) ) );
			}
			if ( $cleanskin_columns > 1 ) {
				$cleanskin_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $cleanskin_columns ) . ' widget', $cleanskin_widgets_output );
			} else {
				$cleanskin_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $cleanskin_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $cleanskin_header_wide ) {
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
				cleanskin_show_layout( $cleanskin_widgets_output );
				do_action( 'cleanskin_action_after_sidebar' );
				if ( $cleanskin_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $cleanskin_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
