var FbFileUpload=new Class({Extends:FbFileElement,initialize:function(b,a){this.plugin="fileupload";this.parent(b,a);this.toppath=this.options.dir;if(this.options.folderSelect===1&&this.options.editable===1){this.ajaxFolder()}Fabrik.addEvent("fabrik.form.submit.start",function(f,c){this.onSubmit(f)}.bind(this));if(this.options.ajax_upload&&this.options.editable!==false){this.watchAjax();this.options.files=$H(this.options.files);if(this.options.files.getLength()!==0){this.uploader.trigger("FilesAdded",this.options.files);this.startbutton.addClass("plupload_disabled");this.options.files.each(function(f){var c={filepath:f.path,uri:f.url};this.uploader.trigger("UploadProgress",f);this.uploader.trigger("FileUploaded",f,{response:JSON.encode(c)});$(f.id).getElement(".plupload_file_status").set("text","100%")}.bind(this));var e=$(this.options.element+"_container");var d=$(this.options.element+"_browseButton").getPosition().y-e.getPosition().y;e.getElement("input[type=file]").getParent().setStyle("top",d)}}},cloned:function(){if(typeOf(this.element.getParent(".fabrikElement"))==="null"){return}var a=this.element.getParent(".fabrikElement").getElement("img");if(a){a.src=Fabrik.liveSite+this.options.defaultImage}},decloned:function(a){var c=$("form_"+this.form.id);var b=c.getElement("input[name=fabrik_deletedimages["+a+"]");if(typeOf(b)==="null"){new Element("input",{type:"hidden",name:"fabrik_fileupload_deletedfile["+a+"][]",value:this.options.value}).inject(c)}},update:function(b){if(this.element){var a=this.element.getElement("img");if(typeOf(a)!=="null"){a.src=b}}},watchAjax:function(){if(this.options.editable===false){return}var a=this.element.getParent(".fabrikSubElementContainer");this.container=a;this.widget=new ImageWidget(a.getElement("canvas"),{cropdim:{w:this.options.cropwidth,h:this.options.cropheight,x:this.options.cropwidth/2,y:this.options.cropheight/2,crop:this.options.crop}});this.pluploadContainer=a.getElement(".plupload_container");this.pluploadFallback=a.getElement(".plupload_fallback");this.droplist=a.getElement(".plupload_filelist");this.startbutton=a.getElement(".plupload_start");this.uploader=new plupload.Uploader({runtimes:this.options.ajax_runtime,browse_button:this.element.id+"_browseButton",container:this.element.id+"_container",drop_element:this.element.id+"_dropList",url:Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax&plugin=fileupload&method=ajax_upload&element_id="+this.options.elid,max_file_size:this.options.max_file_size+"kb",unique_names:false,flash_swf_url:"plugins/element/fileupload/plupload/js/plupload.flash.swf",silverlight_xap_url:"plugins/element/fileupload/plupload/js/plupload.silverlight.xap",chunk_size:this.options.ajax_chunk_size+"kb",multipart:true});this.uploader.bind("Init",function(b,c){this.pluploadFallback.destroy();this.pluploadContainer.removeClass("fabrikHide")}.bind(this));this.uploader.bind("FilesRemoved",function(b,c){});this.uploader.bind("FilesAdded",function(c,e){console.log(e,c);var b=this.droplist.getElement(".plupload_droptext");if(typeOf(b)!=="null"){b.destroy()}var d=this.droplist.getElements("li").length;this.startbutton.removeClass("plupload_disabled");e.each(function(k,f){if(d>=this.options.ajax_max){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_MAX_UPLOAD_REACHED"))}else{d++;var i=new Element("div",{"class":"plupload_file_action"}).adopt(new Element("a",{href:"#",style:"display:block",events:{click:this.pluploadRemoveFile.bindWithEvent(this)}}));var h=new Element("a",{href:"#",alt:Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_RESIZE"),events:{click:this.pluploadResize.bindWithEvent(this)}});if(this.options.crop){h.set("html",this.options.resizeButton)}else{h.set("html",this.options.previewButton)}var j=new Element("div",{"class":"plupload_file_name"}).adopt([new Element("span").set("text",k.name),new Element("div",{"class":"plupload_resize",style:"display:none"}).adopt(h)]);var g=[j,i,new Element("div",{"class":"plupload_file_status"}).set("text","0%"),new Element("div",{"class":"plupload_file_size"}).set("text",k.size),new Element("div",{"class":"plupload_clearer"})];this.droplist.adopt(new Element("li",{id:k.id,"class":"plupload_delete"}).adopt(g))}}.bind(this))}.bind(this));this.uploader.bind("UploadProgress",function(b,c){$(c.id).getElement(".plupload_file_status").set("text",c.percent+"%")});this.uploader.bind("Error",function(b,c){fconsole("Error:"+c)});this.uploader.bind("ChunkUploaded",function(b,d,c){c=JSON.decode(c.response);if(typeOf(c)!=="null"){if(c.error){fconsole(c.error.message)}}});this.uploader.bind("FileUploaded",function(b,e,c){c=JSON.decode(c.response);$(e.id).getElement(".plupload_resize").show();var d=$(e.id).getElement(".plupload_resize").getElement("a");d.href=c.uri;d.id="resizebutton_"+e.id;d.store("filepath",c.filepath);this.widget.setImage(c.uri,c.filepath,e.params);new Element("input",{type:"hidden",name:this.options.elementName+"[crop]["+c.filepath+"]",id:"coords_"+e.id,value:JSON.encode(e.params)}).inject(this.pluploadContainer,"after");var f=$pick(e.recordid,"0");new Element("input",{type:"hidden",name:this.options.elementName+"[id]["+c.filepath+"]",id:"id_"+e.id,value:f}).inject(this.pluploadContainer,"after");document.id(e.id).removeClass("plupload_file_action").addClass("plupload_done")}.bind(this));a.getElement(".plupload_start").addEvent("click",function(b){b.stop();this.uploader.start()}.bind(this));this.uploader.init()},pluploadRemoveFile:function(d){d.stop();var g=d.target.getParent().getParent().id.split("_").getLast();var c=d.target.getParent().getParent().getElement(".plupload_file_name span").get("text");var b=Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&&task=plugin.pluginAjax&plugin=fileupload&method=ajax_deleteFile&element_id="+this.options.id;new Request({url:b,data:{file:c,recordid:g}}).send();var a=d.target.getParent(".plupload_delete");a.destroy();if($("id_alreadyuploaded_"+this.options.id+"_"+g)){$("id_alreadyuploaded_"+this.options.id+"_"+g).destroy()}if($("coords_alreadyuploaded_"+this.options.id+"_"+g)){$("coords_alreadyuploaded_"+this.options.id+"_"+g).destroy()}},pluploadResize:function(c){c.stop();var b=c.target.getParent();this.widget.setImage(b.href,b.retrieve("filepath"))},onSubmit:function(a){if(!this.allUploaded()){alert(Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_UPLOAD_ALL_FILES"));a.result=false;return false}if(typeOf(this.widget)!=="null"){this.widget.images.each(function(d,b){b=b.split("\\").getLast();var c=document.getElements("input[name*="+b+"]");c=c[1];c.value=JSON.encode(d)})}return true},allUploaded:function(){var a=true;if(this.uploader){this.uploader.files.each(function(b){if(b.loaded===0){a=false}}.bind(this))}return a}});var ImageWidget=new Class({setImage:function(b,c,d){this.activeFilePath=c;if(this.img&&this.img.src===b){this.showWin();return}this.img=Asset.image(b);var a=new Element("img",{src:b});if(c){a.store("filepath",c)}else{c=a.retrieve("filepath")}a.injectInside(document.body).hide();(function(){var f,l,e,k,j,g;if(!this.images.has(c)){f=false;d=d?d:new CloneObject(this.imageDefault,true,[]);this.images.set(c,d);var h=a.getDimensions(true);l=h.width;e=h.height;k=d.imagedim.x;j=d.imagedim.y}else{f=true;g=this.images.get(c);l=400;e=400;k=g.imagedim.x;j=g.imagedim.y}g=this.images.get(c);if(this.scaleSlide){this.scaleSlide.set(g.scale)}if(this.rotateSlide){this.rotateSlide.set(g.rotation)}if(this.cropperCanvas){this.cropperCanvas.x=g.cropdim.x;this.cropperCanvas.y=g.cropdim.y;this.cropperCanvas.w=g.cropdim.w;this.cropperCanvas.h=g.cropdim.h}this.imgCanvas.w=l;this.imgCanvas.h=e;this.imgCanvas.x=k;this.imgCanvas.y=j;this.imgCanvas.rotation=g.rotation;this.imgCanvas.scale=g.scale/100;if(f){this.showWin()}a.destroy()}.bind(this)).delay(500)},showWin:function(){this.win=Fabrik.getWindow(this.windowopts);if(typeOf(CANVAS)!=="null"&&typeOf(CANVAS.ctxEl)!=="null"){CANVAS.ctxPos=$(CANVAS.ctxEl).getPosition()}if(typeOf(CANVAS.threads)!=="null"){CANVAS.threads.myThread.start()}},initialize:function(c,g){this.canvas=c;this.imageDefault={rotation:0,scale:100,imagedim:{x:200,y:200,w:400,h:400},cropdim:{x:75,y:25,w:150,h:50}};$extend(this.imageDefault,g);this.windowopts={id:this.canvas.id+"-mocha",type:"modal",content:this.canvas.getParent(),loadMethod:"html",width:420,height:500,storeOnClose:true,createShowOverLay:false,crop:g.crop,onClose:function(){$("modalOverlay").hide()},onContentLoaded:function(){this.center()}};this.windowopts.title=g.crop?Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_CROP_AND_SCALE"):Joomla.JText._("PLG_ELEMENT_FILEUPLOAD_PREVIEW");this.showWin();this.images=$H({});var e=this;CANVAS.init({canvasElement:$(this.canvas.id),enableMouse:true,cacheCtxPos:false});CANVAS.layers.add(new Layer({id:"bg-layer"}));CANVAS.layers.add(new Layer({id:"image-layer"}));if(g.crop){CANVAS.layers.add(new Layer({id:"overlay-layer"}));CANVAS.layers.add(new Layer({id:"crop-layer"}))}var d=new CanvasItem({id:"bg",scale:1,events:{onDraw:function(h){h.fillStyle="#DFDFDF";h.fillRect(0,0,400/this.scale,400/this.scale)}}});CANVAS.layers.get("bg-layer").add(d);if(g.crop){var b=new CanvasItem({id:"overlay",events:{onDraw:function(h){this.withinCrop=true;if(this.withinCrop){var k={x:0,y:0};var i={x:400,y:400};h.fillStyle="rgba(0, 0, 0, 0.3)";var j=e.cropperCanvas;h.fillRect(k.x,k.y,i.x,j.y-(j.h/2));h.fillRect(k.x-(j.w/2),k.y+j.y-(j.h/2),k.x+j.x,j.h);h.fillRect(k.x+j.x+j.w-(j.w/2),k.y+j.y-(j.h/2),i.x,j.h);h.fillRect(k.x,k.y+(j.y+j.h)-(j.h/2),i.x,i.y)}}}});CANVAS.layers.get("overlay-layer").add(b)}this.imgCanvas=new CanvasItem({id:"imgtocrop",w:400,h:400,x:200,y:200,interactive:true,rotation:0,scale:1,offset:[0,0],events:{onMousemove:function(i,l){if(this.dragging){var j=this.w*this.scale;var k=this.h*this.scale;this.x=i-this.offset[0]+j*0.5;this.y=l-this.offset[1]+k*0.5}},onDraw:function(k){var j=this.w*this.scale;var l=this.h*this.scale;var i=this.x-j*0.5;var n=this.y-l*0.5;k.save();k.translate(this.x,this.y);k.rotate(this.rotation*Math.PI/180);this.hover?k.strokeStyle="#f00":k.strokeStyle="#000";k.strokeRect(j*-0.5,l*-0.5,j,l);if(typeOf(e.img)!=="null"){try{k.drawImage(e.img,j*-0.5,l*-0.5,j,l)}catch(m){fconsole(m,e.img,j*-0.5,l*-0.5,j,l)}}k.restore();if(typeOf(e.img)!=="null"&&e.images.get(e.activeFilePath)){e.images.get(e.activeFilePath).imagedim={x:this.x,y:this.y,w:j,h:l}}this.setDims(i,n,j,l)},onMousedown:function(h,i){CANVAS.setDrag(this);this.offset=[h-this.dims[0],i-this.dims[1]];this.dragging=true},onMouseup:function(){CANVAS.clearDrag();this.dragging=false},onMouseover:function(){e.overImg=true;document.body.style.cursor="move"},onMouseout:function(){e.overImg=false;if(!e.overCrop){document.body.style.cursor="default"}}}});CANVAS.layers.get("image-layer").add(this.imgCanvas);if(g.crop){this.cropperCanvas=new CanvasItem({id:"item",x:175,y:175,w:150,h:50,interactive:true,offset:[0,0],events:{onDraw:function(k){var j=this.w;var l=this.h;var i=this.x-j*0.5;var m=this.y-l*0.5;k.save();k.translate(this.x,this.y);this.hover?k.strokeStyle="#f00":k.strokeStyle="#000";k.strokeRect(j*-0.5,l*-0.5,j,l);k.restore();if(typeOf(e.img)!=="null"&&e.images.get(e.activeFilePath)){e.images.get(e.activeFilePath).cropdim={x:this.x,y:this.y,w:j,h:l}}this.setDims(i,m,j,l)},onMousedown:function(h,i){CANVAS.setDrag(this);this.offset=[h-this.dims[0],i-this.dims[1]];this.dragging=true;b.withinCrop=true},onMousemove:function(i,l){document.body.style.cursor="move";if(this.dragging){var j=this.w;var k=this.h;this.x=i-this.offset[0]+j*0.5;this.y=l-this.offset[1]+k*0.5}},onMouseup:function(){CANVAS.clearDrag();this.dragging=false;b.withinCrop=false},onMouseover:function(){this.hover=true;e.overCrop=true},onMouseout:function(){if(!e.overImg){document.body.style.cursor="default"}e.overCrop=false;this.hover=false}}});CANVAS.layers.get("crop-layer").add(this.cropperCanvas)}CANVAS.addThread(new Thread({id:"myThread",onExec:function(){if(typeOf(CANVAS.ctxEl)!=="null"){CANVAS.clear().draw()}}}));var a=$(this.windowopts.id);if(e.windowopts.crop){this.scaleField=a.getElement("input[name=zoom-val]");this.scaleSlide=new Slider(a.getElement(".fabrikslider-line"),a.getElement(".knob"),{range:[20,300],onChange:function(i){this.imgCanvas.scale=i/100;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).scale=i}catch(h){fconsole("didnt get active file path:"+ths.activeFilePath)}}this.scaleField.value=i}.bind(this)}).set(100);this.scaleField.addEvent("keyup",function(h){this.scaleSlide.set($(h.target).get("value"))}.bind(this));var f=a.getElement(".rotate");this.rotateField=f.getElement("input[name=rotate-val]");this.rotateSlide=new Slider(f.getElement(".fabrikslider-line"),f.getElement(".knob"),{onChange:function(i){this.imgCanvas.rotation=i;if(typeOf(this.img)!=="null"){try{this.images.get(this.activeFilePath).rotation=i}catch(h){fconsole("rorate err"+this.activeFilePath)}}this.rotateField.value=i}.bind(this),steps:360}).set(0);this.rotateField.addEvent("keyup",function(h){this.rotateSlide.set($(h.target).get("value"))}.bind(this))}a.getElement("input[name=close-crop]").addEvent("click",function(h){this.win.close()}.bind(this));this.win.close()}});