var fabrikCalendar=new Class({Implements:[Options],options:{days:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],shortDays:["Sun","Mon","Tues","Wed","Thur","Fri","Sat"],months:["January","Feburary","March","April","May","June","July","August","September","October","November","December"],shortMonths:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],viewType:"month",calendarId:1,tmpl:"default",Itemid:0,colors:{bg:"#F7F7F7",highlight:"#FFFFDF",headingBg:"#C3D9FF",today:"#dddddd",headingColor:"#135CAE",entryColor:"#eeffff"},eventLists:[],listid:0,popwiny:0,urlfilters:[],url:{add:"index.php?option=com_fabrik&controller=visualization.calendar&view=visualization&task=getEvents&format=raw",del:"index.php?option=com_fabrik&controller=visualization.calendar&view=visualization&task=deleteEvent&format=raw"},monthday:{width:90,height:80},restFilterStart:"na",j3:false},initialize:function(a){this.firstRun=true;this.el=document.id(a);this.SECOND=1000;this.MINUTE=this.SECOND*60;this.HOUR=this.MINUTE*60;this.DAY=this.HOUR*24;this.WEEK=this.DAY*7;this.date=new Date();this.selectedDate=new Date();this.entries=$H();this.droppables={month:[],week:[],day:[]};this.fx={};this.ajax={};if(typeOf(this.el.getElement(".calendar-message"))!=="null"){this.fx.showMsg=new Fx.Morph(this.el.getElement(".calendar-message"),{duration:700});this.fx.showMsg.set({opacity:0})}this.colwidth={};this.windowopts={id:"addeventwin",title:"add/edit event",loadMethod:"xhr",minimizable:false,evalScripts:true,width:380,height:320,onContentLoaded:function(b){b.fitToContent()}.bind(this)};Fabrik.addEvent("fabrik.form.submitted",function(c,b){this.ajax.updateEvents.send();Fabrik.Windows.addeventwin.close()}.bind(this))},removeFormEvents:function(a){this.entries.each(function(c,b){if(typeof(c)!=="undefined"&&c.formid===a){this.entries.dispose(b)}}.bind(this))},_makeEventRelDiv:function(o,a,f){var n,g;var m=o.label;a.left===a.left?a.left:0;a["margin-left"]===a["margin-left"]?a["margin-left"]:0;var h=(o.colour!=="")?o.colour:this.options.colors.entryColor;if(a.startMin===0){a.startMin=a.startMin+"0"}if(a.endMin===0){a.endMin=a.endMin+"0"}var p=a.view?a.view:"dayView";var b={"background-color":this._getColor(h,f),width:a.width,cursor:"pointer","margin-left":a["margin-left"],top:a.top.toInt()+"px",position:"absolute",border:"1px solid #666666","border-right":"0","border-left":"0",overflow:"auto",opacity:0.6};if(a.height){b.height=a.height.toInt()+"px"}if(a.left){b.left=a.left.toInt()+1+"px"}b["max-width"]=a["max-width"]?a["max-width"]-10+"px":"";var c="fabrikEvent_"+o._listid+"_"+o.id;if(a.view==="monthView"){b.width-=1}if(this.options.j3){var l="";if(o._canDelete){l+=this.options.buttons.del}if(o._canEdit){l+=this.options.buttons.edit}if(o._canView){l+=this.options.buttons.view}var k="Start: "+new Date(o.startdate).format("%X")+"<br /> End :"+o.enddate.format("%X");if(l!==""){l+='<hr /><div class="btn-group" style="text-align:center">'+l+"</div>"}g=new Element("a",{"class":"fabrikEvent label",id:c,styles:b,rel:"popover","data-original-title":m+'<button class="close" data-popover="'+c+'">&times;</button>',"data-content":k,"data-placement":"top","data-html":"true","data-trigger":"click"});if(typeof(jQuery)!=="undefined"){jQuery(g).popover()}}else{g=new Element("div",{"class":"fabrikEvent label",id:c,styles:b});g.addEvent("mouseenter",function(q){this.doPopupEvent(q,o,m)}.bind(this))}if(o.link!==""&&this.options.readonly===false&&this.options.j3===false){n=new Element("a",{href:o.link,"class":"fabrikEditEvent",events:{click:function(r){r.stop();var s={};var q=r.target.getParent(".fabrikEvent").id.replace("fabrikEvent_","").split("_");s.rowid=q[1];s.listid=q[0];this.addEvForm(s)}.bind(this)}}).appendText(m)}else{n=new Element("span").appendText(m)}g.adopt(n);return g},doPopupEvent:function(h,f,b){var k;var g=this.activeHoverEvent;this.activeHoverEvent=h.target.hasClass("fabrikEvent")?h.target:h.target.getParent(".fabrikEvent");if(!f._canDelete){this.popWin.getElement(".popupDelete").hide()}else{this.popWin.getElement(".popupDelete").show()}if(!f._canEdit){this.popWin.getElement(".popupEdit").hide();this.popWin.getElement(".popupView").show()}else{this.popWin.getElement(".popupEdit").show();this.popWin.getElement(".popupView").hide()}if(this.activeHoverEvent){k=this.activeHoverEvent.getCoordinates()}else{k={top:0,left:0}}var a=this.popup.getElement("div[class=popLabel]");a.empty();a.set("text",b);this.activeDay=h.target.getParent();var c=k.top-this.popWin.getSize().y;var l={opacity:[0,1],top:[k.top+50,k.top-10]};this.inFadeOut=false;this.popWin.setStyles({left:k.left+20,top:k.top});this.fx.showEventActions.cancel().set({opacity:0}).start.delay(500,this.fx.showEventActions,l)},_getFirstDayInMonthCalendar:function(f){var b=new Date();b.setTime(f.valueOf());if(f.getDay()!==this.options.first_week_day){var c=f.getDay()-this.options.first_week_day;if(c<0){c=7+c}f.setTime(f.valueOf()-(c*24*60*60*1000))}if(b.getMonth()===f.getMonth()){var a=7*24*60*60*1000;while(f.getDate()>1){f.setTime(f.valueOf()-this.DAY)}}return f},showMonth:function(){var g=new Date();g.setTime(this.date.valueOf());g.setDate(1);g=this._getFirstDayInMonthCalendar(g);var a=this.el.getElements(".monthView tr");var k=0;for(var b=1;b<a.length;b++){var f=a[b].getElements("td");var h=0;f.each(function(m){m.setProperties({"class":""});m.addClass(g.getTime());if(g.getMonth()!==this.date.getMonth()){m.addClass("otherMonth")}if(this.selectedDate.isSameDay(g)){m.addClass("selectedDay")}m.empty();m.adopt(new Element("div",{"class":"date",styles:{"background-color":this._getColor("#E8EEF7",g)}}).appendText(g.getDate()));var c=0;this.entries.each(function(n){if((n.enddate!==""&&g.isDateBetween(n.startdate,n.enddate))||(n.enddate===""&&n.startdate.isSameDay(g))){c++}}.bind(this));var l=0;this.entries.each(function(r){if((r.enddate!==""&&g.isDateBetween(r.startdate,r.enddate))||(r.enddate===""&&r.startdate.isSameDay(g))){var o=m.getElements(".fabrikEvent").length;var n=20;var s=m.getElement(".date").getSize().y;n=Math.floor((m.getSize().y-c-s)/(c));var u=(m.getSize().y*(b-1))+this.el.getElement(".monthView .dayHeading").getSize().y+s;this.colwidth[".monthView"]=this.colwidth[".monthView"]?this.colwidth[".monthView"]:m.getSize().x;var p=m.getSize().x;p=this.colwidth[".monthView"];u=u+(o*n);var t=p*h;var q={view:"monthView","max-width":p};q.top=u;if(window.ie){q.left=t}q.startHour=r.startdate.getHours();q.endHour=r.enddate.getHours();q.startMin=r.startdate.getMinutes();q.endMin=r.enddate.getMinutes();q["margin-left"]=0;m.adopt(this._makeEventRelDiv(r,q,g))}l++}.bind(this));g.setTime(g.getTime()+this.DAY);h++}.bind(this))}document.addEvent("mousemove",function(m){var l=m.target;var c=m.client.x;var q=m.client.y;var o=this.activeArea;if(typeOf(o)!=="null"&&typeOf(this.activeDay)!=="null"){if((c<=o.left||c>=o.right)||(q<=o.top||q>=o.bottom)){if(!this.inFadeOut){var n=this.activeHoverEvent.getCoordinates();var p={opacity:[1,0],top:[n.top-10,n.top+50]};this.fx.showEventActions.cancel().start.delay(500,this.fx.showEventActions,p)}this.activeDay=null}}}.bind(this));this.entries.each(function(l){var c=this.el.getElement(".fabrikEvent_"+l._listid+"_"+l.id);if(c){}}.bind(this));this._highLightToday();this.el.getElement(".monthDisplay").innerHTML=this.options.months[this.date.getMonth()]+" "+this.date.getFullYear()},_makePopUpWin:function(){if(typeOf(this.popup)==="null"){var b=new Element("div",{"class":"popLabel"});var a=new Element("div",{"class":"popupDelete"}).set("html",this.options.buttons);this.popup=new Element("div",{"class":"popWin",styles:{position:"absolute"}}).adopt([b,a]);this.popup.inject(document.body);this.activeArea=null;this.fx.showEventActions=new Fx.Morph(this.popup,{duration:500,transition:Fx.Transitions.Quad.easeInOut,onCancel:function(){}.bind(this),onComplete:function(g){if(this.activeHoverEvent){var c=this.popup.getCoordinates();var k=this.activeHoverEvent.getCoordinates();var f=window.getScrollTop();var h={};h.left=(c.left<k.left)?c.left:k.left;h.top=(c.top<k.top)?c.top:k.top;h.top=h.top-f;h.right=(c.right>k.right)?c.right:k.right;h.bottom=(c.bottom>k.bottom)?c.bottom:k.bottom;h.bottom=h.bottom-f;this.activeArea=h;this.inFadeOut=false}}.bind(this)})}return this.popup},makeDragMonthEntry:function(a){},removeWeekEvents:function(){var h=this.date.getDay();h=h-this.options.first_week_day.toInt();var g=new Date();g.setTime(this.date.getTime()-(h*this.DAY));var c={};var a=this.el.getElements(".weekView tr");for(var b=1;b<a.length;b++){g.setHours(b-1,0,0);if(b!==1){g.setTime(g.getTime()-(6*this.DAY))}var f=a[b].getElements("td");for(j=1;j<f.length;j++){if(typeOf(c[j-1])==="null"){c[j-1]=[]}var k=f[j];c[j-1].push(k);if(j!==1){g.setTime(g.getTime()+this.DAY)}k.addClass("day");if(typeOf(k.retrieve("calevents"))!=="null"){k.retrieve("calevents").each(function(l){l.destroy()})}k.eliminate("calevents");k.className="";k.addClass("day");k.addClass(g.getTime()-this.HOUR);if(this.selectedDate.isSameWeek(g)&&this.selectedDate.isSameDay(g)){k.addClass("selectedDay")}else{k.removeClass("selectedDay")}}}return c},showWeek:function(){var m,n;var r=this.date.getDay();r=r-this.options.first_week_day.toInt();var b=new Date();b.setTime(this.date.getTime()-(r*this.DAY));var g=new Date();g.setTime(this.date.getTime()-(r*this.DAY));var f=new Date();f.setTime(this.date.getTime()+((6-r)*this.DAY));this.el.getElement(".monthDisplay").innerHTML=(b.getDate())+"  "+this.options.months[b.getMonth()]+" "+b.getFullYear()+" - ";this.el.getElement(".monthDisplay").innerHTML+=(f.getDate())+"  "+this.options.months[f.getMonth()]+" "+f.getFullYear();var p=this.el.getElements(".weekView tr");var c=p[0].getElements("th");var s=this.removeWeekEvents();for(i=0;i<c.length;i++){c[i].className="dayHeading";c[i].addClass(g.getTime());c[i].innerHTML=this.options.shortDays[g.getDay()]+" "+g.getDate()+"/"+this.options.shortMonths[g.getMonth()];var q=10;var o={};var l={};var a=s[i];this.entries.each(function(v){if((v.enddate!==""&&g.isDateBetween(v.startdate,v.enddate))||(v.enddate===""&&v.startdate.isSameDay(g))){var u=this._buildEventOpts({entry:v,curdate:g,divclass:".weekView",tdOffset:i});for(var t=u.startHour;t<=u.endHour;t++){o[t]=typeOf(o[t])==="null"?0:o[t]+1}}}.bind(this));var k=1;Object.each(o,function(h){if(h>k){k=h}});this.entries.each(function(w){if((w.enddate!==""&&g.isDateBetween(w.startdate,w.enddate))||(w.enddate===""&&w.startdate.isSameDay(g))){var v=this._buildEventOpts({entry:w,curdate:g,divclass:".weekView",tdOffset:i});for(var t=v.startHour;t<=v.endHour;t++){l[t]=typeOf(l[t])==="null"?0:l[t]+1}var x=0;for(t=v.startHour;t<=v.endHour;t++){if(l[t]>x){x=l[t]}}td=a[v.startHour];q=Math.floor((td.getSize().x-k)/(k+1));v.width=q+"px";v["margin-left"]=x*(q+1);var y=this._makeEventRelDiv(w,v);y.inject(document.body);y.store("opts",v);var u=td.retrieve("calevents",[]);u.push(y);td.store("calevents",u);y.position({relativeTo:td,position:"upperLeft"})}}.bind(this));g.setTime(g.getTime()+this.DAY)}},_buildEventOpts:function(a){var g=a.curdate;var r=new CloneObject(a.entry,true,["enddate","startdate"]);var n=this.el.getElements(a.divclass+" tr");var l=(r.startdate.isSameDay(g))?r.startdate.getHours()-this.options.open:0;l=l<0?0:l;var m=a.tdOffset;r.label=r.label?r.label:"";var h=n[l+1].getElements("td")[m+1];var q=r.startdate.getHours();var p=h.getSize().y;this.colwidth[a.divclass]=this.colwidth[a.divclass]?this.colwidth[a.divclass]:h.getSize().x;var o=this.el.getElement(a.divclass).getElement("tr").getSize().y;colwidth=this.colwidth[a.divclass];var f=(colwidth*m);f+=this.el.getElement(a.divclass).getElement("td").getSize().x;var k=Math.ceil(r.enddate.getHours()-r.startdate.getHours());if(k===0){k=1}if(r.startdate.getDay()!==r.enddate.getDay()){k=this.options.open!==0||this.options.close!==24?this.options.close-this.options.open+1:24;if(r.startdate.isSameDay(g)){k=this.options.open!==0||this.options.close!==24?this.options.close-this.options.open+1:24-r.startdate.getHours()}else{r.startdate.setHours(0);if(r.enddate.isSameDay(g)){k=this.options.open!==0||this.options.close!==24?this.options.close-this.options.open:r.enddate.getHours()}}}o=o+(p*l);var t=(p*k);if(r.enddate.isSameDay(g)){t+=(r.enddate.getMinutes()/60*p)}if(r.startdate.isSameDay(g)){o+=(r.startdate.getMinutes()/60*p);t-=(r.startdate.getMinutes()/60*p)}var c=h.getElements(".fabrikEvent");var b=colwidth/(c.length+1);var u=b*c.length;c.setStyle("width",b+"px");var s=a.divclass.substr(1,a.divclass.length);b-=h.getStyle("border-width").toInt();a={"margin-left":u+"px",height:t,view:"weekView","background-color":this._getColor(this.options.colors.headingBg)};a["max-width"]=b+"px";a.left=f;a.top=o;a.color=this._getColor(this.options.colors.headingColor,r.startdate);a.startHour=r.startdate.getHours();a.endHour=a.startHour+k;a.startMin=r.startdate.getMinutes();a.endMin=r.enddate.getMinutes();r.startdate.setHours(q);return a},removeDayEvents:function(){var c=new Date();var f=[];c.setTime(this.date.valueOf());c.setHours(0,0);var a=this.el.getElements(".dayView tr");for(var b=1;b<a.length;b++){c.setHours(b-1,0);var g=a[b].getElements("td")[1];if(typeOf(g)!=="null"){f.push(g);g.className="";g.addClass("day");if(typeOf(g.retrieve("calevents"))!=="null"){g.retrieve("calevents").each(function(h){h.destroy()})}g.eliminate("calevents");g.addClass(c.getTime()-this.HOUR)}}return f},showDay:function(){var a=this.el.getElements(".dayView tr"),c;a[0].childNodes[1].innerHTML=this.options.days[this.date.getDay()];var l=this.removeDayEvents();var k=100;var g={};var f={};this.entries.each(function(o){if((o.enddate!==""&&this.date.isDateBetween(o.startdate,o.enddate))||(o.enddate===""&&o.startdate.isSameDay(firstDate))){var n=this._buildEventOpts({entry:o,curdate:this.date,divclass:".dayView",tdOffset:0});for(var m=n.startHour;m<=n.endHour;m++){f[m]=typeOf(f[m])==="null"?0:f[m]+1}}}.bind(this));var b=1;Object.each(f,function(h){if(h>b){b=h}});this.entries.each(function(q){if((q.enddate!==""&&this.date.isDateBetween(q.startdate,q.enddate))||(q.enddate===""&&q.startdate.isSameDay(firstDate))){var p=this._buildEventOpts({entry:q,curdate:this.date,divclass:".dayView",tdOffset:0});td=l[p.startHour];k=Math.floor((td.getSize().x-b)/(b+1));p.width=k+"px";for(var n=p.startHour;n<=p.endHour;n++){g[n]=typeOf(g[n])==="null"?0:g[n]+1}var m=0;for(n=p.startHour;n<=p.endHour;n++){if(g[n]>m){m=g[n]}}p["margin-left"]=m*(k+1);var r=this._makeEventRelDiv(q,p);r.inject(document.body);r.store("opts",p);var o=td.retrieve("calevents",[]);o.push(r);td.store("calevents",o);r.position({relativeTo:td,position:"upperLeft"})}}.bind(this));this.el.getElement(".monthDisplay").innerHTML=(this.date.getDate())+"  "+this.options.months[this.date.getMonth()]+" "+this.date.getFullYear()},renderMonthView:function(){var l,m;this.popWin.setStyle("opacity",0);var a=this._getFirstDayInMonthCalendar(new Date());var g=this.options.days.slice(this.options.first_week_day).concat(this.options.days.slice(0,this.options.first_week_day));var b=new Date();b.setTime(a.valueOf());if(a.getDay()!==this.options.first_week_day){var f=a.getDay()-this.options.first_week_day;b.setTime(a.valueOf()-(f*24*60*60*1000))}this.options.viewType="monthView";if(!this.mothView){tbody=new Element("tbody",{"class":"viewContainerTBody"});m=new Element("tr");for(l=0;l<7;l++){m.adopt(new Element("th",{"class":"dayHeading",styles:{width:"80px",height:"20px","text-align":"center",color:this._getColor(this.options.colors.headingColor,b),"background-color":this._getColor(this.options.colors.headingBg,b)}}).appendText(g[l]));b.setTime(b.getTime()+this.DAY)}tbody.appendChild(m);var p=this.options.colors.highlight;var n=this.options.colors.bg;var k=this.options.colors.today;for(var h=0;h<6;h++){m=new Element("tr");var o=this;for(l=0;l<7;l++){var q=this.options.colors.bg;var c=(this.selectedDate.isSameDay(a))?"selectedDay":"";m.adopt(new Element("td",{"class":"day "+(a.getTime())+c,styles:{width:this.options.monthday.width+"px",height:this.options.monthday.height+"px","background-color":q,"vertical-align":"top",padding:0,border:"1px solid #cccccc"},events:{mouseenter:function(){this.setStyles({"background-color":p})},mouseleave:function(){this.set("morph",{duration:500,transition:Fx.Transitions.Sine.easeInOut});var r=(this.hasClass("today"))?k:n;this.morph({"background-color":[p,r]})},click:function(r){o.selectedDate.setTime(this.className.split(" ")[1]);o.date.setTime(o._getTimeFromClassName(this.className));o.el.getElements("td").each(function(s){s.removeClass("selectedDay");if(s!==this){s.setStyles({"background-color":"#F7F7F7"})}}.bind(this));this.addClass("selectedDay")},dblclick:function(r){this.openAddEvent(r)}.bind(this)}}));a.setTime(a.getTime()+this.DAY)}tbody.appendChild(m)}this.mothView=new Element("div",{"class":"monthView",styles:{position:"relative"}}).adopt(new Element("table",{styles:{"border-collapse":"collapse"}}).adopt(tbody));this.el.getElement(".viewContainer").appendChild(this.mothView)}this.showView("monthView")},_getTimeFromClassName:function(a){return a.replace("today","").replace("selectedDay","").replace("day","").replace("otherMonth","").trim()},openAddEvent:function(k){var l;if(this.options.canAdd===0){return}k.stop();if(k.target.className==="addEventButton"){var a=new Date();l=a.getTime()}else{l=this._getTimeFromClassName(k.target.className)}this.date.setTime(l);d=0;if(!isNaN(l)&&l!==""){var h=new Date();h.setTime(l);var c=h.getMonth()+1;c=(c<10)?"0"+c:c;var n=h.getDate();n=(n<10)?"0"+n:n;var f=h.getHours();f=(f<10)?"0"+f:f;var g=h.getMinutes();g=(g<10)?"0"+g:g;this.doubleclickdate=h.getFullYear()+"-"+c+"-"+n+" "+f+":"+g+":00";d="&jos_fabrik_calendar_events___start_date="+this.doubleclickdate}if(this.options.eventLists.length>1){this.openChooseEventTypeForm(this.doubleclickdate,l)}else{var b={};b.rowid=0;b.id="";d="&"+this.options.eventLists[0].startdate_element+"="+this.doubleclickdate;b.listid=this.options.eventLists[0].value;this.addEvForm(b)}},openChooseEventTypeForm:function(c,a){var b="index.php?option=com_fabrik&tmpl=component&view=visualization&controller=visualization.calendar&task=chooseaddevent&id="+this.options.calendarId+"&d="+c+"&rawd="+a;this.windowopts.contentURL=b;this.windowopts.id="chooseeventwin";this.windowopts.onContentLoaded=function(){var f=new Fx.Scroll(window).toElement("chooseeventwin")};Fabrik.getWindow(this.windowopts)},addEvForm:function(c){this.windowopts.id="addeventwin";var a="index.php?option=com_fabrik&controller=visualization.calendar&view=visualization&task=addEvForm&format=raw&listid="+c.listid+"&rowid="+c.rowid;a+="&jos_fabrik_calendar_events___visualization_id="+this.options.calendarId;a+="&visualizationid="+this.options.calendarId;if(c.nextView){a+="&nextview="+c.nextView}a+="&fabrik_window_id="+this.windowopts.id;if(typeof(this.doubleclickdate)!=="undefined"){a+="&start_date="+this.doubleclickdate}this.windowopts.type="window";this.windowopts.contentURL=a;var b=this.options.filters;this.windowopts.onContentLoaded=function(f){var g=new Fx.Scroll(window).toElement("addeventwin");b.each(function(h){if(document.id(h.key)){switch(document.id(h.key).get("tag")){case"select":document.id(h.key).selectedIndex=h.val;break;case"input":document.id(h.key).value=h.val;break}}});f.fitToContent()}.bind(this);Fabrik.getWindow(this.windowopts)},_highLightToday:function(){var a=new Date();this.el.getElements(".viewContainerTBody td").each(function(c){var b=new Date(this._getTimeFromClassName(c.className).toInt());if(a.equalsTo(b)){c.addClass("today")}else{c.removeClass("today")}}.bind(this))},centerOnToday:function(){this.date=new Date();this.showView()},renderDayView:function(){var b,c;this.popWin.setStyle("opacity",0);this.options.viewType="dayView";if(!this.dayView){tbody=new Element("tbody");b=new Element("tr");for(c=0;c<2;c++){if(c===0){b.adopt(new Element("td",{"class":"day"}))}else{b.adopt(new Element("th",{"class":"dayHeading",styles:{width:"80px",height:"20px","text-align":"center",color:this.options.headingColor,"background-color":this.options.colors.headingBg}}).appendText(this.options.days[this.date.getDay()]))}}tbody.appendChild(b);this.options.open=this.options.open<0?0:this.options.open;(this.options.close>24||this.options.close<this.options.open)?this.options.close=24:this.options.close;for(i=this.options.open;i<(this.options.close+1);i++){b=new Element("tr");for(c=0;c<2;c++){if(c===0){var a=(i.length===1)?i+"0:00":i+":00";b.adopt(new Element("td",{"class":"day"}).appendText(a))}else{b.adopt(new Element("td",{"class":"day",styles:{width:"100%",height:"10px","background-color":"#F7F7F7","vertical-align":"top",padding:0,border:"1px solid #cccccc"},events:{mouseenter:function(f){this.setStyles({"background-color":"#FFFFDF"})},mouseleave:function(f){this.setStyles({"background-color":"#F7F7F7"})},dblclick:function(f){this.openAddEvent(f)}.bind(this)}}))}}tbody.appendChild(b)}this.dayView=new Element("div",{"class":"dayView",styles:{position:"relative"}}).adopt(new Element("table",{"class":"",styles:{"border-collapse":"collapse"}}).adopt(tbody));this.el.getElement(".viewContainer").appendChild(this.dayView)}this.showView("dayView")},hideDayView:function(){if(this.el.getElement(".dayView")){this.el.getElement(".dayView").hide();this.removeDayEvents()}},hideWeekView:function(){if(this.el.getElement(".weekView")){this.el.getElement(".weekView").hide();this.removeWeekEvents()}},showView:function(a){this.hideDayView();this.hideWeekView();if(this.el.getElement(".monthView")){this.el.getElement(".monthView").hide()}this.el.getElement("."+this.options.viewType).style.display="block";switch(this.options.viewType){case"dayView":this.showDay();break;case"weekView":this.showWeek();break;default:case"monthView":this.showMonth();break}Cookie.write("fabrik.viz.calendar.view",this.options.viewType)},renderWeekView:function(){var f,h,g,b,c;this.popWin.setStyle("opacity",0);c=this.options.showweekends===false?6:8;this.options.viewType="weekView";if(!this.weekView){b=new Element("tbody");g=new Element("tr");for(h=0;h<c;h++){if(h===0){g.adopt(new Element("td",{"class":"day"}))}else{g.adopt(new Element("th",{"class":"dayHeading",styles:{width:this.options.weekday.width+"px",height:(this.options.weekday.height-10)+"px","text-align":"center",color:this.options.headingColor,"background-color":this.options.colors.headingBg},events:{click:function(l){l.stop();this.selectedDate.setTime(l.target.className.replace("dayHeading ","").toInt());var k=new Date();l.target.getParent().getParent().getElements("td").each(function(n){var m=n.className.replace("day ","").replace(" selectedDay").toInt();k.setTime(m);if(k.getDayOfYear()===this.selectedDate.getDayOfYear()){n.addClass("selectedDay")}else{n.removeClass("selectedDay")}}.bind(this))}.bind(this)}}).appendText(this.options.days[h-1]))}}b.appendChild(g);this.options.open=this.options.open<0?0:this.options.open;(this.options.close>24||this.options.close<this.options.open)?this.options.close=24:this.options.close;for(f=this.options.open;f<(this.options.close+1);f++){g=new Element("tr");for(h=0;h<c;h++){if(h===0){var a=(f.length===1)?f+"0:00":f+":00";g.adopt(new Element("td",{"class":"day"}).appendText(a))}else{g.adopt(new Element("td",{"class":"day",styles:{width:this.options.weekday.width+"px",height:this.options.weekday.height+"px","background-color":"#F7F7F7","vertical-align":"top",padding:0,border:"1px solid #cccccc"},events:{mouseenter:function(k){if(!this.hasClass("selectedDay")){this.setStyles({"background-color":"#FFFFDF"})}},mouseleave:function(k){if(!this.hasClass("selectedDay")){this.setStyles({"background-color":"#F7F7F7"})}},dblclick:function(k){this.openAddEvent(k)}.bind(this)}}))}}b.appendChild(g)}this.weekView=new Element("div",{"class":"weekView",styles:{position:"relative"}}).adopt(new Element("table",{styles:{"border-collapse":"collapse"}}).adopt(b));this.el.getElement(".viewContainer").appendChild(this.weekView)}this.showWeek();this.showView("weekView")},render:function(c){this.setOptions(c);document.addEvent("click:relay(button[data-task=deleteCalEvent], a[data-task=deleteCalEvent])",function(h,k){h.preventDefault();this.deleteEntry()}.bind(this));document.addEvent("click:relay(button[data-task=editCalEvent], a[data-task=editCalEvent])",function(h,k){h.preventDefault();this.editEntry()}.bind(this));document.addEvent("click:relay(button[data-task=viewCalEvent], a[data-task=viewCalEvent])",function(h,k){h.preventDefault();this.viewEntry()}.bind(this));document.addEvent("click:relay(a.fabrikEvent)",function(k,h){this.activeHoverEvent=k.target.hasClass("fabrikEvent")?k.target:k.target.getParent(".fabrikEvent")}.bind(this));this.windowopts.title=Joomla.JText._("PLG_VISUALIZATION_CALENDAR_ADD_EDIT_EVENT");this.windowopts.y=this.options.popwiny;this.popWin=this._makePopUpWin();var g=this.options.urlfilters;g.visualizationid=this.options.calendarId;if(this.firstRun){this.firstRun=false;g.resetfilters=this.options.restFilterStart}this.ajax.updateEvents=new Request({url:this.options.url.add,data:g,evalScripts:true,onComplete:function(k){var l=k.stripScripts(true);var h=JSON.decode(l);this.addEntries(h);this.showView()}.bind(this)});this.ajax.deleteEvent=new Request({url:this.options.url.del,data:{visualizationid:this.options.calendarId},onComplete:function(k){k=k.stripScripts(true);var h=JSON.decode(k);this.entries=$H();this.addEntries(h)}.bind(this)});if(typeOf(this.el.getElement(".addEventButton"))!=="null"){this.el.getElement(".addEventButton").addEvent("click",function(h){this.openAddEvent(h)}.bind(this))}var b=[];var f=new Element("div",{"class":"calendarNav"}).adopt(new Element("ul",{"class":"viewMode"}).adopt(b));this.el.appendChild(f);this.el.appendChild(new Element("div",{"class":"viewContainer"}));if(typeOf(Cookie.read("fabrik.viz.calendar.date"))!=="null"){this.date=new Date(Cookie.read("fabrik.viz.calendar.date"))}var a=typeOf(Cookie.read("fabrik.viz.calendar.view"))==="null"?this.options.viewType:Cookie.read("fabrik.viz.calendar.view");switch(a){case"dayView":this.renderDayView();break;case"weekView":this.renderWeekView();break;default:case"monthView":this.renderMonthView();break}this.el.getElement(".nextPage").addEvent("click",function(h){this.nextPage(h)}.bind(this));this.el.getElement(".previousPage").addEvent("click",function(h){this.previousPage(h)}.bind(this));if(this.options.show_day){this.el.getElement(".dayViewLink").addEvent("click",function(h){this.renderDayView(h)}.bind(this))}if(this.options.show_week){this.el.getElement(".weekViewLink").addEvent("click",function(h){this.renderWeekView(h)}.bind(this))}if(this.options.show_week||this.options.show_day){this.el.getElement(".monthViewLink").addEvent("click",function(h){this.renderMonthView(h)}.bind(this))}this.el.getElement(".centerOnToday").addEvent("click",function(h){this.centerOnToday(h)}.bind(this));this.showMonth();this.ajax.updateEvents.send()},showMessage:function(a){this.el.getElement(".calendar-message").set("html",a);this.fx.showMsg.start({opacity:[0,1]}).chain(function(){this.start.delay(2000,this,{opacity:[1,0]})})},addEntry:function(b,h){var g,c,a,f;if(h.startdate){g=h.startdate.split(" ");g=g[0];if(g.trim()===""){return}f=h.startdate.split(" ");f=f[1];f=f.split(":");g=g.split("-");c=new Date();a=(g[1]).toInt()-1;c.setYear(g[0]);c.setMonth(a,g[2]);c.setDate(g[2]);c.setHours(f[0].toInt());c.setMinutes(f[1].toInt());c.setSeconds(f[2].toInt());h.startdate=c;this.entries.set(b,h);if(h.enddate){g=h.enddate.split(" ");g=g[0];if(g.trim()===""){return}if(g==="0000-00-00"){h.enddate=h.startdate;return}f=h.enddate.split(" ");f=f[1];f=f.split(":");g=g.split("-");c=new Date();a=(g[1]).toInt()-1;c.setYear(g[0]);c.setMonth(a,g[2]);c.setDate(g[2]);c.setHours(f[0].toInt());c.setMinutes(f[1].toInt());c.setSeconds(f[2].toInt());h.enddate=c}}},deleteEntry:function(){var c=this.activeHoverEvent.id.replace("fabrikEvent_","");var b=c.split("_");var a=b[0];if(!this.options.deleteables.contains(a)){return}if(confirm(Joomla.JText._("PLG_VISUALIZATION_CALENDAR_CONF_DELETE"))){this.ajax.deleteEvent.options.data={id:b[1],listid:a};this.ajax.deleteEvent.send();document.id(this.activeHoverEvent).fade("out");this.fx.showEventActions.start({opacity:[1,0]});this.removeEntry(c);this.activeDay=null}},editEntry:function(){var b={};b.id=this.options.formid;var a=this.activeHoverEvent.id.replace("fabrikEvent_","").split("_");b.rowid=a[1];b.listid=a[0];e.stop();this.addEvForm(b)},viewEntry:function(){var b={};b.id=this.options.formid;var a=this.activeHoverEvent.id.replace("fabrikEvent_","").split("_");b.rowid=a[1];b.listid=a[0];b.nextView="details";this.addEvForm(b)},addEntries:function(b){b=$H(b);b.each(function(c,a){this.addEntry(a,c)}.bind(this));this.showView()},removeEntry:function(a){this.entries.erase(a);this.showView()},nextPage:function(){this.popWin.setStyle("opacity",0);switch(this.options.viewType){case"dayView":this.date.setTime(this.date.getTime()+this.DAY);this.showDay();break;case"weekView":this.date.setTime(this.date.getTime()+this.WEEK);this.showWeek();break;case"monthView":this.date.setDate(1);this.date.setMonth(this.date.getMonth()+1);this.showMonth();break}Cookie.write("fabrik.viz.calendar.date",this.date)},previousPage:function(){this.popWin.setStyle("opacity",0);switch(this.options.viewType){case"dayView":this.date.setTime(this.date.getTime()-this.DAY);this.showDay();break;case"weekView":this.date.setTime(this.date.getTime()-this.WEEK);this.showWeek();break;case"monthView":this.date.setMonth(this.date.getMonth()-1);this.showMonth();break}Cookie.write("fabrik.viz.calendar.date",this.date)},addLegend:function(b){var c=new Element("ul");b.each(function(f){var a=new Element("li");a.adopt(new Element("div",{styles:{"background-color":f.colour}}),new Element("span").appendText(f.label));c.appendChild(a)}.bind(this));new Element("div",{"class":"legend"}).adopt([new Element("h3").appendText(Joomla.JText._("PLG_VISUALIZATION_CALENDAR_KEY")),c]).inject(this.el,"after")},_getGreyscaleFromRgb:function(c){var h=parseInt(c.substring(1,3),16);var f=parseInt(c.substring(3,5),16);var a=parseInt(c.substring(5),16);var k=parseInt(0.3*h+0.59*f+0.11*a,10);return"#"+k.toString(16)+k.toString(16)+k.toString(16)},_getColor:function(a,f){if(this.options.greyscaledweekend===0){return a}var b=new Color(a);if(typeOf(f)!=="null"&&(f.getDay()===0||f.getDay()===6)){return this._getGreyscaleFromRgb(a)}else{return a}}});Date._MD=new Array(31,28,31,30,31,30,31,31,30,31,30,31);Date.SECOND=1000;Date.MINUTE=60*Date.SECOND;Date.HOUR=60*Date.MINUTE;Date.DAY=24*Date.HOUR;Date.WEEK=7*Date.DAY;Date.prototype.getMonthDays=function(b){var a=this.getFullYear();if(typeof b==="undefined"){b=this.getMonth()}if(((0===(a%4))&&((0!==(a%100))||(0===(a%400))))&&b===1){return 29}else{return Date._MD[b]}};Date.prototype.isSameWeek=function(a){return((this.getFullYear()===a.getFullYear())&&(this.getMonth()===a.getMonth())&&(this.getWeekNumber()===a.getWeekNumber()))};Date.prototype.isSameDay=function(a){return((this.getFullYear()===a.getFullYear())&&(this.getMonth()===a.getMonth())&&(this.getDate()===a.getDate()))};Date.prototype.isSameHour=function(a){return((this.getFullYear()===a.getFullYear())&&(this.getMonth()===a.getMonth())&&(this.getDate()===a.getDate())&&(this.getHours()===a.getHours()))};Date.prototype.isDateBetween=function(c,b){var f=c.getFullYear()*10000+(c.getMonth()+1)*100+c.getDate();var g=b.getFullYear()*10000+(b.getMonth()+1)*100+b.getDate();var a=this.getFullYear()*10000+(this.getMonth()+1)*100+this.getDate();return f<=a&&a<=g};
