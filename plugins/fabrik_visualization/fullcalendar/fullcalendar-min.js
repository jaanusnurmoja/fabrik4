/*! Fabrik */
define(["jquery","fab/fabrik","fullcalendar"],function(a,b){var c=new Class({Implements:[Options],options:{canAdd:!1,show_week:!1,show_day:!1,default_view:"dayView",time_format:"",first_week_day:1,minDuration:0,greyscaledweekend:!1,calOptions:{},startOffset:0,url:{del:"index.php?option=com_fabrik&controller=visualization.fullcalendar&view=visualization&task=deleteEvent&format=raw"}},initialize:function(c,d){function e(a,b,c){k=a,l=c.name,g.calendar.on("mousemove",f)}function f(){k=l=null,g.calendar.off("mousemove",f)}var g=this,h="",i=[];this.el=a("#"+c),this.calendar=this.el.find('*[data-role="calendar"]'),this.setOptions(d),this.date=new Date,this.clickdate=null,this.ajax={},this.windowopts={id:"addeventwin",title:"",loadMethod:"xhr",minimizable:!1,evalScripts:!0},this.el.find(".addEventButton").on("click",function(a){a.preventDefault(),g.openAddEvent(a)}),b.addEvent("fabrik.form.submitted",function(){g.calendar.fullCalendar("refetchEvents"),b.Windows.addeventwin.close()}),this.options.eventLists.each(function(a,b){i.push({events:function(c,d,e,f){new Request({url:this.options.url.add+"&listid="+a.value+"&eventListKey="+b,evalScripts:!0,onSuccess:function(a,b){"null"!==typeOf(b)&&this.processEvents(b,f)}.bind(this,f)}).send()}.bind(this),color:a.colour})}.bind(this)),this.options.show_week!==!1&&(h+="agendaWeek"),this.options.show_day!==!1&&(h.length>0&&(h+=","),h+="agendaDay"),h.length>0&&(h="month,"+h);var j="month";switch(this.options.default_view){case"monthView":break;case"weekView":this.options.show_week!==!1&&(j="agendaWeek");break;case"dayView":this.options.show_day!==!1&&(j="agendaDay")}var k=null,l=null;this.calendar.dblclick(function(a){k&&g.openAddEvent(a,l,k)}),this.calOptions={header:{left:"prev,next today",center:"title",right:h},fixedWeekCount:!1,timeFormat:this.options.time_format,defaultView:j,nextDayThreshold:"00:00:00",firstDay:this.options.first_week_day,eventSources:i,defaultTimedEventDuration:this.options.minDuration,minTime:this.options.open,maxTime:this.options.close,weekends:this.options.showweekends,eventClick:function(a,b){return b.stopPropagation(),b.preventDefault(),g.clickEntry(a),!1},dayClick:e,viewRender:function(){g.options.greyscaledweekend===!0&&(a("td.fc-sat").css("background","#f2f2f2"),a("td.fc-sun").css("background","#f2f2f2"))},eventRender:function(a,b){b.find(".fc-title").html(a.title)},loading:function(b){b||a(".fc-view-container").delegate(".popover button.jclose","click",function(){var b=a(this).data("popover");a("#"+b).popover("hide")})}},a.extend(!0,this.calOptions,JSON.parse(g.options.calOptions)),this.calendar.fullCalendar(this.calOptions),document.addEvent("click:relay(button[data-task=viewCalEvent], a[data-task=viewCalEvent])",function(b){b.preventDefault();var c=b.target.findClassUp("calEventButtons").id;c=c.replace(/_buttons/,"");var d=g.calendar.fullCalendar("clientEvents",c)[0];a("#"+c).popover("hide"),g.viewEntry(d)}),document.addEvent("click:relay(button[data-task=editCalEvent], a[data-task=editCalEvent])",function(b){b.preventDefault();var c=b.target.findClassUp("calEventButtons").id;c=c.replace(/_buttons/,"");var d=g.calendar.fullCalendar("clientEvents",c)[0];a("#"+c).popover("hide"),g.editEntry(d)}),document.addEvent("click:relay(button[data-task=deleteCalEvent], a[data-task=deleteCalEvent])",function(b){b.preventDefault();var c=b.target.findClassUp("calEventButtons").id;c=c.replace(/_buttons/,"");var d=g.calendar.fullCalendar("clientEvents",c)[0];a("#"+c).popover("hide"),g.deleteEntry(d)}),a(document).on("click",".popover .jclose",function(b){b.preventDefault();var c=a(b.target).attr("data-popover");a("#"+c).popover("hide")}),this.ajax.deleteEvent=new Request({url:this.options.url.del,data:{visualizationid:this.options.calendarId},onComplete:function(){g.calendar.fullCalendar("refetchEvents")}})},processEvents:function(c,d){c=$H(JSON.decode(c));var e,f,g,h,i,j,k,l,m,n,o,p,q,r,s=[];c.each(function(c){n=a(b.jLayouts["fabrik-visualization-fullcalendar-event-popup"])[0],o=c._listid+"_"+c.id,n.id="fabrikevent_"+o,p=a(b.jLayouts["fabrik-visualization-fullcalendar-viewevent"])[0],q=moment(c.startdate),r=moment(c.enddate),l=m="",(moment(r.format("YYYY-MM-DD"))>moment(q.format("YYYY-MM-DD"))||c.startShowTime===!1&&c.endShowTime===!1)&&(l=q.format("MMM DD")+" ",m=r.format("MMM DD")+" "),e=f="",c.startShowTime===!0&&c.endShowTime===!0&&(e=q.format("hh.mm A"),f=r.format("hh.mm A")),p.getElement("#viewstart").innerHTML=l+e,p.getElement("#viewend").innerHTML=m+f,g=a(b.jLayouts["fabrik-visualization-fullcalendar-viewbuttons"]),g[0].id="fabrikevent_buttons_"+o,i=g.find(".popupDelete"),c._canDelete===!1?i.remove():i.attr("title",Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_DELETE")),j=g.find(".popupEdit"),c._canEdit===!1?j.remove():j.attr("title",Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_EDIT")),k=g.find(".popupView"),c._canView===!1?k.remove():k.attr("title",Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_VIEW")),a(n).attr("data-content",a(p).prop("outerHTML")+g.prop("outerHTML")),h=""===l?"auto":"200px",a(n).attr("data-title",'<div style="width:'+h+'; height: 35px;"><div style="float:right;"><button class="btn jclose" data-popover="'+n.id+'" data-toggle="tooltip" title="'+Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_CLOSE")+'"><i class="icon-remove"></i></button></div><div style="text-align:center;">'+c.label+"</div></div>"),a(n).append(c.label),s.push({id:n.id,title:a(n).prop("outerHTML"),start:c.startdate,end:c.enddate,url:c.link,className:c.status,allDay:c.allday,listid:c._listid,rowid:c.__pk_val,formid:c._formid})}.bind(s)),d(s)},addEvForm:function(c){var d=this;"undefined"!=typeof a&&a(this.popOver).popover("hide"),this.windowopts.id="addeventwin";var e="index.php?option=com_fabrik&controller=visualization.fullcalendar&view=visualization&task=addEvForm&listid="+c.listid+"&rowid="+c.rowid;if(e+="&visualizationid="+this.options.calendarId,e+="&format=partial",c.nextView&&(e+="&nextview="+c.nextView),e+="&fabrik_window_id="+this.windowopts.id,null!==this.clickdate){this.clickdate=moment(this.clickdate).add({h:this.options.startOffset}).format("YYYY-MM-DD HH:mm:ss");var f=d.calendar.fullCalendar("option","defaultTimedEventDuration").split(":"),g=moment(this.clickdate).add({h:f[0],m:f[1],s:f[2]}).format("YYYY-MM-DD HH:mm:ss");e+="&start_date="+this.clickdate+"&end_date="+g}this.windowopts.type="window",this.windowopts.contentURL=e,this.windowopts.title=c.title,this.windowopts.modalId="fullcalendar_addeventwin";var h=this.options.filters;this.windowopts.onContentLoaded=function(){h.each(function(a){if(document.id(a.key))switch(document.id(a.key).get("tag")){case"select":document.id(a.key).selectedIndex=a.val;break;case"input":document.id(a.key).value=a.val}}),this.fitToContent(!1)},b.getWindow(this.windowopts)},viewEntry:function(a){this.clickdate=null;var b={};b.id=a.formid,b.rowid=a.rowid,b.listid=a.listid,b.nextView="details",b.title=Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_VIEW_EVENT"),this.addEvForm(b)},editEntry:function(a){this.clickdate=null;var b={};b.id=a.formid,b.rowid=a.rowid,b.listid=a.listid,b.nextView="form",b.title=Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_EDIT_EVENT"),this.addEvForm(b)},deleteEntry:function(a){window.confirm(Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_CONF_DELETE"))&&(this.ajax.deleteEvent.options.data={id:a.rowid,listid:a.listid},this.ajax.deleteEvent.send())},clickEntry:function(b){if(this.options.showFullDetails===!1){var c="fabrikevent_"+b.listid+"_"+b.rowid;a("#"+c).popover("toggle")}else this.viewEntry(b)},openAddEvent:function(a,b,c){var d,e,f,g,h,i,j,k;if(this.options.canAdd!==!1&&("month"!==b||this.options.readonlyMonth!==!0)){switch(a.type){case"dblclick":k=c;break;case"click":k=moment();break;default:return void window.alert("Unknown event in OpenAddEvent: "+a.type)}"month"===b?f=g="00":(f=(f=k.hour())<10?"0"+f:f,g=(g=k.minute())<10?"0"+g:g),e=(e=k.date())<10?"0"+e:e,h=(h=k.month()+1)<10?"0"+h:h,i=k.year(),this.clickdate=i+"-"+h+"-"+e+" "+f+":"+g+":00",("dblclick"!==a.type||this.dateInLimits(this.clickdate))&&(this.options.eventLists.length>1?this.openChooseEventTypeForm(this.clickdate,d):(j={},j.rowid="",j.id="",j.listid=this.options.eventLists[0].value,j.title=Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_ADD_EVENT"),this.addEvForm(j)))}},dateInLimits:function(a){var b=new moment(a);if(""!==this.options.dateLimits.min){var c=new moment(this.options.dateLimits.min);if(b.isBefore(c))return window.alert(Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_DATE_ADD_TOO_EARLY")),!1}if(""!==this.options.dateLimits.max){var d=new moment(this.options.dateLimits.max);if(b.isAfter(d))return window.alert(Joomla.JText._("PLG_VISUALIZATION_FULLCALENDAR_DATE_ADD_TOO_LATE")),!1}return!0},openChooseEventTypeForm:function(a,c){var d="index.php?option=com_fabrik&tmpl=component&view=visualization&controller=visualization.fullcalendar&task=chooseAddEvent&format=partial&id="+this.options.calendarId+"&d="+a+"&rawd="+c;d+="&renderContext="+this.el.prop("id").replace(/visualization_/,""),this.windowopts.contentURL=d,this.windowopts.id="chooseeventwin",this.windowopts.modalId="fullcalendar_!chooseeventwin",b.getWindow(this.windowopts)}});return c});