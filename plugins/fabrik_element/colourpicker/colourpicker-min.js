var SliderField=new Class({initialize:function(b,a){this.field=document.id(b);this.slider=a;this.field.addEvent("change",function(c){this.update(c)}.bind(this))},destroy:function(){this.field.removeEvent("change",function(a){this.update(a)}.bind(this))},update:function(){if(!this.options.editable){this.element.set("html",val);return}this.slider.set(this.field.value.toInt())}});var ColourPicker=new Class({Extends:FbElement,options:{red:0,green:0,blue:0},initialize:function(g,k){this.plugin="colourpicker";this.parent(g,k);this.element=document.id(g);this.widget=this.element.getParent(".fabrikSubElementContainer").getElement(".colourpicker-widget");this.setOutputs();this.redField=null;this.showSwatch=true;this.showCloseButton=true;this.showCloseIcon=true;this.table=new Element("table",{styles:{"float":"right","margin-right":"2px"}});this.tbody=new Element("tbody");var f=["red","green","blue"];if(this.showCloseIcon){var c=this.createCloseIcon(g);this.widget.appendChild(c)}else{new Element("div",{"class":"handle",styles:{width:"375px","text-align":"right",clear:"both"}}).inject(this.widget)}if(this.showSwatch){this.createColourSwatch(g)}this.createColourSlideHTML(g,"red","Red:",this.options.red);this.createColourSlideHTML(g,"green","Green:",this.options.green);this.createColourSlideHTML(g,"blue","Blue:",this.options.blue);this.table.appendChild(this.tbody);this.widget.appendChild(this.table);this.sliderRefs=[];for(var h=0;h<f.length;h++){var e=f[h];var a={steps:255,color:e,max:255,offset:1,onChange:function(d){Fabrik.fireEvent("fabrik.colourpicker.slider",[this,this.options.color,d])}};this.sliderRefs.push(g+e+"track");this[e+"Slider"]=new Slider(document.id(g+e+"track"),document.id(g+e+"handle"),a)}Fabrik.addEvent("fabrik.colourpicker.slider",function(i,d,l){if(this.sliderRefs.contains(i.element.id)){this.options.colour[d]=l;this.update(this.options.colour.red+","+this.options.colour.green+","+this.options.colour.blue)}}.bind(this));this.widget.hide();this.redField.addEvent("change",function(d){this.updateFromField(d,"red")}.bind(this));this.greenField.addEvent("change",function(d){this.updateFromField(d,"green")}.bind(this));this.blueField.addEvent("change",function(d){this.updateFromFiel(d,"blue")}.bind(this));if(this.showCloseButton){var b=this.createCloseButton(g,"Close");this.widget.appendChild(b)}var j=new Drag.Move(this.widget,{handle:this.widget.getElement(".handle")});this.update(this.options.value)},createColourSwatch:function(e){var b;var f=new Element("div",{styles:{"float":"left","margin-left":"5px","class":"swatchBackground"}});for(var d=0;d<this.options.swatch.length;d++){var c=new Element("div",{styles:{width:"160px"}});var a=this.options.swatch[d];b=0;$H(a).each(function(i,h){var g=e+"swatch-"+d+"-"+b;c.adopt(new Element("div",{id:g,styles:{"float":"left",width:"10px",cursor:"crosshair",height:"10px","background-color":"rgb("+h+")"},"class":i,events:{click:function(j){this.updateFromSwatch(j)},mouseenter:function(j){this.showColourName()},mouseleave:function(j){this.clearColourName(j)}}}));b++}.bind(this));f.adopt(c)}this.widget.adopt(f)},updateFromSwatch:function(a){a.stop();var b=new Color(a.target.getStyle("background-color"));this.options.colour.red=b.red;this.options.colour.green=b.green;this.options.colour.blue=b.blue;this.showColourName(a);this.updateAll(this.options.colour.red,this.options.colour.green,this.options.colour.blue)},showColourName:function(a){this.colourName=a.target.className;a.target.getParent(".colourpicker-widget").getElement(".colourName").set("text",this.colourName)},clearColourName:function(a){a.target.getParent(".colourpicker-widget").getElement(".colourName").set("text","")},updateOutputs:function(){var a=new Color([this.options.colour.red,this.options.colour.green,this.options.colour.blue]);this.outputs.backgrounds.each(function(b){b.setStyle("background-color",a)});this.outputs.foregrounds.each(function(b){b.setStyle("background-color",a)});this.element.value=a.red+","+a.green+","+a.blue},update:function(a){if(this.options.editable===false){this.element.set("html",a);return}if(typeOf(a)==="null"){a=[0,0,0]}else{a=a.split(",")}this.updateAll(a[0],a[1],a[2])},updateAll:function(c,b,a){c=c?c.toInt():0;b=b?b.toInt():0;a=a?a.toInt():0;this.redSlider.set(c);this.redField.value=c;this.options.colour.red=c;this.greenSlider.set(b);this.greenField.value=b;this.options.colour.green=b;this.blueSlider.set(a);this.blueField.value=a;this.options.colour.blue=a;this.updateOutputs()},setOutputs:function(a){this.outputs={};this.outputs.backgrounds=this.getContainer().getElements(".colourpicker_bgoutput");this.outputs.foregrounds=this.getContainer().getElements(".colourpicker_output");this.outputs.backgrounds.each(function(b){b.addEvent("click",function(c){this.toggleWidget(c)}.bind(this))}.bind(this));this.outputs.foregrounds.each(function(b){b.addEvent("click",function(c){this.toggleWidget(c)}.bind(this))}.bind(this))},toggleWidget:function(a){a.stop();this.widget.toggle()},updateFromField:function(a,b){var c=a.target.value.toInt();if(isNaN(c)){c=0}else{this.options.colour[b]=c;this.update(this.options.colour.red+","+this.options.colour.green+","+this.options.colour.blue)}},createCloseButton:function(c,a){var d=new Element("div",{styles:{width:"375px","text-align":"right",clear:"right"}});d.adopt(new Element("span",{"class":"colourName",styles:{"padding-right":"20px"}}));c=document.id(c);var b=new Element("input",{"class":"button",value:a,type:"button",events:{click:function(){this.widget.toggle()}.bind(this)}});d.appendChild(b);return d},createCloseIcon:function(a){var b=new Element("div",{"class":"handle",styles:{margin:"0 0 10px 0","background-color":"#333333",cursor:"move","text-align":"right",clear:"both",height:"13px"}}).adopt(new Element("img",{src:this.options.closeImage,styles:{"float":"right",cursor:"pointer"},events:{click:function(c){c.target.getParent().parentNode.hide();c.stop()}}}));return b},createColourSlideHTML:function(c,g,b,e){var d=new Element("div",{id:c+g+"track",styles:{height:"5px",width:"123px",background:'url("'+this.options.trackImage+'") repeat-x scroll center center transparent'}});var f=new Element("div",{id:c+g+"handle",styles:{width:"11px",height:"21px",top:"-15px"}}).adopt(new Element("img",{src:this.options.handleImage}));var h=new Element("input",{type:"text",id:c+g+"redField",size:"3","class":"input "+g+"SliderField",value:e});var a=new Element("tr").adopt([new Element("td").appendText(b),new Element("td").adopt([d.adopt(f)]),new Element("td").adopt(h)]);this.tbody.appendChild(a);this[g+"Field"]=h}});