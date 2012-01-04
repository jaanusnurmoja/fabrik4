var FbListPlugin=new Class({Implements:[Events,Options],options:{requireChecked:true},initialize:function(a){this.setOptions(a);this.result=true;head.ready(function(){this.listform=this.getList().getForm();var b=this.listform.getElement("input[name=listid]");if(typeOf(b)==="null"){return}this.listid=b.value;this.watchButton()}.bind(this))},getList:function(){return Fabrik.blocks["list_"+this.options.ref]},clearFilter:Function.from(),watchButton:function(){if(typeOf(this.options.name)==="null"){return}document.addEvent("click:relay(."+this.options.name+")",function(b){b.stop();var d,g;if(b.target.getParent(".fabrik_row")){d=b.target.getParent(".fabrik_row");if(d.getElement("input[name^=ids]")){g=d.getElement("input[name^=ids]");this.listform.getElements("input[name^=ids]").set("checked",false);g.set("checked",true)}}var a=false;this.listform.getElements("input[name^=ids]").each(function(e){if(e.checked){a=true}});d=b.target.getParent(".fabrik___heading");if(d&&a===false){this.listform.getElements("input[name^=ids]").set("checked",true);this.listform.getElement("input[name=checkAll]").set("checked",true);a=true}if(!a&&this.options.requireChecked){alert(Joomla.JText._("COM_FABRIK_PLEASE_SELECT_A_ROW"));return}var f=this.options.name.split("-");this.listform.getElement("input[name=fabrik_listplugin_name]").value=f[0];this.listform.getElement("input[name=fabrik_listplugin_renderOrder]").value=f.getLast();this.buttonAction()}.bind(this))},buttonAction:function(){this.list.submit("doPlugin")}});var FbListFilter=new Class({Implements:[Options,Events],options:{container:"",type:"list",id:"",advancedSearch:{}},initialize:function(d){this.filters=$H({});this.setOptions(d);this.container=document.id(this.options.container);this.filterContainer=this.container.getElement(".fabrikFilterContainer");var a=this.container.getElement(".toggleFilters");if(typeOf(a)!=="null"){a.addEvent("click",function(g){var h=a.getPosition();g.stop();var b=h.x-this.filterContainer.getWidth();var k=h.y+a.getHeight();var f=this.filterContainer.getStyle("display")==="none"?this.filterContainer.show():this.filterContainer.hide();this.filterContainer.fade("toggle");this.container.getElements(".filter").toggle()}.bind(this));if(typeOf(this.filterContainer)!=="null"){this.filterContainer.fade("hide").hide();this.container.getElements(".filter").toggle()}}if(typeOf(this.container)==="null"){return}this.getList();var e=this.container.getElement(".clearFilters");if(typeOf(e)!=="null"){e.removeEvents();e.addEvent("click",function(b){b.stop();this.container.getElements(".fabrik_filter").each(function(g){if(g.get("tag")==="select"){g.selectedIndex=0}else{g.value=""}});this.getList().plugins.each(function(f){f.clearFilter()});new Element("input",{name:"resetfilters",value:1,type:"hidden"}).inject(this.container);if(this.options.type==="list"){this.list.submit("list.clearfilter")}else{this.container.getElement("form[name=filter]").submit()}}.bind(this))}if(advancedSearch=this.container.getElement(".advanced-search-link")){advancedSearch.addEvent("click",function(g){g.stop();var f=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&tmpl=component&layout=_advancedsearch&listid="+this.options.id;this.windowopts={id:"advanced-search-win",title:Joomla.JText._("COM_FABRIK_ADVANCED_SEARCH"),loadMethod:"xhr",evalScripts:true,contentURL:f,width:690,height:300,y:this.options.popwiny,onContentLoaded:function(h){new AdvancedSearch(this.options.advancedSearch)}.bind(this)};var b=Fabrik.getWindow(this.windowopts)}.bind(this))}},getList:function(){this.list=Fabrik.blocks[this.options.type+"_"+this.options.ref];return this.list},addFilter:function(a,b){if(this.filters.has(a)===false){this.filters.set(a,[])}this.filters.get(a).push(b)},getFilterData:function(){var a={};this.container.getElements(".fabrik_filter").each(function(d){if(d.id.test(/value$/)){var b=d.id.match(/(\S+)value$/)[1];if(d.get("tag")==="select"&&d.selectedIndex!==-1){a[b]=document.id(d.options[d.selectedIndex]).get("text")}else{a[b]=d.get("value")}a[b+"_raw"]=d.get("value")}}.bind(this));return a},update:function(){this.filters.each(function(a,b){a.each(function(d){d.update()}.bind(this))}.bind(this))}});var FbList=new Class({Implements:[Options,Events],options:{admin:false,filterMethod:"onchange",ajax:false,ajax_links:false,links:{edit:"",detail:"",add:""},form:"listform_"+this.id,hightLight:"#ccffff",primaryKey:"",headings:[],labels:{},Itemid:0,formid:0,canEdit:true,canView:true,page:"index.php",actionMethod:"",formels:[],data:[],rowtemplate:"",floatPos:"left",csvChoose:false,csvOpts:{},popup_width:300,popup_height:300,popup_offset_x:null,popup_offset_y:null},initialize:function(b,a){this.id=b;this.setOptions(a);this.getForm();this.plugins=[];this.list=document.id("list_"+this.options.listRef);this.actionManager=new FbListActions(this,{method:this.options.actionMethod,floatPos:this.options.floatPos});new FbGroupedToggler(this.form);new FbListKeys(this);if(this.list){this.tbody=this.list.getElement("tbody");if(typeOf(this.tbody)==="null"){this.tbody=this.list}if(window.ie){this.options.rowtemplate=this.list.getElement(".fabrik_row")}}this.watchAll(false);Fabrik.addEvent("fabrik.form.submitted",function(){this.updateRows()}.bind(this))},setRowTemplate:function(){if(typeOf(this.options.rowtemplate)==="string"){var a=this.list.getElement(".fabrik_row");if(window.ie&&typeOf(a)!=="null"){this.options.rowtemplate=a}}},watchAll:function(a){a=a?a:false;this.watchNav();if(!a){this.watchRows()}this.watchFilters();this.watchOrder();this.watchEmpty();this.watchButtons()},watchButtons:function(){this.exportWindowOpts={id:"exportcsv",title:"Export CSV",loadMethod:"html",minimizable:false,width:360,height:120,content:""};if(this.options.view==="csv"){this.openCSVWindow()}else{if(this.form.getElements(".csvExportButton")){this.form.getElements(".csvExportButton").each(function(a){if(a.hasClass("custom")===false){a.addEvent("click",function(b){this.openCSVWindow();b.stop()}.bind(this))}}.bind(this))}}},openCSVWindow:function(){var a=this.makeCSVExportForm();this.exportWindowOpts.content=a;this.exportWindowOpts.onContentLoaded=function(){this.fitToContent()};Fabrik.getWindow(this.exportWindowOpts)},makeCSVExportForm:function(){if(this.options.csvChoose){return this._csvExportForm()}else{return this._csvAutoStart()}},_csvAutoStart:function(){var a=new Element("div",{id:"csvmsg"}).set("html",Joomla.JText._("COM_FABRIK_LOADING")+' <br /><span id="csvcount">0</span> / <span id="csvtotal"></span> '+Joomla.JText._("COM_FABRIK_RECORDS")+".<br/>"+Joomla.JText._("COM_FABRIK_SAVING_TO")+'<span id="csvfile"></span>');this.csvopts=this.options.csvOpts;this.csvfields=this.options.csvFields;this.triggerCSVExport(-1);return a},_csvExportForm:function(){var n="<input type='radio' value='1' name='incfilters' checked='checked' />"+Joomla.JText._("JYES");var h="<input type='radio' value='1' name='incraw' checked='checked' />"+Joomla.JText._("JYES");var f="<input type='radio' value='1' name='inccalcs' checked='checked' />"+Joomla.JText._("JYES");var e="<input type='radio' value='1' name='inctabledata' checked='checked' />"+Joomla.JText._("JYES");var d="<input type='radio' value='1' name='excel' checked='checked' />Excel CSV";var a="index.php?option=com_fabrik&view=list&listid="+this.id+"&format=csv&Itemid="+this.options.Itemid;var b={styles:{width:"200px","float":"left"}};var m=new Element("form",{action:a,method:"post"}).adopt([new Element("div",b).set("text",Joomla.JText._("COM_FABRIK_FILE_TYPE")),new Element("label").set("html",d),new Element("label").adopt([new Element("input",{type:"radio",name:"excel",value:"0"}),new Element("span").set("text","CSV")]),new Element("br"),new Element("br"),new Element("div",b).appendText(Joomla.JText._("COM_FABRIK_INCLUDE_FILTERS")),new Element("label").set("html",n),new Element("label").adopt([new Element("input",{type:"radio",name:"incfilters",value:"0"}),new Element("span").set("text",Joomla.JText._("JNO"))]),new Element("br"),new Element("div",b).appendText(Joomla.JText._("COM_FABRIK_INCLUDE_DATA")),new Element("label").set("html",e),new Element("label").adopt([new Element("input",{type:"radio",name:"inctabledata",value:"0"}),new Element("span").set("text",Joomla.JText._("JNO"))]),new Element("br"),new Element("div",b).appendText(Joomla.JText._("COM_FABRIK_INCLUDE_RAW_DATA")),new Element("label").set("html",h),new Element("label").adopt([new Element("input",{type:"radio",name:"incraw",value:"0"}),new Element("span").set("text",Joomla.JText._("JNO"))]),new Element("br"),new Element("div",b).appendText(Joomla.JText._("COM_FABRIK_INLCUDE_CALCULATIONS")),new Element("label").set("html",f),new Element("label").adopt([new Element("input",{type:"radio",name:"inccalcs",value:"0"}),new Element("span").set("text",Joomla.JText._("JNO"))])]);new Element("h4").set("text",Joomla.JText._("COM_FABRIK_SELECT_COLUMNS_TO_EXPORT")).inject(m);var l="";var k=0;$H(this.options.labels).each(function(p,o){if(o.substr(0,7)!=="fabrik_"&&o!=="____form_heading"){var q=o.split("___")[0];if(q!==l){l=q;new Element("h5").set("text",l).inject(m)}var g="<input type='radio' value='1' name='fields["+o+"]' checked='checked' />"+Joomla.JText._("JYES");p=p.replace(/<\/?[^>]+(>|$)/g,"");var s=new Element("div",b).appendText(p);s.inject(m);new Element("label").set("html",g).inject(m);new Element("label").adopt([new Element("input",{type:"radio",name:"fields["+o+"]",value:"0"}),new Element("span").appendText(Joomla.JText._("JNO"))]).inject(m);new Element("br").inject(m)}k++}.bind(this));if(this.options.formels.length>0){new Element("h5").set("text",Joomla.JText._("COM_FABRIK_FORM_FIELDS")).inject(m);this.options.formels.each(function(o){var g="<input type='radio' value='1' name='fields["+o.name+"]' checked='checked' />"+Joomla.JText._("JYES");var p=new Element("div",b).appendText(o.label);p.inject(m);new Element("label").set("html",g).inject(m);new Element("label").adopt([new Element("input",{type:"radio",name:"fields["+o.name+"]",value:"0"}),new Element("span").set("text",Joomla.JText._("JNO"))]).inject(m);new Element("br").inject(m)}.bind(this))}new Element("div",{styles:{"text-align":"right"}}).adopt(new Element("input",{type:"button",name:"submit",value:Joomla.JText._("COM_FABRIK_EXPORT"),"class":"button",events:{click:function(g){g.stop();g.target.disabled=true;new Element("div",{id:"csvmsg"}).set("html",Joomla.JText._("COM_FABRIK_LOADING")+' <br /><span id="csvcount">0</span> / <span id="csvtotal"></span> '+Joomla.JText._("COM_FABRIK_RECORDS")+".<br/>"+Joomla.JText._("COM_FABRIK_SAVING_TO")+'<span id="csvfile"></span>').inject(g.target,"before");this.triggerCSVExport(0)}.bind(this)}})).inject(m);new Element("input",{type:"hidden",name:"view",value:"table"}).inject(m);new Element("input",{type:"hidden",name:"option",value:"com_fabrik"}).inject(m);new Element("input",{type:"hidden",name:"listid",value:this.id}).inject(m);new Element("input",{type:"hidden",name:"format",value:"csv"}).inject(m);new Element("input",{type:"hidden",name:"c",value:"table"}).inject(m);return m},triggerCSVExport:function(e,b,a){if(e!==0){if(e===-1){e=0;b=this.csvopts;b.fields=this.csvfields}else{b=this.csvopts;a=this.csvfields}}else{if(!b){b={};if(typeOf(document.id("exportcsv"))!=="null"){$A(["incfilters","inctabledata","incraw","inccalcs","excel"]).each(function(g){var f=document.id("exportcsv").getElements("input[name="+g+"]");if(f.length>0){b[g]=f.filter(function(h){return h.checked})[0].value}})}}if(!a){a={};if(typeOf(document.id("exportcsv"))!=="null"){document.id("exportcsv").getElements("input[name^=field]").each(function(g){if(g.checked){var f=g.name.replace("fields[","").replace("]","");a[f]=g.get("value")}})}}b.fields=a;this.csvopts=b;this.csvfields=a}this.form.getElements(".fabrik_filter").each(function(g){b[g.name]=g.get("value")}.bind(this));b.start=e;b.option="com_fabrik";b.view="list";b.format="csv";b.Itemid=this.options.Itemid;b.listid=this.id;b.listref=this.id;var d=new Request.JSON({url:"",method:"post",data:b,onError:function(g,f){fconsole(g,f)},onSuccess:function(g){if(g.err){alert(g.err)}else{if(typeOf(document.id("csvcount"))!=="null"){document.id("csvcount").set("text",g.count)}if(typeOf(document.id("csvtotal"))!=="null"){document.id("csvtotal").set("text",g.total)}if(typeOf(document.id("csvfile"))!=="null"){document.id("csvfile").set("text",g.file)}if(g.count<g.total){this.triggerCSVExport(g.count)}else{var f=Fabrik.liveSite+"index.php?option=com_fabrik&view=list&format=csv&listid="+this.id+"&start="+g.count+"&Itemid="+this.options.Itemid;var h=Joomla.JText._("COM_FABRIK_CSV_COMPLETE");h+=' <a href="'+f+'">'+Joomla.JText._("COM_FABRIK_CSV_DOWNLOAD_HERE")+"</a>";if(typeOf(document.id("csvmsg"))!=="null"){document.id("csvmsg").set("html",h)}}}}.bind(this)});d.send()},addPlugins:function(b){b.each(function(a){a.list=this}.bind(this));this.plugins=b},watchEmpty:function(d){var a=document.id(this.options.form).getElement(".doempty",this.options.form);if(a){a.addEvent("click",function(b){b.stop();if(confirm(Joomla.JText._("COM_FABRIK_CONFIRM_DROP"))){this.submit("list.doempty")}}.bind(this))}},watchOrder:function(){var a=document.id(this.options.form).getElements(".fabrikorder, .fabrikorder-asc, .fabrikorder-desc");a.removeEvents("click");a.each(function(b){b.addEvent("click",function(f){var g="";var d="";b=document.id(f.target);var h=b.getParent(".fabrik_ordercell");if(b.tagName!=="a"){b=h.getElement("a")}switch(b.className){case"fabrikorder-asc":d="fabrikorder-desc";g="desc";break;case"fabrikorder-desc":d="fabrikorder";g="-";break;case"fabrikorder":d="fabrikorder-asc";g="asc";break}h=h.className.split(" ")[2].replace("_order","").replace(/^\s+/g,"").replace(/\s+$/g,"");b.className=d;this.fabrikNavOrder(h,g);f.stop()}.bind(this))}.bind(this))},watchFilters:function(){var b="";var a=document.id(this.options.form).getElement(".fabrik_filter_submit");document.id(this.options.form).getElements(".fabrik_filter").each(function(d){b=d.get("tag")==="select"?"change":"blur";if(this.options.filterMethod!=="submitform"){d.removeEvent(b);d.store("initialvalue",d.get("value"));d.addEvent(b,function(f){f.stop();if(f.target.retrieve("initialvalue")!==f.target.get("value")){this.submit("list.filter")}}.bind(this))}else{d.addEvent(b,function(f){a.highlight("#ffaa00")}.bind(this))}}.bind(this));if(this.options.filterMethod==="submitform"){if(a){a.removeEvents();a.addEvent("click",function(d){this.submit("list.filter")}.bind(this))}}document.id(this.options.form).getElements(".fabrik_filter").addEvent("keydown",function(d){if(d.code===13){d.stop();this.submit("list.filter")}}.bind(this))},setActive:function(a){this.list.getElements(".fabrik_row").each(function(b){b.removeClass("activeRow")});a.addClass("activeRow")},getActiveRow:function(a){var b=a.target.getParent(".fabrik_row");if(!b){b=this.activeRow}return b},watchRows:function(){if(!this.list){return}if(this.options.ajax_links){document.removeEvents("click:relay(.fabrik_edit)");document.addEvent("click:relay(.fabrik_edit)",function(k){var b,f,m,g;k.stop();if(typeOf(k.target.getParent(".floating-tip-wrapper"))==="null"){g=k.target.getParent("form").getElement("input[name=listref]").get("value")}else{g=k.target.getParent(".floating-tip-wrapper").retrieve("listref")}var l=Fabrik.blocks["list_"+g];var n=l.getActiveRow(k);if(!n){return}l.setActive(n);var d=n.id.replace("list_"+l.id+"_row_","");if(l.options.links.edit===""){b=Fabrik.liveSite+"index.php?option=com_fabrik&view=form&formid="+l.options.formid+"&rowid="+d+"&tmpl=component&ajax=1";f="xhr"}else{if(k.target.get("tag")==="a"){m=k.target}else{m=typeOf(k.target.getElement("a"))!=="null"?k.target.getElement("a"):k.target.getParent("a")}b=m.get("href");f="iframe"}var h={id:"add."+l.options.formid,title:this.options.popup_edit_label,loadMethod:f,contentURL:b,width:this.options.popup_width,height:this.options.popup_height};if(typeOf(this.options.popup_offset_x)!=="null"){h.offset_x=this.options.popup_offset_x}if(typeOf(this.options.popup_offset_y)!=="null"){h.offset_y=this.options.popup_offset_y}Fabrik.getWindow(h)}.bind(this));document.removeEvents("click:relay(.fabrik_view)");document.addEvent("click:relay(.fabrik_view)",function(k){var b,f,m,g;k.stop();if(typeOf(k.target.getParent(".floating-tip-wrapper"))==="null"){g=k.target.getParent("form").getElement("input[name=listid]").get("value")}else{g=k.target.getParent(".floating-tip-wrapper").retrieve("listid")}var l=Fabrik.blocks["list_"+g];var n=l.getActiveRow(k);if(!n){return}l.setActive(n);var d=n.id.replace("list_"+l.id+"_row_","");if(l.options.links.detail===""){b=Fabrik.liveSite+"index.php?option=com_fabrik&view=details&formid="+l.options.formid+"&rowid="+d+"&tmpl=component&ajax=1";f="xhr"}else{if(k.target.get("tag")==="a"){m=k.target}else{m=typeOf(k.target.getElement("a"))!=="null"?k.target.getElement("a"):k.target.getParent("a")}b=m.get("href");f="iframe"}var h={id:"view.."+l.options.formid+"."+d,title:this.options.popup_view_label,loadMethod:f,contentURL:b,width:this.options.popup_width,height:this.options.popup_height};if(typeOf(this.options.popup_offset_x)!=="null"){h.offset_x=this.options.popup_offset_x}if(typeOf(this.options.popup_offset_y)!=="null"){h.offset_y=this.options.popup_offset_y}Fabrik.getWindow(h)}.bind(this))}},getForm:function(){if(!this.form){this.form=document.id(this.options.form)}return this.form},submit:function(a){this.getForm();if(a==="list.delete"){var b=false;this.form.getElements("input[name^=ids]").each(function(d){if(d.checked){b=true}});if(!b){alert(Joomla.JText._("COM_FABRIK_SELECT_ROWS_FOR_DELETION"));Fabrik.loader.stop("listform_"+this.id);return false}if(!confirm(Joomla.JText._("COM_FABRIK_CONFIRM_DELETE"))){Fabrik.loader.stop("listform_"+this.id);return false}}Fabrik.loader.start("listform_"+this.id);if(a==="list.filter"){this.form.task.value=a;if(this.form["limitstart"+this.id]){this.form.getElement("#limitstart"+this.id).value=0}}else{if(a!==""){this.form.task.value=a}}if(this.options.ajax){this.form.getElement("input[name=option]").value="com_fabrik";this.form.getElement("input[name=view]").value="list";this.form.getElement("input[name=format]").value="raw";if(!this.request){this.request=new Request({url:this.form.get("action"),data:this.form,onComplete:function(d){d=JSON.decode(d);this._updateRows(d);Fabrik.loader.stop("listform_"+this.id)}.bind(this)})}this.request.send();Fabrik.fireEvent("fabrik.list.submit",[a,this.form.toQueryString().toObject()])}else{this.form.submit();Fabrik.loader.stop("listform_"+this.id)}return false},fabrikNav:function(a){this.options.limitStart=a;this.form.getElement("#limitstart"+this.id).value=a;Fabrik.fireEvent("fabrik.list.navigate",[this,a]);if(!this.result){this.result=true;return false}this.submit("list.view");return false},fabrikNavOrder:function(a,b){this.form.orderby.value=a;this.form.orderdir.value=b;Fabrik.fireEvent("fabrik.list.order",[this,a,b]);if(!this.result){this.result=true;return false}this.submit("list.order")},removeRows:function(b){for(i=0;i<b.length;i++){var d=document.id("list_"+this.id+"_row_"+b[i]);var a=new Fx.Morph(d,{duration:1000});a.start({backgroundColor:this.options.hightLight}).chain(function(){this.start({opacity:0})}).chain(function(){d.dispose();this.checkEmpty()}.bind(this))}},editRow:function(){},clearRows:function(){this.list.getElements(".fabrik_row").each(function(a){a.dispose()})},updateRows:function(){var b={option:"com_fabrik",view:"list",task:"list.view",format:"raw",listid:this.id};var a="";b["limit"+this.id]=this.options.limitLength;new Request.JSON({url:a,data:b,onSuccess:function(d){this._updateRows(d)}.bind(this)}).send()},_updateRows:function(e){if(e.id===this.id&&e.model==="list"){var f=document.id(this.options.form).getElements(".fabrik___heading").getLast();var n=new Hash(e.headings);n.each(function(q,o){o="."+o;try{if(typeOf(f.getElement(o))!=="null"){f.getElement(o).getElement("span").set("html",q)}}catch(p){fconsole(p)}});this.setRowTemplate();this.clearRows();var a=0;var l=0;trs=[];this.options.data=e.data;if(e.calculations){this.updateCals(e.calculations)}if(typeOf(this.form.getElement(".fabrikNav"))!=="null"){this.form.getElement(".fabrikNav").set("html",e.htmlnav)}var g=this.options.isGrouped?$H(e.data):e.data;var m=0;g.each(function(s,p){var o,u;var q=this.options.isGrouped?this.list.getElements(".fabrik_groupdata")[m]:this.tbody;m++;for(i=0;i<s.length;i++){if(typeOf(this.options.rowtemplate)==="string"){o=(!this.options.rowtemplate.match(/<tr/))?"div":"table";u=new Element(o);u.set("html",this.options.rowtemplate)}else{o=this.options.rowtemplate.get("tag")==="tr"?"table":"div";u=new Element(o);u.adopt(this.options.rowtemplate.clone())}var v=$H(s[i]);$H(v.data).each(function(z,y){var x="."+y;var r=u.getElement(x);if(typeOf(r)!=="null"&&r.get("tag")!=="a"){r.set("html",z)}l++}.bind(this));u.getElement(".fabrik_row").id=v.id;if(typeOf(this.options.rowtemplate)==="string"){var w=u.getElement(".fabrik_row").clone();w.id=v.id;w.inject(q)}else{var t=u.getElement(".fabrik_row");t.inject(q);u.empty()}a++}}.bind(this));var b=this.list.getParent(".fabrikDataContainer");var k=this.list.getParent(".fabrikForm").getElement(".emptyDataMessage");if(l===0){if(typeOf(k)!=="null"){k.setStyle("display","")}}else{if(typeOf(b)!=="null"){b.setStyle("display","")}if(typeOf(k)!=="null"){k.setStyle("display","none")}}if(typeOf(this.form.getElement(".fabrikNav"))!=="null"){this.form.getElement(".fabrikNav").set("html",e.htmlnav)}this.watchAll(true);Fabrik.fireEvent("fabrik.list.updaterows");try{Slimbox.scanPage()}catch(d){fconsole("slimbox scan:"+d)}try{Mediabox.scanPage()}catch(h){fconsole("mediabox scan:"+h)}Fabrik.fireEvent("fabrik.list.update",[this,e])}this.stripe();Fabrik.loader.stop("listform_"+this.id)},addRow:function(e){var d=new Element("tr",{"class":"oddRow1"});var a={test:"hi"};for(var b in e){if(this.options.headings.indexOf(b)!==-1){var f=new Element("td",{}).appendText(e[b]);d.appendChild(f)}}d.inject(this.tbody)},addRows:function(a){for(i=0;i<a.length;i++){for(j=0;j<a[i].length;j++){this.addRow(a[i][j])}}this.stripe()},stripe:function(){var a=this.list.getElements(".fabrik_row");for(i=0;i<a.length;i++){if(i!==0){var b="oddRow"+(i%2);a[i].addClass(b)}}},checkEmpty:function(){var a=this.list.getElements("tr");if(a.length===2){this.addRow({label:Joomla.JText._("COM_FABRIK_NO_RECORDS")})}},watchCheckAll:function(b){var a=this.form.getElement("input[name=checkAll]");if(typeOf(a)!=="null"){a.addEvent("click",function(h){var g=this.list.getParent(".fabrikList")?this.list.getParent(".fabrikList"):this.list;var f=g.getElements("input[name^=ids]");c=!h.target.checked?"":"checked";for(var d=0;d<f.length;d++){f[d].checked=c;this.toggleJoinKeysChx(f[d])}}.bind(this))}this.form.getElements("input[name^=ids]").each(function(d){d.addEvent("change",function(f){this.toggleJoinKeysChx(d)}.bind(this))}.bind(this))},toggleJoinKeysChx:function(a){a.getParent().getElements("input[class=fabrik_joinedkey]").each(function(b){b.checked=a.checked})},watchNav:function(g){var f=this.form.getElement("select[name*=limit]");if(f){f.addEvent("change",function(k){var h=Fabrik.fireEvent("fabrik.list.limit",[this]);if(this.result===false){this.result=true;return false}this.submit("list.filter")}.bind(this))}var b=this.form.getElement(".addRecord");if(typeOf(b)!=="null"&&(this.options.ajax_links)){b.removeEvents();var d=(this.options.links.add===""||b.href.contains(Fabrik.liveSite))?"xhr":"iframe";b.addEvent("click",function(k){k.stop();var h={id:"add-"+this.id,title:this.options.popup_add_label,loadMethod:d,contentURL:b.href,width:this.options.popup_width,height:this.options.popup_height};if(typeOf(this.options.popup_offset_x)!=="null"){h.offset_x=this.options.popup_offset_x}if(typeOf(this.options.popup_offset_y)!=="null"){h.offset_y=this.options.popup_offset_y}Fabrik.getWindow(h)}.bind(this))}var a=document.getElements(".fabrik_delete a");document.addEvent("click:relay(.fabrik_delete a)",function(k){var h=k.target.getParent(".fabrik_row");if(!h){h=this.activeRow}if(h){var l=h.getElement("input[type=checkbox][name*=id]");if(typeOf(l)!=="null"){l.checked=true}}else{if(this.options.actionMethod!==""){this.form.getElements("input[type=checkbox][name*=id], input[type=checkbox][name=checkAll]").each(function(e){e.checked=true})}}if(!this.submit("list.delete")){k.stop()}}.bind(this));if(document.id("fabrik__swaptable")){document.id("fabrik__swaptable").addEvent("change",function(h){window.location="index.php?option=com_fabrik&task=list.view&cid="+h.target.get("value")}.bind(this))}if(this.options.ajax){if(typeOf(this.form.getElement(".pagination"))!=="null"){this.form.getElement(".pagination").getElements(".pagenav").each(function(e){e.addEvent("click",function(h){h.stop();if(e.get("tag")==="a"){var k=e.href.toObject();this.fabrikNav(k["limitstart"+this.id])}}.bind(this))}.bind(this))}}this.watchCheckAll()},updateCals:function(b){var a=["sums","avgs","count","medians"];this.form.getElements(".fabrik_calculations").each(function(d){a.each(function(e){$H(b[e]).each(function(h,f){var g=d.getElement(".fabrik_row___"+f);if(typeOf(g)!=="null"){g.set("html",h)}})})})}});var FbListKeys=new Class({initialize:function(a){window.addEvent("keyup",function(d){if(d.alt){switch(d.key){case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_ADD"):var b=a.form.getElement(".addRecord");if(a.options.ajax){b.fireEvent("click")}if(b.getElement("a")){a.options.ajax?b.getElement("a").fireEvent("click"):document.location=b.getElement("a").get("href")}else{if(!a.options.ajax){document.location=b.get("href")}}break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_EDIT"):fconsole("edit");break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_DELETE"):fconsole("delete");break;case Joomla.JText._("COM_FABRIK_LIST_SHORTCUTS_FILTER"):fconsole("filter");break}}}.bind(this))}});var FbGroupedToggler=new Class({initialize:function(a){a.addEvent("click:relay(.fabrik_groupheading a.toggle)",function(k){k.stop();var d=k.target.getParent(".fabrik_groupheading");var b=d.getElement("img");var g=b.retrieve("showgroup",true);var f=d.getParent().getNext();g?f.hide():f.show();if(g){b.src=b.src.replace("orderasc","orderneutral")}else{b.src=b.src.replace("orderneutral","orderasc")}g=g?false:true;b.store("showgroup",g)})}});var FbListActions=new Class({Implements:[Options],options:{method:"",floatPos:"bottom"},initialize:function(b,a){this.setOptions(a);this.list=b;this.actions=[];this.setUpSubMenus();Fabrik.addEvent("fabrik.list.update",function(e,d){this.observe()}.bind(this));this.observe()},observe:function(){if(this.options.method==="floating"){this.setUpFloating()}else{this.setUpDefault()}},setUpSubMenus:function(){if(!this.list.form){return}this.actions=this.list.form.getElements("ul.fabrik_action");this.actions.each(function(b){if(b.getElement("ul")){var d=b.getElement("ul");var f=d.clone();var a=d.getParent();var e=new FloatingTips(a,{showOn:"click",position:"bottom",html:true,content:f});d.dispose()}})},setUpDefault:function(){this.actions=this.list.form.getElements("ul.fabrik_action");this.actions.each(function(a){if(a.getParent().hasClass("fabrik_buttons")){return}a.fade(0.6);var b=a.getParent(".fabrik_row")?a.getParent(".fabrik_row"):a.getParent(".fabrik___heading");if(b){b.addEvents({mouseenter:function(d){a.fade(0.99)},mouseleave:function(d){a.fade(0.6)}})}})},setUpFloating:function(){this.list.form.getElements("ul.fabrik_action").each(function(h){if(h.getParent(".fabrik_row")){if(i=h.getParent(".fabrik_row").getElement("input[type=checkbox]")){var m=function(p,o,q){if(!p.target.checked){this.hide(p,o)}if(q==="tip"){}};var k=function(o){if(o.target.checked){this.show(o.target)}};var n=function(p,q){this.activeRow=h.getParent(".fabrik_row");return h.getParent()}.bind(this.list);var l=new FloatingTips(i,{position:this.options.floatPos,html:true,showOn:"click",hideOn:"click",content:n,hideFn:m,showFn:k})}}}.bind(this));var f=this.list.form.getElement("input[name=checkAll]");var g=function(h){return h.getParent(".fabrik___heading").getElement("ul.fabrik_action")};var e=function(k,h){if(!k.target.checked){this.hide(k,h)}};var b=function(h){if(h.target.checked){this.show(h.target)}};var d=new FloatingTips(f,{position:this.options.floatPos,html:true,showOn:"click",hideOn:"click",content:g,hideFn:e,showFn:b});if(this.list.list.getElements(".fabrik_actions")){this.list.list.getElements(".fabrik_actions").hide()}if(this.list.list.getElements(".fabrik_calculation")){var a=this.list.list.getElements(".fabrik_calculation").getLast();if(typeOf(a)!=="null"){a.hide()}}}});