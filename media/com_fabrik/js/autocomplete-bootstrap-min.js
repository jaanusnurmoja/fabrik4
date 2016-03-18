/*! Fabrik */
define(["jquery","fab/encoder","fab/fabrik","fab/lib/debounce/jquery.ba-throttle-debounce"],function(a,b,c,d){var e=new Class({Implements:[Options,Events],options:{menuclass:"auto-complete-container dropdown",classes:{ul:"dropdown-menu",li:"result"},url:"index.php",max:10,onSelection:Class.empty,autoLoadSingleResult:!0,minTriggerChars:1,debounceDelay:500,storeMatchedResultsOnly:!1},initialize:function(b,c){window.addEvent("domready",function(){if(this.matchedResult=!1,this.setOptions(c),b=b.replace("-auto-complete",""),this.options.labelelement="null"===typeOf(document.id(b+"-auto-complete"))?document.getElement(b+"-auto-complete"):document.id(b+"-auto-complete"),this.cache={},this.selected=-1,this.mouseinsde=!1,document.addEvent("keydown",function(a){this.doWatchKeys(a)}.bind(this)),this.element="null"===typeOf(document.id(b))?document.getElement(b):document.id(b),this.buildMenu(),!this.getInputElement())return void fconsole("autocomplete didn't find input element");this.getInputElement().setProperty("autocomplete","off");var e=this;a(document).on("keyup",d(this.options.debounceDelay,function(a){e.search(a)})),this.getInputElement().addEvent("blur",function(){this.options.storeMatchedResultsOnly&&(this.matchedResult||"undefined"!=typeof this.data&&1===this.data.length&&this.options.autoLoadSingleResult||(this.element.value=""))}.bind(this))}.bind(this))},search:function(a){var b;if(this.isMinTriggerlength()){if("tab"===a.keyCode||"enter"===a.keyCode)return a.preventDefault(),this.closeMenu(),this.ajax&&this.ajax.cancel(),void this.element.fireEvent("change",new Event.Mock(this.element,"change"),500);this.matchedResult=!1;var d=this.getInputElement().get("value");""===d&&(this.element.value=""),d!==this.searchText&&""!==d&&(this.options.storeMatchedResultsOnly===!1&&(this.element.value=d),this.positionMenu(),this.cache[d]?this.populateMenu(this.cache[d])&&this.openMenu():(this.ajax&&(this.closeMenu(),this.ajax.cancel()),this.ajax=new Request({url:this.options.url,data:{value:d},onRequest:function(){c.loader.start(this.getInputElement())}.bind(this),onCancel:function(){c.loader.stop(this.getInputElement()),this.ajax=null}.bind(this),onSuccess:function(a){if(c.loader.stop(this.getInputElement()),this.ajax=null,"null"===typeOf(a)){fconsole("Fabrik autocomplete: Ajax response empty");var e=c.getBlock(this.options.formRef).formElements.get(this.element.id);return b=Joomla.JText._("COM_FABRIK_AUTOCOMPLETE_AJAX_ERROR"),void e.setErrorMessage(b,"fabrikError",!0)}this.completeAjax(a,d)}.bind(this),onFailure:function(a){c.loader.stop(this.getInputElement()),this.ajax=null,fconsole("Fabrik autocomplete: Ajax failure: Code "+a.status+": "+a.statusText);var d=c.getBlock(this.options.formRef).formElements.get(this.element.id);b=Joomla.JText._("COM_FABRIK_AUTOCOMPLETE_AJAX_ERROR"),d.setErrorMessage(b,"fabrikError",!0)}.bind(this)}).send())),this.searchText=d}},completeAjax:function(a,b){a=JSON.decode(a),this.cache[b]=a,this.populateMenu(a)&&this.openMenu()},buildMenu:function(){this.menu=new Element("ul.dropdown-menu",{role:"menu",styles:{"z-index":1056}}),this.menu.inject(document.body),this.menu.addEvent("mouseenter",function(){this.mouseinsde=!0}.bind(this)),this.menu.addEvent("mouseleave",function(){this.mouseinsde=!1}.bind(this)),this.menu.addEvent("click:relay(a)",function(a,b){this.makeSelection(a,b)}.bind(this))},getInputElement:function(){return this.options.labelelement?this.options.labelelement:this.element},positionMenu:function(){var a=this.getInputElement().getCoordinates();this.menu.setStyles({left:a.left,top:a.top+a.height-1,width:a.width})},populateMenu:function(a){var d,e,f,g,h,i;a.map(function(a){return a.text=b.htmlDecode(a.text),a}),this.data=a;var j=this.getListMax(),k=this.menu;if(k.empty(),1===a.length&&this.options.autoLoadSingleResult)return this.element.value=a[0].value,this.getInputElement().value=a[0].text,this.closeMenu(),this.fireEvent("selection",[this,this.element.value]),f=c.getBlock(this.options.formRef),f!==!1&&(g=f.formElements.get(this.element.id),h=g.getBlurEvent(),this.element.fireEvent(h,new Event.Mock(this.element,h),700)),c.fireEvent("fabrik.autocomplete.selected",[this,this.element.value]),!1;0===a.length&&(d=new Element("li").adopt(new Element("div.alert.alert-info").adopt(new Element("i").set("text",Joomla.JText._("COM_FABRIK_NO_RECORDS")))),d.inject(k));for(var l=0;j>l;l++)i=a[l],e=new Element("a",{href:"#","data-value":i.value,tabindex:"-1"}).set("text",i.text),d=new Element("li").adopt(e),d.inject(k);return a.length>this.options.max&&new Element("li").set("text","....").inject(k),!0},makeSelection:function(a,b){a.preventDefault(),"null"!==typeOf(b)?(this.getInputElement().value=b.get("text"),this.element.value=b.getProperty("data-value"),this.closeMenu(),this.fireEvent("selection",[this,this.element.value]),this.element.fireEvent("change",new Event.Mock(this.element,"change"),700),this.element.fireEvent("blur",new Event.Mock(this.element,"blur"),700),c.fireEvent("fabrik.autocomplete.selected",[this,this.element.value])):c.fireEvent("fabrik.autocomplete.notselected",[this,this.element.value])},closeMenu:function(){this.shown&&(this.shown=!1,a(this.menu).hide(),this.selected=-1,document.removeEvent("click",this.doCloseEvent))},openMenu:function(){this.shown||this.isMinTriggerlength()&&(this.menu.show(),this.shown=!0,this.doCloseEvent=this.doTestMenuClose.bind(this),document.addEvent("click",this.doCloseEvent),this.selected=0,this.highlight())},isMinTriggerlength:function(){var a=this.getInputElement().get("value");return a.length>=this.options.minTriggerChars},doTestMenuClose:function(){this.mouseinsde||this.closeMenu()},getListMax:function(){return"null"===typeOf(this.data)?0:this.data.length>this.options.max?this.options.max:this.data.length},doWatchKeys:function(a){if(document.activeElement===this.getInputElement()){var b,c,d=this.getListMax();if(this.shown)if(this.isMinTriggerlength())switch(("enter"===a.key||"tab"===a.key)&&window.fireEvent("blur"),a.code){case 40:this.shown||this.openMenu(),this.selected+1<=d&&this.selected++,this.highlight(),a.stop();break;case 38:this.selected-1>=-1&&(this.selected--,this.highlight()),a.stop();break;case 13:case 9:a.stop(),b=this.getSelected(),b&&(c=new Event.Mock(b,"click"),this.makeSelection(c,b),this.closeMenu());break;case 27:a.stop(),this.closeMenu()}else a.stop(),this.closeMenu();else 13===a.code.toInt()&&a.stop(),40===a.code.toInt()&&this.openMenu()}},getSelected:function(){var a=this.menu.getElements("li"),b=a.filter(function(a,b){return b===this.selected}.bind(this));return"element"===typeOf(b[0])?b[0].getElement("a"):a.length>0?a[0].getElement("a"):!1},highlight:function(){this.matchedResult=!0,this.menu.getElements("li").each(function(a,b){b===this.selected?a.addClass("selected").addClass("active"):a.removeClass("selected").removeClass("active")}.bind(this))}});return e});