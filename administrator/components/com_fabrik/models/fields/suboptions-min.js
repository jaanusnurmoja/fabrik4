/*! fabrik */
var Suboptions=new Class({Implements:[Options],options:{sub_initial_selection:[],j3:!1,defaultMax:0},initialize:function(a,b){this.setOptions(b),this.element=document.id(this.options.id),"null"===typeOf(this.element)&&confirm("oh dear - somethings gone wrong with loading the sub-options, do you want to reload?")&&location.reload(!0),this.watchButtons(),this.watchDefaultCheckboxes(),this.counter=0,this.name=a,Object.each(this.options.sub_values,function(a,b){var c=Object.contains(this.options.sub_initial_selection,a)?"checked='checked'":"";this.addSubElement(a,this.options.sub_labels[b],c)}.bind(this)),0===this.options.sub_values.length&&this.addSubElement("","",!1),Joomla.submitbutton=function(a){return"element.cancel"===a||this.onSave()?void Joomla.submitform(a):!1}.bind(this)},watchDefaultCheckboxes:function(){this.element.addEvent("click:relay(input.sub_initial_selection)",function(a){1===this.options.defaultMax&&this.element.getElements("input.sub_initial_selection").each(function(b){b!==a.target&&(b.checked=!1)})}.bind(this))},watchButtons:function(){if(this.options.j3){this.element.addEvent('click:relay(a[data-button="addSuboption"])',function(a){a.preventDefault(),this.addSubElement()}.bind(this)),this.element.addEvent('click:relay(a[data-button="deleteSuboption"])',function(a,b){a.preventDefault();var c=this.element.getElements("tbody tr");c.length>1&&b.getParent("tr").dispose()}.bind(this));{this.element.getElements('a[data-button="addSuboption"]')}}else document.id("addSuboption").addEvent("click",function(a){this.addOption(a)}.bind(this))},addOption:function(a){this.addSubElement(),a.stop()},removeSubElement:function(a){var b=a.target.id.replace("sub_delete_","");document.id("sub_subElementBody").getElements("li").length>1&&document.id("sub_content_"+b).dispose(),a.stop()},addJ3SubElement:function(a,b,c){var d=this._chx(a,c),e=this._deleteButton(),f=new Element("tr").adopt([new Element("td",{"class":"handle subhandle"}),new Element("td",{width:"30%"}).adopt(this._valueField(a)),new Element("td",{width:"30%"}).adopt(this._labelField(b)),new Element("td",{width:"10%"}).set("html",d),e]),g=this.element.getElement("tbody");g.adopt(f),this.sortable?this.sortable.addItems(f):this.sortable=new Sortables(g,{handle:".subhandle"}),this.counter++},_valueField:function(a){return new Element("input",{"class":"inputbox sub_values",type:"text",name:this.name+"[sub_values][]",id:"sub_value_"+this.counter,size:20,value:a,events:{change:function(){fconsole("need to set this chb boxes value to the value field if selected, or set to blank")}}})},_labelField:function(a){return new Element("input",{"class":"inputbox sub_labels",type:"text",name:this.name+"[sub_labels][]",id:"sub_text_"+this.counter,size:20,value:a})},_chx:function(a,b){return'<input class="inputbox sub_initial_selection" type="checkbox" value="'+a+"\" name='"+this.name+"[sub_initial_selection][]' id=\"sub_checked_"+this.counter+'" '+b+" />"},_deleteButton:function(){return new Element("td",{width:"20%"}).set("html",this.options.delButton)},addSubElement:function(a,b,c){if(this.options.j3)return this.addJ3SubElement(a,b,c);a=a?a:"",b=b?b:"";var d=this._chx(a,c),e=this._deleteButton();e.getElement("a").id="sub_delete_"+this.counter;var f=new Element("li",{id:"sub_content_"+this.counter}).adopt([new Element("table",{width:"100%"}).adopt([new Element("tbody").adopt([new Element("tr").adopt([new Element("td",{rowspan:2,"class":"handle subhandle"}),new Element("td",{width:"30%"}).adopt(this._valueField(a)),new Element("td",{width:"30%"}).adopt(this._labelField(b)),new Element("td",{width:"10%"}).set("html",d),e])])])]),g=document.id("sub_subElementBody").getElement("li");"null"!==typeOf(g)&&""===g.innerHTML?f.replaces(g):f.inject(document.id("sub_subElementBody")),document.id("sub_delete_"+this.counter).addEvent("click",function(a){this.removeSubElement(a)}.bind(this)),this.sortable?this.sortable.addItems(f):this.sortable=new Sortables("sub_subElementBody",{handle:".subhandle"}),this.counter++},onSave:function(){var a=[],b=!0,c=document.id("jform_params_dropdown_populate"),d=!1;return"null"!==typeOf(c)&&""!==c.get("value")&&(d=!0),d||$$(".sub_values").each(function(c){""===c.value&&(alert(Joomla.JText._("COM_FABRIK_SUBOPTS_VALUES_ERROR")),b=!1),a.push(c.value)}),$$(".sub_initial_selection").each(function(b,c){b.value=a[c]}),b}});