/*! Fabrik */

FabFilterToggle=new Class({initialize:function(t){var l=document.id("list_"+t),r=document.id("listform_"+t);Fabrik.addEvent("fabrik.list.update",function(e){return e.id===t&&l.getElements(".fabrik___heading span.filter").hide(),!0}),l.getElements("span.heading").each(function(e){var t=e.getNext();t&&(e.addClass("filtertitle"),e.setStyle("cursor","pointer"),(i=t.getElement("input"))&&i.set("placeholder",e.get("text")),t.hide())}),l.addEvent("click:relay(span.heading)",function(e){var t=e.target.getNext();if(t){t.toggle();var i=r.getElement(".fabrikFilterContainer"),n=l.getOffsetParent()?l.getOffsetParent():document.body,a=t.getPosition(n);i.setPosition({x:a.x-5,y:a.y+t.getSize().y}),"none"===t.getStyle("display")?i.hide():i.show()}});var e=r.getElement(".clearFilters");"null"!==typeOf(e)&&e.addEvent("click",function(){r.getElement(".fabrikFilterContainer").hide(),r.getElements(".fabrik___heading .filter").hide()});var n=r.getElement(".fabrik_filter_submit");"null"!==typeOf(n)&&n.addEvent("click",function(){r.getElement(".fabrikFilterContainer").hide(),r.getElements(".fabrik___heading .filter").hide()})}});