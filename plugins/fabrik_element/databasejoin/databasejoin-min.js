var FbDatabasejoin=new Class({Extends:FbElement,options:{id:0,formid:0,key:"",label:"",popwiny:0,windowwidth:360,displayType:"dropdown",popupform:0,listid:0,joinId:0,isJoin:false},initialize:function(d,b){this.plugin="databasejoin";this.parent(d,b);this.changeEvents=[];if(this.options.allowadd===true&&this.options.editable!==false){this.startEvent=this.start.bindWithEvent(this);this.watchAdd();Fabrik.addEvent("fabrik.form.submitted",function(g,f){if(this.options.popupform===g.id){this.updateFromServer()}}.bind(this))}if(this.options.editable){this.watchSelect();if(this.options.showDesc===true){this.element.addEvent("change",this.showDesc.bindWithEvent(this))}if(this.options.displayType==="checkbox"){var a="input[name*="+this.options.joinTable+"___"+this.options.elementShortName+"]";var e="input[name*="+this.options.joinTable+"___id]";this.element.addEvent("click:relay("+a+")",function(f){this.element.getElements(a).each(function(h,g){if(h===f.target){this.element.getElements(e)[g].checked=f.target.checked}}.bind(this))}.bind(this))}}},watchAdd:function(){if(c=this.getContainer()){var a=c.getElement(".toggle-addoption");a.removeEvent("click",this.startEvent);a.addEvent("click",this.startEvent)}},start:function(b){var a="index.php?option=com_fabrik&task=form.view&tmpl=component&ajax=1&formid="+this.options.popupform;var d=this.element.id+"-popupwin";this.windowopts={id:d,title:Joomla.JText._("PLG_ELEMENT_DBJOIN_ADD"),contentType:"xhr",loadMethod:"xhr",contentURL:a,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,onContentLoaded:function(e){e.fitToContent()}};this.win=Fabrik.getWindow(this.windowopts);b.stop()},getBlurEvent:function(){if(this.options.display_type==="auto-complete"){return"change"}return this.parent()},addOption:function(d,b){if(d===""){return}switch(this.options.display_type){case"dropdown":case"multilist":e=new Element("option",{value:d,selected:"selected"}).set("text",b);$(this.element.id).adopt(e);break;case"auto-complete":labelfield=this.element.getParent(".fabrikElement").getElement("input[name="+this.element.id+"-auto-complete]");this.element.value=d;labelfield.value=b;break;case"checkbox":var g=this.element.getElements("> .fabrik_subelement");var i=g.getLast().clone();i.getElement("span").set("text",b);i.getElement("input").set("value",d);var h=g.length===0?this.element:g.getLast();i.inject(h,"after");var f=this.element.getElements(".fabrikHide > .fabrik_subelement");var a=f.getLast().clone();a.getElement("span").set("text",b);a.getElement("input").set("value",0);h=f.length===0?this.element.getElements(".fabrikHide"):f.getLast();a.inject(h,"after");break;case"radio":default:var e=new Element("div",{"class":"fabrik_subelement"}).adopt(new Element("label").adopt([new Element("input",{"class":"fabrikinput",type:"radio",checked:true,name:this.options.element+"[]",value:d}),new Element("span").set("text",b)]));e.inject($(this.element.id).getElements(".fabrik_subelement").getLast(),"after");break}},updateFromServer:function(){var a={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"databasejoin",method:"ajax_getOptions",element_id:this.options.id};new Request.JSON({url:"",method:"post",data:a,onComplete:function(b){var d=this.getOptionValues();b.each(function(e){if(!d.contains(e.value)){this.addOption(e.value,e.text);this.element.fireEvent("change",new Event.Mock(this.element,"change"));this.element.fireEvent("blur",new Event.Mock(this.element,"blur"))}}.bind(this))}.bind(this)}).post()},getOptionValues:function(){var b;var a=[];switch(this.options.display_type){case"dropdown":case"multilist":b=this.element.getElements("option");break;case"checkbox":b=this.element.getElements(".fabrik_subelement input[type=checkbox]");break;case"radio":default:b=this.element.getElements(".fabrik_subelement type=[radio]");break}b.each(function(d){a.push(d.get("value"))});return a.unique()},appendInfo:function(h){var f=h.rowid;var g=this.options.formid;var e=this.options.key;var b=this.options.label;var a=Fabrik.liveSite+"index.php?option=com_fabrik&view=form&format=raw";var d={formid:this.options.popupform,rowid:f};var i=new Request.JSON({url:a,data:d,onSuccess:function(m){var k=m.data[this.options.key];var j=m.data[this.options.label];switch(this.options.display_type){case"dropdown":case"multilist":var n=this.element.getElements("option").filter(function(p,l){if(p.get("value")===k){this.options.display_type==="dropdown"?this.element.selectedIndex=l:p.selected=true;return true}}.bind(this));if(n.length===0){this.addOption(k,j)}break;case"auto-complete":this.addOption(k,j);break;case"checkbox":this.addOption(k,j);break;case"radio":default:n=this.element.getElements(".fabrik_subelement").filter(function(p,l){if(p.get("value")===k){p.checked=true;return true}}.bind(this));if(n.length===0){this.addOption(k,j)}break}if(typeOf(this.element)==="null"){return}this.element.fireEvent("change",new Event.Mock(this.element,"change"));this.element.fireEvent("blur",new Event.Mock(this.element,"blur"))}.bind(this)}).send()},watchSelect:function(){if(c=this.getContainer()){var a=c.getElement(".toggle-selectoption");if(typeOf(a)!=="null"){a.addEvent("click",this.selectRecord.bindWithEvent(this));Fabrik.addEvent("fabrik.list.row.selected",function(d){if(this.options.popupform===d.formid){this.update(d.rowid);var b=this.element.id+"-popupwin-select";if(Fabrik.Windows[b]){Fabrik.Windows[b].close()}}}.bind(this))}}},selectRecord:function(d){d.stop();var f=this.element.id+"-popupwin-select";var b=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&tmpl=component&layout=dbjoinselect&ajax=1&listid="+this.options.listid;b+="&triggerElement="+this.element.id;b+="&resetfilters=1";this.windowopts={id:f,title:Joomla.JText._("PLG_ELEMENT_DBJOIN_SELECT"),contentType:"xhr",loadMethod:"xhr",evalScripts:true,contentURL:b,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,onContentLoaded:function(e){e.fitToContent()}};var a=Fabrik.getWindow(this.windowopts)},update:function(b){this.getElement();if(typeOf(this.element)==="null"){return}if(!this.options.editable){this.element.set("html","");if(b===""){return}b=JSON.decode(b);var a=this.form.getFormData();if(typeOf(a)==="object"){a=$H(a)}b.each(function(d){if(typeOf(a.get(d))!=="null"){this.element.innerHTML+=a.get(d)+"<br />"}else{this.element.innerHTML+=d+"<br />"}}.bind(this));return}this.setValue(b)},setValue:function(d){var b=false;if(typeOf(this.element.options)!=="null"){for(var a=0;a<this.element.options.length;a++){if(this.element.options[a].value===d){this.element.options[a].selected=true;b=true;break}}}if(!b&&this.options.show_please_select){if(this.element.get("tag")==="input"){this.element.value=d;if(this.options.display_type==="auto-complete"){var e=new Request.JSON({options:{evalScripts:true},data:{option:"com_fabrik",view:"form",format:"raw",formid:this.form.id,rowid:d},onComplete:function(i,f){var j=i;var h=j.data[this.options.key];var g=j.data[this.options.label];if(typeOf(g)!=="null"){labelfield=this.element.getParent(".fabrikElement").getElement(".autocomplete-trigger");this.element.value=h;labelfield.value=g}}.bind(this)}).send()}}else{if(this.options.displayType==="dropdown"){this.element.options[0].selected=true}else{this.element.getElements("input").each(function(f){if(f.get("value")===d){f.checked=true}})}}}this.options.value=d},showDesc:function(d){var b=d.target.selectedIndex;var f=this.getContainer().getElement(".dbjoin-description");var a=f.getElement(".description-"+b);f.getElements(".notice").each(function(g){if(g===a){var e=new Fx.Tween(a,{property:"opacity",duration:400,transition:Fx.Transitions.linear});e.set(0);g.setStyle("display","");e.start(0,1)}else{g.setStyle("display","none")}})},getValue:function(){this.getElement();if(!this.options.editable){return this.options.value}if(typeOf(this.element)==="null"){return""}switch(this.options.display_type){case"dropdown":default:if(typeOf(this.element.get("value"))==="null"){return""}return this.element.get("value");case"multilist":var b=[];this.element.getElements("option").each(function(d){if(d.selected){b.push(d.value)}});return b;case"auto-complete":return this.element.value;case"radio":var a="";this._getSubElements().each(function(d){if(d.checked){a=d.get("value");return a}return null});return a}},getValues:function(){var a=$A([]);var b=(this.options.display_type!=="dropdown")?"input":"option";$(this.element.id).getElements(b).each(function(d){a.push(d.value)});return a},cloned:function(b){this.element.removeEvents("change");this.changeEvents.each(function(d){this.addNewEventAux("change",d)}.bind(this));if(this.options.allowadd===true&&this.options.editable!==false){this.startEvent=this.start.bindWithEvent(this);this.watchAdd()}this.watchSelect();if(this.options.display_type==="auto-complete"){var a=this.getContainer().getElement(".autocomplete-trigger");a.id=this.element.id+"-auto-complete";document.id(a.id).value="";new FbAutocomplete(this.element.id,this.options.autoCompleteOpts)}},getAutoCompleteLabelField:function(){var b=this.element.findClassUp("fabrikElement");var a=b.getElement("input[name="+this.element.id+"-auto-complete]");if(typeOf(a)==="null"){a=b.getElement("input[id="+this.element.id+"-auto-complete]")}return a},addNewEventAux:function(action,js){switch(this.options.displayType){case"dropdown":default:if(this.element){this.element.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(0):eval(js)})}break;case"radio":this._getSubElements();this.subElements.each(function(el){el.addEvent(action,function(e){(typeOf(js)==="function")?js.delay(0):eval(js)})});break;case"auto-complete":var f=this.getAutoCompleteLabelField();if(typeOf(f)!=="null"){f.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(700):eval(js)})}break}},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b);return}if(a==="change"){this.changeEvents.push(b)}this.addNewEventAux(a,b)}});