/* global jQuery:false */
/* global CLEANSKIN_STORAGE:false */

(function() {
	"use strict";

	// Init skin-specific actions on first run
	// Attention! Don't forget to add the class "inited" and check it to prevent re-initialize the elements
	jQuery( document ).on(
		'action.ready_cleanskin', function() {

		}
	);

	// Init skin-specific hidden elements when their parent container becomes visible
	// Attention! Don't forget to add the class "inited" and check it to prevent re-initialize the elements
	jQuery( document ).on(
		'action.init_hidden_elements', function() {

		}
	);

	// Skin-specific scroll actions
	jQuery( document ).on(
		'action.scroll_cleanskin', function() {

		}
	);

	// Skin-specific resize actions
	jQuery( document ).on(
		'action.resize_cleanskin', function() {

		}
	);

})();
