var Suboptions=new Class({Implements:[Options],options:{sub_initial_selection:[]},initialize:function(b,a){this.setOptions(a);this.counter=0;this.name=b;this.clickRemoveSubElement=this.removeSubElement.bindWithEvent(this);document.id("addSuboption").addEvent("click",this.addOption.bindWithEvent(this));this.options.sub_values.each(function(d,c){var e=this.options.sub_initial_selection.indexOf(d)===-1?"":"checked='checked'";this.addSubElement(d,this.options.sub_labels[c],e)}.bind(this));if(this.options.sub_values.length===0){this.addSubElement("","",false)}Joomla.submitbutton=function(c){if(!this.onSave()){return false}Joomla.submitform(c)}.bind(this)},addOption:function(a){this.addSubElement();a.stop()},removeSubElement:function(a){var b=a.target.id.replace("sub_delete_","");if(document.id("sub_subElementBody").getElements("li").length>1){document.id("sub_content_"+b).dispose()}a.stop()},addSubElement:function(f,b,c){f=f?f:"";b=b?b:"";var e='<input class="inputbox sub_initial_selection" type="checkbox" value="'+f+"\" name='"+this.name+"[sub_initial_selection][]' id=\"sub_checked_"+this.counter+'" '+c+" />";var a=new Element("li",{id:"sub_content_"+this.counter}).adopt([new Element("table",{width:"100%"}).adopt([new Element("tbody").adopt([new Element("tr").adopt([new Element("td",{rowspan:2,"class":"handle subhandle"}),new Element("td",{width:"30%"}).adopt(new Element("input",{"class":"inputbox sub_values",type:"text",name:this.name+"[sub_values][]",id:"sub_value_"+this.counter,size:20,value:f,events:{change:function(g){fconsole("need to set this chb boxes value to the value field if selected, or set to blank")}}})),new Element("td",{width:"30%"}).adopt(new Element("input",{"class":"inputbox sub_labels",type:"text",name:this.name+"[sub_labels][]",id:"sub_text_"+this.counter,size:20,value:b})),new Element("td",{width:"10%"}).set("html",e),new Element("td",{width:"20%"}).adopt(new Element("a",{"class":"removeButton",href:"#",id:"sub_delete_"+this.counter}).set("text","Delete"))])])])]);var d=document.id("sub_subElementBody").getElement("li");if(typeOf(d)!=="null"&&d.innerHTML===""){a.replaces(d)}else{a.inject(document.id("sub_subElementBody"))}document.id("sub_delete_"+this.counter).addEvent("click",this.clickRemoveSubElement);if(!this.sortable){this.sortable=new Sortables("sub_subElementBody",{handle:".subhandle"})}else{this.sortable.addItems(a)}this.counter++},onSave:function(){var a=[];var b=true;var c=[];$$(".sub_values").each(function(d){if(d.value===""){alert(Joomla.JText._("COM_FABRIK_SUBOPTS_VALUES_ERROR"));b=false}a.push(d.value)});$$(".sub_initial_selection").each(function(d,e){d.value=a[e]});return b}});