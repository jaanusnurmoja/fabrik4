/*! Fabrik */
Date.CultureInfo={name:"ko-KR",englishName:"Korean (Korea)",nativeName:"한국어 (대한민국)",dayNames:["일요일","월요일","화요일","수요일","목요일","금요일","토요일"],abbreviatedDayNames:["일","월","화","수","목","금","토"],shortestDayNames:["일","월","화","수","목","금","토"],firstLetterDayNames:["일","월","화","수","목","금","토"],monthNames:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],abbreviatedMonthNames:["1","2","3","4","5","6","7","8","9","10","11","12"],amDesignator:"오전",pmDesignator:"오후",firstDayOfWeek:0,twoDigitYearMax:2029,dateElementOrder:"ymd",formatPatterns:{shortDate:"yyyy-MM-dd",longDate:"yyyy'년' M'월' d'일' dddd",shortTime:"tt h:mm",longTime:"tt h:mm:ss",fullDateTime:"yyyy'년' M'월' d'일' dddd tt h:mm:ss",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"M'월' d'일'",yearMonth:"yyyy'년' M'월'"},regexPatterns:{jan:/^1(월)?/i,feb:/^2(월)?/i,mar:/^3(월)?/i,apr:/^4(월)?/i,may:/^5(월)?/i,jun:/^6(월)?/i,jul:/^7(월)?/i,aug:/^8(월)?/i,sep:/^9(월)?/i,oct:/^10(월)?/i,nov:/^11(월)?/i,dec:/^12(월)?/i,sun:/^일요일/i,mon:/^월요일/i,tue:/^화요일/i,wed:/^수요일/i,thu:/^목요일/i,fri:/^금요일/i,sat:/^토요일/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]};