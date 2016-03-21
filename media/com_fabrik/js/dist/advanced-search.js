/*! Fabrik */
define(["jquery","fab/fabrik"],function(a,b){var c=new Class({options:{ajax:!1,controller:"list",parentView:"",defaultStatement:"=",conditionList:"",elementList:"",elementMap:{},statementList:""},initialize:function(c){this.options=a.extend(this.options,c),this.form=a("form.advancedSearch_"+this.options.listref);var d=this.form.find(".advanced-search-add"),e=this.form.find(".advanced-search-clearall"),f=this;d.length>0&&(d.off("click"),d.on("click",function(a){a.preventDefault(),f.addRow()}),e.off("click"),e.on("click",function(a){f.resetForm(a)})),this.form.on("click","tr",function(){f.form.find("tr").removeClass("fabrikRowClick"),a(this).addClass("fabrikRowClick")}),this.watchDelete(),this.watchApply(),this.watchElementList(),b.trigger("fabrik.advancedSearch.ready",this)},watchApply:function(){var c=this;this.form.find(".advanced-search-apply").on("click",function(d){b.fireEvent("fabrik.advancedSearch.submit",c);var e=b["filter_"+c.options.parentView];void 0!==e&&e.onSubmit();var f=c.getList();a(document.createElement("input")).attr({name:"resetfilters",value:1,type:"hidden"}).appendTo(c.form),c.options.ajax&&(d.preventDefault(),f.submit(c.options.controller+".filter"))})},getList:function(){var a=b.blocks["list_"+this.options.listref];return void 0===a&&(a=b.blocks[this.options.parentView]),a},watchDelete:function(){var b=this;this.form.on("click",".advanced-search-remove-row",function(c){c.preventDefault(),b.removeRow(a(this).closest("tr"))})},watchElementList:function(){var b=this;this.form.on("change","select.key",function(c){c.preventDefault();var d=a(this).closest("tr"),e=a(this).val();b.updateValueInput(d,e)})},updateValueInput:function(c,d){var e,f="index.php?option=com_fabrik&task=list.elementFilter&format=raw";b.loader.start(c[0]);var g=a(c.find("td")[3]);return""===d?void g.html(""):(e=this.options.elementMap[d],void a.ajax({url:f,data:{element:d,id:this.options.listid,elid:e.id,plugin:e.plugin,counter:this.options.counter,listref:this.options.listref,context:this.options.controller,parentView:this.options.parentView}}).done(function(a){g.html(a),b.loader.stop(c[0])}))},addRow:function(){this.options.counter++;var c=this.form.find(".advanced-search-list").find("tbody").find("tr").last(),d=c.clone();d.removeClass("oddRow1").removeClass("oddRow0").addClass("oddRow"+this.options.counter%2),c.after(d),d.find("td").first().empty().html(this.options.conditionList);var e=d.find("td"),f=a(e[1]);f.empty().html(this.options.elementList),f.append([a(document.createElement("input")).attr({type:"hidden",name:"fabrik___filter[list_"+this.options.listref+"][search_type][]",value:"advanced"}),a(document.createElement("input")).attr({type:"hidden",name:"fabrik___filter[list_"+this.options.listref+"][grouped_to_previous][]",value:"0"})]),a(e[2]).empty().html(this.options.statementList),a(e[3]).empty(),b.trigger("fabrik.advancedSearch.row.added",this)},removeRow:function(a){this.form.find(".advanced-search-remove-row").length>1&&(this.options.counter--,a.animate({height:0,opacity:0},800,function(){a.remove()})),b.trigger("fabrik.advancedSearch.row.removed",this)},resetForm:function(){var c=this.form.find(".advanced-search-list"),d=this;c&&(c.find("tbody tr").each(function(b){b>=1&&a(this).remove(),0===b&&(a(this).find(".inputbox").each(function(){this.id.test(/condition$/)?this.value=d.options.defaultStatement:this.selectedIndex=0}),a(this).find("input").each(function(){a(this).val("")}))}),b.trigger("fabrik.advancedSearch.reset",this))},deleteFilterOption:function(b){var c=this;a(b.target).off("click",function(a){c.deleteFilterOption(a)});var d=a(b.target).parent().parent(),e=d.parent();e.removeChild(d),b.preventDefault()}});return c});