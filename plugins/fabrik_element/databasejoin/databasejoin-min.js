var FbDatabasejoin=new Class({Extends:FbElement,options:{id:0,formid:0,key:"",label:"",popwiny:0,windowwidth:360,displayType:"dropdown",popupform:0,listid:0,listRef:"",joinId:0,isJoin:false},initialize:function(b,a){this.activePopUp=false;this.activeSelect=false;this.plugin="databasejoin";this.parent(b,a);this.changeEvents=[];this.init();this.start()},watchAdd:function(){if(c=this.getContainer()){var a=c.getElement(".toggle-addoption");a.removeEvent("click",this.startEvent);a.addEvent("click",this.startEvent)}},start:function(f){var d=function(){},b=false,g=false;if(f){f.stop();d=function(e){e.fitToContent()};b=true;g=true}if(this.options.popupform===0||this.options.allowadd===false){return}this.activePopUp=true;var a="index.php?option=com_fabrik&task=form.view&tmpl=component&ajax=1&formid="+this.options.popupform;var h=this.element.id+"-popupwin";this.windowopts={id:h,title:Joomla.JText._("PLG_ELEMENT_DBJOIN_ADD"),contentType:"xhr",loadMethod:"xhr",contentURL:a,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,visible:g,onContentLoaded:d,destroy:b};this.win=Fabrik.getWindow(this.windowopts)},getBlurEvent:function(){if(this.options.display_type==="auto-complete"){return"change"}return this.parent()},addOption:function(j,g){var f,h,k;if(j===""){return}switch(this.options.display_type){case"dropdown":case"multilist":h=(j===this.options.value)?"selected":"";f=new Element("option",{value:j,selected:h}).set("text",g);document.id(this.element.id).adopt(f);break;case"auto-complete":labelfield=this.element.getParent(".fabrikElement").getElement("input[name*=-auto-complete]");this.element.value=j;labelfield.value=g;break;case"checkbox":var d=this.element.getElements("> .fabrik_subelement");var b=d.getLast().clone();b.getElement("span").set("text",g);b.getElement("input").set("value",j);var i=d.length===0?this.element:d.getLast();b.inject(i,"after");b.getElement("input").checked=true;var a=this.element.getElements(".fabrikHide > .fabrik_subelement");var e=a.getLast().clone();e.getElement("span").set("text",g);e.getElement("input").set("value",0);i=a.length===0?this.element.getElements(".fabrikHide"):a.getLast();e.inject(i,"after");e.getElement("input").checked=true;break;case"radio":default:k=(j===this.options.value)?true:false;f=new Element("div",{"class":"fabrik_subelement"}).adopt(new Element("label").adopt([new Element("input",{"class":"fabrikinput",type:"radio",checked:true,name:this.options.element+"[]",value:j}),new Element("span").set("text",g)]));f.inject(document.id(this.element.id).getElements(".fabrik_subelement").getLast(),"after");break}},updateFromServer:function(a){var b={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"databasejoin",method:"ajax_getOptions",element_id:this.options.id};if(this.options.display_type==="auto-complete"&&a===""){return}if(a){b[this.strElement+"_raw"]=a;b[this.options.fullName+"_raw"]=a}new Request.JSON({url:"",method:"post",data:b,onSuccess:function(d){var e=this.getOptionValues();if(this.options.display_type==="auto-complete"&&a===""&&e.length===0){return}d.each(function(f){if(!e.contains(f.value)){if(this.activePopUp){this.options.value=f.value}this.addOption(f.value,f.text);this.element.fireEvent("change",new Event.Mock(this.element,"change"));this.element.fireEvent("blur",new Event.Mock(this.element,"blur"))}}.bind(this));this.activePopUp=false}.bind(this)}).post()},getOptionValues:function(){var b;var a=[];switch(this.options.display_type){case"dropdown":case"multilist":b=this.element.getElements("option");break;case"checkbox":b=this.element.getElements(".fabrik_subelement input[type=checkbox]");break;case"radio":default:b=this.element.getElements(".fabrik_subelement input[type=radio]");break}b.each(function(d){a.push(d.get("value"))});return a.unique()},appendInfo:function(h){var f=h.rowid;var g=this.options.formid;var e=this.options.key;var b=this.options.label;var a=Fabrik.liveSite+"index.php?option=com_fabrik&view=form&format=raw";var d={formid:this.options.popupform,rowid:f};var i=new Request.JSON({url:a,data:d,onSuccess:function(m){var k=m.data[this.options.key];var j=m.data[this.options.label];switch(this.options.display_type){case"dropdown":case"multilist":var n=this.element.getElements("option").filter(function(p,l){if(p.get("value")===k){this.options.display_type==="dropdown"?this.element.selectedIndex=l:p.selected=true;return true}}.bind(this));if(n.length===0){this.addOption(k,j)}break;case"auto-complete":this.addOption(k,j);break;case"checkbox":this.addOption(k,j);break;case"radio":default:n=this.element.getElements(".fabrik_subelement").filter(function(p,l){if(p.get("value")===k){p.checked=true;return true}}.bind(this));if(n.length===0){this.addOption(k,j)}break}if(typeOf(this.element)==="null"){return}this.element.fireEvent("change",new Event.Mock(this.element,"change"));this.element.fireEvent("blur",new Event.Mock(this.element,"blur"))}.bind(this)}).send()},watchSelect:function(){if(c=this.getContainer()){var a=c.getElement(".toggle-selectoption");if(typeOf(a)!=="null"){a.addEvent("click",this.selectRecord.bindWithEvent(this));Fabrik.addEvent("fabrik.list.row.selected",function(d){if(this.options.popupform===d.formid&&this.activeSelect){this.update(d.rowid);var b=this.element.id+"-popupwin-select";if(Fabrik.Windows[b]){Fabrik.Windows[b].close()}this.updateFromServer(d.rowid)}}.bind(this));window.addEvent("fabrik.dbjoin.unactivate",function(){this.activeSelect=false}.bind(this))}}},selectRecord:function(d){window.fireEvent("fabrik.dbjoin.unactivate");this.activeSelect=true;d.stop();var f=this.element.id+"-popupwin-select";var b=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&tmpl=component&layout=dbjoinselect&ajax=1&listid="+this.options.listid;b+="&triggerElement="+this.element.id;b+="&resetfilters=1";b+="&c="+this.options.listRef;this.windowopts={id:f,title:Joomla.JText._("PLG_ELEMENT_DBJOIN_SELECT"),contentType:"xhr",loadMethod:"xhr",evalScripts:true,contentURL:b,width:this.options.windowwidth.toInt(),height:320,y:this.options.popwiny,minimizable:false,collapsible:true,onContentLoaded:function(e){e.fitToContent()}};var a=Fabrik.getWindow(this.windowopts)},update:function(b){this.getElement();if(typeOf(this.element)==="null"){return}if(!this.options.editable){this.element.set("html","");if(b===""){return}b=JSON.decode(b);var a=this.form.getFormData();if(typeOf(a)==="object"){a=$H(a)}b.each(function(d){if(typeOf(a.get(d))!=="null"){this.element.innerHTML+=a.get(d)+"<br />"}else{this.element.innerHTML+=d+"<br />"}}.bind(this));return}this.setValue(b)},setValue:function(d){var b=false;if(typeOf(this.element.options)!=="null"){for(var a=0;a<this.element.options.length;a++){if(this.element.options[a].value===d){this.element.options[a].selected=true;b=true;break}}}if(!b){if(this.options.display_type==="auto-complete"){this.element.value=d;this.updateFromServer(d)}else{if(this.options.displayType==="dropdown"){if(this.options.show_please_select){this.element.options[0].selected=true}}else{this.element.getElements("input").each(function(e){if(e.get("value")===d){e.checked=true}})}}}this.options.value=d},showDesc:function(d){var b=d.target.selectedIndex;var f=this.getContainer().getElement(".dbjoin-description");var a=f.getElement(".description-"+b);f.getElements(".notice").each(function(g){if(g===a){var e=new Fx.Tween(a,{property:"opacity",duration:400,transition:Fx.Transitions.linear});e.set(0);g.setStyle("display","");e.start(0,1)}else{g.setStyle("display","none")}})},getValue:function(){this.getElement();if(!this.options.editable){return this.options.value}if(typeOf(this.element)==="null"){return""}switch(this.options.display_type){case"dropdown":default:if(typeOf(this.element.get("value"))==="null"){return""}return this.element.get("value");case"multilist":var b=[];this.element.getElements("option").each(function(d){if(d.selected){b.push(d.value)}});return b;case"auto-complete":return this.element.value;case"radio":var a="";this._getSubElements().each(function(d){if(d.checked){a=d.get("value");return a}return null});return a}},getValues:function(){var a=$A([]);var b=(this.options.display_type!=="dropdown")?"input":"option";document.id(this.element.id).getElements(b).each(function(d){a.push(d.value)});return a},cloned:function(b){this.element.removeEvents("change");this.activePopUp=false;this.changeEvents.each(function(d){this.addNewEventAux("change",d)}.bind(this));this.init();this.watchSelect();if(this.options.display_type==="auto-complete"){var a=this.getAutoCompleteLabelField();a.id=this.element.id+"-auto-complete";a.name=this.element.name.replace("[]","")+"-auto-complete";document.id(a.id).value="";new FbAutocomplete(this.element.id,this.options.autoCompleteOpts)}},init:function(){if(this.options.allowadd===true&&this.options.editable!==false){this.startEvent=this.start.bindWithEvent(this);this.watchAdd();Fabrik.addEvent("fabrik.form.submitted",function(e,d){if(this.options.popupform===e.id){if(this.options.display_type==="auto-complete"){var f=new Request.JSON({url:Fabrik.liveSite+"index.php?option=com_fabrik&view=form&format=raw",data:{formid:this.options.popupform,rowid:d.rowid},onSuccess:function(g){this.updateFromServer(g.data[this.options.key])}.bind(this)}).send()}else{this.updateFromServer()}}}.bind(this))}if(this.options.editable){this.watchSelect();if(this.options.showDesc===true){this.element.addEvent("change",this.showDesc.bindWithEvent(this))}if(this.options.displayType==="checkbox"){var a="input[name*="+this.options.joinTable+"___"+this.options.elementShortName+"]";var b="input[name*="+this.options.joinTable+"___id]";this.element.addEvent("click:relay("+a+")",function(d){this.element.getElements(a).each(function(f,e){if(f===d.target){this.element.getElements(b)[e].checked=d.target.checked}}.bind(this))}.bind(this))}}},getAutoCompleteLabelField:function(){var b=this.element.getParent(".fabrikElement");var a=b.getElement("input[name*=-auto-complete]");if(typeOf(a)==="null"){a=b.getElement("input[id*=-auto-complete]")}return a},addNewEventAux:function(action,js){switch(this.options.displayType){case"dropdown":default:if(this.element){this.element.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(0):eval(js)})}break;case"radio":this._getSubElements();this.subElements.each(function(el){el.addEvent(action,function(e){(typeOf(js)==="function")?js.delay(0):eval(js)})});break;case"auto-complete":var f=this.getAutoCompleteLabelField();if(typeOf(f)!=="null"){f.addEvent(action,function(e){e.stop();(typeOf(js)==="function")?js.delay(700):eval(js)})}break}},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b);return}if(a==="change"){this.changeEvents.push(b)}this.addNewEventAux(a,b)},decreaseName:function(b){if(this.options.displayType==="auto-complete"){var a=this.getAutoCompleteLabelField();if($type(a)!==false){a.name=this._decreaseName(a.name,b,"-auto-complete");a.id=this._decreaseId(a.id,b,"-auto-complete")}}return this.parent(b)}});