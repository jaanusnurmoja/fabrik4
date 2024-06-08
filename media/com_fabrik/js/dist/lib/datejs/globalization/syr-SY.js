/*! Fabrik */
Date.CultureInfo={name:"syr-SY",englishName:"Syriac (Syria)",nativeName:"ܣܘܪܝܝܐ (سوريا)",dayNames:["ܚܕ ܒܫܒܐ","ܬܪܝܢ ܒܫܒܐ","ܬܠܬܐ ܒܫܒܐ","ܐܪܒܥܐ ܒܫܒܐ","ܚܡܫܐ ܒܫܒܐ","ܥܪܘܒܬܐ","ܫܒܬܐ"],abbreviatedDayNames:["܏ܐ ܏ܒܫ","܏ܒ ܏ܒܫ","܏ܓ ܏ܒܫ","܏ܕ ܏ܒܫ","܏ܗ ܏ܒܫ","܏ܥܪܘܒ","܏ܫܒ"],shortestDayNames:["܏","܏","܏","܏","܏","܏","܏"],firstLetterDayNames:["܏","܏","܏","܏","܏","܏","܏"],monthNames:["ܟܢܘܢ ܐܚܪܝ","ܫܒܛ","ܐܕܪ","ܢܝܣܢ","ܐܝܪ","ܚܙܝܪܢ","ܬܡܘܙ","ܐܒ","ܐܝܠܘܠ","ܬܫܪܝ ܩܕܝܡ","ܬܫܪܝ ܐܚܪܝ","ܟܢܘܢ ܩܕܝܡ"],abbreviatedMonthNames:["܏ܟܢ ܏ܒ","ܫܒܛ","ܐܕܪ","ܢܝܣܢ","ܐܝܪ","ܚܙܝܪܢ","ܬܡܘܙ","ܐܒ","ܐܝܠܘܠ","܏ܬܫ ܏ܐ","܏ܬܫ ܏ܒ","܏ܟܢ ܏ܐ"],amDesignator:"ܩ.ܛ",pmDesignator:"ܒ.ܛ",firstDayOfWeek:6,twoDigitYearMax:2029,dateElementOrder:"dmy",formatPatterns:{shortDate:"dd/MM/yyyy",longDate:"dd MMMM, yyyy",shortTime:"hh:mm tt",longTime:"hh:mm:ss tt",fullDateTime:"dd MMMM, yyyy hh:mm:ss tt",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"dd MMMM",yearMonth:"MMMM, yyyy"},regexPatterns:{jan:/^ܟܢܘܢ ܐܚܪܝ/i,feb:/^ܫܒܛ/i,mar:/^ܐܕܪ/i,apr:/^ܢܝܣܢ/i,may:/^ܐܝܪ/i,jun:/^ܚܙܝܪܢ/i,jul:/^ܬܡܘܙ/i,aug:/^ܐܒ/i,sep:/^ܐܝܠܘܠ/i,oct:/^ܬܫܪܝ ܩܕܝܡ/i,nov:/^ܬܫܪܝ ܐܚܪܝ/i,dec:/^ܟܢܘܢ ܩܕܝܡ/i,sun:/^܏(ܐ ܏ܒܫ(ܐ)?)?/i,mon:/^܏(ܒ ܏ܒܫ(ܫܒܐ)?)?/i,tue:/^܏(ܓ ܏ܒܫ(ܫܒܐ)?)?/i,wed:/^܏(ܕ ܏ܒܫ(ܒܫܒܐ)?)?/i,thu:/^܏(ܗ ܏ܒܫ(ܫܒܐ)?)?/i,fri:/^܏(ܥܪܘܒ(ܐ)?)?/i,sat:/^܏(ܫܒ(ܐ)?)?/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]};