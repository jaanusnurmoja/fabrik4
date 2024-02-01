/*! Fabrik */
!function(x,h,D,p){var o,m={};function s(a,o,s,d){var l,u,f,g,e,t,n,c=this;e=m[a.id],t=function(r){(l=h.createElement("canvas")).style.display="none",h.body.appendChild(l),u=l.getContext("2d"),(f=new Image).onerror=f.onabort=function(){d({success:!1})},f.onload=function(){var e,t,n,i;if(o.width||(o.width=f.width),o.height||(o.height=f.height),(g=Math.min(o.width/f.width,o.height/f.height))<1||1===g&&"image/jpeg"===s){if(e=Math.round(f.width*g),t=Math.round(f.height*g),l.width=e,l.height=t,u.drawImage(f,0,0,e,t),"image/jpeg"===s){if((n=new y(atob(r.substring(r.indexOf("base64,")+7)))).headers&&n.headers.length&&(i=new S).init(n.get("exif")[0])&&(i.setExif("PixelXDimension",e),i.setExif("PixelYDimension",t),n.set("exif",i.getBinary()),c.hasEventListener("ExifData")&&c.trigger("ExifData",a,i.EXIF()),c.hasEventListener("GpsData"))&&c.trigger("GpsData",a,i.GPS()),o.quality)try{r=l.toDataURL(s,o.quality/100)}catch(e){r=l.toDataURL(s)}}else r=l.toDataURL(s);r=r.substring(r.indexOf("base64,")+7),r=atob(r),n&&n.headers&&n.headers.length&&(r=n.restore(r),n.purge()),l.parentNode.removeChild(l),d({success:!0,data:r})}else d({success:!1})},f.src=r},"FileReader"in x?((n=new FileReader).readAsDataURL(e),n.onload=function(){t(n.result)}):t(e.getAsDataURL())}function d(){var a,s=!1;function d(e,t){for(var n=s?0:-8*(t-1),i=0,r=0;r<t;r++)i|=a.charCodeAt(e+r)<<Math.abs(n+8*r);return i}function l(e,t,n){n=3===arguments.length?n:a.length-t-1;a=a.substr(0,t)+e+a.substr(n+t)}return{II:function(e){if(e===p)return s;s=e},init:function(e){s=!1,a=e},SEGMENT:function(e,t,n){switch(arguments.length){case 1:return a.substr(e,a.length-e-1);case 2:return a.substr(e,t);case 3:l(n,e,t);break;default:return a}},BYTE:function(e){return d(e,1)},SHORT:function(e){return d(e,2)},LONG:function(e,t){if(t===p)return d(e,4);for(var n=t,i=4,r="",a=s?0:-8*(i-1),o=0;o<i;o++)r+=String.fromCharCode(n>>Math.abs(a+8*o)&255);l(r,e,i)},SLONG:function(e){e=d(e,4);return 2147483647<e?e-4294967296:e},STRING:function(e,t){var n="";for(t+=e;e<t;e++)n+=String.fromCharCode(d(e,1));return n}}}function y(e){var a,t,n,i,r={65505:{app:"EXIF",name:"APP1",signature:"Exif\0"},65506:{app:"ICC",name:"APP2",signature:"ICC_PROFILE\0"},65517:{app:"IPTC",name:"APP13",signature:"Photoshop 3.0\0"}},o=[],s=new d;if(s.init(e),65496===s.SHORT(0)){for(a=2,i=Math.min(1048576,e.length);a<=i;)if(65488<=(t=s.SHORT(a))&&t<=65495)a+=2;else{if(65498===t||65497===t)break;n=s.SHORT(a+2)+2,r[t]&&s.STRING(a+4,r[t].signature.length)===r[t].signature&&o.push({hex:t,app:r[t].app.toUpperCase(),name:r[t].name.toUpperCase(),start:a,length:n,segment:s.SEGMENT(a,n)}),a+=n}return s.init(null),{headers:o,restore:function(e){s.init(e);var t=new y(e);if(!t.headers)return!1;for(var n=t.headers.length;0<n;n--){var i=t.headers[n-1];s.SEGMENT(i.start,i.length,"")}t.purge(),a=65504==s.SHORT(2)?4+s.SHORT(4):2;for(var n=0,r=o.length;n<r;n++)s.SEGMENT(a,0,o[n].segment),a+=o[n].length;return s.SEGMENT()},get:function(e){for(var t=[],n=0,i=o.length;n<i;n++)o[n].app===e.toUpperCase()&&t.push(o[n].segment);return t},set:function(e,t){var n=[];"string"==typeof t?n.push(t):n=t;for(var i=ii=0,r=o.length;i<r&&(o[i].app===e.toUpperCase()&&(o[i].segment=n[ii],o[i].length=n[ii].length,ii++),!(ii>=n.length));i++);},purge:function(){o=[],s.init(null)}}}}function S(){var f,u,g,c={};function t(e,t){for(var n,i,r,a,o,s=f.SHORT(e),d=[],l={},u=0;u<s;u++)if(a=e+12*u+2,(i=t[f.SHORT(a)])!==p){switch(o=f.SHORT(a+=2),r=f.LONG(a+=2),a+=4,d=[],o){case 1:case 7:for(4<r&&(a=f.LONG(a)+c.tiffHeader),n=0;n<r;n++)d[n]=f.BYTE(a+n);break;case 2:4<r&&(a=f.LONG(a)+c.tiffHeader),l[i]=f.STRING(a,r-1);continue;case 3:for(2<r&&(a=f.LONG(a)+c.tiffHeader),n=0;n<r;n++)d[n]=f.SHORT(a+2*n);break;case 4:for(1<r&&(a=f.LONG(a)+c.tiffHeader),n=0;n<r;n++)d[n]=f.LONG(a+4*n);break;case 5:for(a=f.LONG(a)+c.tiffHeader,n=0;n<r;n++)d[n]=f.LONG(a+4*n)/f.LONG(a+4*n+4);break;case 9:for(a=f.LONG(a)+c.tiffHeader,n=0;n<r;n++)d[n]=f.SLONG(a+4*n);break;case 10:for(a=f.LONG(a)+c.tiffHeader,n=0;n<r;n++)d[n]=f.SLONG(a+4*n)/f.SLONG(a+4*n+4);break;default:continue}o=1==r?d[0]:d,g.hasOwnProperty(i)&&"object"!=typeof o?l[i]=g[i][o]:l[i]=o}return l}return f=new d,u={tiff:{274:"Orientation",34665:"ExifIFDPointer",34853:"GPSInfoIFDPointer"},exif:{36864:"ExifVersion",40961:"ColorSpace",40962:"PixelXDimension",40963:"PixelYDimension",36867:"DateTimeOriginal",33434:"ExposureTime",33437:"FNumber",34855:"ISOSpeedRatings",37377:"ShutterSpeedValue",37378:"ApertureValue",37383:"MeteringMode",37384:"LightSource",37385:"Flash",41986:"ExposureMode",41987:"WhiteBalance",41990:"SceneCaptureType",41988:"DigitalZoomRatio",41992:"Contrast",41993:"Saturation",41994:"Sharpness"},gps:{0:"GPSVersionID",1:"GPSLatitudeRef",2:"GPSLatitude",3:"GPSLongitudeRef",4:"GPSLongitude"}},g={ColorSpace:{1:"sRGB",0:"Uncalibrated"},MeteringMode:{0:"Unknown",1:"Average",2:"CenterWeightedAverage",3:"Spot",4:"MultiSpot",5:"Pattern",6:"Partial",255:"Other"},LightSource:{1:"Daylight",2:"Fliorescent",3:"Tungsten",4:"Flash",9:"Fine weather",10:"Cloudy weather",11:"Shade",12:"Daylight fluorescent (D 5700 - 7100K)",13:"Day white fluorescent (N 4600 -5400K)",14:"Cool white fluorescent (W 3900 - 4500K)",15:"White fluorescent (WW 3200 - 3700K)",17:"Standard light A",18:"Standard light B",19:"Standard light C",20:"D55",21:"D65",22:"D75",23:"D50",24:"ISO studio tungsten",255:"Other"},Flash:{0:"Flash did not fire.",1:"Flash fired.",5:"Strobe return light not detected.",7:"Strobe return light detected.",9:"Flash fired, compulsory flash mode",13:"Flash fired, compulsory flash mode, return light not detected",15:"Flash fired, compulsory flash mode, return light detected",16:"Flash did not fire, compulsory flash mode",24:"Flash did not fire, auto mode",25:"Flash fired, auto mode",29:"Flash fired, auto mode, return light not detected",31:"Flash fired, auto mode, return light detected",32:"No flash function",65:"Flash fired, red-eye reduction mode",69:"Flash fired, red-eye reduction mode, return light not detected",71:"Flash fired, red-eye reduction mode, return light detected",73:"Flash fired, compulsory flash mode, red-eye reduction mode",77:"Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected",79:"Flash fired, compulsory flash mode, red-eye reduction mode, return light detected",89:"Flash fired, auto mode, red-eye reduction mode",93:"Flash fired, auto mode, return light not detected, red-eye reduction mode",95:"Flash fired, auto mode, return light detected, red-eye reduction mode"},ExposureMode:{0:"Auto exposure",1:"Manual exposure",2:"Auto bracket"},WhiteBalance:{0:"Auto white balance",1:"Manual white balance"},SceneCaptureType:{0:"Standard",1:"Landscape",2:"Portrait",3:"Night scene"},Contrast:{0:"Normal",1:"Soft",2:"Hard"},Saturation:{0:"Normal",1:"Low saturation",2:"High saturation"},Sharpness:{0:"Normal",1:"Soft",2:"Hard"},GPSLatitudeRef:{N:"North latitude",S:"South latitude"},GPSLongitudeRef:{E:"East longitude",W:"West longitude"}},{init:function(e){return c={tiffHeader:10},!(e===p||!e.length||(f.init(e),65505!==f.SHORT(0))||"EXIF\0"!==f.STRING(4,5).toUpperCase()||(e=c.tiffHeader,f.II(18761==f.SHORT(e)),42!==f.SHORT(e+=2))||(c.IFD0=c.tiffHeader+f.LONG(e+=2),e=t(c.IFD0,u.tiff),c.exifIFD="ExifIFDPointer"in e?c.tiffHeader+e.ExifIFDPointer:p,c.gpsIFD="GPSInfoIFDPointer"in e?c.tiffHeader+e.GPSInfoIFDPointer:p,0))},EXIF:function(){var e=t(c.exifIFD,u.exif);return e.ExifVersion&&(e.ExifVersion=String.fromCharCode(e.ExifVersion[0],e.ExifVersion[1],e.ExifVersion[2],e.ExifVersion[3])),e},GPS:function(){var e=t(c.gpsIFD,u.gps);return e.GPSVersionID&&(e.GPSVersionID=e.GPSVersionID.join(".")),e},setExif:function(e,t){if("PixelXDimension"!==e&&"PixelYDimension"!==e)return!1;var n,r,a,o="exif",s=e,e=t,d=0;if("string"==typeof s){var l=u[o.toLowerCase()];for(hex in l)if(l[hex]===s){s=hex;break}}for(n=c[o.toLowerCase()+"IFD"],r=f.SHORT(n),i=0;i<r;i++)if(a=n+12*i+2,f.SHORT(a)==s){d=a+8;break}return!!d&&(f.LONG(d,e),!0)},getBinary:function(){return f.SEGMENT()}}}D.runtimes.Html5=D.addRuntime("html5",{getFeatures:function(){var e,t,n,i,r,a=e=n=i=!1;return x.XMLHttpRequest&&(e=!!(r=new XMLHttpRequest).upload,a=!(!r.sendAsBinary&&!r.upload)),a&&(t=!!(r.sendAsBinary||x.Uint8Array&&x.ArrayBuffer),n=!(!File||!File.prototype.getAsDataURL&&!x.FileReader||!t),i=!(!File||!(File.prototype.mozSlice||File.prototype.webkitSlice||File.prototype.slice))),o=!(D.ua.safari&&D.ua.windows),{html5:a,dragdrop:"draggable"in(r=h.createElement("div"))||"ondragstart"in r&&"ondrop"in r,jpgresize:n,pngresize:n,multipart:n||!!x.FileReader||!!x.FormData,canSendBinary:t,cantSendBlobInFormData:!(!(D.ua.gecko&&x.FormData&&x.FileReader)||FileReader.prototype.readAsArrayBuffer),progress:e,chunks:i,multi_selection:!(D.ua.safari&&D.ua.windows),triggerDialog:D.ua.gecko&&x.FormData||D.ua.webkit}},init:function(g,e){var b;function c(e){for(var t,n,i=[],r={},a=0;a<e.length;a++)r[(t=e[a]).name]||(r[t.name]=!0,n=D.guid(),m[n]=t,i.push(new D.File(n,t.fileName||t.name,t.fileSize||t.size)));i.length&&g.trigger("FilesAdded",i)}(b=this.getFeatures()).html5?(g.bind("Init",function(t){var e,n,i,r,a,o,s,d=[],l=t.settings.filters,u=h.body,f=h.createElement("div");f.id=t.id+"_html5_container",D.extend(f.style,{position:"absolute",background:g.settings.shim_bgcolor||"transparent",width:"100px",height:"100px",overflow:"hidden",zIndex:99999,opacity:g.settings.shim_bgcolor?"":0}),f.className="plupload html5",g.settings.container&&(u=h.getElementById(g.settings.container),"static"===D.getStyle(u,"position"))&&(u.style.position="relative"),u.appendChild(f);e:for(n=0;n<l.length;n++)for(r=l[n].extensions.split(/,/),i=0;i<r.length;i++){if("*"===r[i]){d=[];break e}(a=D.mimeTypes[r[i]])&&d.push(a)}f.innerHTML='<input id="'+g.id+'_html5"  style="font-size:999px" type="file" accept="'+d.join(",")+'" '+(g.settings.multi_selection&&g.features.multi_selection?'multiple="multiple"':"")+" />",f.scrollTop=100,u=h.getElementById(g.id+"_html5"),t.features.triggerDialog?D.extend(u.style,{position:"absolute",width:"100%",height:"100%"}):D.extend(u.style,{cssFloat:"right",styleFloat:"right"}),u.onchange=function(){c(this.files),this.value=""},(e=h.getElementById(t.settings.browse_button))&&(o=t.settings.browse_button_hover,s=t.settings.browse_button_active,u=t.features.triggerDialog?e:f,o&&(D.addEvent(u,"mouseover",function(){D.addClass(e,o)},t.id),D.addEvent(u,"mouseout",function(){D.removeClass(e,o)},t.id)),s&&(D.addEvent(u,"mousedown",function(){D.addClass(e,s)},t.id),D.addEvent(h.body,"mouseup",function(){D.removeClass(e,s)},t.id)),t.features.triggerDialog)&&D.addEvent(e,"click",function(e){h.getElementById(t.id+"_html5").click(),e.preventDefault()},t.id)}),g.bind("PostInit",function(){var i=h.getElementById(g.settings.drop_element);i&&(o?D.addEvent(i,"dragenter",function(e){var t,n=h.getElementById(g.id+"_drop");n||((n=h.createElement("input")).setAttribute("type","file"),n.setAttribute("id",g.id+"_drop"),n.setAttribute("multiple","multiple"),D.addEvent(n,"change",function(){c(this.files),D.removeEvent(n,"change",g.id),n.parentNode.removeChild(n)},g.id),i.appendChild(n)),D.getPos(i,h.getElementById(g.settings.container)),t=D.getSize(i),"static"===D.getStyle(i,"position")&&D.extend(i.style,{position:"relative"}),D.extend(n.style,{position:"absolute",display:"block",top:0,left:0,width:t.w+"px",height:t.h+"px",opacity:0})},g.id):(D.addEvent(i,"dragover",function(e){e.preventDefault()},g.id),D.addEvent(i,"drop",function(e){console.log("drag over!");var t=e.dataTransfer;t&&t.files&&c(t.files),e.preventDefault()},g.id)))}),g.bind("Refresh",function(e){var t,n,i=h.getElementById(g.settings.browse_button);i&&(e=D.getPos(i,h.getElementById(e.settings.container)),t=D.getSize(i),n=h.getElementById(g.id+"_html5_container"),D.extend(n.style,{top:e.y+"px",left:e.x+"px",width:t.w+"px",height:t.h+"px"}),g.features.triggerDialog)&&("static"===D.getStyle(i,"position")&&D.extend(i.style,{position:"relative"}),e=parseInt(D.getStyle(i,"z-index"),10),isNaN(e)&&(e=0),D.extend(i.style,{zIndex:e}),D.extend(n.style,{zIndex:e-1}))}),g.bind("UploadFile",function(F,v){var t,e,n,i,r=F.settings;function a(t){var S=0,E=0,n="FileReader"in x?new FileReader:null;!function u(){var f,g,c,h,p,m,y=F.settings.url;function e(n){var i,t=0,r=new XMLHttpRequest,e=r.upload,a="----pluploadboundary"+D.guid(),o="\r\n",s="";if(e&&(e.onprogress=function(e){v.loaded=Math.min(v.size,E+e.loaded-t),F.trigger("UploadProgress",v)}),r.onreadystatechange=function(){var t,e;if(4==r.readyState){try{t=r.status}catch(e){t=0}if(400<=t)F.trigger("Error",{code:D.HTTP_ERROR,message:D.translate("HTTP Error."),file:v,status:t});else{if(g){if(e={chunk:S,chunks:g,response:r.responseText,status:t},F.trigger("ChunkUploaded",v,e),E+=p,e.cancelled)return void(v.status=D.FAILED);v.loaded=Math.min(v.size,(S+1)*h)}else v.loaded=v.size;F.trigger("UploadProgress",v),n=f=i=s=null,!g||++S>=g?(v.status=D.DONE,F.trigger("FileUploaded",v,{response:r.responseText,status:t})):u()}r=null}},F.settings.multipart&&b.multipart){if(c.name=v.target_name||v.name,r.open("post",y,!0),D.each(F.settings.headers,function(e,t){r.setRequestHeader(t,e)}),"string"!=typeof n&&x.FormData)return i=new FormData,D.each(D.extend(c,F.settings.multipart_params),function(e,t){i.append(t,e)}),i.append(F.settings.file_data_name,n),void r.send(i);if("string"==typeof n){if(r.setRequestHeader("Content-Type","multipart/form-data; boundary="+a),D.each(D.extend(c,F.settings.multipart_params),function(e,t){s=(s+="--"+a+o+'Content-Disposition: form-data; name="'+t+'"'+o+o)+unescape(encodeURIComponent(e))+o}),m=D.mimeTypes[v.name.replace(/^.+\.([^.]+)/,"$1").toLowerCase()]||"application/octet-stream",s+="--"+a+o+'Content-Disposition: form-data; name="'+F.settings.file_data_name+'"; filename="'+unescape(encodeURIComponent(v.name))+'"'+o+"Content-Type: "+m+o+o+n+o+"--"+a+"--"+o,t=s.length-n.length,n=s,r.sendAsBinary)r.sendAsBinary(n);else if(b.canSendBinary){for(var d=new Uint8Array(n.length),l=0;l<n.length;l++)d[l]=255&n.charCodeAt(l);r.send(d.buffer)}return}}y=D.buildUrl(F.settings.url,D.extend(c,F.settings.multipart_params)),r.open("post",y,!0),r.setRequestHeader("Content-Type","application/octet-stream"),D.each(F.settings.headers,function(e,t){r.setRequestHeader(t,e)}),r.send(n)}v.status!=D.DONE&&v.status!=D.FAILED&&F.state!=D.STOPPED&&(c={name:v.target_name||v.name},r.chunk_size&&v.size>r.chunk_size&&(b.chunks||"string"==typeof t)?(h=r.chunk_size,g=Math.ceil(v.size/h),p=Math.min(h,v.size-S*h),f="string"==typeof t?t.substring(S*h,S*h+p):function(t,n,i){var e;if(!File.prototype.slice)return(e=File.prototype.webkitSlice||File.prototype.mozSlice)?e.call(t,n,i):null;try{return t.slice(),t.slice(n,i)}catch(e){return t.slice(n,i-n)}}(t,S*h,S*h+p),c.chunk=S,c.chunks=g):(p=v.size,f=t),"string"!=typeof f&&n&&b.cantSendBlobInFormData&&b.chunks&&F.settings.chunk_size?(n.onload=function(){e(n.result)},n.readAsBinaryString(f)):e(f))}()}t=m[v.id],b.jpgresize&&F.settings.resize&&/\.(png|jpg|jpeg)$/i.test(v.name)?s.call(F,v,F.settings.resize,/\.png$/i.test(v.name)?"image/png":"image/jpeg",function(e){e.success?(v.size=e.data.length,a(e.data)):a(t)}):!b.chunks&&b.jpgresize?(e=t,n=a,"FileReader"in x?((i=new FileReader).readAsBinaryString(e),i.onload=function(){n(i.result)}):n(e.getAsBinary())):a(t)}),g.bind("Destroy",function(e){var t,n,i=h.body,r={inputContainer:e.id+"_html5_container",inputFile:e.id+"_html5",browseButton:e.settings.browse_button,dropElm:e.settings.drop_element};for(t in r)(n=h.getElementById(r[t]))&&D.removeAllEvents(n,e.id);D.removeAllEvents(h.body,e.id),(i=e.settings.container?h.getElementById(e.settings.container):i).removeChild(h.getElementById(r.inputContainer))}),e({success:!0})):e({success:!1})}})}(window,document,plupload);