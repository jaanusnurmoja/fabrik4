/*! fabrik 2015-03-23 */
var FbListOrder=new Class({Extends:FbListPlugin,initialize:function(a){this.parent(a),document.ondragstart=function(){return!1},this.sortables={},this.origorder={},this.neworder={};var b=Fabrik.blocks["list_"+this.options.ref].options.isGrouped,c=this.getList().list;if(b){var d=c.getElements("tbody.fabrik_groupdata");d.each(function(a,b){a.setProperty("data-order",b),console.log(a,b),this.makeSortable(a)}.bind(this))}else c.setStyle("position","relative"),"null"!==typeOf(c.getElement("tbody"))&&(c=c.getElement("tbody")),this.makeSortable(c);return this.options.handle!==!1&&0===c.getElements(this.options.handle).length?void fconsole("order: handle selected ("+this.options.handle+") but not found in container"):void(a.enabled===!1?(fconsole("drag n drop reordering not enabled - need to order by ordering element"),this.sortable.detach()):this.options.handle?c.getElements(this.options.handle).setStyle("cursor","move"):c.getChildren().setStyle("cursor","move"))},makeSortable:function(a){var b=new Sortables(a,{clone:!0,constrain:!1,revert:!0,opacity:.7,transition:"elastic:out",handle:this.options.handle,onComplete:function(a,b){b?b.removeClass("fabrikDragSelected"):a.removeClass("fabrikDragSelected");var c=a.getParent("tbody"),d=this.sortables[c.getProperty("data-order")];this.neworder[c]=this.getOrder(d),Fabrik.loader.start("list_"+this.options.ref,"sorting",!0),new Request({url:"index.php",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"order",g:"list",listref:this.options.ref,method:"ajaxReorder",order:this.neworder[c],origorder:this.origorder[c],dragged:this.getRowId(a),listid:this.options.listid,orderelid:this.options.orderElementId,direction:this.options.direction},onComplete:function(){Fabrik.loader.stop("list_"+this.options.ref,null,!0),this.origorder[c]=this.neworder[c]}.bind(this)}).send()}.bind(this),onStart:function(a,b){var c=a.getParent("tbody"),d=this.sortables[c.getProperty("data-order")];this.origorder[c]=this.getOrder(d),b?b.addClass("fabrikDragSelected"):a.addClass("fabrikDragSelected")}.bind(this)});this.sortables[a.getProperty("data-order")]=b},getRowId:function(a){return"null"===typeOf(a.getProperty("id"))?null:a.getProperty("id").replace("list_"+this.options.ref+"_row_","")},getOrder:function(a){return a.serialize(0,function(a){return this.getRowId(a)}.bind(this)).clean()}});