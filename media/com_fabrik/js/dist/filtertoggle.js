/*! Fabrik */

FabFilterToggle=new Class({initialize:function(a){var b=document.id("list_"+a),c=document.id("listform_"+a);Fabrik.addEvent("fabrik.list.update",function(c){return c.id===a&&b.getElements(".fabrik___heading span.filter").hide(),!0}),b.getElements("span.heading").each(function(a){var b=a.getNext();b&&(a.addClass("filtertitle"),a.setStyle("cursor","pointer"),(i=b.getElement("input"))&&i.set("placeholder",a.get("text")),b.hide())}),b.addEvent("click:relay(span.heading)",function(a){var d=a.target.getNext();if(d){d.toggle();var e=c.getElement(".fabrikFilterContainer"),f=b.getOffsetParent()?b.getOffsetParent():document.body,g=d.getPosition(f);e.setPosition({x:g.x-5,y:g.y+d.getSize().y}),"none"===d.getStyle("display")?e.hide():e.show()}});var d=c.getElement(".clearFilters");"null"!==typeOf(d)&&d.addEvent("click",function(){c.getElement(".fabrikFilterContainer").hide(),c.getElements(".fabrik___heading .filter").hide()});var e=c.getElement(".fabrik_filter_submit");"null"!==typeOf(e)&&e.addEvent("click",function(){c.getElement(".fabrikFilterContainer").hide(),c.getElements(".fabrik___heading .filter").hide()})}});