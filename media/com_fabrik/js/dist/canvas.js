/*! Fabrik */
var Canvas=new Class({Implements:[Options],options:{tabs:["page1"],tabelement:"",pagecontainer:"packagepages",editable:!1},initialize:function(t){this.setOptions(t),Fabrik.addEvent("fabrik.page.insert",function(t){this.insertPage(t)}.bind(this)),this.iconGen=new IconGenerator({scale:.5}),this.pages=new Pages(this.options.pagecontainer,this.options.editable),this.tabs=new Tabs(this.options.tabelement,this.options.tabs,this.options.editable)},setup:function(){this.pages.fromJSON(this.options.layout)},setDrags:function(){document.id("typeList").getElements("li").each(function(e){e.addEvent("mousedown",function(t){var n=e.clone().setStyles(e.getCoordinates()).store("type",e.retrieve("type")).setStyles({opacity:.7,position:"absolute"}).addEvent("emptydrop",function(){e.dispose()}).inject(document.body);n.makeDraggable({droppables:this.drops,onComplete:function(){this.detach()},onEnter:function(t,e){e.tween("background-color","#98B5C1")},onLeave:function(t,e){e.tween("background-color","#fff")},onDrop:function(t,e){e&&(this.insertLocation=t.getCoordinates(e),this.openListWindow(t.retrieve("type")),e.tween("background-color","#fff")),n.dispose()}.bind(this)}).start(t)}.bind(this))}.bind(this))},setDrops:function(t){this.options.tabs=this.tabs.tabs.getKeys(),this.drops=this.pages.getHTMLPages()}});