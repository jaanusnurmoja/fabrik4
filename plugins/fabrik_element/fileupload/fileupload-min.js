/*! Fabrik */

define(["jquery","fab/fileelement"],function(a,b){window.FbFileUpload=new Class({Extends:b,options:{folderSelect:!1,ajax_upload:!1},initialize:function(b,c){var d=this;this.setPlugin("fileupload"),this.parent(b,c),this.container=a(this.container),this.toppath=this.options.dir,"1"===this.options.folderSelect&&!0===this.options.editable&&this.ajaxFolder(),this.doBrowseEvent=null,this.watchBrowseButton(),this.options.ajax_upload&&!1!==this.options.editable&&(Fabrik.fireEvent("fabrik.fileupload.plupload.build.start",this),this.watchAjax(),0!==Object.keys(this.options.files).length&&(this.uploader.trigger("FilesAdded",this.options.files),a.each(this.options.files,function(b,c){var e={filepath:c.path,uri:c.url,showWidget:!1},f=a(Fabrik.jLayouts["fabrik-progress-bar-success"])[0],g=a("#"+c.id).find(".bar")[0];d.uploader.trigger("UploadProgress",c),d.uploader.trigger("FileUploaded",c,{response:JSON.stringify(e)}),a(g).replaceWith(f)})),this.redraw()),this.doDeleteEvent=null,this.watchDeleteButton(),this.watchTab()},redraw:function(){var b=a(this.element);if(this.options.ajax_upload){var c=a("#"+b.prop("id")+"_browseButton"),d=a("#"+this.options.element+"_container"),e=c.position().left-d.position().left,f=d.closest(".fabrikElement").find("input[type=file]");if(f.length>0){var g=f.parent();g.css({width:c.width(),height:c.height()}),g.css("top",e)}}},doBrowse:function(b){if(window.File&&window.FileReader&&window.FileList&&window.Blob){var c,d=this,e=b.target.files,f=e[0];if(f.type.match("image.*"))c=new FileReader,c.onload=function(b){return function(b){var c=a(d.getContainer()),e=c.find("img");e.attr("src",b.target.result),e.closest(".fabrikHide").removeClass("fabrikHide"),c.find("[data-file]").addClass("fabrikHide")}}.bind(this)(f),c.readAsDataURL(f);else if(f.type.match("video.*")){var g=a(this.getContainer()),h=g.find("video");h.length>0&&(h=this.makeVideoPreview(),h.appendTo(g)),c=new window.FileReader;var i;if((c=window.URL||window.webKitURL)&&c.createObjectURL)return i=c.createObjectURL(f),void h.attr("src",i);if(!window.FileReader)return void console.log("Sorry, not so much");c=new window.FileReader,c.onload=function(a){h.attr("src",a.target.result)},c.readAsDataURL(f)}}},watchBrowseButton:function(){var b=a(this.element);this.options.useWIP&&!this.options.ajax_upload&&!1!==this.options.editable&&(b.off("change",this.doBrowseEvent),this.doBrowseEvent=this.doBrowse.bind(this),b.on("change",this.doBrowseEvent))},doDelete:function(b){b.preventDefault();var c=a(this.getContainer()),d=this,e=c.find("[data-file]");if(window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_SOFT_DELETE"))){var f=e.data("join-pk-val");new a.ajax({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_clearFileReference",element_id:this.options.id,formid:this.form.id,rowid:this.form.options.rowid,joinPkVal:f}}).done(function(){Fabrik.trigger("fabrik.fileupload.clearfileref.complete",d)}),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))&&(this.makeDeletedImageField(this.groupid,e.data("file")).appendTo(c),Fabrik.fireEvent("fabrik.fileupload.delete.complete",this)),e.remove();a(this.element).closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:"")}},watchDeleteButton:function(){var b=a(this.getContainer()),c=b.find("[data-file]");c.off("click",this.doDeleteEvent),this.doDeleteEvent=this.doDelete.bind(this),c.on("click",this.doDeleteEvent)},getFormElementsKey:function(a){return this.baseElementId=a,this.options.ajax_upload&&this.options.ajax_max>1?this.options.listName+"___"+this.options.elementShortName:this.parent(a)},removeCustomEvents:function(){},cloned:function(b){var c=a(this.element);if(0!==c.closest(".fabrikElement").length){c.closest(".fabrikElement").find("img").attr("src",""!==this.options.defaultImage?Fabrik.liveSite+this.options.defaultImage:""),a(this.getContainer()).find("[data-file]").remove(),this.watchBrowseButton(),this.parent(b)}},decloned:function(b){a("#form_"+this.form.id).find("input[name=fabrik_deletedimages["+b+"]]").length>0&&this.makeDeletedImageField(b,this.options.value).inject(this.form.form)},decreaseName:function(a){var b=this.getOrigField();return"null"!==typeOf(b)&&(b.name=this._decreaseName(b.name,a),b.id=this._decreaseId(b.id,a)),this.parent(a)},getOrigField:function(){var a=this.element.getParent(".fabrikElement"),b=a.getElement("input[name^="+this.origId+"_orig]");return"null"===typeOf(b)&&(b=a.getElement("input[id^="+this.origId+"_orig]")),b},makeDeletedImageField:function(b,c){return a(document.createElement("input")).attr({type:"hidden",name:"fabrik_fileupload_deletedfile["+b+"][]",value:c})},makeVideoPreview:function(){var b=a(this.element);return a(document.createElement("video")).attr({id:b.prop("id")+"_video_preview",controls:!0})},update:function(b){if(this.element){var c=a(this.element);if(""===b)this.options.ajax_upload?(this.uploader.files=[],c.parent().find("[id$=_dropList] tr").remove()):c.val("");else{var d=c.closest("div.fabrikSubElementContainer").find("img");d&&d.prop("src",b)}}},addDropArea:function(){if(Fabrik.bootstraped){var b,c=this.container.find("tr.plupload_droptext");c.length>0?c.show():(b=a(document.createElementget("tr")).addClass("plupload_droptext").html('<td colspan="4"><i class="icon-move"></i> '+Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_DRAG_FILES_HERE")+" </td>"),this.container.find("tbody").append(b)),this.container.find("thead").hide()}},removeDropArea:function(){this.container.find("tr.plupload_droptext").hide()},watchAjax:function(){if(!1!==this.options.editable){var b=this,d=a(this.element).prop("id"),e=a(this.getElement());if(0!==e.length){var f=e.closest(".fabrikSubElementContainer");this.container=f,!1!==this.options.canvasSupport&&(this.widget=new c(this.options.modalId,{imagedim:{x:200,y:200,w:this.options.winWidth,h:this.options.winHeight},cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.winWidth/2,y:this.options.winHeight/2},crop:this.options.crop,modalId:this.options.modalId,quality:this.options.quality})),this.pluploadContainer=f.find(".plupload_container"),this.pluploadFallback=f.find(".plupload_fallback"),this.droplist=f.find(".plupload_filelist");var g="index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax";g+="&plugin=fileupload&"+this.options.ajaxToken+"=1",g+="&method=ajax_upload&element_id="+this.options.elid,this.options.isAdmin&&(g="administrator/"+g);var h={runtimes:this.options.ajax_runtime,browse_button:d+"_browseButton",container:d+"_container",drop_element:d+"_dropList_container",url:g,max_file_size:this.options.max_file_size+"kb",unique_names:!1,flash_swf_url:this.options.ajax_flash_path,silverlight_xap_url:this.options.ajax_silverlight_path,chunk_size:this.options.ajax_chunk_size+"kb",dragdrop:!0,multipart:!0,filters:this.options.filters,page_url:this.options.page_url};this.uploader=new plupload.Uploader(h),this.uploader.bind("Init",function(a,c){b.pluploadFallback.remove(),b.pluploadContainer.removeClass("fabrikHide"),a.features.dragdrop&&a.settings.dragdrop&&b.addDropArea()}),this.uploader.bind("FilesRemoved",function(a,b){}),this.uploader.bind("FilesAdded",function(c,d){b.removeDropArea();var e,f=Fabrik.bootstrapped?"tr":"li";b.lastAddedFiles=d,Fabrik.bootstrapped&&b.container.find("thead").css("display",""),e=b.droplist.find(f).length,a.each(d,function(c,d){if(d.size>1e3*b.options.max_file_size)window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_FILE_TOO_LARGE_SHORT"));else if(e>=b.options.ajax_max)window.alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED"));else{e++;var g,h,i;b.isImage(d)?(g=b.editImgButton(),b.options.crop?g.html(b.options.resizeButton):g.html(b.options.previewButton),h=a(document.createElement("span")).text(d.name)):(g=a(document.createElement("span")),h=a(document.createElement("a")).attr({href:d.url,target:"_blank"}).text(d.name)),i=b.imageCells(d,h,g),b.droplist.append(a(document.createElement(f)).attr({id:d.id,class:"plupload_delete"}).append(i))}}),setTimeout(function(){c.start()},100)}),this.uploader.bind("UploadProgress",function(b,c){var d=a("#"+c.id);if(d.length>0)if(Fabrik.bootstrapped){var e=d.find(".plupload_file_status .bar");if(e.css("width",c.percent+"%"),100===c.percent){var f=a(Fabrik.jLayouts["fabrik-progress-bar-success"]);e.replaceWith(f)}}else d.find(".plupload_file_status").text(c.percent+"%")}),this.uploader.bind("Error",function(c,d){b.lastAddedFiles.each(function(c){var e=a("#"+c.id);e.length>0&&(e.remove(),window.alert(d.message)),b.addDropArea()})}),this.uploader.bind("ChunkUploaded",function(a,b,c){"object"==typeof(c=JSON.parse(c.response))&&c.error&&fconsole(c.error.message)}),this.uploader.bind("FileUploaded",function(c,d,e){var f,g,h,i,j,h=a("#"+d.id);return e=JSON.parse(e.response),e.error?(window.alert(e.error),void h.remove()):0===h.length?void fconsole("Filuploaded didnt find: "+d.id):(i=h.find(".plupload_resize a"),i.show(),i.attr({href:e.uri,id:"resizebutton_"+d.id}),i.data("filepath",e.filepath),b.widget&&(g=!1!==e.showWidget,b.widget.setImage(e.uri,e.filepath,d.params,g)),f=b.options.inRepeatGroup?b.options.elementName.replace(/\[\d*\]/,"["+b.getRepeatNum()+"]"):b.options.elementName,a(document.createElement("input")).attr({type:"hidden",name:f+"[crop]["+e.filepath+"]",id:"coords_"+d.id,value:JSON.stringify(d.params)}).insertAfter(b.pluploadContainer),a(document.createElement("input")).attr({type:"hidden",name:f+"[cropdata]["+e.filepath+"]",id:"data_"+d.id}).insertAfter(b.pluploadContainer),j=[d.recordid,"0"].pick(),a(document.createElement("input")).attr({type:"hidden",name:f+"[id]["+e.filepath+"]",id:"id_"+d.id,value:j}).insertAfter(b.pluploadContainer),h.removeClass("plupload_file_action").addClass("plupload_done"),void b.isSubmitDone())}),this.uploader.init()}}},imageCells:function(b,c,d){var e,f,g,h,i=this.deleteImgButton();return Fabrik.bootstrapped?(h=a(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_resize").append(d),g=Fabrik.jLayouts["fabrik-progress-bar"],f=a(document.createElement("td")).addClass(this.options.spanNames[5]+" plupload_file_status").html(g),e=a(document.createElement("td")).addClass(this.options.spanNames[6]+" plupload_file_name").append(c),[e,h,f,i]):(e=new Element("div",{class:"plupload_file_name"}).adopt([c,new Element("div",{class:"plupload_resize",style:"display:none"}).adopt(d)]),f=new Element("div",{class:"plupload_file_status"}).set("text","0%"),[e,i,f,new Element("div",{class:"plupload_file_size"}).set("text",b.size),new Element("div",{class:"plupload_clearer"})])},editImgButton:function(){var b=this;return Fabrik.bootstrapped?a(document.createElement("a")).addClass("editImage").attr({href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE")}).css({display:"none"}).on("click",function(c){c.preventDefault(),b.pluploadResize(a(this))}):new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(b){b.stop();var c=b.target.getParent();this.pluploadResize(a(c))}.bind(this)}})},deleteImgButton:function(){if(Fabrik.bootstrapped){var b=Fabrik.jLayouts["fabrik-icon-delete"],c=this;return a(document.createElement("td")).addClass(this.options.spanNames[1]+" plupload_file_action").append(a(document.createElement("a")).html(b).attr({href:"#"}).on("click",function(a){a.stopPropagation(),c.pluploadRemoveFile(a)}))}return new Element("div",{class:"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:function(a){this.pluploadRemoveFile(a)}.bind(this)}}))},isImage:function(a){return void 0!==a.type?"image"===a.type:["jpg","jpeg","png","gif"].contains(a.name.split(".").pop().toLowerCase())},pluploadRemoveFile:function(b){if(b.stopPropagation(),window.confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){var c=a(b.target).closest("tr").prop("id").split("_").pop(),d=a(b.target).closest("tr").find(".plupload_file_name").text(),e=[];this.uploader.files.each(function(a){a.id!==c&&e.push(a)}),this.uploader.files=e,a.ajax({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_deleteFile",element_id:this.options.id,file:d,recordid:c,repeatCounter:this.options.repeatCounter}});a(b.target).closest(".plupload_delete").remove(),a("#id_alreadyuploaded_"+this.options.id+"_"+c).remove(),a("#coords_alreadyuploaded_"+this.options.id+"_"+c).remove(),0===a(this.getContainer()).find("table tbody tr.plupload_delete").length&&this.addDropArea()}},pluploadResize:function(a){this.widget&&this.widget.setImage(a.attr("href"),a.data("filepath"),{},!0)},isSubmitDone:function(){this.allUploaded()&&"function"==typeof this.submitCallBack&&(this.saveWidgetState(),this.submitCallBack(!0),delete this.submitCallBack)},onsubmit:function(a){this.submitCallBack=a,this.allUploaded()?(this.saveWidgetState(),this.parent(a)):this.uploader.start()},saveWidgetState:function(){void 0!==this.widget&&a.each(this.widget.images,function(b,c){b=b.split("\\").pop();var d=a('input[name*="'+b+'"]').filter(function(a,b){return b.name.contains("[crop]")});if(d=d.last(),d.length>0){var e=c.img;delete c.img,d.val(JSON.stringify(c)),c.img=e}})},allUploaded:function(){var a=!0;return this.uploader&&this.uploader.files.each(function(b){0===b.loaded&&(a=!1)}),a}});var c=new Class({initialize:function(b,c){this.modalId=b,Fabrik.Windows[this.modalId]&&(Fabrik.Windows[this.modalId].options.destroy=!0,Fabrik.Windows[this.modalId].close()),this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}},a.extend(this.imageDefault,c),this.windowopts={id:this.modalId,type:"modal",loadMethod:"html",width:parseInt(this.imageDefault.imagedim.w,10)+40,height:parseInt(this.imageDefault.imagedim.h,10)+170,storeOnClose:!0,createShowOverLay:!1,crop:c.crop,destroy:!1,modalId:c.modalId,quality:c.quality,onClose:function(){this.storeActiveImageData()}.bind(this),onContentLoaded:function(){this.center()},onOpen:function(){this.center()}},this.windowopts.title=c.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW"),this.showWin(),this.canvas=a(this.window).find("canvas")[0],this.images={},this.CANVAS=new FbCanvas({canvasElement:this.canvas,enableMouse:!0,cacheCtxPos:!1}),this.CANVAS.layers.add(new Layer({id:"bg-layer"})),this.CANVAS.layers.add(new Layer({id:"image-layer"})),c.crop&&(this.CANVAS.layers.add(new Layer({id:"overlay-layer"})),this.CANVAS.layers.add(new Layer({id:"crop-layer"})));var d=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(a){void 0===a&&(a=this.CANVAS.ctx),a.fillStyle="#DFDFDF",a.fillRect(0,0,this.imageDefault.imagedim.w/this.scale,this.imageDefault.imagedim.h/this.scale)}.bind(this)}});this.CANVAS.layers.get("bg-layer").add(d),c.crop&&(this.overlay=new CanvasItem({id:"overlay",events:{onDraw:function(a){if(void 0===a&&(a=this.CANVAS.ctx),this.withinCrop=!0,this.withinCrop){var b={x:0,y:0},c={x:this.imageDefault.imagedim.w,y:this.imageDefault.imagedim.h};a.fillStyle="rgba(0, 0, 0, 0.3)";var d=this.cropperCanvas;a.fillRect(b.x,b.y,c.x,d.y-d.h/2),a.fillRect(b.x-d.w/2,b.y+d.y-d.h/2,b.x+d.x,d.h),a.fillRect(b.x+d.x+d.w-d.w/2,b.y+d.y-d.h/2,c.x,d.h),a.fillRect(b.x,b.y+(d.y+d.h)-d.h/2,c.x,c.y)}}.bind(this)}}),this.CANVAS.layers.get("overlay-layer").add(this.overlay)),this.imgCanvas=this.makeImgCanvas(),this.CANVAS.layers.get("image-layer").add(this.imgCanvas),this.cropperCanvas=this.makeCropperCanvas(),c.crop&&this.CANVAS.layers.get("crop-layer").add(this.cropperCanvas),this.makeThread(),this.watchZoom(),this.watchRotate(),this.watchClose(),this.win.close()},setImage:function(b,c,d,e){if(e=e||!1,this.activeFilePath=c,this.images.hasOwnProperty(c))d=this.images[c],this.img=d.img,this.setInterfaceDimensions(d),e&&this.showWin();else var f=d,g=Asset.image(b,{crossOrigin:"anonymous",onLoad:function(){var b=this.storeImageDimensions(c,a(g),f);this.img=b.img,this.setInterfaceDimensions(b),this.showWin(),this.storeActiveImageData(c),e||this.win.close()}.bind(this)})},setInterfaceDimensions:function(a){this.scaleSlide&&this.scaleSlide.set(a.scale),this.rotateSlide&&this.rotateSlide.set(a.rotation),this.cropperCanvas&&a.cropdim&&(this.cropperCanvas.x=a.cropdim.x,this.cropperCanvas.y=a.cropdim.y,this.cropperCanvas.w=a.cropdim.w,this.cropperCanvas.h=a.cropdim.h),this.imgCanvas.w=a.mainimagedim.w,this.imgCanvas.h=a.mainimagedim.h,this.imgCanvas.x=void 0!==a.imagedim?a.imagedim.x:0,this.imgCanvas.y=void 0!==a.imagedim?a.imagedim.y:0},storeImageDimensions:function(a,b,c){b.appendTo(document.body).css({display:"none"}),c=c||new CloneObject(this.imageDefault,!0,[]);var d=b[0].getDimensions(!0);return c.imagedim?c.mainimagedim=c.imagedim:c.mainimagedim={},c.mainimagedim.w=d.width,c.mainimagedim.h=d.height,c.img=b[0],this.images[a]=c,c},makeImgCanvas:function(){var a=this;return new CanvasItem({id:"imgtocrop",w:this.imageDefault.imagedim.w,h:this.imageDefault.imagedim.h,x:200,y:200,interactive:!0,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(a,b){if(this.dragging){var c=this.w*this.scale,d=this.h*this.scale;this.x=a-this.offset[0]+.5*c,this.y=b-this.offset[1]+.5*d}},onDraw:function(b){if(b=a.CANVAS.ctx,void 0!==a.img){var c=this.w*this.scale,d=this.h*this.scale,e=this.x-.5*c,f=this.y-.5*d;if(b.save(),b.translate(this.x,this.y),b.rotate(this.rotation*Math.PI/180),this.hover?b.strokeStyle="#f00":b.strokeStyle="#000",b.strokeRect(-.5*c,-.5*d,c,d),void 0!==a.img)try{b.drawImage(a.img,-.5*c,-.5*d,c,d)}catch(a){}b.restore(),void 0!==a.img&&a.images.hasOwnProperty(a.activeFilePath)&&(a.images[a.activeFilePath].imagedim={x:this.x,y:this.y,w:c,h:d}),this.setDims(e,f,c,d)}},onMousedown:function(b,c){a.CANVAS.setDrag(this),this.offset=[b-this.dims[0],c-this.dims[1]],this.dragging=!0},onMouseup:function(){a.CANVAS.clearDrag(),this.dragging=!1},onMouseover:function(){a.overImg=!0,document.body.style.cursor="move"},onMouseout:function(){a.overImg=!1,a.overCrop||(document.body.style.cursor="default")}}})},makeCropperCanvas:function(){var a=this;return new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:!0,offset:[0,0],events:{onDraw:function(b){if(void 0!==(b=a.CANVAS.ctx)){var c=this.w,d=this.h,e=this.x-.5*c,f=this.y-.5*d;b.save(),b.translate(this.x,this.y),this.hover?b.strokeStyle="#f00":b.strokeStyle="#000",b.strokeRect(-.5*c,-.5*d,c,d),b.restore(),void 0!==a.img&&a.images.hasOwnProperty(a.activeFilePath)&&(a.images[a.activeFilePath].cropdim={x:this.x,y:this.y,w:c,h:d}),this.setDims(e,f,c,d)}},onMousedown:function(b,c){a.CANVAS.setDrag(this),this.offset=[b-this.dims[0],c-this.dims[1]],this.dragging=!0,a.overlay.withinCrop=!0},onMousemove:function(a,b){if(document.body.style.cursor="move",this.dragging){var c=this.w,d=this.h;this.x=a-this.offset[0]+.5*c,this.y=b-this.offset[1]+.5*d}},onMouseup:function(){a.CANVAS.clearDrag(),this.dragging=!1,a.overlay.withinCrop=!1},onMouseover:function(){this.hover=!0,a.overCrop=!0},onMouseout:function(){a.overImg||(document.body.style.cursor="default"),a.overCrop=!1,this.hover=!1}}})},makeThread:function(){var a=this;this.CANVAS.addThread(new Thread({id:"myThread",onExec:function(){void 0!==a.CANVAS&&void 0!==a.CANVAS.ctxEl&&a.CANVAS.clear().draw()}}))},watchClose:function(){var a=this;this.window.find("input[name=close-crop]").on("click",function(b){a.storeActiveImageData(),a.win.close()})},storeActiveImageData:function(b){if(void 0!==(b=b||this.activeFilePath)){var c=this.cropperCanvas.x,d=this.cropperCanvas.y,e=this.cropperCanvas.w-2,f=this.cropperCanvas.h-2;c-=e/2,d-=f/2;var g=a("#"+this.windowopts.id);if(0===g.length)return void fconsole("storeActiveImageData no window found for "+this.windowopts.id);var h=g.find("canvas"),i=a(document.createElement("canvas")).attr({width:e+"px",height:f+"px"}).appendTo(document.body),j=i[0].getContext("2d"),k=b.split("\\").pop(),l=a('input[name*="'+k+'"]').filter(function(a,b){return b.name.contains("cropdata")});j.drawImage(h[0],c,d,e,f,0,0,e,f),l.val(i[0].toDataURL({quality:this.windowopts.quality})),i.remove()}},watchZoom:function(){var b=this;if(this.windowopts.crop){var c=this.window.find("input[name=zoom-val]");this.scaleSlide=new Slider(this.window.find(".fabrikslider-line")[0],this.window.find(".knob")[0],{range:[20,300],onChange:function(a){if(b.imgCanvas.scale=a/100,void 0!==b.img)try{b.images[b.activeFilePath].scale=a}catch(a){fconsole("didnt get active file path:"+b.activeFilePath)}c.val(a)}}).set(100),c.on("change",function(c){b.scaleSlide.set(a(this).val())})}},watchRotate:function(){if(this.windowopts.crop){var b=this,c=this.window.find(".rotate"),d=this.window.find("input[name=rotate-val]");this.rotateSlide=new Slider(c.find(".fabrikslider-line")[0],c.find(".knob")[0],{onChange:function(a){if(b.imgCanvas.rotation=a,void 0!==b.img)try{b.images[b.activeFilePath].rotation=a}catch(a){fconsole("rorate err"+b.activeFilePath)}d.val(a)},steps:360}).set(0),d.on("change",function(){b.rotateSlide.set(a(this).val())})}},showWin:function(){this.win=Fabrik.getWindow(this.windowopts),this.window=a("#"+this.modalId),void 0!==this.CANVAS&&(void 0!==this.CANVAS.ctxEl&&(this.CANVAS.ctxPos=document.id(this.CANVAS.ctxEl).getPosition()),void 0!==this.CANVAS.threads&&void 0!==this.CANVAS.threads.get("myThread")&&this.CANVAS.threads.get("myThread").start(),this.win.drawWindow(),this.win.center())}});return window.FbFileUpload});