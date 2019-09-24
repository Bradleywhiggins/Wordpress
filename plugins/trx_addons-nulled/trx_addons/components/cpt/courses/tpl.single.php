<?php
/**
 * The template to display the course's single post
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

get_header();

while ( have_posts() ) { the_post();
	
	$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
	
	do_action('trx_addons_action_before_article', 'courses.single');
	?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'courses_single itemscope' ); trx_addons_seo_snippets('', 'Article'); ?>>

		<?php do_action('trx_addons_action_article_start', 'courses.single'); ?>
		
		<section class="courses_page_header">	
			<?php
			// Image
			if ( !trx_addons_sc_layouts_showed('featured') && has_post_thumbnail() ) {
				?><div class="courses_page_featured"><?php
					the_post_thumbnail(
										apply_filters('trx_addons_filter_thumb_size', 'full', 'courses-single'),
										trx_addons_seo_image_params(array(
																		'alt' => get_the_title()
																		))
										);
				?></div><?php
			}
			
			// Title, price and meta
			if ( !trx_addons_sc_layouts_showed('title') ) {
				?><h2 class="courses_page_title"><?php
					the_title();
					?><div class="courses_page_price"><?php
						$price = explode('/', $meta['price']);
						echo esc_html($price[0]) . (!empty($price[1]) ? '<span class="courses_page_period">'.$price[1].'</span>' : '');
					?></div><?php
				?></h2><?php
			} else {
				?><div class="courses_page_price"><?php
					$price = explode('/', $meta['price']);
					echo esc_html($price[0]) . (!empty($price[1]) ? '<span class="courses_page_period">'.$price[1].'</span>' : '');
				?></div><?php
			}

			?><div class="courses_page_meta">
				<span class="courses_page_meta_item courses_page_meta_date"><?php
					$dt = $meta['date'];
					echo sprintf($dt < date('Y-m-d') ? esc_html__('Started on %s', 'trx_addons') : esc_html__('Starting %s', 'trx_addons'), '<span class="courses_page_meta_item_date">' . date_i18n(get_option('date_format'), strtotime($dt)) . '</span>');
				?></span><?php
				if (!empty($meta['time'])) {
					?><span class="courses_page_meta_item courses_page_meta_time"><?php echo esc_html($meta['time']); ?></span><?php
				}
				if (!empty($meta['duration'])) {
					?><span class="courses_page_meta_item courses_page_meta_duration"><?php echo esc_html($meta['duration']); ?></span><?php
				}
			?></div>
		</section>
		<?php

		// Post content
		?><div class="courses_page_content entry-content"<?php trx_addons_seo_snippets('articleBody'); ?>><?php
			the_content( );
		?></div><!-- .entry-content --><?php

		// Link to the product
		if (!empty($meta['product']) && (int) $meta['product'] > 0) {
			?><div class="courses_page_buttons">
				<a href="<?php echo esc_url(get_permalink($meta['product'])); ?>" class="sc_button theme_button"><?php esc_html_e('Join the Course', 'trx_addons'); ?></a>
			</div><?php
		}

		do_action('trx_addons_action_article_end', 'courses.single');

	?></article><?php

	do_action('trx_addons_action_after_article', 'courses.single');

	// Contact form to order this course
	if ( (int) ($form_id = trx_addons_get_option('courses_form')) > 0 ) {
		?><section class="page_contact_form courses_page_form">
			<h3 class="section_title page_contact_form_title"><?php
				esc_html_e('Join this course', 'trx_addons');
			?></h3><?php
			// Add filter 'wpcf7_form_elements' before Contact Form 7 show form to add text
			if ( !function_exists( 'trx_addons_cpt_courses_wpcf7_form_elements' ) ) {
				add_filter('wpcf7_form_elements', 'trx_addons_cpt_courses_wpcf7_form_elements');
				function trx_addons_cpt_courses_wpcf7_form_elements($elements) {
					$elements = str_replace('</textarea>',
											esc_html(sprintf(__("Hi.\nI'ld like to join the course '%s'.\nPlease, get in touch with me.", 'trx_addons'), get_the_title()))
											. '</textarea>',
											$elements
											);
					return $elements;
				}
			}
			// Store data for the form for 4 hours
			set_transient(sprintf('trx_addons_cf7_%d_data', $form_id), array(
													'item'  => get_the_ID()
													), 4 * 60 * 60);
			// Display Contact Form 7
			trx_addons_show_layout(do_shortcode('[contact-form-7 id="'.esc_attr($form_id).'"]'));
			// Remove filter 'wpcf7_form_elements' after Contact Form 7 showed
			remove_filter('wpcf7_form_elements', 'trx_addons_cpt_courses_wpcf7_form_elements');
		?></section><?php
	}

	// Related items (select courses with same category)
	$taxonomies = array();
	$terms = get_the_terms(get_the_ID(), TRX_ADDONS_CPT_COURSES_TAXONOMY);
	if ( !empty( $terms ) ) {
		$taxonomies[TRX_ADDONS_CPT_COURSES_TAXONOMY] = array();
		foreach( $terms as $term )
			$taxonomies[TRX_ADDONS_CPT_COURSES_TAXONOMY][] = $term->term_id;
	}

	$trx_addons_related_style   = explode('_', trx_addons_get_option('courses_style'));
	$trx_addons_related_type    = $trx_addons_related_style[0];
	$trx_addons_related_columns = empty($trx_addons_related_style[1]) ? 1 : max(1, $trx_addons_related_style[1]);
	
	trx_addons_get_template_part('templates/tpl.posts-related.php',
										'trx_addons_args_related',
										apply_filters('trx_addons_filter_args_related', array(
															'class' => 'courses_page_related sc_courses sc_courses_'.esc_attr($trx_addons_related_type),
															'posts_per_page' => $trx_addons_related_columns,
															'columns' => $trx_addons_related_columns,
															'template' => TRX_ADDONS_PLUGIN_CPT . 'courses/tpl.'.trim($trx_addons_related_type).'-item.php',
															'template_args_name' => 'trx_addons_args_sc_courses',
															'post_type' => TRX_ADDONS_CPT_COURSES_PT,
															'taxonomies' => $taxonomies,
															'more_text' => __('Learn more', 'trx_addons')
															)
													)
									);

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>