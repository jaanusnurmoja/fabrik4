var PluginManager=new Class({pluginTotal:0,topTotal:-1,initialize:function(a,c,b){if(typeOf(a)==="string"){a=[a]}this.id=c;this.plugins=a;this.type=b;window.addEvent("domready",function(){this.accordion=new Fx.Accordion([],[],{alwaysHide:false,display:-1});for(var d=0;d<a.length;d++){this.addTop(a[d])}this.periodical=this.iniAccordian.periodical(500,this);this.watchPluginSelect();this.watchDelete();this.watchAdd();var e=document.id("plugins");if(typeOf(e)!=="null"){e.addEvent("click:relay(h3.title)",function(g,f){document.id("plugins").getElements("h3.title").each(function(i){if(i!==f){i.removeClass("pane-toggler-down")}});f.toggleClass("pane-toggler-down")})}}.bind(this))},iniAccordian:function(){if(this.pluginTotal===this.plugins.length){this.accordion.display(1);clearInterval(this.periodical)}},canSaveForm:function(){if(document.readyState!=="complete"){return false}return Fabrik.requestQueue.empty()},watchDelete:function(){document.id("adminForm").addEvent("click:relay(a.removeButton, a[data-button=removeButton])",function(a,b){a.preventDefault();this.pluginTotal--;this.topTotal--;this.deletePlugin(a)}.bind(this))},watchAdd:function(){var a=document.id("addPlugin");if(typeOf(a)!=="null"){a.addEvent("click",function(b){b.stop();this.accordion.display(-1);this.addTop()}.bind(this))}},addTop:function(f){var h;if(typeOf(f)==="string"){h=1;f=f?f:"";show_icon=false}else{h=f?f.published:1;show_icon=f?f.show_icon:1;f=f?f.plugin:""}var i=new Element("div.actionContainer.panel.accordion-group");var c=new Element("a.accordion-toggle",{href:"#"}).adopt(new Element("span.pluginTitle").set("text",f));var g=new Element("div.title.pane-toggler.accordion-heading").adopt(new Element("strong").adopt(c));i.adopt(g);i.adopt(new Element("div.accordion-body"));i.inject(document.id("plugins"));var b=document.id("plugins").getElements(".actionContainer").getLast();var d=this.topTotal;var e=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:this.type,plugin:f,plugin_published:h,show_icon:show_icon,c:this.topTotal,id:this.id},append:b,onSuccess:function(a){if(f!==""){this.addPlugin(f,d+1)}this.accordion.addSection(g,i.getElement(".pane-slider"));this.updateBootStrap();FabrikAdmin.reTip()}.bind(this),onFailure:function(a){console.log("fail",a)},onException:function(j,a){console.log("excetiprion",j,a)}});this.topTotal++;Fabrik.requestQueue.add(e)},updateBootStrap:function(){document.getElements(".radio.btn-group label").addClass("btn");document.getElements(".btn-group input[checked=checked]").each(function(b){if(b.get("value")===""){document.getElement("label[for="+b.get("id")+"]").addClass("active btn-primary")}else{if(b.get("value")==="0"){document.getElement("label[for="+b.get("id")+"]").addClass("active btn-danger")}else{document.getElement("label[for="+b.get("id")+"]").addClass("active btn-success")}}if(typeof(jQuery)!=="undefined"){jQuery("*[rel=tooltip]").tooltip()}});document.getElements(".hasTip").each(function(b){var d=b.get("title");if(d){var c=d.split("::",2);b.store("tip:title",c[0]);b.store("tip:text",c[1])}});var a=new Tips($$(".hasTip"),{maxTitleChars:50,fixed:false})},watchPluginSelect:function(){document.id("adminForm").addEvent("change:relay(select.elementtype)",function(d,e){d.preventDefault();var b=e.get("value");var a=e.getParent(".pluginContainer");e.getParent(".actionContainer").getElement("span.pluginTitle").set("text",b);var f=a.id.replace("formAction_","").toInt();this.addPlugin(b,f)}.bind(this))},addPlugin:function(b,d){d=typeOf(d)==="number"?d:this.pluginTotal;if(b===""){document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts").empty();return}var a=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",format:"raw",type:this.type,plugin:b,c:d,id:this.id},update:document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts"),onComplete:function(){this.updateBootStrap();FabrikAdmin.reTip()}.bind(this)});this.pluginTotal++;Fabrik.requestQueue.add(a)},deletePlugin:function(b){var d=b.target.getParent(".pluginContainer");if(typeOf(d)==="null"){return}if(d.id.test(/_\d+$/)){var a=b.target.getParent("fieldset").id.match(/_(\d+)$/)[1].toInt();document.id("plugins").getElements("input, select, textarea").each(function(e){var f=e.name.match(/\[[0-9]+\]/);if(f){var g=f[0].replace("[","").replace("]","").toInt();if(g>a){g=g-1;e.name=e.name.replace(/\[[0-9]+\]/,"["+g+"]")}}});document.id("plugins").getElements(".adminform").each(function(e){if(e.id.match(/formAction_\d+$/)){var f=e.id.match(/formAction_(\d+)$/)[1].toInt();if(f>a){f=f-1;e.id=e.id.replace(/(formAction_)(\d+)$/,"$1"+f)}}})}b.stop();document.id(b.target).getParent(".actionContainer").dispose();this.counter--}});fabrikAdminPlugin=new Class({Implements:[Options],options:{},initialize:function(c,b,a){this.name=c;this.label=b;this.setOptions(a)},cloned:function(){}});