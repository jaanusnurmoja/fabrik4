/*! Fabrik */

define(["jquery"],function(i){return new Class({initialize:function(a){i("#"+a.id+" .togglecols .dropdown-menu a, #"+a.id+" .togglecols .dropdown-menu li").click(function(a){a.stopPropagation()}),a.addEvent("mouseup:relay(a[data-bs-toggle-col])",function(a,e){var o=i(e).data("bs-toggle-state"),t=i(e).data("bs-toggle-col");this.toggleColumn(t,o,e)}.bind(this));a.getElements("a[data-bs-toggle-group]");a.addEvent("mouseup:relay(a[data-bs-toggle-group])",function(a,e){var o,t=i(e).data("bs-toggle-state"),n=i(e).data("bs-toggle-group");document.getElements("a[data-bs-toggle-parent-group="+n+"]").each(function(a){var e=i(a).data("bs-toggle-col");this.toggleColumn(e,t,a)}.bind(this)),o="open"===(t="open"===t?"close":"open")?"":" muted",i(e).find("*[data-isicon]").removeClass().addClass("icon-eye-"+t+o),i(e).data("bs-toggle-state",t)}.bind(this))},toggleColumn:function(a,e,o){var t;t="open"===(e="open"===e?"close":"open")?(i(".fabrik___heading ."+a).show(),i(".fabrikFilterContainer ."+a).show(),i(".fabrik_row  ."+a).show(),i(".fabrik_calculations  ."+a).show(),""):(i(".fabrik___heading ."+a).hide(),i(".fabrikFilterContainer ."+a).hide(),i(".fabrik_row  ."+a).hide(),i(".fabrik_calculations  ."+a).hide()," muted"),i(o).find("*[data-isicon]").removeClass().addClass("icon-eye-"+e+t),i(o).data("bs-toggle-state",e)}})});