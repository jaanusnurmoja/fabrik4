var FbCheckBox=new Class({Extends:FbElementList,initialize:function(b,a){this.plugin="fabrikcheckbox";this.parent(b,a);this._getSubElements();this.watchAdd()},watchAddToggle:function(){var h=this.getContainer();var f=h.getElement("div.addoption");var b=h.getElement(".toggle-addoption");if(this.mySlider){var g=f.clone();var e=h.getElement(".fabrikElement");f.getParent().destroy();e.adopt(g);f=h.getElement("div.addoption");f.setStyle("margin",0)}this.mySlider=new Fx.Slide(f,{duration:500});this.mySlider.hide();b.addEvent("click",function(a){a.stop();this.mySlider.toggle()}.bind(this))},getValue:function(){if(!this.options.editable){return this.options.value}var a=[];if(!this.options.editable){return this.options.value}this._getSubElements().each(function(b){if(b.checked){a.push(b.get("value"))}});return a},numChecked:function(){return this._getSubElements().filter(function(a){return a.checked}).length},update:function(b){this.getElement();if(typeOf(b)==="string"){b=b===""?[]:JSON.decode(b)}if(!this.options.editable){this.element.innerHTML="";if(b===""){return}var a=$H(this.options.data);b.each(function(c){this.element.innerHTML+=a.get(c)+"<br />"}.bind(this));return}this._getSubElements();this.subElements.each(function(c){var d=false;b.each(function(e){if(e===c.value){d=true}}.bind(this));c.checked=d}.bind(this))},cloned:function(){if(this.options.allowadd===true&&this.options.editable!==false){this.watchAddToggle();this.watchAdd()}}});