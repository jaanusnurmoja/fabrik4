var pluginControllers=[];var fabrikAdminElement=new Class({Extends:PluginManager,Implements:[Options,Events],options:{id:0,parentid:0,jsevents:[]},initialize:function(a,b,d){this.parent(a,d,"validationrule");this.setOptions(b);this.watchPluginDd();this.setParentViz();this.jsCounter=0;this.jsactions=["focus","blur","abort","click","change","dblclick","keydown","keypress","keyup","mouseup","mousedown","mouseover","select","load","unload"];this.eEvents=["hide","show","fadeout","fadein","slide in","slide out","slide toggle","clear"];this.eTrigger=this.options.elements;this.eConditions=["<","<=","==",">=",">","!=","hidden","shown"];if(typeOf(document.id("addJavascript"))===false){fconsole("add js button not found")}else{document.id("addJavascript").addEvent("click",function(f){f.stop();this.addJavascript()}.bind(this))}this.options.jsevents.each(function(e){this.addJavascript(e)}.bind(this));document.id("jform_plugin").addEvent("change",function(f){f.stop();this.changePlugin(f)}.bind(this))},changePlugin:function(b){document.id("plugin-container").empty().adopt(new Element("span").set("text","Loading...."));var a=new Request({url:"index.php",evalResponse:false,evalScripts:function(d,e){this.script=d}.bind(this),data:{option:"com_fabrik",id:this.options.id,task:"element.getPluginHTML",format:"raw",plugin:b.target.get("value")},update:document.id("plugin-container"),onComplete:function(d){document.id("plugin-container").set("html",d);$exec(this.script)}.bind(this)}).send()},deleteJS:function(a){a.stop();a.target.up(3).dispose()},addJavascript:function(b){if(typeOf(b)!=="object"){b={params:{js_code:"",js_action:"",js_e_event:"",js_e_trigger:"",js_e_condition:"",js_e_value:"",code:""}}}b.code=b.code?b.code:"";code=new Element("textarea",{rows:8,cols:40,name:"jform[js_code][]","class":"inputbox"}).set("text",b.code);action=this._makeSel(this.jsCounter,"jform[js_action][]",this.jsactions,b.action);var a=this._makeSel(this.jsCounter,"js_e_event[]",this.eEvents,b.params.js_e_event,Joomla.JText._("COM_FABRIK_SELECT_DO"));var d=this._makeSel(this.jsCounter,"js_e_trigger[]",this.eTrigger,b.params.js_e_trigger,Joomla.JText._("COM_FABRIK_SELECT_ON"));var g=this._makeSel(this.jsCounter,"js_e_condition[]",this.eConditions,b.params.js_e_condition,Joomla.JText._("COM_FABRIK_IS"));var e=new Element("table",{"class":"paramlist admintable adminform",id:"jsAction_"+this.jsCounter}).adopt(new Element("tbody",{"class":"adminform",id:"jsAction_"+this.jsCounter}).adopt([new Element("tr").adopt(new Element("td",{colspan:2})),new Element("tr").adopt([new Element("td",{"class":"paramlist_key"}).appendText(Joomla.JText._("COM_FABRIK_ACTION")),new Element("td").adopt(action)]),new Element("tr").adopt([new Element("td",{"class":"paramlist_key"}).appendText(Joomla.JText._("COM_FABRIK_CODE")),new Element("td").adopt(code)]),new Element("tr").adopt(new Element("td",{colspan:2,"class":"paramlist_key",styles:{"text-align":"left"}}).appendText(Joomla.JText._("COM_FABRIK_OR"))),new Element("tr").adopt(new Element("td",{colspan:2}).adopt([a,d,new Element("input",{value:Joomla.JText._("COM_FABRIK_WHERE_THIS"),"class":"readonly",disabled:"disabled",size:Joomla.JText._("COM_FABRIK_WHERE_THIS").length}),g,new Element("input",{name:"js_e_value[]","class":"inputbox",value:b.params.js_e_value})])),new Element("tr").adopt(new Element("td",{colspan:2}).adopt(new Element("a",{href:"#","class":"removeButton",events:{click:function(h){this.deleteJS(h)}.bind(this)}}).appendText(Joomla.JText._("COM_FABRIK_DELETE"))))]));var f=new Element("div");e.inject(f);f.inject(document.id("javascriptActions"));this.jsCounter++},watchPluginDd:function(){document.id("jform_plugin").addEvent("change",function(b){b.stop();var a=b.target.get("value");$$(".elementSettings").each(function(d){if(a===d.id.replace("page-","")){d.setStyles({display:"block"})}else{d.setStyles({display:"none"})}})});if(document.id("page-"+this.options.plugin)){document.id("page-"+this.options.plugin).setStyles({display:"block"})}},setParentViz:function(){if(this.options.parentid.toInt()!==0){myFX=new Fx.Tween("elementFormTable",{property:"opacity",duration:500,wait:false}).set(0);document.id("unlink").addEvent("click",function(b){var a=(this.checked)?"":"readonly";if(this.checked){myFX.start(0,1)}else{myFX.start(1,0)}})}if(document.id("swapToParent")){document.id("swapToParent").addEvent("click",function(b){var a=document.adminForm;a.task.value="element.parentredirect";var d=b.target.className.replace("element_","");a.redirectto.value=d;a.submit()})}},getPluginTop:function(b,a){return new Element("tr").adopt(new Element("td").adopt([new Element("input",{value:Joomla.JText._("COM_FABRIK_ACTION"),size:3,readonly:true,"class":"readonly"}),this._makeSel("inputbox elementtype","jform[validationrule][plugin][]",this.plugins,b)]))}});function setAllCheckBoxes(f,d){var b=document.getElementsByName(f);var e=b.length;for(var a=0;a<e;a++){b[a].checked=d}}function setAllDropDowns(d,a){els=document.getElementsByName(d);c=els.length;for(var b=0;b<c;b++){els[b].selectedIndex=a}}function setAll(b,d){els=document.getElementsByName(d);c=els.length;for(var a=0;a<c;a++){els[a].value=b}}function deleteSubElements(a){var b=document.id(a);b.parentNode.removeChild(b)};