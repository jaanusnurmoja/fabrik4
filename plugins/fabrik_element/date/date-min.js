var FbDateTime=new Class({Extends:FbElement,initialize:function(b,a){this.parent(b,a);this.hour="0";this.plugin="fabrikdate";this.minute="00";this.buttonBg="#ffffff";this.buttonBgSelected="#88dd33";this.startElement=b;this.setUp=false;this.watchButtons();if(this.options.typing===false){this.disableTyping()}},disableTyping:function(){if(typeOf(this.element)==="null"){fconsole(element+": not date element container - is this a custom template with a missing $element->containerClass div/li surrounding the element?");return}this.element.setProperty("readonly","readonly");this.element.getElements(".fabrikinput").each(function(a){a.addEvent("focus",function(b){if(typeOf(b)==="null"){return}if(b.target.hasClass("timeField")){this.element.getParent(".fabrikElementContainer").getElement(".timeButton").fireEvent("click")}else{this.options.calendarSetup.inputField=b.target.id;this.options.calendarSetup.button=this.element.id+"_img";this.addEventToCalOpts();Calendar.setup(this.options.calendarSetup)}}.bind(this))}.bind(this))},getValue:function(){if(!this.options.editable){return this.options.value}this.getElement();var a=this.element.getElement(".fabrikinput").get("value");if(this.options.showtime===true&&this.timeElement){a+=" "+this.timeElement.get("value")}return a},watchButtons:function(){var a=document.id(this.options.element+"_cal_img");if(typeOf(a)!=="null"){a.addEvent("click",function(b){this.showCalendar("y-mm-dd",b)}.bind(this))}if(this.options.showtime&this.options.editable){this.timeElement=this.element.getParent(".fabrikElementContainer").getElement(".timeField");this.timeButton=this.element.getParent(".fabrikElementContainer").getElement(".timeButton");if(this.timeButton){this.timeButton.removeEvents("click");this.timeButton.addEvent("click",function(){this.showTime()}.bind(this));if(!this.setUp){if(this.timeElement){this.dropdown=this.makeDropDown();this.setAbsolutePos(this.timeElement);this.setUp=true}}}}},addNewEvent:function(action,js){if(action==="load"){this.loadEvents.push(js);this.runLoadEvent(js)}else{if(!this.element){this.element=$(this.strElement)}if(action==="change"){window.addEvent("fabrik.date.select",function(){typeOf(js)==="function"?js.delay(0):eval(js)})}this.element.getElements("input").each(function(i){i.addEvent(action,function(e){if(typeOf(e)==="event"){e.stop()}typeOf(js)==="function"?js.delay(0):eval(js)})}.bind(this))}},update:function(e){var a;this.fireEvents(["change"]);if(typeOf(e)==="null"||e===false){return}if(!this.options.editable){if(typeOf(this.element)!=="null"){this.element.set("html",e)}return}if(this.options.hidden){a=e}else{this.timeElement=this.element.getParent(".fabrikElementContainer").getElement(".timeField");var b=e.split(" ");a=b[0];var c=(b.length>1)?b[1].substring(0,5):"00:00";var d=c.split(":");this.hour=d[0];this.minute=d[1];this.stateTime()}this.element.getElement(".fabrikinput").value=a},showCalendar:function(d,c){if(window.ie){var a=$(window.calendar.element).getStyle("height").toInt();c=new Event(c);var b=ie?event.clientY+document.documentElement.scrollTop:c.pageY;b=b.toInt();$(window.calendar.element).setStyles({top:b-a+"px"})}},getAbsolutePos:function(b){var c={x:b.offsetLeft,y:b.offsetTop};if(b.offsetParent){var a=this.getAbsolutePos(b.offsetParent);c.x+=a.x;c.y+=a.y}return c},setAbsolutePos:function(a){var b=this.getAbsolutePos(a);this.dropdown.setStyles({position:"absolute",left:b.x,top:b.y+30})},makeDropDown:function(){var b=null;var e=new Element("div",{styles:{height:"20px",curor:"move",color:"#dddddd",padding:"2px;","background-color":"#333333"},id:this.startElement+"_handle"}).appendText(this.options.timelabel);var g=new Element("div",{className:"fbDateTime",styles:{"z-index":999999,display:"none",cursor:"move",width:"264px",height:"125px",border:"1px solid #999999",backgroundColor:"#EEEEEE"}});g.appendChild(e);for(var a=0;a<24;a++){b=new Element("div",{styles:{width:"20px","float":"left",cursor:"pointer","background-color":"#ffffff",margin:"1px","text-align":"center"}});b.innerHTML=a;b.className="fbdateTime-hour";g.appendChild(b);$(b).addEvent("click",function(d){var h=new Event(d);this.hour=$(h.target).innerHTML;this.stateTime();this.setActive()}.bind(this));$(b).addEvent("mouseover",function(i){var j=new Event(i);var d=$(j.target);if(this.hour!==d.innerHTML){j.target.setStyles({background:"#cbeefb"})}}.bind(this));$(b).addEvent("mouseout",function(i){var j=new Event(i);var d=$(j.target);if(this.hour!==d.innerHTML){d.setStyles({background:this.buttonBg})}}.bind(this))}var c=new Element("div",{styles:{clear:"both",paddingTop:"5px"}});for(a=0;a<12;a++){b=new Element("div",{styles:{width:"41px","float":"left",cursor:"pointer",background:"#ffffff",margin:"1px","text-align":"center"}});b.setStyles();b.innerHTML=":"+(a*5);b.className="fbdateTime-minute";c.appendChild(b);$(b).addEvent("click",function(d){this.minute=this.formatMinute(d.target.innerHTML);this.stateTime();this.setActive()}.bind(this));b.addEvent("mouseover",function(i){var d=i.target;if(this.minute!==this.formatMinute(d.innerHTML)){i.target.setStyles({background:"#cbeefb"})}}.bind(this));b.addEvent("mouseout",function(i){var d=i.target;if(this.minute!==this.formatMinute(d.innerHTML)){i.target.setStyles({background:this.buttonBg})}}.bind(this))}g.appendChild(c);document.addEvent("click",function(h){if(this.timeActive){var d=h.target;if(d!==this.timeButton&&d!==this.timeElement){if(!d.within(this.dropdown)){this.hideTime()}}}}.bind(this));g.injectInside(document.body);var f=new Drag.Move(g);return g},toggleTime:function(){if(this.dropdown.style.display==="none"){this.doShowTime()}else{this.hideTime()}},doShowTime:function(){this.dropdown.setStyles({display:"block"});this.timeActive=true;window.fireEvent("fabrik.date.showtime",this)},hideTime:function(){this.timeActive=false;this.dropdown.setStyles({display:"none"});this.form.doElementValidation(this.element.id);window.fireEvent("fabrik.date.hidetime",this);window.fireEvent("fabrik.date.select",this)},formatMinute:function(a){a=a.replace(":","");if(a.length===1){a="0"+a}return a},stateTime:function(){if(this.timeElement){var a=this.hour+":"+this.minute;var b=this.timeElement.value!==a;this.timeElement.value=a;if(b){this.fireEvents(["change"])}}},showTime:function(){this.setAbsolutePos(this.timeElement);this.toggleTime();this.setActive()},setActive:function(){var a=this.dropdown.getElements(".fbdateTime-hour");a.each(function(c){c.setStyles({backgroundColor:this.buttonBg})},this);var b=this.dropdown.getElements(".fbdateTime-minute");b.each(function(c){c.setStyles({backgroundColor:this.buttonBg})},this);a[this.hour.toInt()].setStyles({backgroundColor:this.buttonBgSelected});b[this.minute/5].setStyles({backgroundColor:this.buttonBgSelected})},addEventToCalOpts:function(){var f=this.form;var a=this.element.id;var c=this;var e=function(h){window.fireEvent("fabrik.date.close",this);this.hide();try{f.triggerEvents(a,["blur","click","change"],c)}catch(g){}};var d=function(h,g){elementid=h.params.inputField.id.replace("_cal","");h.params.inputField.value=g;window.fireEvent("fabrik.date.select",this);if(h.dateClicked){h.callCloseHandler()}};var b=function(g){try{return disallowDate(this,g)}catch(h){}};this.options.calendarSetup.onClose=e;this.options.calendarSetup.onSelect=d;this.options.calendarSetup.dateStatusFunc=b},cloned:function(d){this.setUp=false;this.hour=0;this.watchButtons();var a=this.element.getElement("img");if(a){a.id=this.element.id+"_img"}var b=this.element.getElement("input");b.id=this.element.id+"_cal";this.options.calendarSetup.inputField=b.id;this.options.calendarSetup.button=this.element.id+"_img";if(this.options.typing===false){this.disableTyping()}this.addEventToCalOpts();if(this.options.hidden!==true){Calendar.setup(this.options.calendarSetup)}}});