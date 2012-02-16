//MooTools Canvas Lib. Copyright (c) 2010 Martin Tillmann, <http://forvar.de/js/mcl>, MIT Style License. 
(function(){var a=this.CANVAS={layers:[],ctx:null,ctxEl:null,lastMouseOverTarget:null,dragTarget:null,threads:null,ctxPos:null,cacheCtxPos:true,init:function(b){if(b.canvasElement){this.setCtx(b.canvasElement)}this.layers=new LayerHash();if(b.enableMouse){this.setupMouse()}if(b.cacheCtxPos){this.cacheCtxPos=this.options.cacheCtxPos}this.threads=new Hash();this.ctxPos=$(this.ctxEl).getPosition();return this},setDrag:function(b){this.dragTarget=b.fullid},clearDrag:function(){this.dragTarget=null},getMouse:function(c){var b=this.cacheCtxPos?this.ctxPos:$(this.ctxEl).getPosition();return[c.event.pageX-b.x,c.event.pageY-b.y]},setupMouse:function(){$(this.ctxEl).addEvents({click:function(c){var b=a.getMouse(c);if(item=a.findTarget(b)){item.fireEvent("click",b)}},mousedown:function(c){var b=a.getMouse(c);if(a.dragTarget){a.fromPath(a.dragTarget).fireEvent("mousedown",b);return}if(item=a.findTarget(b)){item.fireEvent("mousedown",b)}},mouseup:function(c){var b=a.getMouse(c);if(a.dragTarget){a.fromPath(a.dragTarget).fireEvent("mouseup",b);return}if(item=a.findTarget(b)){item.fireEvent("mouseup",b)}},mousemove:function(c){var b=a.getMouse(c);if(a.dragTarget){a.fromPath(a.dragTarget).fireEvent("mousemove",b);return}if(item=a.findTarget(b)){if(item.fullid!=a.lastMouseOverTarget){item.fireEvent("mouseover",b);if(a.lastMouseOverTarget){a.fromPath(a.lastMouseOverTarget).fireEvent("mouseout",b)}a.lastMouseOverTarget=item.fullid}else{item.fireEvent("mousemove",b)}}else{if(a.lastMouseOverTarget){a.fromPath(a.lastMouseOverTarget).fireEvent("mouseout",b);a.lastMouseOverTarget=null}}},dblclick:function(c){var b=a.getMouse(c);if(item=a.findTarget(b)){item.fireEvent("dblclick",b)}},mouseleave:function(c){var b=a.getMouse(c);if(a.dragTarget){a.fromPath(a.dragTarget).fireEvent("mouseup",b);a.dragTarget=null}if(a.lastMouseOverTarget){a.fromPath(a.lastMouseOverTarget).fireEvent("mouseout",b);a.lastMouseOverTarget=null}}})},setCtx:function(b){this.ctxEl=b;this.ctx=$(b).getContext("2d")},getCtx:function(){return this.ctx},contains:function(b,c){return c[0]>=b[0]&&c[1]>=b[1]&&c[0]<=b[0]+b[2]&&c[1]<=b[1]+b[3]},fromPath:function(b){b=b.split("/");return a.layers.get(b[0]).get(b[1])},layerFromPath:function(b){b=b.split("/");return a.layers.get(b[0])},findTarget:function(f){for(var d=a.layers.layers.length-1,c,b;c=a.layers.layers[d];d--){var b=c.items.getClean();for(var e in b){if(b[e].interactive&&b[e].dims){if(a.contains(b[e].dims,f)){return b[e]}}}}return false},addThread:function(b){if(!b.options){b=new Thread(b)}this.threads.set(b.options.id,b);return b},removeThread:function(b){this.threads.get(b).destroy();this.items.erase(b)},clear:function(b){b=b||[0,0,$(this.ctxEl).get("width"),$(this.ctxEl).get("height")];this.ctx.clearRect(b[0],b[1],b[2],b[3]);return this},draw:function(){this.layers.draw()}}})();var CanvasItem=new Class({Implements:[Options,Events],options:{onDraw:$empty,onDestroy:$empty},dims:null,initialize:function(a){if(!a.id){throw new Error("CanvasItem.initialize: options.id must not be blank!")}if(a.dims){throw new Error("CanvasItem.initialize: options.dims must not be used, interactivity and your code may break.")}for(var b in a){if(!["events"].contains(b)){this[b]=a[b]}}this.setOptions(a.events)},setDims:function(){if(arguments.length==4){this.dims=arguments}else{if(arguments.length==1){this.dims=arguments[0]}else{var a,d,b,c;if(!(a=$pick(this.x,this.left))){return false}if(!(d=$pick(this.y,this.top))){return false}if(!(b=$pick(this.w,this.width))){return false}if(!(c=$pick(this.h,this.height))){return false}this.dims=[a,d,b,c]}}},getLayer:function(){return CAVNAS.layerFromPath(this.fullid)},draw:function(a){this.fireEvent("draw",CANVAS.ctx)},destroy:function(){this.fireEvent("destroy",CANVAS.ctx)}});var Cmorph=new Class({Extends:Fx,item:null,properties:null,initialize:function(a,b){this.parent(b);this.item=a;this.properties={};return this},morph:function(b){var a;for(var c in b){a=b[c];if($type(a)!="array"){a=[this.item[c],a]}this.properties[c]=[a[0],a[1],a[1]-a[0]]}this.start(0,1);return this},set:function(a){for(var b in this.properties){this.item[b]=this.properties[b][0]+this.properties[b][2]*a}}});var Layer=new Class({Implements:[Options,Events],options:{visible:true},initialize:function(a){if(!a.id){throw new Error("Layer.initialize: options.id must not be blank!")}this.items=new Hash();this.setOptions(a);return this},add:function(a){a=a.options?a:new CanvasItem(a);a.fullid=this.options.id+"/"+a.id;this.items.set(a.id,a);return a},get:function(a){return this.items.get(a)},remove:function(a){this.items.get("id").fireEvent("destroy");this.items.erase("id")},toggle:function(){this.options.visible=!this.options.visible;return this},draw:function(){if(!this.options.visible){return false}this.items.each(function(a){a.draw()});return this},promote:function(){return CANVAS.layers.promote(this.options.id)},demote:function(){return CANVAS.layers.demote(this.options.id)},swap:function(a){return CANVAS.layers.swap(this.options.id,a)}});var LayerHash=new Class({Implements:[Events,Options],options:{onAdd:$empty,onRemove:$empty,onSwap:$empty,onPromote:$empty,onDemote:$empty,onDraw:$empty},tables:{pos:[],id:{}},length:0,layers:[],initialize:function(a){this.setOptions(a);return this},add:function(b){var a=this.layers.length;return this.addAt(b,a)},addAt:function(b,c){b=b.options?b:new Layer(b);if($type(this.tables.id[b.options.id])=="number"){throw new Error("LayerHash.addAt: Layer-ID can only be used once: ``"+b.options.id+"´´")}var a=this.layers.splice(c,this.layers.length-c,b);this.layers=this.layers.concat(a);this.rebuildTables();this.fireEvent("add");return this.getAt(c)},rebuildTables:function(){this.tables={pos:[],id:{}};for(var b=0,a;a=this.layers[b];b++){id=a.options.id;this.tables.pos.push(id);this.tables.id[id]=b}this.length=this.layers.length},addAfter:function(a,b){return this.addAt(a,this.tables.id[b]+1)},addBefore:function(a,b){return this.addAt(a,this.tables.id[b])},replace:function(a,b){var c=this.tables.id[b];this.remove(b);return this.addAt(a,c)},removeAt:function(a){this.remove(this.tables.pos[a]);return this},remove:function(a){this.layers.splice(this.tables.id[a],1);this.rebuildTables();this.fireEvent("remove");return this},promote:function(c){var b=this.tables.id[c];var a=b+1;this.fireEvent("promote");return this.swapByPos(b,a)},demote:function(c){var b=this.tables.id[c];var a=b-1;this.fireEvent("demote");return this.swapByPos(b,a)},swapByPos:function(d,c){var b=this.layers[c];var a=this.layers[d];if(b&&a){this.layers[d]=b;this.layers[c]=a;this.rebuildTables();return a}return false},swap:function(b,a){this.swapByPos(this.tables.id[b],this.tables.id[a]);this.fireEvent("swap");return this.get(b)},getByPos:function(a){return this.layers[a]},getAt:function(a){return this.getByPos(a)},get:function(a){return this.layers[this.tables.id[a]]},draw:function(c){if(!c){for(var b=0,a;a=this.layers[b];b++){this.drawLayer(a)}}else{this.drawLayer(c)}this.fireEvent("draw");return this},drawLayer:function(a){if(a.options.visible){a.draw()}},getOrder:function(){return this.tables.pos},setOrder:function(b){var d=[];for(var c=0,a;a=b[c];c++){d.push(this.layers[this.tables.id[a]])}this.layers=d;this.rebuildTables();return this}});var Thread=new Class({Implements:[Options,Events],options:{fps:(1000/31).round(),expires:-1,onExec:$empty,onExpire:$empty,onBeforeexpire:$empty,onDestroy:$empty,instant:true},timer:null,morphs:[],initialize:function(a){if(!a.id){throw new Error("Thread.initialize: options.id must not be blank!")}if(a.fps){a.fps=(1000/a.fps).round()}this.setOptions(a);if(this.options.instant){this.start()}return this},start:function(){this.tick();this.timer=this.tick.periodical(this.options.fps,this);return this},stop:function(){$clear(this.timer);return this},tick:function(){this.fireEvent("exec");if(this.options.expires>0){this.options.expires--}if(this.options.expires===1){this.fireEvent("beforeexpire")}if(this.options.expires===0){this.stop();this.fireEvent("expire")}},destroy:function(){this.stop();this.fireEvent("destroy")}});
