/*! Fabrik */
function fconsole(){if("undefined"!=typeof window.console){var a,b="";for(a=0;a<arguments.length;a++)b+=arguments[a]+" ";console.log(b)}}var RequestQueue=new Class({queue:{},initialize:function(){this.periodical=this.processQueue.periodical(500,this)},add:function(a){var b=a.options.url+Object.toQueryString(a.options.data)+Math.random();this.queue[b]||(this.queue[b]=a)},processQueue:function(){if(0!==Object.keys(this.queue).length){var a=!1;$H(this.queue).each(function(b,c){b.isSuccess()?(delete this.queue[c],a=!1):500===b.status&&(console.log("Fabrik Request Queue: 500 "+b.xhr.statusText),delete this.queue[c],a=!1)}.bind(this)),$H(this.queue).each(function(b){b.isRunning()||b.isSuccess()||a||(b.send(),a=!0)})}},empty:function(){return 0===Object.keys(this.queue).length}});Request.HTML=new Class({Extends:Request,options:{update:!1,append:!1,evalScripts:!0,filter:!1,headers:{Accept:"text/html, application/xml, text/xml, */*"}},success:function(a){var b=this.options,c=this.response;c.html=a.stripScripts(function(a){c.javascript=a});var d=c.html.match(/<body[^>]*>([\s\S]*?)<\/body>/i);d&&(c.html=d[1]);var e=new Element("div").set("html",c.html);if(c.tree=e.childNodes,c.elements=e.getElements(b.filter||"*"),b.filter&&(c.tree=c.elements),b.update){var f=document.id(b.update).empty();b.filter?f.adopt(c.elements):f.set("html",c.html)}else if(b.append){var g=document.id(b.append);b.filter?c.elements.reverse().inject(g):g.adopt(e.getChildren())}b.evalScripts&&Browser.exec(c.javascript),this.onSuccess(c.tree,c.elements,c.html,c.javascript)}}),Element.implement({keepCenter:function(){this.makeCenter(),window.addEvent("scroll",function(){this.makeCenter()}.bind(this)),window.addEvent("resize",function(){this.makeCenter()}.bind(this))},makeCenter:function(){var a=jQuery(window).width()/2-this.getWidth()/2,b=window.getScrollTop()+(jQuery(window).height()/2-this.getHeight()/2);this.setStyles({left:a,top:b})}}),Array.prototype.searchFor=function(a){var b;for(b=0;b<this.length;b++)if(0===this[b].indexOf(a))return b;return-1},Object.keys||(Object.keys=function(a){return jQuery.map(a,function(a,b){return b})});var Loader=new Class({initialize:function(){this.spinners={},this.spinnerCount={},this.watchResize()},sanitizeInline:function(a){return a=a?a:document.body,a instanceof jQuery?a=0===a.length?!1:a[0]:"null"===typeOf(document.id(a))&&(a=!1),a},start:function(a,b){if(a=this.sanitizeInline(a),b=b?b:Joomla.JText._("COM_FABRIK_LOADING"),this.spinners[a]||(this.spinners[a]=new Spinner(a,{message:b})),this.spinnerCount[a]?this.spinnerCount[a]++:this.spinnerCount[a]=1,1===this.spinnerCount[a])try{this.spinners[a].position().show()}catch(c){}},stop:function(a){if(a=this.sanitizeInline(a),this.spinners[a]&&this.spinnerCount[a]){if(this.spinnerCount[a]>1)return void this.spinnerCount[a]--;var b=this.spinners[a];Browser.ie&&Browser.version<9?b.hide():(b.destroy(),delete this.spinnerCount[a],delete this.spinners[a])}},watchResize:function(){var a=this;setInterval(function(){jQuery.each(a.spinners,function(a,b){try{var c=Math.max(40,jQuery(b.target).height()),d=jQuery(b.target).width();jQuery(b.element).height(c),0!==d&&(jQuery(b.element).width(d),jQuery(b.element).find(".spinner-content").css("left",d/2)),b.position()}catch(e){}})},300)}});