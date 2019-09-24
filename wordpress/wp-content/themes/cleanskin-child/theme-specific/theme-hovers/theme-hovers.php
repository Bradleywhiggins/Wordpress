<?php
/**
 * Generate custom CSS for theme hovers
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

/* Theme init priorities: */
/* 3 - add/remove Theme Options elements */
if ( ! function_exists( 'cleanskin_hovers_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_hovers_theme_setup3', 3 );
	function cleanskin_hovers_theme_setup3() {

		/* Add 'Buttons hover' option */
		cleanskin_storage_set_array_after(
			'options', 'border_radius', array(
				'button_hover' => array(
					'title'   => esc_html__( "Button's hover", 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select hover effect to decorate all theme buttons', 'cleanskin' ) ),
					'std'     => 'slide_left',
					'options' => array(
						'default'      => esc_html__( 'Fade', 'cleanskin' ),
						'slide_left'   => esc_html__( 'Slide from Left', 'cleanskin' ),
			/*                  'arrow'         => esc_html__('Arrow',              'cleanskin'), */
					),
					'type'    => 'select',
				),
				'image_hover'  => array(
					'title'    => esc_html__( "Image's hover", 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select hover effect to decorate all theme images', 'cleanskin' ) ),
					'std'      => 'dots',
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'options'  => cleanskin_get_list_hovers(),
					'type'     => 'select',
				),
			)
		);
	}
}

/* Theme init priorities: */
/* 9 - register other filters (for installer, etc.) */
if ( ! function_exists( 'cleanskin_hovers_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_hovers_theme_setup9', 9 );
	function cleanskin_hovers_theme_setup9() {
		add_action( 'wp_enqueue_scripts', 'cleanskin_hovers_frontend_scripts', 1010 );
		add_filter( 'cleanskin_filter_localize_script', 'cleanskin_hovers_localize_script' );
		add_filter( 'cleanskin_filter_merge_scripts', 'cleanskin_hovers_merge_scripts' );
		add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_hovers_merge_styles' );
		add_filter( 'cleanskin_filter_merge_styles_responsive', 'cleanskin_hovers_merge_styles_responsive' );
		add_filter( 'cleanskin_filter_get_css', 'cleanskin_hovers_get_css', 10, 2 );
	}
}

/* Enqueue hover styles and scripts */
if ( ! function_exists( 'cleanskin_hovers_frontend_scripts' ) ) {
	/* Handler of the add_action( 'wp_enqueue_scripts', 'cleanskin_hovers_frontend_scripts', 1010 ); */
	function cleanskin_hovers_frontend_scripts() {
		if ( cleanskin_is_on( cleanskin_get_theme_option( 'debug_mode' ) ) ) {
			$cleanskin_url = cleanskin_get_file_url( 'theme-specific/theme-hovers/theme-hovers.js' );
			if ( '' != $cleanskin_url ) {
				wp_enqueue_script( 'cleanskin-hovers', $cleanskin_url, array( 'jquery' ), null, true );
			}
		}
	}
}

/* Merge hover effects into single css */
if ( ! function_exists( 'cleanskin_hovers_merge_styles' ) ) {
	/*Handler of the add_filter( 'cleanskin_filter_merge_styles', 'cleanskin_hovers_merge_styles' ); */
	function cleanskin_hovers_merge_styles( $list ) {
		$list[] = 'theme-specific/theme-hovers/_theme-hovers.scss';
		return $list;
	}
}

/* Merge hover effects to the single css (responsive) */
if ( ! function_exists( 'cleanskin_hovers_merge_styles_responsive' ) ) {
	/* Handler of the add_filter( 'cleanskin_filter_merge_styles_responsive', 'cleanskin_hovers_merge_styles_responsive' ); */
	function cleanskin_hovers_merge_styles_responsive( $list ) {
		$list[] = 'theme-specific/theme-hovers/_theme-hovers-responsive.scss';
		return $list;
	}
}

/* Add hover effect's vars to the localize array */
if ( ! function_exists( 'cleanskin_hovers_localize_script' ) ) {
	/* Handler of the add_filter( 'cleanskin_filter_localize_script','cleanskin_hovers_localize_script' ); */
	function cleanskin_hovers_localize_script( $arr ) {
		$arr['button_hover'] = cleanskin_get_theme_option( 'button_hover' );
		return $arr;
	}
}

/* Merge hover effects to the single js */
if ( ! function_exists( 'cleanskin_hovers_merge_scripts' ) ) {
	/* Handler of the add_filter( 'cleanskin_filter_merge_scripts', 'cleanskin_hovers_merge_scripts' ); */
	function cleanskin_hovers_merge_scripts( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers.js';
		return $list;
	}
}

/* Add hover icons on the featured image */
if ( ! function_exists( 'cleanskin_hovers_add_icons' ) ) {
	function cleanskin_hovers_add_icons( $hover, $args = array() ) {

		/* Additional parameters */
		$args = array_merge(
			array(
				'cat'      => '',
				'image'    => null,
				'no_links' => false,
			), $args
		);

		$post_link = empty( $args['no_links'] ) ? get_permalink() : '';
		$no_link   = 'javascript:void(0)';

		if ( in_array( $hover, array( 'icons', 'zoom' ) ) ) {
			/* Hover style 'Icons and 'Zoom' */
			if ( $args['image'] ) {
				$large_image = $args['image'];
			} else {
				$attachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 'masonry-big' );
				if ( ! empty( $attachment[0] ) ) {
					$large_image = $attachment[0];
				}
			}
			?>
			<div class="icons">
				<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" aria-hidden="true" class="icon-link
									<?php
									if ( empty( $large_image ) ) {
										echo ' single_icon';}
									?>
				"></a>
				<?php if ( ! empty( $large_image ) ) { ?>
				<a href="<?php echo esc_url( $large_image ); ?>" aria-hidden="true" class="icon-search" title="<?php echo esc_attr( get_the_title() ); ?>"></a>
				<?php } ?>
			</div>
			<?php

		} elseif ( 'shop' == $hover || 'shop_buttons' == $hover ) {
			/* Hover style 'Shop' */
			global $product;
			?>
			<div class="icons">
				<?php
				if ( ! is_object( $args['cat'] ) ) {
					cleanskin_show_layout(
						apply_filters(
							'woocommerce_loop_add_to_cart_link',
							'<a rel="nofollow" href="' . esc_url( $product->add_to_cart_url() ) . '" 
														aria-hidden="true" 
														data-quantity="1" 
														data-product_id="' . esc_attr( $product->is_type( 'variation' ) ? $product->get_parent_id() : $product->get_id() ) . '"
														data-product_sku="' . esc_attr( $product->get_sku() ) . '"
														class="shop_cart icon-cart-2 button add_to_cart_button'
																. ' product_type_' . $product->get_type()
																. ' product_' . ( $product->is_purchasable() && $product->is_in_stock() ? 'in' : 'out' ) . '_stock'
																. ( $product->supports( 'ajax_add_to_cart' ) ? ' ajax_add_to_cart' : '' )
																. '">'
											. ( 'shop_buttons' == $hover ? ( $product->is_type( 'variable' ) ? esc_html__( 'Select options', 'cleanskin' ) : esc_html__( 'Buy now', 'cleanskin' ) ) : '' )
										. '</a>',
							$product
						)
					);
				}
				?>
				<a href="<?php echo esc_url( is_object( $args['cat'] ) ? get_term_link( $args['cat']->slug, 'product_cat' ) : get_permalink() ); ?>" aria-hidden="true" class="shop_link button icon-link">
				<?php
				if ( 'shop_buttons' == $hover ) {
					if ( is_object( $args['cat'] ) ) {
						esc_html_e( 'View products', 'cleanskin' );
					} else {
						esc_html_e( 'Details', 'cleanskin' );
					}
				}
				?>
				</a>
			</div>
			<?php

		} elseif ( 'icon' == $hover ) {
			// Hover style 'Icon'
			?>
			<div class="icons"><a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" aria-hidden="true" class="icon-search-alt"></a></div>
			<?php

		} elseif ( 'dots' == $hover ) {
			// Hover style 'Dots'
			?>
			<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : $no_link; ?>" aria-hidden="true" class="icons"><span></span><span></span><span></span></a>
			<?php

		} elseif ( in_array( $hover, array( 'fade', 'pull', 'slide', 'border' ) ) ) {
			// Hover style 'Fade', 'Slide', 'Pull', 'Border'
			?>
			<div class="post_info">
				<div class="post_info_back">
					<h4 class="post_title">
					<?php
					if ( ! empty( $post_link ) ) {
						?>
							<a href="<?php echo esc_url( $post_link ); ?>">
							<?php
					}
						the_title();
					if ( ! empty( $post_link ) ) {
						?>
							</a>
							<?php
					}
					?>
					</h4>
					<div class="post_descr">
						<?php
						$cleanskin_components = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'meta_parts' ) );
						$cleanskin_counters   = cleanskin_array_get_keys_by_value( cleanskin_get_theme_option( 'counters' ) );
						if ( ! empty( $cleanskin_components ) ) {
							cleanskin_show_post_meta(
								apply_filters(
									'cleanskin_filter_post_meta_args', array(
										'components' => $cleanskin_components,
										'counters'   => $cleanskin_counters,
										'seo'        => false,
										'echo'       => true,
									), 'hover_' . $hover, 1
								)
							);
						}
						// Remove the condition below if you want display excerpt
						if ( false ) {
							?>
							<div class="post_excerpt"><?php the_excerpt(); ?></div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php

		} elseif ( ! empty( $post_link ) ) {
			// Hover style empty
			?>
			<a href="<?php echo esc_url( $post_link ); ?>" aria-hidden="true" class="icons"></a>
			<?php
		}
	}
}

// Add styles into CSS
if ( ! function_exists( 'cleanskin_hovers_get_css' ) ) {
	//Handler of the add_filter( 'cleanskin_filter_get_css', 'cleanskin_hovers_get_css', 10, 2 );
	function cleanskin_hovers_get_css( $css, $args ) {

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* ================= BUTTON'S HOVERS ==================== */

/* Slide */
.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important; border-color: {$colors['text_hover']}; }
.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.sc_button_hover_style_link2.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['bg_color']} 50%, {$colors['bg_color']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color']} !important; border-color: {$colors['text_link2']}!important; color: {$colors['text_link2']}!important;}
.sc_button_hover_style_link2.sc_button_hover_slide_left:hover { border-color: {$colors['text_hover3']}!important; color: {$colors['text_hover3']}!important;}
.sc_button_hover_style_link2.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link2']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link2']} !important; }
.sc_button_hover_style_link2.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover2']} 50%, {$colors['text_link2']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link2']} !important; }

.sc_button_hover_style_link3.sc_button_hover_slide_left {	background: linear-gradient(to right,	{$colors['text_link3']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important; border-color: {$colors['text_link3']}!important; color: {$colors['text_link3']}!important; }
.sc_button_hover_style_link3.sc_button_hover_slide_right {  background: linear-gradient(to left,	{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link3']} !important; }
.sc_button_hover_style_link3.sc_button_hover_slide_top {	background: linear-gradient(to bottom,	{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link3']} !important; }
.sc_button_hover_style_link3.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['text_hover3']} 50%, {$colors['text_link3']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link3']} !important; }

.sc_button_hover_style_dark.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['extra_bg_color']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important; border-color: {$colors['extra_text']}!important; color: {$colors['extra_text']}!important; }
.sc_button_hover_style_dark.sc_button_hover_slide_left:hover {
	color: {$colors['extra_text']}!important;
	border-color: {$colors['text_hover']}!important; 
}
.sc_button_hover_style_dark.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_top {			background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_dark']} !important; }
.sc_button_hover_style_dark.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_dark']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_dark']} !important; }

.sc_button_hover_style_light.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_light']} !important; }
.sc_button_hover_style_light.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_link']} 50%, {$colors['text_light']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_light']} !important; }

.sc_button_hover_style_inverse.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_right {	background: linear-gradient(to left,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_style_inverse.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['inverse_link']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.sc_button_hover_style_hover.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['extra_hover3']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['text_link']} !important; }
.sc_button_hover_style_hover.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['text_link']} !important; }

.sc_button_hover_style_alter.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['alter_link']} !important; }
.sc_button_hover_style_alter.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['alter_dark']} 50%, {$colors['alter_link']} 50%) no-repeat scroll right top / 100% 210% {$colors['alter_link']} !important; }

.sc_button_hover_style_alterbd.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_right {	background: linear-gradient(to left,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['alter_bd_color']} !important; }
.sc_button_hover_style_alterbd.sc_button_hover_slide_bottom {	background: linear-gradient(to top,		{$colors['alter_link']} 50%, {$colors['alter_bd_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['alter_bd_color']} !important; }

.sc_button_hover_style_extra.sc_button_hover_slide_left {		background: linear-gradient(to right,	{$colors['extra_text']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important; border-color: {$colors['extra_text']}!important; color: {$colors['extra_text']}!important;}
.sc_button_hover_style_extra.sc_button_hover_slide_right {		background: linear-gradient(to left,	{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll left bottom / 210% 100% {$colors['extra_bg_color']} !important; }
.sc_button_hover_style_extra.sc_button_hover_slide_top {		background: linear-gradient(to bottom,	{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll right bottom / 100% 210% {$colors['extra_bg_color']} !important; }
.sc_button_hover_style_extra.sc_button_hover_slide_bottom {		background: linear-gradient(to top,		{$colors['extra_link']} 50%, {$colors['extra_bg_color']} 50%) no-repeat scroll right top / 100% 210% {$colors['extra_bg_color']} !important; }

.sc_button_hover_style_alter.sc_button_hover_slide_left:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_right:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_top:hover,
.sc_button_hover_style_alter.sc_button_hover_slide_bottom:hover  {	color: {$colors['bg_color']} !important; }

.sc_button_hover_style_extra.sc_button_hover_slide_left:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_right:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_top:hover,
.sc_button_hover_style_extra.sc_button_hover_slide_bottom:hover  {	color: {$colors['text_link']}!important; }

.sc_button_hover_slide_left:hover,
.sc_button_hover_slide_left.active,
.ui-state-active .sc_button_hover_slide_left,
.vc_active .sc_button_hover_slide_left,
li.active .sc_button_hover_slide_left {		background-position: left bottom !important; color: {$colors['bg_color']} !important; }



.sc_button_hover_slide_right:hover,
.sc_button_hover_slide_right.active,
.ui-state-active .sc_button_hover_slide_right,
.vc_active .sc_button_hover_slide_right,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_right,
li.active .sc_button_hover_slide_right {	background-position: right bottom !important; color: {$colors['bg_color']} !important; }

.sc_button_hover_slide_top:hover,
.sc_button_hover_slide_top.active,
.ui-state-active .sc_button_hover_slide_top,
.vc_active .sc_button_hover_slide_top,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_top,
li.active .sc_button_hover_slide_top {		background-position: right top !important; color: {$colors['bg_color']} !important; }

.sc_button_hover_slide_bottom:hover,
.sc_button_hover_slide_bottom.active,
.ui-state-active .sc_button_hover_slide_bottom,
.vc_active .sc_button_hover_slide_bottom,
.vc_tta-accordion .vc_tta-panel-title:hover .sc_button_hover_slide_bottom,
li.active .sc_button_hover_slide_bottom {	background-position: right bottom !important; color: {$colors['bg_color']} !important; }


/* ================= IMAGE'S HOVERS ==================== */

/* Dots */
.post_featured.hover_dots .icons span {
	background-color: {$colors['extra_hover2']};
}
.post_featured.hover_dots .post_info {
	color: {$colors['extra_text']};
}

/* Icon */
.post_featured.hover_icon .icons a {
	color: {$colors['bg_color']};
}
.post_featured.hover_icon a:hover {
	color: {$colors['text_link']};
}

/* Icon and Icons */
.post_featured.hover_icons .icons a {
	color: {$colors['text_dark']};
	background-color: {$colors['bg_color_07']};
}
.post_featured.hover_icons a:hover {
	color: {$colors['text_link']};
	background-color: {$colors['bg_color']};
}

/* Fade */
.post_featured.hover_fade .post_info,
.post_featured.hover_fade .post_info a,
.post_featured.hover_fade .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_fade .post_info a:hover {
	color: {$colors['text_link']};
}

/* Slide */
.post_featured.hover_slide .post_info,
.post_featured.hover_slide .post_info a,
.post_featured.hover_slide .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_slide .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_slide .post_info .post_title:after {
	background-color: {$colors['inverse_link']};
}

/* Pull */
.post_featured.hover_pull {
	background-color: {$colors['extra_bg_color']};
}
.post_featured.hover_pull .post_info,
.post_featured.hover_pull .post_info a,
.post_featured.hover_pull .post_info a:before {
	color: {$colors['extra_dark']};
}
.post_featured.hover_pull .post_info a:hover,
.post_featured.hover_pull .post_info a:hover:before {
	color: {$colors['extra_link']};
}

/* Border */
.post_featured.hover_border .post_info,
.post_featured.hover_border .post_info a,
.post_featured.hover_border .post_info .post_meta_item {
	color: {$colors['inverse_link']};
}
.post_featured.hover_border .post_info a:hover {
	color: {$colors['text_link']};
}
.post_featured.hover_border .post_info:before,
.post_featured.hover_border .post_info:after {
	border-color: {$colors['inverse_link']};
}
/*Own styles*/
/* Shop */
.post_featured.hover_shop .icons a {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']} !important;
	background-color: transparent;
}
.post_featured.hover_shop .icons a:hover {
	color: {$colors['inverse_hover']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_link']};
}
.products.related .post_featured.hover_shop .icons a {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']} !important;
	background-color: {$colors['text_link']};
}
.products.related .post_featured.hover_shop .icons a:hover {
	color: {$colors['inverse_hover']};
	border-color: {$colors['text_hover']} !important;
	background-color: {$colors['text_hover']};
}

/* Shop Buttons */
.post_featured.hover_shop_buttons .icons .shop_link {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.post_featured.hover_shop_buttons .icons a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_hover']};
}
.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .checkout {
    color: {$colors['text_link']};
}
.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .checkout:hover {
    color: {$colors['text_hover']}!important;
}
.woocommerce.widget_shopping_cart .woocommerce-mini-cart__buttons .checkout {
	background: linear-gradient(to right,{$colors['text_hover']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important;
}
.woocommerce.single-product div.product .woocommerce-tabs .wc-tabs li a.sc_button_hover_slide_left {
	color: {$colors['extra_dark']};
	background: linear-gradient(to right, {$colors['text_hover']} 50%, {$colors['bg_color_0']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['bg_color_0']} !important;
}

CSS;
		}

		return $css;
	}
}