/*! Fabrik */

define(["jquery","fab/element"],function(a,b){return window.FbFileElement=new Class({Extends:b,ajaxFolder:function(){var b=this;if(this.folderlist=[],null!==this.element){var c=a(this.element.getParent(".fabrikElement"));this.breadcrumbs=c.find(".breadcrumbs"),this.folderdiv=c.find(".folderselect"),a(this.folderdiv).slideUp({duration:0}),this.hiddenField=c.find(".folderpath")[0],c.find(".toggle").on("click",function(c){c.preventDefault(),a(b.folderdiv).slideToggle()}),this.watchAjaxFolderLinks()}},watchAjaxFolderLinks:function(){var b=this;this.folderdiv.find("a").on("click",function(c){c.preventDefault(),b.browseFolders(a(this))}),this.breadcrumbs.find("a").on("click",function(c){c.preventDefault(),b.useBreadcrumbs(a(this))})},browseFolders:function(a){this.folderlist.push(a.text());var b=this.options.dir+this.folderlist.join(this.options.ds);this.addCrumb(a.text()),this.doAjaxBrowse(b)},useBreadcrumbs:function(b){var c,d,e,f,g,h=this,i=b[0].className;if(this.folderlist=[],""!==i)for(d=parseInt(i.replace("crumb",""),10),e=1;e<=d;e++)f=a(this.breadcrumbs.find("a")[e]),h.folderlist.push(a(f).html());g=[this.breadcrumbs.find("a")[0].clone(),this.breadcrumbs.find("span")[0].clone()],delete this.breadcrumbs.find("a")[0],delete this.breadcrumbs.find("span")[0],this.breadcrumbs.empty(),this.breadcrumbs.append(g),this.folderlist.each(function(a){h.addCrumb(a)}),c=this.options.dir+this.folderlist.join(this.options.ds),this.doAjaxBrowse(c)},doAjaxBrowse:function(b){var c=this;a.ajax({url:"",data:{dir:b,option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"fileupload",method:"ajax_getFolders",element_id:this.options.id}}).done(function(b){b=JSON.parse(b),c.folderdiv.empty(),b.each(function(b){var d=a('<li class="fileupload_folder"><a href="#">'+b+"</a>");c.folderdiv.append(d)}),0===b.length?a(c.folderdiv).slideUp({duration:0}):a(c.folderdiv).slideUp(),c.watchAjaxFolderLinks(),a(c.hiddenField).val("/"+c.folderlist.join("/")+"/"),c.fireEvent("onBrowse")})},addCrumb:function(b){this.breadcrumbs.append(a('<a href="#" class="crumb'+this.folderlist.length+'">'+b+"</a>"),a("<span> / </span>"))}}),window.FbFileElement});