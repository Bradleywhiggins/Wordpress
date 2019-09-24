<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage CLEANSKIN
 * @since CLEANSKIN 1.0
 */

						// Widgets area inside page content
						cleanskin_create_widgets_area( 'widgets_below_content' );
?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					cleanskin_create_widgets_area( 'widgets_below_page' );

					$cleanskin_body_style = cleanskin_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $cleanskin_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$cleanskin_footer_type = cleanskin_get_theme_option( 'footer_type' );
			if ( 'custom' == $cleanskin_footer_type && ! cleanskin_is_layouts_available() ) {
				$cleanskin_footer_type = 'default';
			}
			get_template_part( apply_filters( 'cleanskin_filter_get_template_part', "templates/footer-{$cleanskin_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>
