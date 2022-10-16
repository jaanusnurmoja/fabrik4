/*! Fabrik */

Calendar.setup=function(o){function e(e,t){void 0===o[e]&&(o[e]=t)}e("inputField",null),e("displayArea",null),e("button",null),e("eventName","click"),e("ifFormat","%Y/%m/%d"),e("daFormat","%Y/%m/%d"),e("singleClick",!0),e("disableFunc",null),e("dateStatusFunc",o.disableFunc),e("dateTooltipFunc",null),e("dateText",null),e("firstDay",null),e("align","Br"),e("range",[1900,2999]),e("weekNumbers",!0),e("flat",null),e("flatCallback",null),e("onSelect",null),e("onClose",null),e("onUpdate",null),e("date",null),e("showsTime",!1),e("timeFormat","24"),e("electric",!0),e("step",2),e("position",null),e("cache",!1),e("showOthers",!1),e("multiple",null);var t=["inputField","displayArea","button"];for(var a in t)"string"==typeof o[t[a]]&&(o[t[a]]=document.getElementById(o[t[a]]));if(!(o.flat||o.multiple||o.inputField||o.displayArea||o.button))return alert("Calendar.setup:\n  Nothing to setup (no fields found).  Please check your code"),!1;function u(e){var t=e.params,a=e.dateClicked||t.electric;a&&t.inputField&&(t.inputField.value=e.date.print(t.ifFormat),"function"==typeof t.inputField.onchange&&t.inputField.onchange()),a&&t.displayArea&&(t.displayArea.innerHTML=e.date.print(t.daFormat)),a&&"function"==typeof t.onUpdate&&t.onUpdate(e),a&&t.flat&&"function"==typeof t.flatCallback&&t.flatCallback(e),a&&t.singleClick&&e.dateClicked&&e.callCloseHandler()}if(null==o.flat)return(o.button||o.displayArea||o.inputField)["on"+o.eventName]=function(){var e=o.inputField||o.displayArea,t=o.inputField?o.ifFormat:o.daFormat,a=!1,l=window.calendar;if(e&&(o.date=Date.parseDate(e.value||e.innerHTML,t)),l&&o.cache?(o.date&&l.setDate(o.date),l.hide()):(window.calendar=l=new Calendar(o.firstDay,o.date,o.onSelect||u,o.onClose||function(e){e.hide()}),l.setDateToolTipHandler(o.dateTooltipFunc),l.showsTime=o.showsTime,l.time24="24"==o.timeFormat,l.weekNumbers=o.weekNumbers,a=!0),o.multiple){l.multiple={};for(var n=o.multiple.length;0<=--n;){var i=o.multiple[n],r=i.print("%Y%m%d");l.multiple[r]=i}}return l.showsOtherMonths=o.showOthers,l.yearStep=o.step,l.setRange(o.range[0],o.range[1]),l.params=o,l.setDateStatusHandler(o.dateStatusFunc),l.getDateText=o.dateText,l.setDateFormat(t),a&&l.create(),l.refresh(),o.position?l.showAt(o.position[0],o.position[1]):l.showAtElement(o.button||o.displayArea||o.inputField,o.align),!1},l;if("string"==typeof o.flat&&(o.flat=document.getElementById(o.flat)),!o.flat)return alert("Calendar.setup:\n  Flat specified but can't find parent."),!1;var l=new Calendar(o.firstDay,o.date,o.onSelect||u);return l.setDateToolTipHandler(o.dateTooltipFunc),l.showsOtherMonths=o.showOthers,l.showsTime=o.showsTime,l.time24="24"==o.timeFormat,l.params=o,l.weekNumbers=o.weekNumbers,l.setRange(o.range[0],o.range[1]),l.setDateStatusHandler(o.dateStatusFunc),l.getDateText=o.dateText,o.ifFormat&&l.setDateFormat(o.ifFormat),o.inputField&&"string"==typeof o.inputField.value&&l.parseDate(o.inputField.value),l.create(o.flat),l.show(),!1};