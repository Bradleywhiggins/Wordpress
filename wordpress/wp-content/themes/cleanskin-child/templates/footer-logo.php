<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */

// Logo
if ( cleanskin_is_on( cleanskin_get_theme_option( 'logo_in_footer' ) ) ) {
	$cleanskin_logo_image = cleanskin_get_logo_image( 'footer' );
	$cleanskin_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $cleanskin_logo_image ) || ! empty( $cleanskin_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $cleanskin_logo_image ) ) {
					$cleanskin_attr = cleanskin_getimagesize( $cleanskin_logo_image );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $cleanskin_logo_image ) . '"'
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'cleanskin' ) . '"'
								. ( ! empty( $cleanskin_attr[3] ) ? ' ' . wp_kses_data( $cleanskin_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $cleanskin_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $cleanskin_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
