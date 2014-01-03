var fabrikAdminElement=new Class({Extends:PluginManager,Implements:[Options,Events],options:{id:0,parentid:0,jsevents:[],jsTotal:0,deleteButton:"removeButton"},jsCounter:-1,jsAjaxed:0,initialize:function(a,b,c){if(Fabrik.debug){fconsole("Fabrik adminelement.js: Initialising",a,b,c)}this.parent(a,c,"validationrule");this.setOptions(b);this.setParentViz();this.jsAccordion=new Fx.Accordion([],[],{alwaysHide:true,display:-1,duration:"short"});window.addEvent("domready",function(){if(typeOf(document.id("addJavascript"))==="null"){fconsole("Fabrik adminelement.js: javascript tab Add button not found")}else{document.id("addJavascript").addEvent("click",function(f){f.stop();this.jsAccordion.display(-1);this.addJavascript()}.bind(this))}this.options.jsevents.each(function(e){this.addJavascript(e)}.bind(this));this.jsPeriodical=this.iniJsAccordion.periodical(250,this);document.id("jform_plugin").addEvent("change",function(f){this.changePlugin(f)}.bind(this));document.id("javascriptActions").addEvent("click:relay(a[data-button=removeButton])",function(g,f){g.stop();this.deleteJS(f)}.bind(this));document.id("javascriptActions").addEvent('change:relay(select[id^="jform_action-"],select[id^="jform_js_e_event-"],select[id^="jform_js_e_trigger-"],select[id^="jform_js_e_condition-"],input[id^="jform_js_e_value-"])',function(g,f){this.setAccordionHeader(f.getParent(".actionContainer"))}.bind(this));var d=document.id("plugins");if(typeOf(d)!=="null"){d.addEvent("click:relay(h3.title)",function(g,f){document.id("plugins").getElements("h3.title").each(function(e){if(e!==f){e.removeClass("pane-toggler-down")}});f.toggleClass("pane-toggler-down")})}}.bind(this))},iniJsAccordion:function(){if(this.jsAjaxed===this.options.jsevents.length){if(this.options.jsevents.length===1){this.jsAccordion.display(0)}else{this.jsAccordion.display(-1)}clearInterval(this.jsPeriodical)}},changePlugin:function(b){document.id("plugin-container").empty().adopt(new Element("span").set("text",Joomla.JText._("COM_FABRIK_LOADING")));var a=new Request({url:"index.php",evalResponse:false,evalScripts:function(c,d){this.script=c}.bind(this),data:{option:"com_fabrik",id:this.options.id,task:"element.getPluginHTML",format:"raw",plugin:b.target.get("value")},update:document.id("plugin-container"),onComplete:function(c){document.id("plugin-container").set("html",c);Browser.exec(this.script);this.updateBootStrap();FabrikAdmin.reTip()}.bind(this)});Fabrik.requestQueue.add(a)},deleteJS:function(a){var b=a.getParent("div.actionContainer");if(Fabrik.debug){fconsole("Fabrik adminelement.js: Deleting JS entry: ",b.id)}b.dispose();this.jsAjaxed--},addJavascript:function(f){var e=f&&f.id?f.id:0;var j=new Element("div.actionContainer.panel.accordion-group");var d=new Element("a.accordion-toggle",{href:"#"});d.adopt(new Element("span.pluginTitle").set("text",Joomla.JText._("COM_FABRIK_LOADING")));var h=new Element("div.title.pane-toggler.accordion-heading").adopt(new Element("strong").adopt(d));var b=new Element("div.accordion-body");j.adopt(h);j.adopt(b);this.jsAccordion.addSection(h,b);j.inject(document.id("javascriptActions"));var i=this.jsCounter;var g=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:"elementjavascript",plugin:null,plugin_published:true,c:i,id:e,elementid:this.id},update:b,onRequest:function(){if(Fabrik.debug){fconsole("Fabrik adminelement.js: Adding JS entry",(i+1).toString())}},onComplete:function(a){b.getElement('textarea[id^="jform_code-"]').addEvent("change",function(c,k){this.setAccordionHeader(c.getParent(".actionContainer"))}.bind(this));this.setAccordionHeader(j);this.jsAjaxed++;this.updateBootStrap();FabrikAdmin.reTip()}.bind(this),onFailure:function(a){fconsole("Fabrik adminelement.js addJavascript: ajax failure: ",a)},onException:function(c,a){fconsole("Fabrik adminelement.js addJavascript: ajax exception: ",c,a)}});this.jsCounter++;Fabrik.requestQueue.add(g);this.updateBootStrap();FabrikAdmin.reTip()},setAccordionHeader:function(k){if(typeOf(k)==="null"){return}var i=k.getElement("span.pluginTitle");var g=k.getElement('select[id^="jform_action-"]');if(g.value===""){i.set("html",'<span style="color:red;">'+Joomla.JText._("COM_FABRIK_JS_SELECT_EVENT")+"</span>");return}var o="on "+g.getSelected()[0].text+" : ";var d=k.getElement('textarea[id^="jform_code-"]');var a=k.getElement('select[id^="jform_js_e_event-"]');var e=k.getElement('select[id^="jform_js_e_trigger-"]');var b=document.id("jform_name");var l=k.getElement('input[id^="jform_js_e_value-"]');var f=k.getElement('select[id^="jform_js_e_condition-"]');var n="";if(d.value.clean()!==""){var h=d.value.split("\n")[0].trim();var j=h.match(/^\/\*(.*)\*\//);if(j){n=j[1]}else{n=Joomla.JText._("COM_FABRIK_JS_INLINE_JS_CODE")}if(d.value.replace(/(['"]).*?[^\\]\1/g,"").test("//")){n+=' &nbsp; <span style="color:red;font-weight:bold;">';n+=Joomla.JText._("COM_FABRIK_JS_INLINE_COMMENT_WARNING").replace(/ /g,"&nbsp;");n+="</span>"}}else{if(a.value&&e.value&&b.value){n=Joomla.JText._("COM_FABRIK_JS_WHEN_ELEMENT")+' "'+b.value+'" ';if(f.getSelected()[0].text.test(/hidden|shown/)){n+=Joomla.JText._("COM_FABRIK_JS_IS")+" ";n+=f.getSelected()[0].text+", "}else{n+=f.getSelected()[0].text+' "'+l.value.trim()+'", '}var m=e.getSelected().getParent("optgroup").get("label")[0].toLowerCase();n+=a.getSelected()[0].text+" "+m.substring(0,m.length-1);n+=' "'+e.getSelected()[0].text+'"'}else{o+='<span style="color:red;">'+Joomla.JText._("COM_FABRIK_JS_NO_ACTION")+"</span>"}}if(n!==""){o+='<span style="font-weight:normal">'+n+"</span>"}i.set("html",o)},setParentViz:function(){if(this.options.parentid.toInt()!==0){var a=new Fx.Tween("elementFormTable",{property:"opacity",duration:500,wait:false}).set(0);document.id("unlink").addEvent("click",function(b){if(this.checked){a.start(0,1)}else{a.start(1,0)}})}if(document.id("swapToParent")){document.id("swapToParent").addEvent("click",function(c){var b=document.adminForm;b.task.value="element.parentredirect";var d=c.target.className.replace("element_","");b.redirectto.value=d;b.submit()})}}});