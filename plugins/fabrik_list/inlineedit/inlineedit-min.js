var FbListInlineEdit=new Class({Extends:FbListPlugin,initialize:function(a){this.parent(a);this.defaults={};this.editors={};this.inedit=false;this.saving=false;head.ready(function(){if(typeOf(this.getList().getForm())==="null"){return false}this.listid=this.options.listid;this.setUp()}.bind(this));Fabrik.addEvent("fabrik.list.clearrows",function(){this.cancel()}.bind(this));Fabrik.addEvent("fabrik.list.inlineedit.stopEditing",function(){this.stopEditing()}.bind(this));Fabrik.addEvent("fabrik.list.updaterows",function(){this.watchCells()}.bind(this));Fabrik.addEvent("fabrik.list.ini",function(){var b=this.getList();var c=b.form.toQueryString().toObject();c.format="raw";c.listref=this.options.ref;var d=new Request.JSON({url:"",data:c,onComplete:function(){console.log("complete")},onSuccess:function(e){console.log("success");e=Json.evaluate(e.stripScripts());b.options.data=e.data}.bind(this),onFailure:function(e){console.log("ajax inline edit failure",e)},onException:function(f,e){console.log("ajax inline edit exception",f,e)}}).send()}.bind(this));Fabrik.addEvent("fabrik.element.click",function(){if(Object.getLength(this.options.elements)===1&&this.options.showSave===false){this.save(null,this.editing)}}.bind(this));Fabrik.addEvent("fabrik.list.inlineedit.setData",function(){if(typeOf(this.editOpts)==="null"){return}$H(this.editOpts.plugins).each(function(b){var c=Fabrik["inlineedit_"+this.editOpts.elid].elements[b];delete c.element;c.update(this.editData[b]);c.select()}.bind(this));this.watchControls(this.editCell);this.setFocus(this.editCell)}.bind(this))},setUp:function(){if(typeOf(this.getList().getForm())==="null"){return}this.scrollFx=new Fx.Scroll(window,{wait:false});this.watchCells();document.addEvent("keydown",function(a){this.checkKey(a)}.bind(this))},watchCells:function(){var a=false;this.getList().getForm().getElements(".fabrik_element").each(function(c,b){if(this.canEdit(c)){if(!a&&this.options.loadFirst){a=this.edit(null,c);if(a){this.select(null,c)}}if(!this.isEditable(c)){return}this.setCursor(c);c.removeEvents();c.addEvent(this.options.editEvent,function(d){this.edit(d,c)}.bind(this));c.addEvent("click",function(d){this.select(d,c)}.bind(this));c.addEvent("mouseenter",function(d){if(!this.isEditable(c)){c.setStyle("cursor","pointer")}}.bind(this));c.addEvent("mouseleave",function(d){c.setStyle("cursor","")})}}.bind(this))},checkKey:function(d){var c,f,a;if(typeOf(this.td)!=="element"){return}switch(d.code){case 39:if(this.inedit){return}if(typeOf(this.td.getNext())==="element"){d.stop();this.select(d,this.td.getNext())}break;case 9:if(this.inedit){if(this.options.tabSave){if(typeOf(this.editing)==="element"){this.save(d,this.editing)}else{this.edit(d,this.td)}}var b=d.shift?this.getPreviousEditable(this.td):this.getNextEditable(this.td);if(typeOf(b)==="element"){d.stop();this.select(d,b);this.edit(d,this.td)}return}d.stop();if(d.shift){if(typeOf(this.td.getPrevious())==="element"){this.select(d,this.td.getPrevious())}}else{if(typeOf(this.td.getNext())==="element"){this.select(d,this.td.getNext())}}break;case 37:if(this.inedit){return}if(typeOf(this.td.getPrevious())==="element"){d.stop();this.select(d,this.td.getPrevious())}break;case 40:if(this.inedit){return}f=this.td.getParent();if(typeOf(f)==="null"){return}a=f.getElements("td").indexOf(this.td);if(typeOf(f.getNext())==="element"){d.stop();c=f.getNext().getElements("td");this.select(d,c[a])}break;case 38:if(this.inedit){return}f=this.td.getParent();if(typeOf(f)==="null"){return}a=f.getElements("td").indexOf(this.td);if(typeOf(f.getPrevious())==="element"){d.stop();c=f.getPrevious().getElements("td");this.select(d,c[a])}break;case 27:d.stop();this.select(d,this.editing);this.cancel(d);break;case 13:d.stop();if(typeOf(this.editing)==="element"){if(this.editors[this.activeElementId].contains("<textarea")){return}this.save(d,this.editing)}else{this.edit(d,this.td)}break}},select:function(f,h){if(!this.isEditable(h)){return}var b=this.getElementName(h);var c=this.options.elements[b];if(typeOf(c)===false){return}if(typeOf(this.td)==="element"){this.td.removeClass(this.options.focusClass)}this.td=h;if(typeOf(this.td)==="element"){this.td.addClass(this.options.focusClass)}if(typeOf(this.td)==="null"){return}if(f&&(f.type!=="click"&&f.type!=="mouseover")){var d=this.td.getPosition();var a=d.x-(window.getSize().x/2)-(this.td.getSize().x/2);var g=d.y-(window.getSize().y/2)+(this.td.getSize().y/2);this.scrollFx.start(a,g)}},getElementName:function(d){var b=d.className.split(" ").filter(function(e,c){return e!=="fabrik_element"&&e!=="fabrik_row"});var a=b[0].replace("fabrik_row___","");return a},setCursor:function(c){var a=this.getElementName(c);var b=this.options.elements[a];if(typeOf(b)==="null"){return}c.addEvent("mouseover",function(d){if(this.isEditable(d.target)){d.target.setStyle("cursor","pointer")}});c.addEvent("mouseleave",function(d){if(this.isEditable(d.target)){d.target.setStyle("cursor","")}})},isEditable:function(a){if(a.hasClass("fabrik_uneditable")||a.hasClass("fabrik_ordercell")||a.hasClass("fabrik_select")||a.hasClass("fabrik_actions")){return false}return true},getPreviousEditable:function(d){var c=false;var b=this.getList().getForm().getElements(".fabrik_element");for(var a=b.length;a>=0;a--){if(c){if(this.canEdit(b[a])){return b[a]}}if(b[a]===d){c=true}}return false},getNextEditable:function(c){var b=false;var a=this.getList().getForm().getElements(".fabrik_element").filter(function(e,d){if(b){if(this.canEdit(e)){b=false;return true}}if(e===c){b=true}return false}.bind(this));return a.getLast()},canEdit:function(c){if(!this.isEditable(c)){return false}var a=this.getElementName(c);var b=this.options.elements[a];if(typeOf(b)==="null"){return false}return true},edit:function(e,td){if(this.saving){return}Fabrik.fireEvent("fabrik.plugin.inlineedit.editing");if(this.inedit){if(this.options.editEvent==="mouseover"){if(td===this.editing){return}this.select(e,this.editing);this.cancel()}else{return}}if(!this.canEdit(td)){return false}if(typeOf(e)!=="null"){e.stop()}var element=this.getElementName(td);var rowid=this.getRowId(td);var opts=this.options.elements[element];if(typeOf(opts)==="null"){return}this.inedit=true;this.editing=td;this.activeElementId=opts.elid;this.defaults[rowid+"."+opts.elid]=td.innerHTML;var data=this.getDataFromTable(td);if(typeOf(this.editors[opts.elid])==="null"||typeOf(Fabrik["inlineedit_"+opts.elid])==="null"){Fabrik.loader.start(td.getParent());var inline=this.options.showSave?1:0;var editRequest=new Request({evalScripts:function(script,text){this.javascript=script}.bind(this),evalResponse:false,url:"",data:{element:element,elid:opts.elid,elementid:Object.values(opts.plugins),rowid:rowid,listref:this.options.ref,formid:this.options.formid,listid:this.options.listid,inlinesave:inline,inlinecancel:this.options.showCancel,option:"com_fabrik",task:"form.inlineedit",format:"raw"},onSuccess:function(r){Fabrik.loader.stop(td.getParent());(function(){Browser.exec(this.javascript)}.bind(this)).delay(1000);td.empty().set("html",r);this._animate(td,"in");r=r+'<script type="text/javascript">'+this.javascript+"<\/script>";this.editors[opts.elid]=r;this.watchControls(td);this.setFocus(td)}.bind(this),onFailure:function(xhr){this.saving=false;this.inedit=false;Fabrik.loader.stop(td.getParent());alert(editRequest.getHeader("Status"))}.bind(this),onException:function(headerName,value){this.saving=false;this.inedit=false;Fabrik.loader.stop(td.getParent());alert("ajax inline edit exception "+headerName+":"+value)}.bind(this)}).send()}else{var html=this.editors[opts.elid].stripScripts(function(script){this.javascript=script}.bind(this));td.empty().set("html",html);eval(this.javascript);this.editOpts=opts;this.editData=data;this.editCell=td}return true},_animate:function(a,b){return},getDataFromTable:function(f){var c=this.getList().options.data;var b=this.getElementName(f);var e=f.getParent(".fabrik_row").id;var a={};this.vv=[];if(typeOf(c)==="object"){c=$H(c)}c.each(function(j){if(typeOf(j)==="array"){for(var g=0;g<j.length;g++){if(j[g].id===e){this.vv.push(j[g])}}}else{var h=j.filter(function(i){return i.id===e})}}.bind(this));var d=this.options.elements[b];if(this.vv.length>0){$H(d.plugins).each(function(h,g){a[h]=this.vv[0].data[g+"_raw"]}.bind(this))}return a},setTableData:function(d,b,c){ref=d.id;var a=this.getList().options.data;if(typeOf(a)==="object"){a=$H(a)}a.each(function(f,e){f.each(function(g,h){if(g.id===ref){g.data[b+"_raw"]=c;this.currentRow=g}}.bind(this))}.bind(this))},setFocus:function(a){if(typeOf(a.getElement(".fabrikinput"))!=="null"){a.getElement(".fabrikinput").focus()}},watchControls:function(a){if(typeOf(a.getElement(".inline-save"))!=="null"){a.getElement(".inline-save").removeEvents("click").addEvent("click",function(b){this.save(b,a)}.bind(this))}if(typeOf(a.getElement(".inline-cancel"))!=="null"){a.getElement(".inline-cancel").removeEvents("click").addEvent("click",function(b){this.cancel(b,a)}.bind(this))}},save:function(h,d){var i,g=this.getElementName(d),a=this.options.elements[g],k=this.editing.getParent(".fabrik_row"),c=this.getRowId(k),j={},b={},f={};if(!this.editing){return}this.saving=true;this.inedit=false;if(h){h.stop()}b=Fabrik["inlineedit_"+a.elid];if(typeOf(b)==="null"){fconsole("issue saving from inline edit: eObj not defined");this.cancel(h);return false}Fabrik.loader.start(d.getParent());f={option:"com_fabrik",task:"form.process",format:"raw",packageId:1,fabrik_ajax:1,element:g,listref:this.options.ref,elid:a.elid,plugin:a.plugin,rowid:c,listid:this.options.listid,formid:this.options.formid,fabrik_ignorevalidation:1};f.fabrik_ignorevalidation=0;f.join={};$H(b.elements).each(function(m){m.getElement();var e=m.getValue();var l=m.options.joinId;this.setTableData(k,m.options.element,e);if(m.options.isJoin){if(typeOf(f.join[l])!=="object"){f.join[l]={}}f.join[l][m.options.elementName]=e}else{f[m.options.element]=e}}.bind(this));$H(this.currentRow.data).each(function(l,e){if(e.substr(e.length-4,4)==="_raw"){j[e.substr(0,e.length-4)]=l}});f=Object.append(j,f);f[b.token]=1;f.toValidate=this.options.elements[f.element].plugins;this.saveRequest=new Request({url:"",data:f,evalScripts:true,onSuccess:function(e){d.removeClass(this.options.focusClass);d.empty();d.empty().set("html",e);Fabrik.loader.stop(d.getParent());Fabrik.fireEvent("fabrik.list.updaterows");this.stopEditing();this.saving=false}.bind(this),onFailure:function(m){var l=d.getElement(".inlineedit .fabrikMainError");if(typeOf(l)==="null"){l=new Element("div.fabrikMainError.fabrikError");l.inject(d.getElement(".inlineedit"),"top")}this.saving=false;Fabrik.loader.stop(d.getParent());var e=m.statusText;if(typeOf(e)==="null"){e="uncaught error"}l.set("html",e)}.bind(this),onException:function(l,e){Fabrik.loader.stop(d.getParent());this.saving=false;alert("ajax inline edit exception "+l+":"+e)}.bind(this)}).send()},stopEditing:function(a){var b=this.editing;if(b!==false){b.removeClass(this.options.focusClass)}this.editing=null;this.inedit=false},cancel:function(f){if(f){f.stop()}if(typeOf(this.editing)!=="element"){return}var g=this.editing.getParent(".fabrik_row");if(g===false){return}var d=this.getRowId(g);var i=this.editing;if(i!==false){var a=this.getElementName(i);var b=this.options.elements[a];var h=this.defaults[d+"."+b.elid];i.set("html",h)}this.stopEditing()}});