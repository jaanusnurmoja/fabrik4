define(["jquery","fab/element"],function(b,a){new Class({initialize:function(a,b){this.field=document.id(a),this.slider=b,this.field.addEvent("change",(function(a){this.update(a)}).bind(this))},destroy:function(){this.field.removeEvent("change",(function(a){this.update(a)}).bind(this))},update:function(a){if(!this.options.editable){this.element.set("html",a);return}this.slider.set(this.field.value.toInt())}}),window.ColourPicker=new Class({Extends:a,options:{red:0,green:0,blue:0,value:[0,0,0,1],showPicker:!0,swatchSizeWidth:"10px",swatchSizeHeight:"10px",swatchWidth:"160px"},initialize:function(b,a){this.setPlugin("colourpicker"),("null"===typeOf(a.value)||"undefined"===a.value[0])&&(a.value=[0,0,0,1]),this.parent(b,a),a.outputs=this.outputs,this.element=document.id(b),this.ini()},ini:function(){this.options.callback=(function(a,b){a=this.update(a),b!==this.grad&&this.grad&&this.grad.update(a)}).bind(this),this.widget=this.element.getParent(".fabrikSubElementContainer").getElement(".colourpicker-widget"),this.setOutputs(),new Drag.Move(this.widget,{handle:this.widget.getElement(".draggable")}),this.options.showPicker&&this.createSliders(this.strElement),this.swatch=new c(this.options.element,this.options,this),this.widget.getElement("#"+this.options.element+"-swatch").empty().adopt(this.swatch),b(this.widget).hide(),this.options.showPicker&&(this.grad=new d(this.options.element,this.options,this),this.widget.getElement("#"+this.options.element+"-picker").empty().adopt(this.grad.square)),this.update(this.options.value);var a=this.widget.getElement(".modal-header a");a&&a.addEvent("click",(function(a){a.stop(),b(this.widget).hide()}).bind(this))},cloned:function(d){this.parent(d);var a=this.element.getParent(".fabrikSubElementContainer").getElement(".colourpicker-widget"),e=a.getElements(".tab-pane"),c=a.getElements("a[data-bs-toggle=tab]");c.each(function(b){var c=b.get("href").split("-"),a=c[0].split("_");a[a.length-1]=d,a=a.join("_"),a+="-"+c[1],b.href=a}),e.each(function(b){var c=b.get("id").split("-"),a=c[0].split("_");a[a.length-1]=d,a=a.join("_"),a+="-"+c[1],b.id=a}),c.each(function(a){a.addEvent("click",function(c){c.stop(),b(a).tab("show")})}),this.ini()},setOutputs:function(a){this.outputs={},this.outputs.backgrounds=this.getContainer().getElements(".colourpicker_bgoutput"),this.outputs.foregrounds=this.getContainer().getElements(".colourpicker_output"),this.outputs.backgrounds.each((function(a){a.removeEvents("click"),a.addEvent("click",(function(a){this.toggleWidget(a)}).bind(this))}).bind(this)),this.outputs.foregrounds.each((function(a){a.removeEvents("click"),a.addEvent("click",(function(a){this.toggleWidget(a)}).bind(this))}).bind(this))},createSliders:function(a){this.sliderRefs=[],this.table=new Element("table"),this.tbody=new Element("tbody"),this.createColourSlideHTML(a,"red","Red:",this.options.red),this.createColourSlideHTML(a,"green","Green:",this.options.green),this.createColourSlideHTML(a,"blue","Blue:",this.options.blue),this.table.appendChild(this.tbody),this.widget.getElement(".sliders").empty().appendChild(this.table),Fabrik.addEvent("fabrik.colourpicker.slider",(function(a,b,c){this.sliderRefs.contains(a.element.id)&&(this.options.colour[b]=c,this.update(this.options.colour.red+","+this.options.colour.green+","+this.options.colour.blue))}).bind(this)),this.redField.addEvent("change",(function(a){this.updateFromField(a,"red")}).bind(this)),this.greenField.addEvent("change",(function(a){this.updateFromField(a,"green")}).bind(this)),this.blueField.addEvent("change",(function(a){this.updateFromField(a,"blue")}).bind(this))},createColourSlideHTML:function(c,a,d,e){var b=new Element("input.col-sm-2 input "+a+"SliderField",{type:"text",id:c+a+"redField",class:"form-control",size:"3",value:e}),f=[new Element("td").set("text",d),new Element("td").adopt(b)],g=new Element("tr").adopt(f);this.tbody.appendChild(g),this[a+"Field"]=b},updateAll:function(a,b,c){a=a?a.toInt():0,b=b?b.toInt():0,c=c?c.toInt():0,this.options.showPicker&&(this.redField.value=a,this.greenField.value=b,this.blueField.value=c),this.options.colour.red=a,this.options.colour.green=b,this.options.colour.blue=c,this.updateOutputs()},updateOutputs:function(){var a=new Color([this.options.colour.red,this.options.colour.green,this.options.colour.blue,1]);this.outputs.backgrounds.each(function(b){b.setStyle("background-color",a)}),this.outputs.foregrounds.each(function(b){b.setStyle("background-color",a)}),a.red?this.element.value=a.red+","+a.green+","+a.blue:this.element.value=a.rgb.join(",")},update:function(a){if(!1===this.options.editable){this.element.set("html",a);return}return"null"===typeOf(a)?a=[0,0,0]:"string"===typeOf(a)&&(a=a.split(",")),this.updateAll(a[0],a[1],a[2]),a},updateFromField:function(b,c){var a=Math.min(255,b.target.value.toInt());b.target.value=a,isNaN(a)||(this.options.colour[c]=a,this.options.callback(this.options.colour.red+","+this.options.colour.green+","+this.options.colour.blue))},toggleWidget:function(a){a.stop(),this.widget.toggle()}});var c=new Class({Extends:Options,options:{},initialize:function(a,b){return this.element=document.id(a),this.setOptions(b),this.callback=this.options.callback,this.outputs=this.options.outputs,this.redField=null,this.widget=new Element("div"),this.colourNameOutput=new Element("span",{stlye:"padding:3px"}).inject(this.widget),this.createColourSwatch(a),this.widget},createColourSwatch:function(e){for(var c,b=new Element("div",{styles:{float:"left","margin-left":"5px",class:"swatchBackground"}}),a=0;a<this.options.swatch.length;a++){var d=new Element("div",{styles:{width:this.options.swatchWidth}});c=0,$H(this.options.swatch[a]).each((function(b,f){var g=e+"swatch-"+a+"-"+c;d.adopt(new Element("div",{id:g,styles:{float:"left",width:this.options.swatchSizeWidth,cursor:"crosshair",height:this.options.swatchSizeHeight,"background-color":"rgb("+f+")"},class:b,events:{click:(function(a){this.updateFromSwatch(a)}).bind(this),mouseenter:(function(a){this.showColourName(a)}).bind(this),mouseleave:(function(a){this.clearColourName(a)}).bind(this)}})),c++}).bind(this)),b.adopt(d)}this.widget.adopt(b)},updateFromSwatch:function(b){b.stop();var a=new Color(b.target.getStyle("background-color"));this.options.colour.red=a[0],this.options.colour.green=a[1],this.options.colour.blue=a[2],this.showColourName(b),this.callback(a,this)},showColourName:function(a){this.colourName=a.target.className,this.colourNameOutput.set("text",this.colourName)},clearColourName:function(a){this.colourNameOutput.set("text","")}}),d=new Class({Extends:Options,options:{size:125},initialize:function(a,b){this.brightness=0,this.saturation=0,this.setOptions(b),this.callback=this.options.callback,this.container=document.id(a),"null"!==typeOf(this.container)&&(this.offset=0,this.margin=10,this.borderColour="rgba(155, 155, 155, 0.6)",this.hueWidth=40,this.colour=new Color(this.options.value),this.square=new Element("canvas",{width:this.options.size+65+"px",height:this.options.size+"px"}),this.square.inject(this.container),this.square.addEvent("click",(function(a){this.doIt(a)}).bind(this)),this.down=!1,this.square.addEvent("mousedown",(function(a){this.down=!0}).bind(this)),this.square.addEvent("mouseup",(function(a){this.down=!1}).bind(this)),document.addEvent("mousemove",(function(a){this.down&&this.doIt(a)}).bind(this)),this.drawCircle(),this.drawHue(),this.arrow=this.drawArrow(),this.positionCircle(this.options.size,0),this.update(this.options.value))},doIt:function(c){var d={x:0,y:0,w:this.options.size,h:this.options.size},e=this.square.getPosition(),a=c.page.x-e.x,b=c.page.y-e.y;a<d.w&&b<d.h?this.setColourFromSquareSelection(a,b):a>this.options.size+this.margin&&a<=this.options.size+this.hueWidth&&this.setHueFromSelection(a,b)},update:function(b){var a=new Color(b);this.brightness=a.hsb[2],this.saturation=a.hsb[1],this.colour=this.colour.setHue(a.hsb[0]),this.colour=this.colour.setSaturation(100),this.colour=this.colour.setBrightness(100),this.render(),this.positionCircleFromColour(a)},positionCircleFromColour:function(a){this.saturarion=a.hsb[1],this.brightness=a.hsb[2];var b=Math.floor(this.options.size*(this.saturarion/100)),c=Math.floor(this.options.size-this.options.size*(this.brightness/100));this.positionCircle(b,c)},drawCircle:function(){this.circle=new Element("canvas",{width:"10px",height:"10px"});var a=this.circle.getContext("2d");a.lineWidth=1,a.beginPath();var b=this.circle.width/2,c=this.circle.width/2;a.arc(b,c,4.5,0,2*Math.PI,!0),a.strokeStyle="#000",a.stroke(),a.beginPath(),a.arc(b,c,3.5,0,2*Math.PI,!0),a.strokeStyle="#FFF",a.stroke()},setHueFromSelection:function(c,a){a=Math.min(1,a/this.options.size),a=Math.max(0,a),this.colour=this.colour.setHue(360-360*a),this.render(),this.positionCircle();var b=this.colour;b=(b=b.setBrightness(this.brightness)).setSaturation(this.saturation),this.callback(b,this)},setColourFromSquareSelection:function(c,d){var e=this.square.getContext("2d");this.positionCircle(c,d);var a=e.getImageData(c,d,1,1).data,b=new Color([a[0],a[1],a[2]]);this.brightness=b.hsb[2],this.saturation=b.hsb[1],this.callback(b,this)},positionCircle:function(a,b){a=a||this.circleX,this.circleX=a,b=b||this.circleY,this.circleY=b,this.render();var d=this.square.getContext("2d"),c=this.offset-5;a=Math.max(-5,Math.round(a)+c),b=Math.max(-5,Math.round(b)+c),d.drawImage(this.circle,a,b)},drawHue:function(){var b=this.square.getContext("2d"),c=this.options.size+this.margin+this.offset,a=b.createLinearGradient(0,0,0,this.options.size+this.offset);a.addColorStop(0,"rgba(255, 0, 0, 1)"),a.addColorStop(5/6,"rgba(255, 255, 0, 1)"),a.addColorStop(4/6,"rgba(0, 255, 0, 1)"),a.addColorStop(.5,"rgba(0, 255, 255, 1)"),a.addColorStop(2/6,"rgba(0, 0, 255, 1)"),a.addColorStop(1/6,"rgba(255, 0, 255, 1)"),a.addColorStop(1,"rgba(255, 0, 0, 1)"),b.fillStyle=a,b.fillRect(c,this.offset,this.hueWidth-10,this.options.size),b.strokeStyle=this.borderColour,b.strokeRect(c+.5,this.offset+.5,this.hueWidth-11,this.options.size-1)},render:function(){var b=this.square.getContext("2d"),a=this.offset;b.clearRect(0,0,this.square.width,this.square.height);var c=this.options.size;b.fillStyle=this.colour.hex,b.fillRect(a,a,c,c);var d=b.createLinearGradient(a,a,c+a,0);d.addColorStop(0,"rgba(255, 255, 255, 1)"),d.addColorStop(1,"rgba(255, 255, 255, 0)"),b.fillStyle=d,b.fillRect(a,a,c,c),(d=b.createLinearGradient(0,a,0,c+a)).addColorStop(0,"rgba(0, 0, 0, 0)"),d.addColorStop(1,"rgba(0, 0, 0, 1)"),b.fillStyle=d,b.fillRect(a,a,c,c),b.strokeStyle=this.borderColour,b.strokeRect(a+.5,a+.5,c-1,c-1),this.drawHue();var e=(360-this.colour.hsb[0])/362*this.options.size-2,f=c+this.hueWidth+a+2;b.drawImage(this.arrow,f,Math.max(0,Math.round(e)+a-1))},drawArrow:function(){var b=new Element("canvas"),a=b.getContext("2d");b.width=16,b.height=16;for(var c=0;c<20;c++)a.beginPath(),a.fillStyle="#000",a.moveTo(0,4),a.lineTo(4,0),a.lineTo(4,8),a.fill();return a.translate(-5.333333333333333,-16),b}});return window.ColourPicker})