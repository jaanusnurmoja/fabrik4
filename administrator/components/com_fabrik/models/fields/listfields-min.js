/*! Fabrik */
var ListFieldsElement=new Class({Implements:[Options,Events],addWatched:!1,options:{conn:null,highlightpk:!1,showAll:1,showRaw:0,mode:"dropdown",defaultOpts:[],addBrackets:!1},initialize:function(t,e){var i,o;this.strEl=t,this.el=t,this.setOptions(e),0<this.options.defaultOpts.length?(this.el=document.id(this.el),"gui"===this.options.mode?(this.select=this.el.getParent().getElement("select.elements"),o=[this.select],"null"===typeOf(document.id(this.options.conn))&&this.watchAdd()):(o=document.getElementsByName(this.el.name),this.el.empty(),document.id(this.strEl).empty()),t=this.options.defaultOpts,Array.each(o,function(t){document.id(t).empty()}),t.each(function(e){var n={value:e.value};e.value==this.options.value&&(n.selected="selected"),Array.each(o,function(t){i=e.label||e.text,new Element("option",n).set("text",i).inject(t)})}.bind(this))):"null"===typeOf(document.id(this.options.conn))?this.cnnperiodical=this.getCnn.periodical(500,this):this.setUp()},cloned:function(t,e){this.strEl=t,this.el=document.id(t),this._cloneProp("conn",e),this._cloneProp("table",e),this.setUp()},_cloneProp:function(t,e){var n=this.options[t].split("-");(n=n.splice(0,n.length-1)).push(e),this.options[t]=n.join("-")},getCnn:function(){"null"!==typeOf(document.id(this.options.conn))&&(this.setUp(),clearInterval(this.cnnperiodical))},setUp:function(){this.el=document.id(this.el),"gui"===this.options.mode&&(this.select=this.el.getParent().getElement("select.elements")),document.id(this.options.conn).addEvent("change",function(){this.updateMe()}.bind(this)),document.id(this.options.table).addEvent("change",function(){this.updateMe()}.bind(this));var t=document.id(this.options.conn).get("value");""!==t&&-1!==t&&(this.periodical=this.updateMe.periodical(500,this)),this.watchAdd()},watchAdd:function(){var t;!0!==this.addWatched&&(console.log("watch add",this),this.addWatched=!0,t=this.el.getParent().getElement("button"),"null"!==typeOf(t))&&(t.addEvent("mousedown",function(t){t.stop(),this.addPlaceHolder()}.bind(this)),t.addEvent("click",function(t){t.stop()}))},updateMe:function(e){"event"===typeOf(e)&&e.stop(),document.id(this.el.id+"_loader")&&document.id(this.el.id+"_loader").show();var conn=document.id(this.options.conn),cid,tid,url,myAjax;conn?(cid=document.id(this.options.conn).get("value"),tid=document.id(this.options.table).get("value"),tid&&(clearInterval(this.periodical),url="index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax&g=element&plugin=field&method=ajax_fields&showall="+this.options.showAll+"&cid="+cid+"&t="+tid,myAjax=new Request({url:url,method:"get",data:{highlightpk:this.options.highlightpk,showRaw:this.options.showRaw,k:2},onComplete:function(r){var els,opts=(null!==typeOf(document.id(this.strEl))&&(this.el=document.id(this.strEl)),"gui"===this.options.mode?els=[this.select]:(els=document.getElementsByName(this.el.name),this.el.empty(),document.id(this.strEl).empty()),eval(r));Array.each(els,function(t){document.id(t).empty()}),opts.each(function(e){var n={value:e.value};e.value===this.options.value&&(n.selected="selected"),Array.each(els,function(t){new Element("option",n).set("text",e.label).inject(t)})}.bind(this)),document.id(this.el.id+"_loader")&&document.id(this.el.id+"_loader").hide(!0)}.bind(this)}),Fabrik.requestQueue.add(myAjax))):clearInterval(this.periodical)},addPlaceHolder:function(){var t=this.el.getParent().getElement("select").get("value");this.options.addBrackets&&(t="{"+(t=t.replace(/\./,"___"))+"}"),this.insertTextAtCaret(this.el,t)},getInputSelection:function(t){var e,n,i,o,s=0,l=0;return"number"==typeof t.selectionStart&&"number"==typeof t.selectionEnd?(s=t.selectionStart,l=t.selectionEnd):(o=document.selection.createRange())&&o.parentElement()===t&&(i=t.value.length,e=t.value.replace(/\r\n/g,"\n"),(n=t.createTextRange()).moveToBookmark(o.getBookmark()),(o=t.createTextRange()).collapse(!1),-1<n.compareEndPoints("StartToEnd",o)?s=l=i:(s=-n.moveStart("character",-i),s+=e.slice(0,s).split("\n").length-1,-1<n.compareEndPoints("EndToEnd",o)?l=i:(l=-n.moveEnd("character",-i),l+=e.slice(0,l).split("\n").length-1))),{start:s,end:l}},offsetToRangeCharacterMove:function(t,e){return e-(t.value.slice(0,e).split("\r\n").length-1)},setSelection:function(t,e,n){var i,o;"number"==typeof t.selectionStart&&"number"==typeof t.selectionEnd?(t.selectionStart=e,t.selectionEnd=n):void 0!==t.createTextRange&&(i=t.createTextRange(),o=this.offsetToRangeCharacterMove(t,e),i.collapse(!0),e===n?i.move("character",o):(i.moveEnd("character",this.offsetToRangeCharacterMove(t,n)),i.moveStart("character",o)),i.select())},insertTextAtCaret:function(t,e){var n=this.getInputSelection(t).end,i=n+e.length,o=t.value;t.value=o.slice(0,n)+e+o.slice(n),this.setSelection(t,i,i)}});