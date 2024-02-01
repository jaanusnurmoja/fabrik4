/*! Fabrik */
define(["jquery","fab/element"],function(l,e){return window.FbPassword=new Class({Extends:e,options:{progressbar:!1},initialize:function(e,t){this.parent(e,t),this.options.editable&&this.ini()},ini:function(){this.element&&this.element.addEvent("keyup",function(e){this.passwordChanged(e)}.bind(this)),!0===this.options.ajax_validation&&this.getConfirmationField().addEvent("blur",function(e){this.callvalidation(e)}.bind(this)),""===this.getConfirmationField().get("value")&&(this.getConfirmationField().value=this.element.value),Fabrik.addEvent("fabrik.form.doelementfx",function(e,t,i,n){if(e===this.form&&i===this.strElement)switch(t){case"disable":l(this.getConfirmationField()).prop("disabled",!0);break;case"enable":l(this.getConfirmationField()).prop("disabled",!1);break;case"readonly":l(this.getConfirmationField()).prop("readonly",!0);break;case"notreadonly":l(this.getConfirmationField()).prop("readonly",!1)}}.bind(this))},callvalidation:function(e){this.form.doElementValidation(e,!1,"_check")},cloned:function(e){console.log("cloned"),this.parent(e),this.ini()},passwordChanged:function(){var e,t,i,n,a,o,s,r=this.getContainer().getElement(".strength");"null"!==typeOf(r)&&(e=new RegExp("^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$","g"),t=new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$","g"),i=new RegExp("(?=.{6,}).*","g"),n=this.element,a="",this.options.progressbar?(s="",o=e.test(n.value)?(s=Joomla.JText._("PLG_ELEMENT_PASSWORD_STRONG"),l(Fabrik.jLayouts["fabrik-progress-bar-strong"])):t.test(n.value)?(s=Joomla.JText._("PLG_ELEMENT_PASSWORD_MEDIUM"),l(Fabrik.jLayouts["fabrik-progress-bar-medium"])):i.test(n.value)?(s=Joomla.JText._("PLG_ELEMENT_PASSWORD_WEAK"),l(Fabrik.jLayouts["fabrik-progress-bar-weak"])):(s=Joomla.JText._("PLG_ELEMENT_PASSWORD_MORE_CHARACTERS"),l(Fabrik.jLayouts["fabrik-progress-bar-more"])),s={title:s},l(o).tooltip(s),l(r).replaceWith(o)):(a=!1===i.test(n.value)?"<span>"+Joomla.JText._("PLG_ELEMENT_PASSWORD_MORE_CHARACTERS")+"</span>":e.test(n.value)?'<span style="color:green">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_STRONG")+"</span>":t.test(n.value)?'<span style="color:orange">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_MEDIUM")+"</span>":'<span style="color:red">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_WEAK")+"</span>",r.set("html",a)))},getConfirmationField:function(){return this.getContainer().getElement("input[name*=check]")}}),window.FbPassword});