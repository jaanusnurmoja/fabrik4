var FbElement=new Class({Implements:[Events,Options],options:{element:null,defaultVal:"",value:"",label:"",editable:false,isJoin:false,joinId:0},initialize:function(b,a){this.plugin="";a.element=b;this.strElement=b;this.loadEvents=[];this.events=$H({});this.setOptions(a);return this.setElement()},destroy:function(){},setElement:function(){if(document.id(this.options.element)){this.element=document.id(this.options.element);this.setorigId();return true}return false},get:function(a){if(a==="value"){return this.getValue()}},getFormElementsKey:function(a){this.baseElementId=a;return a},attachedToForm:function(){this.setElement();if(Fabrik.bootstrapped){this.alertImage=new Element("i.icon-warning");this.successImage=new Element("i.icon-checkmark",{styles:{color:"green"}})}else{this.alertImage=new Asset.image(this.form.options.images.alert);this.alertImage.setStyle("cursor","pointer");this.successImage=new Asset.image(this.form.options.images.action_check)}this.loadingImage=new Asset.image(this.form.options.images.ajax_loader)},fireEvents:function(a){if(this.hasSubElements()){this._getSubElements().each(function(b){Array.from(a).each(function(c){b.fireEvent(c)}.bind(this))}.bind(this))}else{Array.from(a).each(function(b){if(this.element){this.element.fireEvent(b)}}.bind(this))}},getElement:function(){if(typeOf(this.element)==="null"){this.element=document.id(this.options.element)}return this.element},_getSubElements:function(){var a=this.getElement();if(typeOf(a)==="null"){return false}this.subElements=a.getElements(".fabrikinput");return this.subElements},hasSubElements:function(){this._getSubElements();if(typeOf(this.subElements)==="array"||typeOf(this.subElements)==="elements"){return this.subElements.length>0?true:false}return false},unclonableProperties:function(){return["form"]},cloneUpdateIds:function(a){this.element=document.id(a);this.options.element=a},runLoadEvent:function(js,delay){delay=delay?delay:0;if(typeOf(js)==="function"){js.delay(delay)}else{if(delay===0){eval(js)}else{(function(){eval(js)}.bind(this)).delay(delay)}}},removeCustomEvents:function(){},renewEvents:function(){this.events.each(function(a,b){this.element.removeEvents(b);a.each(function(c){this.addNewEventAux(b,c)}.bind(this))}.bind(this))},addNewEventAux:function(action,js){this.element.addEvent(action,function(e){typeOf(js)==="function"?js.delay(0,this,this):eval(js)}.bind(this))},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b)}else{if(!this.element){this.element=document.id(this.strElement)}if(this.element){if(!Object.keys(this.events).contains(a)){this.events[a]=[]}this.events[a].push(b);this.addNewEventAux(a,b)}}},addEvent:function(a,b){this.addNewEvent(a,b)},validate:function(){},addNewOption:function(h,c){var b;var g=document.id(this.options.element+"_additions").value;var e={val:h,label:c};if(g!==""){b=JSON.decode(g)}else{b=[]}b.push(e);var f="[";for(var d=0;d<b.length;d++){f+=JSON.encode(b[d])+","}f=f.substring(0,f.length-1)+"]";document.id(this.options.element+"_additions").value=f},getLabel:function(){return this.options.label},update:function(a){if(this.getElement()){if(this.options.editable){this.element.value=a}else{this.element.innerHTML=a}}},set:function(a){this.update(a)},getValue:function(){if(this.element){if(this.options.editable){return this.element.value}else{return this.options.value}}return false},reset:function(){this.resetEvents();if(this.options.editable===true){this.update(this.options.defaultVal)}},resetEvents:function(){this.loadEvents.each(function(a){this.runLoadEvent(a,100)}.bind(this))},clear:function(){this.update("")},onsubmit:function(){return true},afterAjaxValidation:function(){},cloned:function(a){this.renewEvents()},decloned:function(a){},getContainer:function(){return typeOf(this.element)==="null"?false:this.element.getParent(".fabrikElementContainer")},getErrorElement:function(){return this.getContainer().getElements(".fabrikErrorMessage")},getValidationFx:function(){if(!this.validationFX){this.validationFX=new Fx.Morph(this.getErrorElement()[0],{duration:500,wait:true})}return this.validationFX},setErrorMessage:function(c,f){var k,d;var g=["fabrikValidating","fabrikError","fabrikSuccess"];var b=this.getContainer();if(b===false){console.log("Notice: couldn not set error msg for "+c+" no container class found");return}g.each(function(m){var a=f===m?b.addClass(m):b.removeClass(m)});var j=this.getErrorElement();j.each(function(a){a.empty()});switch(f){case"fabrikError":if(Fabrik.bootstrapped){d=new Element("div").set("html",c).getChildren()[0];k=new Element("div").adopt([this.alertImage,d])}else{k=new Element("a",{href:"#",title:c,events:{click:function(a){a.stop()}}}).adopt(this.alertImage);Fabrik.tips.attach(k)}j[0].adopt(k);if(j.length>1){for(i=1;i<j.length;i++){j[i].set("html",c)}}b.removeClass("alert-success").removeClass("alert-info").addClass("alert-error");break;case"fabrikSuccess":b.addClass("alert-success").removeClass("alert-info").removeClass("alert-error");j[0].adopt(this.successImage);var h=function(){j[0].addClass("fabrikHide");b.removeClass("alert-success")};h.delay(700);break;case"fabrikValidating":b.removeClass("alert-success").addClass("alert-info").removeClass("alert-error");j[0].adopt(this.loadingImage);break}this.getErrorElement().removeClass("fabrikHide");var l=this.form;if(f==="fabrikError"||f==="fabrikSuccess"){l.updateMainError()}var e=this.getValidationFx();switch(f){case"fabrikValidating":case"fabrikError":e.start({opacity:1});break;case"fabrikSuccess":e.start({opacity:1}).chain(function(){if(b.hasClass("fabrikSuccess")){b.removeClass("fabrikSuccess");this.start.delay(700,this,{opacity:0,onComplete:function(){b.addClass("success").removeClass("error");l.updateMainError();g.each(function(a){b.removeClass(a)})}})}});break}},setorigId:function(){if(this.options.inRepeatGroup){var a=this.options.element;this.origId=a.substring(0,a.length-1-this.options.repeatCounter.toString().length)}},decreaseName:function(b){var a=this.getElement();if(typeOf(a)==="null"){return false}if(this.hasSubElements()){this._getSubElements().each(function(c){c.name=this._decreaseName(c.name,b);c.id=this._decreaseId(c.id,b)}.bind(this))}else{if(typeOf(this.element.name)!=="null"){this.element.name=this._decreaseName(this.element.name,b)}}if(typeOf(this.element.id)!=="null"){this.element.id=this._decreaseId(this.element.id,b)}return this.element.id},_decreaseId:function(g,f,e){var a=false;e=e?e:false;if(e!==false){if(g.contains(e)){g=g.replace(e,"");a=true}}var d=Array.from(g.split("_"));var b=d.getLast();if(typeOf(b.toInt())==="null"){return d.join("_")}if(b>=1&&b>f){b--}d.splice(d.length-1,1,b);var c=d.join("_");if(a){c+=e}this.options.element=c;return c},_decreaseName:function(f,e,d){suffixFound=false;d=d?d:false;if(d!==false){if(f.contains(d)){f=f.replace(d,"");suffixFound=true}}var a=f.split("][");var b=a[2].replace("]","").toInt();if(b>=1&&b>e){b--}if(a.length===3){b=b+"]"}a.splice(2,1,b);var c=a.join("][");if(suffixFound){c+=d}return c},getRepeatNum:function(){if(this.options.inRepeatGroup===false){return false}return this.element.id.split("_").getLast()},getBlurEvent:function(){return this.element.get("tag")==="select"?"change":"blur"},select:function(){},focus:function(){},hide:function(){var a=this.getContainer();if(a){a.hide()}},show:function(){var a=this.getContainer();if(a){a.show()}},toggle:function(){var a=this.getContainer();if(a){a.toggle()}},getCloneName:function(){return this.options.element}});var FbFileElement=new Class({Extends:FbElement,ajaxFolder:function(){this.folderlist=[];if(typeOf(this.element)==="null"){return}var a=this.element.getParent(".fabrikElement");this.breadcrumbs=a.getElement(".breadcrumbs");this.folderdiv=a.getElement(".folderselect");this.slider=new Fx.Slide(this.folderdiv,{duration:500});this.slider.hide();this.hiddenField=a.getElement(".folderpath");a.getElement(".toggle").addEvent("click",function(b){b.stop();this.slider.toggle()}.bind(this));this.watchAjaxFolderLinks()},watchAjaxFolderLinks:function(){this.folderdiv.getElements("a").addEvent("click",function(a){this.browseFolders(a)}.bind(this));this.breadcrumbs.getElements("a").addEvent("click",function(a){this.useBreadcrumbs(a)}.bind(this))},browseFolders:function(b){b.stop();this.folderlist.push(b.target.get("text"));var a=this.options.dir+this.folderlist.join(this.options.ds);this.addCrumb(b.target.get("text"));this.doAjaxBrowse(a)},useBreadcrumbs:function(f){f.stop();var d=false;var h=f.target.className;this.folderlist=[];var b=this.breadcrumbs.getElements("a").every(function(c){if(c.className===h){return false}this.folderlist.push(f.target.innerHTML);return true},this);var g=[this.breadcrumbs.getElements("a").shift().clone(),this.breadcrumbs.getElements("span").shift().clone()];this.breadcrumbs.empty();this.breadcrumbs.adopt(g);this.folderlist.each(function(c){this.addCrumb(c)},this);var a=this.options.dir+this.folderlist.join(this.options.ds);this.doAjaxBrowse(a)},doAjaxBrowse:function(a){var b={dir:a,option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_getFolders",element_id:this.options.id};new Request({url:"",data:b,onComplete:function(c){c=JSON.decode(c);this.folderdiv.empty();c.each(function(d){new Element("li",{"class":"fileupload_folder"}).adopt(new Element("a",{href:"#"}).set("text",d)).inject(this.folderdiv)}.bind(this));if(c.length===0){this.slider.hide()}else{this.slider.slideIn()}this.watchAjaxFolderLinks();this.hiddenField.value="/"+this.folderlist.join("/")+"/";this.fireEvent("onBrowse")}.bind(this)}).send()},addCrumb:function(a){this.breadcrumbs.adopt(new Element("a",{href:"#","class":"crumb"+this.folderlist.length}).set("text",a),new Element("span").set("text"," / "))}});