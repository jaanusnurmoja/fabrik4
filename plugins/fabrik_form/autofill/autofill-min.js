var Autofill=new Class({Implements:[Events,Options],options:{observe:"",trigger:"",cnn:0,table:0,map:"",editOrig:false,fillOnLoad:false,confirm:true},initialize:function(a){this.setOptions(a);Fabrik.addEvent("fabrik.form.elements.added",function(b){this.setUp(b)}.bind(this))},setUp:function(f){try{this.form=f}catch(e){return}var g=this.lookUp.bind(this);this.element=this.form.formElements.get(this.options.observe);if(!this.element){var a=Object.keys(this.form.formElements);var c=a.each(function(h){if(h.contains(this.options.observe)){this.element=this.form.formElements.get(h)}}.bind(this))}if(this.options.trigger===""){if(!this.element){fconsole("autofill - couldnt find element to observe")}else{var d=this.element.element.get("tag")==="select"?"change":"blur";this.form.dispatchEvent("",this.element.strElement,d,g)}}else{this.form.dispatchEvent("",this.options.trigger,"click",g)}if(this.options.fillOnLoad&&f.options.rowid==="0"){var b=this.options.trigger===""?this.element.strElement:this.options.trigger;this.form.dispatchEvent("",b,"load",g)}},lookUp:function(){if(this.options.confirm===true){if(!confirm(Joomla.JText._("PLG_FORM_AUTOFILL_DO_UPDATE"))){return}}Fabrik.loader.start("form_"+this.options.formid,Joomla.JText._("PLG_FORM_AUTOFILL_SEARCHING"));var a=this.element.getValue();var c=this.options.formid;var d=this.options.observe;var b=new Request.JSON({data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"autofill",method:"ajax_getAutoFill",g:"form",v:a,formid:c,observe:d,cnn:this.options.cnn,table:this.options.table,map:this.options.map},onCancel:function(){Fabrik.loader.stop("form_"+this.options.formid)}.bind(this),onError:function(f,e){Fabrik.loader.stop("form_"+this.options.formid);fconsole(f+" "+e)}.bind(this),onSuccess:function(e,f){Fabrik.loader.stop("form_"+this.options.formid);this.updateForm(e)}.bind(this)}).send()},updateForm:function(b){var a=this.element.getRepeatNum();b=$H(b);if(b.length===0){alert(Joomla.JText._("PLG_FORM_AUTOFILL_NORECORDS_FOUND"))}b.each(function(f,c){var e=c.substr(c.length-4,4);if(e==="_raw"){c=c.replace("_raw","");if(a){c+="_"+a}var d=this.form.formElements.get(c);if(typeOf(d)!=="null"){d.update(f)}}}.bind(this));if(this.options.editOrig===true){this.form.getForm().getElement("input[name=rowid]").value=b.__pk_val}}});