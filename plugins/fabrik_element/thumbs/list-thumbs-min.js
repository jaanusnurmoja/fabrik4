/*! Fabrik */

define(["jquery"],function(t){return new Class({options:{imageover:"",imageout:"",userid:"",formid:0,noAccessMsg:"",canUse:!0},Implements:[Events,Options],initialize:function(t,s){this.setOptions(s),this.col=document.getElements("."+t),this.origThumbUp={},this.origThumbDown={},Fabrik.bootstrapped||this.options.j3?"comment"===this.options.voteType?this.setUpBootstrappedComments():this.setUpBootstrapped():this.col.each(function(t){var s=t.getParent(".fabrik_row");if(s){var e=s.id.replace("list_"+this.options.renderContext+"_row_",""),i=t.getElements(".thumbup"),o=t.getElements(".thumbdown");i.each(function(s){this.options.canUse?(s.addEvent("mouseover",function(t){s.setStyle("cursor","pointer"),s.src=this.options.imagepath+"thumb_up_in.gif"}.bind(this)),s.addEvent("mouseout",function(t){s.setStyle("cursor",""),"up"===this.options.myThumbs[e]?s.src=this.options.imagepath+"thumb_up_in.gif":s.src=this.options.imagepath+"thumb_up_out.gif"}.bind(this)),s.addEvent("click",function(t){this.doAjax(s,"up")}.bind(this))):s.addEvent("click",function(t){t.stop(),this.doNoAccess()}.bind(this))}.bind(this)),o.each(function(s){this.options.canUse?(s.addEvent("mouseover",function(t){s.setStyle("cursor","pointer"),s.src=this.options.imagepath+"thumb_down_in.gif"}.bind(this)),s.addEvent("mouseout",function(t){s.setStyle("cursor",""),"down"===this.options.myThumbs[e]?s.src=this.options.imagepath+"thumb_down_in.gif":s.src=this.options.imagepath+"thumb_down_out.gif"}.bind(this)),s.addEvent("click",function(t){this.doAjax(s,"down")}.bind(this))):i.addEvent("click",function(t){t.stop(),this.doNoAccess()}.bind(this))}.bind(this))}}.bind(this))},setUpBootstrappedComments:function(){document.addEvent("click:relay(*[data-fabrik-thumb])",function(t,s){if(this.options.canUse){var e=!s.hasClass("btn-success"),i=s.get("data-fabrik-thumb"),o=s.get("data-fabrik-thumb-formid"),n=s.get("data-fabrik-thumb-rowid");if(this.doAjax(s,i,e),"up"===i){if(e)s.addClass("btn-success"),document.getElements("button[data-fabrik-thumb-formid="+o+"][data-fabrik-thumb-rowid="+n+"][data-fabrik-thumb=down]").removeClass("btn-danger");else s.removeClass("btn-success")}else{var a=document.getElements("button[data-fabrik-thumb-formid="+o+"][data-fabrik-thumb-rowid="+n+"][data-fabrik-thumb=up]");e?(s.addClass("btn-danger"),a.removeClass("btn-success")):s.removeClass("btn-danger")}}else t.stop(),this.doNoAccess()}.bind(this))},setUpBootstrapped:function(){this.col.each(function(t){var s=t.getParent(".fabrik_row");if(s){s.id.replace("list_"+this.options.renderContext+"_row_","");var e=t.getElement("button.thumb-up"),i=t.getElement("button.thumb-down");e.addEvent("click",function(t){if(t.stop(),this.options.canUse){var s=!e.hasClass("btn-success");this.doAjax(e,"up",s),s?(e.addClass("btn-success"),"null"!==typeOf(i)&&i.removeClass("btn-danger")):e.removeClass("btn-success")}else this.doNoAccess()}.bind(this)),"null"!==typeOf(i)&&i.addEvent("click",function(t){if(t.stop(),this.options.canUse){var s=!i.hasClass("btn-danger");this.doAjax(i,"down",s),s?(i.addClass("btn-danger"),e.removeClass("btn-success")):i.removeClass("btn-danger")}else this.doNoAccess()}.bind(this))}}.bind(this))},doAjax:function(t,s,e){if(this.options.canUse){e=!!e;var i=t.getParent(),o=t.get("data-fabrik-thumb-rowid");document.id("count_thumb"+s+o);Fabrik.loader.start(i),this.thumb=s;var n={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"thumbs",method:"ajax_rate",g:"element",element_id:this.options.elid,row_id:o,elementname:this.options.elid,userid:this.options.userid,thumb:this.thumb,listid:this.options.listid,formid:this.options.formid,add:e};"comment"===this.options.voteType&&(n.special="comments_"+this.options.formid),new Request({url:"",data:n,onComplete:function(t){var s=document.id("count_thumbup"+o),e=document.id("count_thumbdown"+o);i.getElements(".thumbup"),i.getElements(".thumbdown");Fabrik.loader.stop(i),(t=JSON.parse(t)).error?console.log(t.error):Fabrik.bootstrapped?(i.getElement("button.thumb-up .thumb-count").set("text",t[0]),"null"!==typeOf(i.getElement("button.thumb-down"))&&i.getElement("button.thumb-down .thumb-count").set("text",t[1])):(s.set("html",t[0]),e.set("html",t[1]))}.bind(this)}).send()}else this.doNoAccess()},doNoAccess:function(){""!==this.options.noAccessMsg&&window.alert(this.options.noAccessMsg)}})});