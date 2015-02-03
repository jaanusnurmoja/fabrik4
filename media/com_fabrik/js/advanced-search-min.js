AdvancedSearch=new Class({Implements:[Options,Events],options:{ajax:false,controller:"list",parentView:""},initialize:function(a){this.setOptions(a);this.form=document.id("advanced-search-win"+this.options.listref).getElement("form");this.trs=Array.from([]);if(this.form.getElement(".advanced-search-add")){this.form.getElement(".advanced-search-add").removeEvents("click");this.form.getElement(".advanced-search-add").addEvent("click",function(b){this.addRow(b)}.bind(this));this.form.getElement(".advanced-search-clearall").removeEvents("click");this.form.getElement(".advanced-search-clearall").addEvent("click",function(b){this.resetForm(b)}.bind(this));this.trs.each(function(b){b.inject(this.form.getElement(".advanced-search-list").getElements("tr").getLast(),"after")}.bind(this))}this.form.addEvent("click:relay(tr)",function(c,b){this.form.getElements("tr").removeClass("fabrikRowClick");b.addClass("fabrikRowClick")}.bind(this));this.watchDelete();this.watchApply();this.watchElementList();Fabrik.fireEvent("fabrik.advancedSearch.ready",this)},watchApply:function(){this.form.getElement(".advanced-search-apply").addEvent("click",function(c){Fabrik.fireEvent("fabrik.advancedSearch.submit",this);var a=Fabrik["filter_"+this.options.parentView];if(typeOf(a)!=="null"){a.onSubmit()}var b=this.getList();new Element("input",{name:"resetfilters",value:1,type:"hidden"}).inject(this.form);if(!this.options.ajax){return}c.stop();b.submit(this.options.controller+".filter")}.bind(this))},getList:function(){var a=Fabrik.blocks["list_"+this.options.listref];if(typeOf(a)==="null"){a=Fabrik.blocks[this.options.parentView]}return a},watchDelete:function(){this.form.getElements(".advanced-search-remove-row").removeEvents();this.form.getElements(".advanced-search-remove-row").addEvent("click",function(a){this.removeRow(a)}.bind(this))},watchElementList:function(){this.form.getElements("select.key").removeEvents();this.form.getElements("select.key").addEvent("change",function(a){this.updateValueInput(a)}.bind(this))},updateValueInput:function(d){var f=d.target.getParent("tr");Fabrik.loader.start(f);var a=d.target.get("value");var g=d.target.getParent().getParent().getElements("td")[3];if(a===""){g.set("html","");return}var b="index.php?option=com_fabrik&task=list.elementFilter&format=raw";var c=this.options.elementMap[a];new Request.HTML({url:b,update:g,data:{element:a,id:this.options.listid,elid:c.id,plugin:c.plugin,counter:this.options.counter,listref:this.options.listref,context:this.options.controller,parentView:this.options.parentView},onComplete:function(){Fabrik.loader.stop(f)}}).send()},addRow:function(c){this.options.counter++;c.stop();var b=this.form.getElement(".advanced-search-list").getElement("tbody").getElements("tr").getLast();var d=b.clone();d.removeClass("oddRow1").removeClass("oddRow0").addClass("oddRow"+this.options.counter%2);d.inject(b,"after");d.getElement("td").empty().set("html",this.options.conditionList);var a=d.getElements("td");a[1].empty().set("html",this.options.elementList);a[1].adopt([new Element("input",{type:"hidden",name:"fabrik___filter[list_"+this.options.listref+"][search_type][]",value:"advanced"}),new Element("input",{type:"hidden",name:"fabrik___filter[list_"+this.options.listref+"][grouped_to_previous][]",value:"0"})]);a[2].empty().set("html",this.options.statementList);a[3].empty();this.watchDelete();this.watchElementList();Fabrik.fireEvent("fabrik.advancedSearch.row.added",this)},removeRow:function(c){c.stop();if(this.form.getElements(".advanced-search-remove-row").length>1){this.options.counter--;var b=c.target.findUp("tr");var a=new Fx.Morph(b,{duration:800,transition:Fx.Transitions.Quart.easeOut,onComplete:function(){b.dispose()}});a.start({height:0,opacity:0})}Fabrik.fireEvent("fabrik.advancedSearch.row.removed",this)},resetForm:function(){var a=this.form.getElement(".advanced-search-list");if(!a){return}a.getElements("tbody tr").each(function(c,b){if(b>=1){c.dispose()}if(b===0){c.getElements(".inputbox").each(function(d){d.selectedIndex=0});c.getElements("input").each(function(d){d.value=""})}});this.watchDelete();this.watchElementList();Fabrik.fireEvent("fabrik.advancedSearch.reset",this)},deleteFilterOption:function(c){event.target.removeEvent("click",function(d){this.deleteFilterOption(d)}.bind(this));var b=event.target.parentNode.parentNode;var a=b.parentNode;a.removeChild(b);c.stop()}});