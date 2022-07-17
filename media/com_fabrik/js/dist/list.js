/*! Fabrik */

define(["jquery","fab/fabrik","fab/list-toggle","fab/list-grouped-toggler","fab/list-keys","fab/list-actions","fab/mootools-ext"],function(_,g,s,o,n,t){return new Class({Binds:[],Implements:[Options,Events],actionManager:null,options:{admin:!1,filterMethod:"onchange",ajax:!1,ajax_links:!1,links:{edit:"",detail:"",add:""},form:"listform_"+this.id,hightLight:"#ccffff",primaryKey:"",headings:[],labels:{},Itemid:0,formid:0,canEdit:!0,canView:!0,page:"index.php",actionMethod:"floating",formels:[],data:[],itemTemplate:"",floatPos:"left",csvChoose:!1,advancedFilters:null,csvOpts:{excel:!1,incfilters:!1,inctabledata:!1,incraw:!1,inccalcs:!1},popup_width:300,popup_height:300,popup_offset_x:null,popup_offset_y:null,groupByOpts:{},isGrouped:!1,listRef:"",fabrik_show_in_list:[],singleOrdering:!1,tmpl:"",groupedBy:"",toggleCols:!1},initialize:function(t,i){var e=this;this.id=t,this.setOptions(i),this.getForm(),this.result=!0,this.plugins=[],this.list=document.id("list_"+this.options.listRef),this.rowTemplate=!1,this.options.toggleCols&&(this.toggleCols=new s(this.form)),this.groupToggle=new o(this.form,this.options.groupByOpts),new n(this),this.list&&("table"===this.list.get("tag")&&(this.tbody=this.list.getElement("tbody")),"null"===typeOf(this.tbody)&&(this.tbody=this.list.getElement(".fabrik_groupdata")),window.ie&&(this.options.itemTemplate=this.list.getElement(".fabrik_row"))),this.watchAll(!1),g.addEvent("fabrik.form.submitted",function(){e.updateRows()}),!this.options.resetFilters&&window.history&&history.pushState&&history.state&&this.options.ajax&&this._updateRows(history.state),this.mediaScan(),g.fireEvent("fabrik.list.loaded",[this])},setItemTemplate:function(){if("string"===typeOf(this.options.itemTemplate)){var t=this.list.getElement(".fabrik_row");window.ie&&"null"!==typeOf(t)&&(this.options.itemTemplate=t)}},setRowTemplate:function(t){return this.rowTemplate||(this.rowTemplate=t.clone().empty(),0===this.rowTemplate.length&&(this.rowTemplate=_(this.tbody).children().not(".groupDataMsg").first())),this.rowTemplate},rowClicks:function(){var t,i,e=this;_(this.list).on("click",".fabrik_row",function(){t=this.id.split("_").pop(),i={errors:{},data:{rowid:t},rowid:t,listid:e.id},g.fireEvent("fabrik.list.row.selected",i)})},watchAll:function(t){t=t||!1,this.watchNav(),this.storeCurrentValue(),t||(this.watchRows(),this.watchFilters()),this.watchOrder(),this.watchEmpty(),t||(this.watchGroupByMenu(),this.watchButtons())},watchGroupByMenu:function(){var i=this;this.options.ajax&&_(this.form).on("click","*[data-groupBy]",function(t){i.options.groupedBy=_(this).data("groupby"),t.rightClick||(t.preventDefault(),i.updateRows())})},watchButtons:function(){var e=this;this.exportWindowOpts={modalId:"exportcsv",type:"modal",id:"exportcsv",title:"Export CSV",loadMethod:"html",minimizable:!1,width:360,height:240,content:"",modal:!0,bootstrap:!0,visible:!0,onContentLoaded:function(){var t=this;window.setTimeout(function(){t.fitToContent()},1e3)}},this.exportWindowOpts.width=0<parseInt(this.options.csvOpts.popupwidth,10)?this.options.csvOpts.popupwidth:360,this.exportWindowOpts.optswidth=0<parseInt(this.options.csvOpts.optswidth,10)?this.options.csvOpts.optswidth:240,"csv"===this.options.view?this.openCSVWindow():_(this.form).find(".csvExportButton").each(function(t,i){!1===(i=_(i)).hasClass("custom")&&i.on("click",function(t){t.preventDefault(),e.openCSVWindow()})})},openCSVWindow:function(){var e=this;this.exportWindowOpts.content=this.makeCSVExportForm(),this.csvWindow=g.getWindow(this.exportWindowOpts),_(".exportCSVButton").on("click",function(t){t.stopPropagation(),this.disabled=!0,_(this).hide(),_(this).closest("div.modal").find(".contentWrapper").hide();var i=_("#csvmsg");0===i.length&&(i=_("<div />").attr({id:"csvmsg"}).insertBefore(_(this))),i.html(Joomla.JText._("COM_FABRIK_LOADING")+' <p><span id="csvcount">0</span> / <span id="csvtotal"></span> '+Joomla.JText._("COM_FABRIK_RECORDS")+'</p><p class="saveto">'+Joomla.JText._("COM_FABRIK_SAVING_TO")+' <span id="csvfile"></span></p>'),e.triggerCSVExport(0)})},makeCSVExportForm:function(){return this.options.csvChoose?(this.csvExportForm=this._csvExportForm(),this.csvExportForm):this._csvAutoStart()},_csvAutoStart:function(){var t=_("<div />").attr({id:"csvmsg"}).html(Joomla.JText._("COM_FABRIK_LOADING")+' <br /><span id="csvcount">0</span> / <span id="csvtotal"></span> '+Joomla.JText._("COM_FABRIK_RECORDS")+".<br/>"+Joomla.JText._("COM_FABRIK_SAVING_TO")+'<span id="csvfile"></span>');return this.csvopts=this.options.csvOpts,this.csvfields=this.options.csvFields,this.triggerCSVExport(-1),t},makeSafeForCSS:function(t){return t.replace(/[^a-z0-9]/g,function(t){var i=t.charCodeAt(0);return 32==i?"-":65<=i&&i<=90?t.toLowerCase():("000"+i.toString(16)).slice(-4)})},_csvYesNo:function(t,i,e,s,o){var n=_("<label />").css({display:"inline-block","margin-left":"15px"}),a=n.clone().append([_("<input />").attr({type:"radio",name:t,value:"1",checked:i}),_("<span />").text(e)]),r=n.clone().append([_("<input />").attr({type:"radio",name:t,value:"0",checked:!i}),_("<span />").text(s)]),l=_("<div>").css({margin:"3px 0px 1px 8px",width:this.exportWindowOpts.optswidth+"px",float:"left"}).text(o),c="opt__"+this.makeSafeForCSS(o);return _('<div class="'+c+'">').css({"border-bottom":"1px solid #dddddd"}).append([l,a,r])},_csvExportForm:function(){var s,t,o=Joomla.JText._("JYES"),n=Joomla.JText._("JNO"),a=this,i=g.liveSite+"/index.php?option=com_fabrik&view=list&listid="+this.id+"&format=csv&Itemid="+this.options.Itemid,r=(_("<label />").css("clear","left"),_("<form />").css("margin-bottom","0px").attr({action:i,method:"post"}).append([this._csvYesNo("excel",this.options.csvOpts.excel,"Excel CSV","CSV",Joomla.JText._("COM_FABRIK_FILE_TYPE")),this._csvYesNo("incfilters",this.options.csvOpts.incfilters,o,n,Joomla.JText._("COM_FABRIK_INCLUDE_FILTERS")),this._csvYesNo("inctabledata",this.options.csvOpts.inctabledata,o,n,Joomla.JText._("COM_FABRIK_INCLUDE_DATA")),this._csvYesNo("incraw",this.options.csvOpts.incraw,o,n,Joomla.JText._("COM_FABRIK_INCLUDE_RAW_DATA")),this._csvYesNo("inccalcs",this.options.csvOpts.inccalcs,o,n,Joomla.JText._("COM_FABRIK_INCLUDE_CALCULATIONS"))]));t=Joomla.JText._("COM_FABRIK_SELECT_COLUMNS_TO_EXPORT"),s="opt__"+a.makeSafeForCSS(t),_("<div />").prop("class",s).text(t).appendTo(r);var l="";return _.each(this.options.labels,function(t,i){if("fabrik_"!==t.substr(0,7)&&"____form_heading"!==t){var e=t.split("___")[0];e!==l&&(l=e,s="opt__"+a.makeSafeForCSS(l),_("<div />").prop("class",s).css({clear:"left","font-weight":"600"}).text(l).appendTo(r)),i=i.replace(/<\/?[^>]+(>|jQuery)/g,""),a._csvYesNo("fields["+t+"]",!0,o,n,i).appendTo(r)}0}),0<this.options.formels.length&&(t=Joomla.JText._("COM_FABRIK_FORM_FIELDS"),s="opt__"+a.makeSafeForCSS(t),_("<div />").prop("class",s).text(t).appendTo(r),this.options.formels.each(function(t){a._csvYesNo("fields["+t.name+"]",!1,o,n,t.label).appendTo(r)})),_("<input />").attr({type:"hidden",name:"view",value:"table"}).appendTo(r),_("<input />").attr({type:"hidden",name:"option",value:"com_fabrik"}).appendTo(r),_("<input />").attr({type:"hidden",name:"listid",value:a.id}).appendTo(r),_("<input />").attr({type:"hidden",name:"format",value:"csv"}).appendTo(r),_("<input />").attr({type:"hidden",name:"c",value:"table"}).appendTo(r),r},triggerCSVExport:function(t,e,i){var s=this;0!==t?-1===t?(t=0,(e=s.csvopts).fields=s.csvfields):(e=s.csvopts,i=s.csvfields):(e||(e={},["incfilters","inctabledata","incraw","inccalcs","excel"].each(function(t){var i=s.csvExportForm.find("input[name="+t+"]");0<i.length&&(e[t]=i.filter(function(){return this.checked})[0].value)})),i||(i={},s.csvExportForm.find("input[name^=field]").each(function(){if(this.checked){var t=this.name.replace("fields[","").replace("]","");i[t]=_(this).val()}})),e.fields=i,s.csvopts=e,s.csvfields=i),(e=this.csvExportFilterOpts(e)).start=t,e.option="com_fabrik",e.view="list",e.format="csv",e.listid=this.id,e.listref=this.options.listRef,e.download=0,e.setListRefFromRequest=1;var o="?Itemid="+this.options.Itemid;this.options.csvOpts.custom_qs.split("&").each(function(t){o+="&"+t}),new Request.JSON({url:o,method:"post",data:e,onError:function(t,i){fconsole(t,i)},onComplete:function(t){if(t.err)window.alert(t.err),g.Windows.exportcsv.close();else if(_("#csvcount").text(t.count),_("#csvtotal").text(t.total),_("#csvfile").text(t.file),t.count<t.total)s.triggerCSVExport(t.count);else{var i;s.options.admin?i=g.liveSite+"administrator/index.php?option=com_fabrik&task=list.view&format=csv&listid="+s.id+"&start="+t.count:(i=s.options.csvOpts.exportLink,i+=i.contains("?")?"&":"?",i+="start="+t.count),i+="&"+s.options.csvOpts.custom_qs;var e='<div class="alert alert-success" style="padding:10px;margin-bottom:3px"><h3>'+Joomla.JText._("COM_FABRIK_CSV_COMPLETE");e+='</h3><p><a class="btn btn-success" href="'+i+'"><i class="icon-download"></i> '+Joomla.JText._("COM_FABRIK_CSV_DOWNLOAD_HERE")+"</a></p></div>",_("#csvmsg").html(e),document.getElements("input.exportCSVButton").removeProperty("disabled"),_("#csvmsg a.btn-success").focusout(function(){g.Windows.exportcsv.close(!0)}),s.csvWindow.fitToContent()}}}).send()},csvExportFilterOpts:function(e){var s,o,n,a,r=0,l=this,c=0,p=["value","condition","join","key","search_type","match","full_words_only","eval","grouped_to_previous","hidden","elementid"];return this.getFilters().each(function(t,i){i=_(i),3<(o=i.prop("name").split("[")).length&&(a=parseInt(o[3].replace("]",""),10),r=r<a?a:r,"checkbox"===i.prop("type")||"radio"===i.prop("type")?i[0].checked&&(e[i.name]=i.val()):e[i.name]=i.val())}),r++,Object.each(this.options.advancedFilters,function(t,i){if(p.contains(i))for(s=c=0;s<t.length;s++)c=s+r,n="fabrik___filter[list_"+l.options.listRef+"]["+i+"]["+c+"]",e[n]="value"===i?l.options.advancedFilters.origvalue[s]:"condition"===i?l.options.advancedFilters.orig_condition[s]:t[s]}),e},addPlugins:function(t){var i=this;t.each(function(t){t.list=i}),this.plugins=t},firePlugin:function(i){var e=Array.prototype.slice.call(arguments),s=this;return e=e.slice(1,e.length),this.plugins.each(function(t){g.fireEvent(i,[s,e])}),!1!==this.result},watchEmpty:function(){var i=this;_(this.form).find(".doempty").on("click",function(t){t.preventDefault(),window.confirm(Joomla.JText._("COM_FABRIK_CONFIRM_DROP"))&&i.submit("list.doempty")})},watchOrder:function(){var r,l,c,p,d=!1,h=_(this.form),f=this,t=h.find(".fabrikorder, .fabrikorder-asc, .fabrikorder-desc");t.off("click"),t.on("click",function(t){var i="",e="",s="",o="",n=_(this),a=n.closest(".fabrik_ordercell");switch("A"!==n.prop("tagName")&&(n=a.find("a")),n.attr("class")){case"fabrikorder-asc":e="fabrikorder-desc",s=n.data("data-sort-desc-icon"),o=n.data("data-sort-asc-icon"),i="desc","orderdesc.png";break;case"fabrikorder-desc":e="fabrikorder",s=n.data("data-sort-icon"),o=n.data("data-sort-desc-icon"),i="-","ordernone.png";break;case"fabrikorder":e="fabrikorder-asc",s=n.data("data-sort-asc-icon"),o=n.data("data-sort-icon"),i="asc","orderasc.png"}a.attr("class").split(" ").each(function(t){t.contains("_order")&&(d=t.replace("_order","").replace(/^\s+/g,"").replace(/\s+$/g,""))}),d?(n.attr("class",e),l=g.bootstrapped?n.find("*[data-isicon]"):(r=n.find("img"),n.firstElementChild),f.options.singleOrdering&&h.find(".fabrikorder, .fabrikorder-asc, .fabrikorder-desc").each(function(t){if(g.bootstrapped)switch(c=t.firstElementChild,t.className){case"fabrikorder-asc":c.removeClass(t.data("sort-asc-icon")),c.addClass(t.data("sort-icon"));break;case"fabrikorder-desc":c.removeClass(t.data("sort-desc-icon")),c.addClass(t.data("sort-icon"))}else 0<(r=t.find("img")).length&&(p=(p=r.attr("src")).replace("ordernone.png","").replace("orderasc.png","").replace("orderdesc.png",""),p+="ordernone.png",r.attr("src",p))}),g.bootstrapped?(l.removeClass(o),l.addClass(s)):r&&(p=(p=r.attr("src")).replace("ordernone.png","").replace("orderasc.png","").replace("orderdesc.png",""),r.attr("src",p)),f.fabrikNavOrder(d,i),t.preventDefault()):fconsole("woops didnt find the element id, cant order")})},getFilters:function(){return _(this.form).find(".fabrik_filter")},storeCurrentValue:function(){"submitform"!==this.options.filterMethod&&this.getFilters().each(function(t,i){(i=_(i)).data("initialvalue",i.val())})},watchFilters:function(){var e="",s=this,t=_(this.form).find(".fabrik_filter_submit");this.getFilters().each(function(t,i){i=_(i),e="SELECT"===i.prop("tagName")||"checkbox"===i.prop("type")?"change":"blur","submitform"!==s.options.filterMethod&&(i.off(e),i.on(e,function(t){t.preventDefault(),"checkbox"!==i.prop("type")&&i.data("initialvalue")===i.val()||s.doFilter()}))}),t.off(),t.on("click",function(t){t.preventDefault(),s.doFilter()}),this.getFilters().on("keydown",function(t){13===t.keyCode&&(t.preventDefault(),s.doFilter())})},doFilter:function(){var t=g.fireEvent("list.filter",[this]).eventResults;null===t&&this.submit("list.filter"),0!==t.length&&t.contains(!1)||this.submit("list.filter")},setActive:function(t){this.list.getElements(".fabrik_row").each(function(t){t.removeClass("activeRow")}),t.addClass("activeRow")},getActiveRow:function(t){var i=_(t.target).closest(".fabrik_row");return 0===i.length&&(i=g.activeRow),i},watchRows:function(){this.list&&this.rowClicks()},getForm:function(){return this.form||(this.form=document.id(this.options.form)),this.form},uncheckAll:function(){_(this.form).find("input[name^=ids]").each(function(t,i){i.checked=""})},submitDeleteCheck:function(){var e=!1,s=0;if(_(this.form).find("input[name^=ids]").each(function(t,i){i.checked&&(s++,e=!0)}),!e)return window.alert(Joomla.JText._("COM_FABRIK_SELECT_ROWS_FOR_DELETION")),g.loader.stop("listform_"+this.options.listRef),!1;var t=1===s?Joomla.JText._("COM_FABRIK_CONFIRM_DELETE_1"):Joomla.JText._("COM_FABRIK_CONFIRM_DELETE").replace("%s",s);return!!window.confirm(t)||(g.loader.stop("listform_"+this.options.listRef),this.uncheckAll(),!1)},submit:function(t){this.getForm();var i=this.options.ajax,e=this,s=_(this.form);if("list.doPlugin.noAJAX"===t&&(i=!(t="list.doPlugin")),"list.delete"===t&&!this.submitDeleteCheck())return!1;if("list.filter"===t?(g["filter_listform_"+this.options.listRef].onSubmit(),this.form.task.value=t,this.form["limitstart"+this.id]&&s.find("#limitstart"+this.id).val(0)):"list.view"===t?g["filter_listform_"+this.options.listRef].onSubmit():""!==t&&(this.form.task.value=t),i){g.loader.start("listform_"+this.options.listRef),s.find("input[name=option]").val("com_fabrik"),s.find("input[name=view]").val("list"),s.find("input[name=format]").val("raw");var o=this.form.toQueryString();if(o+="&setListRefFromRequest=1",o+="&listref="+this.options.listRef,o+="&Itemid="+this.options.Itemid,"list.filter"===t&&!1!==this.advancedSearch){var n=document.getElement("form.advancedSearch_"+this.options.listRef);"null"!==typeOf(n)&&(o+="&"+n.toQueryString(),o+="&replacefilters=1")}for(var a=0;a<this.options.fabrik_show_in_list.length;a++)o+="&fabrik_show_in_list[]="+this.options.fabrik_show_in_list[a];o+="&tmpl="+this.options.tmpl,this.request?this.request.options.data=o:this.request=new Request({url:this.form.get("action"),data:o,onComplete:function(t){t=JSON.parse(t),e._updateRows(t),g.loader.stop("listform_"+e.options.listRef),g["filter_listform_"+e.options.listRef].onUpdateData(),g["filter_listform_"+e.options.listRef].updateFilterCSS(t),_("#searchall_"+e.options.listRef).val(t.searchallvalue),g.fireEvent("fabrik.list.submit.ajax.complete",[e,t]),t.msg&&t.showmsg&&window.alert(t.msg)}}),this.request.send(),window.history&&window.history.pushState&&history.pushState(o,"fabrik.list.submit"),g.fireEvent("fabrik.list.submit",[t,this.form.toQueryString().toObject()])}else this.form.submit();return!1},fabrikNav:function(t){return this.options.limitStart=t,this.form.getElement("#limitstart"+this.id).value=t,g.fireEvent("fabrik.list.navigate",[this,t]),this.result?(this.submit("list.view"),!1):!(this.result=!0)},getRowIds:function(){var i=[];return(this.options.isGrouped?$H(this.options.data):this.options.data).each(function(t){t.each(function(t){i.push(t.data.__pk_val)})}),i},getCheckedRowIds:function(){return this.getForm().getElements("input[name^=ids]").filter(function(t){return t.checked}).map(function(t){return t.get("value")})},getRow:function(s){var o={};return Object.each(this.options.data,function(t){for(var i=0;i<t.length;i++){var e=t[i];e&&e.data.__pk_val===s&&(o=e.data)}}),o},fabrikNavOrder:function(t,i){if(this.form.orderby.value=t,this.form.orderdir.value=i,g.fireEvent("fabrik.list.order",[this,t,i]),!this.result)return!(this.result=!0);this.submit("list.order")},removeRows:function(t){var i,e=this,s=function(){o.dispose(),e.checkEmpty()};for(i=0;i<t.length;i++){var o=document.id("list_"+e.id+"_row_"+t[i]);new Fx.Morph(o,{duration:1e3}).start({backgroundColor:this.options.hightLight}).chain(function(){this.start({opacity:0})}).chain(s)}},editRow:function(){},clearRows:function(){this.list.getElements(".fabrik_row").each(function(t){t.dispose()})},updateRows:function(t){var i=this,e={option:"com_fabrik",view:"list",task:"list.view",format:"raw",listid:this.id,listref:this.options.listRef};e["limit"+this.id]=this.options.limitLength,t&&Object.append(e,t),""!==this.options.groupedBy&&(e.group_by=this.options.groupedBy),new Request({url:"",data:e,evalScripts:!1,onSuccess:function(t){t=t.stripScripts(),t=JSON.parse(t),i._updateRows(t)},onError:function(t,i){fconsole(t,i)},onFailure:function(t){fconsole(t)}}).send()},_updateHeadings:function(t){var e=_("#"+this.options.form).find(".fabrik___heading");_.each(t.headings,function(t,i){t="."+t;try{e.find(t+" span").html(i)}catch(t){fconsole(t)}})},_updateGroupByTables:function(){var e,t=_(this.list).find("tbody");t.css("display",""),t.each(function(t,i){i.hasClass("fabrik_groupdata")||(e=_(i).next(),0===_(e).find(".fabrik_row").length&&(_(i).hide(),_(e).hide()))})},_updateRows:function(t){var s,o,n,a,i,r,l,e,c,p,d=[],h=_(this.form),f=this,u="tr";if("object"===typeOf(t)&&(window.history&&window.history.pushState&&history.pushState(t,"fabrik.list.rows"),t.id===this.id&&"list"===t.model)){this._updateHeadings(t),this.setItemTemplate(),0===(e=_(this.list).find(".fabrik_row").first()).length&&(e=_(this.options.itemTemplate)),u="TR"===e.prop("tagName")?(i=e,a=1,"tr"):(i=e.parent(),a=h.find(".fabrikDataContainer").data("cols"),"div"),a=void 0===a?1:a,l=this.setRowTemplate(i),o=e.clone(),this.clearRows(),this.options.data=this.options.isGrouped?$H(t.data):t.data,t.calculations&&this.updateCals(t.calculations),h.find(".fabrikNav").html(t.htmlnav);var m=this.options.isGrouped||""!==this.options.groupedBy?$H(t.data):t.data,v=0;m.each(function(t,i){for(s=f.options.isGrouped?f.list.getElements(".fabrik_groupdata")[v]:f.tbody,(s=_(s)).children().not(".groupDataMsg").remove(),f.options.isGrouped&&s.prev().find(".groupTitle").html(t[0].groupHeading),d=[],v++,n=0;n<t.length;n++){var e=$H(t[n]);r=f.injectItemData(o,e,u),d.push(r)}for(d=g.Array.chunk(d,a),n=0;n<d.length;n++)p="div"===u?(c=d[n],l.clone().append(c)):d[n],s.append(p)}),this._updateGroupByTables(),this._updateEmptyDataMsg(0===d.length),this.watchAll(!0),g.fireEvent("fabrik.list.updaterows"),g.fireEvent("fabrik.list.update",[this,t]),this.stripe(),this.mediaScan(),g.loader.stop("listform_"+this.options.listRef)}},_updateEmptyDataMsg:function(t){var i=_(this.list),e=i.parent(".fabrikDataContainer"),s=i.closest(".fabrikForm").find(".emptyDataMessage");t?(s.css("display",""),"none"===s.parent().css("display")&&s.parent().css("display",""),s.parent(".emptyDataMessage").css("display","")):(e.css("display",""),s.css("display","none"))},injectItemData:function(o,t,i){var e,n,s,a;if(_.each(t.data,function(t,i){var e;if("A"!==(n=o.find("."+t)).prop("tagName"))n.html(i);else try{e=_(i).prop("href");var s=_(i).data("rowid");_.each(n,function(t,i){0===_(i).data("iscustom")&&(_(i).prop("href",e),_(i).data("rowid",s))})}catch(t){n.prop("href",i)}}),"string"==typeof this.options.itemTemplate){if((s=o.find(".fabrik_row").addBack(o)).prop("id",t.id),"div"!==i){s.removeClass();var r=t.class.split(/\s+/);for(a=0;a<r.length;a++)s.addClass(r[a])}else{s.removeClass("oddRow0"),s.removeClass("oddRow1");r=t.class.split(/\s+/);for(a=0;a<r.length;a++)s.hasClass(r[a])||s.addClass(r[a])}e=o.clone()}else e=o.find(".fabrik_row").addBack(o);return e},mediaScan:function(){"undefined"!=typeof Slimbox&&Slimbox.scanPage(),"undefined"!=typeof Lightbox&&Lightbox.init(),"undefined"!=typeof Mediabox&&Mediabox.scanPage()},addRow:function(t){var i=new Element("tr",{class:"oddRow1"});for(var e in t)if(-1!==this.options.headings.indexOf(e)){var s=new Element("td",{}).appendText(t[e]);i.appendChild(s)}i.inject(this.tbody)},addRows:function(t){var i,e;for(i=0;i<t.length;i++)for(e=0;e<t[i].length;e++)this.addRow(t[i][e]);this.stripe()},stripe:function(){var t,i=this.list.getElements(".fabrik_row");for(t=0;t<i.length;t++)if(!i[t].hasClass("fabrik___header")){var e="oddRow"+t%2;i[t].addClass(e)}},checkEmpty:function(){2===this.list.getElements("tr").length&&this.addRow({label:Joomla.JText._("COM_FABRIK_NO_RECORDS")})},watchCheckAll:function(){var i,e,s,o,t=_(this.form),n=t.find("input[name=checkAll]"),a=this,r=_(this.list);n.on("click",function(t){for(s=0<r.closest(".fabrikList").length?r.closest(".fabrikList"):r,o=s.find("input[name^=ids]"),i=t.target.checked?"checked":"",e=0;e<o.length;e++)o[e].checked=i,a.toggleJoinKeysChx(o[e])}),t.find("input[name^=ids]").each(function(t,i){_(i).on("change",function(){a.toggleJoinKeysChx(i)})})},toggleJoinKeysChx:function(i){i.getParent().getElements("input[class=fabrik_joinedkey]").each(function(t){t.checked=i.checked})},watchNav:function(t){var e,i,s=_(this.form),o=s.find("select[name*=limit]"),n=s.find(".addRecord"),a=this;if(o.on("change",function(){if(g.fireEvent("fabrik.list.limit",[a]),!1===a.result)return!(a.result=!0);a.doFilter()}),this.options.ajax_links&&0<n.length){n.off(),i=n.prop("href"),e=""===this.options.links.add||i.contains(g.liveSite)?"xhr":"iframe";var r=i;r+=r.contains("?")?"&":"?",r+="tmpl=component&ajax=1",r+="&format=partial",n.on("click",function(t){t.preventDefault();var i={id:"add."+a.id,title:a.options.popup_add_label,loadMethod:e,contentURL:r,width:a.options.popup_width,height:a.options.popup_height};null!==a.options.popup_offset_x&&(i.offset_x=a.options.popup_offset_x),null!==a.options.popup_offset_y&&(i.offset_y=a.options.popup_offset_y),g.getWindow(i)})}_("#fabrik__swaptable").on("change",function(){window.location="index.php?option=com_fabrik&task=list.view&cid="+this.value});var l=s.find(".pagination .pagenav");0===l.length&&(l=s.find(".pagination a")),_(l).on("click",function(t){if(t.preventDefault(),"A"===this.tagName){var i=this.href.toObject();a.fabrikNav(i["limitstart"+a.id])}}),this.watchCheckAll()},updateCals:function(i){var t=["sums","avgs","count","medians"];this.form.getElements(".fabrik_calculations").each(function(s){t.each(function(t){$H(i[t]).each(function(t,i){var e=s.getElement("."+i);"null"!==typeOf(e)&&e.set("html",t)})})})}})});