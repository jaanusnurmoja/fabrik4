/*! Fabrik */
define(["jquery","fab/list-plugin"],function(s,t){return new Class({Extends:t,options:{link:"",fabrikLink:!1,newTab:!1,windowTitle:""},initialize:function(t){this.parent(t)},buttonAction:function(){var n,t=this.list.getForm().getElements("input[name^=ids]").filter(function(t){return t.checked}),i=t.map(function(t){return t.get("value")}),o={};t.each(function(t){t=t.get("value");o[t]=this.list.getRow(t)}.bind(this)),""!==this.options.link&&(s.each(Fabrik.Windows,function(t,i){t.test(/^custom\./)&&i.close()}),n=this.options.link,s.each(o[i[0]],function(t,i){"__pk_val"===t&&(t="rowid");t=new RegExp("{"+t+"}","g");n=n.replace(t,i)}),this.options.fabrikLink?(n=n+(n.contains("?")?"&":"?")+"tmpl=component&ajax=1&format=partial",t={id:"custom."+this.list.id,title:this.options.windowTitle,loadMethod:"xhr",contentURL:n,width:this.list.options.popup_width,height:this.list.options.popup_height},null!==this.list.options.popup_offset_x&&(t.offset_x=this.list.options.popup_offset_x),null!==this.list.options.popup_offset_y&&(t.offset_y=this.options.popup_offset_y),Fabrik.getWindow(t)):this.options.newTab?window.open(n,"_blank"):window.location=n)}})});