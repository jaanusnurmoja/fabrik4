var FbDatabasejoin=new Class({Extends:FbElement,options:{id:0,formid:0,key:"",label:"",popwiny:0,windowwidth:360,displayType:"dropdown",popupform:0,listid:0},initialize:function(c,b){this.plugin="databasejoin";this.parent(c,b);if(this.options.allowadd===true&&this.options.editable!==false){this.startEvent=this.start.bindWithEvent(this);this.watchAdd();window.addEvent("fabrik.form.submitted",function(f,e){if(this.options.popupform===f.id){this.appendInfo(e)}}.bind(this))}if(this.options.editable){this.watchSelect();if(this.options.showDesc===true){this.element.addEvent("change",this.showDesc.bindWithEvent(this))}if(this.options.displayType==="checkbox"){var a="input[name*="+this.options.elementName+"___"+this.options.elementShortName+"]";var d="input[name*="+this.options.elementName+"___id]";this.element.addEvent("click:relay("+a+")",function(e){this.element.getElements(a).each(function(g,f){if(g===e.target){this.element.getElements(d)[f].checked=e.target.checked}}.bind(this))}.bind(this))}}},watchAdd:function(){var a=this.getContainer().getElement(".toggle-addoption");a.removeEvent("click",this.startEvent);a.addEvent("click",this.startEvent)},start:function(b){var a=Fabrik.liveSite+"index.php?option=com_fabrik&view=form&tmpl=component&ajax=1&formid="+this.options.popupform;var c=this.element.id+"-popupwin";this.windowopts={id:c,title:"Add",contentType:"xhr",loadMethod:"xhr",contentURL:a,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,onContentLoaded:function(d){d.fitToContent()}};this.win=Fabrik.getWindow(this.windowopts);b.stop()},appendInfo:function(g){var e=g.rowid;var f=this.options.formid;var d=this.options.key;var b=this.options.label;var a=Fabrik.liveSite+"index.php?option=com_fabrik&view=form&format=raw";var c={formid:this.options.popupform,rowid:e};var h=new Request.JSON({url:a,data:c,onSuccess:function(j){var u=j.data[this.options.key];var s=j.data[this.options.label];switch(this.options.display_type){case"dropdown":if(this.element.getElements("option").get("value").contains(u)){}var q=this.element.getElements("option").filter(function(r,l){if(r.get("value")===u){this.element.selectedIndex=l;return true}}.bind(this));if(q.length===0){p=new Element("option",{value:u,selected:"selected"}).set("text",s);$(this.element.id).adopt(p)}break;case"auto-complete":labelfield=this.element.getParent(".fabrikElement").getElement("input[name="+this.element.id+"-auto-complete]");this.element.value=u;labelfield.value=s;break;case"checkbox":var k=this.element.getElements("> .fabrik_subelement");var i=k.getLast().clone();i.getElement("span").set("text",s);i.getElement("input").set("value",u);var t=k.length===0?this.element:k.getLast();i.inject(t,"after");var m=this.element.getElements(".fabrikHide > .fabrik_subelement");var n=m.getLast().clone();n.getElement("span").set("text",s);n.getElement("input").set("value",0);t=m.length===0?this.element.getElements(".fabrikHide"):m.getLast();n.inject(t,"after");break;case"radio":default:q=this.element.getElements(".fabrik_subelement").filter(function(r,l){if(r.get("value")===u){r.checked=true;return true}}.bind(this));if(q.length===0){var p=new Element("div",{"class":"fabrik_subelement"}).adopt(new Element("label").adopt([new Element("input",{"class":"fabrikinput",type:"radio",checked:true,name:this.options.element+"[]",value:u}),new Element("span").set("text",s)]));p.inject($(this.element.id).getElements(".fabrik_subelement").getLast(),"after")}break}if(typeOf(this.element)==="null"){return}}.bind(this)}).send()},watchSelect:function(){var a=this.getContainer().getElement(".toggle-selectoption");if(typeOf(a)!=="null"){a.addEvent("click",this.selectRecord.bindWithEvent(this));window.addEvent("fabrik.list.row.selected",function(c){if(this.options.popupform===c.formid){this.update(c.rowid);var b=this.element.id+"-popupwin-select";if(Fabrik.Windows[b]){Fabrik.Windows[b].close()}}}.bind(this))}},selectRecord:function(c){c.stop();var d=this.element.id+"-popupwin-select";var b=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&tmpl=component&layout=dbjoinselect&ajax=1&listid="+this.options.listid;b+="&triggerElement="+this.element.id;b+="&resetfilters=1";this.windowopts={id:d,title:"Select",contentType:"xhr",loadMethod:"xhr",evalScripts:true,contentURL:b,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,onContentLoaded:function(e){e.fitToContent()}};var a=Fabrik.getWindow(this.windowopts)},update:function(b){this.getElement();if(typeOf(this.element)==="null"){return}if(!this.options.editable){this.element.set("html","");if(b===""){return}b=JSON.decode(b);var a=this.form.getFormData();if(typeOf(a)==="object"){a=$H(a)}b.each(function(c){if(typeOf(a.get(c))!=="null"){this.element.innerHTML+=a.get(c)+"<br />"}else{this.element.innerHTML+=c+"<br />"}}.bind(this));return}this.setValue(b)},setValue:function(c){var b=false;if(typeOf(this.element.options)!=="null"){for(var a=0;a<this.element.options.length;a++){if(this.element.options[a].value===c){this.element.options[a].selected=true;b=true;break}}}if(!b&&this.options.show_please_select){if(this.element.get("tag")==="input"){this.element.value=c;if(this.options.display_type==="auto-complete"){var d=new Ajax({url:Fabrik.liveSite+"index.php?option=com_fabrik&view=form&format=raw&fabrik="+this.form.id+"&rowid="+c,options:{evalScripts:true},onSuccess:function(g){g=Json.evaluate(g.stripScripts());var f=g.data[this.options.key];var e=g.data[this.options.label];if(typeOf(e)!=="null"){labelfield=this.element.getParent(".fabrikElement").getElement(".autocomplete-trigger");this.element.value=f;labelfield.value=e}}.bind(this)}).send()}}else{if(this.options.displayType==="dropdown"){this.element.options[0].selected=true}else{this.element.getElements("input").each(function(e){if(e.get("value")===c){e.checked=true}})}}}this.options.value=c},showDesc:function(d){var b=d.target.selectedIndex;var f=this.element.getParent(".fabrikElementContainer").getElement(".dbjoin-description");var a=f.getElement(".description-"+b);f.getElements(".notice").each(function(e){if(e===a){var c=new Fx.Tween(a,{property:"opacity",duration:400,transition:Fx.Transitions.linear});c.set(0);e.setStyle("display","");c.start(0,1)}else{e.setStyle("display","none")}})},getValue:function(){this.getElement();if(!this.options.editable){return this.options.value}if(typeOf(this.element)==="null"){return""}switch(this.options.display_type){case"dropdown":default:if(typeOf(this.element.get("value"))==="null"){return""}return this.element.get("value");case"auto-complete":return this.element.value;case"radio":var a="";this._getSubElements().each(function(b){if(b.checked){a=b.get("value");return a}return null});return a}},getValues:function(){var a=$A([]);var b=(this.options.display_type!=="dropdown")?"input":"option";$(this.element.id).getElements(b).each(function(c){a.push(c.value)});return a},cloned:function(b){this.element.removeEvents("change");if(this.options.allowadd===true&&this.options.editable!==false){this.startEvent=this.start.bindWithEvent(this);this.watchAdd()}this.watchSelect();if(this.options.display_type==="auto-complete"){var a=this.getContainer().getElement(".autocomplete-trigger");a.id=this.element.id+"-auto-complete";new FabAutocomplete(this.element.id,this.options.autoCompleteOpts)}},addNewEvent:function(action,js){if(action==="load"){this.loadEvents.push(js);this.runLoadEvent(js);return}switch(this.options.displayType){case"dropdown":default:if(this.element){this.element.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(0):eval(js)})}break;case"radio":this._getSubElements();this.subElements.each(function(el){el.addEvent(action,function(e){(typeOf(js)==="function")?js.delay(0):eval(js)})});break;case"auto-complete":var f=this.getAutoCompleteLabelField();if(typeOf(f)!=="null"){f.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(0):eval(js)})}break}}});