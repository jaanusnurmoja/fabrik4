/*! fabrik 2015-03-23 */
var FbImage=new Class({Extends:FbFileElement,initialize:function(a,b){this.plugin="image",this.folderlist=[],this.parent(a,b),this.options.rootPath=b.rootPath,b.editable&&(this.getMyElements(),this.imageFolderList=[],this.selectedImage="",this.imageDir&&(0!==this.imageDir.options.length&&(this.selectedImage=this.imageDir.get("value")),this.imageDir.addEvent("change",function(a){this.showImage(a)}.bind(this))),this.options.canSelect===!0&&(this.ajaxFolder(),this.element=this.hiddenField,this.selectedFolder=this.getFolderPath()))},getMyElements:function(){var a=(this.options.element,this.getContainer());a&&(this.image=a.getElement(".imagedisplayor"),this.folderDir=a.getElement(".folderselector"),this.imageDir=a.getElement(".imageselector"))},cloned:function(a){this.getMyElements(),this.ajaxFolder(),this.parent(a)},hasSubElements:function(){return!0},getFolderPath:function(){return this.options.rootPath+this.folderlist.join("/")},doAjaxBrowse:function(a){this.parent(a),this.changeFolder(a)},changeFolder:function(dir){var folder=this.imageDir;this.selectedFolder=this.getFolderPath(),folder.empty();var myAjax=new Request({url:"",method:"post",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",g:"element",plugin:"image",method:"ajax_files",folder:dir},onComplete:function(r){var newImages=eval(r);newImages.each(function(a){folder.adopt(new Element("option",{value:a.value}).appendText(a.text))}),this.showImage()}.bind(this)}).send()},showImage:function(){this.imageDir&&(0===this.imageDir.options.length?(this.image.src="",this.selectedImage=""):(this.selectedImage=this.imageDir.get("value"),this.image.src=Fabrik.liveSite+this.selectedFolder+"/"+this.selectedImage),this.hiddenField.value=this.getValue())},getValue:function(){return this.folderlist.join("/")+"/"+this.selectedImage},update:function(a){if(!this.hiddenField){var b=this.element.getParent(".fabrikElement");this.hiddenField=b.getElement(".folderpath")}this.hiddenField&&(this.hiddenField.value=a),""!==a?(this.image.src=Fabrik.liveSite+"/"+a,this.image.alt=a):(this.image.src="",this.image.alt="")}});