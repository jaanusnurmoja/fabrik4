var FbSlider=new Class({Extends:FbElement,initialize:function(e,d){this.parent(e,d);this.plugin="slider";if(typeOf(this.options.value)==="null"){this.options.value=0}this.options.value=this.options.value.toInt();var c=this.options.value;if(this.options.editable===true){if(typeOf(this.element)==="null"){fconsole("no element found for slider");return}var b=this.element.getElement(".fabrikinput");var f=this.element.getElement(".slider_output");this.mySlide=new Slider(this.element.getElement(".fabrikslider-line"),this.element.getElement(".knob"),{onChange:function(g){b.value=g;this.options.value=g;f.set("text",g);this.callChange()}.bind(this),onComplete:function(g){b.fireEvent("blur",new Event.Mock(b,"change"))},steps:this.options.steps}).set(c);this.mySlide.set(this.options.value);b.value=this.options.value;f.set("text",this.options.value);var a=this.element.getElement(".clearslider");if(typeOf(a)!=="null"){a.addEvent("click",function(g){this.mySlide.set(0);b.value="";b.fireEvent("blur",new Event.Mock(b,"change"));f.set("text","");g.stop()})}}},getValue:function(){return this.options.value},callChange:function(){typeOf(this.changejs)==="function"?this.changejs.delay(0):eval(this.changejs)},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b);return}if(a==="change"){this.changejs=b}}});