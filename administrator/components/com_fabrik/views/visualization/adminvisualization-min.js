/*! Fabrik */
var AdminVisualization=new Class({Extends:PluginManager,Implements:[Options,Events],options:{},initialize:function(a){this.setOptions(a),this.watchSelector()},watchSelector:function(){"undefined"!=typeof jQuery?jQuery("#jform_plugin").bind("change",function(a){this.changePlugin(a)}.bind(this)):document.id("jform_plugin").addEvent("change",function(a){a.stop(),this.changePlugin(a)}.bind(this))},changePlugin:function(a){new Request({url:"index.php",evalResponse:!1,evalScripts:function(a){this.script=a}.bind(this),data:{option:"com_fabrik",task:"visualization.getPluginHTML",format:"raw",plugin:a.target.get("value")},update:document.id("plugin-container"),onComplete:function(a){document.id("plugin-container").set("html",a),Browser.exec(this.script),this.updateBootStrap()}.bind(this)}).send()}});