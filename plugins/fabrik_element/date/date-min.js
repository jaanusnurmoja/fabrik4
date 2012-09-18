var FbDateTime=new Class({Extends:FbElement,options:{dateTimeFormat:"",calendarSetup:{eventName:"click",ifFormat:"%Y/%m/%d",daFormat:"%Y/%m/%d",singleClick:true,align:"Br",range:[1900,2999],showsTime:false,timeFormat:"24",electric:true,step:2,cache:false,showOthers:false,advanced:false}},initialize:function(b,a){this.parent(b,a);this.hour="0";this.plugin="fabrikdate";this.minute="00";this.buttonBg="#ffffff";this.buttonBgSelected="#88dd33";this.startElement=b;this.setUpDone=false;this.setUp()},setUp:function(){if(this.options.editable){this.watchButtons();if(this.options.typing===false){this.disableTyping()}else{this.getDateField().addEvent("blur",function(c){var b=this.getDateField().value;if(b!==""){var f;if(this.options.advanced){f=Date.parseExact(b,Date.normalizeFormat(this.options.calendarSetup.ifFormat))}else{f=Date.parseDate(b,this.options.calendarSetup.ifFormat)}this.setTimeFromField(f);this.update(f)}else{this.options.value=""}}.bind(this))}this.makeCalendar();var a=function(){this.cal.hide()};a.delay(100,this);this.element.getElement("img.calendarbutton").addEvent("click",function(b){if(!this.cal.params.position){this.cal.showAtElement(this.cal.params.button||this.cal.params.displayArea||this.cal.params.inputField,this.cal.params.align)}else{this.cal.showAt(this.cal.params.position[0],params.position[1])}this.cal.show()}.bind(this));Fabrik.addEvent("fabrik.form.submit.failed",function(c,b){this.afterAjaxValidation()}.bind(this))}},dateSelect:function(date){var fn=this.options.calendarSetup.dateAllowFunc;if(typeOf(fn)!=="null"&&fn!==""){eval(fn);return result}try{return disallowDate(this.cal,date)}catch(err){}},calSelect:function(b,a){var c=this.setTimeFromField(b.date);this.update(c.format("db"));if(this.cal.dateClicked){this.getDateField().fireEvent("change");if(this.timeButton){this.getTimeField().fireEvent("change")}this.cal.callCloseHandler()}window.fireEvent("fabrik.date.select",this);Fabrik.fireEvent("fabrik.date.select",this)},calClose:function(a){this.cal.hide();window.fireEvent("fabrik.date.close",this);if(this.options.validations){this.form.doElementValidation(this.options.element)}},onsubmit:function(){var a=this.getValue();if(a!==""){if(this.options.editable){this.getDateField().value=a}}return true},afterAjaxValidation:function(){this.update(this.getValue())},makeCalendar:function(){if(this.cal){this.cal.show();return}var h=false;this.addEventToCalOpts();var g=this.options.calendarSetup;var b=["displayArea","button"];for(i=0;i<b.length;i++){if(typeof g[b[i]]==="string"){g[b[i]]=document.getElementById(g[b[i]])}}g.inputField=this.getDateField();var a=g.inputField||g.displayArea;var c=g.inputField?g.ifFormat:g.daFormat;this.cal=null;if(a){if(this.options.advanced){g.date=Date.parseExact(a.value||a.innerHTML,Date.normalizeFormat(c))}else{g.date=Date.parseDate(a.value||a.innerHTML,c)}}this.cal=new Calendar(g.firstDay,g.date,g.onSelect,g.onClose);this.cal.setDateStatusHandler(g.dateStatusFunc);this.cal.setDateToolTipHandler(g.dateTooltipFunc);this.cal.showsTime=g.showsTime;this.cal.time24=(g.timeFormat.toString()==="24");this.cal.weekNumbers=g.weekNumbers;if(g.multiple){cal.multiple={};for(i=g.multiple.length;--i>=0;){var f=g.multiple[i];var e=f.print("%Y%m%d");this.cal.multiple[e]=f}}this.cal.showsOtherMonths=g.showOthers;this.cal.yearStep=g.step;this.cal.setRange(g.range[0],g.range[1]);this.cal.params=g;this.cal.getDateText=g.dateText;this.cal.setDateFormat(c);this.cal.create();this.cal.refresh();this.cal.hide()},disableTyping:function(){if(typeOf(this.element)==="null"){fconsole(element+": not date element container - is this a custom template with a missing $element->containerClass div/li surrounding the element?");return}this.element.setProperty("readonly","readonly");this.element.getElements(".fabrikinput").each(function(a){a.addEvent("focus",function(b){if(typeOf(b)==="null"){return}if(b.target.hasClass("timeField")){this.getContainer().getElement(".timeButton").fireEvent("click")}else{this.options.calendarSetup.inputField=b.target.id;this.options.calendarSetup.button=this.element.id+"_img";this.addEventToCalOpts()}}.bind(this))}.bind(this))},getValue:function(){var a;if(!this.options.editable){return this.options.value}this.getElement();if(this.cal){if(this.getDateField().value===""){return""}a=this.cal.date}else{if(this.options.value===""||this.options.value===null){return""}a=new Date.parse(this.options.value)}a=this.setTimeFromField(a);return a.format("db")},hasSeconds:function(){if(this.options.showtime===true&&this.timeElement){if(this.options.dateTimeFormat.contains("%S")){return true}if(this.options.dateTimeFormat.contains("%T")){return true}}return false},setTimeFromField:function(j){if(this.options.showtime===true&&this.timeElement){var g=this.timeElement.get("value").toUpperCase();var b=g.contains("PM")?true:false;g=g.replace("PM","").replace("AM","");var c=g.split(":");var f=c[0]?c[0].toInt():0;if(b){f+=12}var a=c[1]?c[1].toInt():0;j.setHours(f);j.setMinutes(a);if(c[2]&&this.hasSeconds()){var e=c[2]?c[2].toInt():0;j.setSeconds(e)}else{j.setSeconds(0)}}else{}return j},watchButtons:function(){if(this.options.showtime&this.options.editable){this.getTimeField();this.getTimeButton();if(this.timeButton){this.timeButton.removeEvents("click");this.timeButton.addEvent("click",function(){this.showTime()}.bind(this));if(!this.setUpDone){if(this.timeElement){this.dropdown=this.makeDropDown();this.setAbsolutePos(this.timeElement);this.setUpDone=true}}}}},addNewEventAux:function(action,js){if(action==="change"){Fabrik.addEvent("fabrik.date.select",function(){var e="fabrik.date.select";typeOf(js)==="function"?js.delay(0):eval(js)})}this.element.getElements("input").each(function(i){i.addEvent(action,function(e){if(typeOf(e)==="event"){e.stop()}typeOf(js)==="function"?js.delay(0):eval(js)})}.bind(this))},addNewEvent:function(a,b){if(a==="load"){this.loadEvents.push(b);this.runLoadEvent(b)}else{if(!this.element){this.element=document.id(this.strElement)}if(a==="change"){this.changeEvents.push(b)}this.addNewEventAux(a,b)}},update:function(c){this.getElement();if(c==="invalid date"){fconsole(this.element.id+": date not updated as not valid");return}var a;if(typeOf(c)==="string"){a=Date.parse(c);if(a===null){return}}else{a=c}var b=this.options.calendarSetup.ifFormat;if(this.options.dateTimeFormat!==""&&this.options.showtime){b+=" "+this.options.dateTimeFormat}this.fireEvents(["change"]);if(typeOf(c)==="null"||c===false){return}if(!this.options.editable){if(typeOf(this.element)!=="null"){this.element.set("html",a.format(b))}return}if(this.options.hidden){a=a.format(b);this.getDateField().value=a;return}else{this.getTimeField();this.hour=a.get("hours");this.minute=a.get("minutes");this.second=a.get("seconds");this.stateTime()}this.cal.date=a;this.getDateField().value=a.format(this.options.calendarSetup.ifFormat)},getDateField:function(){return this.element.getElement(".fabrikinput")},getTimeField:function(){this.timeElement=this.getContainer().getElement(".timeField");return this.timeElement},getTimeButton:function(){this.timeButton=this.getContainer().getElement(".timeButton");return this.timeButton},showCalendar:function(b,a){},getAbsolutePos:function(b){var c={x:b.offsetLeft,y:b.offsetTop};if(b.offsetParent){var a=this.getAbsolutePos(b.offsetParent);c.x+=a.x;c.y+=a.y}return c},setAbsolutePos:function(a){var b=this.getAbsolutePos(a);this.dropdown.setStyles({position:"absolute",left:b.x,top:b.y+30})},makeDropDown:function(){var b=null;var e=new Element("div",{styles:{height:"20px",curor:"move",color:"#dddddd",padding:"2px;","background-color":"#333333"},id:this.startElement+"_handle"}).appendText(this.options.timelabel);var g=new Element("div",{className:"fbDateTime",styles:{"z-index":999999,display:"none",cursor:"move",width:"264px",height:"125px",border:"1px solid #999999",backgroundColor:"#EEEEEE"}});g.appendChild(e);for(var a=0;a<24;a++){b=new Element("div",{styles:{width:"20px","float":"left",cursor:"pointer","background-color":"#ffffff",margin:"1px","text-align":"center"}});b.innerHTML=a;b.className="fbdateTime-hour";g.appendChild(b);document.id(b).addEvent("click",function(d){this.hour=d.target.innerHTML;this.stateTime();this.setActive()}.bind(this));document.id(b).addEvent("mouseover",function(d){if(this.hour!==d.target.innerHTML){d.target.setStyles({background:"#cbeefb"})}}.bind(this));document.id(b).addEvent("mouseout",function(d){if(this.hour!==d.target.innerHTML){b.setStyles({background:this.buttonBg})}}.bind(this))}var c=new Element("div",{styles:{clear:"both",paddingTop:"5px"}});for(a=0;a<12;a++){b=new Element("div",{styles:{width:"41px","float":"left",cursor:"pointer",background:"#ffffff",margin:"1px","text-align":"center"}});b.setStyles();b.innerHTML=":"+(a*5);b.className="fbdateTime-minute";c.appendChild(b);document.id(b).addEvent("click",function(d){this.minute=this.formatMinute(d.target.innerHTML);this.stateTime();this.setActive()}.bind(this));b.addEvent("mouseover",function(j){var d=j.target;if(this.minute!==this.formatMinute(d.innerHTML)){j.target.setStyles({background:"#cbeefb"})}}.bind(this));b.addEvent("mouseout",function(j){var d=j.target;if(this.minute!==this.formatMinute(d.innerHTML)){j.target.setStyles({background:this.buttonBg})}}.bind(this))}g.appendChild(c);document.addEvent("click",function(h){if(this.timeActive){var d=h.target;if(d!==this.timeButton&&d!==this.timeElement){if(!d.within(this.dropdown)){this.hideTime()}}}}.bind(this));g.injectInside(document.body);var f=new Drag.Move(g);return g},toggleTime:function(){if(this.dropdown.style.display==="none"){this.doShowTime()}else{this.hideTime()}},doShowTime:function(){this.dropdown.setStyles({display:"block"});this.timeActive=true;Fabrik.fireEvent("fabrik.date.showtime",this)},hideTime:function(){this.timeActive=false;this.dropdown.hide();if(this.options.validations!==false){this.form.doElementValidation(this.element.id)}Fabrik.fireEvent("fabrik.date.hidetime",this);Fabrik.fireEvent("fabrik.date.select",this);window.fireEvent("fabrik.date.select",this)},formatMinute:function(a){a=a.replace(":","");a.pad("2","0","left");return a},stateTime:function(){if(this.timeElement){var a=this.hour.toString().pad("2","0","left")+":"+this.minute.toString().pad("2","0","left");if(this.second){a+=":"+this.second.toString().pad("2","0","left")}var b=this.timeElement.value!==a;this.timeElement.value=a;if(b){this.fireEvents(["change"])}}},showTime:function(){this.setAbsolutePos(this.timeElement);this.toggleTime();this.setActive()},setActive:function(){var a=this.dropdown.getElements(".fbdateTime-hour");a.each(function(c){c.setStyles({backgroundColor:this.buttonBg})},this);var b=this.dropdown.getElements(".fbdateTime-minute");b.each(function(c){c.setStyles({backgroundColor:this.buttonBg})},this);a[this.hour.toInt()].setStyles({backgroundColor:this.buttonBgSelected});if(typeOf(b[this.minute/5])!=="null"){b[this.minute/5].setStyles({backgroundColor:this.buttonBgSelected})}},addEventToCalOpts:function(){this.options.calendarSetup.onSelect=function(b,a){this.calSelect(b,a)}.bind(this);this.options.calendarSetup.dateStatusFunc=function(a){return this.dateSelect(a)}.bind(this);this.options.calendarSetup.onClose=function(a){this.calClose(a)}.bind(this)},cloned:function(d){this.setUpDone=false;this.hour=0;delete this.cal;var a=this.element.getElement("img");if(a){a.id=this.element.id+"_cal_img"}var b=this.element.getElement("input");b.id=this.element.id+"_cal";this.options.calendarSetup.inputField=b.id;this.options.calendarSetup.button=this.element.id+"_img";this.makeCalendar();this.cal.hide();this.setUp()}});