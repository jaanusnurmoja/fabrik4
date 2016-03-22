/*! Fabrik */
define(["jquery"],function(jQuery){var ListForm=new Class({autoChangeDbName:!0,Implements:[Options],options:{j3:!0},initialize:function(a){var b;window.addEvent("domready",function(){this.setOptions(a),this.watchTableDd(),this.watchLabel(),document.id("addAJoin")&&document.id("addAJoin").addEvent("click",function(a){a.stop(),this.addJoin()}.bind(this)),document.getElement("table.linkedLists")&&(b=document.getElement("table.linkedLists").getElement("tbody"),new Sortables(b,{handle:".handle",onSort:function(){var a=this.serialize(1,function(a){return a.getElement("input")?a.getElement("input").name.split("][").getLast().replace("]",""):""}),b=[];a.each(function(a){""!==a&&b.push(a)}),document.getElement("input[name*=faceted_list_order]").value=JSON.stringify(b)}})),document.getElement("table.linkedForms")&&(b=document.getElement("table.linkedForms").getElement("tbody"),new Sortables(b,{handle:".handle",onSort:function(){var a=this.serialize(1,function(a){return a.getElement("input")?a.getElement("input").name.split("][").getLast().replace("]",""):""}),b=[];a.each(function(a){""!==a&&b.push(a)}),document.getElement("input[name*=faceted_form_order]").value=JSON.stringify(b)}})),this.joinCounter=0,this.watchOrderButtons(),this.watchDbName(),this.watchJoins()}.bind(this))},watchLabel:function(){this.autoChangeDbName=""===jQuery("#jform__database_name").val(),jQuery("#jform_label").on("keyup",function(){if(this.autoChangeDbName){var a=jQuery("#jform_label").val().trim().toLowerCase();a=a.replace(/\W+/g,"_"),jQuery("#jform__database_name").val(a)}}.bind(this)),jQuery("#jform__database_name").on("keyup",function(){this.autoChangeDbName=!1}.bind(this))},watchOrderButtons:function(){document.getElements(".addOrder").removeEvents("click"),document.getElements(".deleteOrder").removeEvents("click"),document.getElements(".addOrder").addEvent("click",function(a){a.stop(),this.addOrderBy()}.bind(this)),document.getElements(".deleteOrder").addEvent("click",function(a){a.stop(),this.deleteOrderBy(a)}.bind(this))},addOrderBy:function(a){var b;b=a?a.target.getParent(".orderby_container"):document.getElement(".orderby_container"),b.clone().inject(b,"after"),this.watchOrderButtons()},deleteOrderBy:function(a){document.getElements(".orderby_container").length>1&&(a.target.getParent(".orderby_container").dispose(),this.watchOrderButtons())},watchDbName:function(){document.id("database_name")&&document.id("database_name").addEvent("blur",function(){document.id("tablename").disabled=""===document.id("database_name").get("value")?!1:!0})},_buildOptions:function(a,b){var c=[];return a.length>0&&a.each("object"==typeof a[0]?function(a){c.push(a[0]===b?new Element("option",{value:a[0],selected:"selected"}).set("text",a[1]):new Element("option",{value:a[0]}).set("text",a[1]))}:function(a){c.push(a===b?new Element("option",{value:a,selected:"selected"}).set("text",a):new Element("option",{value:a}).set("text",a))}),c},watchTableDd:function(){document.id("tablename")&&document.id("tablename").addEvent("change",function(e){var cid=document.getElement("input[name*=connection_id]").get("value"),table=document.id("tablename").get("value"),url="index.php?option=com_fabrik&format=raw&task=list.ajax_updateColumDropDowns&cid="+cid+"&table="+table,myAjax=new Request({url:url,method:"post",onComplete:function(r){eval(r)}}).send()})},watchFieldList:function(a){document.getElement("div[id^=table-sliders-data]").addEvent("change:relay(select[name*="+a+"])",function(a,b){var c=this.options.j3?"tr":"table";this.updateJoinStatement(b.getParent(c).id.replace("join",""))}.bind(this))},_findActiveTables:function(){var a=document.getElements(".join_from").combine(document.getElements(".join_to"));a.each(function(a){var b=a.get("value");-1===this.options.activetableOpts.indexOf(b)&&this.options.activetableOpts.push(b)}.bind(this)),this.options.activetableOpts.sort()},addJoin:function(a,b,c,d,e,f,g,h,i,j){var k,l,m,n;c=c?c:"left",g=g?g:"",d=d?d:"",e=e?e:"",f=f?f:"",a=a?a:"",b=b?b:"",j=j?j:!1,j?(k='checked="checked"',l=""):(l='checked="checked"',k=""),this._findActiveTables(),h=h?h:[["-",""]],i=i?i:[["-",""]];var o=new Element("tbody"),p=new Element("input",{readonly:"readonly",size:"2","class":"disabled readonly input-mini",name:"jform[params][join_id][]",value:b}),q=this.options.js?"btn-danger":"removeButton",r=new Element("a",{href:"#","class":"btn "+q,events:{click:function(a){return this.deleteJoin(a),!1}.bind(this)}}),s='<i class="icon-minus"></i> ';this.options.j3||(s+=Joomla.JText._("COM_FABRIK_DELETE")),r.set("html",s),c=new Element("select",{name:"jform[params][join_type][]","class":"inputbox input-mini"}).adopt(this._buildOptions(this.options.joinOpts,c));var t=new Element("select",{name:"jform[params][join_from_table][]","class":"inputbox join_from input-medium"}).adopt(this._buildOptions(this.options.activetableOpts,g));a=new Element("input",{type:"hidden",name:"group_id[]",value:a});var u=new Element("select",{name:"jform[params][table_join][]","class":"inputbox join_to input-medium"}).adopt(this._buildOptions(this.options.tableOpts,d)),v=new Element("select",{name:"jform[params][table_key][]","class":"table_key inputbox input-medium"}).adopt(this._buildOptions(h,e));f=new Element("select",{name:"jform[params][table_join_key][]","class":"table_join_key inputbox input-medium"}).adopt(this._buildOptions(i,f));var w='<fieldset class="radio"><input type="radio" id="joinrepeat'+this.joinCounter+'" value="1" name="jform[params][join_repeat]['+this.joinCounter+'][]" '+k+'/><label for="joinrepeat'+this.joinCounter+'">'+Joomla.JText._("JYES")+'</label><input type="radio" id="joinrepeatno'+this.joinCounter+'" value="0" name="jform[params][join_repeat]['+this.joinCounter+'][]" '+l+'/><label for="joinrepeatno'+this.joinCounter+'">'+Joomla.JText._("JNO")+"</label></fieldset>";this.options.j3?(m=new Element("thead").adopt(new Element("tr").adopt([new Element("th").set("text","id"),new Element("th").set("text",Joomla.JText._("COM_FABRIK_JOIN_TYPE")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_FROM")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_TO")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_FROM_COLUMN")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_TO_COLUMN")),new Element("th").set("text",Joomla.JText._("COM_FABRIK_REPEAT_GROUP_BUTTON_LABEL")),new Element("th")])),n=new Element("tr",{id:"join"+this.joinCounter}).adopt([new Element("td").adopt(p),new Element("td").adopt([a,c]),new Element("td").adopt(t),new Element("td").adopt(u),new Element("td.table_key").adopt(v),new Element("td.table_join_key").adopt(f),new Element("td").set("html",w),new Element("td").adopt(r)])):(m=new Element("thead").adopt([new Element("tr",{events:{click:function(a){a.stop();var b=a.target.getParent(".adminform").getElement("tbody"),c=new Fx.Slide(b,{duration:500});Browser.ie?b.toggle():c.toggle()}},styles:{cursor:"pointer"}}).adopt(new Element("td",{colspan:"2"}).adopt(new Element("div",{id:"join-desc-"+this.joinCounter,styles:{margin:"5px","background-color":"#fefefe",padding:"5px",border:"1px dotted #666666"}})))]),n=[new Element("tr").adopt([new Element("td").set("text","id"),new Element("td").adopt(p)]),new Element("tr").adopt([new Element("td").adopt([a]).set("text",Joomla.JText._("COM_FABRIK_JOIN_TYPE")),new Element("td").adopt(c)]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_FROM")),new Element("td").adopt(t)]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_TO")),new Element("td").adopt(u)]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_FROM_COLUMN")),new Element("td",{id:"joinThisTableId"+this.joinCounter}).adopt(v)]),new Element("tr").adopt([new Element("td").set("text",Joomla.JText._("COM_FABRIK_TO_COLUMN")),new Element("td",{id:"joinJoinTableId"+this.joinCounter}).adopt(f)]),new Element("tr").set("html","<td>"+Joomla.JText._("COM_FABRIK_REPEAT_GROUP_BUTTON_LABEL")+"</td><td>"+w+"</td>"),new Element("tr").adopt([new Element("td",{colspan:"2"}).adopt([r])])]);var x=this.options.j3?"table-striped":"adminform",y=this.options.j3?"":"join"+this.joinCounter,z=new Element("table",{"class":x+" table",id:y}).adopt([m,o.adopt(n)]);if(this.options.j3)if(0===this.joinCounter)z.inject(document.id("joindtd"));else{var A=document.id("joindtd").getElement("tbody");n.inject(A)}else{var B=new Element("div",{id:"join"}).adopt(z);if(B.inject(document.id("joindtd")),""!==e){var C=new Fx.Slide(o,{duration:500});Browser.ie?o.hide():C.slideIn()}this.updateJoinStatement(this.joinCounter)}this.joinCounter++},deleteJoin:function(a){var b,c;a.stop(),this.options.j3?(c=a.target.getParent("tr"),b=a.target.getParent("table")):c=document.id(a.target.up(4)),c.dispose(),this.options.j3&&0===b.getElements("tbody tr").length&&b.dispose()},watchJoins:function(){var a=this.options.j3?"tr":"table";document.getElement("div[id^=table-sliders-data]").addEvent("change:relay(.join_from)",function(b,c){var d=c.getParent(a),e=d.id.replace("join","");this.updateJoinStatement(e);{var f=c.get("value"),g=document.getElement("input[name*=connection_id]").get("value"),h=this.options.j3?d.getElement("td.table_key"):document.id("joinThisTableId"+e),i="index.php?option=com_fabrik&format=raw&task=list.ajax_loadTableDropDown&table="+f+"&conn="+g;new Request.HTML({url:i,method:"post",update:h}).send()}}.bind(this)),document.getElement("div[id^=table-sliders-data]").addEvent("change:relay(.join_to)",function(b,c){var d=c.getParent(a),e=d.id.replace("join","");this.updateJoinStatement(e);{var f=c.get("value"),g=document.getElement("input[name*=connection_id]").get("value"),h="index.php?name=jform[params][table_join_key][]&option=com_fabrik&format=raw&task=list.ajax_loadTableDropDown&table="+f+"&conn="+g,i=this.options.j3?d.getElement("td.table_join_key"):document.id("joinJoinTableId"+e);new Request.HTML({url:h,method:"post",update:i}).send()}}.bind(this)),this.watchFieldList("join_type"),this.watchFieldList("table_join_key"),this.watchFieldList("table_key")},updateJoinStatement:function(a){var b=document.getElements("#join"+a+" .inputbox");b=Array.from(b);var c=b[0].get("value"),d=b[1].get("value"),e=b[2].get("value"),f=b[3].get("value"),g=b[4].get("value"),h=c+" JOIN "+e+" ON "+d+"."+f+" = "+e+"."+g,i=document.id("join-desc-"+a);"null"!==typeOf(i)&&i.set("html",h)}});return ListForm});