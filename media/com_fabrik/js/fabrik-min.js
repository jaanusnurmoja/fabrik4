function fconsole(){if(typeof(window.console)!=="undefined"){var b="",a;for(a=0;a<arguments.length;a++){b+=arguments[a]+" "}console.log(b)}}RequestQueue=new Class({queue:{},initialize:function(){this.periodical=this.processQueue.periodical(500,this)},add:function(b){var a=b.options.url+Object.toQueryString(b.options.data)+Math.random();if(!this.queue[a]){this.queue[a]=b}},processQueue:function(){if(Object.keys(this.queue).length===0){return}var a=false;$H(this.queue).each(function(c,b){if(c.isSuccess()){delete (this.queue[b]);a=false}}.bind(this));$H(this.queue).each(function(c,b){if(!c.isRunning()&&!c.isSuccess()&&!a){c.send();a=true}})},empty:function(){return Object.keys(this.queue).length===0}});Request.HTML=new Class({Extends:Request,options:{update:false,append:false,evalScripts:true,filter:false,headers:{Accept:"text/html, application/xml, text/xml, */*"}},success:function(f){var e=this.options,c=this.response;c.html=f.stripScripts(function(h){c.javascript=h});var d=c.html.match(/<body[^>]*>([\s\S]*?)<\/body>/i);if(d){c.html=d[1]}var b=new Element("div").set("html",c.html);c.tree=b.childNodes;c.elements=b.getElements(e.filter||"*");if(e.filter){c.tree=c.elements}if(e.update){var g=document.id(e.update).empty();if(e.filter){g.adopt(c.elements)}else{g.set("html",c.html)}}else{if(e.append){var a=document.id(e.append);if(e.filter){c.elements.reverse().inject(a)}else{a.adopt(b.getChildren())}}}if(e.evalScripts){Browser.exec(c.javascript)}this.onSuccess(c.tree,c.elements,c.html,c.javascript)}});Element.implement({keepCenter:function(){this.makeCenter();window.addEvent("scroll",function(){this.makeCenter()}.bind(this));window.addEvent("resize",function(){this.makeCenter()}.bind(this))},makeCenter:function(){var a=window.getWidth()/2-this.getWidth()/2;var b=window.getScrollTop()+(window.getHeight()/2-this.getHeight()/2);this.setStyles({left:a,top:b})}});Array.prototype.searchFor=function(b){var a;for(a=0;a<this.length;a++){if(this[a].indexOf(b)===0){return a}}return -1};var Loader=new Class({initialize:function(a){this.spinners={};this.spinnerCount={}},start:function(b,c){if(typeOf(document.id(b))==="null"){b=false}b=b?b:document.body;c=c?c:Joomla.JText._("COM_FABRIK_LOADING");if(!this.spinners[b]){this.spinners[b]=new Spinner(b,{message:c})}if(!this.spinnerCount[b]){this.spinnerCount[b]=1}else{this.spinnerCount[b]++}if(this.spinnerCount[b]===1){try{this.spinners[b].position().show()}catch(a){}}},stop:function(b){if(typeOf(document.id(b))==="null"){b=false}b=b?b:document.body;if(!this.spinners[b]||!this.spinnerCount[b]){return}if(this.spinnerCount[b]>1){this.spinnerCount[b]--;return}var a=this.spinners[b];if(Browser.ie&&Browser.version<9){a.hide()}else{a.destroy();delete this.spinnerCount[b];delete this.spinners[b]}}});if(typeof(Fabrik)==="undefined"){if(typeof(jQuery)!=="undefined"){document.addEvent("click:relay(.popover button.close)",function(a,c){var b="#"+c.get("data-popover");var d=document.getElement(b);jQuery(b).popover("hide");if(typeOf(d)!=="null"&&d.get("tag")==="input"){d.checked=false}})}Fabrik={};Fabrik.events={};Fabrik.Windows={};Fabrik.loader=new Loader();Fabrik.blocks={};Fabrik.periodicals={};Fabrik.addBlock=function(a,b){Fabrik.blocks[a]=b;Fabrik.fireEvent("fabrik.block.added",[b,a])};Fabrik.getBlock=function(b,c,a){a=a?a:false;if(a){Fabrik.periodicals[b]=Fabrik._getBlock.periodical(500,this,[b,c,a])}return Fabrik._getBlock(b,c,a)};Fabrik._getBlock=function(b,d,a){d=d?d:false;if(Fabrik.blocks[b]!==undefined){foundBlockId=b}else{if(d){return false}var e=Object.keys(Fabrik.blocks),c=e.searchFor(b);if(c===-1){return false}foundBlockId=e[c]}if(a){clearInterval(Fabrik.periodicals[b]);a(Fabrik.blocks[foundBlockId])}return Fabrik.blocks[foundBlockId]};document.addEvent("click:relay(.fabrik_delete a, .fabrik_action a.delete, .btn.delete)",function(b,a){if(b.rightClick){return}Fabrik.watchDelete(b,a)});document.addEvent("click:relay(.fabrik_edit a, a.fabrik_edit)",function(b,a){if(b.rightClick){return}Fabrik.watchEdit(b,a)});document.addEvent("click:relay(.fabrik_view a, a.fabrik_view)",function(b,a){if(b.rightClick){return}Fabrik.watchView(b,a)});document.addEvent("click:relay(*[data-fabrik-view])",function(g,f){if(g.rightClick){return}var c,b,h;g.preventDefault();if(g.target.get("tag")==="a"){b=g.target}else{b=typeOf(g.target.getElement("a"))!=="null"?g.target.getElement("a"):g.target.getParent("a")}c=b.get("href");c+=c.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1";$H(Fabrik.Windows).each(function(e,a){e.close()});h=b.get("title");if(!h){h=Joomla.JText._("COM_FABRIK_VIEW")}var d={id:"view."+c,title:h,loadMethod:"xhr",contentURL:c};Fabrik.getWindow(d)});Fabrik.removeEvent=function(c,b){if(Fabrik.events[c]){var a=Fabrik.events[c].indexOf(b);if(a!==-1){delete Fabrik.events[c][a]}}};Fabrik.addEvent=function(b,a){if(!Fabrik.events[b]){Fabrik.events[b]=[]}if(!Fabrik.events[b].contains(a)){Fabrik.events[b].push(a)}};Fabrik.addEvents=function(a){var b;for(b in a){Fabrik.addEvent(b,a[b])}return this};Fabrik.fireEvent=function(d,b,a){var c=Fabrik.events;this.eventResults=[];if(!c||!c[d]){return this}b=Array.from(b);c[d].each(function(e){if(a){this.eventResults.push(e.delay(a,this,b))}else{this.eventResults.push(e.apply(this,b))}},this);return this};Fabrik.requestQueue=new RequestQueue();Fabrik.cbQueue={google:[]};Fabrik.loadGoogleMap=function(d,a){var e=document.location.protocol==="https:"?"https:":"http:";var f=e+"//maps.googleapis.com/maps/api/js?&sensor="+d+"&callback=Fabrik.mapCb";var c=Array.from(document.scripts).filter(function(g){return g.src===f});if(c.length===0){var b=document.createElement("script");b.type="text/javascript";b.src=f;document.body.appendChild(b);Fabrik.cbQueue.google.push(a)}else{if(Fabrik.googleMap){window[a]()}else{Fabrik.cbQueue.google.push(a)}}};Fabrik.mapCb=function(){Fabrik.googleMap=true;var b,a;for(a=0;a<Fabrik.cbQueue.google.length;a++){b=Fabrik.cbQueue.google[a];if(typeOf(b)==="function"){b()}else{window[b]()}}Fabrik.cbQueue.google=[]};Fabrik.watchDelete=function(g,f){var a,d,c;c=g.target.getParent(".fabrik_row");if(!c){c=Fabrik.activeRow}if(c){var i=c.getElement("input[type=checkbox][name*=id]");if(typeOf(i)!=="null"){i.checked=true}d=c.id.split("_");d=d.splice(0,d.length-2).join("_");a=Fabrik.blocks[d]}else{d=g.target.getParent(".fabrikList");if(typeOf(d)!=="null"){d=d.id;a=Fabrik.blocks[d]}else{var h=f.getParent(".floating-tip-wrapper");if(h){var b=h.retrieve("list");d=b.id}else{d=f.get("data-listRef")}a=Fabrik.blocks[d];if(a.options.actionMethod==="floating"&&!this.bootstrapped){a.form.getElements("input[type=checkbox][name*=id], input[type=checkbox][name=checkAll]").each(function(e){e.checked=true})}}}if(!a.submit("list.delete")){g.stop()}};Fabrik.watchEdit=function(b,a){Fabrik.openSingleView("form",b,a)};Fabrik.watchView=function(b,a){Fabrik.openSingleView("details",b,a)};Fabrik.openSingleView=function(j,g,h){var b,d="xhr",k;var l=h.get("data-list");var i=Fabrik.blocks[l];if(!i.options.ajax_links){return}g.preventDefault();var m=i.getActiveRow(g);if(!m){return}i.setActive(m);var c=m.id.split("_").getLast();if(g.target.get("tag")==="a"){k=g.target}else{k=typeOf(g.target.getElement("a"))!=="null"?g.target.getElement("a"):g.target.getParent("a")}b=k.get("href");b+=b.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1";d=k.get("data-loadmethod");if(typeOf(d)==="null"){d="xhr"}$H(Fabrik.Windows).each(function(e,a){e.close()});var f={id:l+"."+c,title:i.options.popup_view_label,loadMethod:d,contentURL:b,width:i.options.popup_width,height:i.options.popup_height,onClose:function(o){var a=j+"_"+i.options.formid+"_"+c;try{Fabrik.blocks[a].destroyElements();Fabrik.blocks[a].formElements=null;Fabrik.blocks[a]=null;delete (Fabrik.blocks[a]);var p=(j==="details")?"fabrik.list.row.view.close":"fabrik.list.row.edit.close";Fabrik.fireEvent(p,[l,c,a])}catch(n){console.log(n)}}};f.id=j==="details"?"view."+f.id:"add."+f.id;if(typeOf(i.options.popup_offset_x)!=="null"){f.offset_x=i.options.popup_offset_x}if(typeOf(i.options.popup_offset_y)!=="null"){f.offset_y=i.options.popup_offset_y}Fabrik.getWindow(f)};Fabrik.form=function(c,d,b){var a=new FbForm(d,b);Fabrik.addBlock(c,a);return a};window.fireEvent("fabrik.loaded")};