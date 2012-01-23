var ListPluginManager=new Class({Extends:PluginManager,initialize:function(a){this.parent(a);this.opts.type="list"},getPluginTop:function(d,c){var b=this.getPublishedYesNo(c);var a=new Element("tr").adopt([new Element("td").adopt(new Element("input",{value:Joomla.JText._("COM_FABRIK_ACTION"),size:6,readonly:true,"class":"readonly"}),this._makeSel("inputbox elementtype","jform[params][plugins][]",this.plugins,d))]);var e=new Element("tr").adopt(new Element("td").set("html",b));return new Element("table").adopt(new Element("tbody").adopt(a,e))}});var ListForm=new Class({Implements:[Options],options:{},initialize:function(a){var b;this.setOptions(a);this.watchTableDd();this.addAJoinClick=this.addAJoin.bindWithEvent(this);if(document.id("addAJoin")){document.id("addAJoin").addEvent("click",this.addAJoinClick)}if(document.getElement("table.linkedLists")){b=document.getElement("table.linkedLists").getElement("tbody");new Sortables(b,{handle:".handle"})}if(document.getElement("table.linkedForms")){b=document.getElement("table.linkedForms").getElement("tbody");new Sortables(b,{handle:".handle"})}this.joinCounter=0;this.watchOrderButtons();this.watchDbName()},watchOrderButtons:function(){$$(".addOrder").removeEvents("click");$$(".deleteOrder").removeEvents("click");$$(".addOrder").addEvent("click",this.addOrderBy.bindWithEvent(this));$$(".deleteOrder").addEvent("click",this.deleteOrderBy.bindWithEvent(this))},addOrderBy:function(b){var a;if(b){a=b.target.getParent(".orderby_container")}else{a=document.getElement(".orderby_container")}a.clone().inject(a,"after");this.watchOrderButtons()},deleteOrderBy:function(a){if($$(".orderby_container").length>1){a.target.getParent(".orderby_container").dispose();this.watchOrderButtons()}},watchDbName:function(){if(document.id("database_name")){document.id("database_name").addEvent("blur",function(a){if(document.id("database_name").get("value")===""){document.id("tablename").disabled=false}else{document.id("tablename").disabled=true}})}},_buildOptions:function(c,b){var a=[];if(c.length>0){if(typeof(c[0])==="object"){c.each(function(d){if(d[0]===b){a.push(new Element("option",{value:d[0],selected:"selected"}).set("text",d[1]))}else{a.push(new Element("option",{value:d[0]}).set("text",d[1]))}})}else{c.each(function(d){if(d===b){a.push(new Element("option",{value:d,selected:"selected"}).set("text",d))}else{a.push(new Element("option",{value:d}).set("text",d))}})}}return a},addAJoin:function(a){this.addJoin();a.stop()},watchTableDd:function(){if(document.id("tablename")){document.id("tablename").addEvent("change",function(e){var cid=document.getElement("input[name*=connection_id]").get("value");var table=document.id("tablename").get("value");var url="index.php?option=com_fabrik&format=raw&task=list.ajax_updateColumDropDowns&cid="+cid+"&table="+table;var myAjax=new Request({url:url,method:"post",onComplete:function(r){eval(r)}}).send()})}},watchFieldList:function(a){$A(document.getElementsByName(a)).each(function(b){b.addEvent("change",function(f){var d=f.target.parentNode.parentNode.parentNode.parentNode;var c=d.id.replace("join","");this.updateJoinStatement(c)}.bind(this))}.bind(this))},_findActiveTables:function(){var a=$$(".join_from").combine($$(".join_to"));a.each(function(c){var b=c.get("value");if(this.options.activetableOpts.indexOf(b)===-1){this.options.activetableOpts.push(b)}}.bind(this));this.options.activetableOpts.sort()},addJoin:function(g,l,o,p,m,n,b,j,e,a){var c,f;o=o?o:"left";b=b?b:"";p=p?p:"";m=m?m:"";n=n?n:"";g=g?g:"";l=l?l:"";a=a?a:false;if(a){c='checked="checked"';f=""}else{f='checked="checked"';c=""}this._findActiveTables();j=j?j:[["-",""]];e=e?e:[["-",""]];var h=new Element("tbody");var i=new Element("table",{"class":"adminform",id:"join"+this.joinCounter}).adopt([new Element("thead").adopt([new Element("tr",{events:{click:function(d){d.stop();d.target.getParent(".adminform").getElement("tbody").slide("toggle")}},styles:{cursor:"pointer"}}).adopt(new Element("td",{colspan:"2"}).adopt(new Element("div",{id:"join-desc-"+this.joinCounter,styles:{margin:"5px","background-color":"#fefefe",padding:"5px",border:"1px dotted #666666"}})))]),h.adopt([new Element("tr").adopt([new Element("td").set("text","id"),new Element("td").adopt(new Element("input",{type:"field",readonly:"readonly",size:"2","class":"disabled readonly",name:"jform[params][join_id][]",value:l}))]),new Element("tr").adopt([new Element("td").adopt([new Element("input",{type:"hidden",name:"group_id[]",value:g})]).set("text",Joomla.JText._("COM_FABRIK_JOIN_TYPE")),new Element("td").adopt(new Element("select",{name:"jform[params][join_type][]","class":"inputbox"}).adopt(this._buildOptions(this.options.joinOpts,o)))]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_FROM")),new Element("td").adopt(new Element("select",{name:"jform[params][join_from_table][]","class":"inputbox join_from"}).adopt(this._buildOptions(this.options.activetableOpts,b)))]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_TO")),new Element("td").adopt(new Element("select",{name:"jform[params][table_join][]","class":"inputbox join_to"}).adopt(this._buildOptions(this.options.tableOpts,p)))]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_FROM_COLUMN")),new Element("td",{id:"joinThisTableId"+this.joinCounter}).adopt(new Element("select",{name:"jform[params][table_key][]","class":"table_key inputbox"}).adopt(this._buildOptions(j,m)))]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_TO_COLUMN")),new Element("td",{id:"joinJoinTableId"+this.joinCounter}).adopt(new Element("select",{name:"jform[params][table_join_key][]","class":"table_join_key inputbox"}).adopt(this._buildOptions(e,n)))]),new Element("tr").set("html","<td>"+Joomla.JText._("COM_FABRIK_REPEAT_GROUP_BUTTON_LABEL")+'</td><td><fieldset class="radio"><input type="radio" id="joinrepeat'+this.joinCounter+'" value="1" name="jform[params][join_repeat]['+this.joinCounter+'][]" '+c+'/><label for="joinrepeat'+this.joinCounter+'">'+Joomla.JText._("JYES")+'</label><input type="radio" id="joinrepeatno'+this.joinCounter+'" value="0" name="jform[params][join_repeat]['+this.joinCounter+'][]" '+f+'/><label for="joinrepeatno'+this.joinCounter+'">'+Joomla.JText._("JNO")+"</label></fieldset></td>"),new Element("tr").adopt([new Element("td",{colspan:"2"}).adopt([new Element("a",{href:"#","class":"removeButton",events:{click:function(d){this.deleteJoin(d);return false}.bind(this)}}).set("text",Joomla.JText._("COM_FABRIK_DELETE"))])])])]);var k=new Element("div",{id:"join"}).adopt(i);k.inject(document.id("joindtd"));if(m!==""){h.slide("hide")}this.updateJoinStatement(this.joinCounter);this.watchJoins();this.joinCounter++},deleteJoin:function(b){b.stop();var a=document.id(b.target.up(4));var c=new Fx.Tween(a,{property:"opacity",duration:500});c.start(1,0).chain(function(){a.dispose()})},watchJoins:function(){$$(".join_from").each(function(a){a.removeEvents("change");a.addEvent("change",function(i){var h=i.target.parentNode.parentNode.parentNode.parentNode;var b=h.id.replace("join","");this.updateJoinStatement(b);var f=i.target.get("value");var d=document.getElement("input[name*=connection_id]").get("value");var c="index.php?option=com_fabrik&format=raw&task=list.ajax_loadTableDropDown&table="+f+"&conn="+d;var g=new Request.HTML({url:c,method:"post",update:document.id("joinThisTableId"+b),onComplete:function(e){this.watchFieldList("jform[params][table_key][]")}.bind(this)}).send()}.bind(this))}.bind(this));$$(".join_to").each(function(a){a.removeEvents("change");a.addEvent("change",function(i){var h=i.target.parentNode.parentNode.parentNode.parentNode;var b=h.id.replace("join","");this.updateJoinStatement(b);var f=i.target.get("value");var d=document.getElement("input[name*=connection_id]").get("value");var c="index.php?name=jform[params][table_join_key][]&option=com_fabrik&format=raw&task=list.ajax_loadTableDropDown&table="+f+"&conn="+d;var g=new Request.HTML({url:c,method:"post",update:document.id("joinJoinTableId"+b),onComplete:function(e){this.watchFieldList("jform[params][table_join_key][]")}.bind(this)}).send()}.bind(this))}.bind(this));this.watchFieldList("jform[params][join_type][]");this.watchFieldList("jform[params][table_join_key][]");this.watchFieldList("jform[params][table_key][]")},updateJoinStatement:function(d){var c=$$("#join"+d+" .inputbox");var e=c[0].get("value");var f=c[1].get("value");var b=c[2].get("value");var h=c[3].get("value");var a=c[4].get("value");var g=e+" JOIN "+b+" ON "+f+"."+h+" = "+b+"."+a;document.id("join-desc-"+d).set("html",g)}});var adminFilters=new Class({Implements:[Options],options:{},initialize:function(c,a,b){this.el=document.id(c);this.fields=a;this.setOptions(b);this.filters=[];this.counter=0;this.onDeleteClick=this.deleteFilterOption.bindWithEvent(this)},addHeadings:function(){var a=new Element("thead").adopt(new Element("tr",{id:"filterTh","class":"title"}).adopt(new Element("th").set("text",Joomla.JText._("COM_FABRIK_JOIN")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_FIELD")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_CONDITION")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_VALUE")),new Element("th").adopt(new Element("span",{"class":"editlinktip"}).adopt(new Element("span",{}).set("text",Joomla.JText._("COM_FABRIK_APPLY_FILTER_TO")))),new Element("th").set("text",Joomla.JText._("COM_FABRIK_DELETE"))));a.inject(document.id("filterContainer"),"before")},deleteFilterOption:function(d){d.stop();var a=d.target;a.removeEvent("click",this.onDeleteClick);var c=a.parentNode.parentNode;var b=c.parentNode;b.removeChild(c);this.counter--;if(this.counter===0){document.id("filterTh").dispose()}},_makeSel:function(f,a,e,d){var b=[];b.push(new Element("option",{value:""}).set("text",Joomla.JText._("COM_FABRIK_PLEASE_SELECT")));e.each(function(c){if(c.value===d){b.push(new Element("option",{value:c.value,selected:"selected"}).set("text",c.label))}else{b.push(new Element("option",{value:c.value}).set("text",c.label))}});return new Element("select",{"class":f,name:a}).adopt(b)},addFilterOption:function(y,r,s,d,p,t,A){var C,o,D,x,B,u,l;if(this.counter<=0){this.addHeadings()}y=y?y:"";r=r?r:"";s=s?s:"";d=d?d:"";p=p?p:"";A=A?A:"";var k=this.options.filterCondDd;var b=new Element("tr");if(this.counter>0){var q={type:"radio",name:"jform[params][filter-grouped]["+this.counter+"]",value:"1"};q.checked=(A==="1")?"checked":"";B=new Element("label").set("text",Joomla.JText._("JYES")).adopt(new Element("input",q));q={type:"radio",name:"jform[params][filter-grouped]["+this.counter+"]",value:"0"};q.checked=(A!=="1")?"checked":"";x=new Element("label").set("text",Joomla.JText._("JNO")).adopt(new Element("input",q))}if(this.counter===0){D=new Element("span").set("text","WHERE").adopt(new Element("input",{type:"hidden",id:"paramsfilter-join","class":"inputbox",name:"jform[params][filter-join][]",value:y}))}else{if(y==="AND"){C=new Element("option",{value:"AND",selected:"selected"}).set("text","AND");o=new Element("option",{value:"OR"}).set("text","OR")}else{C=new Element("option",{value:"AND"}).set("text","AND");o=new Element("option",{value:"OR",selected:"selected"}).set("text","OR")}D=new Element("select",{id:"paramsfilter-join","class":"inputbox",name:"jform[params][filter-join][]"}).adopt([C,o])}var n=new Element("td");if(this.counter<=0){n.appendChild(new Element("input",{type:"hidden",name:"jform[params][filter-grouped]["+this.counter+"]",value:"0"}))}else{n.appendChild(new Element("span").set("text",Joomla.JText._("COM_FABRIK_GROUPED")));n.appendChild(new Element("br"));n.appendChild(x);n.appendChild(B);n.appendChild(new Element("br"))}n.appendChild(D);var h=new Element("td");h.innerHTML=this.fields;var g=new Element("td");g.innerHTML=k;var f=new Element("td");var e=new Element("td");e.innerHTML=this.options.filterAccess;var c=new Element("td");var w=new Element("textarea",{name:"jform[params][filter-value][]",cols:17,rows:4}).set("text",d);f.appendChild(w);f.appendChild(new Element("br"));var v=[{value:0,label:Joomla.JText._("COM_FABRIK_TEXT")},{value:1,label:Joomla.JText._("COM_FABRIK_EVAL")},{value:2,label:Joomla.JText._("COM_FABRIK_QUERY")},{value:3,label:Joomla.JText._("COM_FABRIK_NO_QUOTES")}];f.adopt(new Element("label").adopt([new Element("span").set("text",Joomla.JText._("COM_FABRIK_TYPE")),this._makeSel("inputbox elementtype","jform[params][filter-eval][]",v,t)]));var m=(y!==""||r!==""||s!==""||d!=="")?true:false;var j=this.el.id+"-del-"+this.counter;var z=new Element("a",{href:"#",id:j,"class":"removeButton"});c.appendChild(z);b.appendChild(n);b.appendChild(h);b.appendChild(g);b.appendChild(f);b.appendChild(e);b.appendChild(c);this.el.appendChild(b);document.id(j).addEvent("click",this.onDeleteClick);document.id(this.el.id+"-del-"+this.counter).click=this.onDeleteClick;if(y!==""){l=$A(n.getElementsByTagName("SELECT"));if(l.length>=1){for(u=0;u<l[0].length;u++){if(l[0][u].value===y){l[0].options.selectedIndex=u}}}}if(r!==""){l=$A(h.getElementsByTagName("SELECT"));if(l.length>=1){for(u=0;u<l[0].length;u++){if(l[0][u].value===r){l[0].options.selectedIndex=u}}}}if(s!==""){l=$A(g.getElementsByTagName("SELECT"));if(l.length>=1){for(u=0;u<l[0].length;u++){if(l[0][u].value===s){l[0].options.selectedIndex=u}}}}if(p!==""){l=$A(e.getElementsByTagName("SELECT"));if(l.length>=1){for(u=0;u<l[0].length;u++){if(l[0][u].value===p){l[0].options.selectedIndex=u}}}}this.counter++}});