var FbElement=new Class({Implements:[Events,Options],options:{element:null,defaultVal:"",value:"",editable:false,isJoin:false,joinId:0},initialize:function(b,a){this.plugin="";a.element=b;this.strElement=b;this.loadEvents=[];this.changeEvents=[];this.setOptions(a);this.setElement()},setElement:function(){if(document.id(this.options.element)){this.element=document.id(this.options.element);this.setorigId()}},get:function(a){if(a==="value"){return this.getValue()}},attachedToForm:function(){this.setElement();this.alertImage=new Asset.image(this.form.options.images.alert);this.alertImage.setStyle("cursor","pointer");this.successImage=new Asset.image(this.form.options.images.action_check);this.loadingImage=new Asset.image(this.form.options.images.ajax_loader)},fireEvents:function(a){if(this.hasSubElements()){this._getSubElements().each(function(b){$A(a).each(function(c){b.fireEvent(c)}.bind(this))}.bind(this))}else{$A(a).each(function(b){this.element.fireEvent(b)}.bind(this))}},getElement:function(){if(typeOf(this.element)==="null"){this.element=document.id(this.options.element)}return this.element},_getSubElements:function(){var a=this.getElement();if(typeOf(a)==="null"){return false}this.subElements=a.getElements(".fabrikinput");return this.subElements},hasSubElements:function(){this._getSubElements();if(typeOf(this.subElements)==="array"||typeOf(this.subElements)==="elements"){return this.subElements.length>0?true:false}return false},unclonableProperties:function(){return["form"]},runLoadEvent:function(js,delay){delay=delay?delay:0;if(typeOf(js)==="function"){js.delay(delay)}else{if(delay===0){eval(js)}else{(function(){eval(js)}.bind(this)).delay(delay)}}},renewChangeEvents:function(){this.element.removeEvents("change");this.changeEvents.each(function(a){this.addNewEventAux("change",a)}.bind(this))},addNewEventAux:function(action,js){this.element.addEvent(action,function(e){e.stop();typeOf(js)==="function"?js.delay(0):eval(js)})},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b)}else{if(!this.element){this.element=$(this.strElement)}if(this.element){if(a==="change"){this.changeEvents.push(b)}this.addNewEventAux(a,b)}}},validate:function(){},addNewOption:function(h,c){var b;var g=$(this.options.element+"_additions").value;var e={val:h,label:c};if(g!==""){b=JSON.decode(g)}else{b=[]}b.push(e);var f="[";for(var d=0;d<b.length;d++){f+=JSON.encode(b[d])+","}f=f.substring(0,f.length-1)+"]";$(this.options.element+"_additions").value=f},update:function(a){if(this.element){if(this.options.editable){this.element.value=a}else{this.element.innerHTML=a}}},getValue:function(){if(this.element){if(this.options.editable){return this.element.value}else{return this.options.value}}return false},reset:function(){this.loadEvents.each(function(a){this.runLoadEvent(a,100)}.bind(this));if(this.options.editable===true){this.update(this.options.defaultVal)}},clear:function(){this.update("")},onsubmit:function(){return true},afterAjaxValidation:function(){},cloned:function(a){this.renewChangeEvents()},decloned:function(a){},getContainer:function(){return typeOf(this.element)==="null"?false:this.element.getParent(".fabrikElementContainer")},getErrorElement:function(){return this.getContainer().getElement(".fabrikErrorMessage")},getValidationFx:function(){if(!this.validationFX){this.validationFX=new Fx.Morph(this.getErrorElement(),{duration:500,wait:true})}return this.validationFX},setErrorMessage:function(h,g){var c;var d=["fabrikValidating","fabrikError","fabrikSuccess"];var b=this.getContainer();d.each(function(i){var a=g===i?b.addClass(i):b.removeClass(i)});switch(g){case"fabrikError":c=new Element("a",{href:"#",title:h,events:{click:function(a){a.stop()}}}).adopt(this.alertImage);this.getErrorElement().empty().adopt(c);Fabrik.tips.attach(c);break;case"fabrikSuccess":this.getErrorElement().empty().adopt(this.successImage);break;case"fabrikValidating":this.getErrorElement().empty().adopt(this.loadingImage);break}this.getErrorElement().removeClass("fabrikHide");var e=this.form;if(g==="fabrikError"||g==="fabrikSuccess"){e.updateMainError()}var f=this.getValidationFx();switch(g){case"fabrikValidating":case"fabrikError":f.start({opacity:1});break;case"fabrikSuccess":f.start({opacity:1}).chain(function(){if(b.hasClass("fabrikSuccess")){b.removeClass("fabrikSuccess");this.start.delay(700,this,{opacity:0,onComplete:function(){e.updateMainError();d.each(function(a){b.removeClass(a)})}})}});break}},setorigId:function(){if(this.options.inRepeatGroup){var a=this.options.element;this.origId=a.substring(0,a.length-1-this.options.repeatCounter.toString().length)}},decreaseName:function(b){var a=this.getElement();if(typeOf(a)==="null"){return false}if(this.hasSubElements()){this._getSubElements().each(function(c){c.name=this._decreaseName(c.name,b);c.id=this._decreaseId(c.id,b)}.bind(this))}else{this.element.name=this._decreaseName(this.element.name,b)}this.element.id=this._decreaseId(this.element.id,b);return this.element.id},_decreaseId:function(e,d){var c=$A(e.split("_"));var a=c.getLast();if(a!==a.toInt()){return c.join("_")}if(a>=1&&a>d){a--}c.splice(c.length-1,1,a);var b=c.join("_");this.options.element=b;return b},_decreaseName:function(e,d){var a=e.split("][");var b=a[2].replace("]","").toInt();if(b>=1&&b>d){b--}if(a.length===3){b=b+"]"}a.splice(2,1,b);var c=a.join("][");return c},getRepeatNum:function(){if(this.options.inRepeatGroup===false){return false}return this.element.id.split("_").getLast()},getBlurEvent:function(){return this.element.get("tag")==="select"?"change":"blur"},select:function(){},focus:function(){}});var FbFileElement=new Class({Extends:FbElement,ajaxFolder:function(){this.folderlist=[];if(typeOf(this.element)==="null"){return}var a=this.element.getParent(".fabrikElement");this.breadcrumbs=a.getElement(".breadcrumbs");this.folderdiv=a.getElement(".folderselect");this.slider=new Fx.Slide(this.folderdiv,{duration:500});this.slider.hide();this.hiddenField=a.getElement(".folderpath");a.getElement(".toggle").addEvent("click",function(b){b.stop();this.slider.toggle()}.bind(this));this.watchAjaxFolderLinks()},watchAjaxFolderLinks:function(){this.folderdiv.getElements("a").addEvent("click",this.browseFolders.bindWithEvent(this));this.breadcrumbs.getElements("a").addEvent("click",this.useBreadcrumbs.bindWithEvent(this))},browseFolders:function(b){b.stop();this.folderlist.push(b.target.get("text"));var a=this.options.dir+this.folderlist.join(this.options.ds);this.addCrumb(b.target.get("text"));this.doAjaxBrowse(a)},useBreadcrumbs:function(f){f.stop();var d=false;var h=f.target.className;this.folderlist=[];var b=this.breadcrumbs.getElements("a").every(function(c){if(c.className===h){return false}this.folderlist.push(f.target.innerHTML);return true},this);var g=[this.breadcrumbs.getElements("a").shift().clone(),this.breadcrumbs.getElements("span").shift().clone()];this.breadcrumbs.empty();this.breadcrumbs.adopt(g);this.folderlist.each(function(c){this.addCrumb(c)},this);var a=this.options.dir+this.folderlist.join(this.options.ds);this.doAjaxBrowse(a)},doAjaxBrowse:function(a){var b={dir:a,option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_getFolders",element_id:this.options.id};new Request({url:"",data:b,onComplete:function(c){c=JSON.decode(c);this.folderdiv.empty();c.each(function(d){new Element("li",{"class":"fileupload_folder"}).adopt(new Element("a",{href:"#"}).set("text",d)).inject(this.folderdiv)}.bind(this));if(c.length===0){this.slider.hide()}else{this.slider.slideIn()}this.watchAjaxFolderLinks();this.hiddenField.value="/"+this.folderlist.join("/")+"/";this.fireEvent("onBrowse")}.bind(this)}).send()},addCrumb:function(a){this.breadcrumbs.adopt(new Element("a",{href:"#","class":"crumb"+this.folderlist.length}).set("text",a),new Element("span").set("text"," / "))}});