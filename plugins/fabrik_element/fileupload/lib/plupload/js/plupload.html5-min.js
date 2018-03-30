/*! Fabrik */

!function(x,m,D,p){var s,y={};function r(o,s,d,l){var u,f,g,c,h=this;!function(e,t){var n;if(!("FileReader"in x))return t(e.getAsDataURL());(n=new FileReader).readAsDataURL(e),n.onload=function(){t(n.result)}}(y[o.id],function(a){(u=m.createElement("canvas")).style.display="none",m.body.appendChild(u),f=u.getContext("2d"),(g=new Image).onerror=g.onabort=function(){l({success:!1})},g.onload=function(){var e,t,n,r;if(s.width||(s.width=g.width),s.height||(s.height=g.height),(c=Math.min(s.width/g.width,s.height/g.height))<1||1===c&&"image/jpeg"===d){if(e=Math.round(g.width*c),t=Math.round(g.height*c),u.width=e,u.height=t,f.drawImage(g,0,0,e,t),"image/jpeg"===d){if((n=new function a(e){var o,s,t,n={65505:{app:"EXIF",name:"APP1",signature:"Exif\0"},65506:{app:"ICC",name:"APP2",signature:"ICC_PROFILE\0"},65517:{app:"IPTC",name:"APP13",signature:"Photoshop 3.0\0"}},d=[],i=p,r=0;o=new S;o.init(e);if(65496!==o.SHORT(0))return;s=2;t=Math.min(1048576,e.length);for(;s<=t;)if(65488<=(i=o.SHORT(s))&&i<=65495)s+=2;else{if(65498===i||65497===i)break;r=o.SHORT(s+2)+2,n[i]&&o.STRING(s+4,n[i].signature.length)===n[i].signature&&d.push({hex:i,app:n[i].app.toUpperCase(),name:n[i].name.toUpperCase(),start:s,length:r,segment:o.SEGMENT(s,r)}),s+=r}o.init(null);return{headers:d,restore:function(e){o.init(e);var t=new a(e);if(!t.headers)return!1;for(var n=t.headers.length;0<n;n--){var i=t.headers[n-1];o.SEGMENT(i.start,i.length,"")}t.purge(),s=65504==o.SHORT(2)?4+o.SHORT(4):2;for(var n=0,r=d.length;n<r;n++)o.SEGMENT(s,0,d[n].segment),s+=d[n].length;return o.SEGMENT()},get:function(e){for(var t=[],n=0,i=d.length;n<i;n++)d[n].app===e.toUpperCase()&&t.push(d[n].segment);return t},set:function(e,t){var n=[];"string"==typeof t?n.push(t):n=t;for(var i=ii=0,r=d.length;i<r&&(d[i].app===e.toUpperCase()&&(d[i].segment=n[ii],d[i].length=n[ii].length,ii++),!(ii>=n.length));i++);},purge:function(){d=[],o.init(null)}}}(atob(a.substring(a.indexOf("base64,")+7)))).headers&&n.headers.length&&(r=new function(){var g,l,c,h={};function r(e,t){var n,i,r,a,o,s,d,l=g.SHORT(e),u=[],f={};for(n=0;n<l;n++)if(s=e+12*n+2,(r=t[g.SHORT(s)])!==p){switch(a=g.SHORT(s+=2),o=g.LONG(s+=2),s+=4,u=[],a){case 1:case 7:for(4<o&&(s=g.LONG(s)+h.tiffHeader),i=0;i<o;i++)u[i]=g.BYTE(s+i);break;case 2:4<o&&(s=g.LONG(s)+h.tiffHeader),f[r]=g.STRING(s,o-1);continue;case 3:for(2<o&&(s=g.LONG(s)+h.tiffHeader),i=0;i<o;i++)u[i]=g.SHORT(s+2*i);break;case 4:for(1<o&&(s=g.LONG(s)+h.tiffHeader),i=0;i<o;i++)u[i]=g.LONG(s+4*i);break;case 5:for(s=g.LONG(s)+h.tiffHeader,i=0;i<o;i++)u[i]=g.LONG(s+4*i)/g.LONG(s+4*i+4);break;case 9:for(s=g.LONG(s)+h.tiffHeader,i=0;i<o;i++)u[i]=g.SLONG(s+4*i);break;case 10:for(s=g.LONG(s)+h.tiffHeader,i=0;i<o;i++)u[i]=g.SLONG(s+4*i)/g.SLONG(s+4*i+4);break;default:continue}d=1==o?u[0]:u,c.hasOwnProperty(r)&&"object"!=typeof d?f[r]=c[r][d]:f[r]=d}return f}return g=new S,l={tiff:{274:"Orientation",34665:"ExifIFDPointer",34853:"GPSInfoIFDPointer"},exif:{36864:"ExifVersion",40961:"ColorSpace",40962:"PixelXDimension",40963:"PixelYDimension",36867:"DateTimeOriginal",33434:"ExposureTime",33437:"FNumber",34855:"ISOSpeedRatings",37377:"ShutterSpeedValue",37378:"ApertureValue",37383:"MeteringMode",37384:"LightSource",37385:"Flash",41986:"ExposureMode",41987:"WhiteBalance",41990:"SceneCaptureType",41988:"DigitalZoomRatio",41992:"Contrast",41993:"Saturation",41994:"Sharpness"},gps:{0:"GPSVersionID",1:"GPSLatitudeRef",2:"GPSLatitude",3:"GPSLongitudeRef",4:"GPSLongitude"}},c={ColorSpace:{1:"sRGB",0:"Uncalibrated"},MeteringMode:{0:"Unknown",1:"Average",2:"CenterWeightedAverage",3:"Spot",4:"MultiSpot",5:"Pattern",6:"Partial",255:"Other"},LightSource:{1:"Daylight",2:"Fliorescent",3:"Tungsten",4:"Flash",9:"Fine weather",10:"Cloudy weather",11:"Shade",12:"Daylight fluorescent (D 5700 - 7100K)",13:"Day white fluorescent (N 4600 -5400K)",14:"Cool white fluorescent (W 3900 - 4500K)",15:"White fluorescent (WW 3200 - 3700K)",17:"Standard light A",18:"Standard light B",19:"Standard light C",20:"D55",21:"D65",22:"D75",23:"D50",24:"ISO studio tungsten",255:"Other"},Flash:{0:"Flash did not fire.",1:"Flash fired.",5:"Strobe return light not detected.",7:"Strobe return light detected.",9:"Flash fired, compulsory flash mode",13:"Flash fired, compulsory flash mode, return light not detected",15:"Flash fired, compulsory flash mode, return light detected",16:"Flash did not fire, compulsory flash mode",24:"Flash did not fire, auto mode",25:"Flash fired, auto mode",29:"Flash fired, auto mode, return light not detected",31:"Flash fired, auto mode, return light detected",32:"No flash function",65:"Flash fired, red-eye reduction mode",69:"Flash fired, red-eye reduction mode, return light not detected",71:"Flash fired, red-eye reduction mode, return light detected",73:"Flash fired, compulsory flash mode, red-eye reduction mode",77:"Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected",79:"Flash fired, compulsory flash mode, red-eye reduction mode, return light detected",89:"Flash fired, auto mode, red-eye reduction mode",93:"Flash fired, auto mode, return light not detected, red-eye reduction mode",95:"Flash fired, auto mode, return light detected, red-eye reduction mode"},ExposureMode:{0:"Auto exposure",1:"Manual exposure",2:"Auto bracket"},WhiteBalance:{0:"Auto white balance",1:"Manual white balance"},SceneCaptureType:{0:"Standard",1:"Landscape",2:"Portrait",3:"Night scene"},Contrast:{0:"Normal",1:"Soft",2:"Hard"},Saturation:{0:"Normal",1:"Low saturation",2:"High saturation"},Sharpness:{0:"Normal",1:"Soft",2:"Hard"},GPSLatitudeRef:{N:"North latitude",S:"South latitude"},GPSLongitudeRef:{E:"East longitude",W:"West longitude"}},{init:function(e){return h={tiffHeader:10},!(e===p||!e.length||(g.init(e),65505!==g.SHORT(0)||"EXIF\0"!==g.STRING(4,5).toUpperCase()||(t=p,n=h.tiffHeader,g.II(18761==g.SHORT(n)),42!==g.SHORT(n+=2)||(h.IFD0=h.tiffHeader+g.LONG(n+=2),t=r(h.IFD0,l.tiff),h.exifIFD="ExifIFDPointer"in t?h.tiffHeader+t.ExifIFDPointer:p,h.gpsIFD="GPSInfoIFDPointer"in t?h.tiffHeader+t.GPSInfoIFDPointer:p,0))));var t,n},EXIF:function(){var e;return(e=r(h.exifIFD,l.exif)).ExifVersion&&(e.ExifVersion=String.fromCharCode(e.ExifVersion[0],e.ExifVersion[1],e.ExifVersion[2],e.ExifVersion[3])),e},GPS:function(){var e;return(e=r(h.gpsIFD,l.gps)).GPSVersionID&&(e.GPSVersionID=e.GPSVersionID.join(".")),e},setExif:function(e,t){return("PixelXDimension"===e||"PixelYDimension"===e)&&function(e,t,n){var r,a,o,s=0;if("string"==typeof t){var d=l[e.toLowerCase()];for(hex in d)if(d[hex]===t){t=hex;break}}for(r=h[e.toLowerCase()+"IFD"],a=g.SHORT(r),i=0;i<a;i++)if(o=r+12*i+2,g.SHORT(o)==t){s=o+8;break}return!!s&&(g.LONG(s,n),!0)}("exif",e,t)},getBinary:function(){return g.SEGMENT()}}}).init(n.get("exif")[0])&&(r.setExif("PixelXDimension",e),r.setExif("PixelYDimension",t),n.set("exif",r.getBinary()),h.hasEventListener("ExifData")&&h.trigger("ExifData",o,r.EXIF()),h.hasEventListener("GpsData")&&h.trigger("GpsData",o,r.GPS())),s.quality)try{a=u.toDataURL(d,s.quality/100)}catch(e){a=u.toDataURL(d)}}else a=u.toDataURL(d);a=a.substring(a.indexOf("base64,")+7),a=atob(a),n&&n.headers&&n.headers.length&&(a=n.restore(a),n.purge()),u.parentNode.removeChild(u),l({success:!0,data:a})}else l({success:!1})},g.src=a})}function S(){var a,o=!1;function i(e,t){var n,i=o?0:-8*(t-1),r=0;for(n=0;n<t;n++)r|=a.charCodeAt(e+n)<<Math.abs(i+8*n);return r}function s(e,t,n){n=3===arguments.length?n:a.length-t-1;a=a.substr(0,t)+e+a.substr(n+t)}return{II:function(e){if(e===p)return o;o=e},init:function(e){o=!1,a=e},SEGMENT:function(e,t,n){switch(arguments.length){case 1:return a.substr(e,a.length-e-1);case 2:return a.substr(e,t);case 3:s(n,e,t);break;default:return a}},BYTE:function(e){return i(e,1)},SHORT:function(e){return i(e,2)},LONG:function(e,t){if(t===p)return i(e,4);!function(e,t,n){var i,r="",a=o?0:-8*(n-1);for(i=0;i<n;i++)r+=String.fromCharCode(t>>Math.abs(a+8*i)&255);s(r,e,n)}(e,t,4)},SLONG:function(e){var t=i(e,4);return 2147483647<t?t-4294967296:t},STRING:function(e,t){var n="";for(t+=e;e<t;e++)n+=String.fromCharCode(i(e,1));return n}}}D.runtimes.Html5=D.addRuntime("html5",{getFeatures:function(){var e,t,n,i,r,a,o;return t=n=r=a=!1,x.XMLHttpRequest&&(n=!!(e=new XMLHttpRequest).upload,t=!(!e.sendAsBinary&&!e.upload)),t&&(i=!!(e.sendAsBinary||x.Uint8Array&&x.ArrayBuffer),r=!(!File||!File.prototype.getAsDataURL&&!x.FileReader||!i),a=!(!File||!(File.prototype.mozSlice||File.prototype.webkitSlice||File.prototype.slice))),s=!(D.ua.safari&&D.ua.windows),{html5:t,dragdrop:(o=m.createElement("div"),"draggable"in o||"ondragstart"in o&&"ondrop"in o),jpgresize:r,pngresize:r,multipart:r||!!x.FileReader||!!x.FormData,canSendBinary:i,cantSendBlobInFormData:!(!(D.ua.gecko&&x.FormData&&x.FileReader)||FileReader.prototype.readAsArrayBuffer),progress:n,chunks:a,multi_selection:!(D.ua.safari&&D.ua.windows),triggerDialog:D.ua.gecko&&x.FormData||D.ua.webkit}},init:function(h,e){var b;function p(e){var t,n,i,r=[],a={};for(n=0;n<e.length;n++)a[(t=e[n]).name]||(a[t.name]=!0,i=D.guid(),y[i]=t,r.push(new D.File(i,t.fileName||t.name,t.fileSize||t.size)));r.length&&h.trigger("FilesAdded",r)}(b=this.getFeatures()).html5?(h.bind("Init",function(t){var e,n,i,r,a,o,s,d=[],l=t.settings.filters,u=m.body;(e=m.createElement("div")).id=t.id+"_html5_container",D.extend(e.style,{position:"absolute",background:h.settings.shim_bgcolor||"transparent",width:"100px",height:"100px",overflow:"hidden",zIndex:99999,opacity:h.settings.shim_bgcolor?"":0}),e.className="plupload html5",h.settings.container&&(u=m.getElementById(h.settings.container),"static"===D.getStyle(u,"position")&&(u.style.position="relative")),u.appendChild(e);e:for(i=0;i<l.length;i++)for(a=l[i].extensions.split(/,/),r=0;r<a.length;r++){if("*"===a[r]){d=[];break e}(o=D.mimeTypes[a[r]])&&d.push(o)}if(e.innerHTML='<input id="'+h.id+'_html5"  style="font-size:999px" type="file" accept="'+d.join(",")+'" '+(h.settings.multi_selection&&h.features.multi_selection?'multiple="multiple"':"")+" />",e.scrollTop=100,s=m.getElementById(h.id+"_html5"),t.features.triggerDialog?D.extend(s.style,{position:"absolute",width:"100%",height:"100%"}):D.extend(s.style,{cssFloat:"right",styleFloat:"right"}),s.onchange=function(){p(this.files),this.value=""},n=m.getElementById(t.settings.browse_button)){var f=t.settings.browse_button_hover,g=t.settings.browse_button_active,c=t.features.triggerDialog?n:e;f&&(D.addEvent(c,"mouseover",function(){D.addClass(n,f)},t.id),D.addEvent(c,"mouseout",function(){D.removeClass(n,f)},t.id)),g&&(D.addEvent(c,"mousedown",function(){D.addClass(n,g)},t.id),D.addEvent(m.body,"mouseup",function(){D.removeClass(n,g)},t.id)),t.features.triggerDialog&&D.addEvent(n,"click",function(e){m.getElementById(t.id+"_html5").click(),e.preventDefault()},t.id)}}),h.bind("PostInit",function(){var i=m.getElementById(h.settings.drop_element);if(i){if(s)return void D.addEvent(i,"dragenter",function(e){var t,n;(t=m.getElementById(h.id+"_drop"))||((t=m.createElement("input")).setAttribute("type","file"),t.setAttribute("id",h.id+"_drop"),t.setAttribute("multiple","multiple"),D.addEvent(t,"change",function(){p(this.files),D.removeEvent(t,"change",h.id),t.parentNode.removeChild(t)},h.id),i.appendChild(t)),D.getPos(i,m.getElementById(h.settings.container)),n=D.getSize(i),"static"===D.getStyle(i,"position")&&D.extend(i.style,{position:"relative"}),D.extend(t.style,{position:"absolute",display:"block",top:0,left:0,width:n.w+"px",height:n.h+"px",opacity:0})},h.id);D.addEvent(i,"dragover",function(e){e.preventDefault()},h.id),D.addEvent(i,"drop",function(e){console.log("drag over!");var t=e.dataTransfer;t&&t.files&&p(t.files),e.preventDefault()},h.id)}}),h.bind("Refresh",function(e){var t,n,i,r,a;(t=m.getElementById(h.settings.browse_button))&&(n=D.getPos(t,m.getElementById(e.settings.container)),i=D.getSize(t),r=m.getElementById(h.id+"_html5_container"),D.extend(r.style,{top:n.y+"px",left:n.x+"px",width:i.w+"px",height:i.h+"px"}),h.features.triggerDialog&&("static"===D.getStyle(t,"position")&&D.extend(t.style,{position:"relative"}),a=parseInt(D.getStyle(t,"z-index"),10),isNaN(a)&&(a=0),D.extend(t.style,{zIndex:a}),D.extend(r.style,{zIndex:a-1})))}),h.bind("UploadFile",function(E,F){var t,i=E.settings;function n(t){var S=0,v=0,n="FileReader"in x?new FileReader:null;!function u(){var f,g,c,h,p,m,y=E.settings.url;function e(n){var i,t=0,r=new XMLHttpRequest,e=r.upload,a="----pluploadboundary"+D.guid(),o="\r\n",s="";if(e&&(e.onprogress=function(e){F.loaded=Math.min(F.size,v+e.loaded-t),E.trigger("UploadProgress",F)}),r.onreadystatechange=function(){var t,e;if(4==r.readyState){try{t=r.status}catch(e){t=0}if(400<=t)E.trigger("Error",{code:D.HTTP_ERROR,message:D.translate("HTTP Error."),file:F,status:t});else{if(g){if(e={chunk:S,chunks:g,response:r.responseText,status:t},E.trigger("ChunkUploaded",F,e),v+=p,e.cancelled)return void(F.status=D.FAILED);F.loaded=Math.min(F.size,(S+1)*h)}else F.loaded=F.size;E.trigger("UploadProgress",F),n=f=i=s=null,!g||++S>=g?(F.status=D.DONE,E.trigger("FileUploaded",F,{response:r.responseText,status:t})):u()}r=null}},E.settings.multipart&&b.multipart){if(c.name=F.target_name||F.name,r.open("post",y,!0),D.each(E.settings.headers,function(e,t){r.setRequestHeader(t,e)}),"string"!=typeof n&&x.FormData)return i=new FormData,D.each(D.extend(c,E.settings.multipart_params),function(e,t){i.append(t,e)}),i.append(E.settings.file_data_name,n),void r.send(i);if("string"==typeof n){if(r.setRequestHeader("Content-Type","multipart/form-data; boundary="+a),D.each(D.extend(c,E.settings.multipart_params),function(e,t){s+="--"+a+o+'Content-Disposition: form-data; name="'+t+'"'+o+o,s+=unescape(encodeURIComponent(e))+o}),m=D.mimeTypes[F.name.replace(/^.+\.([^.]+)/,"$1").toLowerCase()]||"application/octet-stream",s+="--"+a+o+'Content-Disposition: form-data; name="'+E.settings.file_data_name+'"; filename="'+unescape(encodeURIComponent(F.name))+'"'+o+"Content-Type: "+m+o+o+n+o+"--"+a+"--"+o,t=s.length-n.length,n=s,r.sendAsBinary)r.sendAsBinary(n);else if(b.canSendBinary){for(var d=new Uint8Array(n.length),l=0;l<n.length;l++)d[l]=255&n.charCodeAt(l);r.send(d.buffer)}return}}y=D.buildUrl(E.settings.url,D.extend(c,E.settings.multipart_params)),r.open("post",y,!0),r.setRequestHeader("Content-Type","application/octet-stream"),D.each(E.settings.headers,function(e,t){r.setRequestHeader(t,e)}),r.send(n)}F.status!=D.DONE&&F.status!=D.FAILED&&E.state!=D.STOPPED&&(c={name:F.target_name||F.name},i.chunk_size&&F.size>i.chunk_size&&(b.chunks||"string"==typeof t)?(h=i.chunk_size,g=Math.ceil(F.size/h),p=Math.min(h,F.size-S*h),f="string"==typeof t?t.substring(S*h,S*h+p):function(t,n,i){var e;if(!File.prototype.slice)return(e=File.prototype.webkitSlice||File.prototype.mozSlice)?e.call(t,n,i):null;try{return t.slice(),t.slice(n,i)}catch(e){return t.slice(n,i-n)}}(t,S*h,S*h+p),c.chunk=S,c.chunks=g):(p=F.size,f=t),"string"!=typeof f&&n&&b.cantSendBlobInFormData&&b.chunks&&E.settings.chunk_size?(n.onload=function(){e(n.result)},n.readAsBinaryString(f)):e(f))}()}t=y[F.id],b.jpgresize&&E.settings.resize&&/\.(png|jpg|jpeg)$/i.test(F.name)?r.call(E,F,E.settings.resize,/\.png$/i.test(F.name)?"image/png":"image/jpeg",function(e){e.success?(F.size=e.data.length,n(e.data)):n(t)}):!b.chunks&&b.jpgresize?function(e,t){var n;if(!("FileReader"in x))return t(e.getAsBinary());(n=new FileReader).readAsBinaryString(e),n.onload=function(){t(n.result)}}(t,n):n(t)}),h.bind("Destroy",function(e){var t,n,i=m.body,r={inputContainer:e.id+"_html5_container",inputFile:e.id+"_html5",browseButton:e.settings.browse_button,dropElm:e.settings.drop_element};for(t in r)(n=m.getElementById(r[t]))&&D.removeAllEvents(n,e.id);D.removeAllEvents(m.body,e.id),e.settings.container&&(i=m.getElementById(e.settings.container)),i.removeChild(m.getElementById(r.inputContainer))}),e({success:!0})):e({success:!1})}})}(window,document,plupload);