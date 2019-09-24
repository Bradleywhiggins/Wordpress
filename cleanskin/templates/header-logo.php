<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

$cleanskin_args = get_query_var( 'cleanskin_logo_args' );

// Site logo
$cleanskin_logo_type   = isset( $cleanskin_args['type'] ) ? $cleanskin_args['type'] : '';
$cleanskin_logo_image  = cleanskin_get_logo_image( $cleanskin_logo_type );
$cleanskin_logo_text   = cleanskin_is_on( cleanskin_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$cleanskin_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $cleanskin_logo_image ) || ! empty( $cleanskin_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $cleanskin_logo_image ) ) {
			if ( empty( $cleanskin_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $cleanskin_logo_image > 0 ) {
				the_custom_logo();
			} else {
				$cleanskin_attr = cleanskin_getimagesize( $cleanskin_logo_image );
				echo '<img src="' . esc_url( $cleanskin_logo_image ) . '" alt="' . esc_attr( $cleanskin_logo_text ) . '"' . ( ! empty( $cleanskin_attr[3] ) ? ' ' . wp_kses_data( $cleanskin_attr[3] ) : '' ) . '>';
			}
		} else {
			cleanskin_show_layout( cleanskin_prepare_macros( $cleanskin_logo_text ), '<span class="logo_text">', '</span>' );
			cleanskin_show_layout( cleanskin_prepare_macros( $cleanskin_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
