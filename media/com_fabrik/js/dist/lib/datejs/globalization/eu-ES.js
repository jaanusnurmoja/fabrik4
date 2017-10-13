/*! Fabrik */

Date.CultureInfo={name:"eu-ES",englishName:"Basque (Basque)",nativeName:"euskara (euskara)",dayNames:["igandea","astelehena","asteartea","asteazkena","osteguna","ostirala","larunbata"],abbreviatedDayNames:["ig.","al.","as.","az.","og.","or.","lr."],shortestDayNames:["ig","al","as","az","og","or","lr"],firstLetterDayNames:["i","a","a","a","o","o","l"],monthNames:["urtarrila","otsaila","martxoa","apirila","maiatza","ekaina","uztaila","abuztua","iraila","urria","azaroa","abendua"],abbreviatedMonthNames:["urt.","ots.","mar.","api.","mai.","eka.","uzt.","abu.","ira.","urr.","aza.","abe."],amDesignator:"",pmDesignator:"",firstDayOfWeek:1,twoDigitYearMax:2029,dateElementOrder:"ymd",formatPatterns:{shortDate:"yyyy/MM/dd",longDate:"dddd, yyyy.'eko' MMMM'k 'd",shortTime:"HH:mm",longTime:"HH:mm:ss",fullDateTime:"dddd, yyyy.'eko' MMMM'k 'd HH:mm:ss",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"MMMM dd",yearMonth:"yyyy.'eko' MMMM"},regexPatterns:{jan:/^urt(.(arrila)?)?/i,feb:/^ots(.(aila)?)?/i,mar:/^mar(.(txoa)?)?/i,apr:/^api(.(rila)?)?/i,may:/^mai(.(atza)?)?/i,jun:/^eka(.(ina)?)?/i,jul:/^uzt(.(aila)?)?/i,aug:/^abu(.(ztua)?)?/i,sep:/^ira(.(ila)?)?/i,oct:/^urr(.(ia)?)?/i,nov:/^aza(.(roa)?)?/i,dec:/^abe(.(ndua)?)?/i,sun:/^ig((.(andea)?)?)?/i,mon:/^al((.(telehena)?)?)?/i,tue:/^as((.(teartea)?)?)?/i,wed:/^az((.(teazkena)?)?)?/i,thu:/^og((.(teguna)?)?)?/i,fri:/^or((.(tirala)?)?)?/i,sat:/^lr((.(runbata)?)?)?/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]};