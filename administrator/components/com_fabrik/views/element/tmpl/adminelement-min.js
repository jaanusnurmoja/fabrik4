/*! fabrik */
var fabrikAdminElement=new Class({Extends:PluginManager,Implements:[Options,Events],options:{id:0,parentid:0,jsevents:[],jsTotal:0,deleteButton:"removeButton"},jsCounter:-1,jsAjaxed:0,initialize:function(a,b,c){Fabrik.debug&&fconsole("Fabrik adminelement.js: Initialising",a,b,c),this.parent(a,c,"validationrule"),this.setOptions(b),this.setParentViz(),this.jsAccordion=new Fx.Accordion([],[],{alwaysHide:!0,display:-1,duration:"short"}),window.addEvent("domready",function(){"null"===typeOf(document.id("addJavascript"))?fconsole("Fabrik adminelement.js: javascript tab Add button not found"):document.id("addJavascript").addEvent("click",function(a){a.stop(),this.jsAccordion.display(-1),this.addJavascript()}.bind(this)),this.options.jsevents.each(function(a){this.addJavascript(a)}.bind(this)),this.jsPeriodical=this.iniJsAccordion.periodical(250,this),document.id("jform_plugin").addEvent("change",function(a){this.changePlugin(a)}.bind(this)),document.id("javascriptActions").addEvent("click:relay(a[data-button=removeButton])",function(a,b){a.stop(),this.deleteJS(b)}.bind(this)),document.id("javascriptActions").addEvent('change:relay(select[id^="jform_action-"],select[id^="jform_js_e_event-"],select[id^="jform_js_e_trigger-"],select[id^="jform_js_e_condition-"],input[id^="jform_js_e_value-"])',function(a,b){this.setAccordionHeader(b.getParent(".actionContainer"))}.bind(this));var a=document.id("plugins");"null"!==typeOf(a)&&a.addEvent("click:relay(h3.title)",function(a,b){document.id("plugins").getElements("h3.title").each(function(a){a!==b&&a.removeClass("pane-toggler-down")}),b.toggleClass("pane-toggler-down")})}.bind(this))},iniJsAccordion:function(){this.jsAjaxed===this.options.jsevents.length&&(this.jsAccordion.display(1===this.options.jsevents.length?0:-1),clearInterval(this.jsPeriodical))},changePlugin:function(a){document.id("plugin-container").empty().adopt(new Element("span").set("text",Joomla.JText._("COM_FABRIK_LOADING")));var b=new Request({url:"index.php",evalResponse:!1,evalScripts:function(a){this.script=a}.bind(this),data:{option:"com_fabrik",id:this.options.id,task:"element.getPluginHTML",format:"raw",plugin:a.target.get("value")},update:document.id("plugin-container"),onComplete:function(a){document.id("plugin-container").set("html",a),Browser.exec(this.script),this.updateBootStrap(),FabrikAdmin.reTip()}.bind(this)});Fabrik.requestQueue.add(b)},deleteJS:function(a){var b=a.getParent("div.actionContainer");Fabrik.debug&&fconsole("Fabrik adminelement.js: Deleting JS entry: ",b.id),b.dispose(),this.jsAjaxed--},addJavascript:function(a){var b=a&&a.id?a.id:0,c=new Element("div.actionContainer.panel.accordion-group"),d=new Element("a.accordion-toggle",{href:"#"});d.adopt(new Element("span.pluginTitle").set("text",Joomla.JText._("COM_FABRIK_LOADING")));var e=new Element("div.title.pane-toggler.accordion-heading").adopt(new Element("strong").adopt(d)),f=new Element("div.accordion-body");c.adopt(e),c.adopt(f),this.jsAccordion.addSection(e,f),c.inject(document.id("javascriptActions"));var g=this.jsCounter,h=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:"elementjavascript",plugin:null,plugin_published:!0,c:g,id:b,elementid:this.id},update:f,onRequest:function(){Fabrik.debug&&fconsole("Fabrik adminelement.js: Adding JS entry",(g+1).toString())},onComplete:function(){f.getElement('textarea[id^="jform_code-"]').addEvent("change",function(a){this.setAccordionHeader(a.target.getParent(".actionContainer"))}.bind(this)),this.setAccordionHeader(c),this.jsAjaxed++,this.updateBootStrap(),FabrikAdmin.reTip()}.bind(this),onFailure:function(a){fconsole("Fabrik adminelement.js addJavascript: ajax failure: ",a)},onException:function(a,b){fconsole("Fabrik adminelement.js addJavascript: ajax exception: ",a,b)}});this.jsCounter++,Fabrik.requestQueue.add(h),this.updateBootStrap(),FabrikAdmin.reTip()},setAccordionHeader:function(a){if("null"!==typeOf(a)){var b=a.getElement("span.pluginTitle"),c=a.getElement('select[id^="jform_action-"]');if(""===c.value)return void b.set("html",'<span style="color:red;">'+Joomla.JText._("COM_FABRIK_JS_SELECT_EVENT")+"</span>");var d="on "+c.getSelected()[0].text+" : ",e=a.getElement('textarea[id^="jform_code-"]'),f=a.getElement('select[id^="jform_js_e_event-"]'),g=a.getElement('select[id^="jform_js_e_trigger-"]'),h=document.id("jform_name"),i=a.getElement('input[id^="jform_js_e_value-"]'),j=a.getElement('select[id^="jform_js_e_condition-"]'),k="";if(""!==e.value.clean()){var l=e.value.split("\n")[0].trim(),m=l.match(/^\/\*(.*)\*\//);k=m?m[1]:Joomla.JText._("COM_FABRIK_JS_INLINE_JS_CODE"),e.value.replace(/(['"]).*?[^\\]\1/g,"").test("//")&&(k+=' &nbsp; <span style="color:red;font-weight:bold;">',k+=Joomla.JText._("COM_FABRIK_JS_INLINE_COMMENT_WARNING").replace(/ /g,"&nbsp;"),k+="</span>")}else if(f.value&&g.value&&h.value){k=Joomla.JText._("COM_FABRIK_JS_WHEN_ELEMENT")+' "'+h.value+'" ',j.getSelected()[0].text.test(/hidden|shown/)?(k+=Joomla.JText._("COM_FABRIK_JS_IS")+" ",k+=j.getSelected()[0].text+", "):k+=j.getSelected()[0].text+' "'+i.value.trim()+'", ';var n=g.getSelected().getParent("optgroup").get("label")[0].toLowerCase();k+=f.getSelected()[0].text+" "+n.substring(0,n.length-1),k+=' "'+g.getSelected()[0].text+'"'}else d+='<span style="color:red;">'+Joomla.JText._("COM_FABRIK_JS_NO_ACTION")+"</span>";""!==k&&(d+='<span style="font-weight:normal">'+k+"</span>"),b.set("html",d)}},setParentViz:function(){if(0!==this.options.parentid.toInt()){var a=new Fx.Tween("elementFormTable",{property:"opacity",duration:500,wait:!1}).set(0);document.id("unlink").addEvent("click",function(){this.checked?a.start(0,1):a.start(1,0)})}document.id("swapToParent")&&document.id("swapToParent").addEvent("click",function(a){var b=document.adminForm;b.task.value="element.parentredirect";var c=a.target.className.replace("element_","");b.redirectto.value=c,b.submit()})}});