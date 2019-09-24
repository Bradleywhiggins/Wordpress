<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

if ( cleanskin_sidebar_present() ) {
	ob_start();
	$cleanskin_sidebar_name = cleanskin_get_theme_option( 'sidebar_widgets' );
	cleanskin_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $cleanskin_sidebar_name ) ) {
		dynamic_sidebar( $cleanskin_sidebar_name );
	}
	$cleanskin_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $cleanskin_out ) ) {
		$cleanskin_sidebar_position = cleanskin_get_theme_option( 'sidebar_position' );
		?>
		<div class="sidebar widget_area
			<?php
			echo esc_attr( $cleanskin_sidebar_position );
			if ( ! cleanskin_is_inherit( cleanskin_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( cleanskin_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'cleanskin_action_before_sidebar' );
				cleanskin_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $cleanskin_out ) );
				do_action( 'cleanskin_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
