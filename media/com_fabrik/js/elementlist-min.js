FbElementList=new Class({Extends:FbElement,type:"text",initialize:function(b,a){this.parent(b,a);this.addSubClickEvents();this._getSubElements();if(this.options.allowadd===true&&this.options.editable!==false){this.watchAddToggle();this.watchAdd()}},_getSubElements:function(){var a=this.getElement();if(!a){this.subElements=[]}else{this.subElements=a.getElements("input")}return this.subElements},addSubClickEvents:function(){this._getSubElements().each(function(a){a.addEvent("click",function(b){Fabrik.fireEvent("fabrik.element.click",[this,b])})})},addNewEvent:function(action,js){var r,delegate,uid;if(action==="load"){this.loadEvents.push(js);this.runLoadEvent(js)}else{c=this.form.form;delegate=action+":relay(input[type="+this.type+"][name^="+this.options.fullName+"])";if(typeOf(this.form.events[action])==="null"){this.form.events[action]={}}if(typeof(js)==="function"){uid=Math.random(100)*1000}else{r=new RegExp("[^a-z|0-9]","gi");uid=delegate+js.replace(r,"")}if(typeOf(this.form.events[action][uid])==="null"){this.form.events[action][uid]=true;c.addEvent(delegate,function(event,target){var elid=target.getParent(".fabrikSubElementContainer").id;var that=this.form.formElements[elid];var subEls=that._getSubElements();if(subEls.contains(target)){if(typeof(js)!=="function"){js=js.replace(/this/g,"that");eval(js)}else{js.delay(0)}}}.bind(this))}}},checkEnter:function(a){if(a.key==="enter"){a.stop();this.startAddNewOption()}},startAddNewOption:function(){var h=this.getContainer();var d=h.getElement("input[name=addPicklistLabel]");var k=h.getElement("input[name=addPicklistValue]");var j=d.value;if(k){val=k.value}else{val=j}if(val===""||j===""){alert(Joomla.JText._("PLG_ELEMENT_CHECKBOX_ENTER_VALUE_LABEL"))}else{var a=this.subElements.getLast().findClassUp("fabrikgrid_"+this.type).clone();var e=a.getElement("input");e.value=val;e.checked="checked";if(this.type==="checkbox"){var b=e.name.replace(/^(.*)\[.*\](.*?)$/,"$1$2");e.name=b+"["+(this.subElements.length)+"]"}a.getElement("."+this.type+" span").set("text",j);a.inject(this.subElements.getLast().findClassUp("fabrikgrid_"+this.type),"after");var g=0;if(this.type==="radio"){g=this.subElements.length}var f=$$("input[name="+e.name+"]");document.id(this.form.form).fireEvent("change",{target:f[g]});this._getSubElements();if(k){k.value=""}d.value="";this.addNewOption(val,j);if(this.mySlider){this.mySlider.toggle()}}},watchAdd:function(){var a;if(this.options.allowadd===true&&this.options.editable!==false){var b=this.getContainer();b.getElements("input[name=addPicklistLabel], input[name=addPicklistValue]").addEvent("keypress",function(d){this.checkEnter(d)}.bind(this));b.getElement("input[type=button]").addEvent("click",function(d){d.stop();this.startAddNewOption()}.bind(this));document.addEvent("keypress",function(d){if(d.key==="esc"&&this.mySlider){this.mySlider.slideOut()}}.bind(this))}}});