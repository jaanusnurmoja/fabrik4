var FbImage=new Class({Extends:FbFileElement,initialize:function(b,a){this.plugin="image";this.folderlist=[];this.parent(b,a);this.options.rootPath=a.rootPath;if(a.editable){this.getMyElements();this.imageFolderList=[];this.selectedImage="";if(this.imageDir){if(this.imageDir.options.length!==0){this.selectedImage=this.imageDir.get("value")}this.imageDir.addEvent("change",this.showImage.bindWithEvent(this))}if(this.options.canSelect===true){this.addEvent("onBrowse",this.changeFolder);this.ajaxFolder();this.element=this.hiddenField;this.selectedFolder=this.getFolderPath()}}},getMyElements:function(){var a=this.options.element;this.image=this.getContainer().getElement(".imagedisplayor");this.folderDir=this.getContainer().getElement(".folderselector");this.imageDir=this.getContainer().getElement(".imageselector")},cloned:function(a){this.getMyElements();this.ajaxFolder()},hasSubElements:function(){return true},getFolderPath:function(){return this.options.rootPath+this.folderlist.join("/")},changeFolder:function(e){var folder=this.imageDir;this.selectedFolder=this.getFolderPath();folder.empty();var myAjax=new Request({url:"",method:"post",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",g:"element",plugin:"image",method:"ajax_files",folder:this.selectedFolder},onComplete:function(r){var newImages=eval(r);newImages.each(function(opt){folder.adopt(new Element("option",{value:opt.value}).appendText(opt.text))});this.showImage()}.bind(this)}).send()},showImage:function(a){if(this.imageDir){if(this.imageDir.options.length===0){this.image.src="";this.selectedImage=""}else{this.selectedImage=this.imageDir.get("value");this.image.src=Fabrik.liveSite+this.selectedFolder+"/"+this.selectedImage}this.hiddenField.value=this.getValue()}},getValue:function(){return this.folderlist.join("/")+"/"+this.selectedImage}});