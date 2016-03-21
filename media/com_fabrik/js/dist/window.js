/*! Fabrik */
define(["jquery","fab/fabrik","jQueryUI","fab/utils"],function(a,b){return b.getWindow=function(c){if(b.Windows[c.id])c.visible!==!1&&b.Windows[c.id].open(),b.Windows[c.id].setOptions(c);else{var d=c.type?c.type:"";switch(d){case"redirect":b.Windows[c.id]=new b.RedirectWindow(c);break;case"modal":b.Windows[c.id]=new b.Modal(c),a(window).on("resize",function(){b.Windows[c.id].fitToContent(!1)});break;case"":default:b.Windows[c.id]=new b.Window(c)}}return b.Windows[c.id]},b.Window=new Class({Implements:[Events,Options],options:{id:"FabrikWindow",title:"&nbsp;",container:!1,loadMethod:"html",contentURL:"",createShowOverLay:!1,width:300,height:300,loadHeight:100,expandable:!0,offset_x:null,offset_y:null,visible:!0,modalId:"",onClose:function(){},onOpen:function(){},onContentLoaded:function(){this.fitToContent(!1)},destroy:!0},modal:!1,classSuffix:"",expanded:!1,initialize:function(b){this.options=a.extend(this.options,b),this.makeWindow()},watchTabs:function(){var b=this;a(".nav-tabs a").on("mouseup",function(){b.fitToWidth(),b.drawWindow()})},deleteButton:function(){return a(b.jLayouts["modal-close"])[0]},contentHeight:function(){var a=this.window.find(".contentWrapper");return a.css("height","auto"),a[0].getDimensions(!0).height},center:function(){var a,b,c=this.windowDimensionInPx("width"),d=this.windowDimensionInPx("height"),e=this.window.width(),f=this.window.height(),g={};e=null===e||"auto"===e?c:e,f=null===f||"auto"===f?d:f,e=parseInt(e,10),f=parseInt(f,10),a=window.getSize().y/2+window.getScroll().y-f/2,g.top=null!==this.options.offset_y?window.getScroll().y+this.options.offset_y:a,b=window.getSize().x/2+window.getScroll().x-e/2,g.left=null!==this.options.offset_x?window.getScroll().x+this.options.offset_x:b,g["margin-left"]=0,this.window.css(g)},windowDimensionInPx:function(a){var b="height"===a?"y":"x",c=this.options[a]+"";return-1!==c.indexOf("%")?Math.floor(window.getSize()[b]*(c.toFloat()/100)):parseInt(c,10)},makeWindow:function(){var c,d,e=this;b.jLayouts[this.options.modalId]?(this.window=this.buildWinFromLayout(),this.window.find('*[data-role="title"]').text(this.options.title)):this.window=this.buildWinViaJS(),a(document.body).append(this.window),this.loadContent(),this.options.visible||this.window.fade("hide"),a(this.window).find('*[data-role="close"]').on("click",function(a){a.preventDefault(),e.close()}),this.window.find('*[data-role="expand"]').on("click",function(a){a.preventDefault(),e.expand()}),c=this.windowDimensionInPx("width"),d=this.contentHeight(),this.contentWrapperEl.css({height:d,width:c+"px"});var f=this.window.find('*[data-role="title"]');this.options.modal||(this.window.draggable({handle:f,drag:function(){b.fireEvent("fabrik.window.resized",this.window),e.drawWindow()}}),this.window.resizable({containment:this.options.container?a("#"+this.options.container):null,handles:{n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w",ne:".ui-resizable-ne",se:".ui-resizable-se",sw:".ui-resizable-sw",nw:".ui-resizable-nw"},resize:function(){e.drawWindow()}})),this.window.css("width",this.options.width),this.window.css("height",this.options.height+this.window.find('*[data-role="title"]').height()),this.options.modal?this.fitToContent(!1):this.center()},buildWinFromLayout:function(){var c=a(b.jLayouts[this.options.modalId]);return this.contentEl=c.find(".itemContentPadder"),this.contentWrapperEl=c.find("div.contentWrapper"),c},buildWinViaJS:function(){var c,d,e,f,g,h,i=[],j=this;this.window=new Element("div",{id:this.options.id,"class":"fabrikWindow "+this.classSuffix+" modal"});var k=this.deleteButton();a(k).on("click",function(){j.close()});var l="handlelabel";this.options.modal||(l+=" draggable",c=a("<div />").addClass("bottomBar modal-footer"),d=a("<div />").addClass("dragger"),g=a(b.jLayouts["icon-expand"]),g.prependTo(d),c.append(d)),f=a(b.jLayouts["icon-full-screen"]),h=a("<h3 />").addClass(l).text(this.options.title),i.push(h),this.options.expandable&&this.options.modal===!1&&(e=a("<a />").addClass("expand").attr({href:"#"}).append(f),i.push(e)),i.push(k),this.handle=this.getHandle().append(i);var m=0,n=15,o=this.options.height-m-n;o<this.options.loadHeight&&(o=this.options.loadHeight),this.contentWrapperEl=a("<div />").addClass("contentWrapper").css({height:o+"px"});var p=a("<div />").addClass("itemContent");return this.contentEl=a("<div />").addClass("itemContentPadder"),p.append(this.contentEl),this.contentWrapperEl.append(p),this.window=a(this.window),this.window.append(this.options.modal?[this.handle,this.contentWrapperEl]:[this.handle,this.contentWrapperEl,c]),this.window},expand:function(){if(this.expanded)this.window.css({left:this.unexpanded.left+"px",top:this.unexpanded.top+"px"}),this.window.css({width:this.unexpanded.width,height:this.unexpanded.height}),this.expanded=!1;else{this.expanded=!0;var b=window.getSize();this.unexpanded=a.extend({},this.window.position(),{width:this.window.width(),height:this.window.height()});var c=window.getScroll();this.window.css({left:c.x+"px",top:c.y+"px"}),this.window.css({width:b.x,height:b.y})}this.drawWindow()},getHandle:function(){var b=this.handleClass();return a("<div />").addClass("draggable "+b)},handleClass:function(){return"modal-header"},loadContent:function(){var c,d=this;switch(window.fireEvent("tips.hideall"),this.options.loadMethod){case"html":if(void 0===this.options.content)return fconsole("no content option set for window.html"),void this.close();"element"===typeOf(this.options.content)?a(this.options.content).appendTo(this.contentEl):this.contentEl.html(this.options.content),this.options.onContentLoaded.apply(this),this.watchTabs();break;case"xhr":d.window.width(d.options.width),d.window.height(d.options.height),b.loader.start(d.contentEl),new a.ajax({url:this.options.contentURL,data:{fabrik_window_id:this.options.id},method:"post"}).success(function(a){b.loader.stop(d.contentEl),d.contentEl.append(a),d.watchTabs(),d.center(),d.options.onContentLoaded.apply(d)});break;case"iframe":var e=this.options.height-40,f=this.contentEl[0].scrollWidth,g=f+40<a(window).width()?f+40:a(window).width();c=this.window.find(".itemContent"),b.loader.start(c),this.iframeEl&&this.iframeEl.remove(),this.iframeEl=a("<iframe />").addClass("fabrikWindowIframe").attr({id:this.options.id+"_iframe",name:this.options.id+"_iframe","class":"fabrikWindowIframe",src:this.options.contentURL,marginwidth:0,marginheight:0,frameBorder:0,scrolling:"auto"}).css({height:e+"px",width:g}).appendTo(c),this.iframeEl.hide(),this.iframeEl.on("load",function(){b.loader.stop(d.window.find(".itemContent")),d.iframeEl.show(),a(d).trigger("onContentLoaded",[d]),d.watchTabs()})}},titleHeight:function(){var a=this.window.find("."+this.handleClass());return a=a.length>0?a.outerHeight():25,isNaN(a)&&(a=0),a},footerHeight:function(){var a=parseInt(this.window.find(".bottomBar").outerHeight(),10);return isNaN(a)&&(a=0),a},drawWindow:function(){var a=this.titleHeight(),b=this.footerHeight(),c=this.contentHeight(),d=this.window.width();c>this.window.height()&&(c=this.window.height()-a-b),this.contentWrapperEl.css("height",c),this.contentWrapperEl.css("width",d-2),"iframe"===this.options.loadMethod&&(this.iframeEl.css("height",this.contentWrapperEl[0].offsetHeight-40),this.iframeEl.css("width",this.contentWrapperEl[0].offsetWidth-10))},fitToContent:function(b,c){b=void 0===b?!0:b,c=void 0===c?!0:c,"iframe"!==this.options.loadMethod&&(this.fitToHeight(),this.fitToWidth()),this.drawWindow(),c&&this.center(),!this.options.offset_y&&b&&a("body").scrollTop(this.window)},fitToHeight:function(){var b=this.contentHeight()+this.footerHeight()+this.titleHeight(),c=a(window).height(),d=c>b?b:c;this.window.css("height",d)},fitToWidth:function(){var b=this.window.find(".itemContent"),c=a(window).width(),d=b[0].scrollWidth,e=c>d+25?d+25:c;this.window.css("width",e)},close:function(a){a=a?a:!1,this.options.destroy||a?(this.window.remove(),delete b.Windows[this.options.id]):this.window.fadeOut({duration:0}),this.fireEvent("onClose",[this])},open:function(a){a&&a.stopPropagation(),this.window.fadeIn({duration:0}),this.fireEvent("onOpen",[this])}}),b.Modal=new Class({Extends:b.Window,modal:!0,classSuffix:"fabrikWindow-modal",getHandle:function(){return a("<div />").addClass(this.handleClass())},fitToHeight:function(){var b=this.contentHeight()+this.footerHeight()+this.titleHeight(),c=a(window).height(),d=c>b?b:c;this.window.css("height",Math.max(this.options.height,d))},fitToWidth:function(){this.window.css("width",this.options.width)}}),b.RedirectWindow=new Class({Extends:b.Window,initialize:function(c){var d={id:"redirect",title:c.title?c.title:"",loadMethod:e,width:c.width?c.width:300,height:c.height?c.height:320,minimizable:!1,collapsible:!0};d.id="redirect",c=a.merge(d,c);var e,f=c.contentURL;c.loadMethod="xhr",f.contains(b.liveSite)||!f.contains("http://")&&!f.contains("https://")?f.contains("tmpl=component")||(c.contentURL+=f.contains("?")?"&tmpl=component":"?tmpl=component"):c.loadMethod="iframe",this.options=a.extend(this.options,c),this.makeWindow()}}),b.Window});