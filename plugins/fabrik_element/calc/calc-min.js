/*! Fabrik */

define(["jquery","fab/element"],function(jQuery,FbElement){return window.FbCalc=new Class({Extends:FbElement,initialize:function(t,e){this.setPlugin("calc"),this.parent(t,e),this.observeGroupIds=[]},attachedToForm:function(t){this.options.ajax&&(this.options.observe.each(function(t){this.addObserveEvent(t)}.bind(this)),void 0===t&&this.options.calcOnLoad?this.calc():!0===t&&(this.options.calcOnRepeat||this.options.calcOnLoad)&&this.calc(),Fabrik.addEvent("fabrik.cdd.update",function(t){t.hasSubElements()&&-1!==jQuery.inArray(t.baseElementId,this.options.observe)&&this.addObserveEvent(t.baseElementId)}.bind(this))),Fabrik.addEvent("fabrik.form.group.duplicate.end",function(t,e,i){-1!==jQuery.inArray(i,this.observeGroupIds)&&this.calc()}.bind(this)),Fabrik.addEvent("fabrik.form.group.delete.end",function(t,e,i){-1!==jQuery.inArray(i,this.observeGroupIds)&&this.calc()}.bind(this)),this.parent()},addObserveEvent:function(i){var n,s;""!==i&&(this.form.formElements[i]?this.form.formElements[i].addNewEventAux(this.form.formElements[i].getChangeEvent(),function(t){this.calc(t)}.bind(this)):this.options.canRepeat?(n=i+"_"+this.options.repeatCounter,this.form.formElements[n]&&this.form.formElements[n].addNewEventAux(this.form.formElements[n].getChangeEvent(),function(t){this.calc(t)}.bind(this))):this.form.repeatGroupMarkers.each(function(t,e){for(n="",s=0;s<t;s++)n=i+"_"+s,this.form.formElements[n]&&(this.form.formElements[n].addNewEvent(this.form.formElements[n].getChangeEvent(),function(t){this.calc(t)}.bind(this)),-1===jQuery.inArray(e,this.observeGroupIds)&&this.observeGroupIds.push(e))}.bind(this)))},calc:function(){var formData=this.form.getFormElementData(),testData=$H(this.form.getFormData(!1));testData.each(function(t,e){(e.test(/\[\d+\]$/)||e.test(/^fabrik_vars/))&&(formData[e]=t)}.bind(this));var data={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"calc",method:"ajax_calc",element_id:this.options.id,formid:this.form.id,repeatCounter:this.options.repeatCounter};data=Object.append(formData,data),Fabrik.loader.start(this.element.getParent(),Joomla.JText._("COM_FABRIK_LOADING")),new Request.HTML({url:"",method:"post",data:data,onSuccess:function(tree,elements,r,scripts){Fabrik.loader.stop(this.element.getParent()),this.update(r),eval(scripts),this.options.validations&&this.form.doElementValidation(this.options.element),this.element.fireEvent("change",new Event.Mock(this.element,"change")),Fabrik.fireEvent("fabrik.calc.update",[this,r])}.bind(this)}).send()},cloned:function(t){this.parent(t),this.attachedToForm(!0)},update:function(t){this.getElement()&&(this.element.innerHTML=t,this.options.value=t)},getValue:function(){return!!this.element&&this.options.value}}),window.FbCalc});