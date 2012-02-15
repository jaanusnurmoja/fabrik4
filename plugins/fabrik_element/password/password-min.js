var FbPassword=new Class({Extends:FbElement,initialize:function(b,a){this.parent(b,a);if(!this.options.editable){return}if(this.element){this.element.addEvent("keyup",this.passwordChanged.bindWithEvent(this))}if(this.options.ajax_validation===true){this.getConfirmationField().addEvent("blur",this.callvalidation.bindWithEvent(this))}if(this.getConfirmationField().get("value")===""){this.getConfirmationField().value=this.element.value}},callvalidation:function(a){this.form.doElementValidation(a,false,"_check")},passwordChanged:function(){var e=this.element.getParent().getElement(".strength");if(typeOf(e)==="null"){return}var d=new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$","g");var b=new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$","g");var a=new RegExp("(?=.{6,}).*","g");var c=this.element;if(false===a.test(c.value)){e.set("text",Joomla.JText._("PLG_ELEMENT_PASSWORD_MORE_CHARACTERS"))}else{if(d.test(c.value)){e.set("html",'<span style="color:green">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_STRONG")+"</span>")}else{if(b.test(c.value)){e.set("html",'<span style="color:orange">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_MEDIUM")+"</span>")}else{e.set("html",'<span style="color:red">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_WEAK")+"</span>")}}}},getConfirmationField:function(){var a=this.element.name+"_check";return this.element.getParent(".fabrikElement").getElement("input[name="+a+"]")}});