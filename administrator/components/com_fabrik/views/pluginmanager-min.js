var PluginManager=new Class({initialize:function(a){this.plugins=a;this.counter=0;this.opts=this.opts||{};this.watchAdd()},_makeSel:function(h,d,g,f){var b,a;var e=[];this.sel=f;e.push(new Element("option",{value:""}).appendText(Joomla.JText._("COM_FABRIK_PLEASE_SELECT")));if(typeOf(g)==="object"){$H(g).each(function(i,c){e.push(new Element("optgroup",{label:c}));i.each(function(j){e=this._addSelOpt(e,j)}.bind(this))}.bind(this))}else{g.each(function(c){e=this._addSelOpt(e,c)}.bind(this))}return new Element("select",{"class":h,name:d}).adopt(e)},_addSelOpt:function(a,b){if(typeOf(b)==="object"){v=b.value?b.value:b.name;l=b.label?b.label:v}else{v=l=b}if(v===this.sel){a.push(new Element("option",{value:v,selected:"selected"}).set("text",l))}else{a.push(new Element("option",{value:v}).set("text",l))}return a},addPlugin:function(a){this.plugins.push(a)},deletePlugin:function(b){if(b.target.findClassUp("adminform").id.test(/_\d+$/)){var a=b.target.findClassUp("adminform").id.match(/_(\d+)$/)[1].toInt();document.id("plugins").getElements("input, select, textarea").each(function(d){var e=d.name.match(/\[[0-9]+\]/);if(e){var f=e[0].replace("[","").replace("]","").toInt();if(f>a){f=f-1;d.name=d.name.replace(/\[[0-9]+\]/,"["+f+"]")}}});$$("table.adminform").each(function(d){if(d.id.match(/formAction_\d+$/)){var e=d.id.match(/formAction_(\d+)$/)[1].toInt();if(e>a){e=e-1;d.id=d.id.replace(/(formAction_)(\d+)$/,"$1"+e)}}})}b.stop();document.id(b.target).up(3).dispose();this.counter--},watchAdd:function(){document.id("addPlugin").addEvent("click",function(a){a.stop();this.addAction("","",{})}.bind(this))},watchDelete:function(){document.id("plugins").getElements(".delete").each(function(a){a.removeEvents("click");a.addEvent("click",function(b){this.deletePlugin(b)}.bind(this))}.bind(this))},getPluginTop:function(){return""},addAction:function(g,f,a,m){var e,i;m=m===false?false:true;var d=new Element("td");var k="";this.plugins.each(function(c){if(c.name===f){k+=g}else{k+=c.options.html}}.bind(this));e=new Element("div").set("html",k);i=e.getElements("input[type=radio]");i.each(function(c){var q,p;c.name=c.name.replace(/\[0\]/gi,"["+this.counter+"]");q=e.getElement("label[for="+c.id+"]");p=c.id.split("-");p[1]=this.counter;c.id=p.join("-");q.setAttribute("for",c.id)}.bind(this));d.set("html",e.get("html"));var h="block";a.counter=this.counter;var j=new Element("div",{"class":"actionContainer"}).adopt(new Element("table",{"class":"adminform",id:"formAction_"+this.counter,styles:{display:h}}).adopt(new Element("tbody",{styles:{width:"100%"}}).adopt([this.getPluginTop(f,a),new Element("tr").adopt(d),new Element("tr").adopt(new Element("td",{}).adopt(new Element("a",{href:"#","class":"delete removeButton"}).appendText(Joomla.JText._("COM_FABRIK_DELETE"))))])));j.inject(document.id("plugins"));if(this.counter!==0){j.getElements("input[name^=params]","select[name^=params]").each(function(p){if(p.id!==""){var c=p.id.split("-");c.pop();p.id=c.join("-")+"-"+this.counter}}.bind(this));j.getElements("img[src=components/com_fabrik/images/ajax-loader.gif]").each(function(c){c.id=c.id.replace("-0_loader","-"+this.counter+"_loader")}.bind(this));if(m===true){this.plugins.each(function(c){var p=new CloneObject(c,true,[]);p.cloned(this.counter)}.bind(this))}}var o=document.id("formAction_"+this.counter);o.getElements("."+this.opts.type+"Settings").hide();var b=o.getElement(" .page-"+f);if(b){b.show()}o.getElement(".elementtype").addEvent("change",function(p){p.stop();var q=p.target.getParent(".adminform").id.replace("formAction_","");document.id("formAction_"+q).getElements("."+this.opts.type+"Settings").hide();var c=p.target.get("value");if(c!==Joomla.JText._("COM_FABRIK_PLEASE_SELECT")&&c!==""){document.id("formAction_"+q).getElement(".page-"+c).show()}}.bind(this));this.watchDelete();var n=new Tips($$("#formAction_"+this.counter+" .hasTip"),{});this.counter++},getPublishedYesNo:function(c){var b="<label>"+Joomla.JText._("COM_FABRIK_PUBLISHED")+"</label>";var a=c.state!==false?'checked="checked"':"";var d=c.state===false?'checked="checked"':"";b+='<fieldset class="radio"><label>'+Joomla.JText._("JYES")+'<input type="radio" name="jform[params][plugin_state]['+c.counter+']" '+a+' value="1"></label>';b+="<label>"+Joomla.JText._("JNO")+'<input type="radio" name="jform[params][plugin_state]['+c.counter+']"'+d+' value="0"></label></fieldset>';return b}});fabrikAdminPlugin=new Class({Implements:[Options],options:{},initialize:function(c,b,a){this.name=c;this.label=b;this.setOptions(a)},cloned:function(){}});