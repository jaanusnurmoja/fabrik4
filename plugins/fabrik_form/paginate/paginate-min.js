/*! fabrik 2015-03-23 */
FabRecordSet=new Class({initialize:function(a,b){this.form=a,this.options={},Object.append(this.options,b);{var c=this.form.getForm();a.options.listid?a.options.listid:c.getElement("input[name=listid]").get("value")}this.pkfield=c.getElement("input[name=rowid]");var d=this.form.id;this.view=this.form.options.editable===!0?"form":"details",this.url=this.options.liveSite+"index.php?option=com_fabrik&format=raw&view=plugin&g=form&task=pluginAjax&plugin=paginate&method=xRecord&formid="+d+"&mode="+this.options.view+"&rowid=",this.watchButtons()},doUpdate:function(a){var b=JSON.decode(a);this.options.ids=b.ids;var c="form"===this.view?b.data:b.html;this.form.formElements.each(function(a,b){if("_ro"!==b.substr(-3)){var d=c[b];try{a.update("null"!==typeOf(d)?"form"===this.view?d:Encoder.htmlDecode(d):"")}catch(e){console.log(a,d,e)}}}.bind(this)),"form"===this.view&&(this.pkfield.value=c[this.options.pkey]),this.reScan(),window.fireEvent("fabrik.form.refresh",[b.post.rowid]),Fabrik.loader.stop(this.form.getBlock())},reScan:function(){"undefined"!=typeof Slimbox&&Slimbox.scanPage(),"undefined"!=typeof Lightbox&&Lightbox.init(),"undefined"!=typeof Mediabox&&Mediabox.scanPage(),form=this.form.getForm(),form.getElements("*[data-paginate]").each(function(a){var b=a.get("data-paginate");switch(b){case"first":case"prev":0===this.options.ids.index?a.addClass("active"):a.removeClass("active");break;case"next":case"last":this.options.ids.index===this.options.ids.lastKey?a.addClass("active"):a.removeClass("active")}}.bind(this))},doNav:function(a){var b,c=a.get("data-paginate"),d=!0;switch(c){case"first":0===this.options.ids.index&&(d=!1),b=this.options.ids.first;break;case"last":this.options.ids.index===this.options.ids.lastKey&&(d=!1),b=this.options.ids.last;break;case"prev":0===this.options.ids.index&&(d=!1),b=this.options.ids.prev;break;case"next":this.options.ids.index===this.options.ids.lastKey&&(d=!1),b=this.options.ids.next}if(d){Fabrik.loader.start(this.form.getBlock());{new Request({url:this.url+b,evalScripts:!0,onComplete:function(a){this.doUpdate(a)}.bind(this)}).send()}}},watchButtons:function(){var a;a=this.form.getForm(),a.addEvent("click:relay(*[data-paginate])",function(a,b){a.preventDefault(),this.doNav(b)}.bind(this))}});