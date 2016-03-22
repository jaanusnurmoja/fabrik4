/**
 * Admin List Editor
 *
 * @copyright: Copyright (C) 2005-2015, fabrikar.com - All rights reserved.
 * @license:   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
define(['jquery', 'admin/pluginmanager'], function (jQuery, PluginManager) {
    var ListPluginManager = new Class({

        Extends: PluginManager,

        type: 'list',

        initialize: function (plugins, id) {
            this.parent(plugins, id);
        }

    });

    return ListPluginManager;
});
