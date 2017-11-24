/*! Fabrik */

define(["jquery","fab/fabrik"],function(a,b){return new Class({pluginTotal:0,topTotal:-1,initialize:function(a,b,c){"string"===typeOf(a)&&(a=[a]),this.id=b,this.plugins=a,this.type=c,window.addEvent("domready",function(){var b;for(this.accordion=new Fx.Accordion([],[],{alwaysHide:!0,display:-1,duration:"short"}),b=0;b<a.length;b++)this.addTop(a[b]);this.periodical=this.iniAccordion.periodical(250,this),this.watchPluginSelect(),this.watchDelete(),this.watchAdd();var c=document.id("plugins");"null"!==typeOf(c)&&(c.addEvent("click:relay(h3.title)",function(a,b){document.id("plugins").getElements("h3.title").each(function(a){a!==b&&a.removeClass("pane-toggler-down")}),b.toggleClass("pane-toggler-down")}),this.watchDescriptions(c))}.bind(this))},watchDescriptions:function(a){a.addEvent("keyup:relay(input[name*=plugin_description])",function(a,b){var c=b.getParent(".actionContainer"),d=c.getElement(".pluginTitle"),e=c.getElement("select[name*=plugin]").getValue(),f=b.getValue();d.set("text",e+": "+f)})},iniAccordion:function(){this.pluginTotal===this.plugins.length&&(1===this.plugins.length?this.accordion.display(0):this.accordion.display(-1),clearInterval(this.periodical))},canSaveForm:function(){return"complete"===document.readyState&&b.requestQueue.empty()},watchDelete:function(){document.id("adminForm").addEvent("click:relay(a.removeButton, a[data-button=removeButton])",function(a,b){a.preventDefault(),this.pluginTotal--,this.topTotal--,this.deletePlugin(a)}.bind(this))},watchAdd:function(){var a=document.id("addPlugin");"null"!==typeOf(a)&&a.addEvent("click",function(a){a.stop(),this.accordion.display(-1),this.addTop()}.bind(this))},addTop:function(a){var c,d,e,f,g,h;"string"===typeOf(a)?(c=1,d=!1,g=!1,h=!0,a=a||"",e="",f=""):(c=a?a.published:1,d=a?a.show_icon:1,g=a?a.must_validate:0,h=a?a.validate_hidden:1,e=a?a.validate_in:"both",f=a?a.validation_on:"both",a=a?a.plugin:"");var i=new Element("div.actionContainer.panel.accordion-group"),j=new Element("a.accordion-toggle",{href:"#"});j.adopt(new Element("span.pluginTitle").set("text",""!==a?a+" "+Joomla.JText._("COM_FABRIK_LOADING").toLowerCase():Joomla.JText._("COM_FABRIK_LOADING")));var k=new Element("div.title.pane-toggler.accordion-heading").adopt(new Element("strong").adopt(j)),l=new Element("div.accordion-body");i.adopt(k),i.adopt(l),i.inject(document.id("plugins")),this.accordion.addSection(k,l);var m=this.topTotal+1,n={option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:this.type,plugin:a,plugin_published:c,show_icon:d,must_validate:g,validate_hidden:h,validate_in:e,validation_on:f,c:this.topTotal,id:this.id},o=new Request.HTML({url:"index.php",data:n,update:l,onRequest:function(){b.debug&&fconsole("Fabrik pluginmanager: Adding",this.type,"entry",m.toString())}.bind(this),onSuccess:function(b){""!==a?this.addPlugin(a,m):k.getElement("span.pluginTitle").set("text",Joomla.JText._("COM_FABRIK_PLEASE_SELECT")),this.updateBootStrap(),FabrikAdmin.reTip()}.bind(this),onFailure:function(a){fconsole("Fabrik pluginmanager addTop ajax failed:",a)},onException:function(a,b){fconsole("Fabrik pluginmanager addTop ajax exception:",a,b)}});this.topTotal++,b.requestQueue.add(o)},updateBootStrap:function(){document.getElements(".radio.btn-group label").addClass("btn"),document.getElements(".btn-group input[checked=checked]").each(function(b){""===b.get("value")?document.getElement("label[for="+b.get("id")+"]").addClass("active btn-primary"):"0"===b.get("value")?document.getElement("label[for="+b.get("id")+"]").addClass("active btn-danger"):document.getElement("label[for="+b.get("id")+"]").addClass("active btn-success"),void 0!==a&&a("*[rel=tooltip]").tooltip()}),document.getElements(".hasTip").each(function(a){var b=a.get("title");if(b){var c=b.split("::",2);a.store("tip:title",c[0]),a.store("tip:text",c[1])}});new Tips($$(".hasTip"),{maxTitleChars:50,fixed:!1})},watchPluginSelect:function(){document.id("adminForm").addEvent("change:relay(select.elementtype)",function(a,b){a.preventDefault();var c=b.get("value"),d=b.getParent(".pluginContainer"),e=""!==c?c+" "+Joomla.JText._("COM_FABRIK_LOADING").toLowerCase():Joomla.JText._("COM_FABRIK_PLEASE_SELECT");b.getParent(".actionContainer").getElement("span.pluginTitle").set("text",e);var f=d.id.replace("formAction_","").toInt();this.addPlugin(c,f)}.bind(this))},addPlugin:function(c,d){if(d="number"===typeOf(d)?d:this.pluginTotal,""===c)return void document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts").empty();var e=new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",format:"raw",type:this.type,plugin:c,c:d,id:this.id},update:document.id("plugins").getElements(".actionContainer")[d].getElement(".pluginOpts"),onRequest:function(){b.debug&&fconsole("Fabrik pluginmanager: Loading",this.type,"type",c,"for entry",d.toString())}.bind(this),onSuccess:function(){var b=document.id("plugins").getElements(".actionContainer")[d],e=b.getElement("span.pluginTitle"),f=c,g=b.getElement("input[name*=plugin_description]");g&&(f+=": "+g.getValue()),e.set("text",f),this.pluginTotal++,this.updateBootStrap(),FabrikAdmin.reTip(),a(document).trigger("subform-row-add",b)}.bind(this),onFailure:function(a){fconsole("Fabrik pluginmanager addPlugin ajax failed:",a)},onException:function(a,b){fconsole("Fabrik pluginmanager addPlugin ajax exception:",a,b)}});b.requestQueue.add(e)},deletePlugin:function(a){var c=a.target.getParent("fieldset.pluginContainer");if("null"!==typeOf(c)){if(b.debug&&fconsole("Fabrik pluginmanager: Deleting",this.type,"entry",c.id,"and renaming later entries"),c.id.match(/_\d+$/)){var d=c.id.match(/_(\d+)$/)[1].toInt();document.id("plugins").getElements("input, select, textarea, label, fieldset").each(function(a){var b=a.name?a.name.match(/\[(\d+)\]/):null;if(!b&&a.id&&(b=a.id.match(/-(\d+)/)),!b&&"label"===a.get("tag").toLowerCase()&&a.get("for")&&(b=a.get("for").match(/-(\d+)/)),b){var c=b[1].toInt();c>d&&(c--,a.name&&(a.name=a.name.replace(/(\[)(\d+)(\])/,"["+c+"]")),a.id&&(a.id=a.id.replace(/(-)(\d+)/,"-"+c)),"label"===a.get("tag").toLowerCase()&&a.get("for")&&a.set("for",a.get("for").replace(/(-)(\d+)/,"-"+c)))}}),document.id("plugins").getElements("fieldset.pluginContainer").each(function(a){if(a.id.match(/formAction_\d+$/)){var b=a.id.match(/formAction_(\d+)$/)[1].toInt();b>d&&(b-=1,a.id=a.id.replace(/(formAction_)(\d+)$/,"$1"+b))}})}a.stop(),a.target.getParent(".actionContainer").dispose()}}})});