/*! Fabrik */

define(["jquery","fab/loader","fab/requestqueue"],function(f,e,t){var o=f(document);document.addEvent("click:relay(.popover button.close)",function(e,t){var o="#"+t.get("data-popover"),i=document.getElement(o);f(o).popover("hide"),"null"!==typeOf(i)&&"input"===i.get("tag")&&(i.checked=!1)});var u={events:{},bootstrapVersion:function(e){var t,o=[e||"modal","tooltip"],i=o.length;for(t=0;t<i;++t){var n=f.fn[o[t]];if(n){if(n.VERSION)return n.VERSION.match(/(\d+)\./)[0].toInt();if(n.Constructor&&n.Constructor.VERSION)return n.Constructor.VERSION.match(/(\d+)\./)[0].toInt()}}return 2},Windows:{}};return u.loader=new e,u.blocks={},u.periodicals={},u.addBlock=function(e,t){u.blocks[e]=t,u.fireEvent("fabrik.block.added",[t,e])},u.getBlock=function(e,t,o){return(o=o||!1)&&(u.periodicals[e]=u._getBlock.periodical(500,this,[e,t,o])),u._getBlock(e,t,o)},u._getBlock=function(e,t,o){var i;if(t=t||!1,void 0!==u.blocks[e])i=e;else{if(t)return!1;var n=Object.keys(u.blocks),a=n.searchFor(e);if(-1===a)return!1;i=n[a]}return o&&(clearInterval(u.periodicals[e]),o(u.blocks[i])),u.blocks[i]},o.on("click",".fabrik_delete a, .fabrik_action a.delete, .btn.delete",function(e){e.rightClick||u.watchDelete(e,this)}),o.on("click",".fabrik_edit a, a.fabrik_edit",function(e){e.rightClick||u.watchEdit(e,this)}),o.on("click",".fabrik_view a, a.fabrik_view",function(e){e.rightClick||u.watchView(e,this)}),document.addEvent("click:relay(*[data-fabrik-view])",function(e,t){if(!e.rightClick){var o,i,n;e.preventDefault(),o=(i="a"===e.target.get("tag")?e.target:"null"!==typeOf(e.target.getElement("a"))?e.target.getElement("a"):e.target.getParent("a")).get("href"),o+=o.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1",o+="&format=partial",$H(u.Windows).each(function(e,t){e.close()}),(n=i.get("title"))||(n=Joomla.JText._("COM_FABRIK_VIEW"));var a={id:"view."+o,title:n,loadMethod:"xhr",contentURL:o};u.getWindow(a)}}),u.removeEvent=function(e,t){if(u.events[e]){var o=u.events[e].indexOf(t);-1!==o&&delete u.events[e][o]}},u.addEvent=u.on=function(e,t){u.events[e]||(u.events[e]=[]),u.events[e].contains(t)||u.events[e].push(t)},u.addEvents=function(e){var t;for(t in e)e.hasOwnProperty(t)&&u.addEvent(t,e[t]);return this},u.fireEvent=u.trigger=function(e,t,o){var i=u.events;return this.eventResults=[],i&&i[e]&&(t=Array.mfrom(t),i[e].each(function(e){o?this.eventResults.push(e.delay(o,this,t)):this.eventResults.push(e.apply(this,t))},this)),this},u.requestQueue=new t,u.cbQueue={google:[]},u.loadGoogleMap=function(e,t,o){var i=("https:"===document.location.protocol?"https:":"http:")+"//maps.googleapis.com/maps/api/js?libraries=places,visualization&callback=Fabrik.mapCb";if(!1!==e&&(i+="&key="+e),""!==o&&(i+="&language="+o),0===Array.mfrom(document.scripts).filter(function(e){return e.src===i}).length){var n=document.createElement("script");n.type="text/javascript",n.src=i,document.body.appendChild(n),u.cbQueue.google.push(t)}else u.googleMap?window[t]():u.cbQueue.google.push(t)},u.mapCb=function(){var e,t;for(u.googleMap=!0,t=0;t<u.cbQueue.google.length;t++)e=u.cbQueue.google[t],"function"===typeOf(e)?e():window[e]();u.cbQueue.google=[]},u.watchDelete=function(e,t){var o,i,n;if((n=e.target.getParent(".fabrik_row"))||(n=u.activeRow),n){var a=n.getElement("input[type=checkbox][name*=id]");"null"!==typeOf(a)&&(a.checked=!0),i=(i=n.id.split("_")).splice(0,i.length-2).join("_"),o=u.blocks[i]}else if(i=e.target.getParent(".fabrikList"),"null"!==typeOf(i))i=i.id,o=u.blocks[i];else{var r=t.getParent(".floating-tip-wrapper");if(r)i=r.retrieve("list").id;else i=t.get("data-listRef");void 0===(o=u.blocks[i])||"floating"!==o.options.actionMethod||this.bootstrapped||o.form.getElements("input[type=checkbox][name*=id], input[type=checkbox][name=checkAll]").each(function(e){e.checked=!0})}o.submit("list.delete")||e.preventDefault()},u.watchEdit=function(e,t){u.openSingleView("form",e,t)},u.watchView=function(e,t){u.openSingleView("details",e,t)},u.openSingleView=function(o,e,t){var i,n,a,r,l,c,s,p=f(t).data("list"),d=u.blocks[p];if(1===f(t).data("isajax")){if(d){if(!d.options.ajax_links)return;if(!(c=d.getActiveRow(e))||0===c.length)return;d.setActive(c),l=c.prop("id").split("_").pop()}else l=f(t).data("rowid");e.preventDefault(),i=(a="A"===f(e.target).prop("tagName")?f(e.target):0<f(e.target).find("a").length?f(e.target).find("a"):f(e.target).closest("a")).prop("href"),1!==f(t).data("iscustom")&&(i+=i.contains("?")?"&tmpl=component&ajax=1":"?tmpl=component&ajax=1",i+="&format=partial"),r=a.prop("title"),void 0===(n=a.data("loadmethod"))&&(n="xhr"),f.each(u.Windows,function(e,t){t.close()}),s={modalId:"ajax_links",id:p+"."+l,title:r,loadMethod:n,contentURL:i,onClose:function(){var e=o+"_"+d.options.formid+"_"+l;try{u.blocks[e].destroyElements(),u.blocks[e].formElements=null,u.blocks[e]=null,delete u.blocks[e];var t="details"===o?"fabrik.list.row.view.close":"fabrik.list.row.edit.close";u.fireEvent(t,[p,l,e])}catch(e){console.log(e)}}},d&&(""!==d.options.popup_width&&(s.width=d.options.popup_width),""!==d.options.popup_height&&(s.height=d.options.popup_height),s.id="details"===o?"view."+s.id:"add."+s.id,null!==d.options.popup_offset_x&&(s.offset_x=d.options.popup_offset_x),null!==d.options.popup_offset_y&&(s.offset_y=d.options.popup_offset_y)),u.getWindow(s)}},u.timePickerClose=function(e,t){if(e){var o=f(e).closest("form");if(0<o.length&&(o=u.getBlock(o[0].id))){var i=f(e).closest(".fabrikSubElementContainer");if(0<i.length){var n=o.formElements.get(i[0].id);n&&n.hideTime(e,t)}}}},u.Array={chunk:function(e,t){var o,i,n=[];for(o=0,i=e.length;o<i;o+=t)n.push(e.slice(o,o+t));return n}},window.fireEvent("fabrik.loaded"),window.Fabrik=u});