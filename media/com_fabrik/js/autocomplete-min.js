var FbAutocomplete=new Class({Implements:[Options,Events],options:{menuclass:"auto-complete-container",classes:{ul:"results",li:"result"},url:"index.php",max:10,onSelection:Class.empty,autoLoadSingleResult:true,storeMatchedResultsOnly:false},initialize:function(b,a){this.matchedResult=false;this.setOptions(a);b=b.replace("-auto-complete","");this.options.labelelement=typeOf(document.id(b+"-auto-complete"))==="null"?document.getElement(b+"-auto-complete"):document.id(b+"-auto-complete");this.cache={};this.selected=-1;this.mouseinsde=false;document.addEvent("keydown",function(c){this.doWatchKeys(c)}.bind(this));this.element=typeOf(document.id(b))==="null"?document.getElement(b):document.id(b);this.buildMenu();if(!this.getInputElement()){fconsole("autocomplete didn't find input element");return}this.getInputElement().setProperty("autocomplete","off");this.getInputElement().addEvent("keyup",function(c){this.search(c)}.bind(this));this.getInputElement().addEvent("blur",function(c){if(this.options.storeMatchedResultsOnly){if(!this.matchedResult){if(typeof(this.data)==="undefined"||!(this.data.length===1&&this.options.autoLoadSingleResult)){this.element.value=""}}}}.bind(this))},search:function(b){if(b.key==="tab"||b.key==="enter"){b.stop();this.closeMenu();return}this.matchedResult=false;var a=this.getInputElement().get("value");if(a===""){this.element.value=""}if(a!==this.searchText&&a!==""){if(this.options.storeMatchedResultsOnly===false){this.element.value=a}this.positionMenu();if(this.cache[a]){this.populateMenu(this.cache[a]);this.openMenu()}else{Fabrik.loader.start(this.getInputElement());if(this.ajax){this.closeMenu();this.ajax.cancel()}this.ajax=new Request({url:this.options.url,data:{value:a},onRequest:function(){Fabrik.loader.start(this.getInputElement())}.bind(this),onCancel:function(){Fabrik.loader.stop(this.getInputElement());this.ajax=null}.bind(this),onSuccess:function(c){Fabrik.loader.stop(this.getInputElement());this.completeAjax(c,a)}.bind(this)}).send()}}this.searchText=a},completeAjax:function(b,a){b=JSON.decode(b);this.cache[a]=b;Fabrik.loader.stop(this.getInputElement());this.populateMenu(b);this.openMenu()},buildMenu:function(){this.menu=new Element("div",{"class":this.options.menuclass,styles:{position:"absolute"}}).adopt(new Element("ul",{"class":this.options.classes.ul}));this.menu.inject(document.body);this.menu.addEvent("mouseenter",function(){this.mouseinsde=true}.bind(this));this.menu.addEvent("mouseleave",function(){this.mouseinsde=false}.bind(this))},getInputElement:function(){return this.options.labelelement?this.options.labelelement:this.element},positionMenu:function(){var a=this.getInputElement().getCoordinates();var b=this.getInputElement().getPosition();this.menu.setStyles({left:a.left,top:(a.top+a.height)-1,width:a.width})},populateMenu:function(e){e.map(function(h,g){h.text=Encoder.htmlDecode(h.text);return h});this.data=e;var b=this.getListMax();var d=this.menu.getElement("ul");d.empty();if(e.length===1&&this.options.autoLoadSingleResult){this.matchedResult=true;this.element.value=e[0].value;this.fireEvent("selection",[this,this.element.value])}for(var c=0;c<b;c++){var f=e[c];var a=new Element("li",{"data-value":f.value,"class":"unselected "+this.options.classes.li}).set("text",f.text);a.inject(d);a.addEvent("click",function(g){g.stop();this.makeSelection(g.target)}.bind(this))}if(e.length>this.options.max){new Element("li").set("text","....").inject(d)}},makeSelection:function(a){if(typeOf(a)!=="null"){this.getInputElement().value=a.get("text");this.element.value=a.getProperty("data-value");this.matchedResult=true;this.closeMenu();this.fireEvent("selection",[this,this.element.value]);this.element.fireEvent("change",new Event.Mock(this.element,"change"),700);Fabrik.fireEvent("fabrik.autocomplete.selected",[this,this.element.value])}else{Fabrik.fireEvent("fabrik.autocomplete.notselected",[this,this.element.value])}},closeMenu:function(){if(this.shown){this.shown=false;this.menu.fade("out");this.selected=-1;document.removeEvent("click",function(a){this.doTestMenuClose(a)}.bind(this))}},openMenu:function(){if(!this.shown){this.shown=true;this.menu.setStyle("visibility","visible").fade("in");document.addEvent("click",function(a){this.doTestMenuClose(a)}.bind(this));this.selected=0;this.highlight()}},doTestMenuClose:function(){if(!this.mouseinsde){this.closeMenu()}},getListMax:function(){if(typeOf(this.data)==="null"){return 0}return this.data.length>this.options.max?this.options.max:this.data.length},doWatchKeys:function(c){var a=this.getListMax();if(!this.shown){if(c.code.toInt()===13){c.stop()}if(c.code.toInt()===40&&document.activeElement===this.getInputElement()){this.openMenu()}}else{if(c.key==="enter"||c.key==="tab"){window.fireEvent("blur")}switch(c.code){case 40:if(!this.shown){this.openMenu()}if(this.selected+1<a){this.selected++;this.highlight()}c.stop();break;case 38:if(this.selected-1>=-1){this.selected--;this.highlight()}c.stop();break;case 13:case 9:c.stop();var b=new Event.Mock(this.getSelected(),"click");this.makeSelection(b);break;case 27:c.stop();this.matchedResult=false;this.closeMenu();break}}},getSelected:function(){var b=this.menu.getElements("li").filter(function(a,c){return c===this.selected}.bind(this));return b[0]},highlight:function(){this.matchedResult=true;this.menu.getElements("li").each(function(a,b){if(b===this.selected){a.addClass("selected")}else{a.removeClass("selected")}}.bind(this))}});var FabCddAutocomplete=new Class({Extends:FbAutocomplete,search:function(f){var d;var b=this.getInputElement().get("value");if(b===""){this.element.value=""}if(b!==this.searchText&&b!==""){var a=document.id(this.options.observerid);if(typeOf(a)!=="null"){d=a.get("value")+"."+b}else{this.parent(f);return}this.positionMenu();if(this.cache[d]){this.populateMenu(this.cache[d]);this.openMenu()}else{Fabrik.loader.start(this.getInputElement());if(this.ajax){this.closeMenu();this.ajax.cancel()}var c=document.id(this.options.observerid).get("value");if(typeOf(c)==="null"){c=Fabrik.blocks[this.options.formRef].formElements.get(this.options.observerid).get("value")}this.ajax=new Request({method:"post",url:this.options.url,data:{value:b,fabrik_cascade_ajax_update:1,v:c},onSuccess:function(g){this.completeAjax(g)}.bind(this),onError:function(g,e){console.log(g,e)},onFailure:function(e){console.log(e)}}).send()}}this.searchText=b}});