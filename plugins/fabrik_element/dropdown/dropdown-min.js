/*! Fabrik */

define(["jquery","fab/element"],function(a,b){return window.FbDropdown=new Class({Extends:b,initialize:function(a,b){this.setPlugin("fabrikdropdown"),this.parent(a,b),!0===this.options.allowadd&&!1!==this.options.editable&&(this.watchAddToggle(),this.watchAdd())},watchAddToggle:function(){var a=this.getContainer(),b=a.getElement("div.addoption"),c=a.getElement(".toggle-addoption");if(this.mySlider){var d=b.clone(),e=a.getElement(".fabrikElement");b.getParent().destroy(),e.adopt(d),b=a.getElement("div.addoption"),b.setStyle("margin",0);var f=b.getElement("input[name*=_additions]");f.id=this.element.id+"_additions",f.name=this.element.id+"_additions"}this.mySlider=new Fx.Slide(b,{duration:500}),this.mySlider.hide(),c.addEvent("click",function(a){a.stop(),this.mySlider.toggle()}.bind(this))},addClick:function(b){var c,d=this.getContainer(),e=d.getElement("input[name=addPicklistLabel]"),f=d.getElement("input[name=addPicklistValue]"),g=e.value;if(""===(c=f?f.value:g)||""===g)window.alert(Joomla.JText._("PLG_ELEMENT_DROPDOWN_ENTER_VALUE_LABEL"));else{new Element("option",{selected:"selected",value:c}).set("text",g).inject(document.id(this.element.id));b.stop(),f&&(f.value=""),e.value="",this.addNewOption(c,g),document.id(this.element.id).fireEvent("change",{stop:function(){}}),this.mySlider&&this.mySlider.toggle(),this.options.advanced&&a("#"+this.element.id).trigger("liszt:updated")}},watchAdd:function(){if(!0===this.options.allowadd&&!1!==this.options.editable){var a=(this.element.id,this.getContainer());this.addClickEvent&&a.getElement("input[type=button]").removeEvent("click",this.addClickEvent),this.addClickEvent=this.addClick.bind(this),a.getElement("input[type=button]").addEvent("click",this.addClickEvent)}},getValue:function(){if(!this.options.editable)return this.options.multiple?this.options.value:this.options.value[0];if("null"===typeOf(this.element.get("value")))return"";if(this.options.multiple){var a=[];return this.element.getElements("option").each(function(b){b.selected&&a.push(b.value)}),a}return this.element.get("value")},reset:function(){var a=this.options.defaultVal;this.update(a)},update:function(b){var c=[];if("string"===typeOf(b)&&""===b&&(b="[]"),"string"===typeOf(b)&&JSON.validate(b)&&(b=JSON.parse(b)),"null"===typeOf(b)&&(b=[]),this.getElement(),"null"!==typeOf(this.element)){if(this.options.element=this.element.id,!this.options.editable){this.element.set("html","");var d=$H(this.options.data);return void b.each(function(a){this.element.innerHTML+=d.get(a)+"<br />"}.bind(this))}c=this.element.getElements("option"),"number"===typeOf(b)&&(b=b.toString());for(var e=0;e<c.length;e++)-1!==b.indexOf(c[e].value)?c[e].selected=!0:c[e].selected=!1;this.options.advanced&&a("#"+this.element.id).trigger("liszt:updated"),this.watchAdd()}},cloned:function(a){!0===this.options.allowadd&&!1!==this.options.editable&&(this.watchAddToggle(),this.watchAdd()),this.parent(a)}}),window.FbDropdown});