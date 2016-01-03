/**
 * InternalID Element
 *
 * @copyright: Copyright (C) 2005-2015, fabrikar.com - All rights reserved.
 * @license:   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

var FbInternalId = new Class({
	Extends: FbElement,
	initialize: function (element, options) {
		this.setPlugin('fbInternalId');
		this.parent(element, options);
	}
});