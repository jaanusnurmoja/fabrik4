/*! Fabrik */

define(["jquery","fab/list-plugin"],function(jQuery,FbListPlugin){var FbListJs=new Class({Extends:FbListPlugin,options:{statusMsg:""},initialize:function(t){this.parent(t)},buttonAction:function(){var statusMsg,chxs=this.list.getForm().getElements("input[name^=ids]").filter(function(t){return t.checked}),ids=chxs.map(function(t){return t.get("value")}),rows={};chxs.each(function(t){var s=t.get("value");rows[s]=this.list.getRow(s)}.bind(this)),""!==this.options.js_code&&!1===eval(this.options.js_code)||(void 0===statusMsg&&(statusMsg=this.options.statusMsg),""!==statusMsg&&window.alert(statusMsg))}});return FbListJs});