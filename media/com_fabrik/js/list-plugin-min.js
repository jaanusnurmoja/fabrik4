/*! fabrik */
var FbListPlugin=new Class({Implements:[Events,Options],options:{requireChecked:!0},initialize:function(a){if(this.setOptions(a),this.result=!0,"null"!==typeOf(this.getList())){if("function"==typeof this.getList().getForm){this.listform=this.getList().getForm();var b=this.listform.getElement("input[name=listid]");if("null"===typeOf(b))return;this.listid=b.value}else this.listform=this.getList().container.getElement("form");this.watchButton()}},getList:function(){var a=Fabrik.blocks["list_"+this.options.ref];return"null"===typeOf(a)&&(a=Fabrik.blocks["visualization_"+this.options.ref]),a},getRowId:function(a){return a.hasClass("fabrik_row")||(a=a.getParent(".fabrik_row")),a.id.split("_").getLast()},clearFilter:Function.from(),watchButton:function(){"null"!==typeOf(this.options.name)&&document.addEvent("click:relay(."+this.options.name+")",function(a,b){if(!a.rightClick&&(a.stop(),b.get("data-list")===this.list.options.listRef)){a.preventDefault();var c,d;a.target.getParent(".fabrik_row")&&(c=a.target.getParent(".fabrik_row"),c.getElement("input[name^=ids]")&&(d=c.getElement("input[name^=ids]"),this.listform.getElements("input[name^=ids]").set("checked",!1),d.set("checked",!0)));var e=!1;if(this.listform.getElements("input[name^=ids]").each(function(a){a.checked&&(e=!0)}),!e&&this.options.requireChecked)return void alert(Joomla.JText._("COM_FABRIK_PLEASE_SELECT_A_ROW"));var f=this.options.name.split("-");this.listform.getElement("input[name=fabrik_listplugin_name]").value=f[0],this.listform.getElement("input[name=fabrik_listplugin_renderOrder]").value=f.getLast(),this.buttonAction()}}.bind(this))},buttonAction:function(){this.list.submit("list.doPlugin")}});