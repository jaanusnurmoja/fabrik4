var FbForm=new Class({Implements:[Options,Events],options:{rowid:"",admin:false,ajax:false,primaryKey:null,error:"",submitOnEnter:false,delayedEvents:false,updatedMsg:"Form saved",pages:[],start_page:0,ajaxValidation:false,customJsAction:"",plugins:[],ajaxmethod:"post",inlineMessage:true,images:{alert:"",action_check:"",ajax_loader:""}},initialize:function(b,a){if(typeOf(a.rowid)==="null"){a.rowid=""}this.id=b;this.result=true;this.setOptions(a);this.plugins=this.options.plugins;this.options.pages=$H(this.options.pages);this.subGroups=$H({});this.currentPage=this.options.start_page;this.formElements=$H({});this.bufferedEvents=[];this.duplicatedGroups=$H({});this.fx={};this.fx.elements=[];this.fx.validations={};this.setUpAll();this._setMozBoxWidths();(function(){this.duplicateGroupsToMin()}.bind(this)).delay(1000)},_setMozBoxWidths:function(){if(Browser.firefox&&this.getForm()){this.getForm().getElements(".fabrikElementContainer > .displayBox").each(function(c){var f=c.getParent().getComputedSize();var a=c.getParent().getSize().x-(f.computedLeft+f.computedRight);var d=c.getParent().getSize().x===0?400:a;c.setStyle("width",d+"px");var g=c.getElement(".fabrikElement");if(typeOf(g)!=="null"){a=0;c.getChildren().each(function(b){if(b!==g){a+=b.getSize().x}});g.setStyle("width",d-a-10+"px")}})}},setUpAll:function(){this.setUp();this.winScroller=new Fx.Scroll(window);if(this.form){if(this.options.ajax||this.options.submitOnEnter===false){this.stopEnterSubmitting()}this.watchAddOptions()}$H(this.options.hiddenGroup).each(function(f,e){if(f===true&&typeOf(document.id("group"+e))!=="null"){var g=document.id("group"+e).getElement(".fabrikSubGroup");this.subGroups.set(e,g.cloneWithIds());this.hideLastGroup(e,g)}}.bind(this));this.repeatGroupMarkers=$H({});if(this.form){this.form.getElements(".fabrikGroup").each(function(e){var g=e.id.replace("group","");var f=e.getElements(".fabrikSubGroup").length;if(f===1){if(e.getElement(".fabrikSubGroupElements").getStyle("display")==="none"){f=0}}this.repeatGroupMarkers.set(g,f)}.bind(this));var a=this.options.editable===true?"form":"details";var d=this.form.getElement("input[name=rowid]");var c=typeOf(d)==="null"?"":d.value;var b={option:"com_fabrik",view:a,controller:"form",fabrik:this.id,rowid:c,format:"raw",task:"paginate",dir:1};[".previous-record",".next-record"].each(function(e,f){b.dir=f;if(this.form.getElement(e)){var g=new Request({url:"index.php",method:this.options.ajaxmethod,data:b,onComplete:function(h){Fabrik.loader.stop(this.getBlock());h=JSON.decode(h);this.update(h);this.form.getElement("input[name=rowid]").value=h.post.rowid}.bind(this)});this.form.getElement(e).addEvent("click",function(h){g.options.data.rowid=this.form.getElement("input[name=rowid]").value;h.stop();Fabrik.loader.start(this.getBlock(),Joomla.JText._("COM_FABRIK_LOADING"));g.send()}.bind(this))}}.bind(this));this.watchGoBackButton()}},watchGoBackButton:function(){if(this.options.ajax){var a=this.getForm().getElement("input[name=Goback]");if(typeOf(a)==="null"){return}a.addEvent("click",function(b){b.stop();if(Fabrik.Windows[this.options.fabrik_window_id]){Fabrik.Windows[this.options.fabrik_window_id].close()}else{window.history.back()}}.bind(this))}},watchAddOptions:function(){this.fx.addOptions=[];this.getForm().getElements(".addoption").each(function(e){var b=e.getParent(".fabrikElementContainer").getElement(".toggle-addoption");var c=new Fx.Slide(e,{duration:500});c.hide();b.addEvent("click",function(a){a.stop();c.toggle()})})},setUp:function(){this.form=this.getForm();this.watchGroupButtons();this.watchSubmit();this.createPages();this.watchClearSession()},getForm:function(){this.form=document.id(this.getBlock());return this.form},getBlock:function(){var a=this.options.editable===true?"form_"+this.id:"details_"+this.id;if(this.options.rowid!==""){a+="_"+this.options.rowid}return a},addElementFX:function(h,g){var f,b,e;h=h.replace("fabrik_trigger_","");if(h.slice(0,6)==="group_"){h=h.slice(6,h.length);b=h;f=document.id(h)}else{h=h.slice(8,h.length);b="element"+h;if(!document.id(h)){return false}f=document.id(h).getParent(".fabrikElementContainer")}if(f){var a=(f).get("tag");if(a==="li"||a==="td"){e=new Element("div",{style:"width:100%"}).adopt(f.getChildren());f.empty();e.inject(f)}else{e=f}var d={duration:800,transition:Fx.Transitions.Sine.easeInOut};this.fx.elements[b]={};this.fx.elements[b].css=new Fx.Morph(e,d);if(typeOf(e)!=="null"&&(g==="slide in"||g==="slide out"||g==="slide toggle")){this.fx.elements[b].slide=new Fx.Slide(e,d)}else{this.fx.elements[b].slide=null}return this.fx.elements[b]}return false},doElementFX:function(h,g,b){var a,f,c,e;if(b){if(b.options.inRepeatGroup){var d=h.split("_");d[d.length-1]=b.options.repeatCounter;h=d.join("_")}}h=h.replace("fabrik_trigger_","");if(h.slice(0,6)==="group_"){h=h.slice(6,h.length);if(h.slice(0,6)==="group_"){h=h.slice(6,h.length)}a=h;f=true}else{f=false;h=h.slice(8,h.length);a="element"+h}c=this.fx.elements[a];if(!c){c=this.addElementFX("element_"+h,g);if(!c){return}}if(f){e=c.css.element}else{e=c.css.element.getParent(".fabrikElementContainer");if(typeOf(e)==="null"){e=c.css.element}}if(e.get("tag")==="td"){e=e.getChildren()[0]}switch(g){case"show":e.fade("show").removeClass("fabrikHide");if(f){document.id(h).getElements(".fabrikinput").setStyle("opacity","1")}break;case"hide":e.fade("hide").addClass("fabrikHide");break;case"fadein":e.removeClass("fabrikHide");if(c.css.lastMethod!=="fadein"){c.css.element.show();c.css.start({opacity:[0,1]})}break;case"fadeout":if(c.css.lastMethod!=="fadeout"){c.css.start({opacity:[1,0]}).chain(function(){c.css.element.hide();e.addClass("fabrikHide")})}break;case"slide in":c.slide.slideIn();break;case"slide out":c.slide.slideOut();e.removeClass("fabrikHide");break;case"slide toggle":c.slide.toggle();break;case"clear":this.formElements.get(h).clear();break}c.lastMethod=g;Fabrik.fireEvent("fabrik.form.doelementfx",[this])},watchClearSession:function(){if(this.form&&this.form.getElement(".clearSession")){this.form.getElement(".clearSession").addEvent("click",function(a){a.stop();this.form.getElement("input[name=task]").value="removeSession";this.clearForm();this.form.submit()}.bind(this))}},createPages:function(){var b,c,a;if(this.options.pages.getKeys().length>1){this.options.pages.each(function(e,d){c=new Element("div",{"class":"page",id:"page_"+d});a=document.id("group"+e[0]);if(typeOf(a)!=="null"){c.inject(a,"before");e.each(function(f){c.adopt(document.id("group"+f))})}});b=this._getButton("submit");if(b&&this.options.rowid===""){b.disabled="disabled";b.setStyle("opacity",0.5)}this.form.getElement(".fabrikPagePrevious").disabled="disabled";this.form.getElement(".fabrikPageNext").addEvent("click",function(d){this._doPageNav(d,1)}.bind(this));this.form.getElement(".fabrikPagePrevious").addEvent("click",function(d){this._doPageNav(d,-1)}.bind(this));this.setPageButtons();this.hideOtherPages()}},_doPageNav:function(g,b){if(this.options.editable){this.form.getElement(".fabrikMainError").addClass("fabrikHide");if(typeOf(document.getElement(".tool-tip"))!=="null"){document.getElement(".tool-tip").setStyle("top",0)}var a=Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&task=form.ajax_validate&form_id="+this.id;Fabrik.loader.start(this.getBlock(),Joomla.JText._("COM_FABRIK_VALIDATING"));var c=this.options.pages.get(this.currentPage.toInt());var h=$H(this.getFormData());h.set("task","form.ajax_validate");h.set("fabrik_ajax","1");h.set("format","raw");h=this._prepareRepeatsForAjax(h);var f=new Request({url:a,method:this.options.ajaxmethod,data:h,onComplete:function(d){Fabrik.loader.stop(this.getBlock());d=JSON.decode(d);if(b===-1||this._showGroupError(d,h)===false){this.changePage(b);this.saveGroupsToDb()}new Fx.Scroll(window).toElement(this.form)}.bind(this)}).send()}else{this.changePage(b)}g.stop()},saveGroupsToDb:function(){if(this.options.multipage_save===0){return}Fabrik.fireEvent("fabrik.form.groups.save.start",[this]);if(this.result===false){this.result=true;return}var d=this.form.getElement("input[name=format]").value;var c=this.form.getElement("input[name=task]").value;this.form.getElement("input[name=format]").value="raw";this.form.getElement("input[name=task]").value="form.savepage";var a=Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&page="+this.currentPage;Fabrik.loader.start(this.getBlock(),"saving page");var b=this.getFormData();b.fabrik_ajax=1;new Request({url:a,method:this.options.ajaxmethod,data:b,onComplete:function(e){Fabrik.fireEvent("fabrik.form.groups.save.completed",[this]);if(this.result===false){this.result=true;return}this.form.getElement("input[name=format]").value=d;this.form.getElement("input[name=task]").value=c;if(this.options.ajax){Fabrik.fireEvent("fabrik.form.groups.save.end",[this,e])}Fabrik.loader.stop(this.getBlock())}.bind(this)}).send()},changePage:function(a){this.changePageDir=a;Fabrik.fireEvent("fabrik.form.page.change",[this]);if(this.result===false){this.result=true;return}this.currentPage=this.currentPage.toInt();if(this.currentPage+a>=0&&this.currentPage+a<this.options.pages.getKeys().length){this.currentPage=this.currentPage+a;if(!this.pageGroupsVisible()){this.changePage(a)}}this.setPageButtons();document.id("page_"+this.currentPage).setStyle("display","");this._setMozBoxWidths();this.hideOtherPages();Fabrik.fireEvent("fabrik.form.page.chage.end",[this]);Fabrik.fireEvent("fabrik.form.page.change.end",[this]);if(this.result===false){this.result=true;return}},pageGroupsVisible:function(){var a=false;this.options.pages.get(this.currentPage).each(function(b){var c=document.id("group"+b);if(typeOf(c)!=="null"){if(c.getStyle("display")!=="none"){a=true}}});return a},hideOtherPages:function(){var a;this.options.pages.each(function(c,b){if(b.toInt()!==this.currentPage.toInt()){a=document.id("page_"+b);if(typeOf(a)!=="null"){a.hide()}}}.bind(this))},setPageButtons:function(){var c=this._getButton("submit");var b=this.form.getElement(".fabrikPagePrevious");var a=this.form.getElement(".fabrikPageNext");if(this.currentPage===this.options.pages.getKeys().length-1){if(typeOf(c)!=="null"){c.disabled="";c.setStyle("opacity",1)}a.disabled="disabled";a.setStyle("opacity",0.5)}else{if(typeOf(c)!=="null"&&(this.options.rowid===""||this.options.rowid.toString()==="0")){c.disabled="disabled";c.setStyle("opacity",0.5)}a.disabled="";a.setStyle("opacity",1)}if(this.currentPage===0){b.disabled="disabled";b.setStyle("opacity",0.5)}else{b.disabled="";b.setStyle("opacity",1)}},destroyElements:function(){this.formElements.each(function(a){a.destroy()})},addElements:function(b){var d=[],c=0;b=$H(b);b.each(function(f,a){f.each(function(h){if(typeOf(h)==="array"){var g=new window[h[0]](h[1],h[2]);d.push(this.addElement(g,h[1],a))}else{if(typeOf(h)!=="null"){d.push(this.addElement(h,h.options.element,a))}}}.bind(this))}.bind(this));for(c=0;c<d.length;c++){if(typeOf(d[c])!=="null"){try{d[c].attachedToForm()}catch(e){fconsole(d[c].options.element+" attach to form:"+e)}}}Fabrik.fireEvent("fabrik.form.elements.added",[this])},addElement:function(b,a,c){a=b.getFormElementsKey(a);a=a.replace("[]","");var d=a.substring(a.length-3,a.length)==="_ro";b.form=this;b.groupid=c;this.formElements.set(a,b);Fabrik.fireEvent("fabrik.form.element.added",[this,a,b]);if(d){a=a.substr(0,a.length-3);this.formElements.set(a,b)}return b},dispatchEvent:function(b,a,d,e){if(!this.options.delayedEvents){var c=this.formElements.get(a);if(c&&e!==""){c.addNewEvent(d,e)}}else{this.bufferEvent(b,a,d,e)}},bufferEvent:function(b,a,c,d){this.bufferedEvents.push([b,a,c,d])},processBufferEvents:function(){this.setUp();this.options.delayedEvents=false;this.bufferedEvents.each(function(c){var a=c[1];var b=this.formElements.get(a);b.element=document.id(a);this.dispatchEvent(c[0],a,c[2],c[3])}.bind(this))},action:function(a,c){var b=this.formElements.get(c);Browser.exec("oEl."+a+"()")},triggerEvents:function(a){this.formElements.get(a).fireEvents(arguments[1])},watchValidation:function(c,b){if(this.options.ajaxValidation===false){return}var a=document.id(c);if(typeOf(a)==="null"){fconsole("watch validation failed, could not find element "+c);return}if(a.className==="fabrikSubElementContainer"){a.getElements(".fabrikinput").each(function(d){d.addEvent(b,function(f){this.doElementValidation(f,true)}.bind(this))}.bind(this));return}a.addEvent(b,function(d){this.doElementValidation(d,false)}.bind(this))},doElementValidation:function(j,b,h){var f;if(this.options.ajaxValidation===false){return}h=typeOf(h)==="null"?"_time":h;if(typeOf(j)==="event"||typeOf(j)==="object"||typeOf(j)==="domevent"){f=j.target.id;if(b===true){f=document.id(j.target).getParent(".fabrikSubElementContainer").id}}else{f=j}if(typeOf(document.id(f))==="null"){return}if(document.id(f).getProperty("readonly")===true||document.id(f).getProperty("readonly")==="readonly"){}var g=this.formElements.get(f);if(!g){f=f.replace(h,"");g=this.formElements.get(f);if(!g){return}}Fabrik.fireEvent("fabrik.form.element.validaton.start",[this,g,j]);if(this.result===false){this.result=true;return}g.setErrorMessage(Joomla.JText._("COM_FABRIK_VALIDATING"),"fabrikValidating");var k=$H(this.getFormData());k.set("task","form.ajax_validate");k.set("fabrik_ajax","1");k.set("format","raw");k=this._prepareRepeatsForAjax(k);var i=f;if(g.origId){i=g.origId+"_0"}g.options.repeatCounter=g.options.repeatCounter?g.options.repeatCounter:0;var c=Fabrik.liveSite+"index.php?option=com_fabrik&form_id="+this.id;var a=new Request({url:c,method:this.options.ajaxmethod,data:k,onComplete:function(d){this._completeValidaton(d,f,i)}.bind(this)}).send()},_completeValidaton:function(c,d,a){c=JSON.decode(c);if(typeOf(c)==="null"){this._showElementError(["Oups"],d);this.result=true;return}this.formElements.each(function(f,e){f.afterAjaxValidation()});Fabrik.fireEvent("fabrik.form.elemnet.validation.complete",[this,c,d,a]);if(this.result===false){this.result=true;return}var b=this.formElements.get(d);if((typeOf(c.modified[a])!=="null")){b.update(c.modified[a])}if(typeOf(c.errors[a])!=="null"){this._showElementError(c.errors[a][b.options.repeatCounter],d)}else{this._showElementError([],d)}},_prepareRepeatsForAjax:function(a){this.getForm();if(typeOf(a)==="hash"){a=a.getClean()}this.form.getElements("input[name^=fabrik_repeat_group]").each(function(b){if(b.id.test(/fabrik_repeat_group_\d+_counter/)){var d=b.name.match(/\[(.*)\]/)[1];a["fabrik_repeat_group["+d+"]"]=b.get("value")}});return a},_showGroupError:function(e,f){var a;var b=Array.from(this.options.pages.get(this.currentPage.toInt()));var c=false;$H(f).each(function(g,d){d=d.replace(/\[(.*)\]/,"").replace(/%5B(.*)%5D/,"");if(this.formElements.has(d)){var h=this.formElements.get(d);if(b.contains(h.groupid.toInt())){if(e.errors[d]){var i="";if(typeOf(e.errors[d])!=="null"){i=e.errors[d].flatten().join("<br />")}if(i!==""){a=this._showElementError(e.errors[d],d);if(c===false){c=a}}else{h.setErrorMessage("","")}}if(e.modified[d]){if(h){h.update(e.modified[d])}}}}}.bind(this));return c},_showElementError:function(a,d){var c="";if(typeOf(a)!=="null"){c=a.flatten().join("<br />")}var b=(c==="")?"fabrikSuccess":"fabrikError";if(c===""){c=Joomla.JText._("COM_FABRIK_SUCCESS")}c="<span> "+c+"</span>";this.formElements.get(d).setErrorMessage(c,b);return(b==="fabrikSuccess")?false:true},updateMainError:function(){var c,b;var a=this.form.getElement(".fabrikMainError");a.set("html",this.options.error);b=this.form.getElements(".fabrikError").filter(function(f,d){return !f.hasClass("fabrikMainError")});if(b.length>0&&a.hasClass("fabrikHide")){this.showMainError(this.options.error)}if(b.length===0){this.hideMainError()}},hideMainError:function(){var a=this.form.getElement(".fabrikMainError");myfx=new Fx.Tween(a,{property:"opacity",duration:500,onComplete:function(){a.addClass("fabrikHide")}}).start(1,0)},showMainError:function(b){if(Fabrik.bootstrapped&&this.options.ajaxValidation){return}var a=this.form.getElement(".fabrikMainError");a.set("html",b);a.removeClass("fabrikHide");myfx=new Fx.Tween(a,{property:"opacity",duration:500}).start(0,1)},_getButton:function(c){if(!this.getForm()){return}var a=this.form.getElement("input[type=button][name="+c+"]");if(!a){a=this.form.getElement("input[type=submit][name="+c+"]")}if(!a){a=this.form.getElement("button[type=button][name="+c+"]")}if(!a){a=this.form.getElement("button[type=submit][name="+c+"]")}return a},watchSubmit:function(){var b=this._getButton("submit");if(!b){return}var a=this._getButton("apply");if(this.form.getElement("input[name=delete]")){this.form.getElement("input[name=delete]").addEvent("click",function(f){if(confirm(Joomla.JText._("COM_FABRIK_CONFIRM_DELETE_1"))){var d=Fabrik.fireEvent("fabrik.form.delete",[this,this.options.rowid]).eventResults;if(typeOf(d)==="null"||d.length===0||!d.contains(false)){this.form.getElement("input[name=task]").value=this.options.admin?"form.delete":"delete"}else{f.stop();return false}}else{return false}}.bind(this))}if(this.options.ajax){var c=this._getButton("Copy");([a,b,c]).each(function(d){if(typeOf(d)!=="null"){d.addEvent("click",function(f){this.doSubmit(f,d)}.bind(this))}}.bind(this))}else{this.form.addEvent("submit",function(d){this.doSubmit(d)}.bind(this))}},doSubmit:function(c,a){Fabrik.fireEvent("fabrik.form.submit.start",[this,c,a]);this.elementsBeforeSubmit(c);if(this.result===false){this.result=true;c.stop();this.updateMainError();return}if(this.options.pages.getKeys().length>1){this.form.adopt(new Element("input",{name:"currentPage",value:this.currentPage.toInt(),type:"hidden"}))}if(this.options.ajax){if(this.form){Fabrik.loader.start(this.getBlock(),Joomla.JText._("COM_FABRIK_LOADING"));var b=$H(this.getFormData());b=this._prepareRepeatsForAjax(b);if(a.name==="Copy"){b.Copy=1;c.stop()}b.fabrik_ajax="1";b.format="raw";var d=new Request.JSON({url:this.form.action,data:b,method:this.options.ajaxmethod,onError:function(f,e){fconsole(f+": "+e);this.showMainError(e);Fabrik.loader.stop(this.getBlock(),"Error in returned JSON")}.bind(this),onFailure:function(e){fconsole(e);Fabrik.loader.stop(this.getBlock(),"Ajax failure")}.bind(this),onComplete:function(n,g){if(typeOf(n)==="null"){Fabrik.loader.stop(this.getBlock(),"Error in returned JSON");fconsole("error in returned json",n,g);return}var i=false;if(n.errors!==undefined){$H(n.errors).each(function(q,o){if(this.formElements.has(o)&&q.flatten().length>0){i=true;if(this.formElements[o].options.inRepeatGroup){for(c=0;c<q.length;c++){if(q[c].flatten().length>0){var p=o.replace(/(_\d+)$/,"_"+c);this._showElementError(q[c],p)}}}else{this._showElementError(q,o)}}}.bind(this))}this.updateMainError();if(i===false){var k=false;if(this.options.rowid===""&&a.name!=="apply"){k=true}Fabrik.loader.stop(this.getBlock());var j=(typeOf(n.msg)!=="null"&&n.msg!==undefined&&n.msg!=="")?n.msg:Joomla.JText._("COM_FABRIK_FORM_SAVED");if(n.baseRedirect!==true){k=n.reset_form;if(n.url!==undefined){if(n.redirect_how==="popup"){var f=n.width?n.width:400;var m=n.height?n.height:400;var h=n.x_offset?n.x_offset:0;var e=n.y_offset?n.y_offset:0;var l=n.title?n.title:"";Fabrik.getWindow({id:"redirect",type:"redirect",contentURL:n.url,caller:this.getBlock(),height:m,width:f,offset_x:h,offset_y:e,title:l})}else{if(n.redirect_how==="samepage"){window.open(n.url,"_self")}else{if(n.redirect_how==="newpage"){window.open(n.url,"_blank")}}}}else{alert(j)}}else{k=n.reset_form!==undefined?n.reset_form:k;alert(j)}Fabrik.fireEvent("fabrik.form.submitted",[this,n]);if(a.name!=="apply"){if(k){this.clearForm()}if(Fabrik.Windows[this.options.fabrik_window_id]){Fabrik.Windows[this.options.fabrik_window_id].close()}}}else{Fabrik.fireEvent("fabrik.form.submit.failed",[this,n]);Fabrik.loader.stop(this.getBlock(),Joomla.JText._("COM_FABRIK_VALIDATION_ERROR"))}}.bind(this)}).send()}}Fabrik.fireEvent("fabrik.form.submit.end",[this]);if(this.result===false){this.result=true;c.stop();this.updateMainError()}else{if(this.options.ajax){Fabrik.fireEvent("fabrik.form.ajax.submit.end",[this])}}},elementsBeforeSubmit:function(a){this.formElements.each(function(c,b){if(!c.onsubmit()){a.stop()}})},getFormData:function(d){d=typeOf(d)!=="null"?d:true;if(d){this.formElements.each(function(g,f){g.onsubmit()})}this.getForm();var c=this.form.toQueryString();var b={};c=c.split("&");var e=$H({});c.each(function(g){g=g.split("=");var f=g[0];f=decodeURI(f);if(f.substring(f.length-2)==="[]"){f=f.substring(0,f.length-2);if(!e.has(f)){e.set(f,0)}else{e.set(f,e.get(f)+1)}f=f+"["+e.get(f)+"]"}b[f]=g[1]});var a=this.formElements.getKeys();this.formElements.each(function(g,f){if(g.plugin==="fabrikfileupload"){b[f]=g.get("value")}if(typeOf(b[f])==="null"){var h=false;$H(b).each(function(j,i){i=unescape(i);i=i.replace(/\[(.*)\]/,"");if(i===f){h=true}}.bind(this));if(!h){b[f]=""}}}.bind(this));return b},getFormElementData:function(){var a={};this.formElements.each(function(c,b){if(c.element){a[b]=c.getValue();a[b+"_raw"]=a[b]}}.bind(this));return a},watchGroupButtons:function(){this.form.addEvent("click:relay(.deleteGroup)",function(b,a){b.preventDefault();this.deleteGroup(b)}.bind(this));this.form.addEvent("click:relay(.addGroup)",function(b,a){b.preventDefault();this.duplicateGroup(b)}.bind(this));this.form.addEvent("click:relay(.fabrikSubGroup)",function(c,b){var a=b.getElement(".fabrikGroupRepeater");if(a){b.addEvent("mouseenter",function(d){a.fade(1)});b.addEvent("mouseleave",function(d){a.fade(0.2)})}}.bind(this))},duplicateGroupsToMin:function(){if(this.options.rowid.toInt()===0){Fabrik.fireEvent("fabrik.form.group.duplicate.min",[this]);Object.each(this.options.minRepeat,function(d,c){var b=this.form.getElement("#group"+c+" .addGroup");if(typeOf(b)!=="null"){var f=new Event.Mock(b,"click");for(var a=0;a<d-1;a++){this.duplicateGroup(f)}}}.bind(this))}},deleteGroup:function(k){Fabrik.fireEvent("fabrik.form.group.delete",[this,k]);if(this.result===false){this.result=true;return}k.stop();var n=k.target.getParent(".fabrikGroup");var f=0;n.getElements(".deleteGroup").each(function(i,e){if(i.getElement("img")===k.target||i.getElement("i")===k.target){f=e}}.bind(this));var h=n.id.replace("group","");var j=document.id("fabrik_repeat_group_"+h+"_counter").get("value").toInt();if(j<=this.options.minRepeat[h]&&this.options.minRepeat[h]!==0){return}delete this.duplicatedGroups.i;if(document.id("fabrik_repeat_group_"+h+"_counter").value==="0"){return}var b=n.getElements(".fabrikSubGroup");var l=k.target.getParent(".fabrikSubGroup");this.subGroups.set(h,l.clone());if(b.length<=1){this.hideLastGroup(h,l);Fabrik.fireEvent("fabrik.form.group.delete.end",[this,k,h,f])}else{var a=l.getPrevious();var c=new Fx.Tween(l,{property:"opacity",duration:300,onComplete:function(){if(b.length>1){l.dispose()}this.formElements.each(function(o,i){if(typeOf(o.element)!=="null"){if(typeOf(document.id(o.element.id))==="null"){o.decloned(h);delete this.formElements.k}}}.bind(this));b=n.getElements(".fabrikSubGroup");var e={};this.formElements.each(function(o,i){if(o.groupid===h){e[i]=o.decreaseName(f)}}.bind(this));$H(e).each(function(o,i){if(i!==o){this.formElements[o]=this.formElements[i];delete this.formElements[i]}}.bind(this));Fabrik.fireEvent("fabrik.form.group.delete.end",[this,k,h,f])}.bind(this)}).start(1,0);if(a){var m=document.id(window).getScroll().y;var g=a.getCoordinates();if(g.top<m){var d=g.top;this.winScroller.start(0,d)}}}document.id("fabrik_repeat_group_"+h+"_counter").value=document.id("fabrik_repeat_group_"+h+"_counter").get("value").toInt()-1;this.repeatGroupMarkers.set(h,this.repeatGroupMarkers.get(h)-1)},hideLastGroup:function(a,f){var d=f.getElement(".fabrikSubGroupElements");var c=new Element("div",{"class":"fabrikNotice alert"}).appendText(Joomla.JText._("COM_FABRIK_NO_REPEAT_GROUP_DATA"));if(typeOf(d)==="null"){d=f;var e=d.getElement(".addGroup");var b=d.getParent("table").getElements("thead th").getLast();if(typeOf(e)!=="null"){e.inject(b)}}d.setStyle("display","none");c.inject(d,"after")},isFirstRepeatSubGroup:function(b){var a=b.getElements(".fabrikSubGroup");return a.length===1&&b.getElement(".fabrikNotice")},getSubGroupToClone:function(b){var d=document.id("group"+b);var a=d.getElement(".fabrikSubGroup");if(!a){a=this.subGroups.get(b)}var e=null;var c=false;if(this.duplicatedGroups.has(b)){c=true}if(!c){e=a.cloneNode(true);this.duplicatedGroups.set(b,e)}else{if(!a){e=this.duplicatedGroups.get(b)}else{e=a.cloneNode(true)}}return e},repeatGetChecked:function(b){var a=[];b.getElements(".fabrikinput").each(function(c){if(c.type==="radio"&&c.getProperty("checked")){a.push(c)}});return a},duplicateGroup:function(w){var q,m;Fabrik.fireEvent("fabrik.form.group.duplicate",[this,w]);if(this.result===false){this.result=true;return}if(w){w.stop()}var t=w.target.getParent(".fabrikGroup").id.replace("group","");var s=t.toInt();var h=document.id("group"+t);var y=this.repeatGroupMarkers.get(t);var f=document.id("fabrik_repeat_group_"+t+"_counter").get("value").toInt();if(f>=this.options.maxRepeat[t]&&this.options.maxRepeat[t]!==0){return}document.id("fabrik_repeat_group_"+t+"_counter").value=f+1;if(this.isFirstRepeatSubGroup(h)){var u=h.getElements(".fabrikSubGroup");var g=u[0].getElement(".fabrikSubGroupElements");if(typeOf(g)==="null"){h.getElement(".fabrikNotice").dispose();g=u[0];var n=h.getElement(".addGroup");n.inject(g.getElement("td.fabrikGroupRepeater"));g.setStyle("display","")}else{u[0].getElement(".fabrikNotice").dispose();u[0].getElement(".fabrikSubGroupElements").show()}this.repeatGroupMarkers.set(t,this.repeatGroupMarkers.get(t)+1);return}var x=this.getSubGroupToClone(t);var A=this.repeatGetChecked(h);if(h.getElement("table.repeatGroupTable")){h.getElement("table.repeatGroupTable").appendChild(x)}else{h.appendChild(x)}A.each(function(c){c.setProperty("checked",true)});var l=[];this.subelementCounter=0;var d=false;var b=x.getElements(".fabrikinput");var r=null;this.formElements.each(function(i){var B=false;q=null;var e=-1;b.each(function(G){d=i.hasSubElements();m=G.getParent(".fabrikSubElementContainer");var F=(d&&m)?m.id:G.id;var I=i.getCloneName();if(F.contains(I)){r=G;B=true;if(d){e++;q=G.getParent(".fabrikSubElementContainer");if(document.id(F).getElement("input")){G.cloneEvents(document.id(F).getElement("input"))}}else{G.cloneEvents(i.element);var H=Array.from(i.element.id.split("_"));H.splice(H.length-1,1,y);G.id=H.join("_");var E=G.getParent(".fabrikElementContainer").getElement("label");if(E){E.setProperty("for",G.id)}}if(typeOf(G.name)!=="null"){G.name=G.name.replace("[0]","["+y+"]")}}}.bind(this));if(B){if(d&&typeOf(q)!=="null"){var o=Array.from(i.options.element.split("_"));o.splice(o.length-1,1,y);q.id=o.join("_")}var c=i.options.element;var D=i.unclonableProperties();var C=new CloneObject(i,true,D);C.container=null;C.options.repeatCounter=y;C.origId=c;if(d&&typeOf(q)!=="null"){C.element=document.id(q);C.cloneUpdateIds(q.id);C.options.element=q.id;C._getSubElements()}else{C.cloneUpdateIds(r.id)}l.push(C)}}.bind(this));l.each(function(e){e.cloned(y);var c=new RegExp(this.options.group_pk_ids[s]);if(!this.options.group_copy_element_values[s]||(this.options.group_copy_element_values[s]&&e.element.name&&e.element.name.test(c))){e.reset()}else{e.resetEvents()}}.bind(this));var p={};p[t]=l;this.addElements(p);var v=window.getHeight();var a=document.id(window).getScroll().y;var k=x.getCoordinates();if(k.bottom>(a+v)){var z=k.bottom-v;this.winScroller.start(0,z)}var j=new Fx.Tween(x,{property:"opacity",duration:500}).set(0);x.fade(1);Fabrik.fireEvent("fabrik.form.group.duplicate.end",[this,w,t,y]);this.repeatGroupMarkers.set(t,this.repeatGroupMarkers.get(t)+1)},update:function(d){Fabrik.fireEvent("fabrik.form.update",[this,d.data]);if(this.result===false){this.result=true;return}var a=arguments[1]||false;var b=d.data;this.getForm();if(this.form){var c=this.form.getElement("input[name=rowid]");if(c&&b.rowid){c.value=b.rowid}}this.formElements.each(function(f,e){if(typeOf(b[e])==="null"){if(e.substring(e.length-3,e.length)==="_ro"){e=e.substring(0,e.length-3)}}if(typeOf(b[e])==="null"){if(d.id===this.id&&!a){f.update("")}}else{f.update(b[e])}}.bind(this))},reset:function(){this.addedGroups.each(function(a){var c=document.id(a).findClassUp("fabrikGroup");var b=c.id.replace("group","");document.id("fabrik_repeat_group_"+b+"_counter").value=document.id("fabrik_repeat_group_"+b+"_counter").get("value").toInt()-1;a.remove()});this.addedGroups=[];Fabrik.fireEvent("fabrik.form.reset",[this]);if(this.result===false){this.result=true;return}this.formElements.each(function(b,a){b.reset()}.bind(this))},showErrors:function(a){var b=null;if(a.id===this.id){var c=new Hash(a.errors);if(c.getKeys().length>0){if(typeOf(this.form.getElement(".fabrikMainError"))!=="null"){this.form.getElement(".fabrikMainError").set("html",this.options.error);this.form.getElement(".fabrikMainError").removeClass("fabrikHide")}c.each(function(f,g){if(typeOf(document.id(g+"_error"))!=="null"){var h=document.id(g+"_error");var i=new Element("span");for(var d=0;d<f.length;d++){for(var j=0;j<f[d].length;j++){b=new Element("div").appendText(f[d][j]).inject(h)}}}else{fconsole(g+"_error not found (form show errors)")}})}}},appendInfo:function(a){this.formElements.each(function(c,b){if(c.appendInfo){c.appendInfo(a,b)}}.bind(this))},clearForm:function(){this.getForm();if(!this.form){return}this.formElements.each(function(b,a){if(a===this.options.primaryKey){this.form.getElement("input[name=rowid]").value=""}b.update("")}.bind(this));this.form.getElements(".fabrikError").empty();this.form.getElements(".fabrikError").addClass("fabrikHide")},stopEnterSubmitting:function(){var a=this.form.getElements("input.fabrikinput");a.each(function(c,b){c.addEvent("keypress",function(d){if(d.key==="enter"){d.stop();if(a[b+1]){a[b+1].focus()}if(b===a.length-1){this._getButton("submit").focus()}}}.bind(this))}.bind(this))},getSubGroupCounter:function(a){}});
