var AdminVisualization=new Class({Implements:[Options,Events],options:{},initialize:function(a,b){this.setOptions(a);this.watchSelector()},watchSelector:function(){$("jform_plugin").addEvent("change",function(b){b.stop();var a=new Request.HTML({url:"index.php",data:{option:"com_fabrik",task:"visualization.getPluginHTML",format:"raw",plugin:b.target.get("value")},update:document.id("plugin-container")}).send()})}});