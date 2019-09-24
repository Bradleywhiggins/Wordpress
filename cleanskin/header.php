<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( cleanskin_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'cleanskin_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$cleanskin_header_type = cleanskin_get_theme_option( 'header_type' );
			if ( 'custom' == $cleanskin_header_type && ! cleanskin_is_layouts_available() ) {
				$cleanskin_header_type = 'default';
			}
			get_template_part( apply_filters( 'cleanskin_filter_get_template_part', "templates/header-{$cleanskin_header_type}" ) );

			// Side menu
			if ( in_array( cleanskin_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'templates/header-navi-mobile' ) );
			?>

			<div class="page_content_wrap">

				<?php if ( cleanskin_get_theme_option( 'body_style' ) != 'fullscreen' ) { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					cleanskin_create_widgets_area( 'widgets_above_page' );
					?>

					<div class="content">
						<?php
						// Widgets area inside page content
						cleanskin_create_widgets_area( 'widgets_above_content' );
