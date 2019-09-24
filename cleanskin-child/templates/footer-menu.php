<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.10
 */

// Footer menu
$cleanskin_menu_footer = cleanskin_get_nav_menu(
	array(
		'location' => 'menu_footer',
		'class'    => 'sc_layouts_menu sc_layouts_menu_default',
	)
);
if ( ! empty( $cleanskin_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php cleanskin_show_layout( $cleanskin_menu_footer ); ?>
		</div>
	</div>
	<?php
}
