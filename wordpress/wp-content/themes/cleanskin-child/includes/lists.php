<?php
/**
 * Theme lists
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }



// Return numbers range
if ( ! function_exists( 'cleanskin_get_list_range' ) ) {
	function cleanskin_get_list_range( $from = 1, $to = 2, $prepend_inherit = false ) {
		$list = array();
		for ( $i = $from; $i <= $to; $i++ ) {
			$list[ $i ] = $i;
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}



// Return styles list
if ( ! function_exists( 'cleanskin_get_list_styles' ) ) {
	function cleanskin_get_list_styles( $from = 1, $to = 2, $prepend_inherit = false ) {
		$list = array();
		for ( $i = $from; $i <= $to; $i++ ) {
			// Translators: Add number to the style name 'Style 1', 'Style 2' ...
			$list[ $i ] = sprintf( esc_html__( 'Style %d', 'cleanskin' ), $i );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( ! function_exists( 'cleanskin_get_list_yesno' ) ) {
	function cleanskin_get_list_yesno( $prepend_inherit = false ) {
		$list = array(
			'yes' => esc_html__( 'Yes', 'cleanskin' ),
			'no'  => esc_html__( 'No', 'cleanskin' ),
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( ! function_exists( 'cleanskin_get_list_onoff' ) ) {
	function cleanskin_get_list_onoff( $prepend_inherit = false ) {
		$list = array(
			'on'  => esc_html__( 'On', 'cleanskin' ),
			'off' => esc_html__( 'Off', 'cleanskin' ),
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( ! function_exists( 'cleanskin_get_list_showhide' ) ) {
	function cleanskin_get_list_showhide( $prepend_inherit = false ) {
		$list = array(
			'show' => esc_html__( 'Show', 'cleanskin' ),
			'hide' => esc_html__( 'Hide', 'cleanskin' ),
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( ! function_exists( 'cleanskin_get_list_directions' ) ) {
	function cleanskin_get_list_directions( $prepend_inherit = false ) {
		$list = array(
			'horizontal' => esc_html__( 'Horizontal', 'cleanskin' ),
			'vertical'   => esc_html__( 'Vertical', 'cleanskin' ),
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with paddings sizes
if ( ! function_exists( 'cleanskin_get_list_paddings' ) ) {
	function cleanskin_get_list_paddings( $prepend_inherit = false ) {
		$list = apply_filters(
			'cleanskin_filter_list_paddings', array(
				'none'   => esc_html__( 'None', 'cleanskin' ),
				'small'  => esc_html__( 'Small', 'cleanskin' ),
				'medium' => esc_html__( 'Medium', 'cleanskin' ),
				'large'  => esc_html__( 'Large', 'cleanskin' ),
			)
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list with image's hovers
if ( ! function_exists( 'cleanskin_get_list_hovers' ) ) {
	function cleanskin_get_list_hovers( $prepend_inherit = false ) {
		$list = apply_filters(
			'cleanskin_filter_list_hovers', array(
				'dots'   => esc_html__( 'Dots', 'cleanskin' ),
			)
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( ! function_exists( 'cleanskin_get_list_sidebars' ) ) {
	function cleanskin_get_list_sidebars( $prepend_inherit = false, $add_hide = false ) {
		$list = cleanskin_storage_get( 'list_sidebars' );
		if ( '' == $list ) {
			global $wp_registered_sidebars;
			$list = array();
			if ( is_array( $wp_registered_sidebars ) ) {
				foreach ( $wp_registered_sidebars as $k => $v ) {
					$list[ $v['id'] ] = $v['name'];
				}
			}
			cleanskin_storage_set( 'list_sidebars', $list );
		}
		if ( $add_hide ) {
			$list = cleanskin_array_merge( array( 'hide' => esc_html__( '- Select widgets -', 'cleanskin' ) ), $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return sidebars positions
if ( ! function_exists( 'cleanskin_get_list_sidebars_positions' ) ) {
	function cleanskin_get_list_sidebars_positions( $prepend_inherit = false ) {
		$list = apply_filters(
			'cleanskin_filter_list_sidebars_positions', array(
				'hide'  => esc_html__( 'Hide', 'cleanskin' ),
				'left'  => esc_html__( 'Left', 'cleanskin' ),
				'right' => esc_html__( 'Right', 'cleanskin' ),
			)
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return header/footer types
if ( ! function_exists( 'cleanskin_get_list_header_footer_types' ) ) {
	function cleanskin_get_list_header_footer_types( $prepend_inherit = false ) {
		$list = apply_filters(
			'cleanskin_filter_list_header_footer_types', array(
				'default' => esc_html__( 'Default', 'cleanskin' ),
			)
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return header styles
if ( ! function_exists( 'cleanskin_get_list_header_styles' ) ) {
	function cleanskin_get_list_header_styles( $prepend_inherit = false ) {
		static $list = false;
		if ( ! $list ) {
			$list = apply_filters( 'cleanskin_filter_list_header_styles', array() );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return header positions
if ( ! function_exists( 'cleanskin_get_list_header_positions' ) ) {
	function cleanskin_get_list_header_positions( $prepend_inherit = false ) {
		$list = array(
			'default' => esc_html__( 'Default', 'cleanskin' ),
			'over'    => esc_html__( 'Over', 'cleanskin' ),
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return footer styles
if ( ! function_exists( 'cleanskin_get_list_footer_styles' ) ) {
	function cleanskin_get_list_footer_styles( $prepend_inherit = false ) {
		static $list = false;
		if ( ! $list ) {
			$list = apply_filters( 'cleanskin_filter_list_footer_styles', array() );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return body styles list, prepended inherit
if ( ! function_exists( 'cleanskin_get_list_body_styles' ) ) {
	function cleanskin_get_list_body_styles( $prepend_inherit = false ) {
		$list = array(
			'boxed' => esc_html__( 'Boxed', 'cleanskin' ),
			'wide'  => esc_html__( 'Wide', 'cleanskin' ),
		);
		if ( apply_filters( 'cleanskin_filter_allow_fullscreen', cleanskin_get_theme_setting( 'allow_fullscreen' ) || cleanskin_get_edited_post_type() == 'page' ) ) {
			$list['fullwide']   = esc_html__( 'Fullwidth', 'cleanskin' );
			$list['fullscreen'] = esc_html__( 'Fullscreen', 'cleanskin' );
		}
		$list = apply_filters( 'cleanskin_filter_list_body_styles', $list );
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return blog styles list, prepended inherit
if ( ! function_exists( 'cleanskin_get_list_blog_styles' ) ) {
	function cleanskin_get_list_blog_styles( $prepend_inherit = false, $filter = 'arh' ) {
		$list   = array();
		$styles = cleanskin_storage_get( 'blog_styles' );
		if ( is_array( $styles ) ) {
			foreach ( $styles as $k => $v ) {
				if ( empty( $filter ) || empty( $v[ "{$filter}_allowed" ] ) || $v[ "{$filter}_allowed" ] ) {
					if ( 'arh' == $filter && isset( $v['columns'] ) && is_array( $v['columns'] ) ) {
						foreach ( $v['columns'] as $col ) {
							$list[ "{$k}_{$col}" ] = 1 == $col
														// Translators: Make blog style title: "Layout name"
														? sprintf( __( '%s /1 column/', 'cleanskin' ), $v['title'] )
														// Translators: Make blog style title: "Layout name /# columns/"
														: sprintf( __( '%1$s /%2$d columns/', 'cleanskin' ), $v['title'], $col );
						}
					} else {
						$list[ $k ] = $v['title'];
					}
				}
			}
		}
		$list = apply_filters( 'cleanskin_filter_list_blog_styles', $list );
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Return list of categories
if ( ! function_exists( 'cleanskin_get_list_categories' ) ) {
	function cleanskin_get_list_categories( $prepend_inherit = false ) {
		$list = cleanskin_storage_get( 'list_categories' );
		if ( '' == $list ) {
			$list       = array();
			$taxonomies = get_categories(
				array(
					'type'         => 'post',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'taxonomy'     => 'category',
					'pad_counts'   => false,
				)
			);
			if ( is_array( $taxonomies ) && count( $taxonomies ) > 0 ) {
				foreach ( $taxonomies as $cat ) {
					$list[ $cat->term_id ] = $cat->name;
				}
			}
			cleanskin_storage_set( 'list_categories', $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Return list of taxonomies
if ( ! function_exists( 'cleanskin_get_list_terms' ) ) {
	function cleanskin_get_list_terms( $prepend_inherit = false, $taxonomy = 'category' ) {
		$list = cleanskin_storage_get( 'list_taxonomies_' . ( $taxonomy ) );
		if ( '' == $list ) {
			$list       = array();
			$taxonomies = get_terms(
				$taxonomy, array(
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'taxonomy'     => $taxonomy,
					'pad_counts'   => false,
				)
			);
			if ( is_array( $taxonomies ) && count( $taxonomies ) > 0 ) {
				foreach ( $taxonomies as $cat ) {
					$list[ $cat->term_id ] = $cat->name;  // . ($taxonomy!='category' ? ' /'.($cat->taxonomy).'/' : '');
				}
			}
			cleanskin_storage_set( 'list_taxonomies_' . ( $taxonomy ), $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return list of post's types
if ( ! function_exists( 'cleanskin_get_list_posts_types' ) ) {
	function cleanskin_get_list_posts_types( $prepend_inherit = false ) {
		$list = cleanskin_storage_get( 'list_posts_types' );
		if ( '' == $list ) {
			$list = apply_filters(
				'cleanskin_filter_list_posts_types', array(
					'post' => esc_html__( 'Post', 'cleanskin' ),
				)
			);
			cleanskin_storage_set( 'list_posts_types', $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( ! function_exists( 'cleanskin_get_list_posts' ) ) {
	function cleanskin_get_list_posts( $prepend_inherit = false, $opt = array() ) {
		$opt = array_merge(
			array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'post_parent'    => '',
				'taxonomy'       => 'category',
				'taxonomy_value' => '',
				'meta_key'       => '',
				'meta_value'     => '',
				'meta_compare'   => '',
				'posts_per_page' => -1,
				'orderby'        => 'post_date',
				'order'          => 'desc',
				'not_selected'   => true,
				'return'         => 'id',
			), is_array( $opt ) ? $opt : array( 'post_type' => $opt )
		);

		$hash = 'list_posts'
				. '_' . ( is_array( $opt['post_type'] ) ? join( '_', $opt['post_type'] ) : $opt['post_type'] )
				. '_' . ( is_array( $opt['post_parent'] ) ? join( '_', $opt['post_parent'] ) : $opt['post_parent'] )
				. '_' . ( $opt['taxonomy'] )
				. '_' . ( is_array( $opt['taxonomy_value'] ) ? join( '_', $opt['taxonomy_value'] ) : $opt['taxonomy_value'] )
				. '_' . ( $opt['meta_key'] )
				. '_' . ( $opt['meta_compare'] )
				. '_' . ( $opt['meta_value'] )
				. '_' . ( $opt['orderby'] )
				. '_' . ( $opt['order'] )
				. '_' . ( $opt['return'] )
				. '_' . ( $opt['posts_per_page'] );
		$list = cleanskin_storage_get( $hash );
		if ( '' == $list ) {
			$list = array();
			if ( false !== $opt['not_selected'] ) {
				$list['none'] = true === $opt['not_selected'] ? esc_html__( '- Not selected -', 'cleanskin' ) : $opt['not_selected'];
			}
			$args = array(
				'post_type'           => $opt['post_type'],
				'post_status'         => $opt['post_status'],
				'posts_per_page'      => -1 == $opt['posts_per_page'] ? 1000 : $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'             => $opt['orderby'],
				'order'               => $opt['order'],
			);
			if ( ! empty( $opt['post_parent'] ) ) {
				if ( is_array( $opt['post_parent'] ) ) {
					$args['post_parent__in'] = $opt['post_parent'];
				} else {
					$args['post_parent'] = $opt['post_parent'];
				}
			}
			if ( ! empty( $opt['taxonomy_value'] ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field'    => is_array( $opt['taxonomy_value'] )
										? ( (int) $opt['taxonomy_value'][0] > 0 ? 'term_taxonomy_id' : 'slug' )
										: ( (int) $opt['taxonomy_value'] > 0 ? 'term_taxonomy_id' : 'slug' ),
						'terms'    => is_array( $opt['taxonomy_value'] )
										? $opt['taxonomy_value']
										: ( (int) $opt['taxonomy_value'] > 0 ? (int) $opt['taxonomy_value'] : $opt['taxonomy_value'] ),
					),
				);
			}
			if ( ! empty( $opt['meta_key'] ) ) {
				$args['meta_key'] = $opt['meta_key'];
			}
			if ( ! empty( $opt['meta_value'] ) ) {
				$args['meta_value'] = $opt['meta_value'];
			}
			if ( ! empty( $opt['meta_compare'] ) ) {
				$args['meta_compare'] = $opt['meta_compare'];
			}
			$posts = get_posts( $args );
			if ( is_array( $posts ) && count( $posts ) > 0 ) {
				foreach ( $posts as $post ) {
					$list[ 'id' == $opt['return'] ? $post->ID : $post->post_title ] = $post->post_title;
				}
			}
			cleanskin_storage_set( $hash, $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Return list of registered users
if ( ! function_exists( 'cleanskin_get_list_users' ) ) {
	function cleanskin_get_list_users( $prepend_inherit = false, $roles = array( 'administrator', 'editor', 'author', 'contributor', 'shop_manager' ) ) {
		$list = cleanskin_storage_get( 'list_users' );
		if ( '' == $list ) {
			$list         = array();
			$list['none'] = esc_html__( '- Not selected -', 'cleanskin' );
			$users        = get_users(
				array(
					'orderby' => 'display_name',
					'order'   => 'ASC',
				)
			);
			if ( is_array( $users ) && count( $users ) > 0 ) {
				foreach ( $users as $user ) {
					$accept = true;
					if ( is_array( $user->roles ) ) {
						if ( is_array( $user->roles ) && count( $user->roles ) > 0 ) {
							$accept = false;
							foreach ( $user->roles as $role ) {
								if ( in_array( $role, $roles ) ) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ( $accept ) {
						$list[ $user->user_login ] = $user->display_name;
					}
				}
			}
			cleanskin_storage_set( 'list_users', $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return menus list, prepended inherit
if ( ! function_exists( 'cleanskin_get_list_menus' ) ) {
	function cleanskin_get_list_menus( $prepend_inherit = false ) {
		$list = cleanskin_storage_get( 'list_menus' );
		if ( '' == $list ) {
			$list            = array();
			$list['default'] = esc_html__( 'Default', 'cleanskin' );
			$menus           = wp_get_nav_menus();
			if ( is_array( $menus ) && count( $menus ) > 0 ) {
				foreach ( $menus as $menu ) {
					$list[ $menu->slug ] = $menu->name;
				}
			}
			cleanskin_storage_set( 'list_menus', $list );
		}
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Return list of the specified icons (font icons, svg icons or png icons)
if ( ! function_exists( 'cleanskin_get_list_icons' ) ) {
	function cleanskin_get_list_icons( $style ) {
		$lists = get_transient( 'cleanskin_list_icons' );
		if ( ! is_array( $lists ) || ! isset( $lists[ $style ] ) || ! is_array( $lists[ $style ] ) || count( $lists[ $style ] ) < 2 ) {
			if ( 'icons' == $style ) {
				$lists[ $style ] = cleanskin_array_from_list( cleanskin_get_list_icons_classes() );
			} elseif ( 'images' == $style ) {
				$lists[ $style ] = cleanskin_get_list_images();
			} else { //if ( 'svg' == $style )
				$lists[ $style ] = cleanskin_get_list_images( false, 'svg' );
			}
			if ( is_admin() && is_array( $lists[ $style ] ) && count( $lists[ $style ] ) > 1 ) {
				set_transient( 'cleanskin_list_icons', $lists, 6 * 60 * 60 );       // Store to the cache for 6 hours
			}
		}
		return $lists[ $style ];
	}
}

// Return iconed classes list
if ( ! function_exists( 'cleanskin_get_list_icons_classes' ) ) {
	function cleanskin_get_list_icons_classes( $prepend_inherit = false ) {
		static $list = false;
		if ( ! is_array( $list ) ) {
			$list = ! is_admin() ? array() : cleanskin_parse_icons_classes( cleanskin_get_file_dir( 'css/font-icons/css/fontello-codes.css' ) );
		}
		$list = cleanskin_array_merge( array( 'none' => 'none' ), $list );
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

// Return images list
if ( ! function_exists( 'cleanskin_get_list_images' ) ) {
	function cleanskin_get_list_images( $prepend_inherit = false, $type = 'png' ) {
		$list = function_exists( 'trx_addons_get_list_files' )
				? trx_addons_get_list_files( "css/icons.{$type}", $type )
				: array();
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}


// Additional attributes for VC and SOW
//----------------------------------------------------
if ( ! function_exists( 'cleanskin_get_list_sc_color_styles' ) ) {
	function cleanskin_get_list_sc_color_styles( $prepend_inherit = false ) {
		$list = apply_filters(
			'cleanskin_filter_get_list_sc_color_styles', array(
				'default' => esc_html__( 'Default', 'cleanskin' ),
				'link2'   => esc_html__( 'Link 2', 'cleanskin' ),
				'link3'   => esc_html__( 'Link 3', 'cleanskin' ),
				'dark'    => esc_html__( 'Dark', 'cleanskin' ),
			)
		);
		return $prepend_inherit ? cleanskin_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'cleanskin' ) ), $list ) : $list;
	}
}

