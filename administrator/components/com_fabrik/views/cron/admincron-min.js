/*! Fabrik */

define(["jquery","admin/pluginmanager"],function(a,b){return new Class({Extends:b,Implements:[Options,Events],options:{plugin:""},initialize:function(a){var b=[];this.parent(b),this.setOptions(a),this.watchSelector()},watchSelector:function(){void 0!==a&&a("#jform_plugin").bind("change",function(a){this.changePlugin(a)}.bind(this)),document.id("jform_plugin").addEvent("change",function(a){a.stop(),this.changePlugin(a)}.bind(this))},changePlugin:function(a){new Request.HTML({url:"index.php",data:{option:"com_fabrik",task:"cron.getPluginHTML",format:"raw",plugin:a.target.get("value")},update:document.id("plugin-container"),onComplete:function(){this.updateBootStrap()}.bind(this)}).send()}})});