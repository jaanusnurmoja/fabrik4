window.FbRadio=new Class({Extends:FbElementList,options:{btnGroup:true},type:"radio",initialize:function(b,a){this.plugin="fabrikradiobutton";this.parent(b,a);this.btnGroup()},btnGroup:function(){if(!this.options.btnGroup){return}this.btnGroupRelay();var a=this.getContainer();if(!a){return}a.getElements(".radio.btn-group label").addClass("btn");a.getElements(".btn-group input[checked=checked]").each(function(b){var c=b.getParent("label");v=b.get("value");if(v===""){c.addClass("active btn-primary")}else{if(v==="0"){c.addClass("active btn-danger")}else{c.addClass("active btn-success")}}})},btnGroupRelay:function(){var a=this.getContainer();if(!a){return}a.getElements(".radio.btn-group label").addClass("btn");a.addEvent("mouseup:relay(.btn-group label)",function(d,c){var f=c.get("for"),b;if(f!==""){b=document.id(f)}if(typeOf(b)==="null"){b=c.getElement("input")}this.setButtonGroupCSS(b)}.bind(this))},setButtonGroupCSS:function(b){var c;if(b.id!==""){c=document.getElement("label[for="+b.id+"]")}if(typeOf(c)==="null"){c=b.getParent("label.btn")}var a=b.get("value");if(!b.get("checked")){c.getParent(".btn-group").getElements("label").removeClass("active").removeClass("btn-success").removeClass("btn-danger").removeClass("btn-primary");if(a===""){c.addClass("active btn-primary")}else{if(a.toInt()===0){c.addClass("active btn-danger")}else{c.addClass("active btn-success")}}b.set("checked",true)}},watchAddToggle:function(){var h=this.getContainer();var f=h.getElement("div.addoption");var b=h.getElement(".toggle-addoption");if(this.mySlider){var g=f.clone();var e=h.getElement(".fabrikElement");f.getParent().destroy();e.adopt(g);f=h.getElement("div.addoption");f.setStyle("margin",0)}this.mySlider=new Fx.Slide(f,{duration:500});this.mySlider.hide();b.addEvent("click",function(a){a.stop();this.mySlider.toggle()}.bind(this))},getValue:function(){if(!this.options.editable){return this.options.value}var a="";this._getSubElements().each(function(b){if(b.checked){a=b.get("value");return a}return null});return a},setValue:function(a){if(!this.options.editable){return}this._getSubElements().each(function(b){if(b.value===a){b.checked="checked"}})},update:function(b){if(!this.options.editable){if(b===""){this.element.innerHTML="";return}this.element.innerHTML=$H(this.options.data).get(b);return}else{var a=this._getSubElements();if(typeOf(b)==="array"){a.each(function(c){if(b.contains(c.value)){this.setButtonGroupCSS(c)}}.bind(this))}else{a.each(function(c){if(c.value===b){this.setButtonGroupCSS(c)}}.bind(this))}}},cloned:function(a){if(this.options.allowadd===true&&this.options.editable!==false){this.watchAddToggle();this.watchAdd()}this.parent(a)}});