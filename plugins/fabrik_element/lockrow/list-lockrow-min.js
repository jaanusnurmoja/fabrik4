/*! Fabrik */

define(["jquery"],function(e){var i=new Class({getOptions:function(){return{livesite:"",locked_img:"",unlocked_img:"",userid:""}},initialize:function(i,o){this.setOptions(this.getOptions(),o),this.id=i,this.spinner=new Asset.image(this.options.livesite+"media/com_fabrik/images/ajax-loader.gif",{alt:"loading",class:"ajax-loader"}),Fabrik.addEvent("fabrik.list.updaterows",function(){this.makeEvents()}.bind(this)),this.makeEvents()},makeEvents:function(){this.col=$$("."+this.id),this.col.each(function(i){var o=i.findClassUp("fabrik_row");if(!1!==o){var n=o.id.replace("list_"+this.options.listRef+"_row_",""),s=i.getElements(".fabrikElement_lockrow_locked"),t=i.getElements(".fabrikElement_lockrow_unlocked");s.each(function(o){this.options.can_unlocks[n]&&(e(o).find("i").on("mouseover",function(i){i.target.removeClass(this.options.lockIcon).addClass(this.options.keyIcon)}.bind(this)),e(o).find("i").on("mouseout",function(i){i.target.removeClass(this.options.keyIcon).addClass(this.options.lockIcon)}.bind(this)),e(o).find("i").on("click",function(i){this.doAjaxUnlock(o)}.bind(this)))}.bind(this)),t.each(function(o){this.options.can_locks[n]&&(e(o).find("i").on("mouseover",function(i){i.target.removeClass(this.options.lockIcon).addClass(this.options.keyIcon)}.bind(this)),e(o).find("i").on("mouseout",function(i){i.target.removeClass(this.options.keyIcon).addClass(this.options.unlockIcon)}.bind(this)),e(o).find("i").on("click",function(i){this.doAjaxLock(o)}.bind(this)))}.bind(this))}}.bind(this))},doAjaxUnlock:function(o){var n=o.findClassUp("fabrik_row").id.replace("list_"+this.options.listRef+"_row_",""),i={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"lockrow",g:"element",method:"ajax_unlock",formid:this.options.formid,element_id:this.options.elid,row_id:n,elementname:this.options.elid,userid:this.options.userid};new Request({url:"",data:i,onComplete:function(i){"unlocked"===(i=JSON.parse(i)).status&&(this.options.row_locks[n]=!1,e(o).find("i").removeClass(this.options.keyIcon).addClass(this.options.unlockIcon),e(o).find("i").off("mouseover"),e(o).find("i").off("mouseout"),e(o).find("i").off("click"),this.options.can_locks[n]&&(e(o).find("i").on("mouseover",function(i){i.target.removeClass(this.options.unlockIcon).addClass(this.options.keyIcon)}.bind(this)),e(o).find("i").on("mouseout",function(i){i.target.removeClass(this.options.keyIcon).addClass(this.options.unlockIcon)}.bind(this)),e(o).find("i").on("click",function(i){this.doAjaxLock(o)}.bind(this))))}.bind(this)}).send()},doAjaxLock:function(o){var n=o.findClassUp("fabrik_row").id.replace("list_"+this.options.listRef+"_row_",""),i={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"lockrow",g:"element",method:"ajax_lock",formid:this.options.formid,element_id:this.options.elid,row_id:n,elementname:this.options.elid,userid:this.options.userid};new Request({url:"",data:i,onComplete:function(i){"locked"===(i=JSON.parse(i)).status&&(this.options.row_locks[n]=!0,e(o).find("i").removeClass(this.options.keyIcon).addClass(this.options.lockIcon),e(o).find("i").off("mouseover"),e(o).find("i").off("mouseout"),e(o).find("i").off("click"),this.options.can_unlocks[n]&&(e(o).find("i").on("mouseover",function(i){i.target.removeClass(this.options.lockIcon).addClass(this.options.keyIcon)}.bind(this)),e(o).find("i").on("mouseout",function(i){i.target.removeClass(this.options.keyIcon).addClass(this.options.lockIcon)}.bind(this)),e(o).find("i").on("click",function(i){this.doAjaxUnlock(o)}.bind(this))))}.bind(this)}).send()}});return i.implement(new Events),i.implement(new Options),i});