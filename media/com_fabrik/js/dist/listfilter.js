/*! Fabrik */
define(["jquery","fab/fabrik","fab/advanced-search"],function(d,e,n){return new Class({Implements:[Events],Binds:[],options:{container:"",filters:[],type:"list",id:"",ref:"",advancedSearch:{controller:"list"}},initialize:function(t){var i=this,t=(this.filters={},this.options=d.extend(this.options,t),this.advancedSearch=!1,this.container=d("#"+this.options.container),this.filterContainer=this.container.find(".fabrikFilterContainer"),this.filtersInHeadings=this.container.find(".listfilter"),this.container.find(".toggleFilters"));t.on("click",function(t){t.preventDefault(),i.filterContainer.toggle(),i.filtersInHeadings.toggle()}),0<t.length&&(this.filterContainer.hide(),this.filtersInHeadings.toggle()),0!==this.container.length&&(this.getList(),(t=this.container.find(".clearFilters")).off(),t.on("click",function(t){t.preventDefault(),i.container.find(".fabrik_filter").each(function(t,e){i.clearAFilter(d(e))}),i.clearPlugins(),i.submitClearForm()}),this.container.find(".advanced-search-link").on("click",function(t){t.preventDefault();var t=d(t.target),t=(t="A"!==t.prop("tagName")?t.closest("a"):t).prop("href");t+="&listref="+i.options.ref,t={id:"advanced-search-win"+i.options.ref,modalId:"advanced-filter",title:Joomla.JText._("COM_FABRIK_ADVANCED_SEARCH"),loadMethod:"xhr",evalScripts:!0,contentURL:t,width:710,height:340,y:i.options.popwiny,onContentLoaded:function(){var t=e.blocks["list_"+i.options.ref];void 0===t&&(t=e.blocks[i.options.container],i.options.advancedSearch.parentView=i.options.container),t.advancedSearch=new n(i.options.advancedSearch),this.fitToContent(!1)}},e.getWindow(t)}),d(".fabrik_filter.advancedSelect").on("change",{changeEvent:"change"},function(t){this.fireEvent(t.data.changeEvent,new Event.Mock(document.getElementById(this.id),t.data.changeEvent))}),this.watchClearOne())},getList:function(){return this.list=e.blocks[this.options.type+"_"+this.options.ref],void 0===this.list&&(this.list=e.blocks[this.options.container]),this.list},addFilter:function(t,e){!1===this.filters.hasOwnProperty(t)&&(this.filters[t]=[]),this.filters[t].push(e)},onSubmit:function(){this.filters.date&&d.each(this.filters.date,function(t,e){e.onSubmit()}),this.filters.jdate&&d.each(this.filters.jdate,function(t,e){e.onSubmit()}),this.showFilterState()},onUpdateData:function(){this.filters.date&&d.each(this.filters.date,function(t,e){e.onUpdateData()}),this.filters.jdate&&d.each(this.filters.jdate,function(t,e){e.onUpdateData()})},getFilterData:function(){var e={};return this.container.find(".fabrik_filter").each(function(){var t;void 0!==d(this).prop("id")&&d(this).prop("id").test(/value$/)&&(t=d(this).prop("id").match(/(\S+)value$/)[1],"SELECT"===d(this).prop("tagName")&&-1!==this.selectedIndex?e[t]=d(this.options[this.selectedIndex]).text():e[t]=d(this).val(),e[t+"_raw"]=d(this).val())}),e},update:function(){d.each(this.filters,function(t,e){e.each(function(t){t.update()})})},clearAFilter:function(t){var e;(t.prop("name").contains("[value]")||t.prop("name").contains("fabrik_list_filter_all")||t.hasClass("autocomplete-trigger"))&&("SELECT"===t.prop("tagName")?(e=t.prop("multiple")?-1:0,t.prop("selectedIndex",e)):"checkbox"===t.prop("type")?t.prop("checked",!1):t.val(""),t.hasClass("advancedSelect"))&&t.trigger("chosen:updated")},clearPlugins:function(){var t=this.getList().plugins;null!==t&&t.each(function(t){t.clearFilter()})},submitClearForm:function(){var t="FORM"===this.container.prop("tagName")?this.container:this.container.find("form");d("<input />").attr({name:"resetfilters",value:1,type:"hidden"}).appendTo(t),"list"===this.options.type?this.list.submit("list.clearfilter"):this.container.find("form[name=filter]").submit()},watchClearOne:function(){var i=this;this.container.find("*[data-filter-clear]").on("click",function(t){t.stopPropagation();t=(t.event||t).currentTarget,t=d(t).data("filter-clear");d('*[data-filter-name="'+t+'"]').each(function(t,e){i.clearAFilter(d(e))}),i.submitClearForm(),i.showFilterState()})},showFilterState:function(){var n,a,s,r=d(e.jLayouts["modal-state-label"]),o=this,l=!1,c=this.container.find("*[data-modal-state-display]");0!==c.length&&(c.empty(),d.each(this.options.filters,function(t,e){var i=o.container.find('*[data-filter-name="'+e.name+'"]');"SELECT"===i.prop("tagName")&&-1!==i[0].selectedIndex?(a=d(i[0].options[i[0].selectedIndex]).text(),s=i.val()):a=s=i.val(),null!=a&&""!==a&&""!==s&&(l=!0,(n=r.clone()).find("*[data-filter-clear]").data("filter-clear",e.name),n.find("*[data-modal-state-label]").text(e.label),n.find("*[data-modal-state-value]").text(a),c.append(n))}),l?this.container.find("*[data-modal-state-container]").show():this.container.find("*[data-modal-state-container]").hide(),this.watchClearOne())},updateFilterCSS:function(t){var e=this.container.find(".clearFilters");e&&(t.hasFilters?e.addClass("hasFilters"):e.removeClass("hasFilters"))}})});