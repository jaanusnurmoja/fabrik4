var FloatingTips=new Class({Implements:[Options,Events],options:{fxProperties:{transition:Fx.Transitions.linear,duration:500},position:"top",showOn:"mouseenter",hideOn:"mouseleave",content:"title",distance:50,tipfx:" Fx.Transitions.linear",duration:500,fadein:false,showFn:function(a){a.stop();return true},hideFn:function(a){a.stop();return true}},initialize:function(elements,options){this.elements=$$(elements);this.setOptions(options);this.options.fxProperties={transition:eval(this.options.tipfx),duration:this.options.duration};window.addEvent("tips.hideall",function(e,trigger){this.hideOthers(trigger)}.bind(this));this.attach()},attach:function(){this.elements.each(function(c){var a=Object.merge(Object.clone(this.options),JSON.decode(c.get("opts","{}").opts));var k=c.retrieve("opts",{});if(!k[a.showOn]){k[a.showOn]=a;c.store("opts",k);var h=this.getTipContent(c,a.showOn);var f=new Element("div.floating-tip.tip"+a.position);var i=new Element("div.floating-tip-wrapper");if(typeOf(h)==="string"){f.set("html",h)}else{f.adopt(h)}i.adopt(f);i.inject(document.body).hide();i.addEvent("mouseleave",function(m){if(a.hideOn==="mouseleave"){i.hide()}}.bind(this));var j=c.retrieve("tip",{});j[a.showOn]=i;c.store("tip",j);var b={onComplete:function(m){if(this.hideMe){this.tip.hide()}},onStart:function(m){this.hideMe=false}};var d=Object.merge(b,Object.clone(this.options.fxProperties));var e=new Fx.Morph(i,d);e.tip=i;var g=c.retrieve("fx",{});g[a.showOn]=e;c.store("fxs",g);this.addStartEvent(c,a.showOn);this.addEndEvent(c,a.showOn)}}.bind(this))},addStartEvent:function(a,c){var b=a.retrieve("opts");b=b[c];a.addEvent(b.showOn,function(f){if(b.showOn==="click"){window.fireEvent("tips.hideall",[a]);var d=a.retrieve("active",false);var g=d?false:true;a.store("active",g);if(d){return}}if(b.showFn(f)){this.show(a,c)}}.bind(this))},addEndEvent:function(a,c){var b=a.retrieve("opts");b=b[c];a.addEvent(b.hideOn,function(g){var d=a.retrieve("tip");var f=d[b.showOn];if(b.hideFn(g)){this.hide(a,c)}}.bind(this))},getTipContent:function(a,f){var e;var d=a.retrieve("opts");d=d[f];var b=d.content;switch(typeOf(b)){case"string":e=a.get(b);a.set(b,"");break;case"element":e=b;break;default:e=b(a);break}return e},show:function(c,p){var h=c.retrieve("tip");var a=c.retrieve("opts");a=a[p];var k=h[a.showOn];if(k.getStyle("opacity")===1&&k.getStyle("display")!=="none"&&typeOf(k.getParent())!=="null"){return}k.setStyle("opacity",0);k.show();var n=a.distance;switch(a.position){case"top":var j=k.getStyle("border-top").toInt()+k.getStyle("border-bottom").toInt();var d={x:0,y:-1*n-j*2};edge="top";break;case"bottom":edge="top";j=k.getStyle("border-top").toInt()+k.getStyle("border-bottom").toInt();d={x:0,y:n+j};break;case"right":j=k.getStyle("border-left").toInt()+k.getStyle("border-right").toInt();d={x:n+j,y:0};edge="left";break;case"left":j=k.getStyle("border-left").toInt()+k.getStyle("border-right").toInt();d={x:-1*n-j,y:0};edge="right";break}var i={relativeTo:c,position:a.position,edge:edge,offset:d};k.position(i);if(!this.options.fadein){k.setStyle("opacity",1)}var m=this.options.fadein?{opacity:[0,1]}:{};var g=k.getCoordinates();var f=c.getCoordinates();switch(a.position){case"top":var o=k.getStyle("top").toInt()-k.getStyle("height").toInt();m.top=[o,o+n];break;case"bottom":o=k.getStyle("top").toInt();m.top=[o,o-n];break;case"right":l=k.getStyle("left").toInt();m.left=[l,l-n];break;case"left":l=k.getStyle("left").toInt();m.left=[l,l+n];break}var e=c.retrieve("fxs");var b=e[a.showOn];if(!b.isRunning()){b.start(m)}},hide:function(c,g){var e=c.retrieve("opts");e=e[g];var a=c.retrieve("tip");var f=a[e.showOn];var b=c.retrieve("fxs");var d=b[e.showOn];this.hideOthers(c);if(d.isRunning()){return}d.hideMe=true;f.hide();c.store("active",false)},hideOthers:function(a){this.elements.each(function(c){if(c!==a){var b=c.retrieve("tip");$H(b).each(function(d){d.hide()})}})},hideAll:function(){this.elements.each(function(b){var a=b.retrieve("tip");$H(a).each(function(c){c.hide()})})}});