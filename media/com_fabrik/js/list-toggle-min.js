/*! fabrik */
var FbListToggle=new Class({initialize:function(a){jQuery("#"+a.id+" .togglecols .dropdown-menu a, #"+a.id+" .togglecols .dropdown-menu li").click(function(a){a.stopPropagation()}),a.addEvent("mouseup:relay(a[data-toggle-col])",function(a,b){var c=b.get("data-toggle-state"),d=b.get("data-toggle-col");this.toggleColumn(d,c,b)}.bind(this));a.getElements("a[data-toggle-group]");a.addEvent("mouseup:relay(a[data-toggle-group])",function(a,b){var c,d=b.get("data-toggle-state"),e=b.get("data-toggle-group"),f=document.getElements("a[data-toggle-parent-group="+e+"]");f.each(function(a){var b=a.get("data-toggle-col");this.toggleColumn(b,d,a)}.bind(this)),d="open"===d?"close":"open",c="open"===d?"":" muted",b.getElement("i").className="icon-eye-"+d+c,b.set("data-toggle-state",d)}.bind(this))},toggleColumn:function(a,b,c){var d;b="open"===b?"close":"open","open"===b?(document.getElements(".fabrik___heading ."+a).show(),document.getElements(".fabrik_row  ."+a).show(),d=""):(document.getElements(".fabrik___heading ."+a).hide(),document.getElements(".fabrik_row  ."+a).hide(),d=" muted"),c.getElement("i").className="icon-eye-"+b+d,c.set("data-toggle-state",b)}});