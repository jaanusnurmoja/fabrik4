var FbElementList=new Class({Extends:FbElement,type:"text",initialize:function(b,a){this.parent(b,a);this.addSubClickEvents();this._getSubElements();if(this.options.allowadd===true&&this.options.editable!==false){this.watchAddToggle();this.watchAdd()}},_getSubElements:function(){var a=this.getElement();if(!a){this.subElements=$A()}else{this.subElements=a.getElements("input")}return this.subElements},addSubClickEvents:function(){this._getSubElements().each(function(a){a.addEvent("click",function(b){Fabrik.fireEvent("fabrik.element.click",[this,b])})})},addNewEvent:function(action,js){if(action==="load"){this.loadEvents.push(js);this.runLoadEvent(js)}else{this._getSubElements();var c=this.getContainer();var delegate=action+":relay(input[type="+this.type+"])";c.addEvent(delegate,function(event,target){typeOf(js)==="function"?js.delay(0):eval(js)})}},checkEnter:function(a){if(a.key==="enter"){a.stop();this.startAddNewOption()}},startAddNewOption:function(){var f=this.getContainer();var a=f.getElement("input[name=addPicklistLabel]");var b=f.getElement("input[name=addPicklistValue]");var d=a.value;if(b){val=b.value}else{val=d}if(val===""||d===""){alert(Joomla.JText._("PLG_ELEMENT_CHECKBOX_ENTER_VALUE_LABEL"))}else{var e=this.subElements.getLast().findUp("li").clone();e.getElement("input").value=val;e.getElement("input").checked="checked";e.getElement("span").set("text",d);e.inject(this.subElements.getLast().findUp("li"),"after");this._getSubElements();if(b){b.value=""}a.value="";this.addNewOption(val,d);if(this.mySlider){this.mySlider.toggle()}}},watchAdd:function(){var a;if(this.options.allowadd===true&&this.options.editable!==false){var b=this.getContainer();b.getElements("input[name=addPicklistLabel], input[name=addPicklistValue]").addEvent("keypress",function(c){this.checkEnter(c)}.bind(this));b.getElement("input[type=button]").addEvent("click",function(c){c.stop();this.startAddNewOption()}.bind(this));document.addEvent("keypress",function(c){if(c.key==="esc"&&this.mySlider){this.mySlider.slideOut()}}.bind(this))}}});