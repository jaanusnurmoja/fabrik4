/*! Fabrik */

var DateFilter=new Class({Implements:[Options],options:{calendarSetup:{eventName:"click",ifFormat:"%Y/%m/%d",daFormat:"%Y/%m/%d",singleClick:!0,align:"Br",range:[1900,2999],showsTime:!1,timeFormat:"24",electric:!0,step:2,cache:!1,showOthers:!1}},initialize:function(t){this.setOptions(t),this.cals=$H({});for(var a=0;a<this.options.ids.length;a++)this.makeCalendar(this.options.ids[a],this.options.buttons[a])},makeCalendar:function(i,t){if(this.cals[i])this.cals[i].show();else if(t=document.id(t),"null"!==typeOf(t)){this.addEventToCalOpts();var a=Object.clone(this.options.calendarSetup);a.inputField=document.id(i);var s=a.inputField||a.displayArea,e=a.inputField?a.ifFormat:a.daFormat;this.cals[i]=null,s&&(a.date=Date.parseDate(s.value||s.innerHTML,e)),this.cals[i]=new Calendar(a.firstDay,a.date,a.onSelect,a.onClose),this.cals[i].setDateStatusHandler(a.dateStatusFunc),this.cals[i].setDateToolTipHandler(a.dateTooltipFunc),this.cals[i].showsTime=a.showsTime,this.cals[i].time24="24"===a.timeFormat.toString(),this.cals[i].weekNumbers=a.weekNumbers,this.cals[i].showsOtherMonths=a.showOthers,this.cals[i].yearStep=a.step,this.cals[i].setRange(a.range[0],a.range[1]),this.cals[i].params=a,this.cals[i].params.button=t,this.cals[i].getDateText=a.dateText,this.cals[i].setDateFormat(e),this.cals[i].create(),this.cals[i].refresh(),this.cals[i].hide(),t.addEvent("click",function(t){t.stop(),this.cals[i].params.position?this.cal.showAt(this.cals[i].params.position[0],paramss[i].position[1]):this.cals[i].showAtElement(this.cals[i].params.button||this.cals[i].params.displayArea||this.cals[i].params.inputField,this.cals[i].params.align),this.cals[i].show()}.bind(this)),this.cals[i].params.inputField.addEvent("blur",function(t){var a=this.cals[i].params.inputField.value;if(""!==a){var s=Date.parseDate(a,this.cals[i].params.ifFormat);this.cals[i].date=s}}.bind(this));return function(){this.cals[i].hide()}.delay(100,this),this.cals[i]}},dateSelect:function(t){return!1},calSelect:function(t,a){this.update(t,t.date.format("db")),t.dateClicked&&t.callCloseHandler()},calClose:function(t){t.hide()},update:function(t,a){a&&("string"===typeOf(a)&&(a=Date.parse(a)),t.params.inputField.value=a.format(this.options.calendarSetup.ifFormat))},addEventToCalOpts:function(){this.options.calendarSetup.onSelect=function(t,a){this.calSelect(t,a)}.bind(this),this.options.calendarSetup.dateStatusFunc=function(t){return this.dateSelect(t)}.bind(this),this.options.calendarSetup.onClose=function(t){this.calClose(t)}.bind(this)},onSubmit:function(){this.cals.each(function(t){""!==t.params.inputField.value&&(t.params.inputField.value=t.date.format("db"))}.bind(this))},onUpdateData:function(){this.cals.each(function(t){""!==t.params.inputField.value&&this.update(t,t.date)}.bind(this))}});