/*! Fabrik */
Date.CultureInfo={name:"et-EE",englishName:"Estonian (Estonia)",nativeName:"eesti (Eesti)",dayNames:["pühapäev","esmaspäev","teisipäev","kolmapäev","neljapäev","reede","laupäev"],abbreviatedDayNames:["P","E","T","K","N","R","L"],shortestDayNames:["P","E","T","K","N","R","L"],firstLetterDayNames:["P","E","T","K","N","R","L"],monthNames:["jaanuar","veebruar","märts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"],abbreviatedMonthNames:["jaan","veebr","märts","apr","mai","juuni","juuli","aug","sept","okt","nov","dets"],amDesignator:"EL",pmDesignator:"PL",firstDayOfWeek:1,twoDigitYearMax:2029,dateElementOrder:"dmy",formatPatterns:{shortDate:"d.MM.yyyy",longDate:"d. MMMM yyyy'. a.'",shortTime:"H:mm",longTime:"H:mm:ss",fullDateTime:"d. MMMM yyyy'. a.' H:mm:ss",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"d. MMMM",yearMonth:"MMMM yyyy'. a.'"},regexPatterns:{jan:/^jaan(uar)?/i,feb:/^veebr(uar)?/i,mar:/^märts/i,apr:/^apr(ill)?/i,may:/^mai/i,jun:/^juuni/i,jul:/^juuli/i,aug:/^aug(ust)?/i,sep:/^sep(t(ember)?)?/i,oct:/^okt(oober)?/i,nov:/^nov(ember)?/i,dec:/^dets(ember)?/i,sun:/^pühapäev/i,mon:/^esmaspäev/i,tue:/^teisipäev/i,wed:/^kolmapäev/i,thu:/^neljapäev/i,fri:/^reede/i,sat:/^laupäev/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]};