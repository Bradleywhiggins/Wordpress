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
<div class="cleanskin_admin_notice cleanskin_rate_notice update-nag">
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
	<h3 class="cleanskin_notice_title"><a href="<?php echo esc_url( cleanskin_storage_get( 'theme_download_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'cleanskin' ),
				$cleanskin_theme_obj->name . ( CLEANSKIN_THEME_FREE ? ' ' . __( 'Free', 'cleanskin' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="cleanskin_notice_text">
		<p><?php echo wp_kses_data( __( 'We are glad you chose our WP theme for your website. You&#39;ve done well customizing your website and we hope that you&#39;ve enjoyed working with our theme.', 'cleanskin' ) ); ?></p>
		<p><?php echo wp_kses_data( __( 'It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you&#39;ve received from us.', 'cleanskin' ) ); ?></p>
		<p class="cleanskin_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving 5-star ratings, because our CEO Henry Rise gives $5 to homeless dog shelter for every 5-star rating we get! Save the planet with us!', 'cleanskin' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="cleanskin_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( cleanskin_storage_get( 'theme_download_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'cleanskin' ), $cleanskin_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( cleanskin_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'cleanskin' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( cleanskin_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'cleanskin' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="cleanskin_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="cleanskin_hide_notice_text"><?php esc_html_e( 'Dismiss', 'cleanskin' ); ?></span></a>
	</div>
</div>
