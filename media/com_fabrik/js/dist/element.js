/*! Fabrik */
define(["jquery"],function(jQuery){return window.FbElement=new Class({Implements:[Events,Options],options:{element:null,defaultVal:"",value:"",label:"",editable:!1,isJoin:!1,joinId:0},initialize:function(a,b){var c=this;if(this.setPlugin(""),b.element=a,this.strElement=a,this.loadEvents=[],this.events=$H({}),this.setOptions(b),this.options.advanced){var d=this.getChangeEvent();jQuery("#"+this.options.element).on("change",{changeEvent:d},function(a){document.id(this.id).fireEvent(a.data.changeEvent,new Event.Mock(document.id(this.id),a.data.changeEvent))})}return Fabrik.on("fabrik.form.element.added",function(){c.addNewEvent(c.getFocusEvent(),function(){c.removeTipMsg()})}),this.setElement()},destroy:function(){},setPlugin:function(a){("null"===typeOf(this.plugin)||""===this.plugin)&&(this.plugin=a)},getPlugin:function(){return this.plugin},setElement:function(){return document.id(this.options.element)?(this.element=document.id(this.options.element),this.setorigId(),!0):!1},get:function(a){return"value"===a?this.getValue():void 0},getFormElementsKey:function(a){return this.baseElementId=a,a},attachedToForm:function(){this.setElement(),Fabrik.bootstrapped?(this.alertImage=new Element("i."+this.form.options.images.alert),this.successImage=new Element("i.icon-checkmark",{styles:{color:"green"}})):(this.alertImage=new Asset.image(this.form.options.images.alert),this.alertImage.setStyle("cursor","pointer"),this.successImage=new Asset.image(this.form.options.images.action_check)),this.loadingImage=jQuery(this.form.options.images.ajax_loader).data("isicon")?new Element("span").set("html",this.form.options.images.ajax_loader):new Asset.image(this.form.options.images.ajax_loader),this.form.addMustValidate(this)},fireEvents:function(a){this.hasSubElements()?this._getSubElements().each(function(b){Array.from(a).each(function(a){b.fireEvent(a)}.bind(this))}.bind(this)):Array.from(a).each(function(a){this.element&&this.element.fireEvent(a)}.bind(this))},getElement:function(){return"null"===typeOf(this.element)&&(this.element=document.id(this.options.element)),this.element},_getSubElements:function(){var a=this.getElement();return"null"===typeOf(a)?!1:(this.subElements=a.getElements(".fabrikinput"),this.subElements)},hasSubElements:function(){return this._getSubElements(),("array"===typeOf(this.subElements)||"elements"===typeOf(this.subElements))&&this.subElements.length>0?!0:!1},unclonableProperties:function(){return["form"]},cloneUpdateIds:function(a){this.element=document.id(a),this.options.element=a},runLoadEvent:function(js,delay){delay=delay?delay:0,"function"===typeOf(js)?js.delay(delay):0===delay?eval(js):function(){console.log("delayed calling runLoadEvent for "+delay),eval(js)}.bind(this).delay(delay)},removeCustomEvents:function(){},renewEvents:function(){this.events.each(function(a,b){this.element.removeEvents(b),a.each(function(a){this.addNewEventAux(b,a)}.bind(this))}.bind(this))},addNewEventAux:function(action,js){this.element.addEvent(action,function(e){"function"===typeOf(js)?js.delay(0,this,this):eval(js)}.bind(this))},addNewEvent:function(a,b){"load"===a?(this.loadEvents.push(b),this.runLoadEvent(b)):(this.element||(this.element=document.id(this.strElement)),this.element&&(Object.keys(this.events).contains(a)||(this.events[a]=[]),this.events[a].push(b),this.addNewEventAux(a,b)))},addEvent:function(a,b){this.addNewEvent(a,b)},validate:function(){},addNewOption:function(a,b){var c,d=document.id(this.options.element+"_additions").value,e={val:a,label:b};c=""!==d?JSON.decode(d):[],c.push(e);for(var f="[",g=0;g<c.length;g++)f+=JSON.encode(c[g])+",";f=f.substring(0,f.length-1)+"]",document.id(this.options.element+"_additions").value=f},getLabel:function(){return this.options.label},setLabel:function(a){this.options.label=a;var b=this.getLabelElement();b&&(b[0].textContent=a)},update:function(a){this.getElement()&&(this.options.editable?this.element.value=a:this.element.innerHTML=a)},updateByLabel:function(a){this.update(a)},set:function(a){this.update(a)},getValue:function(){return this.element?this.options.editable?this.element.value:this.options.value:!1},reset:function(){this.resetEvents(),this.options.editable===!0&&this.update(this.options.defaultVal)},resetEvents:function(){this.loadEvents.each(function(a){this.runLoadEvent(a,100)}.bind(this))},clear:function(){this.update("")},onsubmit:function(a){a&&a(!0)},afterAjaxValidation:function(){},cloned:function(){if(this.renewEvents(),this.resetEvents(),this.element.hasClass("chzn-done")){this.element.removeClass("chzn-done"),this.element.addClass("chzn-select"),this.element.getParent().getElement(".chzn-container").destroy(),jQuery("#"+this.element.id).chosen();var a=this.getChangeEvent();jQuery("#"+this.options.element).on("change",{changeEvent:a},function(a){document.id(this.id).fireEvent(a.data.changeEvent,new Event.Mock(a.data.changeEvent,document.id(this.id)))})}},decloned:function(){},getContainer:function(){var a=jQuery(this.element).closest(".fabrikElementContainer");return a=0===a.length?!1:a[0],"null"===typeOf(this.element)?!1:a},getErrorElement:function(){return this.getContainer().getElements(".fabrikErrorMessage")},getLabelElement:function(){return this.getContainer().getElements(".fabrikLabel")},getValidationFx:function(){return this.validationFX||(this.validationFX=new Fx.Morph(this.getErrorElement()[0],{duration:500,wait:!0})),this.validationFX},tips:function(){var a=this;return jQuery(Fabrik.tips.elements).filter(function(b,c){return c===a.getContainer()||c.getParent()===a.getContainer()?!0:void 0})},addTipMsg:function(a,b){b=b?b:"error";var c,d,e,f,g=this.tips();if(0!==g.length){g=jQuery(g[0]),void 0===g.attr(b)&&(g.attr(b,a),c=this._tipContent(g,!1),d=jQuery("<div>"),d.html(c.html()),e=jQuery("<li>").addClass(b),e.html(a),jQuery("<i>").addClass(this.form.options.images.alert).prependTo(e),0===d.find('li:contains("'+jQuery(a).text()+'")').length&&d.find("ul").append(e),f=unescape(d.html()),void 0===g.data("fabrik-tip-orig")&&g.data("fabrik-tip-orig",c.html()),this._recreateTip(g,f));try{g.data("popover").show()}catch(h){g.popover("show")}}},_recreateTip:function(a,b){try{a.data("content",b),a.data("popover").setContent(),a.data("popover").options.content=b}catch(c){a.attr("data-content",b),a.popover("show")}},_tipContent:function(a,b){var c;try{a.data("popover").show(),c=a.data("popover").tip().find(".popover-content")}catch(d){c=jQuery("<div>").append(void 0!==a.data("fabrik-tip-orig")&&b?jQuery(a.data("fabrik-tip-orig")):jQuery(a.data("content")))}return c},removeTipMsg:function(){var a,b=b?b:"error",c=this.tips();if(c=jQuery(c[0]),void 0!==c.attr(b)){a=this._tipContent(c,!0),this._recreateTip(c,a.html()),c.removeAttr(b);try{c.data("popover").hide()}catch(d){c.popover("hide")}}},moveTip:function(a,b){var c,d,e=this.tips();e=jQuery(e[0]),e.length>0&&(c=e.data("popover").$tip,c&&(d=c.data("origPos"),void 0===d&&(d={top:parseInt(e.data("popover").$tip.css("top"),10)+a,left:parseInt(e.data("popover").$tip.css("left"),10)+b},c.data("origPos",d)),c.css({top:d.top-a,left:d.left-b})))},setErrorMessage:function(a,b){var c,d,e=["fabrikValidating","fabrikError","fabrikSuccess"],f=this.getContainer();if(f===!1)return void console.log("Notice: couldn not set error msg for "+a+" no container class found");e.each(function(a){b===a?f.addClass(a):f.removeClass(a)});var g=this.getErrorElement();switch(g.each(function(a){a.empty()}),b){case"fabrikError":Fabrik.loader.stop(this.element);var h=this.tips();if(Fabrik.bootstrapped&&0!==h.length?this.addTipMsg(a):(c=new Element("a",{href:"#",title:a,events:{click:function(a){a.stop()}}}).adopt(this.alertImage),Fabrik.tips.attach(c)),g[0].adopt(c),f.removeClass("success").removeClass("info").addClass("error"),f.addClass("has-error").removeClass("has-success"),g.length>1)for(d=1;d<g.length;d++)g[d].set("html",a);break;case"fabrikSuccess":if(f.addClass("success").removeClass("info").removeClass("error"),f.addClass("has-success").removeClass("has-error"),Fabrik.bootstrapped)Fabrik.loader.stop(this.element),this.removeTipMsg();else{g[0].adopt(this.successImage);var i=function(){g[0].addClass("fabrikHide"),f.removeClass("success")};i.delay(700)}break;case"fabrikValidating":f.removeClass("success").addClass("info").removeClass("error"),Fabrik.loader.start(this.element,a)}this.getErrorElement().removeClass("fabrikHide");var j=this.form;("fabrikError"===b||"fabrikSuccess"===b)&&j.updateMainError();var k=this.getValidationFx();switch(b){case"fabrikValidating":case"fabrikError":k.start({opacity:1});break;case"fabrikSuccess":k.start({opacity:1}).chain(function(){f.hasClass("fabrikSuccess")&&(f.removeClass("fabrikSuccess"),this.start.delay(700,this,{opacity:0,onComplete:function(){f.addClass("success").removeClass("error"),j.updateMainError(),e.each(function(a){f.removeClass(a)})}}))})}},setorigId:function(){if(this.options.inRepeatGroup){var a=this.options.element;this.origId=a.substring(0,a.length-1-this.options.repeatCounter.toString().length)}},decreaseName:function(a){var b=this.getElement();return"null"===typeOf(b)?!1:(this.hasSubElements()?this._getSubElements().each(function(b){b.name=this._decreaseName(b.name,a),b.id=this._decreaseId(b.id,a)}.bind(this)):"null"!==typeOf(this.element.name)&&(this.element.name=this._decreaseName(this.element.name,a)),"null"!==typeOf(this.element.id)&&(this.element.id=this._decreaseId(this.element.id,a)),this.options.repeatCounter>a&&this.options.repeatCounter--,this.element.id)},_decreaseId:function(a,b,c){var d=!1;c=c?c:!1,c!==!1&&a.contains(c)&&(a=a.replace(c,""),d=!0);var e=Array.from(a.split("_")),f=e.getLast();if("null"===typeOf(f.toInt()))return e.join("_");f>=1&&f>b&&f--,e.splice(e.length-1,1,f);var g=e.join("_");return d&&(g+=c),this.options.element=g,g},_decreaseName:function(a,b,c){var d=!1;c=c?c:!1,c!==!1&&a.contains(c)&&(a=a.replace(c,""),d=!0);var e=a.split("["),f=e[1].replace("]","").toInt();f>=1&&f>b&&f--,f+="]",e[1]=f;var g=e.join("[");return d&&(g+=c),g},getRepeatNum:function(){return this.options.inRepeatGroup===!1?!1:this.element.id.split("_").getLast()},getBlurEvent:function(){return"select"===this.element.get("tag")?"change":"blur"},getFocusEvent:function(){return"select"===this.element.get("tag")?"click":"focus"},getChangeEvent:function(){return"change"},select:function(){},focus:function(){this.removeTipMsg()},hide:function(){var a=this.getContainer();a&&a.hide()},show:function(){var a=this.getContainer();a&&a.show()},toggle:function(){var a=this.getContainer();a&&a.toggle()},getCloneName:function(){return this.options.element},doTab:function(){(function(){this.redraw(),Fabrik.bootstrapped||this.options.tab_dt.removeEvent("click",function(a){this.doTab(a)}.bind(this))}).bind(this).delay(500)},watchTab:function(){var a,b,c=Fabrik.bootstrapped?".tab-pane":".current",d=this.element.getParent(c);d&&(Fabrik.bootstrapped?(a=document.getElement("a[href$=#"+d.id+"]"),b=a.getParent("ul.nav"),b.addEvent("click:relay(a)",function(a){this.doTab(a)}.bind(this))):(b=d.getPrevious(".tabs"),b&&(this.options.tab_dd=this.element.getParent(".fabrikGroup"),"none"===this.options.tab_dd.style.getPropertyValue("display")&&(this.options.tab_dt=b.getElementById("group"+this.groupid+"_tab"),this.options.tab_dt&&this.options.tab_dt.addEvent("click",function(a){this.doTab(a)}.bind(this))))))},updateUsingRaw:function(){return!1}}),window.FbElement});