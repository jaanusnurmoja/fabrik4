/*! Fabrik */
var Autofill=new Class({Implements:[Events,Options],options:{observe:"",trigger:"",cnn:0,table:0,map:"",editOrig:!1,fillOnLoad:!1,confirm:!0,autofill_lookup_field:0},initialize:function(a){this.setOptions(a),this.attached=[],this.setupDone=!1,this.setUp(Fabrik.getBlock("form_"+this.options.formid)),Fabrik.addEvent("fabrik.form.elements.added",function(a){this.setUp(a)}.bind(this)),Fabrik.addEvent("fabrik.form.element.added",function(a,b,c){this.element&&c.strElement===this.element.strElement&&(this.element=!1,this.setupDone=!1,this.setUp(a))}.bind(this))},getElements:function(a){var b=!1,c=this.form.formElements.get(this.options.observe);if(c)this.attached.push(c.options.element);else{var d=0,e=Object.keys(this.form.formElements);e.each(function(e){e.contains(this.options.observe)&&(b=this.form.formElements.get(e),this.attached.contains(b.options.element)||this.attached.push(b.options.element),("null"===typeOf(a)||a===d)&&(c=b),d++)}.bind(this))}return c},setUp:function(a){if(!this.setupDone&&"null"!==typeOf(a)){try{this.form=a}catch(b){return}var c=function(a){this.lookUp(a)}.bind(this),d=!1,e=this.form.formElements.get(this.options.observe);if(!e){var f=0,g=Object.keys(this.form.formElements);g.each(function(a){a.contains(this.options.observe)&&(d=this.form.formElements.get(a),this.attached.contains(d.options.element)||this.attached.push(d.options.element),("null"===typeOf(repeatNum)||repeatNum===f)&&(e=d),f++)}.bind(this))}if(this.element=e,""===this.options.trigger)if(this.element){var h=this.element.getBlurEvent();this.form.dispatchEvent("",this.element.options.element,h,function(a){this.lookUp(a)}.bind(this))}else fconsole("autofill - couldnt find element to observe");else this.form.dispatchEvent("",this.options.trigger,"click",c);if(this.options.fillOnLoad){var i=""===this.options.trigger?this.element.strElement:this.options.trigger;this.form.dispatchEvent("",i,"load",c)}this.setupDone=!0}},lookUp:function(a){if(this.options.trigger||(this.element=a),this.options.confirm!==!0||confirm(Joomla.JText._("PLG_FORM_AUTOFILL_DO_UPDATE"))){Fabrik.loader.start("form_"+this.options.formid,Joomla.JText._("PLG_FORM_AUTOFILL_SEARCHING")),this.element||(this.element=this.getElement(0));{var b=this.element.getValue(),c=this.options.formid,d=this.options.observe;new Request.JSON({evalScripts:!0,data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"autofill",method:"ajax_getAutoFill",g:"form",v:b,formid:c,observe:d,cnn:this.options.cnn,table:this.options.table,map:this.options.map,autofill_lookup_field:this.options.autofill_lookup_field},onCancel:function(){Fabrik.loader.stop("form_"+this.options.formid)}.bind(this),onFailure:function(){Fabrik.loader.stop("form_"+this.options.formid),alert(this.getHeader("Status"))},onError:function(a,b){Fabrik.loader.stop("form_"+this.options.formid),fconsole(a+" "+b)}.bind(this),onSuccess:function(a){Fabrik.loader.stop("form_"+this.options.formid),this.updateForm(a)}.bind(this)}).send()}}},updateForm:function(a){this.json=$H(a),Fabrik.fireEvent("fabrik.form.autofill.update.start",[this,a]);var b=this.element.getRepeatNum();0===this.json.length&&alert(Joomla.JText._("PLG_FORM_AUTOFILL_NORECORDS_FOUND")),this.json.each(function(a,c){var d=c.substr(c.length-4,4);if("_raw"===d){c=c.replace("_raw","");var e=c;this.tryUpdate(c,a)||("object"==typeof a?(a=$H(a),a.each(function(a,b){d=c+"_"+b,this.tryUpdate(d,a)}.bind(this))):(c+=b?"_"+b:"_0",this.tryUpdate(c,a)||(c="join___"+this.element.options.joinid+"___"+c,!this.tryUpdate(e,a,!0))))}}.bind(this)),this.options.editOrig===!0&&(this.form.getForm().getElement("input[name=rowid]").value=this.json.__pk_val),Fabrik.fireEvent("fabrik.form.autofill.update.end",[this,a])},tryUpdate:function(a,b,c){if(c=c?!0:!1){var d=Object.keys(this.form.formElements).filter(function(b){return b.contains(a)});if(d.length>0)return d.each(function(a){var c=this.form.formElements.get(a);c.update(b),c.element.fireEvent(c.getBlurEvent(),new Event.Mock(c.element,c.getBlurEvent()))}.bind(this)),!0}else{var e=this.form.formElements.get(a);if("null"!==typeOf(e))return typeOf("null"!==e.options.displayType)&&"auto-complete"===e.options.displayType&&(e.activePopUp=!0),e.update(b),e.element.fireEvent(e.getBlurEvent(),new Event.Mock(e.element,e.getBlurEvent())),!0}return!1}});