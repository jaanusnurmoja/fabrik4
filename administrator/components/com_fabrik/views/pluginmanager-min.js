var PluginManager=new Class({pluginTotal:0,topTotal:-1,initialize:function(a,c,b){if(typeOf(a)==="string"){a=[a]}this.id=c;this.plugins=a;this.type=b;window.addEvent("domready",function(){var d;this.accordion=new Fx.Accordion([],[],{alwaysHide:true,display:-1,duration:"short"});for(d=0;d<a.length;d++){this.addTop(a[d])}this.periodical=this.iniAccordion.periodical(250,this);this.watchPluginSelect();this.watchDelete();this.watchAdd();var e=document.id("plugins");if(typeOf(e)!=="null"){e.addEvent("click:relay(h3.title)",function(g,f){document.id("plugins").getElements("h3.title").each(function(i){if(i!==f){i.removeClass("pane-toggler-down")}});f.toggleClass("pane-toggler-down")})}}.bind(this))},iniAccordion:function(){if(this.pluginTotal===this.plugins.length){if(this.plugins.length===1){this.accordion.display(0)}else{this.accordion.display(-1)}clearInterval(this.periodical)}},canSaveForm:function(){if(document.readyState!=="complete"){return false}return Fabrik.requestQueue.empty()},watchDelete:function(){document.id("adminForm").addEvent("click:relay(a.removeButton, a[data-button=removeButton])",function(a,b){a.preventDefault();this.pluginTotal--;this.topTotal--;this.deletePlugin(a)}.bind(this))},watchAdd:function(){var a=document.id("addPlugin");if(typeOf(a)!=="null"){a.addEvent("click",function(b){b.stop();this.accordion.display(-1);this.addTop()}.bind(this))}},addTop:function(f){var i,e;if(typeOf(f)==="string"){i=1;e=false;f=f?f:""}else{i=f?f.published:1;e=f?f.show_icon:1;f=f?f.plugin:""}var b=new Element("div.actionContainer.panel.accordion-group");var j=new Element("a.accordion-toggle",{href:"#"});j.adopt(new Element("span.pluginTitle").set("text",f!==""?f+" "+Joomla.JText._("COM_FABRIK_LOADING").toLowerCase():Joomla.JText._("COM_FABRIK_LOADING")));var h=new Element("div.title.pane-toggler.accordion-heading").adopt(new Element("strong").adopt(j));var g=new Element("div.accordion-body");b.adopt(h);b.adopt(g);b.inject(document.id("plugins"));this.accordion.addSection(h,g);var c=this.topTotal+1;var d=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:this.type,plugin:f,plugin_published:i,show_icon:e,c:this.topTotal,id:this.id},update:g,onRequest:function(){if(Fabrik.debug){fconsole("Fabrik pluginmanager: Adding",this.type,"entry",c.toString())}}.bind(this),onSuccess:function(a){if(f!==""){this.addPlugin(f,c)}else{h.getElement("span.pluginTitle").set("text",Joomla.JText._("COM_FABRIK_PLEASE_SELECT"))}this.updateBootStrap();FabrikAdmin.reTip()}.bind(this),onFailure:function(a){fconsole("Fabrik pluginmanager addTop ajax failed:",a)},onException:function(k,a){fconsole("Fabrik pluginmanager addTop ajax exception:",k,a)}});this.topTotal++;Fabrik.requestQueue.add(d)},updateBootStrap:function(){document.getElements(".radio.btn-group label").addClass("btn");document.getElements(".btn-group input[checked=checked]").each(function(b){if(b.get("value")===""){document.getElement("label[for="+b.get("id")+"]").addClass("active btn-primary")}else{if(b.get("value")==="0"){document.getElement("label[for="+b.get("id")+"]").addClass("active btn-danger")}else{document.getElement("label[for="+b.get("id")+"]").addClass("active btn-success")}}if(typeof(jQuery)!=="undefined"){jQuery("*[rel=tooltip]").tooltip()}});document.getElements(".hasTip").each(function(b){var d=b.get("title");if(d){var c=d.split("::",2);b.store("tip:title",c[0]);b.store("tip:text",c[1])}});var a=new Tips($$(".hasTip"),{maxTitleChars:50,fixed:false})},watchPluginSelect:function(){document.id("adminForm").addEvent("change:relay(select.elementtype)",function(d,f){d.preventDefault();var b=f.get("value");var a=f.getParent(".pluginContainer");var e=b!==""?b+" "+Joomla.JText._("COM_FABRIK_LOADING").toLowerCase():Joomla.JText._("COM_FABRIK_PLEASE_SELECT");f.getParent(".actionContainer").getElement("span.pluginTitle").set("text",e);var g=a.id.replace("formAction_","").toInt();this.addPlugin(b,g)}.bind(this))},addPlugin:function(b,d){d=typeOf(d)==="number"?d:this.pluginTotal;if(b===""){document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts").empty();return}var a=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",format:"raw",type:this.type,plugin:b,c:d,id:this.id},update:document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts"),onRequest:function(){if(Fabrik.debug){fconsole("Fabrik pluginmanager: Loading",this.type,"type",b,"for entry",d.toString())}}.bind(this),onSuccess:function(){document.id("plugins").getElements(".actionContainer")[d].getElement("span.pluginTitle").set("text",b);this.pluginTotal++;this.updateBootStrap();FabrikAdmin.reTip()}.bind(this),onFailure:function(c){fconsole("Fabrik pluginmanager addPlugin ajax failed:",c)},onException:function(e,c){fconsole("Fabrik pluginmanager addPlugin ajax exception:",e,c)}});Fabrik.requestQueue.add(a)},deletePlugin:function(b){var d=b.target.getParent("fieldset.pluginContainer");if(typeOf(d)==="null"){return}if(Fabrik.debug){fconsole("Fabrik pluginmanager: Deleting",this.type,"entry",d.id,"and renaming later entries")}if(d.id.match(/_\d+$/)){var a=d.id.match(/_(\d+)$/)[1].toInt();document.id("plugins").getElements("input, select, textarea, label, fieldset").each(function(e){var f=e.name?e.name.match(/\[(\d+)\]/):null;if(!f&&e.id){f=e.id.match(/-(\d+)/)}if(!f&&e.get("tag").toLowerCase()==="label"&&e.get("for")){f=e.get("for").match(/-(\d+)/)}if(f){var g=f[1].toInt();if(g>a){g--;if(e.name){e.name=e.name.replace(/(\[)(\d+)(\])/,"["+g+"]")}if(e.id){e.id=e.id.replace(/(-)(\d+)/,"-"+g)}if(e.get("tag").toLowerCase()==="label"&&e.get("for")){e.set("for",e.get("for").replace(/(-)(\d+)/,"-"+g))}}}});document.id("plugins").getElements("fieldset.pluginContainer").each(function(e){if(e.id.match(/formAction_\d+$/)){var f=e.id.match(/formAction_(\d+)$/)[1].toInt();if(f>a){f=f-1;e.id=e.id.replace(/(formAction_)(\d+)$/,"$1"+f)}}})}b.stop();b.target.getParent(".actionContainer").dispose()}});fabrikAdminPlugin=new Class({Implements:[Options],options:{},initialize:function(c,b,a){this.name=c;this.label=b;this.setOptions(a)},cloned:function(){}});