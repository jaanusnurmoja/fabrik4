var FloatingTips=new Class({Implements:[Options,Events],options:{fxProperties:{transition:Fx.Transitions.linear,duration:500},position:"top",showOn:"mouseenter",hideOn:"mouseleave",content:"title",distance:50,tipfx:"Fx.Transitions.linear",heading:"",duration:500,fadein:false,notice:false,showFn:function(a){a.stop();return true},hideFn:function(a){a.stop();return true},placement:function(c,b){Fabrik.fireEvent("bootstrap.tips.place",[c,b]);var d=Fabrik.eventResults.length===0?false:Fabrik.eventResults[0];if(d===false){var a=JSON.decode(b.get("opts","{}").opts);return a.position?a.position:"top"}else{return d}}},initialize:function(elements,options){this.setOptions(options);this.options.fxProperties={transition:eval(this.options.tipfx),duration:this.options.duration};window.addEvent("tips.hideall",function(e,trigger){this.hideOthers(trigger)}.bind(this));if(elements){this.attach(elements)}},attach:function(a){this.elements=$$(a);this.elements.each(function(b){var d=JSON.decode(b.get("opts","{}").opts);d.defaultPos=d.position;delete (d.position);var e=Object.merge(Object.clone(this.options),d);if(e.content==="title"){e.content=b.get("title");b.erase("title")}if(typeOf(e.content)==="function"){var f=e.content(b);e.content=typeOf(f)==="null"?"":f.innerHTML}e.placement=this.options.placement;e.title=e.heading;if(!e.notice){e.title+='<button class="close" data-popover="'+b.id+'">&times;</button>'}jQuery(b).popover(e)}.bind(this))},addStartEvent:function(a,b){},addEndEvent:function(a,b){},getTipContent:function(a,b){},show:function(a,b){},hide:function(a,b){},hideOthers:function(a){},hideAll:function(){}});