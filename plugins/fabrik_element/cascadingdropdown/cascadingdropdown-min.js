var FbCascadingdropdown=new Class({Extends:FbElement,initialize:function(b,a){var c=null;this.ignoreAjax=false;this.plugin="cascadingdropdown";this.parent(b,a);this.doWatchEvent=this.dowatch.bindWithEvent(this);if($(this.options.watch)){$(this.options.watch).addEvent("change",this.doWatchEvent)}if(this.options.showDesc===true){this.element.addEvent("change",this.showDesc.bindWithEvent(this))}},attachedToForm:function(){if(this.ignoreAjax||(this.options.editable==="1"&&this.options.editing==="0")){var a=this.form.formElements.get(this.options.watch).getValue();this.change(a,$(this.options.watch).id)}},dowatch:function(b){b=new Event(b);var a=$(b.target).get("value");this.change(a,$(b.target).id)},change:function(b,g){if(window.ie){if(this.options.repeatCounter.toInt()===0){var e=g.substr(g.length-2,1);var d=g.substr(g.length-1,1);if(e==="_"&&typeOf(parseInt(d,10))==="number"&&d!=="0"){return}}}this.element.getParent().getElement(".loader").setStyle("display","");var c=Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&plugin=cascadingdropdown&method=ajax_getOptions&element_id="+this.options.id;c+="&lang="+this.options.lang;var a=this.form.getFormElementData();var f=Object.append(a,{v:b,formid:this.form.id,fabrik_cascade_ajax_update:1});if(this.myAjax){this.myAjax.cancel()}this.myAjax=new Request({url:c,method:"post",data:f,onComplete:function(h){var l=this.options.def;this.element.getParent().getElement(".loader").setStyle("display","none");h=JSON.decode(h);this.element.empty();var j;if(this.options.showDesc===true){var m=this.element.getParent(".fabrikElementContainer").getElement(".dbjoin-description");m.empty()}this.myAjax=null;if(!this.ignoreAjax){h.each(function(n){j=n.value===l?{value:n.value,selected:"selected"}:{value:n.value};new Element("option",j).set("text",n.text).inject(this.element);if(this.options.showDesc===true&&n.description){var o=this.options.showPleaseSelect?"notice description-"+(k):"notice description-"+(k-1);new Element("div",{styles:{display:"none"},"class":o}).set("html",n.description).injectInside(m)}}.bind(this))}else{if(this.options.showPleaseSelect){var i=h.shift();new Element("option",{value:i.value,selected:"selected"}).set("text",i.text).inject(this.element)}}this.ignoreAjax=false;if(this.element.options.length===1){this.element.readonly=true;this.element.addClass("readonly")}else{this.element.readonly=false;this.element.removeClass("readonly")}if(!this.ignoreAjax){this.ingoreShowDesc=true;this.element.fireEvent("change",new Event.Mock(this.element,"change"));this.ingoreShowDesc=false}this.ignoreAjax=false;window.fireEvent("fabrik.cdd.update",this)}.bind(this)}).send()},cloned:function(a){this.myAjax=null;if($(this.options.watch)){if(this.options.watchInSameGroup===true){if(this.options.watch.test(/_(\d+)$/)){this.options.watch=this.options.watch.replace(/_(\d+)$/,"_"+a)}else{this.options.watch=this.options.watch+"_"+a}}if($(this.options.watch)){this.element.removeEvents("change",this.doWatchEvent);this.doWatchEvent=this.dowatch.bindWithEvent(this);$(this.options.watch).addEvent("change",this.doWatchEvent)}}if(this.options.watchInSameGroup===true){this.element.empty();this.ignoreAjax=true}if(this.options.showDesc===true){this.element.addEvent("change",function(){this.showDesc()}.bind(this))}window.fireEvent("fabrik.cdd.update",this)},showDesc:function(d){if(this.ingoreShowDesc===true){return}var b=$(d.target).selectedIndex;var f=this.element.getParent(".fabrikElementContainer").getElement(".dbjoin-description");var a=f.getElement(".description-"+b);f.getElements(".notice").each(function(e){if(e===a){var c=new Fx.Style(a,"opacity",{duration:400,transition:Fx.Transitions.linear});c.set(0);e.setStyle("display","");c.start(0,1)}else{e.setStyle("display","none")}}.bind(this))}});