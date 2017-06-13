/*! Fabrik */

var Pages=new Class({initialize:function(a,b){this.editable=b,document.addEvent("mousedown",function(a){this.clearActive(a)}.bind(this)),Fabrik.addEvent("fabrik.page.add",function(a){this.makeActive(a)}.bind(this)),this.pages=$H({}),this.activePage=null,this.container=document.id(a),Fabrik.addEvent("fabrik.tab.add",function(a){this.add(a)}.bind(this)),Fabrik.addEvent("fabrik.tab.click",function(a){this.show(a)}.bind(this)),Fabrik.addEvent("fabrik.tab.remove",function(a){this.remove(a)}.bind(this)),Fabrik.addEvent("fabrik.keynav",function(a){this.moveItem(a)}.bind(this)),Fabrik.addEvent("fabrik.inline.save",function(a){this.updateTabKey(a)}.bind(this))},makeActive:function(a){this.clearActive(),a.addClass("active"),this.active=a;var b=document.getElements(".itemPlaceHolder").getStyle("z-index").sort(),c=b.getLast().toInt()+1;document.getElements(".itemPlaceHolder").each(function(a){a.setStyle("zindex",a.getStyle("z-index").toInt()-1)}),a.setStyle("z-index",c)},clearActive:function(){delete this.active,document.getElements(".itemPlaceHolder").removeClass("active")},moveItem:function(a,b){if(this.active&&this.editable){b=b?10:0;var c=this.active.getCoordinates(this.getActivePage().page);switch(a){case 37:this.active.setStyle("left",c.left-2-b);break;case 38:this.active.setStyle("top",c.top-2-b);break;case 39:this.active.setStyle("left",c.left+1+b);break;case 40:this.active.setStyle("top",c.top+1+b)}}},add:function(a,b){var c=new Page(b,this.editable);this.container.adopt(c.page),c.show(),this.pages[b]=c,this.show()},remove:function(a,b){b=b.retrieve("ref"),delete this.pages.t,this.pages.erase(b)},show:function(a){this.pages.each(function(a){a.hide()});try{this.pages[a].show(),this.activePage=a}catch(c){var b=this.pages.getKeys();b.length>0&&(a=b[0],this.pages[a].show(),this.activePage=a)}},getHTMLPages:function(){var a=[];return this.pages.each(function(b){a.push(b.page)}),a},getActivePage:function(){return this.activePage||(this.activePage=0),this.pages[this.activePage]},fromJSON:function(a){$H(a).each(function(a,b){this.pages[b]&&$H(a).each(function(a,c){this.pages[b].insert(a.id,a.label,a.type,a.dimensions)}.bind(this))}.bind(this))},toJSON:function(){var a={};return this.pages.each(function(b,c){var d={};b.page.getElements(".itemPlaceHolder").each(function(a){b.page.show();var c=a.id.split("_")[0],e=a.getElement(".handlelabel").get("text");d[a.id]={dimensions:a.getCoordinates(b.page),label:e,type:c,id:a.id}}),a[c.trim()]=d}),a},updateTabKey:function(a){var b=a.retrieve("origValue").trim(),c=this.pages[b];this.pages[a.get("text").trim()]=c,delete this.pages[b],this.pages.erase(b)}});Page=new Class({initialize:function(a,b){this.editable=b,this.page=new Element("div",{class:"page",styles:{display:"none"}}),this.editable&&(Fabrik.addEvent("fabrik.item.resized",function(a){this.saveCoords(a)}.bind(this)),Fabrik.addEvent("fabrik.item.moved",function(a){this.saveCoords(a)}.bind(this)))},show:function(){this.page.show()},hide:function(){this.page.hide()},remove:function(){this.page.destroy()},removeItem:function(a,b){a.stop(),confirm("Do you really want to delete")&&(document.id(b).destroy(),Fabrik.fireEvent("fabrik.page.block.delete",[b]))},insert:function(a,b,c,d){Fabrik.fireEvent("fabrik.page.insert",[this,a,b,c,d])},saveCoords:function(a){}});