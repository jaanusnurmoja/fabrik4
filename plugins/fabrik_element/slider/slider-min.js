/*! Fabrik */

define(["jquery","fab/element"],function(jQuery,FbElement){return window.FbSlider=new Class({Extends:FbElement,initialize:function(t,e){this.setPlugin("slider"),this.parent(t,e),this.makeSlider()},makeSlider:function(){var t=!1;"null"!==typeOf(this.options.value)&&""!==this.options.value||(t=!(this.options.value="")),this.options.value=""===this.options.value?"":this.options.value.toInt();var e=this.options.value;if(!0===this.options.editable){if("null"===typeOf(this.element))return void fconsole("no element found for slider");this.output=this.element.getElement(".fabrikinput"),this.output2=this.element.getElement(".slider_output"),this.output.value=this.options.value,this.output2.set("text",this.options.value),this.mySlide=new Slider(this.element.getElement(".fabrikslider-line"),this.element.getElement(".knob"),{onChange:function(t){this.output.value=t,this.options.value=t,this.output2.set("text",t),this.output.fireEvent("blur",new Event.Mock(this.output,"blur")),this.callChange()}.bind(this),onComplete:function(t){this.output.fireEvent("blur",new Event.Mock(this.output,"change")),this.element.fireEvent("change",new Event.Mock(this.element,"change"))}.bind(this),steps:this.options.steps}).set(e),t&&(this.output.value="",this.output2.set("text",""),this.options.value=""),this.watchClear()}},watchClear:function(){this.element.addEvent("click:relay(.clearslider)",function(t,e){t.preventDefault(),this.mySlide.set(0),this.output.value="",this.output.fireEvent("blur",new Event.Mock(this.output,"change")),this.output2.set("text","")}.bind(this))},getValue:function(){return this.options.value},callChange:function(){"function"===typeOf(this.changejs)?this.changejs.delay(0):eval(this.changejs)},addNewEvent:function(t,e){if("load"===t)return this.loadEvents.push(e),void this.runLoadEvent(e);"change"===t&&(this.changejs=e)},cloned:function(t){delete this.mySlide,this.makeSlider(),this.parent(t)}}),window.FbSlider});