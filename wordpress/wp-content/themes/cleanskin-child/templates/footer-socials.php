<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */


// Socials
if ( cleanskin_is_on( cleanskin_get_theme_option( 'socials_in_footer' ) ) ) {
	$cleanskin_output = cleanskin_get_socials_links();
	if ( '' != $cleanskin_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php cleanskin_show_layout( $cleanskin_output ); ?>
			</div>
		</div>
		<?php
	}
}
