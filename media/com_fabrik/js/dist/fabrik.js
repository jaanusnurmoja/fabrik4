/*! Fabrik */
define(["jquery","fab/loader","fab/requestqueue"],function(a,b,c){var d=a(document);document.addEvent("click:relay(.popover button.close)",function(b,c){var d="#"+c.get("data-popover"),e=document.getElement(d);a(d).popover("hide"),"null"!==typeOf(e)&&"input"===e.get("tag")&&(e.checked=!1)});var e={events:{}};return e.bootstrapVersion=function(b){b=b||"modal";var c=a.fn[b];if(c){if(c.VERSION)return c.VERSION;if("modal"===b)return-1===c.toString().indexOf("bs.modal")?"2.x":"3.x"}},e.Windows={},e.loader=new b,e.blocks={},e.periodicals={},e.addBlock=function(a,b){e.blocks[a]=b,e.fireEvent("fabrik.block.added",[b,a])},e.getBlock=function(a,b,c){return c=c?c:!1,c&&(e.periodicals[a]=e._getBlock.periodical(500,this,[a,b,c])),e._getBlock(a,b,c)},e._getBlock=function(a,b,c){var d;if(b=b?b:!1,void 0!==e.blocks[a])d=a;else{if(b)return!1;var f=Object.keys(e.blocks),g=f.searchFor(a);if(-1===g)return!1;d=f[g]}return c&&(clearInterval(e.periodicals[a]),c(e.blocks[d])),e.blocks[d]},d.on("click",".fabrik_delete a, .fabrik_action a.delete, .btn.delete",function(a){a.rightClick||e.watchDelete(a,this)}),d.on("click",".fabrik_edit a, a.fabrik_edit",function(a){a.rightClick||e.watchEdit(a,this)}),d.on("click",".fabrik_view a, a.fabrik_view",function(a){a.rightClick||e.watchView(a,this)}),document.addEvent("click:relay(*[data-fabrik-view])",function(a){if(!a.rightClick){var b,c,d;a.preventDefault(),c="a"===a.target.get("tag")?a.target:"null"!==typeOf(a.target.getElement("a"))?a.target.getElement("a"):a.target.getParent("a"),b=c.get("href"),b+=b.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1",b+="&format=partial",$H(e.Windows).each(function(a){a.close()}),d=c.get("title"),d||(d=Joomla.JText._("COM_FABRIK_VIEW"));var f={id:"view."+b,title:d,loadMethod:"xhr",contentURL:b};e.getWindow(f)}}),e.removeEvent=function(a,b){if(e.events[a]){var c=e.events[a].indexOf(b);-1!==c&&delete e.events[a][c]}},e.addEvent=e.on=function(a,b){e.events[a]||(e.events[a]=[]),e.events[a].contains(b)||e.events[a].push(b)},e.addEvents=function(a){var b;for(b in a)a.hasOwnProperty(b)&&e.addEvent(b,a[b]);return this},e.fireEvent=e.trigger=function(a,b,c){var d=e.events;return this.eventResults=[],d&&d[a]?(b=Array.from(b),d[a].each(function(a){this.eventResults.push(c?a.delay(c,this,b):a.apply(this,b))},this),this):this},e.requestQueue=new c,e.cbQueue={google:[]},e.loadGoogleMap=function(a,b){var c="https:"===document.location.protocol?"https:":"http:",d=c+"//maps.googleapis.com/maps/api/js?libraries=places&callback=Fabrik.mapCb";a!==!1&&(d+="&key="+a);var f=Array.from(document.scripts).filter(function(a){return a.src===d});if(0===f.length){var g=document.createElement("script");g.type="text/javascript",g.src=d,document.body.appendChild(g),e.cbQueue.google.push(b)}else e.googleMap?window[b]():e.cbQueue.google.push(b)},e.mapCb=function(){e.googleMap=!0;var a,b;for(b=0;b<e.cbQueue.google.length;b++)a=e.cbQueue.google[b],"function"===typeOf(a)?a():window[a]();e.cbQueue.google=[]},e.watchDelete=function(a,b){var c,d,f;if(f=a.target.getParent(".fabrik_row"),f||(f=e.activeRow),f){var g=f.getElement("input[type=checkbox][name*=id]");"null"!==typeOf(g)&&(g.checked=!0),d=f.id.split("_"),d=d.splice(0,d.length-2).join("_"),c=e.blocks[d]}else if(d=a.target.getParent(".fabrikList"),"null"!==typeOf(d))d=d.id,c=e.blocks[d];else{var h=b.getParent(".floating-tip-wrapper");if(h){var i=h.retrieve("list");d=i.id}else d=b.get("data-listRef");c=e.blocks[d],void 0===c||"floating"!==c.options.actionMethod||this.bootstrapped||c.form.getElements("input[type=checkbox][name*=id], input[type=checkbox][name=checkAll]").each(function(a){a.checked=!0})}c.submit("list.delete")||a.preventDefault()},e.watchEdit=function(a,b){e.openSingleView("form",a,b)},e.watchView=function(a,b){e.openSingleView("details",a,b)},e.openSingleView=function(b,c,d){var f,g,h,i,j,k,l,m=a(d).data("list"),n=e.blocks[m];if(1===a(d).data("isajax")){if(n){if(!n.options.ajax_links)return;if(k=n.getActiveRow(c),!k||0===k.length)return;n.setActive(k),j=k.prop("id").split("_").pop()}else j=a(d).data("rowid");c.preventDefault(),h="A"===a(c.target).prop("tagName")?a(c.target):a(c.target).find("a").length>0?a(c.target).find("a"):a(c.target).closest("a"),f=h.prop("href"),1!==a(d).data("iscustom")&&(f+=f.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1",f+="&format=partial"),i=h.prop("title"),g=h.data("loadmethod"),void 0===g&&(g="xhr"),a.each(e.Windows,function(a,b){b.close()}),l={modalId:"ajax_links",id:m+"."+j,title:i,loadMethod:g,contentURL:f,onClose:function(){var a=b+"_"+n.options.formid+"_"+j;try{e.blocks[a].destroyElements(),e.blocks[a].formElements=null,e.blocks[a]=null,delete e.blocks[a];var c="details"===b?"fabrik.list.row.view.close":"fabrik.list.row.edit.close";e.fireEvent(c,[m,j,a])}catch(d){console.log(d)}}},n&&(""!==n.options.popup_width&&(l.width=n.options.popup_width),""!==n.options.popup_height&&(l.height=n.options.popup_height),l.id="details"===b?"view."+l.id:"add."+l.id,null!==n.options.popup_offset_x&&(l.offset_x=n.options.popup_offset_x),null!==n.options.popup_offset_y&&(l.offset_y=n.options.popup_offset_y)),e.getWindow(l)}},e.Array={chunk:function(a,b){var c,d,e=[];for(c=0,d=a.length;d>c;c+=b)e.push(a.slice(c,c+b));return e}},window.fireEvent("fabrik.loaded"),window.Fabrik=e,e});