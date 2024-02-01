/*! Fabrik */
define(["jquery","element/databasejoin/databasejoin","fab/autocomplete-bootstrap-cdd"],function(t,e,i){return window.FbCascadingdropdown=new Class({options:{watchInSameGroup:!0},Extends:e,initialize:function(t,e){this.ignoreAjax=!1,this.setPlugin("cascadingdropdown"),this.parent(t,e),document.id(this.options.watch)&&(this.doChangeEvent=this.doChange.bind(this),document.id(this.options.watch).addEvent(this.options.watchChangeEvent,this.doChangeEvent)),!0===this.options.showDesc&&this.element.addEvent("change",function(t){this.showDesc(t)}.bind(this)),"null"!==typeOf(this.element)&&(this.spinner=new Spinner(this.element.getParent(".fabrikElementContainer")))},attachedToForm:function(){var t;(this.ignoreAjax||this.options.editable&&!this.options.editing)&&(this.ignoreAjax=!1,t=this.form.formElements.get(this.options.watch).getValue(),this.change(t,document.id(this.options.watch).id)),this.parent()},dowatch:function(t){var e=Fabrik.blocks[this.form.form.id].formElements[this.options.watch].getValue();this.change(e,t.target.id)},doChange:function(t){"auto-complete"===this.options.displayType&&(this.element.value="",this.getAutoCompleteLabelField().value=""),this.dowatch(t)},change:function(t,e){var a,i;window.ie&&0===this.options.repeatCounter.toInt()&&(i=e.substr(e.length-2,1),e=e.substr(e.length-1,1),"_"===i)&&"number"===typeOf(parseInt(e,10))&&"0"!==e||(this.spinner.show(),i=this.form.getFormElementData(),e={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"cascadingdropdown",method:"ajax_getOptions",element_id:this.options.id,v:t,formid:this.form.id,fabrik_cascade_ajax_update:1,lang:this.options.lang},e=Object.append(i,e),this.myAjax&&this.myAjax.cancel(),this.myAjax=new Request({url:"",method:"post",data:e,onComplete:function(){this.spinner.hide()}.bind(this),onSuccess:function(t){var i,n,s=this.getValue(),o=(this.spinner.hide(),t=JSON.parse(t),this.options.editable?this.destroyElement():this.element.getElements("div").destroy(),!0===this.options.showDesc&&(n=this.getContainer().getElement(".dbjoin-description")).empty(),this.myAjax=null,1===t.length),e=(this.ignoreAjax?this.options.showPleaseSelect&&0<t.length&&(e=t.shift(),(!1===this.options.editable?new Element("div"):(i=""!==e.value&&e.value===s||o,this.addOption(e.value,e.text,i),new Element("option",{value:e.value,selected:"selected"}))).set("text",e.text).inject(this.element)):t.each(function(t){var e;!1===this.options.editable?(t.text=t.text.replace(/\n/g,"<br />"),new Element("div").set("html",t.text).inject(this.element)):(i=""!==t.value&&t.value===s||o,this.addOption(t.value,t.text,i)),!0===this.options.showDesc&&t.description&&(e=this.options.showPleaseSelect?"notice description-"+a:"notice description-NaN",new Element("div",{styles:{display:"none"},class:e}).set("html",t.description).inject(n))}.bind(this)),this.ignoreAjax=!1,this.options.editable&&"dropdown"===this.options.displayType&&(1===this.element.options.length?this.element.addClass("readonly"):this.element.removeClass("readonly")),this.renewEvents(),this.ignoreAjax||(this.ingoreShowDesc=!0,this.element.fireEvent("change",new Event.Mock(this.element,"change")),this.ingoreShowDesc=!1),this.ignoreAjax=!1,[this.getValue()]);this.setValue(e),Fabrik.fireEvent("fabrik.cdd.update",this)}.bind(this),onFailure:function(t){console.log(this.myAjax.getHeader("Status"))}.bind(this)}).send())},destroyElement:function(){switch(this.options.displayType){case"radio":case"checkbox":this.getContainer().getElements('*[data-role="suboption"]').destroy(),this.getContainer().getElements('*[data-role="fabrik-rowopts"]').destroy();break;default:this.element.empty()}},cloned:function(t){this.myAjax=null,this.parent(t),this.spinner=new Spinner(this.element.getParent(".fabrikElementContainer")),document.id(this.options.watch)&&(!0===this.options.watchInSameGroup&&(this.options.watch.test(/_(\d+)$/)?this.options.watch=this.options.watch.replace(/_(\d+)$/,"_"+t):this.options.watch=this.options.watch+"_"+t),document.id(this.options.watch))&&(this.options.watchInSameGroup&&document.id(this.options.watch).removeEvent(this.options.watchChangeEvent,this.doChangeEvent),this.doChangeEvent=this.doChange.bind(this),document.id(this.options.watch).addEvent(this.options.watchChangeEvent,this.doChangeEvent)),!0===this.options.watchInSameGroup&&(this.element.empty(),this.ignoreAjax=!0),!0===this.options.showDesc&&this.element.addEvent("change",function(){this.showDesc()}.bind(this)),Fabrik.fireEvent("fabrik.cdd.update",this)},cloneAutoComplete:function(){var t=this.getAutoCompleteLabelField();t.id=this.element.id+"-auto-complete",t.name=this.element.name.replace("[]","")+"-auto-complete",document.id(t.id).value="",new i(this.element.id,this.options.autoCompleteOpts)},showDesc:function(t){var e,i,n;!0!==this.ingoreShowDesc&&(t=document.id(t.target).selectedIndex,e=this.getContainer().getElement(".dbjoin-description"),i=e.getElement(".description-"+t),e.getElements(".notice").each(function(t){t===i?((n=new Fx.Style(i,"opacity",{duration:400,transition:Fx.Transitions.linear})).set(0),t.show(),n.start(0,1)):t.hide()}.bind(this)))}}),window.FbCascadingdropdown});