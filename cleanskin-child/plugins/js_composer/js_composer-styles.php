<?php
/* Add plugin-specific colors and fonts to the custom CSS */
if ( ! function_exists( 'cleanskin_vc_get_css' ) ) {
	add_filter( 'cleanskin_filter_get_css', 'cleanskin_vc_get_css', 10, 2 );
	function cleanskin_vc_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
			
/*Accordion fonts*/
.vc_tta.vc_tta-accordion .vc_tta-panel-title .vc_tta-title-text {
	{$fonts['h5_font-family']}
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	{$fonts['info_font-family']}
}
/*Tabs fonts*/
.wpb-js-composer .vc_tta.vc_general .vc_tta-tab > a {
    {$fonts['button_font-family']}
}



CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Row and columns */
.scheme_self.vc_section,
.scheme_self.wpb_row,
.scheme_self.wpb_column > .vc_column-inner > .wpb_wrapper{
	color: {$colors['text']};
}
.scheme_self.wpb_text_column,
.scheme_self.wpb_text_column a {
	color: {$colors['inverse_text']};
}
.scheme_self.wpb_text_column a:hover {
	color: {$colors['bg_color']};
}
/* Shape above and below rows */
.vc_shape_divider .vc-shape-fill {
	fill: {$colors['bg_color']};
}

/* Accordion */
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_dark']};
}
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:before,
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:after {
	border-color: {$colors['bg_color']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a {
	color: {$colors['text_dark']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover {
	color: {$colors['text_hover']};
}

.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover .vc_tta-controls-icon {
	color: {$colors['bg_color']};
	background-color: {$colors['text_hover']};
}

/*Accordion my own styles*/
.vc_tta-accordion .vc_tta-panel .vc_tta-controls-icon.vc_tta-controls-icon-chevron {
    background-color: {$colors['bg_color_0']};
    border-color: {$colors['text_hover']};
}

.vc_tta-accordion .vc_tta-panel .vc_tta-controls-icon.vc_tta-controls-icon-chevron:hover {
    background-color: {$colors['text_hover']};
}
.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-controls-icon.vc_tta-controls-icon-chevron:before,
.vc_tta-accordion .vc_tta-panel .vc_tta-controls-icon.vc_tta-controls-icon-chevron:before {
    color: {$colors['text_hover']};
}

.vc_tta-accordion .vc_tta-panel .vc_tta-controls-icon.vc_tta-controls-icon-chevron:hover:before,
.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title a:hover .vc_tta-controls-icon.vc_tta-controls-icon-chevron:before {
    color: {$colors['bg_color']};
}
.vc_tta-accordion .vc_tta-panel {
    background-color: {$colors['alter_bg_color']}!important;
}



/* Tabs */
.wpb-js-composer .vc_tta-tabs.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.wpb-js-composer .vc_tta-tabs.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a:hover,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab.vc_active > a {
	color: {$colors['alter_link2']};
	background-color: {$colors['alter_bg_hover']};
}
/*Own styles*/
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels {
    background-color: {$colors['alter_bg_hover']};  
}




/* Separator */
.vc_separator.vc_sep_color_grey .vc_sep_line {
	border-color: {$colors['bd_color']};
}

/* Progress bar */
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar {
	background-color: {$colors['text_light_02']};
}
.sc_content[class*="vc_custom_"] .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar {
	background-color: {$colors['bg_color_02']};
}
.vc_progress_bar.vc_progress_bar_narrow.vc_progress-bar-color-bar_red .vc_single_bar .vc_bar {
	background-color: {$colors['alter_link']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label, .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	color: {$colors['text']};
}
.sc_content[class*="vc_custom_"] .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label, .sc_content[class*="vc_custom_"] .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	color: {$colors['bg_color']};
}

/*Message box*/
.vc_message_box:not(.vc_color-grey) .vc_message_box-icon i:before {
	color: {$colors['extra_text']};
}
.vc_message_box:after {
    color: {$colors['extra_text']};
}
.vc_message_box.vc_color-grey:after {
    color: {$colors['text_light']};
}

CSS;
		}

		return $css;
	}
}