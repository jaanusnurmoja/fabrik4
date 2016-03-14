/**
 * Button Element
 *
 * @copyright: Copyright (C) 2005-2015, fabrikar.com - All rights reserved.
 * @license: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

var FbButton = new Class({
	Extends: FbElement,
	initialize: function (element, options) {
		this.setPlugin('fabrikButton');
		this.parent(element, options);
	},

	addNewEventAux: function (action, js) {
		var self = this;
		jQuery(this.element).on(action, function (e) {

			// Unlike element addNewEventAux we need to stop the event otherwise the form is submitted
			if (e) {
				e.stopPropagation();
			}
			jQuery.type(js) === 'function' ? js.delay(0, self, self) : eval(js);
		});
	}
});