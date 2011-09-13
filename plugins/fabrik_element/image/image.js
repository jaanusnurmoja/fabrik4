/**
 * @author Robert
 */

var FbImage = new Class({
	Extends : FbElement,
	initialize : function (element, options) {
		this.plugin = 'image';
		this.folderlist = [];
		this.parent(element, options);
		this.options.rootPath = options.rootPath;
		if (options.editable) {
			this.getMyElements();
			this.imageFolderList = [];

			this.selectedImage = '';
			if (this.imageDir) {
				if (this.imageDir.options.length !== 0) {
					this.selectedImage = this.imageDir.get('value');
				}
				this.imageDir.addEvent('change', this.showImage.bindWithEvent(this));
			}
			if (this.options.canSelect === true) {
				this.addEvent('onBrowse', this.changeFolder);
				this.ajaxFolder();
				this.element = this.hiddenField;
				this.selectedFolder = this.getFolderPath();
			}
		}
	},

	getMyElements : function () {
		var element = this.options.element;
		this.image = $(element).findClassUp('fabrikSubElementContainer').getElement('.imagedisplayor');
		this.folderDir = $(element).findClassUp('fabrikSubElementContainer').getElement('.folderselector');
		this.imageDir = $(element).findClassUp('fabrikSubElementContainer').getElement('.imageselector');
		// this.hiddenField is set in FbFileElement
	},

	cloned : function (c) {
		this.getMyElements();
		this.ajaxFolder();
	},

	hasSubElements : function () {
		return true;
	},

	getFolderPath : function () {
		return this.options.rootPath + this.folderlist.join('/');
	},

	changeFolder : function (e) {
		var folder = this.imageDir;
		this.selectedFolder = this.getFolderPath();
		folder.empty();
		var url = Fabrik.liveSite + 'index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&g=element&plugin=image&method=ajax_files';
		var myAjax = new Request({
			url : url,
			method : 'post',
			'data' : {
				'folder' : this.selectedFolder
			},

			onComplete : function (r) {
				var newImages = eval(r);
				newImages.each(function (opt) {
					folder.adopt(new Element('option', {
						'value' : opt.value
					}).appendText(opt.text));
				});
				this.showImage();
			}.bind(this)
		}).send();
	},

	showImage : function (e) {
		if (this.imageDir) {
			if (this.imageDir.options.length === 0) {
				this.image.src = '';
				this.selectedImage = '';
			} else {
				this.selectedImage = this.imageDir.get('value');
				this.image.src = Fabrik.liveSite + this.selectedFolder + '/' + this.selectedImage;
			}
			//this.hiddenField.value =  this.get('value');//this.selectedImage;
			this.hiddenField.value =  this.getValue();
		}
	},

	getValue : function () {
		return this.folderlist.join('/') + '/' + this.selectedImage;// this.hiddenField.value;
	}
});