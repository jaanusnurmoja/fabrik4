/*! Fabrik */
Fabrik.getWindow=function(a){if(Fabrik.Windows[a.id])a.visible!==!1&&Fabrik.Windows[a.id].open(),Fabrik.Windows[a.id].setOptions(a);else{var b=a.type?a.type:"";switch(b){case"redirect":Fabrik.Windows[a.id]=new Fabrik.RedirectWindow(a);break;case"modal":Fabrik.Windows[a.id]=new Fabrik.Modal(a);break;case"":default:Fabrik.Windows[a.id]=new Fabrik.Window(a)}}return Fabrik.Windows[a.id]},Fabrik.Window=new Class({Implements:[Events,Options],options:{id:"FabrikWindow",title:"&nbsp;",container:!1,loadMethod:"html",contentURL:"",createShowOverLay:!1,width:300,height:300,loadHeight:100,expandable:!0,offset_x:null,offset_y:null,visible:!0,onClose:function(){},onOpen:function(){},onContentLoaded:function(){this.fitToContent(!1)},destroy:!0},modal:!1,classSuffix:"",expanded:!1,initialize:function(a){this.setOptions(a),this.makeWindow()},watchTabs:function(){this.window.getElements(".nav-tabs a").addEvent("mouseup",function(){this.fitToWidth(),this.drawWindow()}.bind(this))},deleteButton:function(){var a,b=function(a){this.close(a)}.bind(this);if(Fabrik.bootstrapped)a=jQuery(Fabrik.jLayouts["modal-close"])[0],a.addEvent("click",b);else{a=new Element("a",{href:"#","class":"close",events:{click:b}});var c=Fabrik.iconGen.create(icon.cross);c.inject(a)}return a},center:function(){var a=this.windowWidthInPx(),b=this.window.getStyle("width"),c=this.window.getStyle("height");b=null===b||"auto"===b?a:this.window.getStyle("width"),b=b.toInt(),c=null===c||"auto"===c?this.options.height+10:this.window.getStyle("height"),c=c.toInt();var d={width:b+"px",height:c+"px"};if(this.window.setStyles(d),Fabrik.bootstrapped&&this.modal){var e=(window.getSize().y-c)/2,f=(window.getSize().x-b)/2;d.top=0>e?window.getScroll().y:window.getScroll().y+e,d.left=0>f?window.getScroll().x:window.getScroll().x+f}else{var g=window.getSize().y/2+window.getScroll().y-c/2;d.top="null"!==typeOf(this.options.offset_y)?window.getScroll().y+this.options.offset_y:g;var h=window.getSize().x/2+window.getScroll().x-b/2;d.left="null"!==typeOf(this.options.offset_x)?window.getScroll().x+this.options.offset_x:h}d["margin-left"]=0,this.window.setStyles(d)},windowWidthInPx:function(){return this.windowDimenionInPx("width")},windowDimenionInPx:function(a){var b="height"===a?"y":"x",c=this.options[a]+"";return-1!==c.indexOf("%")?Math.floor(window.getSize()[b]*(c.toFloat()/100)):c.toInt()},makeWindow:function(){var a,b,c,d,e,f,g,h,i=[];this.window=new Element("div",{id:this.options.id,"class":"fabrikWindow "+this.classSuffix+" modal"}),this.window.setStyle("width",this.options.width),this.window.setStyle("height",this.options.height),this.center(),this.contentWrapperEl=this.window;var j=this.deleteButton(),k="handlelabel";this.modal||(k+=" draggable",a=new Element("div",{"class":"bottomBar modal-footer"}),b=new Element("div",{"class":"dragger"}),e=Fabrik.bootstrapped?jQuery(Fabrik.jLayouts["icon-expand"])[0]:Fabrik.iconGen.create(icon.resize,{scale:.8,rotate:0,shadow:{color:"#fff",translate:{x:0,y:1}},fill:{color:["#999","#666"]}}),e.inject(b),a.adopt(b)),Fabrik.bootstrapped?(d=jQuery(Fabrik.jLayouts["icon-full-screen"])[0],f=new Element("h3",{"class":k}).set("text",this.options.title)):(d=Fabrik.iconGen.create(icon.expand,{scale:.4,fill:{color:["#666666","#999999"]}}),f=new Element("span",{"class":k}).set("text",this.options.title)),i.push(f),this.options.expandable&&this.modal===!1&&(c=new Element("a",{href:"#","class":"expand",events:{click:function(a){this.expand(a)}.bind(this)}}).adopt(d),i.push(c)),i.push(j),this.handle=this.getHandle().adopt(i);var l=15,m=15,n=this.options.height-l-m;n<this.options.loadHeight&&(n=this.options.loadHeight),this.contentWrapperEl=new Element("div.contentWrapper",{styles:{height:n+"px"}});var o=new Element("div",{"class":"itemContent"});if(this.contentEl=new Element("div",{"class":"itemContentPadder"}),o.adopt(this.contentEl),this.contentWrapperEl.adopt(o),g=this.windowWidthInPx(),h=this.windowDimenionInPx("height"),this.contentWrapperEl.setStyles({height:h,width:g+"px"}),this.modal)this.window.adopt([this.handle,this.contentWrapperEl]);else{this.window.adopt([this.handle,this.contentWrapperEl,a]),this.window.makeResizable({handle:b,onDrag:function(){Fabrik.fireEvent("fabrik.window.resized",this.window),this.drawWindow()}.bind(this)});var p={handle:this.handle};p.onComplete=function(){Fabrik.fireEvent("fabrik.window.moved",this.window),this.drawWindow()}.bind(this),p.container=this.options.container?document.id(this.options.container):null,this.window.makeDraggable(p)}this.options.visible||this.window.fade("hide"),document.id(document.body).adopt(this.window),this.loadContent(),this.center()},expand:function(a){if(a.stop(),this.expanded)this.window.setPosition({x:this.unexpanded.left,y:this.unexpanded.top}).setStyles({width:this.unexpanded.width,height:this.unexpanded.height}),this.expanded=!1;else{this.expanded=!0;var b=window.getSize();this.unexpanded=this.window.getCoordinates();var c=window.getScroll();this.window.setPosition({x:c.x,y:c.y}).setStyles({width:b.x,height:b.y})}this.drawWindow()},getHandle:function(){var a=this.handleClass();return new Element("div",{"class":"draggable "+a})},handleClass:function(){return Fabrik.bootstrapped?"modal-header":"handle"},loadContent:function(){var a;switch(window.fireEvent("tips.hideall"),this.options.loadMethod){case"html":if("null"===typeOf(this.options.content))return fconsole("no content option set for window.html"),void this.close();"element"===typeOf(this.options.content)?this.options.content.inject(this.contentEl.empty()):this.contentEl.set("html",this.options.content),this.fireEvent("onContentLoaded",[this]),this.watchTabs();break;case"xhr":a=this.window.getElement(".itemContent"),a=this.contentEl,Fabrik.loader.start(a),new Request.HTML({url:this.options.contentURL,data:{fabrik_window_id:this.options.id},update:a,onSuccess:function(){Fabrik.loader.stop(a),this.fireEvent("onContentLoaded",[this]),this.watchTabs(),this.center()}.bind(this)}).post();break;case"iframe":var b=this.options.height-40,c=this.contentEl.getScrollSize().x+40<window.getWidth()?this.contentEl.getScrollSize().x+40:window.getWidth();a=this.window.getElement(".itemContent"),Fabrik.loader.start(a),this.iframeEl&&this.iframeEl.dispose(),this.iframeEl=new Element("iframe",{id:this.options.id+"_iframe",name:this.options.id+"_iframe","class":"fabrikWindowIframe",src:this.options.contentURL,marginwidth:0,marginheight:0,frameBorder:0,scrolling:"auto",styles:{height:b+"px",width:c}}).inject(this.window.getElement(".itemContent")),this.iframeEl.hide(),this.iframeEl.addEvent("load",function(){Fabrik.loader.stop(this.window.getElement(".itemContent")),this.iframeEl.show(),this.fireEvent("onContentLoaded",[this]),this.watchTabs()}.bind(this))}},drawWindow:function(){var a=this.window.getElement("."+this.handleClass());a=a?a.getSize().y:25;var b=this.window.getElement(".bottomBar").getSize().y;this.contentWrapperEl.setStyle("height",this.window.getDimensions().height-(a+b)),this.contentWrapperEl.setStyle("width",this.window.getDimensions().width-2),"iframe"===this.options.loadMethod&&(this.iframeEl.setStyle("height",this.contentWrapperEl.offsetHeight-40),this.iframeEl.setStyle("width",this.contentWrapperEl.offsetWidth-10))},fitToContent:function(a,b){if(a=void 0===a?!0:a,b=void 0===b?!0:b,"iframe"!==this.options.loadMethod&&(this.fitToHeight(),this.fitToWidth()),this.drawWindow(),b&&this.center(),!this.options.offset_y&&a){new Fx.Scroll(window).toElement(this.window)}},fitToHeight:function(){var a=this.window.getElement("."+this.handleClass());a=a?a.getSize().y:25;var b=this.window.getElement(".bottomBar").getSize().y,c=this.window.getElement(".itemContent"),d=c.getScrollSize().y+a+b,e=d<window.getHeight()?d:window.getHeight();this.window.setStyle("height",e)},fitToWidth:function(){var a=25,b=this.window.getElement(".itemContent"),c=b.getElement("#g-page-surround");c&&(a+=50,c.setStyle("overflow","visible"));var d=b.getScrollSize().x+a<window.getWidth()?b.getScrollSize().x+a:window.getWidth();c&&c.setStyle("overflow",""),this.window.setStyle("width",d)},close:function(a){this.modal,a&&a.stop(),this.options.destroy?(this.window.destroy(),delete Fabrik.Windows[this.options.id]):this.window.fade("hide"),this.fireEvent("onClose",[this])},open:function(a){this.modal,a&&a.stop(),this.window.fade("show"),this.fireEvent("onOpen",[this])}}),Fabrik.Modal=new Class({Extends:Fabrik.Window,modal:!0,classSuffix:"fabrikWindow-modal",getHandle:function(){var a=this.handleClass();return new Element("div",{"class":a})}}),Fabrik.RedirectWindow=new Class({Extends:Fabrik.Window,initialize:function(a){var b={id:"redirect",title:a.title?a.title:"",loadMethod:c,width:a.width?a.width:300,height:a.height?a.height:320,minimizable:!1,collapsible:!0};b.id="redirect",a=Object.merge(b,a);var c;a.loadMethod="xhr",a.contentURL.contains(Fabrik.liveSite)||!a.contentURL.contains("http://")&&!a.contentURL.contains("https://")?a.contentURL.contains("tmpl=component")||(a.contentURL+=a.contentURL.contains("?")?"&tmpl=component":"?tmpl=component"):a.loadMethod="iframe",this.setOptions(a),this.makeWindow()}});