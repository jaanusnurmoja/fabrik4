/*! Fabrik */

define(["jquery","fab/list-plugin"],function(t,e){return new Class({Extends:e,initialize:function(t){this.parent(t),document.ondragstart=function(){return!1},this.sortables={},this.origorder={},this.neworder={};var e=Fabrik.blocks["list_"+this.options.ref].options.isGrouped,r=this.getList().list;e?r.getElements("tbody.fabrik_groupdata").each(function(t,e){t.setProperty("data-order",e),console.log(t,e),this.makeSortable(t)}.bind(this)):(r.setStyle("position","relative"),"null"!==typeOf(r.getElement("tbody"))&&(r=r.getElement("tbody")),this.makeSortable(r));!1===this.options.handle||0!==r.getElements(this.options.handle).length?!1===t.enabled?fconsole("drag n drop reordering not enabled - need to order by ordering element"):this.options.handle?r.getElements(this.options.handle).setStyle("cursor","move"):r.getChildren().setStyle("cursor","move"):fconsole("order: handle selected ("+this.options.handle+") but not found in container")},makeSortable:function(t){var e=new Sortables(t,{clone:!0,constrain:!1,revert:!0,opacity:.7,transition:"elastic:out",handle:this.options.handle,onComplete:function(t,e){e?e.removeClass("fabrikDragSelected"):t.removeClass("fabrikDragSelected");var r=t.getParent("tbody"),o=this.sortables[r.getProperty("data-order")];this.neworder[r]=this.getOrder(o),Fabrik.loader.start("list_"+this.options.ref,"sorting",!0),new Request({url:"index.php",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"order",g:"list",listref:this.options.ref,method:"ajaxReorder",order:this.neworder[r],origorder:this.origorder[r],dragged:this.getRowId(t),listid:this.options.listid,orderelid:this.options.orderElementId,direction:this.options.direction},onComplete:function(t){Fabrik.loader.stop("list_"+this.options.ref,null,!0),this.origorder[r]=this.neworder[r]}.bind(this)}).send()}.bind(this),onStart:function(t,e){var r=t.getParent("tbody"),o=this.sortables[r.getProperty("data-order")];this.origorder[r]=this.getOrder(o),e?e.addClass("fabrikDragSelected"):t.addClass("fabrikDragSelected")}.bind(this)});this.sortables[t.getProperty("data-order")]=e},getRowId:function(t){return"null"===typeOf(t.getProperty("id"))?null:t.getProperty("id").replace("list_"+this.options.ref+"_row_","")},getOrder:function(t){return t.serialize(0,function(t){return this.getRowId(t)}.bind(this)).clean()}})});