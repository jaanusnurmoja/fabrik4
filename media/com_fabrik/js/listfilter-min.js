/*! Fabrik */
var FbListFilter=new Class({Implements:[Options,Events],options:{container:"",type:"list",id:"",ref:"",advancedSearch:{controller:"list"}},initialize:function(a){this.filters=$H({}),this.setOptions(a),this.advancedSearch=!1,this.container=document.id(this.options.container),this.filterContainer=this.container.getElements(".fabrikFilterContainer"),this.filtersInHeadings=this.container.getElements(".listfilter");var b,c=this.container.getElement(".toggleFilters");if("null"!==typeOf(c)&&(c.addEvent("click",function(a){a.stop(),this.filterContainer.toggle(),this.filtersInHeadings.toggle()}.bind(this)),"null"!==typeOf(this.filterContainer)&&(this.filterContainer.hide(),this.filtersInHeadings.toggle())),"null"!==typeOf(this.container)){this.getList();var d=this.container.getElement(".clearFilters");"null"!==typeOf(d)&&(d.removeEvents(),d.addEvent("click",function(a){a.stop(),this.container.getElements(".fabrik_filter").each(function(a){this.clearAFilter(a)}.bind(this)),this.clearPlugins(),this.submitClearForm()}.bind(this))),(b=this.container.getElement(".advanced-search-link"))&&b.addEvent("click",function(a){a.stop();var b=a.target;"a"!==b.get("tag")&&(b=b.getParent("a"));var c=b.href;c+="&listref="+this.options.ref,this.windowopts={id:"advanced-search-win"+this.options.ref,title:Joomla.JText._("COM_FABRIK_ADVANCED_SEARCH"),loadMethod:"xhr",evalScripts:!0,contentURL:c,width:710,height:340,y:this.options.popwiny,onContentLoaded:function(){var a=Fabrik.blocks["list_"+this.options.ref];"null"===typeOf(a)&&(a=Fabrik.blocks[this.options.container],this.options.advancedSearch.parentView=this.options.container),a.advancedSearch=new AdvancedSearch(this.options.advancedSearch),d.fitToContent(!1)}.bind(this)};var d=Fabrik.getWindow(this.windowopts)}.bind(this)),this.filterContainer[0]&&this.filterContainer[0].getElements(".advancedSelect").each(function(a){jQuery("#"+a.id).on("change",{changeEvent:"change"},function(a){document.id(this.id).fireEvent(a.data.changeEvent,new Event.Mock(document.id(this.id),a.data.changeEvent))})}),this.watchClearOne()}},getList:function(){return this.list=Fabrik.blocks[this.options.type+"_"+this.options.ref],"null"===typeOf(this.list)&&(this.list=Fabrik.blocks[this.options.container]),this.list},addFilter:function(a,b){this.filters.has(a)===!1&&this.filters.set(a,[]),this.filters.get(a).push(b)},onSubmit:function(){this.filters.date&&this.filters.date.each(function(a){a.onSubmit()})},onUpdateData:function(){this.filters.date&&this.filters.date.each(function(a){a.onUpdateData()})},getFilterData:function(){var a={};return this.container.getElements(".fabrik_filter").each(function(b){if(b.id.test(/value$/)){var c=b.id.match(/(\S+)value$/)[1];a[c]="select"===b.get("tag")&&-1!==b.selectedIndex?document.id(b.options[b.selectedIndex]).get("text"):b.get("value"),a[c+"_raw"]=b.get("value")}}.bind(this)),a},update:function(){this.filters.each(function(a){a.each(function(a){a.update()}.bind(this))}.bind(this))},clearAFilter:function(a){(a.name.contains("[value]")||a.name.contains("fabrik_list_filter_all")||a.hasClass("autocomplete-trigger"))&&("select"===a.get("tag")?a.selectedIndex=a.get("multiple")?-1:0:"checkbox"===a.get("type")?a.checked=!1:a.value="")},clearPlugins:function(){var a=this.getList().plugins;"null"!==typeOf(a)&&a.each(function(a){a.clearFilter()})},submitClearForm:function(){var a="form"===this.container.get("tag")?this.container:this.container.getElement("form");new Element("input",{name:"resetfilters",value:1,type:"hidden"}).inject(a),"list"===this.options.type?this.list.submit("list.clearfilter"):this.container.getElement("form[name=filter]").submit()},watchClearOne:function(){this.container.getElements("*[data-filter-clear]").addEvent("click",function(a){a.stop();var b=jQuery(a.event.currentTarget).data("filter-clear"),c=document.getElements('*[data-filter-name="'+b+'"]');c.each(function(a){this.clearAFilter(a)}.bind(this)),this.submitClearForm()}.bind(this))}});