var FbFileUpload=new Class({Extends:FbFileElement,initialize:function(b,a){this.plugin="fileupload";this.parent(b,a);this.toppath=this.options.dir;if(this.options.folderSelect==="1"&&this.options.editable===true){this.ajaxFolder()}if(this.options.ajax_upload&&this.options.editable!==false){this.watchAjax();this.options.files=$H(this.options.files);if(this.options.files.getLength()!==0){this.uploader.trigger("FilesAdded",this.options.files);this.startbutton.addClass("plupload_disabled");this.options.files.each(function(g){var c={filepath:g.path,uri:g.url};this.uploader.trigger("UploadProgress",g);this.uploader.trigger("FileUploaded",g,{response:JSON.encode(c)});document.id(g.id).getElement(".plupload_file_status  .bar").setStyle("width","100%").addClass("bar-success")}.bind(this));var f=document.id(this.options.element+"_container");var e=document.id(this.options.element+"_browseButton").getPosition().y-f.getPosition().y;var d=f.getParent(".fabrikElement").getElement("input[type=file]");if(d){f.getParent(".fabrikElement").getElement("input[type=file]").getParent().setStyle("top",e)}}}this.watchDeleteButton()},watchDeleteButton:function(){var d=this.getContainer();if(!d){return}var a=d.getElement("[data-file]");if(typeOf(a)!=="null"){a.addEvent("click",function(c){c.stop();if(confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_SOFT_DELETE"))){new Request({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_clearFileReference",element_id:this.options.id,formid:this.form.id,rowid:this.form.options.rowid}}).send();if(confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){this.makeDeletedImageField(this.groupid,a.get("data-file")).inject(this.getContainer(),"inside")}var b=document.id(this.element.id+"_delete_span");if(b){b.destroy()}}}.bind(this))}},getFormElementsKey:function(a){this.baseElementId=a;if(this.options.ajax_upload&&this.options.ajax_max>1){return this.options.listName+"___"+this.options.elementShortName}else{return this.parent(a)}},removeCustomEvents:function(){},cloned:function(b){if(typeOf(this.element.getParent(".fabrikElement"))==="null"){return}var a=this.element.getParent(".fabrikElement").getElement("img");if(a){a.src=Fabrik.liveSite+this.options.defaultImage}this.parent(b)},decloned:function(a){var c=document.id("form_"+this.form.id);var b=c.getElement("input[name=fabrik_deletedimages["+a+"]");if(typeOf(b)==="null"){this.makeDeletedImageField(a,this.options.value).inject(c)}},makeDeletedImageField:function(a,b){return new Element("input",{type:"hidden",name:"fabrik_fileupload_deletedfile["+a+"][]",value:b})},update:function(b){if(this.element){var a=this.element.getElement("img");if(typeOf(a)!=="null"){a.src=b}}},addDropArea:function(){if(!Fabrik.bootstraped){return}var a=this.container.getElement("tr.plupload_droptext"),b;if(typeOf(a)!=="null"){a.show()}else{b=new Element("tr.plupload_droptext").set("html",'<td colspan="4"><i class="icon-move"></i> '+Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_DRAG_FILES_HERE")+" </td>");this.container.getElement("tbody").adopt(b)}this.container.getElement("thead").hide()},removeDropArea:function(){var a=this.container.getElement("tr.plupload_droptext");if(typeOf(a)!=="null"){a.hide()}},watchAjax:function(){if(this.options.editable===false){return}var b,g;var f=this.getElement();if(typeOf(f)==="null"){return}var h=f.getParent(".fabrikSubElementContainer");this.container=h;var e=h.getElement("canvas");if(typeOf(e)==="null"){return}if(this.options.canvasSupport!==false){this.widget=new ImageWidget(e,{imagedim:{x:200,y:200,w:this.options.winWidth,h:this.options.winHeight},cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.winWidth/2,y:this.options.winHeight/2},crop:this.options.crop})}this.pluploadContainer=h.getElement(".plupload_container");this.pluploadFallback=h.getElement(".plupload_fallback");this.droplist=h.getElement(".plupload_filelist");if(Fabrik.bootstrapped){this.startbutton=h.getElement("*[data-action=plupload_start]")}else{this.startbutton=h.getElement(".plupload_start")}var d={runtimes:this.options.ajax_runtime,browse_button:this.element.id+"_browseButton",container:this.element.id+"_container",drop_element:this.element.id+"_dropList_container",url:"index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax&plugin=fileupload&method=ajax_upload&element_id="+this.options.elid,max_file_size:this.options.max_file_size+"kb",unique_names:false,flash_swf_url:this.options.ajax_flash_path,silverlight_xap_url:this.options.ajax_silverlight_path,chunk_size:this.options.ajax_chunk_size+"kb",dragdrop:true,multipart:true,filters:this.options.filters};this.uploader=new plupload.Uploader(d);this.uploader.bind("Init",function(a,c){this.pluploadFallback.destroy();this.pluploadContainer.removeClass("fabrikHide");if(a.features.dragdrop&&a.settings.dragdrop){this.addDropArea()}}.bind(this));this.uploader.bind("FilesRemoved",function(a,c){});this.uploader.bind("FilesAdded",function(a,i){this.removeDropArea();this.lastAddedFiles=i;if(Fabrik.bootstrapped){this.container.getElement("thead").show()}var c=this.droplist.getElements("li").length;this.startbutton.removeClass("disabled");i.each(function(n,j){if(n.size>this.options.max_file_size*1000){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_FILE_TOO_LARGE_SHORT"))}else{if(c>=this.options.ajax_max){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED"))}else{c++;var k,o,m;if(this.isImage(n)){k=this.editImgButton();if(this.options.crop){k.set("html",this.options.resizeButton)}else{k.set("html",this.options.previewButton)}o=new Element("span").set("text",n.name)}else{k=new Element("span");o=new Element("a",{href:n.url}).set("text",n.name)}innerli=this.imageCells(n,o,k);var l=Fabrik.bootstrapped?"tr":"li";this.droplist.adopt(new Element(l,{id:n.id,"class":"plupload_delete"}).adopt(innerli))}}}.bind(this))}.bind(this));this.uploader.bind("UploadProgress",function(a,c){var j=document.id(c.id);if(typeOf(j)!=="null"){if(Fabrik.bootstrapped){var i=document.id(c.id).getElement(".plupload_file_status .bar");i.setStyle("width",c.percent+"%");if(c.percent===100){i.addClass("bar-success")}}else{document.id(c.id).getElement(".plupload_file_status").set("text",c.percent+"%")}}});this.uploader.bind("Error",function(a,c){this.lastAddedFiles.each(function(i){var j=document.id(i.id);if(typeOf(j)!=="null"){j.destroy();alert(c.message)}this.addDropArea()}.bind(this))}.bind(this));this.uploader.bind("ChunkUploaded",function(a,i,c){c=JSON.decode(c.response);if(typeOf(c)!=="null"){if(c.error){fconsole(c.error.message)}}});this.uploader.bind("FileUploaded",function(a,j,c){c=JSON.decode(c.response);if(c.error){alert(c.error);document.id(j.id).destroy();return}var l=document.id(j.id);if(typeOf(l)==="null"){fconsole("Filuploaded didnt find: "+j.id);return}var i=document.id(j.id).getElement(".plupload_resize").getElement("a");if(i){i.show();i.href=c.uri;i.id="resizebutton_"+j.id;i.store("filepath",c.filepath)}if(this.widget){this.widget.setImage(c.uri,c.filepath,j.params)}new Element("input",{type:"hidden",name:this.options.elementName+"[crop]["+c.filepath+"]",id:"coords_"+j.id,value:JSON.encode(j.params)}).inject(this.pluploadContainer,"after");new Element("input",{type:"hidden",name:this.options.elementName+"[cropdata]["+c.filepath+"]",id:"data_"+j.id}).inject(this.pluploadContainer,"after");var k=[j.recordid,"0"].pick();new Element("input",{type:"hidden",name:this.options.elementName+"[id]["+c.filepath+"]",id:"id_"+j.id,value:k}).inject(this.pluploadContainer,"after");document.id(j.id).removeClass("plupload_file_action").addClass("plupload_done");this.isSumbitDone()}.bind(this));this.startbutton.addEvent("click",function(a){a.stop();this.uploader.start()}.bind(this));this.uploader.init()},imageCells:function(d,g,h){var i=this.deleteImgButton(),c,e;if(Fabrik.bootstrapped){var f=new Element("td.span1.plupload_resize").adopt(h);var b='<div class="progress progress-striped"><div class="bar" style="width: 0%;"></div></div>';e=new Element("td.span5.plupload_file_status",{}).set("html",b);c=new Element("td.span6.plupload_file_name",{}).adopt(g);return[c,f,e,i]}else{c=new Element("div",{"class":"plupload_file_name"}).adopt([g,new Element("div",{"class":"plupload_resize",style:"display:none"}).adopt(h)]);e=new Element("div",{"class":"plupload_file_status"}).set("text","0%");var j=new Element("div",{"class":"plupload_file_size"}).set("text",d.size);return[c,i,e,j,new Element("div",{"class":"plupload_clearer"})]}},editImgButton:function(){if(Fabrik.bootstrapped){return new Element("a.editImage",{href:"#",styles:{display:"none"},alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(a){this.pluploadResize(a)}.bind(this)}})}else{return new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(a){this.pluploadResize(a)}.bind(this)}})}},deleteImgButton:function(){if(Fabrik.bootstrapped){return new Element("td.span1.plupload_file_action",{}).adopt(new Element("a",{href:"#","class":"icon-delete",events:{click:function(a){a.stop();this.pluploadRemoveFile(a)}.bind(this)}}))}else{return new Element("div",{"class":"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:function(a){this.pluploadRemoveFile(a)}.bind(this)}}))}},isImage:function(a){if(typeOf(a.type)!=="null"){return a.type==="image"}var b=a.name.split(".").getLast().toLowerCase();return["jpg","jpeg","png","gif"].contains(b)},pluploadRemoveFile:function(d){d.stop();if(!confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){return}var g=d.target.getParent().getParent().id.split("_").getLast();var c=d.target.getParent().getParent().getElement(".plupload_file_name").get("text");var b=[];this.uploader.files.each(function(e){if(e.id!==g){b.push(e)}});this.uploader.files=b;new Request({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_deleteFile",element_id:this.options.id,file:c,recordid:g,repeatCounter:this.options.repeatCounter}}).send();var a=d.target.getParent(".plupload_delete");a.destroy();if(document.id("id_alreadyuploaded_"+this.options.id+"_"+g)){document.id("id_alreadyuploaded_"+this.options.id+"_"+g).destroy()}if(document.id("coords_alreadyuploaded_"+this.options.id+"_"+g)){document.id("coords_alreadyuploaded_"+this.options.id+"_"+g).destroy()}if(this.getContainer().getElements("table tbody tr.plupload_delete").length===0){this.addDropArea()}},pluploadResize:function(c){c.stop();var b=c.target.getParent();if(this.widget){this.widget.setImage(b.href,b.retrieve("filepath"))}},isSumbitDone:function(){if(this.allUploaded()&&typeof(this.submitCallBack)==="function"){this.saveWidgetState();this.submitCallBack(true);delete this.submitCallBack}},onsubmit:function(a){this.submitCallBack=a;if(!this.allUploaded()){this.uploader.start()}else{this.saveWidgetState();this.parent(a)}},saveWidgetState:function(){if(typeOf(this.widget)!=="null"){this.widget.images.each(function(d,b){b=b.split("\\").getLast();var c=document.getElements("input[name*="+b+"]").filter(function(e){return e.name.contains("[crop]")});c=c.getLast();if(typeOf(c)!=="null"){var a=d.img;delete (d.img);c.value=JSON.encode(d);d.img=a}})}},allUploaded:function(){var a=true;if(this.uploader){this.uploader.files.each(function(b){if(b.loaded===0){a=false}}.bind(this))}return a}});var ImageWidget=new Class({initialize:function(a,d){this.canvas=a;this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}};Object.append(this.imageDefault,d);this.windowopts={id:this.canvas.id+"-mocha",type:"modal",content:this.canvas.getParent(),loadMethod:"html",width:this.imageDefault.imagedim.w.toInt()+40,height:this.imageDefault.imagedim.h.toInt()+150,storeOnClose:true,createShowOverLay:false,crop:d.crop,destroy:false,onClose:function(){this.storeActiveImageData()}.bind(this),onContentLoaded:function(){this.center()},onOpen:function(){this.center()}};this.windowopts.title=d.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW");this.showWin();this.images=$H({});var c=this;this.CANVAS=new FbCanvas({canvasElement:document.id(this.canvas.id),enableMouse:true,cacheCtxPos:false});this.CANVAS.layers.add(new Layer({id:"bg-layer"}));this.CANVAS.layers.add(new Layer({id:"image-layer"}));if(d.crop){this.CANVAS.layers.add(new Layer({id:"overlay-layer"}));this.CANVAS.layers.add(new Layer({id:"crop-layer"}))}var b=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(e){if(typeOf(e)==="null"){e=this.CANVAS.ctx}e.fillStyle="#DFDFDF";e.fillRect(0,0,this.imageDefault.imagedim.w/this.scale,this.imageDefault.imagedim.h/this.scale)}.bind(this)}});this.CANVAS.layers.get("bg-layer").add(b);if(d.crop){this.overlay=new CanvasItem({id:"overlay",events:{onDraw:function(e){if(typeOf(e)==="null"){e=this.CANVAS.ctx}this.withinCrop=true;if(this.withinCrop){var h={x:0,y:0};var f={x:this.imageDefault.imagedim.w,y:this.imageDefault.imagedim.h};e.fillStyle="rgba(0, 0, 0, 0.3)";var g=this.cropperCanvas;e.fillRect(h.x,h.y,f.x,g.y-(g.h/2));e.fillRect(h.x-(g.w/2),h.y+g.y-(g.h/2),h.x+g.x,g.h);e.fillRect(h.x+g.x+g.w-(g.w/2),h.y+g.y-(g.h/2),f.x,g.h);e.fillRect(h.x,h.y+(g.y+g.h)-(g.h/2),f.x,f.y)}}.bind(this)}});this.CANVAS.layers.get("overlay-layer").add(this.overlay)}this.imgCanvas=this.makeImgCanvas();this.CANVAS.layers.get("image-layer").add(this.imgCanvas);this.cropperCanvas=this.makeCropperCanvas();if(d.crop){this.CANVAS.layers.get("crop-layer").add(this.cropperCanvas)}this.makeThread();this.watchZoom();this.watchRotate();this.watchClose();this.win.close()},setImage:function(c,d,e){this.activeFilePath=d;if(!this.images.has(d)){var b=e;var a=Asset.image(c,{onLoad:function(){var f=this.storeImageDimensions(d,a,b);this.img=f.img;this.setInterfaceDimensions(f);this.showWin();this.storeActiveImageData(d);this.win.close()}.bind(this)})}else{e=this.images.get(d);this.img=e.img;this.setInterfaceDimensions(e);this.showWin()}},setInterfaceDimensions:function(a){if(this.scaleSlide){this.scaleSlide.set(a.scale)}if(this.rotateSlide){this.rotateSlide.set(a.rotation)}if(this.cropperCanvas&&a.cropdim){this.cropperCanvas.x=a.cropdim.x;this.cropperCanvas.y=a.cropdim.y;this.cropperCanvas.w=a.cropdim.w;this.cropperCanvas.h=a.cropdim.h}this.imgCanvas.w=a.mainimagedim.w;this.imgCanvas.h=a.mainimagedim.h;this.imgCanvas.x=typeOf(a.imagedim)!=="null"?a.imagedim.x:0;this.imgCanvas.y=typeOf(a.imagedim)!=="null"?a.imagedim.y:0},storeImageDimensions:function(c,a,d){a.inject(document.body).hide();d=d?d:new CloneObject(this.imageDefault,true,[]);var b=a.getDimensions(true);if(!d.imagedim){d.mainimagedim={}}else{d.mainimagedim=d.imagedim}d.mainimagedim.w=b.width;d.mainimagedim.h=b.height;d.img=a;this.images.set(c,d);return d},makeImgCanvas:function(){var a=this;return new CanvasItem({id:"imgtocrop",w:this.imageDefault.imagedim.w,h:this.imageDefault.imagedim.h,x:200,y:200,interactive:true,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(b,e){if(this.dragging){var c=this.w*this.scale;var d=this.h*this.scale;this.x=b-this.offset[0]+c*0.5;this.y=e-this.offset[1]+d*0.5}},onDraw:function(d){d=a.CANVAS.ctx;if(typeOf(a.img)==="null"){return}var c=this.w*this.scale;var e=this.h*this.scale;var b=this.x-c*0.5;var g=this.y-e*0.5;d.save();d.translate(this.x,this.y);d.rotate(this.rotation*Math.PI/180);this.hover?d.strokeStyle="#f00":d.strokeStyle="#000";d.strokeRect(c*-0.5,e*-0.5,c,e);if(typeOf(a.img)!=="null"){try{d.drawImage(a.img,c*-0.5,e*-0.5,c,e)}catch(f){}}d.restore();if(typeOf(a.img)!=="null"&&a.images.get(a.activeFilePath)){a.images.get(a.activeFilePath).imagedim={x:this.x,y:this.y,w:c,h:e}}this.setDims(b,g,c,e)},onMousedown:function(b,c){a.CANVAS.setDrag(this);this.offset=[b-this.dims[0],c-this.dims[1]];this.dragging=true},onMouseup:function(){a.CANVAS.clearDrag();this.dragging=false},onMouseover:function(){a.overImg=true;document.body.style.cursor="move"},onMouseout:function(){a.overImg=false;if(!a.overCrop){document.body.style.cursor="default"}}}})},makeCropperCanvas:function(){var a=this;return new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:true,offset:[0,0],events:{onDraw:function(d){d=a.CANVAS.ctx;if(typeOf(d)==="null"){return}var c=this.w;var e=this.h;var b=this.x-c*0.5;var f=this.y-e*0.5;d.save();d.translate(this.x,this.y);this.hover?d.strokeStyle="#f00":d.strokeStyle="#000";d.strokeRect(c*-0.5,e*-0.5,c,e);d.restore();if(typeOf(a.img)!=="null"&&a.images.get(a.activeFilePath)){a.images.get(a.activeFilePath).cropdim={x:this.x,y:this.y,w:c,h:e}}this.setDims(b,f,c,e)},onMousedown:function(b,c){a.CANVAS.setDrag(this);this.offset=[b-this.dims[0],c-this.dims[1]];this.dragging=true;a.overlay.withinCrop=true},onMousemove:function(b,e){document.body.style.cursor="move";if(this.dragging){var c=this.w;var d=this.h;this.x=b-this.offset[0]+c*0.5;this.y=e-this.offset[1]+d*0.5}},onMouseup:function(){a.CANVAS.clearDrag();this.dragging=false;a.overlay.withinCrop=false},onMouseover:function(){this.hover=true;a.overCrop=true},onMouseout:function(){if(!a.overImg){document.body.style.cursor="default"}a.overCrop=false;this.hover=false}}})},makeThread:function(){this.CANVAS.addThread(new Thread({id:"myThread",onExec:function(){if(typeOf(this.CANVAS)!=="null"){if(typeOf(this.CANVAS.ctxEl)!=="null"){this.CANVAS.clear().draw()}}}.bind(this)}))},watchClose:function(){var a=document.id(this.windowopts.id);a.getElement("input[name=close-crop]").addEvent("click",function(b){this.storeActiveImageData();this.win.close()}.bind(this))},storeActiveImageData:function(m){m=m?m:this.activeFilePath;if(typeOf(m)==="null"){return}var j=this.cropperCanvas.x;var i=this.cropperCanvas.y;var k=this.cropperCanvas.w;var c=this.cropperCanvas.h;j=j-(k/2);i=i-(c/2);var e=document.id(this.windowopts.id);if(typeOf(e)==="null"){fconsole("storeActiveImageData no window found for "+this.windowopts.id);return}var a=e.getElement("canvas");var g=new Element("canvas",{width:k+"px",height:c+"px"}).inject(document.body);var l=g.getContext("2d");var b=m.split("\\").getLast();var d=document.getElements("input[name*="+b+"]").filter(function(f){return f.name.contains("cropdata")});l.drawImage(a,j,i,k,c,0,0,k,c);d.set("value",g.toDataURL());g.destroy()},watchZoom:function(){var a=document.id(this.windowopts.id);if(!this.windowopts.crop){return}this.scaleField=a.getElement("input[name=zoom-val]");this.scaleSlide=new Slider(a.getElement(".fabrikslider-line"),a.getElement(".knob"),{range:[20,300],onChange:function(c){this.imgCanvas.scale=c/100;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).scale=c}catch(b){fconsole("didnt get active file path:"+this.activeFilePath)}}this.scaleField.value=c}.bind(this)}).set(100);this.scaleField.addEvent("keyup",function(b){this.scaleSlide.set(b.target.get("value"))}.bind(this))},watchRotate:function(){var a=document.id(this.windowopts.id);if(!this.windowopts.crop){return}var b=a.getElement(".rotate");this.rotateField=b.getElement("input[name=rotate-val]");this.rotateSlide=new Slider(b.getElement(".fabrikslider-line"),b.getElement(".knob"),{onChange:function(d){this.imgCanvas.rotation=d;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).rotation=d}catch(c){fconsole("rorate err"+this.activeFilePath)}}this.rotateField.value=d}.bind(this),steps:360}).set(0);this.rotateField.addEvent("keyup",function(c){this.rotateSlide.set(c.target.get("value"))}.bind(this))},showWin:function(){this.win=Fabrik.getWindow(this.windowopts);if(typeOf(this.CANVAS)==="null"){return}if(typeOf(this.CANVAS.ctxEl)!=="null"){this.CANVAS.ctxPos=document.id(this.CANVAS.ctxEl).getPosition()}if(typeOf(this.CANVAS.threads)!=="null"){if(typeOf(this.CANVAS.threads.get("myThread"))!=="null"){this.CANVAS.threads.get("myThread").start()}}this.win.center()}});