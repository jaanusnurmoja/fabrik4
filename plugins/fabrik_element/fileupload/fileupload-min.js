/*! Fabrik */

define(["jquery","fab/fileelement"],function(p,e){window.FbFileUpload=new Class({Extends:e,options:{folderSelect:!1,ajax_upload:!1,ajax_show_widget:!0,isCarousel:!1},initialize:function(e,t){var s=this;this.setPlugin("fileupload"),this.parent(e,t),this.container=p(this.container),this.toppath=this.options.dir,"1"===this.options.folderSelect&&!0===this.options.editable&&this.ajaxFolder(),this.doBrowseEvent=null,this.watchBrowseButton(),this.options.ajax_upload&&!1!==this.options.editable&&(Fabrik.fireEvent("fabrik.fileupload.plupload.build.start",this),this.watchAjax(),0!==Object.keys(this.options.files).length&&(this.uploader.trigger("FilesAdded",this.options.files),p.each(this.options.files,function(e,t){var i={filepath:t.path,uri:t.url,showWidget:!1},a=p(Fabrik.jLayouts["fabrik-progress-bar-success"])[0],o=p("#"+t.id).find(".bar")[0];s.uploader.trigger("UploadProgress",t),s.uploader.trigger("FileUploaded",t,{response:JSON.stringify(i)}),p(o).replaceWith(a)})),this.redraw()),this.doDeleteEvent=null,this.watchDeleteButton(),this.watchTab(),this.options.isCarousel&&(p(".slickCarousel").slick(),p(".slickCarouselImage").css("opacity","1")),this.options.isZoom&&(p(".slick-active").find("img").ezPlus({zoomType:"lens",lensShape:"round",lensSize:200}),p(".slickCarousel").on("beforeChange",function(e,t,i,a){p(".zoomWindowContainer,.zoomContainer").remove()}),p(".slickCarousel").on("afterChange",function(e,t,i){p(".slick-active").find("img").ezPlus({zoomType:"lens",lensShape:"round",lensSize:200})}))},redraw:function(){var e=p(this.element);if(this.options.editable&&this.options.ajax_upload){var t=p("#"+e.prop("id")+"_browseButton"),i=p("#"+this.options.element+"_container"),a=t.position().left-i.position().left,o=i.closest(".fabrikElement").find("input[type=file]");if(0<o.length){var s=o.parent();s.css({width:t.width(),height:t.height()}),s.css("top",a)}}this.options.isCarousel&&p(".slickCarousel").slick("resize")},doBrowse:function(e){if(window.File&&window.FileReader&&window.FileList&&window.Blob){var t,a=this,i=e.target.files[0];if(i.type.match("image.*"))(t=new FileReader).onload=function(e){return function(e){var t=p(a.getContainer()),i=t.find("img");i.attr("src",e.target.result),i.closest(".fabrikHide").removeClass("fabrikHide"),t.find("[data-file]").addClass("fabrikHide")}}.bind(this)(i),t.readAsDataURL(i);else if(i.type.match("video.*")){var o,s=p(this.getContainer()),n=s.find("video");if(0<n.length&&(n=this.makeVideoPreview()).appendTo(s),t=new window.FileReader,(t=window.URL||window.webKitURL)&&t.createObjectURL)return o=t.createObjectURL(i),void n.attr("src",o);if(!window.FileReader)return void console.log("Sorry, not so much");(t=new window.FileReader).onload=function(e){n.attr("src",e.target.result)},t.readAsDataURL(i)}}},watchBrowseButton:function(){var e=p(this.element);this.options.useWIP&&!this.options.ajax_upload&&!1!==this.options.editable&&(e.off("change",this.doBrowseEvent),this.doBrowseEvent=this.doBrowse.bind(this),e.on("change",this.doBrowseEvent))},doDelete:function(e){e.preventDefault();var t=p(this.getContainer()),i=this,a=t.find("[data-file]");if(window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_SOFT_DELETE"))){var o=a.data("join-pk-val");new p.ajax({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_clearFileReference",element_id:this.options.id,formid:this.form.id,rowid:this.form.options.rowid,joinPkVal:o}}).done(function(){Fabrik.trigger("fabrik.fileupload.clearfileref.complete",i)}),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))&&(this.makeDeletedImageField(this.groupid,a.data("file")).appendTo(t),Fabrik.fireEvent("fabrik.fileupload.delete.complete",this)),a.remove(),p(this.element).closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:"")}},watchDeleteButton:function(){var e=p(this.getContainer()).find("[data-file]");e.off("click",this.doDeleteEvent),this.doDeleteEvent=this.doDelete.bind(this),e.on("click",this.doDeleteEvent)},getFormElementsKey:function(e){return this.baseElementId=e,this.options.ajax_upload&&1<this.options.ajax_max?this.options.listName+"___"+this.options.elementShortName:this.parent(e)},removeCustomEvents:function(){},cloned:function(e){var t=p(this.element);0!==t.closest(".fabrikElement").length&&(t.closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:""),p(this.getContainer()).find("[data-file]").remove(),this.watchBrowseButton(),this.parent(e))},decloned:function(e){0<p("#form_"+this.form.id).find('input[name="fabrik_deletedimages['+e+']"]').length&&this.makeDeletedImageField(e,this.options.value).inject(this.form.form),this.parent(e)},decreaseName:function(e){var t=this.getOrigField();return"null"!==typeOf(t)&&(t.name=this._decreaseName(t.name,e),t.id=this._decreaseId(t.id,e)),this.parent(e)},getOrigField:function(){var e=this.element.getParent(".fabrikElement"),t=e.getElement("input[name^="+this.origId+"_orig]");return"null"===typeOf(t)&&(t=e.getElement("input[id^="+this.origId+"_orig]")),t},makeDeletedImageField:function(e,t){return p(document.createElement("input")).attr({type:"hidden",name:"fabrik_fileupload_deletedfile["+e+"][]",value:t})},makeVideoPreview:function(){var e=p(this.element);return p(document.createElement("video")).attr({id:e.prop("id")+"_video_preview",controls:!0})},update:function(e){if(this.element){var t=p(this.element);if(""===e)this.options.ajax_upload?(this.uploader.files=[],t.parent().find("[id$=_dropList] tr").remove()):t.val("");else{var i=t.closest("div.fabrikSubElementContainer").find("img");i&&i.prop("src",e)}}},addDropArea:function(){if(Fabrik.bootstraped){var e,t=this.container.find("tr.plupload_droptext");0<t.length?t.show():(e=p(document.createElementget("tr")).addClass("plupload_droptext").html('<td colspan="4"><i class="icon-move"></i> '+Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_DRAG_FILES_HERE")+" </td>"),this.container.find("tbody").append(e)),this.container.find("thead").hide()}},removeDropArea:function(){this.container.find("tr.plupload_droptext").hide()},watchAjax:function(){if(!1!==this.options.editable){var l=this,e=p(this.element).prop("id"),t=p(this.getElement());if(0!==t.length){var i=t.closest(".fabrikSubElementContainer");this.container=i,this.options.ajax_show_widget&&!1!==this.options.canvasSupport&&(this.widget=new s(this.options.modalId,{imagedim:{x:200,y:200,w:this.options.winWidth,h:this.options.winHeight},cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.winWidth/2,y:this.options.winHeight/2},crop:this.options.crop,modalId:this.options.modalId,quality:this.options.quality})),this.pluploadContainer=i.find(".plupload_container"),this.pluploadFallback=i.find(".plupload_fallback"),this.droplist=i.find(".plupload_filelist");var a="index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax";a+="&plugin=fileupload&"+this.options.ajaxToken+"=1",a+="&method=ajax_upload&element_id="+this.options.elid,this.options.isAdmin&&(a="administrator/"+a);var o={runtimes:this.options.ajax_runtime,browse_button:e+"_browseButton",container:e+"_container",drop_element:e+"_dropList_container",url:a,max_file_size:this.options.max_file_size+"kb",unique_names:!1,flash_swf_url:this.options.ajax_flash_path,silverlight_xap_url:this.options.ajax_silverlight_path,chunk_size:this.options.ajax_chunk_size+"kb",dragdrop:!0,multipart:!0,filters:this.options.filters,page_url:this.options.page_url};this.uploader=new plupload.Uploader(o),this.uploader.bind("Init",function(e,t){l.pluploadFallback.remove(),l.pluploadContainer.removeClass("fabrikHide"),e.features.dragdrop&&e.settings.dragdrop&&l.addDropArea()}),this.uploader.bind("FilesRemoved",function(e,t){}),this.uploader.bind("FilesAdded",function(e,t){l.removeDropArea();var s,n=Fabrik.bootstrapped?"tr":"li";l.lastAddedFiles=t,Fabrik.bootstrapped&&l.container.find("thead").css("display",""),s=l.droplist.find(n).length,p.each(t,function(e,t){var i,a,o;t.size>1e3*l.options.max_file_size?window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_FILE_TOO_LARGE_SHORT")):s>=l.options.ajax_max?window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED")):(s++,a=l.isImage(t)?(i=l.editImgButton(),l.options.crop?i.html(l.options.resizeButton):i.html(l.options.previewButton),p(document.createElement("span")).text(t.name)):(i=p(document.createElement("span")),p(document.createElement("a")).attr({href:t.url,target:"_blank"}).text(t.name)),o=l.imageCells(t,a,i),l.droplist.append(p(document.createElement(n)).attr({id:t.id,class:"plupload_delete"}).append(o)))}),setTimeout(function(){e.start()},100)}),this.uploader.bind("UploadProgress",function(e,t){var i=p("#"+t.id);if(0<i.length)if(Fabrik.bootstrapped){var a=i.find(".plupload_file_status .bar");if(a.css("width",t.percent+"%"),100===t.percent){var o=p(Fabrik.jLayouts["fabrik-progress-bar-success"]);a.replaceWith(o)}}else i.find(".plupload_file_status").text(t.percent+"%")}),this.uploader.bind("Error",function(e,i){l.lastAddedFiles.each(function(e){var t=p("#"+e.id);0<t.length&&(t.remove(),window.alert(i.message)),l.addDropArea()})}),this.uploader.bind("ChunkUploaded",function(e,t,i){"object"==typeof(i=JSON.parse(i.response))&&i.error&&fconsole(i.error.message)}),this.uploader.bind("FileUploaded",function(e,t,i){var a,o,s,n,r=p("#"+t.id);if((i=JSON.parse(i.response)).error)return window.alert(i.error),void r.remove();0!==r.length?((s=r.find(".plupload_resize a")).show(),s.attr({href:i.uri,id:"resizebutton_"+t.id}),s.data("filepath",i.filepath),l.widget&&(o=!1!==i.showWidget,l.widget.setImage(i.uri,i.filepath,t.params,o)),a=l.options.inRepeatGroup?l.options.elementName.replace(/\[\d*\]/,"["+l.getRepeatNum()+"]"):l.options.elementName,p(document.createElement("input")).attr({type:"hidden",name:a+"[crop]["+i.filepath+"]",id:"coords_"+t.id,value:JSON.stringify(t.params)}).insertAfter(l.pluploadContainer),p(document.createElement("input")).attr({type:"hidden",name:a+"[cropdata]["+i.filepath+"]",id:"data_"+t.id}).insertAfter(l.pluploadContainer),n=[t.recordid,"0"].pick(),p(document.createElement("input")).attr({type:"hidden",name:a+"[id]["+i.filepath+"]",id:"id_"+t.id,value:n}).insertAfter(l.pluploadContainer),r.removeClass("plupload_file_action").addClass("plupload_done"),l.isSubmitDone()):fconsole("Filuploaded didnt find: "+t.id)}),this.uploader.init()}}},imageCells:function(e,t,i){var a,o,s,n=this.deleteImgButton();return Fabrik.bootstrapped?(s=p(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_resize").append(i),o=Fabrik.jLayouts["fabrik-progress-bar"],a=p(document.createElement("td")).addClass(this.options.spanNames[5]+" plupload_file_status").html(o),[p(document.createElement("td")).addClass(this.options.spanNames[6]+" plupload_file_name").append(t),s,a,n]):[new Element("div",{class:"plupload_file_name"}).adopt([t,new Element("div",{class:"plupload_resize",style:"display:none"}).adopt(i)]),n,a=new Element("div",{class:"plupload_file_status"}).set("text","0%"),new Element("div",{class:"plupload_file_size"}).set("text",e.size),new Element("div",{class:"plupload_clearer"})]},editImgButton:function(){var t=this;return Fabrik.bootstrapped?p(document.createElement("a")).addClass("editImage").attr({href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE")}).css({display:"none"}).on("click",function(e){e.preventDefault(),t.pluploadResize(p(this))}):new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(e){e.stop();var t=e.target.getParent();this.pluploadResize(p(t))}.bind(this)}})},deleteImgButton:function(){if(Fabrik.bootstrapped){var e=Fabrik.jLayouts["fabrik-icon-delete"],t=this;return p(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_file_action").append(p(document.createElement("a")).html(e).attr({href:"#"}).on("click",function(e){e.stopPropagation(),t.pluploadRemoveFile(e)}))}return new Element("div",{class:"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:function(e){this.pluploadRemoveFile(e)}.bind(this)}}))},isImage:function(e){if(void 0!==e.type)return"image"===e.type;var t=e.name.split(".").pop().toLowerCase();return["jpg","jpeg","png","gif"].contains(t)},pluploadRemoveFile:function(t){if(t.stopPropagation(),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){var i=p(t.target).closest("tr").prop("id").split("_").pop(),e=p(t.target).closest("tr").find(".plupload_file_name").text(),a=[];this.uploader.files.each(function(e){e.id!==i&&a.push(e)}),this.uploader.files=a;var o=this,s={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_deleteFile",element_id:this.options.id,file:e,recordid:i,repeatCounter:this.options.repeatCounter};s[this.options.ajaxToken]=1,p.ajax({url:"",data:s}).done(function(e){""===(e=JSON.parse(e)).error&&(Fabrik.trigger("fabrik.fileupload.delete.complete",o),p(t.target).closest(".plupload_delete").remove(),p("#id_alreadyuploaded_"+o.options.id+"_"+i).remove(),p("#coords_alreadyuploaded_"+o.options.id+"_"+i).remove(),0===p(o.getContainer()).find("table tbody tr.plupload_delete").length&&o.addDropArea())})}},pluploadResize:function(e){this.widget&&this.widget.setImage(e.attr("href"),e.data("filepath"),{},!0)},isSubmitDone:function(){this.allUploaded()&&"function"==typeof this.submitCallBack&&(this.saveWidgetState(),this.submitCallBack(!0),delete this.submitCallBack)},onsubmit:function(e){this.submitCallBack=e,this.allUploaded()?(this.saveWidgetState(),this.parent(e)):this.uploader.start()},saveWidgetState:function(){void 0!==this.widget&&p.each(this.widget.images,function(e,t){e=e.split("\\").pop();var i=p('input[name*="'+e+'"]').filter(function(e,t){return t.name.contains("[crop]")});if(0<(i=i.last()).length){var a=t.img;delete t.img,i.val(JSON.stringify(t)),t.img=a}})},allUploaded:function(){var t=!0;return this.uploader&&this.uploader.files.each(function(e){0===e.loaded&&(t=!1)}),t}});var s=new Class({initialize:function(e,t){this.modalId=e,Fabrik.Windows[this.modalId]&&(Fabrik.Windows[this.modalId].options.destroy=!0,Fabrik.Windows[this.modalId].close()),this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}},p.extend(this.imageDefault,t),this.windowopts={id:this.modalId,type:"modal",loadMethod:"html",width:parseInt(this.imageDefault.imagedim.w,10)+40,height:parseInt(this.imageDefault.imagedim.h,10)+170,storeOnClose:!0,createShowOverLay:!1,crop:t.crop,destroy:!1,modalId:t.modalId,quality:t.quality,onClose:function(){this.storeActiveImageData()}.bind(this),onContentLoaded:function(){this.center()},onOpen:function(){this.center()}},this.windowopts.title=t.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW"),this.showWin(),this.canvas=p(this.window).find("canvas")[0],this.images={},this.CANVAS=new FbCanvas({canvasElement:this.canvas,enableMouse:!0,cacheCtxPos:!1}),this.CANVAS.layers.add(new Layer({id:"bg-layer"})),this.CANVAS.layers.add(new Layer({id:"image-layer"})),t.crop&&(this.CANVAS.layers.add(new Layer({id:"overlay-layer"})),this.CANVAS.layers.add(new Layer({id:"crop-layer"})));var i=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(e){void 0===e&&(e=this.CANVAS.ctx),e.fillStyle="#DFDFDF",e.fillRect(0,0,this.imageDefault.imagedim.w/this.scale,this.imageDefault.imagedim.h/this.scale)}.bind(this)}});this.CANVAS.layers.get("bg-layer").add(i),t.crop&&(this.overlay=new CanvasItem({id:"overlay",events:{onDraw:function(e){if(void 0===e&&(e=this.CANVAS.ctx),this.overlay.withinCrop){var t=0,i=0,a={x:this.imageDefault.imagedim.w,y:this.imageDefault.imagedim.h};e.fillStyle="rgba(0, 0, 0, 0.3)";var o=this.cropperCanvas;e.fillRect(t,i,a.x,o.y-o.h/2),e.fillRect(t-o.w/2,i+o.y-o.h/2,t+o.x,o.h),e.fillRect(t+o.x+o.w-o.w/2,i+o.y-o.h/2,a.x,o.h),e.fillRect(t,i+(o.y+o.h)-o.h/2,a.x,a.y)}}.bind(this)}}),this.CANVAS.layers.get("overlay-layer").add(this.overlay)),this.imgCanvas=this.makeImgCanvas(),this.CANVAS.layers.get("image-layer").add(this.imgCanvas),this.cropperCanvas=this.makeCropperCanvas(),t.crop&&this.CANVAS.layers.get("crop-layer").add(this.cropperCanvas),this.makeThread(),this.watchZoom(),this.watchRotate(),this.watchClose(),this.win.close()},setImage:function(e,t,i,a){if(a=a||!1,this.activeFilePath=t,this.images.hasOwnProperty(t))i=this.images[t],this.img=i.img,this.setInterfaceDimensions(i),a&&this.showWin();else var o=i,s=Asset.image(e,{crossOrigin:"anonymous",onLoad:function(){var e=this.storeImageDimensions(t,p(s),o);this.img=e.img,this.setInterfaceDimensions(e),this.showWin(),this.storeActiveImageData(t),a||this.win.close()}.bind(this)})},setInterfaceDimensions:function(e){this.scaleSlide&&this.scaleSlide.set(e.scale),this.rotateSlide&&this.rotateSlide.set(e.rotation),this.cropperCanvas&&e.cropdim&&(this.cropperCanvas.x=e.cropdim.x,this.cropperCanvas.y=e.cropdim.y,this.cropperCanvas.w=e.cropdim.w,this.cropperCanvas.h=e.cropdim.h),this.imgCanvas.w=e.mainimagedim.w,this.imgCanvas.h=e.mainimagedim.h,this.imgCanvas.x=void 0!==e.imagedim?e.imagedim.x:0,this.imgCanvas.y=void 0!==e.imagedim?e.imagedim.y:0},storeImageDimensions:function(e,t,i){t.appendTo(document.body).css({display:"none"}),i=i||new CloneObject(this.imageDefault,!0,[]);var a=t[0].getDimensions(!0);return i.imagedim?i.mainimagedim=i.imagedim:i.mainimagedim={},i.mainimagedim.w=a.width,i.mainimagedim.h=a.height,i.img=t[0],this.images[e]=i},makeImgCanvas:function(){var s=this;return new CanvasItem({id:"imgtocrop",w:this.imageDefault.imagedim.w,h:this.imageDefault.imagedim.h,x:200,y:200,interactive:!0,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(e,t){if(this.dragging){var i=this.w*this.scale,a=this.h*this.scale;this.x=e-this.offset[0]+.5*i,this.y=t-this.offset[1]+.5*a}},onDraw:function(e){if(e=s.CANVAS.ctx,void 0!==s.img){var t=this.w*this.scale,i=this.h*this.scale,a=this.x-.5*t,o=this.y-.5*i;if(e.save(),e.translate(this.x,this.y),e.rotate(this.rotation*Math.PI/180),this.hover?e.strokeStyle="#f00":e.strokeStyle="#000",e.strokeRect(-.5*t,-.5*i,t,i),void 0!==s.img)try{e.drawImage(s.img,-.5*t,-.5*i,t,i)}catch(e){}e.restore(),void 0!==s.img&&s.images.hasOwnProperty(s.activeFilePath)&&(s.images[s.activeFilePath].imagedim={x:this.x,y:this.y,w:t,h:i}),this.setDims(a,o,t,i)}},onMousedown:function(e,t){s.CANVAS.setDrag(this),this.offset=[e-this.dims[0],t-this.dims[1]],this.dragging=!0},onMouseup:function(){s.CANVAS.clearDrag(),this.dragging=!1},onMouseover:function(){s.overImg=!0,document.body.style.cursor="move"},onMouseout:function(){s.overImg=!1,s.overCrop||(document.body.style.cursor="default")}}})},makeCropperCanvas:function(){var s=this;return new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:!0,offset:[0,0],events:{onDraw:function(e){if(void 0!==(e=s.CANVAS.ctx)){var t=this.w,i=this.h,a=this.x-.5*t,o=this.y-.5*i;e.save(),e.translate(this.x,this.y),this.hover?e.strokeStyle="#f00":e.strokeStyle="#000",e.strokeRect(-.5*t,-.5*i,t,i),e.restore(),void 0!==s.img&&s.images.hasOwnProperty(s.activeFilePath)&&(s.images[s.activeFilePath].cropdim={x:this.x,y:this.y,w:t,h:i}),this.setDims(a,o,t,i)}},onMousedown:function(e,t){s.CANVAS.setDrag(this),this.offset=[e-this.dims[0],t-this.dims[1]],this.dragging=!0,s.overlay.withinCrop=!0},onMousemove:function(e,t){if(document.body.style.cursor="move",this.dragging){var i=this.w,a=this.h;this.x=e-this.offset[0]+.5*i,this.y=t-this.offset[1]+.5*a}},onMouseup:function(){s.CANVAS.clearDrag(),this.dragging=!1,s.overlay.withinCrop=!1},onMouseover:function(){this.hover=!0,s.overCrop=!0},onMouseout:function(){s.overImg||(document.body.style.cursor="default"),s.overCrop=!1,this.hover=!1}}})},makeThread:function(){var e=this;this.CANVAS.addThread(new Thread({id:"myThread",onExec:function(){void 0!==e.CANVAS&&void 0!==e.CANVAS.ctxEl&&e.CANVAS.clear().draw()}}))},watchClose:function(){var t=this;this.window.find("input[name=close-crop]").on("click",function(e){t.storeActiveImageData(),t.win.close()})},storeActiveImageData:function(e){if(void 0!==(e=e||this.activeFilePath)){var t=this.cropperCanvas.x,i=this.cropperCanvas.y,a=this.cropperCanvas.w-2,o=this.cropperCanvas.h-2;t-=a/2,i-=o/2;var s=p("#"+this.windowopts.id);if(0!==s.length){var n=s.find("canvas"),r=p(document.createElement("canvas")).attr({width:a+"px",height:o+"px"}).appendTo(document.body),l=r[0].getContext("2d"),d=e.split("\\").pop(),h=p('input[name*="'+d+'"]').filter(function(e,t){return t.name.contains("cropdata")});l.drawImage(n[0],t,i,a,o,0,0,a,o),h.val(r[0].toDataURL("image/jpeg",this.windowopts.quality)),r.remove()}else fconsole("storeActiveImageData no window found for "+this.windowopts.id)}},watchZoom:function(){var t=this;if(this.windowopts.crop){var i=this.window.find("input[name=zoom-val]");this.scaleSlide=new Slider(this.window.find(".fabrikslider-line")[0],this.window.find(".knob")[0],{range:[20,300],onChange:function(e){if(t.imgCanvas.scale=e/100,void 0!==t.img)try{t.images[t.activeFilePath].scale=e}catch(e){fconsole("didnt get active file path:"+t.activeFilePath)}i.val(e)}}).set(100),i.on("change",function(e){t.scaleSlide.set(p(this).val())})}},watchRotate:function(){if(this.windowopts.crop){var t=this,e=this.window.find(".rotate"),i=this.window.find("input[name=rotate-val]");this.rotateSlide=new Slider(e.find(".fabrikslider-line")[0],e.find(".knob")[0],{onChange:function(e){if(t.imgCanvas.rotation=e,void 0!==t.img)try{t.images[t.activeFilePath].rotation=e}catch(e){fconsole("rorate err"+t.activeFilePath)}i.val(e)},steps:360}).set(0),i.on("change",function(){t.rotateSlide.set(p(this).val())})}},showWin:function(){this.win=Fabrik.getWindow(this.windowopts),this.window=p("#"+this.modalId),void 0!==this.CANVAS&&(void 0!==this.CANVAS.ctxEl&&(this.CANVAS.ctxPos=document.id(this.CANVAS.ctxEl).getPosition()),void 0!==this.CANVAS.threads&&void 0!==this.CANVAS.threads.get("myThread")&&this.CANVAS.threads.get("myThread").start(),this.win.drawWindow(),this.win.center())}});return window.FbFileUpload});