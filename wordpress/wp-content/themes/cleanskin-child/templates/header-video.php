<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0.14
 */
$cleanskin_header_video = cleanskin_get_header_video();
$cleanskin_embed_video  = '';
if ( ! empty( $cleanskin_header_video ) && ! cleanskin_is_from_uploads( $cleanskin_header_video ) ) {
	if ( cleanskin_is_youtube_url( $cleanskin_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $cleanskin_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		global $wp_embed;
		if ( false && is_object( $wp_embed ) ) {
			$cleanskin_embed_video = do_shortcode( $wp_embed->run_shortcode( '[embed]' . trim( $cleanskin_header_video ) . '[/embed]' ) );
			$cleanskin_embed_video = cleanskin_make_video_autoplay( $cleanskin_embed_video );
		} else {
			$cleanskin_header_video = str_replace( '/watch?v=', '/embed/', $cleanskin_header_video );
			$cleanskin_header_video = cleanskin_add_to_url(
				$cleanskin_header_video, array(
					'feature'        => 'oembed',
					'controls'       => 0,
					'autoplay'       => 1,
					'showinfo'       => 0,
					'modestbranding' => 1,
					'wmode'          => 'transparent',
					'enablejsapi'    => 1,
					'origin'         => home_url(),
					'widgetid'       => 1,
				)
			);
			$cleanskin_embed_video  = '<iframe src="' . esc_url( $cleanskin_header_video ) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?>
		<div id="background_video"><?php cleanskin_show_layout( $cleanskin_embed_video ); ?></div>
		<?php
	}
}
