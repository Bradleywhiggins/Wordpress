<div class="front_page_section front_page_section_woocommerce<?php
			$cleanskin_scheme = cleanskin_get_theme_option( 'front_page_woocommerce_scheme' );
if ( ! cleanskin_is_inherit( $cleanskin_scheme ) ) {
	echo ' scheme_' . esc_attr( $cleanskin_scheme );
}
			echo ' front_page_section_paddings_' . esc_attr( cleanskin_get_theme_option( 'front_page_woocommerce_paddings' ) );
?>"
		<?php
		$cleanskin_css      = '';
		$cleanskin_bg_image = cleanskin_get_theme_option( 'front_page_woocommerce_bg_image' );
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
	$cleanskin_anchor_icon = cleanskin_get_theme_option( 'front_page_woocommerce_anchor_icon' );
	$cleanskin_anchor_text = cleanskin_get_theme_option( 'front_page_woocommerce_anchor_text' );
if ( ( ! empty( $cleanskin_anchor_icon ) || ! empty( $cleanskin_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_woocommerce"'
									. ( ! empty( $cleanskin_anchor_icon ) ? ' icon="' . esc_attr( $cleanskin_anchor_icon ) . '"' : '' )
									. ( ! empty( $cleanskin_anchor_text ) ? ' title="' . esc_attr( $cleanskin_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_woocommerce_inner
	<?php
	if ( cleanskin_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
		echo ' cleanskin-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$cleanskin_css      = '';
			$cleanskin_bg_mask  = cleanskin_get_theme_option( 'front_page_woocommerce_bg_mask' );
			$cleanskin_bg_color_type = cleanskin_get_theme_option( 'front_page_woocommerce_bg_color_type' );
			if ( 'custom' == $cleanskin_bg_color_type ) {
				$cleanskin_bg_color = cleanskin_get_theme_option( 'front_page_woocommerce_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
			<?php
			// Content wrap with title and description
			$cleanskin_caption     = cleanskin_get_theme_option( 'front_page_woocommerce_caption' );
			$cleanskin_description = cleanskin_get_theme_option( 'front_page_woocommerce_description' );
			if ( ! empty( $cleanskin_caption ) || ! empty( $cleanskin_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $cleanskin_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $cleanskin_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses_post( $cleanskin_caption );
					?>
					</h2>
					<?php
				}

				// Description (text)
				if ( ! empty( $cleanskin_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $cleanskin_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses_post( wpautop( $cleanskin_description ) );
					?>
					</div>
					<?php
				}
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
			<?php
				$cleanskin_woocommerce_sc = cleanskin_get_theme_option( 'front_page_woocommerce_products' );
			if ( 'products' == $cleanskin_woocommerce_sc ) {
				$cleanskin_woocommerce_sc_ids      = cleanskin_get_theme_option( 'front_page_woocommerce_products_per_page' );
				$cleanskin_woocommerce_sc_per_page = count( explode( ',', $cleanskin_woocommerce_sc_ids ) );
			} else {
				$cleanskin_woocommerce_sc_per_page = max( 1, (int) cleanskin_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
			}
				$cleanskin_woocommerce_sc_columns = max( 1, min( $cleanskin_woocommerce_sc_per_page, (int) cleanskin_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
				echo do_shortcode(
					"[{$cleanskin_woocommerce_sc}"
									. ( 'products' == $cleanskin_woocommerce_sc
											? ' ids="' . esc_attr( $cleanskin_woocommerce_sc_ids ) . '"'
											: '' )
									. ( 'product_category' == $cleanskin_woocommerce_sc
											? ' category="' . esc_attr( cleanskin_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
											: '' )
									. ( 'best_selling_products' != $cleanskin_woocommerce_sc
											? ' orderby="' . esc_attr( cleanskin_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
												. ' order="' . esc_attr( cleanskin_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
											: '' )
									. ' per_page="' . esc_attr( $cleanskin_woocommerce_sc_per_page ) . '"'
									. ' columns="' . esc_attr( $cleanskin_woocommerce_sc_columns ) . '"'
					. ']'
				);
				?>
			</div>
		</div>
	</div>
</div>
