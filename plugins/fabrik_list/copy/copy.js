/**
 * List Copy
 *
 * @copyright: Copyright (C) 2005-2015, fabrikar.com - All rights reserved.
 * @license:   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
define(['jquery', 'fab/list-plugin'], function (jQuery, FbListPlugin) {
	var FbListCopy = new Class({
		Extends   : FbListPlugin,
		initialize: function (options) {
			this.parent(options);
		}
	});

	return FbListCopy;
});