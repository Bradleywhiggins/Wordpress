<div class="front_page_section front_page_section_subscribe<?php
			$cleanskin_scheme = cleanskin_get_theme_option( 'front_page_subscribe_scheme' );
if ( ! cleanskin_is_inherit( $cleanskin_scheme ) ) {
	echo ' scheme_' . esc_attr( $cleanskin_scheme );
}
			echo ' front_page_section_paddings_' . esc_attr( cleanskin_get_theme_option( 'front_page_subscribe_paddings' ) );
?>"
		<?php
		$cleanskin_css      = '';
		$cleanskin_bg_image = cleanskin_get_theme_option( 'front_page_subscribe_bg_image' );
		if ( ! empty( $cleanskin_bg_image ) ) {
			$cleanskin_css .= 'background-image: url(' . esc_url( cleanskin_get_attachment_url( $cleanskin_bg_image ) ) . ');';
		}
		if ( ! empty( $cleanskin_css ) ) {
			echo ' style="' . esc_attr( $cleanskin_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$cleanskin_anchor_icon = cleanskin_get_theme_option( 'front_page_subscribe_anchor_icon' );
	$cleanskin_anchor_text = cleanskin_get_theme_option( 'front_page_subscribe_anchor_text' );
if ( ( ! empty( $cleanskin_anchor_icon ) || ! empty( $cleanskin_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_subscribe"'
									. ( ! empty( $cleanskin_anchor_icon ) ? ' icon="' . esc_attr( $cleanskin_anchor_icon ) . '"' : '' )
									. ( ! empty( $cleanskin_anchor_text ) ? ' title="' . esc_attr( $cleanskin_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_subscribe_inner
	<?php
	if ( cleanskin_get_theme_option( 'front_page_subscribe_fullheight' ) ) {
		echo ' cleanskin-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$cleanskin_css      = '';
			$cleanskin_bg_mask  = cleanskin_get_theme_option( 'front_page_subscribe_bg_mask' );
			$cleanskin_bg_color_type = cleanskin_get_theme_option( 'front_page_subscribe_bg_color_type' );
			if ( 'custom' == $cleanskin_bg_color_type ) {
				$cleanskin_bg_color = cleanskin_get_theme_option( 'front_page_subscribe_bg_color' );
			} elseif ( 'scheme_bg_color' == $cleanskin_bg_color_type ) {
				$cleanskin_bg_color = cleanskin_get_scheme_color( 'bg_color' );
			} else {
				$cleanskin_bg_color = '';
			}
			if ( ! empty( $cleanskin_bg_color ) && $cleanskin_bg_mask > 0 ) {
				$cleanskin_css .= 'background-color: ' . esc_attr(
					1 == $cleanskin_bg_mask ? $cleanskin_bg_color : cleanskin_hex2rgba( $cleanskin_bg_color, $cleanskin_bg_mask )
				) . ';';
			}
			if ( ! empty( $cleanskin_css ) ) {
				echo ' style="' . esc_attr( $cleanskin_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_subscribe_content_wrap content_wrap">
			<?php
			// Caption
			$cleanskin_caption = cleanskin_get_theme_option( 'front_page_subscribe_caption' );
			if ( ! empty( $cleanskin_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_subscribe_caption front_page_block_<?php echo ! empty( $cleanskin_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $cleanskin_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$cleanskin_description = cleanskin_get_theme_option( 'front_page_subscribe_description' );
			if ( ! empty( $cleanskin_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_subscribe_description front_page_block_<?php echo ! empty( $cleanskin_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( wpautop( $cleanskin_description ) ); ?></div>
				<?php
			}

			// Content
			$cleanskin_sc = cleanskin_get_theme_option( 'front_page_subscribe_shortcode' );
			if ( ! empty( $cleanskin_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_subscribe_output front_page_block_<?php echo ! empty( $cleanskin_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					cleanskin_show_layout( do_shortcode( $cleanskin_sc ) );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
