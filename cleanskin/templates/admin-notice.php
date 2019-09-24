<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.1
 */

$cleanskin_theme_obj = wp_get_theme();
?>
<div class="cleanskin_admin_notice cleanskin_welcome_notice update-nag">
	<?php
	// Theme image
	$cleanskin_theme_img = cleanskin_get_file_url( 'screenshot.jpg' );
	if ( '' != $cleanskin_theme_img ) {
		?>
		<div class="cleanskin_notice_image"><img src="<?php echo esc_url( $cleanskin_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'cleanskin' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="cleanskin_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'cleanskin' ),
				$cleanskin_theme_obj->name . ( CLEANSKIN_THEME_FREE ? ' ' . __( 'Free', 'cleanskin' ) : '' ),
				$cleanskin_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="cleanskin_notice_text">
		<p class="cleanskin_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $cleanskin_theme_obj->description ) );
			?>
		</p>
		<p class="cleanskin_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'cleanskin' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="cleanskin_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=cleanskin_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'cleanskin' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="cleanskin_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="cleanskin_hide_notice_text"><?php esc_html_e( 'Dismiss', 'cleanskin' ); ?></span></a>
	</div>
</div>
