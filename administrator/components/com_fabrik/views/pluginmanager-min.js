var PluginManager=new Class({pluginTotal:-1,initialize:function(a,d,c){this.id=d;this.type=c;this.accordion=new Fx.Accordion([],[],{alwaysHide:true});for(var b=0;b<a.length;b++){this.addTop(a[b])}this.watchPluginSelect();this.watchDelete();this.watchAdd();document.id("plugins").addEvent("click:relay(h3.title)",function(g,f){document.id("plugins").getElements("h3.title").each(function(e){if(e!==f){e.removeClass("pane-toggler-down")}});f.toggleClass("pane-toggler-down")})},_makeSel:function(h,d,g,f){var b,a;var e=[];this.sel=f;e.push(new Element("option",{value:""}).appendText(Joomla.JText._("COM_FABRIK_PLEASE_SELECT")));if(typeOf(g)==="object"){$H(g).each(function(i,c){e.push(new Element("optgroup",{label:c}));i.each(function(j){e=this._addSelOpt(e,j)}.bind(this))}.bind(this))}else{g.each(function(c){e=this._addSelOpt(e,c)}.bind(this))}return new Element("select",{"class":h,name:d}).adopt(e)},_addSelOpt:function(a,b){if(typeOf(b)==="object"){v=b.value?b.value:b.name;l=b.label?b.label:v}else{v=l=b}if(v===this.sel){a.push(new Element("option",{value:v,selected:"selected"}).set("text",l))}else{a.push(new Element("option",{value:v}).set("text",l))}return a},watchDelete:function(){document.id("adminForm").addEvent("click:relay(a.removeButton)",function(a,b){a.preventDefault();this.pluginTotal--;this.deletePlugin(a)}.bind(this))},watchAdd:function(){document.id("addPlugin").addEvent("click",function(a){a.stop();this.accordion.display(-1);this.addTop()}.bind(this))},addTop:function(a){a=a?a:"";var c=new Element("div.actionContainer.panel");var b=new Element("h3.title.pane-toggler").adopt(new Element("a",{href:"#"}).adopt(new Element("span").set("text",a)));c.adopt(b);c.inject(document.id("plugins"));new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",task:"top",format:"raw",type:this.type,plugin:a,c:this.pluginTotal,id:this.id},append:document.id("plugins").getElements(".actionContainer").getLast(),onSuccess:function(d){this.pluginTotal++;if(a!==""){this.addPlugin(a)}this.accordion.addSection(b,c.getElement(".pane-slider"))}.bind(this)}).send()},watchPluginSelect:function(){document.id("adminForm").addEvent("change:relay(select.elementtype)",function(d,e){d.preventDefault();var b=e.get("value");var a=e.getParent(".adminform");e.getParent(".actionContainer").getElement("h3 a span").set("text",b);var f=a.id.replace("formAction_","").toInt();this.addPlugin(b,f)}.bind(this))},addPlugin:function(a,b){b=typeOf(b)==="number"?b:this.pluginTotal;if(a===""){document.id("plugins").getElements(".actionContainer")[b].getElement(".pluginOpts").empty();return}new Request.HTML({url:"index.php",data:{option:"com_fabrik",view:"plugin",format:"raw",type:this.type,plugin:a,c:b,id:this.id},update:document.id("plugins").getElements(".actionContainer")[b].getElement(".pluginOpts")}).send()},deletePlugin:function(b){if(b.target.findClassUp("adminform").id.test(/_\d+$/)){var a=b.target.findClassUp("adminform").id.match(/_(\d+)$/)[1].toInt();document.id("plugins").getElements("input, select, textarea").each(function(d){var e=d.name.match(/\[[0-9]+\]/);if(e){var f=e[0].replace("[","").replace("]","").toInt();if(f>a){f=f-1;d.name=d.name.replace(/\[[0-9]+\]/,"["+f+"]")}}});document.id("plugins").getElements(".adminform").each(function(d){if(d.id.match(/formAction_\d+$/)){var e=d.id.match(/formAction_(\d+)$/)[1].toInt();if(e>a){e=e-1;d.id=d.id.replace(/(formAction_)(\d+)$/,"$1"+e)}}})}b.stop();document.id(b.target).getParent(".actionContainer").dispose();this.counter--}});fabrikAdminPlugin=new Class({Implements:[Options],options:{},initialize:function(c,b,a){this.name=c;this.label=b;this.setOptions(a)},cloned:function(){}});