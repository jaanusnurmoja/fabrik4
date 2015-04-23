/*! fabrik */
var FbAutocomplete=new Class({Implements:[Options,Events],options:{menuclass:"auto-complete-container dropdown",classes:{ul:"dropdown-menu",li:"result"},url:"index.php",max:10,onSelection:Class.empty,autoLoadSingleResult:!0,minTriggerChars:1,storeMatchedResultsOnly:!1},initialize:function(a,b){window.addEvent("domready",function(){return this.matchedResult=!1,this.setOptions(b),a=a.replace("-auto-complete",""),this.options.labelelement="null"===typeOf(document.id(a+"-auto-complete"))?document.getElement(a+"-auto-complete"):document.id(a+"-auto-complete"),this.cache={},this.selected=-1,this.mouseinsde=!1,document.addEvent("keydown",function(a){this.doWatchKeys(a)}.bind(this)),this.element="null"===typeOf(document.id(a))?document.getElement(a):document.id(a),this.buildMenu(),this.getInputElement()?(this.getInputElement().setProperty("autocomplete","off"),this.getInputElement().addEvent("keyup",function(a){this.search(a)}.bind(this)),void this.getInputElement().addEvent("blur",function(){this.options.storeMatchedResultsOnly&&(this.matchedResult||"undefined"!=typeof this.data&&1===this.data.length&&this.options.autoLoadSingleResult||(this.element.value=""))}.bind(this))):void fconsole("autocomplete didn't find input element")}.bind(this))},search:function(a){if(this.isMinTriggerlength()){if("tab"===a.key||"enter"===a.key)return a.stop(),this.closeMenu(),this.ajax&&this.ajax.cancel(),void this.element.fireEvent("change",new Event.Mock(this.element,"change"),500);this.matchedResult=!1;var b=this.getInputElement().get("value");""===b&&(this.element.value=""),b!==this.searchText&&""!==b&&(this.options.storeMatchedResultsOnly===!1&&(this.element.value=b),this.positionMenu(),this.cache[b]?this.populateMenu(this.cache[b])&&this.openMenu():(this.ajax&&(this.closeMenu(),this.ajax.cancel()),this.ajax=new Request({url:this.options.url,data:{value:b},onRequest:function(){Fabrik.loader.start(this.getInputElement())}.bind(this),onCancel:function(){Fabrik.loader.stop(this.getInputElement()),this.ajax=null}.bind(this),onSuccess:function(a){if(Fabrik.loader.stop(this.getInputElement()),this.ajax=null,"null"===typeOf(a)){fconsole("Fabrik autocomplete: Ajax response empty");var c=Fabrik.getBlock(this.options.formRef).formElements.get(this.element.id);return void c.setErrorMessage(Joomla.JText._("COM_FABRIK_AUTOCOMPLETE_AJAX_ERROR"),"fabrikError",!0)}this.completeAjax(a,b)}.bind(this),onFailure:function(a){Fabrik.loader.stop(this.getInputElement()),this.ajax=null,fconsole("Fabrik autocomplete: Ajax failure: Code "+a.status+": "+a.statusText);var b=Fabrik.getBlock(this.options.formRef).formElements.get(this.element.id);b.setErrorMessage(Joomla.JText._("COM_FABRIK_AUTOCOMPLETE_AJAX_ERROR"),"fabrikError",!0)}.bind(this)}).send())),this.searchText=b}},completeAjax:function(a,b){a=JSON.decode(a),this.cache[b]=a,this.populateMenu(a)&&this.openMenu()},buildMenu:function(){this.menu=new Element("ul.dropdown-menu",{role:"menu",styles:{"z-index":1056}}),this.menu.inject(document.body),this.menu.addEvent("mouseenter",function(){this.mouseinsde=!0}.bind(this)),this.menu.addEvent("mouseleave",function(){this.mouseinsde=!1}.bind(this)),this.menu.addEvent("click:relay(a)",function(a,b){this.makeSelection(a,b)}.bind(this))},getInputElement:function(){return this.options.labelelement?this.options.labelelement:this.element},positionMenu:function(){var a=this.getInputElement().getCoordinates();this.menu.setStyles({left:a.left,top:a.top+a.height-1,width:a.width})},populateMenu:function(a){var b,c;a.map(function(a){return a.text=Encoder.htmlDecode(a.text),a}),this.data=a;var d=this.getListMax(),e=this.menu;if(e.empty(),1===a.length&&this.options.autoLoadSingleResult){this.element.value=a[0].value,this.getInputElement().value=a[0].text,this.closeMenu(),this.fireEvent("selection",[this,this.element.value]);var f=Fabrik.getBlock(this.options.formRef).formElements.get(this.element.id),g=f.getBlurEvent();return this.element.fireEvent(g,new Event.Mock(this.element,g),700),Fabrik.fireEvent("fabrik.autocomplete.selected",[this,this.element.value]),!1}0===a.length&&(b=new Element("li").adopt(new Element("div.alert.alert-info").adopt(new Element("i").set("text",Joomla.JText._("COM_FABRIK_NO_RECORDS")))),b.inject(e));for(var h=0;d>h;h++){var i=a[h];c=new Element("a",{href:"#","data-value":i.value,tabindex:"-1"}).set("text",i.text),b=new Element("li").adopt(c),b.inject(e)}return a.length>this.options.max&&new Element("li").set("text","....").inject(e),!0},makeSelection:function(a,b){a.preventDefault(),"null"!==typeOf(b)?(this.getInputElement().value=b.get("text"),this.element.value=b.getProperty("data-value"),this.closeMenu(),this.fireEvent("selection",[this,this.element.value]),this.element.fireEvent("change",new Event.Mock(this.element,"change"),700),this.element.fireEvent("blur",new Event.Mock(this.element,"blur"),700),Fabrik.fireEvent("fabrik.autocomplete.selected",[this,this.element.value])):Fabrik.fireEvent("fabrik.autocomplete.notselected",[this,this.element.value])},closeMenu:function(){this.shown&&(this.shown=!1,this.menu.hide(),this.selected=-1,document.removeEvent("click",function(a){this.doTestMenuClose(a)}.bind(this)))},openMenu:function(){this.shown||this.isMinTriggerlength()&&(this.menu.show(),this.shown=!0,document.addEvent("click",function(a){this.doTestMenuClose(a)}.bind(this)),this.selected=0,this.highlight())},isMinTriggerlength:function(){var a=this.getInputElement().get("value");return a.length>=this.options.minTriggerChars},doTestMenuClose:function(){this.mouseinsde||this.closeMenu()},getListMax:function(){return"null"===typeOf(this.data)?0:this.data.length>this.options.max?this.options.max:this.data.length},doWatchKeys:function(a){if(document.activeElement===this.getInputElement()){var b,c,d=this.getListMax();if(this.shown)if(this.isMinTriggerlength())switch(("enter"===a.key||"tab"===a.key)&&window.fireEvent("blur"),a.code){case 40:this.shown||this.openMenu(),this.selected+1<=d&&this.selected++,this.highlight(),a.stop();break;case 38:this.selected-1>=-1&&(this.selected--,this.highlight()),a.stop();break;case 13:case 9:a.stop(),b=this.getSelected(),b&&(c=new Event.Mock(b,"click"),this.makeSelection(c,b),this.closeMenu());break;case 27:a.stop(),this.closeMenu()}else a.stop(),this.closeMenu();else 13===a.code.toInt()&&a.stop(),40===a.code.toInt()&&this.openMenu()}},getSelected:function(){var a=this.menu.getElements("li"),b=a.filter(function(a,b){return b===this.selected}.bind(this));return"element"===typeOf(b[0])?b[0].getElement("a"):a.length>0?a[0].getElement("a"):!1},highlight:function(){this.matchedResult=!0,this.menu.getElements("li").each(function(a,b){b===this.selected?a.addClass("selected").addClass("active"):a.removeClass("selected").removeClass("active")}.bind(this))}}),FabCddAutocomplete=new Class({Extends:FbAutocomplete,search:function(a){var b,c=this.getInputElement().get("value");if(""===c&&(this.element.value=""),c!==this.searchText&&""!==c){var d=document.id(this.options.observerid);if("null"===typeOf(d))return void this.parent(a);this.options.formRef&&(d=Fabrik.getBlock(this.options.formRef).formElements[this.options.observerid]),b=d.get("value")+"."+c,this.positionMenu(),this.cache[b]?this.populateMenu(this.cache[b])&&this.openMenu():(this.ajax&&(this.closeMenu(),this.ajax.cancel()),this.ajax=new Request({url:this.options.url,data:{value:c,fabrik_cascade_ajax_update:1,v:d.get("value")},onRequest:function(){Fabrik.loader.start(this.getInputElement())}.bind(this),onCancel:function(){Fabrik.loader.stop(this.getInputElement())}.bind(this),onSuccess:function(a){Fabrik.loader.stop(this.getInputElement()),this.ajax=null,this.completeAjax(a)}.bind(this),onFailure:function(a){Fabrik.loader.stop(this.getInputElement()),this.ajax=null,fconsole("Fabrik autocomplete: Ajax failure: Code "+a.status+": "+a.statusText);var b=Fabrik.getBlock(this.options.formRef).formElements.get(this.element.id);b.setErrorMessage(Joomla.JText._("COM_FABRIK_AUTOCOMPLETE_AJAX_ERROR"),"fabrikError",!0)}.bind(this)}).send())}this.searchText=c}});