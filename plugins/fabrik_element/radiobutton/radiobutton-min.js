/*! Fabrik */
define(["jquery","fab/elementlist"],function(a,b){return window.FbRadio=new Class({Extends:b,options:{btnGroup:!0},type:"radio",initialize:function(a,b){this.setPlugin("fabrikradiobutton"),this.parent(a,b),this.btnGroup()},btnGroup:function(){if(this.options.btnGroup){this.btnGroupRelay();var a=this.getContainer();a&&(a.getElements(".radio.btn-group label").addClass("btn"),a.getElements(".btn-group input[checked=checked]").each(function(a){var b,c=a.getParent("label");"null"===typeOf(c)&&(c=a.getNext()),b=a.get("value"),c.addClass(""===b?"active btn-primary":"0"===b?"active btn-danger":"active btn-success")}))}},btnGroupRelay:function(){var a=this.getContainer();a&&(a.getElements(".radio.btn-group label").addClass("btn"),a.addEvent("click:relay(.btn-group label)",function(a,b){var c,d=b.get("for");""!==d&&(c=document.id(d)),"null"===typeOf(c)&&(c=b.getElement("input")),this.setButtonGroupCSS(c)}.bind(this)))},setButtonGroupCSS:function(a){var b;""!==a.id&&(b=document.getElement("label[for="+a.id+"]")),"null"===typeOf(b)&&(b=a.getParent("label.btn"));var c=a.get("value"),d=parseInt(a.get("fabchecked"),10);a.get("checked")&&1!==d||(b&&(b.getParent(".btn-group").getElements("label").removeClass("active").removeClass("btn-success").removeClass("btn-danger").removeClass("btn-primary"),b.addClass(""===c?"active btn-primary":0===c.toInt()?"active btn-danger":"active btn-success")),a.set("checked",!0),"null"===typeOf(d)&&a.set("fabchecked",1))},watchAddToggle:function(){var a=this.getContainer(),b=a.getElement("div.addoption"),c=a.getElement(".toggle-addoption");if(this.mySlider){var d=b.clone(),e=a.getElement(".fabrikElement");b.getParent().destroy(),e.adopt(d),b=a.getElement("div.addoption"),b.setStyle("margin",0)}this.mySlider=new Fx.Slide(b,{duration:500}),this.mySlider.hide(),c.addEvent("click",function(a){a.stop(),this.mySlider.toggle()}.bind(this))},getValue:function(){if(!this.options.editable)return this.options.value;var a="";return this._getSubElements().each(function(b){return b.checked?a=b.get("value"):null}),a},setValue:function(a){this.options.editable&&this._getSubElements().each(function(b){b.value===a&&(b.checked="checked")})},update:function(a){if(!this.options.editable)return""===a?void(this.element.innerHTML=""):void(this.element.innerHTML=$H(this.options.data).get(a));var b=this._getSubElements();b.each("array"===typeOf(a)?function(b){a.contains(b.value)&&this.setButtonGroupCSS(b)}.bind(this):function(b){b.value===a&&this.setButtonGroupCSS(b)}.bind(this))},cloned:function(a){this.options.allowadd===!0&&this.options.editable!==!1&&(this.watchAddToggle(),this.watchAdd()),this.parent(a),this.btnGroup()},getChangeEvent:function(){return this.options.changeEvent}}),window.FbRadio});