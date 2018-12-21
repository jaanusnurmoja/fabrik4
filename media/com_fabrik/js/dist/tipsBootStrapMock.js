/*! Fabrik */

define(["jquery","fab/fabrik"],function(jQuery,Fabrik){var FloatingTips=new Class({Implements:[Events],Binds:[],options:{fxProperties:{transition:Fx.Transitions.linear,duration:500},position:"top",trigger:"hover",content:"title",distance:50,tipfx:"Fx.Transitions.linear",heading:"",duration:500,fadein:!1,notice:!1,html:!0,showFn:function(t){return t.stop(),!0},hideFn:function(t){return t.stop(),!0},placement:function(t,e){Fabrik.fireEvent("bootstrap.tips.place",[t,e]);var o=0!==Fabrik.eventResults.length&&Fabrik.eventResults[0];if(!1!==o)return o;var i=JSON.parse(e.get("opts","{}").opts);return i&&i.position?i.position:"top"}},initialize:function(elements,options){3<=Fabrik.bootstrapVersion("modal")||"object"==typeof Materialize||(this.options=jQuery.extend(this.options,options),this.options.fxProperties={transition:eval(this.options.tipfx),duration:this.options.duration},window.addEvent("tips.hideall",function(t,e){this.hideOthers(e)}.bind(this)),elements&&this.attach(elements))},attach:function(t){if(3<=Fabrik.bootstrapVersion("modal")||"object"==typeof Materialize)return this.elements=document.getElements(t),void this.elements.each(function(t){jQuery(t).popover({html:!0})});var i;this.elements=jQuery(t);var n=this;this.elements.each(function(){try{var t=JSON.parse(jQuery(this).attr("opts"));i="object"===jQuery.type(t)?t:{}}catch(t){i={}}i.position&&(i.defaultPos=i.position,delete i.position);var e=jQuery.extend({},n.options,i);if("title"===e.content)e.content=jQuery(this).prop("title"),jQuery(this).removeAttr("title");else if("function"===jQuery.type(e.content)){var o=e.content(this);e.content=null===o?"":o.innerHTML}if(e.placement=n.options.placement,e.title=e.heading,jQuery(this).hasClass("tip-small"))e.title=e.content,jQuery(this).tooltip(e);else{e.notice||(e.title+='<button class="close" data-popover="'+this.id+'">&times;</button>');try{jQuery(this).popoverex(e)}catch(t){console.log("failed to apply popoverex tips")}}})},addStartEvent:function(t,e){},addEndEvent:function(t,e){},getTipContent:function(t,e){},show:function(t,e){},hide:function(t,e){},hideOthers:function(t){},hideAll:function(){jQuery(".popover").remove()}}),C,D;return C=jQuery,D=function(t,e){this.init("popover",t,e)},void 0!==C.fn.popover?(D.prototype=C.extend({},C.fn.popover.Constructor.prototype,{constructor:D,tip:function(){return this.$tip||(this.$tip=C(this.options.template),this.options.modifier&&this.$tip.addClass(this.options.modifier)),this.$tip},show:function(){var t,e,o,i,n,s,r;if(this.hasContent()&&this.enabled){t=this.tip(),this.setContent(),this.options.animation&&t.addClass("fade");var p=this.options.placement;switch(s="function"==typeof p?p.call(this,t[0],this.$element[0]):p,e=/in/.test(s),t.remove().css({top:0,left:0,display:"block"}).appendTo(e?this.$element:document.body),o=this.getPosition(e),i=t[0].offsetWidth,n=t[0].offsetHeight,e?s.split(" ")[1]:s){case"bottom":r={top:o.top+o.height,left:o.left+o.width/2-i/2};break;case"bottom-left":r={top:o.top+o.height,left:o.left},s="bottom";break;case"bottom-right":r={top:o.top+o.height,left:o.left+o.width-i},s="bottom";break;case"top":r={top:o.top-n,left:o.left+o.width/2-i/2};break;case"top-left":r={top:o.top-n,left:o.left},s="top";break;case"top-right":r={top:o.top-n,left:o.left+o.width-i},s="top";break;case"left":r={top:o.top+o.height/2-n/2,left:o.left-i};break;case"right":r={top:o.top+o.height/2-n/2,left:o.left+o.width}}t.css(r).addClass(s).addClass("in")}}}),C.fn.popoverex=function(i){return this.each(function(){var t=C(this),e=t.data("popover"),o="object"==typeof i&&i;e||t.data("popover",e=new D(this,o)),"string"==typeof i&&e[i]()})}):console.log("Fabrik: cant load PopoverEx as jQuery popover not found - could be the J template has overwritten jQuery (and yes Im looking at your Warp themes!)"),FloatingTips});