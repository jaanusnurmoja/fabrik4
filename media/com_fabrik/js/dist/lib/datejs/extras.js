/*! Fabrik */

!function(){var u=Date,e=u.prototype,o=(u.CultureInfo,[]),i=function(e,t){return t||(t=2),("000"+e).slice(-1*t)};u.normalizeFormat=function(e){o=[];(new Date).$format(e);return o.join("")},u.strftime=function(e,t){return new Date(1e3*t).$format(e)},u.strtotime=function(e){var t=u.parse(e);return t.addMinutes(-1*t.getTimezoneOffset()),Math.round(u.UTC(t.getUTCFullYear(),t.getUTCMonth(),t.getUTCDate(),t.getUTCHours(),t.getUTCMinutes(),t.getUTCSeconds(),t.getUTCMilliseconds())/1e3)},e.$format=function(e){var s,n=this,c=function(e){return o.push(e),n.toString(e)};return e?e.replace(/(%|\\)?.|%%/g,function(e){if("\\"===e.charAt(0)||"%%"===e.substring(0,2))return e.replace("\\","").replace("%%","%");switch(e){case"d":case"%d":return c("dd");case"D":case"%a":return c("ddd");case"j":case"%e":return c("d");case"l":case"%A":return c("dddd");case"N":case"%u":return n.getDay()+1;case"S":return c("S");case"w":case"%w":return n.getDay();case"z":return n.getOrdinalNumber();case"%j":return i(n.getOrdinalNumber(),3);case"%U":var t=n.clone().set({month:0,day:1}).addDays(-1).moveToDayOfWeek(0),r=n.clone().addDays(1).moveToDayOfWeek(0,-1);return r<t?"00":i((r.getOrdinalNumber()-t.getOrdinalNumber())/7+1);case"W":case"%V":return n.getISOWeek();case"%W":return i(n.getWeek());case"F":case"%B":return c("MMMM");case"m":case"%m":return c("MM");case"M":case"%b":case"%h":return c("MMM");case"n":return c("M");case"t":return u.getDaysInMonth(n.getFullYear(),n.getMonth());case"L":return u.isLeapYear(n.getFullYear())?1:0;case"o":case"%G":return n.setWeek(n.getISOWeek()).toString("yyyy");case"%g":return n.$format("%G").slice(-2);case"Y":case"%Y":return c("yyyy");case"y":case"%y":return c("yy");case"a":case"%p":return c("tt").toLowerCase();case"A":return c("tt").toUpperCase();case"g":case"%I":return c("h");case"G":return c("H");case"h":return c("hh");case"H":case"%H":return c("HH");case"i":case"%M":return c("mm");case"s":case"%S":return c("ss");case"u":return i(n.getMilliseconds(),3);case"I":return n.isDaylightSavingTime()?1:0;case"O":return n.getUTCOffset();case"P":return(s=n.getUTCOffset()).substring(0,s.length-2)+":"+s.substring(s.length-2);case"e":case"T":case"%z":case"%Z":return n.getTimezone();case"Z":return-60*n.getTimezoneOffset();case"B":var a=new Date;return Math.floor((3600*a.getHours()+60*a.getMinutes()+a.getSeconds()+60*(a.getTimezoneOffset()+60))/86.4);case"c":return n.toISOString().replace(/\"/g,"");case"U":return u.strtotime("now");case"%c":return c("d")+" "+c("t");case"%C":return Math.floor(n.getFullYear()/100+1);case"%D":return c("MM/dd/yy");case"%n":return"\\n";case"%t":return"\\t";case"%r":return c("hh:mm tt");case"%R":return c("H:mm");case"%T":return c("H:mm:ss");case"%x":return c("d");case"%X":return c("t");default:return o.push(e),e}}):this._toString()},e.format||(e.format=e.$format)}();