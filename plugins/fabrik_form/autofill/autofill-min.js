var Autofill=new Class({Implements:[Events,Options],options:{observe:"",trigger:"",cnn:0,table:0,map:"",editOrig:false,fillOnLoad:false,confirm:true},initialize:function(a){this.setOptions(a);this.attached=[];Fabrik.addEvent("fabrik.form.elements.added",function(b){this.setUp(b)}.bind(this));Fabrik.addEvent("fabrik.form.element.added",function(d,c,b){if(!this.element){return}if(b.strElement===this.element.strElement){this.element=false;this.setUp(d)}}.bind(this))},getElement:function(){var c=false;var d=this.form.formElements.get(this.options.observe);if(!d){var a=Object.keys(this.form.formElements);var b=a.each(function(e){if(e.contains(this.options.observe)){c=this.form.formElements.get(e);if(!this.attached.contains(c.options.element)){this.attached.push(c.options.element);d=c}}}.bind(this))}return d},setUp:function(d){try{this.form=d}catch(c){return}var f=this.getElement();if(!f){return false}this.element=f;var g=this.lookUp.bind(this);if(this.options.trigger===""){if(!this.element){fconsole("autofill - couldnt find element to observe")}else{var b=this.element.getBlurEvent();this.form.dispatchEvent("",this.element.options.element,b,g)}}else{this.form.dispatchEvent("",this.options.trigger,"click",g)}if(this.options.fillOnLoad&&d.options.rowid==="0"){var a=this.options.trigger===""?this.element.strElement:this.options.trigger;this.form.dispatchEvent("",a,"load",g)}},lookUp:function(){if(this.options.confirm===true){if(!confirm(Joomla.JText._("PLG_FORM_AUTOFILL_DO_UPDATE"))){return}}Fabrik.loader.start("form_"+this.options.formid,Joomla.JText._("PLG_FORM_AUTOFILL_SEARCHING"));var a=this.element.getValue();var c=this.options.formid;var d=this.options.observe;var b=new Request.JSON({evalScripts:true,data:{option:"com_fabrik",format:"json",task:"plugin.pluginAjax",plugin:"autofill",method:"ajax_getAutoFill",g:"form",v:a,formid:c,observe:d,cnn:this.options.cnn,table:this.options.table,map:this.options.map},onCancel:function(){Fabrik.loader.stop("form_"+this.options.formid)}.bind(this),onFailure:function(e){Fabrik.loader.stop("form_"+this.options.formid);alert(this.getHeader("Status"))},onError:function(f,e){Fabrik.loader.stop("form_"+this.options.formid);fconsole(f+" "+e)}.bind(this),onSuccess:function(e,f){Fabrik.loader.stop("form_"+this.options.formid);this.updateForm(e)}.bind(this)}).send()},updateForm:function(b){var a=this.element.getRepeatNum();b=$H(b);if(b.length===0){alert(Joomla.JText._("PLG_FORM_AUTOFILL_NORECORDS_FOUND"))}b.each(function(e,c){var d=c.substr(c.length-4,4);if(d==="_raw"){c=c.replace("_raw","");if(!this.tryUpdate(c,e)){if(a){c+="_"+a;if(!this.tryUpdate(c,e)){c="join___"+this.element.options.joinid+"___"+c;this.tryUpdate(c,e)}}}}}.bind(this));if(this.options.editOrig===true){this.form.getForm().getElement("input[name=rowid]").value=b.__pk_val}},tryUpdate:function(a,c){var b=this.form.formElements.get(a);if(typeOf(b)!=="null"){b.update(c);return true}return false}});