/*! fabrik 2015-03-23 */
var FbCalcList=new Class({options:{},Implements:[Events,Options],initialize:function(a,b){b.element=a,this.setOptions(b),this.col=$$("."+a),this.list=Fabrik.blocks[this.options.listRef],Fabrik.addEvent("fabrik.list.updaterows",function(){this.update()}.bind(this))},update:function(){var a={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"calc",g:"element",listid:this.options.listid,formid:this.options.formid,method:"ajax_listUpdate",element_id:this.options.elid,rows:this.list.getRowIds(),elementname:this.options.elid};new Request.JSON({url:"",data:a,onSuccess:function(a){$H(a).each(function(a,b){var c=this.list.list.getElement("#"+b+" ."+this.options.element);"null"!==typeOf(c)&&a!==!1&&c.set("html",a)}.bind(this))}.bind(this)}).send()}});