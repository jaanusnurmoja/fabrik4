/*! Fabrik */

Date.CultureInfo={name:"pt-BR",englishName:"Portuguese (Brazil)",nativeName:"Português (Brasil)",dayNames:["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],abbreviatedDayNames:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],shortestDayNames:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],firstLetterDayNames:["d","s","t","q","q","s","s"],monthNames:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],abbreviatedMonthNames:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],amDesignator:"",pmDesignator:"",firstDayOfWeek:0,twoDigitYearMax:2029,dateElementOrder:"dmy",formatPatterns:{shortDate:"d/M/yyyy",longDate:"dddd, d \\de MMMM \\de yyyy",shortTime:"H:mm",longTime:"H:mm:ss",fullDateTime:"dddd, d \\de MMMM \\de yyyy H:mm:ss",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"dd \\de MMMM",yearMonth:"MMMM \\de yyyy"},regexPatterns:{jan:/^jan(eiro)?/i,feb:/^fev(ereiro)?/i,mar:/^mar(ço)?/i,apr:/^abr(il)?/i,may:/^mai(o)?/i,jun:/^jun(ho)?/i,jul:/^jul(ho)?/i,aug:/^ago(sto)?/i,sep:/^set(embro)?/i,oct:/^out(ubro)?/i,nov:/^nov(embro)?/i,dec:/^dez(embro)?/i,sun:/^domingo/i,mon:/^segunda-feira/i,tue:/^terça-feira/i,wed:/^quarta-feira/i,thu:/^quinta-feira/i,fri:/^sexta-feira/i,sat:/^sábado/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]};