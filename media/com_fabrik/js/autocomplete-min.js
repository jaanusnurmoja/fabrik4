/*! fabrik */
var FbAutocomplete=new Class({Implements:[Options,Events],options:{menuclass:"auto-complete-container",classes:{ul:"results",li:"result"},url:"index.php",max:10,onSelection:Class.empty,autoLoadSingleResult:!0,minTriggerChars:1,storeMatchedResultsOnly:!1},initialize:function(a,b){return this.matchedResult=!1,this.setOptions(b),a=a.replace("-auto-complete",""),this.options.labelelement="null"===typeOf(document.id(a+"-auto-complete"))?document.getElement(a+"-auto-complete"):document.id(a+"-auto-complete"),this.cache={},this.selected=-1,this.mouseinsde=!1,document.addEvent("keydown",function(a){this.doWatchKeys(a)}.bind(this)),this.element="null"===typeOf(document.id(a))?document.getElement(a):document.id(a),this.buildMenu(),this.getInputElement()?(this.getInputElement().setProperty("autocomplete","off"),this.getInputElement().addEvent("keyup",function(a){this.search(a)}.bind(this)),void this.getInputElement().addEvent("blur",function(){this.options.storeMatchedResultsOnly&&(this.matchedResult||"undefined"!=typeof this.data&&1===this.data.length&&this.options.autoLoadSingleResult||(this.element.value=""))}.bind(this))):void fconsole("autocomplete didn't find input element")},canSearch:function(a){return this.isMinTriggerlength()?"tab"===a.key||"enter"===a.key?(a.stop(),this.closeMenu(),!1):!0:!1},defineSearchValue:function(){var a=this.getInputElement().get("value");return""===a&&(this.element.value=""),a},search:function(a){if(this.canSearch(a)){this.matchedResult=!1;var b=this.getInputElement().get("value");if(""===b&&(this.element.value=""),b!==this.searchText&&""!==b)if(this.options.storeMatchedResultsOnly===!1&&(this.element.value=b),this.positionMenu(),this.cache[b])this.populateMenu(this.cache[b]),this.openMenu();else{this.ajax&&(this.closeMenu(),this.ajax.cancel());var c={value:b};this.ajax=this.makeAjax(this.options.url,c)}this.searchText=b}},makeAjax:function(a,b){return new Request({url:a,data:b,onRequest:function(){Fabrik.loader.start(this.getInputElement())}.bind(this),onCancel:function(){Fabrik.loader.stop(this.getInputElement())}.bind(this),onSuccess:function(a){this.completeAjax(a,b.value)}.bind(this),onComplete:function(){Fabrik.loader.stop(this.getInputElement())}.bind(this),onFailure:function(){Fabrik.loader.stop(this.getInputElement())}.bind(this),onException:function(){Fabrik.loader.stop(this.getInputElement())}.bind(this)}).send()},completeAjax:function(a,b){Fabrik.loader.stop(this.getInputElement()),a=JSON.decode(a),this.cache[b]=a,this.populateMenu(a),this.openMenu()},buildMenu:function(){this.menu=new Element("div",{"class":this.options.menuclass,styles:{position:"absolute"}}).adopt(new Element("ul",{"class":this.options.classes.ul})),this.menu.inject(document.body),this.menu.addEvent("mouseenter",function(){this.mouseinsde=!0}.bind(this)),this.menu.addEvent("mouseleave",function(){this.mouseinsde=!1}.bind(this))},getInputElement:function(){return this.options.labelelement?this.options.labelelement:this.element},positionMenu:function(){{var a=this.getInputElement().getCoordinates();this.getInputElement().getPosition()}this.menu.setStyles({left:a.left,top:a.top+a.height-1,width:a.width})},populateMenu:function(a){a.map(function(a){return a.text=Encoder.htmlDecode(a.text),a}),this.data=a;var b=this.getListMax(),c=this.menu.getElement("ul");c.empty(),1===a.length&&this.options.autoLoadSingleResult&&(this.matchedResult=!0,this.element.value=a[0].value,this.fireEvent("selection",[this,this.element.value]));for(var d=0;b>d;d++){var e=a[d],f=new Element("li",{"data-value":e.value,"class":"unselected "+this.options.classes.li}).set("text",e.text);f.inject(c),f.addEvent("click",function(a){a.stop(),this.makeSelection(a.target)}.bind(this))}a.length>this.options.max&&new Element("li").set("text","....").inject(c)},makeSelection:function(a){"null"!==typeOf(a)?(this.getInputElement().value=a.get("text"),this.element.value=a.getProperty("data-value"),this.matchedResult=!0,this.closeMenu(),this.fireEvent("selection",[this,this.element.value]),this.element.fireEvent("change",new Event.Mock(this.element,"change"),700),Fabrik.fireEvent("fabrik.autocomplete.selected",[this,this.element.value])):Fabrik.fireEvent("fabrik.autocomplete.notselected",[this,this.element.value])},closeMenu:function(){this.shown&&(this.shown=!1,this.menu.fade("out"),this.selected=-1,document.removeEvent("click",function(a){this.doTestMenuClose(a)}.bind(this)))},openMenu:function(){this.shown||this.isMinTriggerlength()&&(this.shown=!0,this.menu.setStyle("visibility","visible").fade("in"),document.addEvent("click",function(a){this.doTestMenuClose(a)}.bind(this)),this.selected=0,this.highlight())},doTestMenuClose:function(){this.mouseinsde||this.closeMenu()},isMinTriggerlength:function(){var a=this.getInputElement().get("value");return a.length>=this.options.minTriggerChars},getListMax:function(){return"null"===typeOf(this.data)?0:this.data.length>this.options.max?this.options.max:this.data.length},doWatchKeys:function(a){if(document.activeElement===this.getInputElement()){Fabrik.loader.stop(this.getInputElement());var b=this.getListMax();if(this.shown)if(this.isMinTriggerlength())switch(("enter"===a.key||"tab"===a.key)&&window.fireEvent("blur"),a.code){case 40:this.shown||this.openMenu(),this.selected+1<b&&(this.selected++,this.highlight()),a.stop();break;case 38:this.selected-1>=-1&&(this.selected--,this.highlight()),a.stop();break;case 13:case 9:a.stop();var c=new Event.Mock(this.getSelected(),"click");this.makeSelection(c);break;case 27:a.stop(),this.matchedResult=!1,this.closeMenu()}else a.stop(),this.closeMenu();else 13===a.code.toInt()&&a.stop(),40===a.code.toInt()&&this.openMenu()}},getSelected:function(){var a=this.menu.getElements("li").filter(function(a,b){return b===this.selected}.bind(this));return a[0]},highlight:function(){this.matchedResult=!0,this.menu.getElements("li").each(function(a,b){b===this.selected?a.addClass("selected"):a.removeClass("selected")}.bind(this))}}),FabCddAutocomplete=new Class({Extends:FbAutocomplete,search:function(a){if(this.canSearch(a)){var b,c=this.defineSearchValue();if(c!==this.searchText&&""!==c){var d=document.id(this.options.observerid);if("null"===typeOf(d))return void this.parent(a);if(b=d.get("value")+"."+c,this.positionMenu(),this.cache[b])this.populateMenu(this.cache[b]),this.openMenu();else{this.ajax&&(this.closeMenu(),this.ajax.cancel());var e=document.id(this.options.observerid).get("value");"null"===typeOf(e)&&(e=Fabrik.getBlock(this.options.formRef).elements.get(this.options.observerid).get("value"));var f={value:c,fabrik_cascade_ajax_update:1,v:e};this.ajax=this.makeAjax(this.options.url,f)}}this.searchText=c}}});