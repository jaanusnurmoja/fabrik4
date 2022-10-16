/*! Fabrik */

!function(p){p.runtimes.BrowserPlus=p.addRuntime("browserplus",{getFeatures:function(){return{dragdrop:!0,jpgresize:!0,pngresize:!0,chunks:!0,progress:!0,multipart:!0,multi_selection:!0}},init:function(i,s){var d=window.BrowserPlus,g={},o=i.settings,n=o.resize;function a(e){var t,s,n,r=[];for(t=0;t<e.length;t++)s=e[t],n=p.guid(),g[n]=s,r.push(new p.File(n,s.name,s.size));t&&i.trigger("FilesAdded",r)}d?d.init(function(e){var t=[{service:"Uploader",version:"3"},{service:"DragAndDrop",version:"1"},{service:"FileBrowse",version:"1"},{service:"FileAccess",version:"2"}];n&&t.push({service:"ImageAlter",version:"4"}),e.success?d.require({services:t},function(e){e.success?(i.bind("PostInit",function(){var e,n=o.drop_element,r=i.id+"_droptarget",t=document.getElementById(n);function s(t,s){d.DragAndDrop.AddDropTarget({id:t},function(e){d.DragAndDrop.AttachCallbacks({id:t,hover:function(e){!e&&s&&s()},drop:function(e){s&&s(),a(e)}},function(){})})}t&&(document.attachEvent&&/MSIE/gi.test(navigator.userAgent)?((e=document.createElement("div")).setAttribute("id",r),p.extend(e.style,{position:"absolute",top:"-1000px",background:"red",filter:"alpha(opacity=0)",opacity:0}),document.body.appendChild(e),p.addEvent(t,"dragenter",function(e){var t,s;t=document.getElementById(n),s=p.getPos(t),p.extend(document.getElementById(r).style,{top:s.y+"px",left:s.x+"px",width:t.offsetWidth+"px",height:t.offsetHeight+"px"})}),s(r,function(){document.getElementById(r).style.top="-1000px"})):s(n)),p.addEvent(document.getElementById(o.browse_button),"click",function(e){var t,s,n,r=[],i=o.filters;e.preventDefault();e:for(t=0;t<i.length;t++)for(n=i[t].extensions.split(","),s=0;s<n.length;s++){if("*"===n[s]){r=[];break e}r.push(p.mimeTypes[n[s]])}d.FileBrowse.OpenBrowseDialog({mimeTypes:r},function(e){e.success&&a(e.value)})}),t=e=null}),i.bind("UploadFile",function(i,o){var a,e=g[o.id],t={},u=i.settings.chunk_size,c=[];function l(n,s){var r;o.status!=p.FAILED&&(t.name=o.target_name||o.name,u&&(t.chunk=""+n,t.chunks=""+s),r=c.shift(),d.Uploader.upload({url:i.settings.url,files:{file:r},cookies:document.cookies,postvars:p.extend(t,i.settings.multipart_params),progressCallback:function(e){var t,s=0;for(a[n]=parseInt(e.filePercent*r.size/100,10),t=0;t<a.length;t++)s+=a[t];o.loaded=s,i.trigger("UploadProgress",o)}},function(e){var t;e.success?(t=e.value.statusCode,u&&i.trigger("ChunkUploaded",o,{chunk:n,chunks:s,response:e.value.body,status:t}),0<c.length?l(++n,s):(o.status=p.DONE,i.trigger("FileUploaded",o,{response:e.value.body,status:t}),400<=t&&i.trigger("Error",{code:p.HTTP_ERROR,message:p.translate("HTTP Error."),file:o,status:t}))):i.trigger("Error",{code:p.GENERIC_ERROR,message:p.translate("Generic Error."),file:o,details:e.error})}))}function s(e){o.size=e.size,u?d.FileAccess.chunk({file:e,chunkSize:u},function(e){if(e.success){var t=e.value,s=t.length;a=Array(s);for(var n=0;n<s;n++)a[n]=0,c.push(t[n]);l(0,s)}}):(a=Array(1),c.push(e),l(0,1))}n&&/\.(png|jpg|jpeg)$/i.test(o.name)?BrowserPlus.ImageAlter.transform({file:e,quality:n.quality||90,actions:[{scale:{maxwidth:n.width,maxheight:n.height}}]},function(e){e.success&&s(e.value.file)}):s(e)}),s({success:!0})):s()}):s()}):s()}})}(plupload);