/*! Fabrik */
define(["jquery","fab/list-plugin"],function(t,e){var n=new Class({initialize:function(){this.updates={}},addFilter:function(t,e){this.updates[t]||(this.updates[t]=[]),this.updates[t].push(e)},onSumbit:function(){this.updates.date&&this.updates.date.each(function(t){t.onSubmit()})}});return new Class({Extends:e,initialize:function(t){this.parent(t),!this.options.prompt&&this.options.userSelect&&(t="filter_update_col"+this.options.ref+"_"+this.options.renderOrder,Fabrik[t]=new n,this.makeUpdateColWindow())},buttonAction:function(){var t,e;this.options.prompt?null!==(t=window.prompt(this.options.promptMsg,""))&&(e=document.id("listform_"+this.options.ref),new Element("input",{type:"hidden",value:t,name:"fabrik_update_col"}).inject(e,"bottom"),this.list.submit("list.doPlugin")):this.options.userSelect?this.win.open():this.list.submit("list.doPlugin")},makeUpdateColWindow:function(){var i,o,a,r=this;r.windowopts={id:"update_col_win_"+r.options.ref+"_"+r.options.renderOrder,title:Joomla.JText._("PLG_LIST_UPDATE_COL_UPDATE"),loadMethod:"html",content:r.options.form,width:400,destroy:!1,height:300,onOpen:function(){this.fitToContent(!1)},onContentLoaded:function(t){var n=document.id("update_col"+r.options.ref+"_"+r.options.renderOrder);n.addEvent("click:relay(a.add)",function(t,e){t.preventDefault(),"none"===(t=e.getParent("thead")?n.getElements("tbody tr").getLast():e.getParent("tr")).getStyle("display")?((i=t.getElements("td"))[0].getElement("select").selectedIndex=0,i[1].empty(),t.show()):(o=t.clone(),(i=o.getElements("td"))[0].getElement("select").selectedIndex=0,i[1].empty(),o.inject(t,"after"))}),n.addEvent("click:relay(a.delete)",function(t,e){t.preventDefault();t=n.getElements("tbody tr");1===t.length?t.getLast().hide():e.getParent("tr").destroy()}),n.addEvent("change:relay(select.key)",function(t,e){var n=e.getParent("tbody").getElements(".update_col_elements");for(a=0;a<n.length;a++)if(n[a]!==e&&n[a].selectedIndex===e.selectedIndex)return void window.alert("This element has already been selected!");var i=e.options[e.selectedIndex],o=e.getParent("tr"),d=(Fabrik.loader.start(o),o.getElement("td.update_col_value")),s=e.get("value"),l=i.get("data-plugin"),i=i.get("data-id");new Request.HTML({url:"index.php?option=com_fabrik&task=list.elementFilter&format=raw",update:d,data:{element:s,id:r.options.listid,elid:i,plugin:l,counter:0,listref:r.options.ref,context:"visualization",parentView:"update_col"+r.options.ref+"_"+r.options.renderOrder,fabrikIngoreDefaultFilterVal:1},onComplete:function(){Fabrik.loader.stop(o),r.win.fitToContent(!1)}}).send()}),n.getElement("input[type=button]").addEvent("click",function(t){t.stop(),Fabrik["filter_update_col"+r.options.ref+"_"+r.options.renderOrder].onSumbit();t=document.id("listform_"+r.options.ref);new Element("input",{type:"hidden",value:n.toQueryString(),name:"fabrik_update_col"}).inject(t,"bottom"),r.list.submit("list.doPlugin")})}},r.win=Fabrik.getWindow(r.windowopts),r.win.close()}})});