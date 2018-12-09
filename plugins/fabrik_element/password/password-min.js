/*! Fabrik */

define(["jquery","fab/element"],function(d,e){return window.FbPassword=new Class({Extends:e,options:{progressbar:!1},initialize:function(e,t){this.parent(e,t),this.options.editable&&this.ini()},ini:function(){this.element&&this.element.addEvent("keyup",function(e){this.passwordChanged(e)}.bind(this)),!0===this.options.ajax_validation&&this.getConfirmationField().addEvent("blur",function(e){this.callvalidation(e)}.bind(this)),""===this.getConfirmationField().get("value")&&(this.getConfirmationField().value=this.element.value),Fabrik.addEvent("fabrik.form.doelementfx",function(e,t,i,a){if(e===this.form&&i===this.strElement)switch(t){case"disable":d(this.getConfirmationField()).prop("disabled",!0);break;case"enable":d(this.getConfirmationField()).prop("disabled",!1);break;case"readonly":d(this.getConfirmationField()).prop("readonly",!0);break;case"notreadonly":d(this.getConfirmationField()).prop("readonly",!1)}}.bind(this))},callvalidation:function(e){this.form.doElementValidation(e,!1,"_check")},cloned:function(e){console.log("cloned"),this.parent(e),this.ini()},passwordChanged:function(){var e=this.getContainer().getElement(".strength");if("null"!==typeOf(e)){var t=new RegExp("^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$","g"),i=new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$","g"),a=new RegExp("(?=.{6,}).*","g"),n=this.element,o="";if(this.options.progressbar){var s,r="";s=t.test(n.value)?(r=Joomla.JText._("PLG_ELEMENT_PASSWORD_STRONG"),d(Fabrik.jLayouts["fabrik-progress-bar-strong"])):i.test(n.value)?(r=Joomla.JText._("PLG_ELEMENT_PASSWORD_MEDIUM"),d(Fabrik.jLayouts["fabrik-progress-bar-medium"])):a.test(n.value)?(r=Joomla.JText._("PLG_ELEMENT_PASSWORD_WEAK"),d(Fabrik.jLayouts["fabrik-progress-bar-weak"])):(r=Joomla.JText._("PLG_ELEMENT_PASSWORD_MORE_CHARACTERS"),d(Fabrik.jLayouts["fabrik-progress-bar-more"]));var l={title:r};d(s).tooltip(l),d(e).replaceWith(s)}else o=!1===a.test(n.value)?"<span>"+Joomla.JText._("PLG_ELEMENT_PASSWORD_MORE_CHARACTERS")+"</span>":t.test(n.value)?'<span style="color:green">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_STRONG")+"</span>":i.test(n.value)?'<span style="color:orange">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_MEDIUM")+"</span>":'<span style="color:red">'+Joomla.JText._("PLG_ELEMENT_PASSWORD_WEAK")+"</span>",e.set("html",o)}},getConfirmationField:function(){return this.getContainer().getElement("input[name*=check]")}}),window.FbPassword});