<?php
/**
 * The template for search results with desired blog style
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

// Search page setup
// (uncomment lines with cleanskin_storage_set_array2() calls if you want to override the relevant settings from Theme Options)

// Blog style:
// Replace last parameter with one of values: excerpt | chess_N | classic_N | masonry_N | portfolio_N | gallery_N
// where N - columns number from 2 to 4 (for chess also available 1 column)
cleanskin_storage_set_array2( 'options', 'blog_style', 'val', 'masonry_3' );

// Sidebar position:
// Replace last parameter with one of values: none | left | right
cleanskin_storage_set_array2( 'options', 'sidebar_position_blog', 'val', 'none' );

get_template_part( apply_filters( 'cleanskin_filter_get_template_part', 'index' ) );
