var FbFileUpload=new Class({Extends:FbFileElement,initialize:function(b,a){this.plugin="fileupload";this.parent(b,a);this.toppath=this.options.dir;if(this.options.folderSelect==="1"&&this.options.editable===true){this.ajaxFolder()}this.submitEvent=function(f,c){this.onSubmit(f)}.bind(this);Fabrik.addEvent("fabrik.form.submit.start",this.submitEvent);if(this.options.ajax_upload&&this.options.editable!==false){this.watchAjax();this.options.files=$H(this.options.files);if(this.options.files.getLength()!==0){this.uploader.trigger("FilesAdded",this.options.files);this.startbutton.addClass("plupload_disabled");this.options.files.each(function(f){var c={filepath:f.path,uri:f.url};this.uploader.trigger("UploadProgress",f);this.uploader.trigger("FileUploaded",f,{response:JSON.encode(c)});document.id(f.id).getElement(".plupload_file_status").set("text","100%");document.id(f.id).getElement(".plupload_file_size").set("text",f.size)}.bind(this));var e=document.id(this.options.element+"_container");var d=document.id(this.options.element+"_browseButton").getPosition().y-e.getPosition().y;e.getParent(".fabrikElement").getElement("input[type=file]").getParent().setStyle("top",d)}}this.watchDeleteButton()},watchDeleteButton:function(){var d=this.getContainer();if(!d){return}var a=d.getElement("[data-file]");if(typeOf(a)!=="null"){a.addEvent("click",function(b){b.stop();if(confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_SOFT_DELETE"))){new Request({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_clearFileReference",element_id:this.options.id,formid:this.form.id,rowid:this.form.options.rowid}}).send();if(confirm(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CONFIRM_HARD_DELETE"))){this.makeDeletedImageField(this.groupid,a.get("data-file")).inject(this.getContainer(),"inside")}a.getNext().destroy();a.destroy()}}.bind(this))}},removeCustomEvents:function(){Fabrik.removeEvent("fabrik.form.submit.start",this.submitEvent)},cloned:function(b){if(typeOf(this.element.getParent(".fabrikElement"))==="null"){return}var a=this.element.getParent(".fabrikElement").getElement("img");if(a){a.src=Fabrik.liveSite+this.options.defaultImage}this.parent(b)},decloned:function(a){var c=document.id("form_"+this.form.id);var b=c.getElement("input[name=fabrik_deletedimages["+a+"]");if(typeOf(b)==="null"){this.makeDeletedImageField(a,this.options.value).inject(c)}},makeDeletedImageField:function(a,b){return new Element("input",{type:"hidden",name:"fabrik_fileupload_deletedfile["+a+"][]",value:b})},update:function(b){if(this.element){var a=this.element.getElement("img");if(typeOf(a)!=="null"){a.src=b}}},watchAjax:function(){if(this.options.editable===false){return}var b,f;var g=this.getElement().getParent(".fabrikSubElementContainer");this.container=g;var e=g.getElement("canvas");if(typeOf(e)==="null"){return}this.widget=new ImageWidget(e,{cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.cropwidth/2,y:this.options.cropheight/2},crop:this.options.crop});this.pluploadContainer=g.getElement(".plupload_container");this.pluploadFallback=g.getElement(".plupload_fallback");this.droplist=g.getElement(".plupload_filelist");this.startbutton=g.getElement(".plupload_start");var d={runtimes:this.options.ajax_runtime,browse_button:this.element.id+"_browseButton",container:this.element.id+"_container",drop_element:this.element.id+"_dropList",url:"index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax&plugin=fileupload&method=ajax_upload&element_id="+this.options.elid,max_file_size:this.options.max_file_size+"kb",unique_names:false,flash_swf_url:"/plugins/element/fileupload/plupload/js/plupload.flash.swf",silverlight_xap_url:"/plugins/element/fileupload/plupload/js/plupload.silverlight.xap",chunk_size:this.options.ajax_chunk_size+"kb",multipart:true};this.uploader=new plupload.Uploader(d);this.uploader.bind("Init",function(a,c){this.pluploadFallback.destroy();this.pluploadContainer.removeClass("fabrikHide")}.bind(this));this.uploader.bind("FilesRemoved",function(a,c){});this.uploader.bind("FilesAdded",function(c,i){var a=this.droplist.getElement(".plupload_droptext");if(typeOf(a)!=="null"){a.destroy()}var h=this.droplist.getElements("li").length;this.startbutton.removeClass("plupload_disabled");i.each(function(n,j){if(h>=this.options.ajax_max){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED"))}else{h++;var l=new Element("div",{"class":"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:function(o){this.pluploadRemoveFile(o,n)}.bind(this)}}));if(n.type==="image"){b=new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:function(o){this.pluploadResize(o)}.bind(this)}});if(this.options.crop){b.set("html",this.options.resizeButton)}else{b.set("html",this.options.previewButton)}f=new Element("span").set("text",n.name)}else{b=new Element("span");f=new Element("a",{href:n.url}).set("text",n.name)}var m=new Element("div",{"class":"plupload_file_name"}).adopt([f,new Element("div",{"class":"plupload_resize",style:"display:none"}).adopt(b)]);var k=[m,l,new Element("div",{"class":"plupload_file_status"}).set("text","0%"),new Element("div",{"class":"plupload_file_size"}).set("text",n.size),new Element("div",{"class":"plupload_clearer"})];this.droplist.adopt(new Element("li",{id:n.id,"class":"plupload_delete"}).adopt(k))}}.bind(this))}.bind(this));this.uploader.bind("UploadProgress",function(a,c){var h=document.id(c.id);if(typeOf(h)!=="null"){document.id(c.id).getElement(".plupload_file_status").set("text",c.percent+"%")}});this.uploader.bind("Error",function(a,c){fconsole("Error:"+c)});this.uploader.bind("ChunkUploaded",function(a,h,c){c=JSON.decode(c.response);if(typeOf(c)!=="null"){if(c.error){fconsole(c.error.message)}}});this.uploader.bind("FileUploaded",function(a,i,c){c=JSON.decode(c.response);if(c.error){alert(c.error);document.id(i.id).destroy();return}var k=document.id(i.id);if(typeOf(k)==="null"){console.log("Filuploaded didnt find: "+i.id);return}document.id(i.id).getElement(".plupload_resize").show();var h=document.id(i.id).getElement(".plupload_resize").getElement("a");if(h){h.href=c.uri;h.id="resizebutton_"+i.id;h.store("filepath",c.filepath)}this.widget.setImage(c.uri,c.filepath,i.params);new Element("input",{type:"hidden",name:this.options.elementName+"[crop]["+c.filepath+"]",id:"coords_"+i.id,value:JSON.encode(i.params)}).inject(this.pluploadContainer,"after");var j=$pick(i.recordid,"0");new Element("input",{type:"hidden",name:this.options.elementName+"[id]["+c.filepath+"]",id:"id_"+i.id,value:j}).inject(this.pluploadContainer,"after");document.id(i.id).removeClass("plupload_file_action").addClass("plupload_done")}.bind(this));g.getElement(".plupload_start").addEvent("click",function(a){a.stop();this.uploader.start()}.bind(this));this.uploader.init()},pluploadRemoveFile:function(g,b){g.stop();var h=g.target.getParent().getParent().id.split("_").getLast();var d=g.target.getParent().getParent().getElement(".plupload_file_name span").get("text");var c=[];this.uploader.files.each(function(e){if(e.id!==h){c.push(e)}});this.uploader.files=c;new Request({url:"",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_deleteFile",element_id:this.options.id,file:d,recordid:h}}).send();var a=g.target.getParent(".plupload_delete");a.destroy();if(document.id("id_alreadyuploaded_"+this.options.id+"_"+h)){document.id("id_alreadyuploaded_"+this.options.id+"_"+h).destroy()}if(document.id("coords_alreadyuploaded_"+this.options.id+"_"+h)){document.id("coords_alreadyuploaded_"+this.options.id+"_"+h).destroy()}},pluploadResize:function(c){c.stop();var b=c.target.getParent();this.widget.setImage(b.href,b.retrieve("filepath"))},onSubmit:function(a){if(!this.allUploaded()){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_UPLOAD_ALL_FILES"));a.result=false;return false}if(typeOf(this.widget)!=="null"){this.widget.images.each(function(d,b){b=b.split("\\").getLast();var c=document.getElements("input[name*="+b+"]");c=c[1];if(typeOf(c)!=="null"){c.value=JSON.encode(d)}})}return true},allUploaded:function(){var a=true;if(this.uploader){this.uploader.files.each(function(b){if(b.loaded===0){a=false}}.bind(this))}return a}});var ImageWidget=new Class({initialize:function(a,d){this.canvas=a;this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}};$extend(this.imageDefault,d);this.windowopts={id:this.canvas.id+"-mocha",type:"modal",content:this.canvas.getParent(),loadMethod:"html",width:420,height:540,storeOnClose:true,createShowOverLay:false,crop:d.crop,onClose:function(){document.id("modalOverlay").hide()},onContentLoaded:function(){this.center()}};this.windowopts.title=d.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW");this.showWin();this.images=$H({});var c=this;this.CANVAS=new FbCanvas({canvasElement:document.id(this.canvas.id),enableMouse:true,cacheCtxPos:false});this.CANVAS.layers.add(new Layer({id:"bg-layer"}));this.CANVAS.layers.add(new Layer({id:"image-layer"}));if(d.crop){this.CANVAS.layers.add(new Layer({id:"overlay-layer"}));this.CANVAS.layers.add(new Layer({id:"crop-layer"}))}var b=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(e){if(typeOf(e)==="null"){e=this.CANVAS.ctx}e.fillStyle="#DFDFDF";e.fillRect(0,0,400/this.scale,400/this.scale)}.bind(this)}});this.CANVAS.layers.get("bg-layer").add(b);if(d.crop){this.overlay=new CanvasItem({id:"overlay",events:{onDraw:function(e){if(typeOf(e)==="null"){e=this.CANVAS.ctx}this.withinCrop=true;if(this.withinCrop){var h={x:0,y:0};var f={x:400,y:400};e.fillStyle="rgba(0, 0, 0, 0.3)";var g=this.cropperCanvas;e.fillRect(h.x,h.y,f.x,g.y-(g.h/2));e.fillRect(h.x-(g.w/2),h.y+g.y-(g.h/2),h.x+g.x,g.h);e.fillRect(h.x+g.x+g.w-(g.w/2),h.y+g.y-(g.h/2),f.x,g.h);e.fillRect(h.x,h.y+(g.y+g.h)-(g.h/2),f.x,f.y)}}.bind(this)}});this.CANVAS.layers.get("overlay-layer").add(this.overlay)}this.imgCanvas=this.makeImgCanvas();this.CANVAS.layers.get("image-layer").add(this.imgCanvas);this.cropperCanvas=this.makeCropperCanvas();if(d.crop){this.CANVAS.layers.get("crop-layer").add(this.cropperCanvas)}this.makeThread();this.watchZoom();this.watchRotate();this.watchClose();this.win.close()},setImage:function(c,d,e){this.activeFilePath=d;if(this.img&&this.img.src===c){this.showWin();return}this.img=Asset.image(c);var a=new Element("img",{src:c});if(d){a.store("filepath",d)}else{d=a.retrieve("filepath")}a.injectInside(document.body).hide();var b=[d,e,a];this.periodSetUpFn=this.setUpFn.periodical(500,this,b)},setUpFn:function(k,d,b){var j,h,c,g,f,e;var a=true;if(!this.images.has(k)){j=false;d=d?d:new CloneObject(this.imageDefault,true,[]);this.images.set(k,d);var l=b.getDimensions(true);h=l.width;c=l.height;if(l.width===0&&l.height===0){a=false}d.mainimagedim=d.imagedim;d.mainimagedim.w=h;d.mainimagedim.h=c;g=d.imagedim.x;f=d.imagedim.y}else{j=true;e=this.images.get(k);h=400;c=400;g=e.imagedim.x;f=e.imagedim.y}e=this.images.get(k);if(this.scaleSlide){this.scaleSlide.set(e.scale)}if(this.rotateSlide){this.rotateSlide.set(e.rotation)}if(this.cropperCanvas){this.cropperCanvas.x=e.cropdim.x;this.cropperCanvas.y=e.cropdim.y;this.cropperCanvas.w=e.cropdim.w;this.cropperCanvas.h=e.cropdim.h}this.imgCanvas.w=h;this.imgCanvas.h=c;this.imgCanvas.x=g;this.imgCanvas.y=f;this.imgCanvas.rotation=e.rotation;this.imgCanvas.scale=e.scale/100;if(j){this.showWin()}if(a){b.destroy();if(this.win){this.win.close()}clearInterval(this.periodSetUpFn)}},makeImgCanvas:function(){var a=this;return new CanvasItem({id:"imgtocrop",w:400,h:400,x:200,y:200,interactive:true,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(b,e){if(this.dragging){var c=this.w*this.scale;var d=this.h*this.scale;this.x=b-this.offset[0]+c*0.5;this.y=e-this.offset[1]+d*0.5}},onDraw:function(d){d=a.CANVAS.ctx;if(typeOf(a.img)==="null"){return}var c=this.w*this.scale;var e=this.h*this.scale;var b=this.x-c*0.5;var g=this.y-e*0.5;d.save();d.translate(this.x,this.y);d.rotate(this.rotation*Math.PI/180);this.hover?d.strokeStyle="#f00":d.strokeStyle="#000";d.strokeRect(c*-0.5,e*-0.5,c,e);if(typeOf(a.img)!=="null"){try{d.drawImage(a.img,c*-0.5,e*-0.5,c,e)}catch(f){}}d.restore();if(typeOf(a.img)!=="null"&&a.images.get(a.activeFilePath)){a.images.get(a.activeFilePath).imagedim={x:this.x,y:this.y,w:c,h:e}}this.setDims(b,g,c,e)},onMousedown:function(b,c){a.CANVAS.setDrag(this);this.offset=[b-this.dims[0],c-this.dims[1]];this.dragging=true},onMouseup:function(){a.CANVAS.clearDrag();this.dragging=false},onMouseover:function(){a.overImg=true;document.body.style.cursor="move"},onMouseout:function(){a.overImg=false;if(!a.overCrop){document.body.style.cursor="default"}}}})},makeCropperCanvas:function(){var a=this;return new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:true,offset:[0,0],events:{onDraw:function(d){d=a.CANVAS.ctx;if(typeOf(d)==="null"){return}var c=this.w;var e=this.h;var b=this.x-c*0.5;var f=this.y-e*0.5;d.save();d.translate(this.x,this.y);this.hover?d.strokeStyle="#f00":d.strokeStyle="#000";d.strokeRect(c*-0.5,e*-0.5,c,e);d.restore();if(typeOf(a.img)!=="null"&&a.images.get(a.activeFilePath)){a.images.get(a.activeFilePath).cropdim={x:this.x,y:this.y,w:c,h:e}}this.setDims(b,f,c,e)},onMousedown:function(b,c){a.CANVAS.setDrag(this);this.offset=[b-this.dims[0],c-this.dims[1]];this.dragging=true;a.overlay.withinCrop=true},onMousemove:function(b,e){document.body.style.cursor="move";if(this.dragging){var c=this.w;var d=this.h;this.x=b-this.offset[0]+c*0.5;this.y=e-this.offset[1]+d*0.5}},onMouseup:function(){a.CANVAS.clearDrag();this.dragging=false;a.overlay.withinCrop=false},onMouseover:function(){this.hover=true;a.overCrop=true},onMouseout:function(){if(!a.overImg){document.body.style.cursor="default"}a.overCrop=false;this.hover=false}}})},makeThread:function(){this.CANVAS.addThread(new Thread({id:"myThread",onExec:function(){if(typeOf(this.CANVAS)!=="null"){if(typeOf(this.CANVAS.ctxEl)!=="null"){this.CANVAS.clear().draw()}}}.bind(this)}))},watchClose:function(){var a=document.id(this.windowopts.id);a.getElement("input[name=close-crop]").addEvent("click",function(b){this.win.close()}.bind(this))},watchZoom:function(){var a=document.id(this.windowopts.id);if(!this.windowopts.crop){return}this.scaleField=a.getElement("input[name=zoom-val]");this.scaleSlide=new Slider(a.getElement(".fabrikslider-line"),a.getElement(".knob"),{range:[20,300],onChange:function(c){this.imgCanvas.scale=c/100;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).scale=c}catch(b){fconsole("didnt get active file path:"+this.activeFilePath)}}this.scaleField.value=c}.bind(this)}).set(100);this.scaleField.addEvent("keyup",function(b){this.scaleSlide.set(b.target.get("value"))}.bind(this))},watchRotate:function(){var a=document.id(this.windowopts.id);if(!this.windowopts.crop){return}var b=a.getElement(".rotate");this.rotateField=b.getElement("input[name=rotate-val]");this.rotateSlide=new Slider(b.getElement(".fabrikslider-line"),b.getElement(".knob"),{onChange:function(d){this.imgCanvas.rotation=d;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).rotation=d}catch(c){fconsole("rorate err"+this.activeFilePath)}}this.rotateField.value=d}.bind(this),steps:360}).set(0);this.rotateField.addEvent("keyup",function(c){this.rotateSlide.set(c.target.get("value"))}.bind(this))},showWin:function(){this.win=Fabrik.getWindow(this.windowopts);if(typeOf(this.CANVAS)==="null"){return}if(typeOf(this.CANVAS.ctxEl)!=="null"){this.CANVAS.ctxPos=document.id(this.CANVAS.ctxEl).getPosition()}if(typeOf(this.CANVAS.threads)!=="null"){if(typeOf(this.CANVAS.threads.get("myThread"))!=="null"){this.CANVAS.threads.get("myThread").start()}}}});
