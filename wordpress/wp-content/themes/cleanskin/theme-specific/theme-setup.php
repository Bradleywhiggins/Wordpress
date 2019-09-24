<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'CLEANSKIN_THEME_FREE' ) ) {
	define( 'CLEANSKIN_THEME_FREE', false );
}
if ( ! defined( 'CLEANSKIN_THEME_FREE_WP' ) ) {
	define( 'CLEANSKIN_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'CLEANSKIN_ALLOW_SKINS' ) ) {
	define( 'CLEANSKIN_ALLOW_SKINS', false );
}
if ( ! defined( 'CLEANSKIN_DEFAULT_SKIN' ) ) {
	define( 'CLEANSKIN_DEFAULT_SKIN', 'default' );
}

// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
$GLOBALS['CLEANSKIN_STORAGE'] = array(

	// Theme required plugin's slugs
	'required_plugins'   => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'         => esc_html__( 'ThemeREX Addons', 'cleanskin' ),
			//'cleanskin-addons'				=> esc_html__('CleanSkin Addons', 'cleanskin'),

			// If theme use OCDI instead (or both) ThemeREX Addons Installer
			//'one-click-demo-import'		=> esc_html__('One Click Demo Import', 'cleanskin'),

			// Recommended (supported) plugins for both (lite and full) versions
			// If plugin not need - comment (or remove) it
			'contact-form-7'     => esc_html__( 'Contact Form 7', 'cleanskin' ),
			'mailchimp-for-wp'   => esc_html__( 'MailChimp for WP', 'cleanskin' ),
			'woocommerce'        => esc_html__( 'WooCommerce', 'cleanskin' ),
			'wp-gdpr-compliance' => esc_html__( 'WP GDPR Compliance', 'cleanskin' ),
		),
		// List of plugins for the FREE version only
		//-----------------------------------------------------
		CLEANSKIN_THEME_FREE
			? array(
				// Recommended (supported) plugins for the FREE (lite) version
				'siteorigin-panels' => esc_html__( 'SiteOrigin Panels', 'cleanskin' ),
			)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
				// Recommended (supported) plugins for the PRO (full) version
				// If plugin not need - comment (or remove) it
				'essential-grid'             => esc_html__( 'Essential Grid', 'cleanskin' ),
				'revslider'                  => esc_html__( 'Revolution Slider', 'cleanskin' ),
				'js_composer'                => esc_html__( 'WPBakery PageBuilder', 'cleanskin' ),
			)
	),

	// Theme-specific blog layouts
	'blog_styles'        => array_merge(
		// Layouts for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'cleanskin' ),
				'archive' => 'index-excerpt',
				'item'    => 'content-excerpt',
				'styles'  => 'excerpt',
			),
			'classic' => array(
				'title'   => esc_html__( 'Classic', 'cleanskin' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'classic',
			),
		),
		// Layouts for the FREE version only
		//-----------------------------------------------------
		CLEANSKIN_THEME_FREE
		? array()

		// Layouts for the PREMIUM version only
		//-----------------------------------------------------
		: array(
			'masonry'   => array(
				'title'   => esc_html__( 'Masonry', 'cleanskin' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'masonry',
			),
			'portfolio' => array(
				'title'   => esc_html__( 'Portfolio', 'cleanskin' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio',
				'columns' => array( 2, 3, 4 ),
				'styles'  => 'portfolio',
			),
			'gallery'   => array(
				'title'   => esc_html__( 'Gallery', 'cleanskin' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio-gallery',
				'columns' => array( 2, 3, 4 ),
				'styles'  => array( 'portfolio', 'gallery' ),
			),
			'chess'     => array(
				'title'   => esc_html__( 'Chess', 'cleanskin' ),
				'archive' => 'index-chess',
				'item'    => 'content-chess',
				'columns' => array( 1, 2, 3 ),
				'styles'  => 'chess',
			),
		)
	),

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-ancora',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://cleanskin.ancorathemes.com',
	'theme_doc_url'      => 'http://cleanskin.ancorathemes.com/doc',
	'theme_download_url' => 'http://theme.download.url',
	'theme_support_url'  => 'http://ancorathemes.com/theme-support/',                    // Ancora
	'theme_video_url'    => 'https://www.youtube.com/channel/UCdIjRh7-lPVHqTTKpaf8PLA',  // Ancora

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By device
		'desktop'  => array( 'min' => 1680 ),
		'notebook' => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'   => array(
			'min' => 768,
			'max' => 1279,
		),
		'mobile'   => array( 'max' => 767 ),
		// By size
		'xxl'      => array( 'max' => 1679 ),
		'xl'       => array( 'max' => 1439 ),
		'lg'       => array( 'max' => 1279 ),
		'md'       => array( 'max' => 1023 ),
		'sm'       => array( 'max' => 767 ),
		'sm_wp'    => array( 'max' => 600 ),
		'xs'       => array( 'max' => 479 ),
	),
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'cleanskin_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'cleanskin_customizer_theme_setup1', 1 );
	function cleanskin_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		cleanskin_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',     // none  - use separate options for the main and the child-theme
				// child - duplicate theme options from the main theme to the child-theme only
				// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',      // Refresh method for preview area in the Appearance - Customize:
				// auto - refresh preview area on change each field with Theme Options
				// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,           // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,        // Place 'comment' field after the 'name' and 'email'

				'icons_selector'         => 'internal',  // Icons selector in the shortcodes:
				// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
				// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',     // Type of icons (if 'icons_selector' is 'internal'):
				// icons  - use font icons to present icons
				// images - use images from theme's folder trx_addons/css/icons.png
				// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',     // Type of socials icons (if 'icons_selector' is 'internal'):
				// icons  - use font icons to present social networks
				// images - use images from theme's folder trx_addons/css/icons.png
				// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'instagram_app'          => 'internal',  // Use internal Instagram App or user must create own application
				// to display photos from his account
				// internal - use our application
				// client   - user must create own application

				'check_min_version'      => true,        // Check if exists a .min version of .css and .js and return path to it
				// instead the path to the original file
				// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,       // Show any menu if no menu selected in the location 'main_menu'
				// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,       // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,        // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,       // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,       // Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,        // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,       // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
				// In the Page Options this styles are present always (can be removed if filter 'cleanskin_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,        // Add arrows on the single attachment page to navigate to the prev/next attachment
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		cleanskin_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Roboto',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				),
				array(
					'name'   => 'Lato',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				),
				array(
					'name'   => 'Josefin Sans',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				)	
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		cleanskin_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		// For example:	'font-family' => '"Roboto",sans-serif'	- is correct
		// 				'font-family' => '"Roboto", sans-serif'	- is incorrect
		// 				'font-family' => 'Roboto,sans-serif'	- is incorrect

		cleanskin_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'cleanskin' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.7142em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '0em',
					'margin-bottom'   => '2.428571em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '3.5714rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '2.222222em',
					'margin-bottom'   => '0.58em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '3.4285rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.05em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.02em',
					'margin-top'      => '1.93em',
					'margin-bottom'   => '1.4em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '2.571428rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.277777em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.02em',
					'margin-top'      => '2.67em',
					'margin-bottom'   => '0.7879em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '2.142857em',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.3077em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.02em',
					'margin-top'      => '2.57em',
					'margin-bottom'   => '1.1em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '1.714285rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.416666em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.02em',
					'margin-top'      => '3.1em',
					'margin-bottom'   => '1em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.714285em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.02em',
					'margin-top'      => '4.6em',
					'margin-bottom'   => '1.25em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '3rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'capitalize',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'cleanskin' ),
					'font-family'     => '"Roboto",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.12em',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'cleanskin' ),
					'font-family'     => 'Roboto',
					'font-size'       => '1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'cleanskin' ),
					'font-family'     => 'inherit',
					'font-size'       => '13px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'cleanskin' ),
					'font-family'     => '"Josefin Sans",sans-serif',
					'font-size'       => '1.0714em',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'cleanskin' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'cleanskin' ),
					'font-family'     => '"Lato",sans-serif',
					'font-size'       => '14px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'capitalize',
					'letter-spacing'  => '0px',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		cleanskin_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => __( 'Main', 'cleanskin' ),
					'description' => __( 'Colors of the main content area', 'cleanskin' ),
				),
				'alter'   => array(
					'title'       => __( 'Alter', 'cleanskin' ),
					'description' => __( 'Colors of the alternative blocks (sidebars, etc.)', 'cleanskin' ),
				),
				'extra'   => array(
					'title'       => __( 'Extra', 'cleanskin' ),
					'description' => __( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'cleanskin' ),
				),
				'inverse' => array(
					'title'       => __( 'Inverse', 'cleanskin' ),
					'description' => __( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'cleanskin' ),
				),
				'input'   => array(
					'title'       => __( 'Input', 'cleanskin' ),
					'description' => __( 'Colors of the form fields (text field, textarea, select, etc.)', 'cleanskin' ),
				),
			)
		);
		cleanskin_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => __( 'Background color', 'cleanskin' ),
					'description' => __( 'Background color of this block in the normal state', 'cleanskin' ),
				),
				'bg_hover'    => array(
					'title'       => __( 'Background hover', 'cleanskin' ),
					'description' => __( 'Background color of this block in the hovered state', 'cleanskin' ),
				),
				'bd_color'    => array(
					'title'       => __( 'Border color', 'cleanskin' ),
					'description' => __( 'Border color of this block in the normal state', 'cleanskin' ),
				),
				'bd_hover'    => array(
					'title'       => __( 'Border hover', 'cleanskin' ),
					'description' => __( 'Border color of this block in the hovered state', 'cleanskin' ),
				),
				'text'        => array(
					'title'       => __( 'Text', 'cleanskin' ),
					'description' => __( 'Color of the plain text inside this block', 'cleanskin' ),
				),
				'text_dark'   => array(
					'title'       => __( 'Text dark', 'cleanskin' ),
					'description' => __( 'Color of the dark text (bold, header, etc.) inside this block', 'cleanskin' ),
				),
				'text_light'  => array(
					'title'       => __( 'Text light', 'cleanskin' ),
					'description' => __( 'Color of the light text (post meta, etc.) inside this block', 'cleanskin' ),
				),
				'text_link'   => array(
					'title'       => __( 'Link', 'cleanskin' ),
					'description' => __( 'Color of the links inside this block', 'cleanskin' ),
				),
				'text_hover'  => array(
					'title'       => __( 'Link hover', 'cleanskin' ),
					'description' => __( 'Color of the hovered state of links inside this block', 'cleanskin' ),
				),
				'text_link2'  => array(
					'title'       => __( 'Link 2', 'cleanskin' ),
					'description' => __( 'Color of the accented texts (areas) inside this block', 'cleanskin' ),
				),
				'text_hover2' => array(
					'title'       => __( 'Link 2 hover', 'cleanskin' ),
					'description' => __( 'Color of the hovered state of accented texts (areas) inside this block', 'cleanskin' ),
				),
				'text_link3'  => array(
					'title'       => __( 'Link 3', 'cleanskin' ),
					'description' => __( 'Color of the other accented texts (buttons) inside this block', 'cleanskin' ),
				),
				'text_hover3' => array(
					'title'       => __( 'Link 3 hover', 'cleanskin' ),
					'description' => __( 'Color of the hovered state of other accented texts (buttons) inside this block', 'cleanskin' ),
				),
			)
		);
		cleanskin_storage_set(
			'schemes', array(

				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'cleanskin' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff',
						'bd_color'         => '#f4f5f5',

						// Text and links colors
						'text'             => '#7e8485',
						'text_light'       => '#abb0b2',
						'text_dark'        => '#4b5354',
						'text_link'        => '#acbfa3',
						'text_hover'       => '#b8a398',
						'text_link2'       => '#4b5354',
						'text_hover2'      => '#b8a398',
						'text_link3'       => '#acbfa3',
						'text_hover3'      => '#acbfa3',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#f2eeec',
						'alter_bg_hover'   => '#f2eeec',
						'alter_bd_color'   => '#cabbb2',
						'alter_bd_hover'   => '#dadada',
						'alter_text'       => '#7e8485',
						'alter_light'      => '#abb0b2',
						'alter_dark'       => '#7e8485',
						'alter_link'       => '#acbfa3',
						'alter_hover'      => '#b8a398',
						'alter_link2'      => '#4b5354',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#b8a398',
						'extra_bg_hover'   => '#28272e',
						'extra_bd_color'   => '#cabbb2',
						'extra_bd_hover'   => '#3d3d3d',
						'extra_text'       => '#ffffff',
						'extra_light'      => '#abb0b2',
						'extra_dark'       => '#ffffff',
						'extra_link'       => '#acbfa3',
						'extra_hover'      => '#b8a398',
						'extra_link2'      => '#4b5354',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#ccccbe',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#ffffff',
						'input_bg_hover'   => '#ffffff',
						'input_bd_color'   => '#bdc0c0',
						'input_bd_hover'   => '#b8a398',
						'input_text'       => '#7e8485',
						'input_light'      => '#a7a7a7',
						'input_dark'       => '#4b5354',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#e4e6e8',
						'inverse_bd_hover' => '#5aa4a9',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#333333',
						'inverse_dark'     => '#ffffff',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#ffffff',
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'cleanskin' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#42454c',
						'bd_color'         => '#686a70',

						// Text and links colors
						'text'             => '#7e8485',
						'text_light'       => '#b0b2b5',
						'text_dark'        => '#ffffff',
						'text_link'        => '#acbfa3',
						'text_hover'       => '#b8a398',
						'text_link2'       => '#7e8485',
						'text_hover2'      => '#b8a398',
						'text_link3'       => '#acbfa3',
						'text_hover3'      => '#acbfa3',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#383b44',
						'alter_bg_hover'   => '#f2eeec',
						'alter_bd_color'   => '#59586d',
						'alter_bd_hover'   => '#4a4a4a',
						'alter_text'       => '#7e8485',
						'alter_light'      => '#b0b2b5',
						'alter_dark'       => '#ffffff',
						'alter_link'       => '#acbfa3',
						'alter_hover'      => '#b8a398',
						'alter_link2'      => '#4b5354',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#b8a398',
						'extra_bg_hover'   => '#383b44',
						'extra_bd_color'   => '#cabbb2',
						'extra_bd_hover'   => '#4a4a4a',
						'extra_text'       => '#ffffff',
						'extra_light'      => '#b0b2b5',
						'extra_dark'       => '#ffffff',
						'extra_link'       => '#acbfa3',
						'extra_hover'      => '#b8a398',
						'extra_link2'      => '#80d572',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#ccccbe',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#e36650',
						'inverse_bd_hover' => '#cb5b47',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#5f5f5f',
						'inverse_dark'     => '#ffffff',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#ffffff',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#bdc0c0',
						'input_bg_hover'   => '#454850',
						'input_bd_color'   => '#2e2d32',
						'input_bd_hover'   => '#b8a398',
						'input_text'       => '#ffffff',
						'input_light'      => '#5f5f5f',
						'input_dark'       => '#ffffff',
					),
				),

			)
		);

		// Simple schemes substitution
		cleanskin_storage_set(
			'schemes_simple', array(
				// Main color	// Slave elements and it's darkness koef.
				'text_link'   => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'  => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'  => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2' => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'  => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3' => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		cleanskin_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_03'       => array(
					'color' => 'bg_color',
					'alpha' => 0.3,
				),
				'bg_color_06'       => array(
					'color' => 'bg_color',
					'alpha' => 0.6,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
                'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'extra_bg_hover_05'     => array(
					'color' => 'extra_bg_hover',
					'alpha' => 0.5,
				),
				'text_light_02'      => array(
					'color' => 'text_light',
					'alpha' => 0.2,
				),
				'text_02'      => array(
					'color' => 'text',
					'alpha' => 0.2,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
                'text_dark_06'      => array(
					'color' => 'text_dark',
					'alpha' => 0.6,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
                'text_hover3_06'      => array(
					'color' => 'text_hover3',
					'alpha' => 0.6,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		cleanskin_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		cleanskin_storage_set(
			'theme_thumbs', apply_filters(
				'cleanskin_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'cleanskin-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'cleanskin-thumb-big'         => array(
						'size'  => array( 770, 410, true ),
						'title' => esc_html__( 'Large image', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'cleanskin-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'cleanskin-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'cleanskin-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'cleanskin-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'cleanskin' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'cleanskin_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'cleanskin_importer_set_options', 9 );
	function cleanskin_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = true;
			// Prepare demo data
			$options['demo_url'] = esc_url( cleanskin_get_protocol() . '://demofiles.ancorathemes.com/cleanskin/' );
			// Required plugins
			$options['required_plugins'] = array_keys( cleanskin_storage_get( 'required_plugins' ) );
			// Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 3;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'CleanSkin Demo', 'cleanskin' );
			$options['files']['default']['domain_dev']  = esc_url( cleanskin_get_protocol() . '://cleanskin.ancorathemes.com' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( cleanskin_get_protocol() . '://cleanskin.ancorathemes.com' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
			// For example:
			// 		$options['files']['dark_demo'] = $options['files']['default'];
			// 		$options['files']['dark_demo']['title'] = esc_html__('Dark Demo', 'cleanskin');
			// Banners
			$options['banners'] = array(
				array(
					'image'        => cleanskin_get_file_url( 'theme-specific/theme-about/images/frontpage.png' ),
					'title'        => esc_html__( 'Front Page Builder', 'cleanskin' ),
					'content'      => wp_kses_post( __( "Create your front page right in the WordPress Customizer. There's no need any page builder. Simply enable/disable sections, fill them out with content, and customize to your liking.", 'cleanskin' ) ),
					'link_url'     => esc_url( '//www.youtube.com/watch?v=VT0AUbMl_KA' ),
					'link_caption' => esc_html__( 'Watch Video Introduction', 'cleanskin' ),
					'duration'     => 20,
				),
				array(
					'image'        => cleanskin_get_file_url( 'theme-specific/theme-about/images/layouts.png' ),
					'title'        => esc_html__( 'Layouts Builder', 'cleanskin' ),
					'content'      => wp_kses_post( __( 'Use Layouts Builder to create and customize header and footer styles for your website. With a flexible page builder interface and custom shortcodes, you can create as many header and footer layouts as you want with ease.', 'cleanskin' ) ),
					'link_url'     => esc_url( '//www.youtube.com/watch?v=pYhdFVLd7y4' ),
					'link_caption' => esc_html__( 'Learn More', 'cleanskin' ),
					'duration'     => 20,
				),
				array(
					'image'        => cleanskin_get_file_url( 'theme-specific/theme-about/images/documentation.png' ),
					'title'        => esc_html__( 'Read Full Documentation', 'cleanskin' ),
					'content'      => wp_kses_post( __( 'Need more details? Please check our full online documentation for detailed information on how to use CleanSkin.', 'cleanskin' ) ),
					'link_url'     => esc_url( cleanskin_storage_get( 'theme_doc_url' ) ),
					'link_caption' => esc_html__( 'Online Documentation', 'cleanskin' ),
					'duration'     => 15,
				),
				array(
					'image'        => cleanskin_get_file_url( 'theme-specific/theme-about/images/video-tutorials.png' ),
					'title'        => esc_html__( 'Video Tutorials', 'cleanskin' ),
					'content'      => wp_kses_post( __( 'No time for reading documentation? Check out our video tutorials and learn how to customize CleanSkin in detail.', 'cleanskin' ) ),
					'link_url'     => esc_url( cleanskin_storage_get( 'theme_video_url' ) ),
					'link_caption' => esc_html__( 'Video Tutorials', 'cleanskin' ),
					'duration'     => 15,
				),
				array(
					'image'        => cleanskin_get_file_url( 'theme-specific/theme-about/images/studio.png' ),
					'title'        => esc_html__( 'Mockingbird Website Customization Studio', 'cleanskin' ),
					'content'      => wp_kses_post( __( "Need a website fast? Order our custom service, and we'll build a website based on this theme for a very fair price. We can also implement additional functionality such as website translation, setting up WPML, and much more.", 'cleanskin' ) ),
					'link_url'     => esc_url( '//mockingbird.ticksy.com/' ),
					'link_caption' => esc_html__( 'Contact Us', 'cleanskin' ),
					'duration'     => 25,
				),
			);
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'cleanskin_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'cleanskin_ocdi_set_options', 9 );
	function cleanskin_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( cleanskin_get_protocol() . '://demofiles.ancorathemes.com/cleanskin/' );
			// Required plugins
			$options['required_plugins'] = array_keys( cleanskin_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'CleanSkin OCDI Demo', 'cleanskin' );
			$options['files']['ocdi']['domain_demo'] = esc_url( cleanskin_get_protocol() . '://cleanskin.ancorathemes.com' );
			// If theme need more demo - just copy 'default' and change required parameter
			// For example:
			//$options['files']['dota']['title'] = esc_html__('Dota Paradise Demo', 'cleanskin');
			//$options['files']['dota']['domain_demo'] = esc_url(cleanskin_get_protocol().'://dota.themerex.net');
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'cleanskin_create_theme_options' ) ) {

	function cleanskin_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages', 'cleanskin' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( cleanskin_storage_get( 'schemes' ) ) < 2;

		cleanskin_storage_set(
			'options', array(

				// 'Logo & Site Identity'
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'cleanskin' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'cleanskin' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'cleanskin' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'cleanskin' ) ),
					'class'    => 'cleanskin_column-1_2 cleanskin_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'cleanskin' ),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'cleanskin' ) ),
					'class'    => 'cleanskin_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Zoom the logo. 1 - original size. Maximum size of logo depends on the actual size of the picture', 'cleanskin' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'cleanskin' ) ),
					'class'      => 'cleanskin_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'cleanskin' ) ),
					'class' => 'cleanskin_column-1_2 cleanskin_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'cleanskin' ) ),
					'class'      => 'cleanskin_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'cleanskin' ) ),
					'class' => 'cleanskin_column-1_2 cleanskin_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'cleanskin' ) ),
					'class'      => 'cleanskin_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'image',
				),

				// 'General settings'
				'general'                       => array(
					'title'    => esc_html__( 'General Settings', 'cleanskin' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'cleanskin' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'cleanskin' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'qsetup'   => esc_html__( 'General', 'cleanskin' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => cleanskin_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'body_paddings'      => array(
					'title' => esc_html__( 'Enable body paddings', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Allow content paddings at the right and left sides', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'refresh'  => false,
					'std'   => 0,
					'type'  => 'checkbox',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'cleanskin' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1170,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',         // SASS variable's name to preview changes 'on fly'
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'cleanskin' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					//'hidden'     => true,
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'cleanskin' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'cleanskin' ) ),
					'std'        => 370,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'cleanskin' ) ),
					'std'        => 30,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'cleanskin' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_widgets_info'          => array(
					'title' => esc_html__( 'Additional widgets', 'cleanskin' ),
					'desc'  => '',
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page'            => array(
					'title'    => esc_html__( 'Widgets at the top of the page', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content'         => array(
					'title'    => esc_html__( 'Widgets above the content', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content'         => array(
					'title'    => esc_html__( 'Widgets below the content', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page'            => array(
					'title'    => esc_html__( 'Widgets at the bottom of the page', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'cleanskin' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'cleanskin' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'cleanskin' ),
					'desc'  => '',
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'cleanskin' ) ),
					'std'   => 0,
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'cleanskin'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'cleanskin') ),
					"std"   => wp_kses_post( __( 'I agree that my submitted data is being collected and stored.', 'cleanskin') ),
					"type"  => "text"
				),

				// 'Header'
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'cleanskin' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'std'      => 'custom',
					'options'  => cleanskin_get_list_header_footer_types(),
					'type'     => CLEANSKIN_THEME_FREE || ! cleanskin_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'cleanskin' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => CLEANSKIN_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-487',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'dependency' => array(
						'header_type'    => array( 'default' ),
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => cleanskin_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'cleanskin' ) ),
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'cleanskin' ),
					),
					'type'     => CLEANSKIN_THEME_FREE || ! cleanskin_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'cleanskin' ) ),
					'std'   => 1,
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'cleanskin' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'cleanskin' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'cleanskin' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'cleanskin' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'cleanskin' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'cleanskin' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'cleanskin' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'cleanskin' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Footer'
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'cleanskin' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'cleanskin' ),
					),
					'std'      => 'custom',
					'options'  => cleanskin_get_list_header_footer_types(),
					'type'     => CLEANSKIN_THEME_FREE || ! cleanskin_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'cleanskin' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'cleanskin' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => CLEANSKIN_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-756',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'cleanskin' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'cleanskin' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => cleanskin_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'cleanskin' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'cleanskin' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'cleanskin' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'cleanskin' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'cleanskin' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! cleanskin_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'cleanskin' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by AncoraThemes. All rights reserved.', 'cleanskin' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),

				// 'Blog'
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'cleanskin' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),

				// Blog - Posts page
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'cleanskin' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'cleanskin' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'cleanskin' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'cleanskin' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'blog_style'     => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'cleanskin' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'cleanskin' ),
						'fullpost' => esc_html__( 'Full post', 'cleanskin' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'cleanskin' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 60,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'cleanskin' ) ),
					'std'     => 2,
					'options' => cleanskin_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'cleanskin' ),
						'links'    => esc_html__( 'Older/Newest', 'cleanskin' ),
						'more'     => esc_html__( 'Load more', 'cleanskin' ),
						'infinite' => esc_html__( 'Infinite scroll', 'cleanskin' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'cleanskin' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					'type'    => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'cleanskin' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'cleanskin' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'cleanskin' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'cleanskin' ),
					'desc'  => '',
					'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'cleanskin' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content_blog'    => array(
					'title'   => esc_html__( 'Widgets above the content', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'cleanskin' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content_blog'    => array(
					'title'   => esc_html__( 'Widgets below the content', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'cleanskin' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'cleanskin' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'cleanskin' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'cleanskin' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'cleanskin' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'cleanskin' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'cleanskin' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'cleanskin' ),
						'columns' => esc_html__( 'Mini-cards', 'cleanskin' ),
					),
					'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'cleanskin' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'cleanskin' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => array(
						'categories' => esc_html__( 'Categories', 'cleanskin' ),
						'date'       => esc_html__( 'Post date', 'cleanskin' ),
						'author'     => esc_html__( 'Post author', 'cleanskin' ),
						'counters'   => esc_html__( 'Post counters', 'cleanskin' ),
						'share'      => esc_html__( 'Share links', 'cleanskin' ),
						'edit'       => esc_html__( 'Edit link', 'cleanskin' ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters'                      => array(
					'title'      => esc_html__( 'Post counters', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if ThemeREX Addons is active', 'cleanskin' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=1',
					'options'    => array(
						'views'    => esc_html__( 'Views', 'cleanskin' ),
						'likes'    => esc_html__( 'Likes', 'cleanskin' ),
						'comments' => esc_html__( 'Comments', 'cleanskin' ),
					),
					'type'       => CLEANSKIN_THEME_FREE || ! cleanskin_exists_trx_addons() ? 'hidden' : 'checklist',
				),

				// Blog - Single posts
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'cleanskin' ) ),
					'type'  => 'section',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'cleanskin' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'hide_sidebar_on_single'        => array(
					'title' => esc_html__( 'Hide sidebar on the single post', 'cleanskin' ),
					'desc'  => wp_kses_data( __( "Hide sidebar on the single post's pages", 'cleanskin' ) ),
					'std'   => 0,
					'type'  => 'checkbox',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'cleanskin' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'cleanskin' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_post'               => array(
					'title'      => esc_html__( 'Post meta', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'cleanskin' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'cleanskin' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => array(
						'categories' => esc_html__( 'Categories', 'cleanskin' ),
						'date'       => esc_html__( 'Post date', 'cleanskin' ),
						'author'     => esc_html__( 'Post author', 'cleanskin' ),
						'counters'   => esc_html__( 'Post counters', 'cleanskin' ),
						'share'      => esc_html__( 'Share links', 'cleanskin' ),
						'edit'       => esc_html__( 'Edit link', 'cleanskin' ),
					),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters_post'                 => array(
					'title'      => esc_html__( 'Post counters', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if plugin ThemeREX Addons is active', 'cleanskin' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=1',
					'options'    => array(
						'views'    => esc_html__( 'Views', 'cleanskin' ),
						'likes'    => esc_html__( 'Likes', 'cleanskin' ),
						'comments' => esc_html__( 'Comments', 'cleanskin' ),
					),
					'type'       => CLEANSKIN_THEME_FREE || ! cleanskin_exists_trx_addons() ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'cleanskin' ) ),
					'std'   => 1,
					'type'  => ! cleanskin_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'cleanskin' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'cleanskin' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'cleanskin' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'cleanskin' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'cleanskin' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'cleanskin' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => cleanskin_get_list_range( 1, 9 ),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page (from 2 to 4)?', 'cleanskin' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => cleanskin_get_list_range( 1, 4 ),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'cleanskin' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'cleanskin' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => cleanskin_get_list_styles( 1, 2 ),
					'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),

				// 'Colors'
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'cleanskin' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'cleanskin' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'cleanskin' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'cleanskin' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'cleanskin' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'cleanskin' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'cleanskin' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'cleanskin' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'cleanskin' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'cleanskin' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'cleanskin' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'cleanskin' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'cleanskin' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'cleanskin' ),
					'desc'        => '',
					'std'         => '$cleanskin_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);

		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'cleanskin' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'cleanskin' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'cleanskin' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'cleanskin' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'cleanskin' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'cleanskin' ) ),
				'class'   => 'cleanskin_column-1_3 cleanskin_new_row',
				'refresh' => false,
				'std'     => '$cleanskin_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= cleanskin_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( cleanskin_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'cleanskin' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'cleanskin' ),
				'desc'    => '',
				'class'   => 'cleanskin_column-1_3 cleanskin_new_row',
				'refresh' => false,
				'std'     => '$cleanskin_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'cleanskin' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'cleanskin' ) )
							: '',
				'class'   => 'cleanskin_column-1_3',
				'refresh' => false,
				'std'     => '$cleanskin_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'cleanskin' ),
					'serif'      => esc_html__( 'serif', 'cleanskin' ),
					'sans-serif' => esc_html__( 'sans-serif', 'cleanskin' ),
					'monospace'  => esc_html__( 'monospace', 'cleanskin' ),
					'cursive'    => esc_html__( 'cursive', 'cleanskin' ),
					'fantasy'    => esc_html__( 'fantasy', 'cleanskin' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'cleanskin' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'cleanskin' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'cleanskin' ) )
							: '',
				'class'   => 'cleanskin_column-1_3',
				'refresh' => false,
				'std'     => '$cleanskin_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = cleanskin_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'cleanskin' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_post( sprintf( __( 'Font settings of the "%s" tag.', 'cleanskin' ), $tag ) ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'cleanskin' ),
						'100'     => esc_html__( '100 (Light)', 'cleanskin' ),
						'200'     => esc_html__( '200 (Light)', 'cleanskin' ),
						'300'     => esc_html__( '300 (Thin)', 'cleanskin' ),
						'400'     => esc_html__( '400 (Normal)', 'cleanskin' ),
						'500'     => esc_html__( '500 (Semibold)', 'cleanskin' ),
						'600'     => esc_html__( '600 (Semibold)', 'cleanskin' ),
						'700'     => esc_html__( '700 (Bold)', 'cleanskin' ),
						'800'     => esc_html__( '800 (Black)', 'cleanskin' ),
						'900'     => esc_html__( '900 (Black)', 'cleanskin' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'cleanskin' ),
						'normal'  => esc_html__( 'Normal', 'cleanskin' ),
						'italic'  => esc_html__( 'Italic', 'cleanskin' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'cleanskin' ),
						'none'         => esc_html__( 'None', 'cleanskin' ),
						'underline'    => esc_html__( 'Underline', 'cleanskin' ),
						'overline'     => esc_html__( 'Overline', 'cleanskin' ),
						'line-through' => esc_html__( 'Line-through', 'cleanskin' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'cleanskin' ),
						'none'       => esc_html__( 'None', 'cleanskin' ),
						'uppercase'  => esc_html__( 'Uppercase', 'cleanskin' ),
						'lowercase'  => esc_html__( 'Lowercase', 'cleanskin' ),
						'capitalize' => esc_html__( 'Capitalize', 'cleanskin' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'cleanskin_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$cleanskin_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		cleanskin_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			cleanskin_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'cleanskin' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'cleanskin' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is 'Theme Options'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ( isset( $_REQUEST['page'] ) && in_array( $_REQUEST['page'], array( 'theme_options', 'trx_addons_theme_panel' ) ) ) ) {
			cleanskin_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'cleanskin' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'cleanskin' ) ),
					'class'    => 'cleanskin_column-1_2 cleanskin_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'cleanskin' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'cleanskin_options_get_list_cpt_options' ) ) {
	function cleanskin_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'cleanskin' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'cleanskin' ) ),
				'std'     => 'inherit',
				'options' => cleanskin_get_list_header_footer_types( true ),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'cleanskin' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'cleanskin' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'cleanskin' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'cleanskin' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'cleanskin' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'cleanskin' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'cleanskin' ),
					1         => esc_html__( 'Yes', 'cleanskin' ),
					0         => esc_html__( 'No', 'cleanskin' ),
				),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'cleanskin' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'cleanskin' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'cleanskin' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => esc_html__( 'Sidebar position', 'cleanskin' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s pages', 'cleanskin' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => esc_html__( 'Sidebar widgets', 'cleanskin' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s pages', 'cleanskin' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( 'left', 'right' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"hide_sidebar_on_single_{$cpt}" => array(
				'title'   => esc_html__( 'Hide sidebar on the single pages', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Hide sidebar on the single page', 'cleanskin' ) ),
				'std'     => '1',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'cleanskin' ),
					1         => esc_html__( 'Hide', 'cleanskin' ),
					0         => esc_html__( 'Show', 'cleanskin' ),
				),
				'type'    => 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'cleanskin' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'cleanskin' ) ),
				'std'     => 'inherit',
				'options' => cleanskin_get_list_header_footer_types( true ),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'cleanskin' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'cleanskin' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'cleanskin' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'cleanskin' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'cleanskin' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'cleanskin' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => cleanskin_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'cleanskin' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'cleanskin' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'cleanskin' ),
				'desc'  => '',
				'type'  => CLEANSKIN_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'cleanskin' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'cleanskin' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'cleanskin' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'cleanskin' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'cleanskin' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => CLEANSKIN_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'cleanskin_options_get_list_choises' ) ) {
	add_filter( 'cleanskin_filter_options_get_list_choises', 'cleanskin_options_get_list_choises', 10, 2 );
	function cleanskin_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = cleanskin_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = cleanskin_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = cleanskin_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'sidebar_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = cleanskin_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = cleanskin_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = cleanskin_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = cleanskin_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = cleanskin_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = cleanskin_array_merge( array( 0 => esc_html__( '- Select category -', 'cleanskin' ) ), cleanskin_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = cleanskin_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = cleanskin_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = cleanskin_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}