<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! cleanskin_is_inherit( cleanskin_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( cleanskin_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$cleanskin_copyright = cleanskin_get_theme_option( 'copyright' );
			if ( ! empty( $cleanskin_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$cleanskin_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $cleanskin_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$cleanskin_copyright = cleanskin_prepare_macros( $cleanskin_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $cleanskin_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
