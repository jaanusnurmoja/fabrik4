/*! Fabrik */
FbElementList=new Class({Extends:FbElement,type:"text",initialize:function(a,b){this.parent(a,b),this.addSubClickEvents(),this._getSubElements(),this.options.allowadd===!0&&this.options.editable!==!1&&(this.watchAddToggle(),this.watchAdd())},_getSubElements:function(){var a=this.getElement();return this.subElements=a?a.getElements("input[type="+this.type+"]"):[],this.subElements},addSubClickEvents:function(){this._getSubElements().each(function(a){a.addEvent("click",function(a){Fabrik.fireEvent("fabrik.element.click",[this,a])})})},addNewEvent:function(action,js){var r,delegate,uid;"load"===action?(this.loadEvents.push(js),this.runLoadEvent(js)):(c=this.form.form,delegate=action+":relay(input[type="+this.type+"][name^="+this.options.fullName+"])","null"===typeOf(this.form.events[action])&&(this.form.events[action]={}),"function"==typeof js?uid=1e3*Math.random(100):(r=new RegExp("[^a-z|0-9]","gi"),uid=delegate+js.replace(r,"")),"null"===typeOf(this.form.events[action][uid])&&(this.form.events[action][uid]=!0,c.addEvent(delegate,function(event,target){var elid=target.getParent(".fabrikSubElementContainer").id,that=this.form.formElements[elid],subEls=that._getSubElements();subEls.contains(target)&&("function"!=typeof js?(js=js.replace(/this/g,"that"),eval(js)):js.delay(0))}.bind(this))))},checkEnter:function(a){"enter"===a.key&&(a.stop(),this.startAddNewOption())},startAddNewOption:function(){var a=this.getContainer(),b=a.getElement("input[name=addPicklistLabel]"),c=a.getElement("input[name=addPicklistValue]"),d=b.value;if(val=c?c.value:d,""===val||""===d)alert(Joomla.JText._("PLG_ELEMENT_CHECKBOX_ENTER_VALUE_LABEL"));else{var e=this.subElements.getLast().findClassUp("fabrikgrid_"+this.type).clone(),f=e.getElement("input");if(f.value=val,f.checked="checked","checkbox"===this.type){var g=f.name.replace(/^(.*)\[.*\](.*?)$/,"$1$2");f.name=g+"["+this.subElements.length+"]"}e.getElement("."+this.type+" span").set("text",d),e.inject(this.subElements.getLast().findClassUp("fabrikgrid_"+this.type),"after");var h=0;"radio"===this.type&&(h=this.subElements.length);var i=$$("input[name="+f.name+"]");document.id(this.form.form).fireEvent("change",{target:i[h]}),this._getSubElements(),c&&(c.value=""),b.value="",this.addNewOption(val,d),this.mySlider&&this.mySlider.toggle()}},watchAdd:function(){if(this.options.allowadd===!0&&this.options.editable!==!1){var a=this.getContainer();a.getElements("input[name=addPicklistLabel], input[name=addPicklistValue]").addEvent("keypress",function(a){this.checkEnter(a)}.bind(this)),a.getElement("input[type=button]").addEvent("click",function(a){a.stop(),this.startAddNewOption()}.bind(this)),document.addEvent("keypress",function(a){"esc"===a.key&&this.mySlider&&this.mySlider.slideOut()}.bind(this))}}});