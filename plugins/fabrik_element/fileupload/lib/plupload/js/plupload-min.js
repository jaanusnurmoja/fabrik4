/*1.5.1.1*/
(function(){var f=0,k=[],m={},i={},a={"<":"lt",">":"gt","&":"amp",'"':"quot","'":"#39"},l=/[<>&\"\']/g,b,c=window.setTimeout,d={},e;function h(){this.returnValue=false}function j(){this.cancelBubble=true}(function(n){var o=n.split(/,/),p,r,q;for(p=0;p<o.length;p+=2){q=o[p+1].split(/ /);for(r=0;r<q.length;r++){i[q[r]]=o[p]}}})("application/msword,doc dot,application/pdf,pdf,application/pgp-signature,pgp,application/postscript,ps ai eps,application/rtf,rtf,application/vnd.ms-excel,xls xlb,application/vnd.ms-powerpoint,ppt pps pot,application/zip,zip,application/x-shockwave-flash,swf swfl,application/vnd.openxmlformats,docx pptx xlsx,audio/mpeg,mpga mpega mp2 mp3,audio/x-wav,wav,audio/mp4,m4a,image/bmp,bmp,image/gif,gif,image/jpeg,jpeg jpg jpe,image/photoshop,psd,image/png,png,image/svg+xml,svg svgz,image/tiff,tiff tif,text/html,htm html xhtml,text/rtf,rtf,video/mpeg,mpeg mpg mpe,video/quicktime,qt mov,video/mp4,mp4,video/x-m4v,m4v,video/x-flv,flv,video/x-ms-wmv,wmv,video/avi,avi,video/webm,webm,video/vnd.rn-realvideo,rv,text/csv,csv,text/plain,asc txt text diff log,application/octet-stream,exe");var g={VERSION:"1.5.1.1",STOPPED:1,STARTED:2,QUEUED:1,UPLOADING:2,FAILED:4,DONE:5,GENERIC_ERROR:-100,HTTP_ERROR:-200,IO_ERROR:-300,SECURITY_ERROR:-400,INIT_ERROR:-500,FILE_SIZE_ERROR:-600,FILE_EXTENSION_ERROR:-601,IMAGE_FORMAT_ERROR:-700,IMAGE_MEMORY_ERROR:-701,IMAGE_DIMENSIONS_ERROR:-702,mimeTypes:i,ua:(function(){var r=navigator,q=r.userAgent,s=r.vendor,o,n,p;o=/WebKit/.test(q);p=o&&s.indexOf("Apple")!==-1;n=window.opera&&window.opera.buildNumber;return{windows:navigator.platform.indexOf("Win")!==-1,ie:!o&&!n&&(/MSIE/gi).test(q)&&(/Explorer/gi).test(r.appName),webkit:o,gecko:!o&&/Gecko/.test(q),safari:p,opera:!!n}}()),extend:function(n){g.each(arguments,function(o,p){if(p>0){g.each(o,function(r,q){n[q]=r})}});return n},cleanName:function(n){var o,p;p=[/[\300-\306]/g,"A",/[\340-\346]/g,"a",/\307/g,"C",/\347/g,"c",/[\310-\313]/g,"E",/[\350-\353]/g,"e",/[\314-\317]/g,"I",/[\354-\357]/g,"i",/\321/g,"N",/\361/g,"n",/[\322-\330]/g,"O",/[\362-\370]/g,"o",/[\331-\334]/g,"U",/[\371-\374]/g,"u"];for(o=0;o<p.length;o+=2){n=n.replace(p[o],p[o+1])}n=n.replace(/\s+/g,"_");n=n.replace(/[^a-z0-9_\-\.]+/gi,"");return n},addRuntime:function(n,o){o.name=n;k[n]=o;k.push(o);return o},guid:function(){var n=new Date().getTime().toString(32),o;for(o=0;o<5;o++){n+=Math.floor(Math.random()*65535).toString(32)}return(g.guidPrefix||"p")+n+(f++).toString(32)},buildUrl:function(o,n){var p="";g.each(n,function(r,q){p+=(p?"&":"")+encodeURIComponent(q)+"="+encodeURIComponent(r)});if(p){o+=(o.indexOf("?")>0?"&":"?")+p}return o},each:function(q,r){var p,o,n;if(q){p=q.length;if(p===b){for(o in q){if(q.hasOwnProperty(o)){if(r(q[o],o)===false){return}}}}else{for(n=0;n<p;n++){if(r(q[n],n)===false){return}}}}},formatSize:function(n){if(n===b||/\D/.test(n)){return g.translate("N/A")}if(n>1073741824){return Math.round(n/1073741824,1)+" GB"}if(n>1048576){return Math.round(n/1048576,1)+" MB"}if(n>1024){return Math.round(n/1024,1)+" KB"}return n+" b"},getPos:function(o,s){var t=0,r=0,v,u=document,p,q;o=o;s=s||u.body;function n(B){var z,A,w=0,C=0;if(B){A=B.getBoundingClientRect();z=u.compatMode==="CSS1Compat"?u.documentElement:u.body;w=A.left+z.scrollLeft;C=A.top+z.scrollTop}return{x:w,y:C}}if(o&&o.getBoundingClientRect&&(navigator.userAgent.indexOf("MSIE")>0&&u.documentMode!==8)){p=n(o);q=n(s);return{x:p.x-q.x,y:p.y-q.y}}v=o;while(v&&v!=s&&v.nodeType){t+=v.offsetLeft||0;r+=v.offsetTop||0;v=v.offsetParent}v=o.parentNode;while(v&&v!=s&&v.nodeType){t-=v.scrollLeft||0;r-=v.scrollTop||0;v=v.parentNode}return{x:t,y:r}},getSize:function(n){return{w:n.offsetWidth||n.clientWidth,h:n.offsetHeight||n.clientHeight}},parseSize:function(n){var o;if(typeof(n)=="string"){n=/^([0-9]+)([mgk]?)$/.exec(n.toLowerCase().replace(/[^0-9mkg]/g,""));o=n[2];n=+n[1];if(o=="g"){n*=1073741824}if(o=="m"){n*=1048576}if(o=="k"){n*=1024}}return n},xmlEncode:function(n){return n?(""+n).replace(l,function(o){return a[o]?"&"+a[o]+";":o}):n},toArray:function(p){var o,n=[];for(o=0;o<p.length;o++){n[o]=p[o]}return n},addI18n:function(n){return g.extend(m,n)},translate:function(n){return m[n]||n},isEmptyObj:function(n){if(n===b){return true}for(var o in n){return false}return true},hasClass:function(p,o){var n;if(p.className==""){return false}n=new RegExp("(^|\\s+)"+o+"(\\s+|$)");return n.test(p.className)},addClass:function(o,n){if(!g.hasClass(o,n)){o.className=o.className==""?n:o.className.replace(/\s+$/,"")+" "+n}},removeClass:function(p,o){var n=new RegExp("(^|\\s+)"+o+"(\\s+|$)");p.className=p.className.replace(n,function(r,q,s){return q===" "&&s===" "?" ":""})},getStyle:function(o,n){if(o.currentStyle){return o.currentStyle[n]}else{if(window.getComputedStyle){return window.getComputedStyle(o,null)[n]}}},addEvent:function(s,n,t){var r,q,p,o;o=arguments[3];n=n.toLowerCase();if(e===b){e="Plupload_"+g.guid()}if(s.addEventListener){r=t;s.addEventListener(n,r,false)}else{if(s.attachEvent){r=function(){var u=window.event;if(!u.target){u.target=u.srcElement}u.preventDefault=h;u.stopPropagation=j;t(u)};s.attachEvent("on"+n,r)}}if(s[e]===b){s[e]=g.guid()}if(!d.hasOwnProperty(s[e])){d[s[e]]={}}q=d[s[e]];if(!q.hasOwnProperty(n)){q[n]=[]}q[n].push({func:r,orig:t,key:o})},removeEvent:function(s,n){var q,t,p;if(typeof(arguments[2])=="function"){t=arguments[2]}else{p=arguments[2]}n=n.toLowerCase();if(s[e]&&d[s[e]]&&d[s[e]][n]){q=d[s[e]][n]}else{return}for(var o=q.length-1;o>=0;o--){if(q[o].key===p||q[o].orig===t){if(s.detachEvent){s.detachEvent("on"+n,q[o].func)}else{if(s.removeEventListener){s.removeEventListener(n,q[o].func,false)}}q[o].orig=null;q[o].func=null;q.splice(o,1);if(t!==b){break}}}if(!q.length){delete d[s[e]][n]}if(g.isEmptyObj(d[s[e]])){delete d[s[e]];try{delete s[e]}catch(r){s[e]=b}}},removeAllEvents:function(o){var n=arguments[1];if(o[e]===b||!o[e]){return}g.each(d[o[e]],function(q,p){g.removeEvent(o,p,n)})}};g.Uploader=function(q){var o={},t,s=[],p;t=new g.QueueProgress();q=g.extend({chunk_size:0,multipart:true,multi_selection:true,file_data_name:"file",filters:[]},q);function r(){var v,w=0,u;if(this.state==g.STARTED){for(u=0;u<s.length;u++){if(!v&&s[u].status==g.QUEUED){v=s[u];v.status=g.UPLOADING;if(this.trigger("BeforeUpload",v)){this.trigger("UploadFile",v)}}else{w++}}if(w==s.length){this.stop();this.trigger("UploadComplete",s)}}}function n(){var v,u;t.reset();for(v=0;v<s.length;v++){u=s[v];if(u.size!==b){t.size+=u.size;t.loaded+=u.loaded}else{t.size=b}if(u.status==g.DONE){t.uploaded++}else{if(u.status==g.FAILED){t.failed++}else{t.queued++}}}if(t.size===b){t.percent=s.length>0?Math.ceil(t.uploaded/s.length*100):0}else{t.bytesPerSec=Math.ceil(t.loaded/((+new Date()-p||1)/1000));t.percent=t.size>0?Math.ceil(t.loaded/t.size*100):0}}g.extend(this,{state:g.STOPPED,runtime:"",features:{},files:s,settings:q,total:t,id:g.guid(),init:function(){var z=this,A,w,v,y=0,x;if(typeof(q.preinit)=="function"){q.preinit(z)}else{g.each(q.preinit,function(C,B){z.bind(B,C)})}q.page_url=q.page_url||document.location.pathname.replace(/\/[^\/]+$/g,"/");if(!/^(\w+:\/\/|\/)/.test(q.url)){q.url=q.page_url+q.url}q.chunk_size=g.parseSize(q.chunk_size);q.max_file_size=g.parseSize(q.max_file_size);z.bind("FilesAdded",function(B,E){var D,C,G=0,H,F=q.filters;if(F&&F.length){H=[];g.each(F,function(I){g.each(I.extensions.split(/,/),function(J){if(/^\s*\*\s*$/.test(J)){H.push("\\.*")}else{H.push("\\."+J.replace(new RegExp("["+("/^$.*+?|()[]{}\\".replace(/./g,"\\$&"))+"]","g"),"\\$&"))}})});H=new RegExp(H.join("|")+"$","i")}for(D=0;D<E.length;D++){C=E[D];C.loaded=0;C.percent=0;C.status=g.QUEUED;if(H&&!H.test(C.name)){B.trigger("Error",{code:g.FILE_EXTENSION_ERROR,message:g.translate("File extension error."),file:C});continue}if(C.size!==b&&C.size>q.max_file_size){B.trigger("Error",{code:g.FILE_SIZE_ERROR,message:g.translate("File size error."),file:C});continue}s.push(C);G++}if(G){c(function(){z.trigger("QueueChanged");z.refresh()},1)}else{return false}});if(q.unique_names){z.bind("UploadFile",function(B,C){var E=C.name.match(/\.([^.]+)$/),D="tmp";if(E){D=E[1]}C.target_name=C.id+"."+D})}z.bind("UploadProgress",function(B,C){C.percent=C.size>0?Math.ceil(C.loaded/C.size*100):100;n()});z.bind("StateChanged",function(B){if(B.state==g.STARTED){p=(+new Date())}else{if(B.state==g.STOPPED){for(A=B.files.length-1;A>=0;A--){if(B.files[A].status==g.UPLOADING){B.files[A].status=g.QUEUED;n()}}}}});z.bind("QueueChanged",n);z.bind("Error",function(B,C){if(C.file){C.file.status=g.FAILED;n();if(B.state==g.STARTED){c(function(){r.call(z)},1)}}});z.bind("FileUploaded",function(B,C){C.status=g.DONE;C.loaded=C.size;B.trigger("UploadProgress",C);c(function(){r.call(z)},1)});if(q.runtimes){w=[];x=q.runtimes.split(/\s?,\s?/);for(A=0;A<x.length;A++){if(k[x[A]]){w.push(k[x[A]])}}}else{w=k}function u(){var E=w[y++],D,B,C;if(E){D=E.getFeatures();B=z.settings.required_features;if(B){B=B.split(",");for(C=0;C<B.length;C++){if(!D[B[C]]){u();return}}}E.init(z,function(F){if(F&&F.success){z.features=D;z.runtime=E.name;z.trigger("Init",{runtime:E.name});z.trigger("PostInit");z.refresh()}else{u()}})}else{z.trigger("Error",{code:g.INIT_ERROR,message:g.translate("Init error.")})}}u();if(typeof(q.init)=="function"){q.init(z)}else{g.each(q.init,function(C,B){z.bind(B,C)})}},refresh:function(){this.trigger("Refresh")},start:function(){if(this.state!=g.STARTED){this.state=g.STARTED;this.trigger("StateChanged");r.call(this)}},stop:function(){if(this.state!=g.STOPPED){this.state=g.STOPPED;this.trigger("StateChanged")}},getFile:function(v){var u;for(u=s.length-1;u>=0;u--){if(s[u].id===v){return s[u]}}},removeFile:function(v){var u;for(u=s.length-1;u>=0;u--){if(s[u].id===v.id){return this.splice(u,1)[0]}}},splice:function(w,u){var v;v=s.splice(w===b?0:w,u===b?s.length:u);this.trigger("FilesRemoved",v);this.trigger("QueueChanged");return v},trigger:function(v){var x=o[v.toLowerCase()],w,u;if(x){u=Array.prototype.slice.call(arguments);u[0]=this;for(w=0;w<x.length;w++){if(x[w].func.apply(x[w].scope,u)===false){return false}}}return true},hasEventListener:function(u){return !!o[u.toLowerCase()]},bind:function(u,w,v){var x;u=u.toLowerCase();x=o[u]||[];x.push({func:w,scope:v||this});o[u]=x},unbind:function(u){u=u.toLowerCase();var x=o[u],v,w=arguments[1];if(x){if(w!==b){for(v=x.length-1;v>=0;v--){if(x[v].func===w){x.splice(v,1);break}}}else{x=[]}if(!x.length){delete o[u]}}},unbindAll:function(){var u=this;g.each(o,function(w,v){u.unbind(v)})},destroy:function(){this.trigger("Destroy");this.unbindAll()}})};g.File=function(q,o,p){var n=this;n.id=q;n.name=o;n.size=p;n.loaded=0;n.percent=0;n.status=0};g.Runtime=function(){this.getFeatures=function(){};this.init=function(n,o){}};g.QueueProgress=function(){var n=this;n.size=0;n.loaded=0;n.uploaded=0;n.failed=0;n.queued=0;n.percent=0;n.bytesPerSec=0;n.reset=function(){n.size=n.loaded=n.uploaded=n.failed=n.queued=n.percent=n.bytesPerSec=0}};g.runtimes={};window.plupload=g})();