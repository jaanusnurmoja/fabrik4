/*! Fabrik */

define(["jquery","fab/element"],function(t,e){return window.FbPicklist=new Class({Extends:e,initialize:function(t,e){this.setPlugin("fabrikpicklist"),this.parent(t,e),!0===this.options.allowadd&&(this.watchAddToggle(),this.watchAdd()),this.makeSortable()},makeSortable:function(){if(this.options.editable){var t=this.getContainer(),i=t.getElement(".fromList"),n=t.getElement(".toList"),l=i.getStyle("background-color"),s=this;this.sortable=new Sortables([i,n],{clone:!0,revert:!0,opacity:.7,hovercolor:"#ffddff",onComplete:function(t){this.setData(),this.showNotices(t),s.fadeOut(i,l),s.fadeOut(n,l)}.bind(this),onSort:function(t,e){this.showNotices(t,e)}.bind(this),onStart:function(t,e){this.drag.addEvent("onEnter",function(t,e){this.lists.contains(e)&&(s.fadeOut(e,this.options.hovercolor),this.lists.contains(this.drag.overed)&&this.drag.overed.addEvent("mouseleave",function(){s.fadeOut(i,l),s.fadeOut(n,l)}.bind(this)))}.bind(this))}});var e=[i.getElement("li.emptypicklist"),n.getElement("li.emptypicklist")];this.sortable.removeItems(e),this.showNotices()}},fadeOut:function(t,e){new Fx.Tween(t,{wait:!1,duration:600}).start("background-color",e)},showNotices:function(t,e){t&&(t=t.getParent("ul"));var i,n,l,s=this.getContainer(),a=[s.getElement(".fromList"),s.getElement(".toList")];for(l=0;l<a.length;l++){i=(n=a[l])===t||"null"===typeOf(t)?1:2;var o=n.getElement("li.emptypicklist");n.getElements("li").length>i?o.hide():o.show()}},setData:function(){var t=this.getContainer().getElement(".toList").getElements("li[class!=emptypicklist]").map(function(t,e){return t.id.replace(this.options.element+"_value_","")}.bind(this));this.element.value=JSON.stringify(t)},watchAdd:function(){this.element.id;var n=this.getContainer(),l=n.getElement(".toList"),t=n.getElement("input[type=button]");"null"!==typeOf(t)&&t.addEvent("click",function(t){var e;if(value=n.getElement("input[name=addPicklistValue]"),labelEl=n.getElement("input[name=addPicklistLabel]"),label=labelEl.get("value"),""===(e="null"!==typeOf(value)?value.value:label)||""===label)alert(Joomla.JText._("PLG_ELEMENT_PICKLIST_ENTER_VALUE_LABEL"));else{var i=new Element("li",{class:"picklist",id:this.element.id+"_value_"+e}).set("text",label);l.adopt(i),this.sortable.addItems(i),t.stop(),"element"===typeOf(value)&&(value.value=""),labelEl.value="",this.setData(),this.addNewOption(e,label),this.showNotices()}}.bind(this))},unclonableProperties:function(){return["form","sortable"]},watchAddToggle:function(){var t=this.getContainer(),e=t.getElement("div.addoption"),i=t.getElement(".toggle-addoption");if(this.mySlider){var n=e.clone(),l=t.getElement(".fabrikElement");e.getParent().destroy(),l.adopt(n),(e=t.getElement("div.addoption")).setStyle("margin",0)}this.mySlider=new Fx.Slide(e,{duration:500}),this.mySlider.hide(),i.addEvent("click",function(t){t.stop(),this.mySlider.toggle()}.bind(this))},cloned:function(t){delete this.sortable,!0===this.options.allowadd&&(this.watchAddToggle(),this.watchAdd()),this.makeSortable(),this.parent(t)}}),window.FbPicklist});