var pluginControllers=[];var fabrikAdminElement=new Class({Extends:PluginManager,Implements:[Options,Events],options:{id:0,parentid:0,jsevents:[],deleteButton:"removeButton"},initialize:function(a,b,d){this.parent(a,d,"validationrule");this.setOptions(b);this.setParentViz();this.jsCounter=0;this.jsactions=["focus","blur","abort","click","change","dblclick","keydown","keypress","keyup","mouseup","mousedown","mouseover","select","load","unload"];this.eEvents=["hide","show","fadeout","fadein","slide in","slide out","slide toggle","clear"];this.eTrigger=this.options.elements;this.eConditions=["<","<=","==",">=",">","!=","hidden","shown","CONTAINS","!CONTAINS"];if(typeOf(document.id("addJavascript"))===false){fconsole("add js button not found")}else{document.id("addJavascript").addEvent("click",function(f){f.stop();this.addJavascript()}.bind(this))}this.options.jsevents.each(function(e){this.addJavascript(e)}.bind(this));document.id("jform_plugin").addEvent("change",function(f){this.changePlugin(f)}.bind(this))},changePlugin:function(b){document.id("plugin-container").empty().adopt(new Element("span").set("text","Loading...."));var a=new Request({url:"index.php",evalResponse:false,evalScripts:function(d,e){this.script=d}.bind(this),data:{option:"com_fabrik",id:this.options.id,task:"element.getPluginHTML",format:"raw",plugin:b.target.get("value")},update:document.id("plugin-container"),onComplete:function(d){document.id("plugin-container").set("html",d);Browser.exec(this.script);this.updateBootStrap()}.bind(this)}).send()},deleteJS:function(a){a.stop();a.target.up(3).dispose()},addJavascript:function(e){if(typeOf(e)!=="object"){e={params:{js_code:"",js_action:"",js_e_event:"",js_e_trigger:"",js_e_condition:"",js_e_value:"",code:"",js_published:1}}}e.code=e.code?e.code:"";code=new Element("textarea",{rows:8,cols:40,name:"jform[js_code][]","class":"inputbox"}).set("text",e.code);var k=e.params.js_published?e.params.js_published:"1";var a=[];var b={value:1};var h={value:0};if(k.toInt()===0){h.selected="selected"}else{b.selected="selected"}a.push(new Element("option",h).set("text",Joomla.JText._("JNO")));a.push(new Element("option",b).set("text",Joomla.JText._("JYES")));k=new Element("select.inputbox.elementtype",{name:"jform[js_publised][]"}).adopt(a);action=this._makeSel(this.jsCounter+" input-small","jform[js_action][]",this.jsactions,e.action," - On - ");var l=this._makeSel(this.jsCounter+" input-mini","js_e_event[]",this.eEvents,e.params.js_e_event,Joomla.JText._("COM_FABRIK_SELECT_DO"));var j=this._makeSel(this.jsCounter,"js_e_trigger[]",this.eTrigger,e.params.js_e_trigger,Joomla.JText._("COM_FABRIK_SELECT_ON"));var f=this._makeSel(this.jsCounter+" input-mini","js_e_condition[]",this.eConditions,e.params.js_e_condition,Joomla.JText._("COM_FABRIK_IS"));var g=new Element("td",{colspan:2});g.set("html",this.options.deleteButton);var i=new Element("table",{"class":"paramlist admintable adminform",id:"jsAction_"+this.jsCounter}).adopt(new Element("tbody",{"class":"adminform",id:"jsAction_"+this.jsCounter}).adopt([new Element("tr").adopt(new Element("td",{colspan:2})),new Element("tr").adopt([new Element("td",{"class":"paramlist_key"}).appendText(Joomla.JText._("COM_FABRIK_ACTION")),new Element("td").adopt(action)]),new Element("tr").adopt([new Element("td",{"class":"paramlist_key"}).appendText(Joomla.JText._("COM_FABRIK_PUBLISHED")),new Element("td").adopt(k)]),new Element("tr").adopt([new Element("td",{"class":"paramlist_key"}).appendText(Joomla.JText._("COM_FABRIK_CODE")),new Element("td").adopt(code)]),new Element("tr").adopt(new Element("td",{colspan:2,"class":"paramlist_key",styles:{"text-align":"left"}}).appendText(Joomla.JText._("COM_FABRIK_OR"))),new Element("tr").adopt(new Element("td",{colspan:2}).adopt([l,j,new Element("input",{value:Joomla.JText._("COM_FABRIK_WHERE_THIS"),"class":"readonly input-mini",disabled:"disabled",size:Joomla.JText._("COM_FABRIK_WHERE_THIS").length}),f,new Element("input",{name:"js_e_value[]","class":"inputbox",value:e.params.js_e_value})])),new Element("tr").adopt(g)]));g.getElement("a").addEvent("click",function(m){this.deleteJS(m)}.bind(this));var d=new Element("div");i.inject(d);d.inject(document.id("javascriptActions"));this.jsCounter++},watchPluginDd:function(){},setParentViz:function(){if(this.options.parentid.toInt()!==0){myFX=new Fx.Tween("elementFormTable",{property:"opacity",duration:500,wait:false}).set(0);document.id("unlink").addEvent("click",function(b){var a=(this.checked)?"":"readonly";if(this.checked){myFX.start(0,1)}else{myFX.start(1,0)}})}if(document.id("swapToParent")){document.id("swapToParent").addEvent("click",function(b){var a=document.adminForm;a.task.value="element.parentredirect";var d=b.target.className.replace("element_","");a.redirectto.value=d;a.submit()})}},getPluginTop:function(b,a){return new Element("tr").adopt(new Element("td").adopt([new Element("input",{value:Joomla.JText._("COM_FABRIK_ACTION"),size:3,readonly:true,"class":"readonly"}),this._makeSel("inputbox elementtype","jform[validationrule][plugin][]",this.plugins,b)]))}});function setAllCheckBoxes(f,d){var b=document.getElementsByName(f);var e=b.length;for(var a=0;a<e;a++){b[a].checked=d}}function setAllDropDowns(d,a){els=document.getElementsByName(d);c=els.length;for(var b=0;b<c;b++){els[b].selectedIndex=a}}function setAll(b,d){els=document.getElementsByName(d);c=els.length;for(var a=0;a<c;a++){els[a].value=b}}function deleteSubElements(a){var b=document.id(a);b.parentNode.removeChild(b)};