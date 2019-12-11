/*! Fabrik */

define(["jquery","fab/fileelement"],function(p,t){window.FbFileUpload=new Class({Extends:t,options:{folderSelect:!1,ajax_upload:!1,ajax_show_widget:!0},initialize:function(t,e){var s=this;this.setPlugin("fileupload"),this.parent(t,e),this.container=p(this.container),this.toppath=this.options.dir,"1"===this.options.folderSelect&&!0===this.options.editable&&this.ajaxFolder(),this.doBrowseEvent=null,this.watchBrowseButton(),this.options.ajax_upload&&!1!==this.options.editable&&(Fabrik.fireEvent("fabrik.fileupload.plupload.build.start",this),this.watchAjax(),0!==Object.keys(this.options.files).length&&(this.uploader.trigger("FilesAdded",this.options.files),p.each(this.options.files,function(t,e){var i={filepath:e.path,uri:e.url,showWidget:!1},a=p(Fabrik.jLayouts["fabrik-progress-bar-success"])[0],o=p("#"+e.id).find(".bar")[0];s.uploader.trigger("UploadProgress",e),s.uploader.trigger("FileUploaded",e,{response:JSON.stringify(i)}),p(o).replaceWith(a)})),this.redraw()),this.doDeleteEvent=null,this.watchDeleteButton(),this.watchTab()},redraw:function(){var t=p(this.element);if(this.options.ajax_upload){var e=p("#"+t.prop("id")+"_browseButton"),i=p("#"+this.options.element+"_container"),a=e.position().left-i.position().left,o=i.closest(".fabrikElement").find("input[type=file]");if(0<o.length){var s=o.parent();s.css({width:e.width(),height:e.height()}),s.css("top",a)}}},doBrowse:function(t){if(window.File&&window.FileReader&&window.FileList&&window.Blob){var e,a=this,i=t.target.files[0];if(i.type.match("image.*"))(e=new FileReader).onload=function(t){return function(t){var e=p(a.getContainer()),i=e.find("img");i.attr("src",t.target.result),i.closest(".fabrikHide").removeClass("fabrikHide"),e.find("[data-file]").addClass("fabrikHide")}}.bind(this)(i),e.readAsDataURL(i);else if(i.type.match("video.*")){var o,s=p(this.getContainer()),n=s.find("video");if(0<n.length&&(n=this.makeVideoPreview()).appendTo(s),e=new window.FileReader,(e=window.URL||window.webKitURL)&&e.createObjectURL)return o=e.createObjectURL(i),void n.attr("src",o);if(!window.FileReader)return void console.log("Sorry, not so much");(e=new window.FileReader).onload=function(t){n.attr("src",t.target.result)},e.readAsDataURL(i)}}},watchBrowseButton:function(){var t=p(this.element);this.options.useWIP&&!this.options.ajax_upload&&!1!==this.options.editable&&(t.off("change",this.doBrowseEvent),this.doBrowseEvent=this.doBrowse.bind(this),t.on("change",this.doBrowseEvent))},doDelete:function(t){t.preventDefault();var e=p(this.getContainer()),i=this,a=e.find("[data-file]");if(window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_SOFT_DELETE"))){var o=a.data("join-pk-val");new p.ajax({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_clearFileReference",element_id:this.options.id,formid:this.form.id,rowid:this.form.options.rowid,joinPkVal:o}}).done(function(){Fabrik.trigger("fabrik.fileupload.clearfileref.complete",i)}),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))&&(this.makeDeletedImageField(this.groupid,a.data("file")).appendTo(e),Fabrik.fireEvent("fabrik.fileupload.delete.complete",this)),a.remove(),p(this.element).closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:"")}},watchDeleteButton:function(){var t=p(this.getContainer()).find("[data-file]");t.off("click",this.doDeleteEvent),this.doDeleteEvent=this.doDelete.bind(this),t.on("click",this.doDeleteEvent)},getFormElementsKey:function(t){return this.baseElementId=t,this.options.ajax_upload&&1<this.options.ajax_max?this.options.listName+"___"+this.options.elementShortName:this.parent(t)},removeCustomEvents:function(){},cloned:function(t){var e=p(this.element);0!==e.closest(".fabrikElement").length&&(e.closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:""),p(this.getContainer()).find("[data-file]").remove(),this.watchBrowseButton(),this.parent(t))},decloned:function(t){0<p("#form_"+this.form.id).find('input[name="fabrik_deletedimages['+t+']"]').length&&this.makeDeletedImageField(t,this.options.value).inject(this.form.form),this.parent(t)},decreaseName:function(t){var e=this.getOrigField();return"null"!==typeOf(e)&&(e.name=this._decreaseName(e.name,t),e.id=this._decreaseId(e.id,t)),this.parent(t)},getOrigField:function(){var t=this.element.getParent(".fabrikElement"),e=t.getElement("input[name^="+this.origId+"_orig]");return"null"===typeOf(e)&&(e=t.getElement("input[id^="+this.origId+"_orig]")),e},makeDeletedImageField:function(t,e){return p(document.createElement("input")).attr({type:"hidden",name:"fabrik_fileupload_deletedfile["+t+"][]",value:e})},makeVideoPreview:function(){var t=p(this.element);return p(document.createElement("video")).attr({id:t.prop("id")+"_video_preview",controls:!0})},update:function(t){if(this.element){var e=p(this.element);if(""===t)this.options.ajax_upload?(this.uploader.files=[],e.parent().find("[id$=_dropList] tr").remove()):e.val("");else{var i=e.closest("div.fabrikSubElementContainer").find("img");i&&i.prop("src",t)}}},addDropArea:function(){if(Fabrik.bootstraped){var t,e=this.container.find("tr.plupload_droptext");0<e.length?e.show():(t=p(document.createElementget("tr")).addClass("plupload_droptext").html('<td colspan="4"><i class="icon-move"></i> '+Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_DRAG_FILES_HERE")+" </td>"),this.container.find("tbody").append(t)),this.container.find("thead").hide()}},removeDropArea:function(){this.container.find("tr.plupload_droptext").hide()},watchAjax:function(){if(!1!==this.options.editable){var d=this,t=p(this.element).prop("id"),e=p(this.getElement());if(0!==e.length){var i=e.closest(".fabrikSubElementContainer");this.container=i,this.options.ajax_show_widget&&!1!==this.options.canvasSupport&&(this.widget=new s(this.options.modalId,{imagedim:{x:200,y:200,w:this.options.winWidth,h:this.options.winHeight},cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.winWidth/2,y:this.options.winHeight/2},crop:this.options.crop,modalId:this.options.modalId,quality:this.options.quality})),this.pluploadContainer=i.find(".plupload_container"),this.pluploadFallback=i.find(".plupload_fallback"),this.droplist=i.find(".plupload_filelist");var a="index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax";a+="&plugin=fileupload&"+this.options.ajaxToken+"=1",a+="&method=ajax_upload&element_id="+this.options.elid,this.options.isAdmin&&(a="administrator/"+a);var o={runtimes:this.options.ajax_runtime,browse_button:t+"_browseButton",container:t+"_container",drop_element:t+"_dropList_container",url:a,max_file_size:this.options.max_file_size+"kb",unique_names:!1,flash_swf_url:this.options.ajax_flash_path,silverlight_xap_url:this.options.ajax_silverlight_path,chunk_size:this.options.ajax_chunk_size+"kb",dragdrop:!0,multipart:!0,filters:this.options.filters,page_url:this.options.page_url};this.uploader=new plupload.Uploader(o),this.uploader.bind("Init",function(t,e){d.pluploadFallback.remove(),d.pluploadContainer.removeClass("fabrikHide"),t.features.dragdrop&&t.settings.dragdrop&&d.addDropArea()}),this.uploader.bind("FilesRemoved",function(t,e){}),this.uploader.bind("FilesAdded",function(t,e){d.removeDropArea();var s,n=Fabrik.bootstrapped?"tr":"li";d.lastAddedFiles=e,Fabrik.bootstrapped&&d.container.find("thead").css("display",""),s=d.droplist.find(n).length,p.each(e,function(t,e){var i,a,o;e.size>1e3*d.options.max_file_size?window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_FILE_TOO_LARGE_SHORT")):s>=d.options.ajax_max?window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED")):(s++,a=d.isImage(e)?(i=d.editImgButton(),d.options.crop?i.html(d.options.resizeButton):i.html(d.options.previewButton),p(document.createElement("span")).text(e.name)):(i=p(document.createElement("span")),p(document.createElement("a")).attr({href:e.url,target:"_blank"}).text(e.name)),o=d.imageCells(e,a,i),d.droplist.append(p(document.createElement(n)).attr({id:e.id,class:"plupload_delete"}).append(o)))}),setTimeout(function(){t.start()},100)}),this.uploader.bind("UploadProgress",function(t,e){var i=p("#"+e.id);if(0<i.length)if(Fabrik.bootstrapped){var a=i.find(".plupload_file_status .bar");if(a.css("width",e.percent+"%"),100===e.percent){var o=p(Fabrik.jLayouts["fabrik-progress-bar-success"]);a.replaceWith(o)}}else i.find(".plupload_file_status").text(e.percent+"%")}),this.uploader.bind("Error",function(t,i){d.lastAddedFiles.each(function(t){var e=p("#"+t.id);0<e.length&&(e.remove(),window.alert(i.message)),d.addDropArea()})}),this.uploader.bind("ChunkUploaded",function(t,e,i){"object"==typeof(i=JSON.parse(i.response))&&i.error&&fconsole(i.error.message)}),this.uploader.bind("FileUploaded",function(t,e,i){var a,o,s,n,r=p("#"+e.id);if((i=JSON.parse(i.response)).error)return window.alert(i.error),void r.remove();0!==r.length?((s=r.find(".plupload_resize a")).show(),s.attr({href:i.uri,id:"resizebutton_"+e.id}),s.data("filepath",i.filepath),d.widget&&(o=!1!==i.showWidget,d.widget.setImage(i.uri,i.filepath,e.params,o)),a=d.options.inRepeatGroup?d.options.elementName.replace(/\[\d*\]/,"["+d.getRepeatNum()+"]"):d.options.elementName,p(document.createElement("input")).attr({type:"hidden",name:a+"[crop]["+i.filepath+"]",id:"coords_"+e.id,value:JSON.stringify(e.params)}).insertAfter(d.pluploadContainer),p(document.createElement("input")).attr({type:"hidden",name:a+"[cropdata]["+i.filepath+"]",id:"data_"+e.id}).insertAfter(d.pluploadContainer),n=[e.recordid,"0"].pick(),p(document.createElement("input")).attr({type:"hidden",name:a+"[id]["+i.filepath+"]",id:"id_"+e.id,value:n}).insertAfter(d.pluploadContainer),r.removeClass("plupload_file_action").addClass("plupload_done"),d.isSubmitDone()):fconsole("Filuploaded didnt find: "+e.id)}),this.uploader.init()}}},imageCells:function(t,e,i){var a,o,s,n=this.deleteImgButton();return Fabrik.bootstrapped?(s=p(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_resize").append(i),o=Fabrik.jLayouts["fabrik-progress-bar"],a=p(document.createElement("td")).addClass(this.options.spanNames[5]+" plupload_file_status").html(o),[p(document.createElement("td")).addClass(this.options.spanNames[6]+" plupload_file_name").append(e),s,a,n]):[new Element("div",{class:"plupload_file_name"}).adopt([e,new Element("div",{class:"plupload_resize",style:"display:none"}).adopt(i)]),n,a=new Element("div",{class:"plupload_file_status"}).set("text","0%"),new Element("div",{class:"plupload_file_size"}).set("text",t.size),new Element("div",{class:"plupload_clearer"})]},editImgButton:function(){var e=this;return Fabrik.bootstrapped?p(document.createElement("a")).addClass("editImage").attr({href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE")}).css({display:"none"}).on("click",function(t){t.preventDefault(),e.pluploadResize(p(this))}):new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(t){t.stop();var e=t.target.getParent();this.pluploadResize(p(e))}.bind(this)}})},deleteImgButton:function(){if(Fabrik.bootstrapped){var t=Fabrik.jLayouts["fabrik-icon-delete"],e=this;return p(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_file_action").append(p(document.createElement("a")).html(t).attr({href:"#"}).on("click",function(t){t.stopPropagation(),e.pluploadRemoveFile(t)}))}return new Element("div",{class:"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:function(t){this.pluploadRemoveFile(t)}.bind(this)}}))},isImage:function(t){if(void 0!==t.type)return"image"===t.type;var e=t.name.split(".").pop().toLowerCase();return["jpg","jpeg","png","gif"].contains(e)},pluploadRemoveFile:function(e){if(e.stopPropagation(),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){var i=p(e.target).closest("tr").prop("id").split("_").pop(),t=p(e.target).closest("tr").find(".plupload_file_name").text(),a=[];this.uploader.files.each(function(t){t.id!==i&&a.push(t)}),this.uploader.files=a;var o=this,s={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_deleteFile",element_id:this.options.id,file:t,recordid:i,repeatCounter:this.options.repeatCounter};s[this.options.ajaxToken]=1,p.ajax({url:"",data:s}).done(function(t){""===(t=JSON.parse(t)).error&&(Fabrik.trigger("fabrik.fileupload.delete.complete",o),p(e.target).closest(".plupload_delete").remove(),p("#id_alreadyuploaded_"+o.options.id+"_"+i).remove(),p("#coords_alreadyuploaded_"+o.options.id+"_"+i).remove(),0===p(o.getContainer()).find("table tbody tr.plupload_delete").length&&o.addDropArea())})}},pluploadResize:function(t){this.widget&&this.widget.setImage(t.attr("href"),t.data("filepath"),{},!0)},isSubmitDone:function(){this.allUploaded()&&"function"==typeof this.submitCallBack&&(this.saveWidgetState(),this.submitCallBack(!0),delete this.submitCallBack)},onsubmit:function(t){this.submitCallBack=t,this.allUploaded()?(this.saveWidgetState(),this.parent(t)):this.uploader.start()},saveWidgetState:function(){void 0!==this.widget&&p.each(this.widget.images,function(t,e){t=t.split("\\").pop();var i=p('input[name*="'+t+'"]').filter(function(t,e){return e.name.contains("[crop]")});if(0<(i=i.last()).length){var a=e.img;delete e.img,i.val(JSON.stringify(e)),e.img=a}})},allUploaded:function(){var e=!0;return this.uploader&&this.uploader.files.each(function(t){0===t.loaded&&(e=!1)}),e}});var s=new Class({initialize:function(t,e){this.modalId=t,Fabrik.Windows[this.modalId]&&(Fabrik.Windows[this.modalId].options.destroy=!0,Fabrik.Windows[this.modalId].close()),this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}},p.extend(this.imageDefault,e),this.windowopts={id:this.modalId,type:"modal",loadMethod:"html",width:parseInt(this.imageDefault.imagedim.w,10)+40,height:parseInt(this.imageDefault.imagedim.h,10)+170,storeOnClose:!0,createShowOverLay:!1,crop:e.crop,destroy:!1,modalId:e.modalId,quality:e.quality,onClose:function(){this.storeActiveImageData()}.bind(this),onContentLoaded:function(){this.center()},onOpen:function(){this.center()}},this.windowopts.title=e.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW"),this.showWin(),this.canvas=p(this.window).find("canvas")[0],this.images={},this.CANVAS=new FbCanvas({canvasElement:this.canvas,enableMouse:!0,cacheCtxPos:!1}),this.CANVAS.layers.add(new Layer({id:"bg-layer"})),this.CANVAS.layers.add(new Layer({id:"image-layer"})),e.crop&&(this.CANVAS.layers.add(new Layer({id:"overlay-layer"})),this.CANVAS.layers.add(new Layer({id:"crop-layer"})));var i=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(t){void 0===t&&(t=this.CANVAS.ctx),t.fillStyle="#DFDFDF",t.fillRect(0,0,this.imageDefault.imagedim.w/this.scale,this.imageDefault.imagedim.h/this.scale)}.bind(this)}});this.CANVAS.layers.get("bg-layer").add(i),e.crop&&(this.overlay=new CanvasItem({id:"overlay",events:{onDraw:function(t){if(void 0===t&&(t=this.CANVAS.ctx),this.overlay.withinCrop){var e=0,i=0,a={x:this.imageDefault.imagedim.w,y:this.imageDefault.imagedim.h};t.fillStyle="rgba(0, 0, 0, 0.3)";var o=this.cropperCanvas;t.fillRect(e,i,a.x,o.y-o.h/2),t.fillRect(e-o.w/2,i+o.y-o.h/2,e+o.x,o.h),t.fillRect(e+o.x+o.w-o.w/2,i+o.y-o.h/2,a.x,o.h),t.fillRect(e,i+(o.y+o.h)-o.h/2,a.x,a.y)}}.bind(this)}}),this.CANVAS.layers.get("overlay-layer").add(this.overlay)),this.imgCanvas=this.makeImgCanvas(),this.CANVAS.layers.get("image-layer").add(this.imgCanvas),this.cropperCanvas=this.makeCropperCanvas(),e.crop&&this.CANVAS.layers.get("crop-layer").add(this.cropperCanvas),this.makeThread(),this.watchZoom(),this.watchRotate(),this.watchClose(),this.win.close()},setImage:function(t,e,i,a){if(a=a||!1,this.activeFilePath=e,this.images.hasOwnProperty(e))i=this.images[e],this.img=i.img,this.setInterfaceDimensions(i),a&&this.showWin();else var o=i,s=Asset.image(t,{crossOrigin:"anonymous",onLoad:function(){var t=this.storeImageDimensions(e,p(s),o);this.img=t.img,this.setInterfaceDimensions(t),this.showWin(),this.storeActiveImageData(e),a||this.win.close()}.bind(this)})},setInterfaceDimensions:function(t){this.scaleSlide&&this.scaleSlide.set(t.scale),this.rotateSlide&&this.rotateSlide.set(t.rotation),this.cropperCanvas&&t.cropdim&&(this.cropperCanvas.x=t.cropdim.x,this.cropperCanvas.y=t.cropdim.y,this.cropperCanvas.w=t.cropdim.w,this.cropperCanvas.h=t.cropdim.h),this.imgCanvas.w=t.mainimagedim.w,this.imgCanvas.h=t.mainimagedim.h,this.imgCanvas.x=void 0!==t.imagedim?t.imagedim.x:0,this.imgCanvas.y=void 0!==t.imagedim?t.imagedim.y:0},storeImageDimensions:function(t,e,i){e.appendTo(document.body).css({display:"none"}),i=i||new CloneObject(this.imageDefault,!0,[]);var a=e[0].getDimensions(!0);return i.imagedim?i.mainimagedim=i.imagedim:i.mainimagedim={},i.mainimagedim.w=a.width,i.mainimagedim.h=a.height,i.img=e[0],this.images[t]=i},makeImgCanvas:function(){var s=this;return new CanvasItem({id:"imgtocrop",w:this.imageDefault.imagedim.w,h:this.imageDefault.imagedim.h,x:200,y:200,interactive:!0,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(t,e){if(this.dragging){var i=this.w*this.scale,a=this.h*this.scale;this.x=t-this.offset[0]+.5*i,this.y=e-this.offset[1]+.5*a}},onDraw:function(t){if(t=s.CANVAS.ctx,void 0!==s.img){var e=this.w*this.scale,i=this.h*this.scale,a=this.x-.5*e,o=this.y-.5*i;if(t.save(),t.translate(this.x,this.y),t.rotate(this.rotation*Math.PI/180),this.hover?t.strokeStyle="#f00":t.strokeStyle="#000",t.strokeRect(-.5*e,-.5*i,e,i),void 0!==s.img)try{t.drawImage(s.img,-.5*e,-.5*i,e,i)}catch(t){}t.restore(),void 0!==s.img&&s.images.hasOwnProperty(s.activeFilePath)&&(s.images[s.activeFilePath].imagedim={x:this.x,y:this.y,w:e,h:i}),this.setDims(a,o,e,i)}},onMousedown:function(t,e){s.CANVAS.setDrag(this),this.offset=[t-this.dims[0],e-this.dims[1]],this.dragging=!0},onMouseup:function(){s.CANVAS.clearDrag(),this.dragging=!1},onMouseover:function(){s.overImg=!0,document.body.style.cursor="move"},onMouseout:function(){s.overImg=!1,s.overCrop||(document.body.style.cursor="default")}}})},makeCropperCanvas:function(){var s=this;return new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:!0,offset:[0,0],events:{onDraw:function(t){if(void 0!==(t=s.CANVAS.ctx)){var e=this.w,i=this.h,a=this.x-.5*e,o=this.y-.5*i;t.save(),t.translate(this.x,this.y),this.hover?t.strokeStyle="#f00":t.strokeStyle="#000",t.strokeRect(-.5*e,-.5*i,e,i),t.restore(),void 0!==s.img&&s.images.hasOwnProperty(s.activeFilePath)&&(s.images[s.activeFilePath].cropdim={x:this.x,y:this.y,w:e,h:i}),this.setDims(a,o,e,i)}},onMousedown:function(t,e){s.CANVAS.setDrag(this),this.offset=[t-this.dims[0],e-this.dims[1]],this.dragging=!0,s.overlay.withinCrop=!0},onMousemove:function(t,e){if(document.body.style.cursor="move",this.dragging){var i=this.w,a=this.h;this.x=t-this.offset[0]+.5*i,this.y=e-this.offset[1]+.5*a}},onMouseup:function(){s.CANVAS.clearDrag(),this.dragging=!1,s.overlay.withinCrop=!1},onMouseover:function(){this.hover=!0,s.overCrop=!0},onMouseout:function(){s.overImg||(document.body.style.cursor="default"),s.overCrop=!1,this.hover=!1}}})},makeThread:function(){var t=this;this.CANVAS.addThread(new Thread({id:"myThread",onExec:function(){void 0!==t.CANVAS&&void 0!==t.CANVAS.ctxEl&&t.CANVAS.clear().draw()}}))},watchClose:function(){var e=this;this.window.find("input[name=close-crop]").on("click",function(t){e.storeActiveImageData(),e.win.close()})},storeActiveImageData:function(t){if(void 0!==(t=t||this.activeFilePath)){var e=this.cropperCanvas.x,i=this.cropperCanvas.y,a=this.cropperCanvas.w-2,o=this.cropperCanvas.h-2;e-=a/2,i-=o/2;var s=p("#"+this.windowopts.id);if(0!==s.length){var n=s.find("canvas"),r=p(document.createElement("canvas")).attr({width:a+"px",height:o+"px"}).appendTo(document.body),d=r[0].getContext("2d"),l=t.split("\\").pop(),h=p('input[name*="'+l+'"]').filter(function(t,e){return e.name.contains("cropdata")});d.drawImage(n[0],e,i,a,o,0,0,a,o),h.val(r[0].toDataURL("image/jpeg",this.windowopts.quality)),r.remove()}else fconsole("storeActiveImageData no window found for "+this.windowopts.id)}},watchZoom:function(){var e=this;if(this.windowopts.crop){var i=this.window.find("input[name=zoom-val]");this.scaleSlide=new Slider(this.window.find(".fabrikslider-line")[0],this.window.find(".knob")[0],{range:[20,300],onChange:function(t){if(e.imgCanvas.scale=t/100,void 0!==e.img)try{e.images[e.activeFilePath].scale=t}catch(t){fconsole("didnt get active file path:"+e.activeFilePath)}i.val(t)}}).set(100),i.on("change",function(t){e.scaleSlide.set(p(this).val())})}},watchRotate:function(){if(this.windowopts.crop){var e=this,t=this.window.find(".rotate"),i=this.window.find("input[name=rotate-val]");this.rotateSlide=new Slider(t.find(".fabrikslider-line")[0],t.find(".knob")[0],{onChange:function(t){if(e.imgCanvas.rotation=t,void 0!==e.img)try{e.images[e.activeFilePath].rotation=t}catch(t){fconsole("rorate err"+e.activeFilePath)}i.val(t)},steps:360}).set(0),i.on("change",function(){e.rotateSlide.set(p(this).val())})}},showWin:function(){this.win=Fabrik.getWindow(this.windowopts),this.window=p("#"+this.modalId),void 0!==this.CANVAS&&(void 0!==this.CANVAS.ctxEl&&(this.CANVAS.ctxPos=document.id(this.CANVAS.ctxEl).getPosition()),void 0!==this.CANVAS.threads&&void 0!==this.CANVAS.threads.get("myThread")&&this.CANVAS.threads.get("myThread").start(),this.win.drawWindow(),this.win.center())}});return window.FbFileUpload});