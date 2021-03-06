/* global jQuery:false */
/* global CLEANSKIN_STORAGE:false */

jQuery( document ).ready(
	function() {
		"use strict";

		// Switch active skin
		jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_choose_skin' ).on(
			'click', function(e) {
				if (confirm( CLEANSKIN_STORAGE['msg_switch_skin'] )) {
					var link = jQuery( this );
					jQuery.post(
						CLEANSKIN_STORAGE['ajax_url'], {
							'action': 'cleanskin_switch_skin',
							'skin': link.data( 'skin' ),
							'nonce': CLEANSKIN_STORAGE['ajax_nonce']
						},
						function(response){
							var rez = {};
							if (response == '' || response == 0) {
								rez = { error: CLEANSKIN_STORAGE['msg_ajax_error'] };
							} else {
								try {
									rez = JSON.parse( response );
								} catch (e) {
									rez = { error: CLEANSKIN_STORAGE['msg_ajax_error'] };
									console.log( response );
								}
							}
							// Show result
							alert( rez.error ? rez.error : CLEANSKIN_STORAGE['msg_switch_skin_success'] );
							// Reload current page after the skin is switched (if success)
							if (rez.error == '') {
								if ( location.hash != 'trx_addons_theme_panel_section_skins' ) {
									cleanskin_document_set_location( location.href.split('#')[0] + '#' + 'trx_addons_theme_panel_section_skins' );
								}
								location.reload( true );
							}
						}
					);
				}
				e.preventDefault();
				return false;
			}
		);
	}
);
