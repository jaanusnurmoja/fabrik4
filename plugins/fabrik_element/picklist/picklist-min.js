var FbPicklist=new Class({Extends:FbElement,initialize:function(c,b){this.plugin="fabrikpicklist";this.parent(c,b);if(this.options.allowadd===true){this.watchAdd()}var g=document.id(this.options.element+"_fromlist");var f=document.id(this.options.element+"_tolist");var a=g.getStyle("background-color");var d=this;this.sortable=new Sortables([g,f],{clone:true,revert:true,opacity:0.7,hovercolor:"#ffddff",onComplete:function(){this.setData();d.fadeOut(g,a);d.fadeOut(f,a)}.bind(this),onSort:function(h,i){this.showNotices(h,i)}.bind(this),onStart:function(h,i){this.drag.addEvent("onEnter",function(j,k){if(this.lists.contains(k)){d.fadeOut(k,this.options.hovercolor);if(this.lists.contains(this.drag.overed)){this.drag.overed.addEvent("mouseleave",function(){d.fadeOut(g,a);d.fadeOut(f,a)}.bind(this))}}}.bind(this))}});var e=[g.getElement("li.emptyplicklist"),f.getElement("li.emptyplicklist")];this.sortable.removeItems(e);this.showNotices()},fadeOut:function(b,a){var c=new Fx.Tween(b,{wait:false,duration:600});c.start("background-color",a)},showNotices:function(e,h){if(e){e=e.getParent("ul")}var b,g,d;var a=[this.options.element+"_tolist",this.options.element+"_fromlist"];for(d=0;d<a.length;d++){g=document.id(a[d]);b=(g===e||typeOf(e)==="null")?1:2;var f=g.getElement("li.emptyplicklist");var c=g.getElements("li");c.length>b?f.hide():f.show()}},setData:function(){var c=document.id(this.options.element+"_tolist");var b=c.getElements("li");var a=b.map(function(e,d){return e.id.replace(this.options.element+"_value_","")}.bind(this));this.element.value=JSON.encode(a)},watchAdd:function(){var a=this.element.id;if(!document.id(this.element.id+"_dd_add_entry")){return}document.id(this.element.id+"_dd_add_entry").addEvent("click",function(d){var f;var c=document.id(a+"_ddLabel").value;if(document.id(a+"_ddVal")){f=document.id(a+"_ddVal").value}else{f=c}if(f===""||c===""){alert(Joomla.JText._("PLG_ELEMENT_PICKLIST_ENTER_VALUE_LABEL"))}else{var b=new Element("li",{"class":"picklist",id:this.element.id+"_value_"+f}).set("text",c);document.id(this.element.id+"_tolist").adopt(b);this.sortable.addItems(b);d.stop();if(document.id(a+"_ddVal")){document.id(a+"_ddVal").value=""}document.id(a+"_ddLabel").value="";this.setData();this.addNewOption(f,c)}}.bind(this))}});