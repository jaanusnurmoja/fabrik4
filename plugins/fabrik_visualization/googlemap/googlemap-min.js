/*! Fabrik */

var FbGoogleMapViz;FbGoogleMapViz=new Class({Implements:Options,options:{lat:0,lon:0,clustering:!1,maptypecontrol:!1,scrollwheel:!1,overviewcontrol:!1,scalecontrol:!1,center:"middle",ajax_refresh:!1,ajaxDefer:!1,use_polygon:!1,polyline:[],polylinewidth:[],polylinecolour:[],polygonopacity:[],polygonfillcolour:[],refresh_rate:1e4,use_cookies:!0,use_groups:!1,overlays:[],overlay_urls:[],overlay_labels:[],overlay_events:[],zoom:1,zoomStyle:0,radius_fill_colors:[],streetView:!1,traffic:!1,key:!1,showLocation:!1,styles:[],heatmap:!1},initialize:function(t,e){if(this.element_map=t,this.element=document.id(t),this.plugins=[],this.clusterMarkerCursor=0,this.clusterMarkers=[],this.markers=[],this.points=[],this.distanceWidgets=[],this.icons=[],this.setOptions(e),this.container=document.id(this.options.container),this.subContainer=document.id(this.options.container+"_sub"),this.updater=new Request.JSON({url:"",data:{option:"com_fabrik",format:"raw",task:"ajax_getMarkers",view:"visualization",controller:"visualization.googlemap",visualizationid:this.options.id},onSuccess:function(t){this.clearIcons(),this.clearPolyLines(),this.options.icons=t,this.addIcons(),this.setPolyLines(),this.options.ajax_refresh_center&&this.center(),Fabrik.fireEvent("fabrik.viz.googlemap.ajax.refresh",[this]),Fabrik.loader.stop(this.subContainer)}.bind(this)}),this.options.ajax_refresh&&(this.timer=this.update.periodical(this.options.refresh_rate,this)),"undefined"!=typeof Slimbox?Slimbox.scanPage():"undefined"!=typeof Mediabox&&Mediabox.scanPage(),"null"!==typeOf(this.container)){var i=this.container.getElement("form[name=filter]"),o=this.container.getElement(".clearFilters");o&&o.addEvent("click",function(t){this.container.getElements(".fabrik_filter").each(function(t){t.value=""}),t.stop(),i.submit()}.bind(this));var s=this.container.getElements("input.fabrik_filter_submit");"null"!==typeOf(s)&&s.addEvent("click",function(t){var e=Fabrik.fireEvent("list.filter",[this]).eventResults;"null"!==typeOf(e)&&0!==e.length&&e.contains(!1)?t.stop():i.submit()})}Fabrik.loadGoogleMap(this.options.key,function(){this.iniGMap()}.bind(this))},iniGMap:function(){switch(this.options.maptype){case"G_NORMAL_MAP":default:this.options.maptype=google.maps.MapTypeId.ROADMAP;break;case"G_SATELLITE_MAP":this.options.maptype=google.maps.MapTypeId.SATELLITE;break;case"G_HYBRID_MAP":this.options.maptype=google.maps.MapTypeId.HYBRID;break;case"G_TERRAIN_MAP":this.options.maptype=google.maps.MapTypeId.TERRAIN}if("null"!==typeOf(this.element_map)){var t={center:new google.maps.LatLng(this.options.lat,this.options.lon),zoom:this.options.zoomlevel.toInt(),mapTypeId:this.options.maptype,scaleControl:this.options.scalecontrol,mapTypeControl:this.options.maptypecontrol,overviewMapControl:this.options.overviewcontrol,scrollwheel:this.options.scrollwheel,zoomControl:this.options.zoom,streetViewControl:this.options.streetView,zoomControlOptions:{style:this.options.zoomStyle}};if(this.map=new google.maps.Map(document.id(this.element_map),t),this.map.setOptions({styles:this.options.styles}),this.options.traffic)(new google.maps.TrafficLayer).setMap(this.map);if(this.infoWindow=new google.maps.InfoWindow({content:""}),this.bounds=new google.maps.LatLngBounds,this.addIcons(),this.addOverlays(),this.options.heatmap)new google.maps.visualization.HeatmapLayer({data:this.points}).setMap(this.map);if(google.maps.event.addListener(this.map,"click",function(t){this.setCookies(t)}.bind(this)),google.maps.event.addListener(this.map,"moveend",function(t){this.setCookies(t)}.bind(this)),google.maps.event.addListener(this.map,"zoomend",function(t){this.setCookies(t)}.bind(this)),this.infoWindow=new google.maps.InfoWindow({content:""}),this.options.use_cookies){var e=Cookie.read("mymapzoom_"+this.options.id),i=Cookie.read("mymaplat_"+this.options.id),o=Cookie.read("mymaplng_"+this.options.id);i&&"0"!==i&&"0"!==e?(this.map.setCenter(new google.maps.LatLng(i.toFloat(),o.toFloat())),this.map.setZoom(e.toInt())):this.center()}else this.center();if(this.setPolyLines(),this.options.showLocation){var s=this;requirejs(["lib/geolocation-marker/geolocation-marker-min"],function(t){s.geoMarker=new t(s.map,{icon:{url:Fabrik.liveSite+"media/com_fabrik/images/gpsloc.png",size:new google.maps.Size(34,34),scaledSize:new google.maps.Size(17,17),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(8,8)}})})}this.options.ajaxDefer&&this.update()}},setPolyLines:function(){this.polylines=[],this.polygons=[],this.options.polyline.each(function(t,e){var i=[];t.each(function(t){i.push(new google.maps.LatLng(t[0],t[1]))});var o=this.options.polylinewidth[e],s=this.options.polylinecolour[e],n=this.options.polygonopacity[e],a=this.options.polygonfillcolour[e];if(this.options.use_polygon){var r=new google.maps.Polygon({paths:i,strokeColor:s,strokeWeight:o,strokeOpacity:n,fillColor:a});r.setMap(this.map),this.polygons.push(r)}else{var l=new google.maps.Polyline({path:i,strokeColor:s,strokeWeight:o});l.setMap(this.map),this.polylines.push(l)}}.bind(this))},clearPolyLines:function(){this.polylines.each(function(t){t.setMap(null)}),this.polygons.each(function(t){t.setMap(null)})},setCookies:function(){this.options.use_cookies&&(Cookie.write("mymapzoom_"+this.options.id,this.map.getZoom(),{duration:7}),Cookie.write("mymaplat_"+this.options.id,this.map.getCenter().lat(),{duration:7}),Cookie.write("mymaplng_"+this.options.id,this.map.getCenter().lng(),{duration:7}))},update:function(){Fabrik.loader.start(this.subContainer),this.updater.send()},clearIcons:function(){this.markers.each(function(t){t.setMap(null)}),this.options.clustering&&this.cluster.clearMarkers(),this.bounds=new google.maps.LatLngBounds(null)},noData:function(){return 0===this.options.icons.length},addIcons:function(){if(this.options.heatmap)this.options.icons.each(function(t){var e=new google.maps.LatLng(t[0],t[1]);this.bounds.extend(e),this.points.push(e)}.bind(this));else if(this.markers=[],this.clusterMarkers=[],this.options.icons.each(function(t){this.bounds.extend(new google.maps.LatLng(t[0],t[1])),this.markers.push(this.addIcon(t[0],t[1],t[2],t[3],t[4],t[5],t.groupkey,t.title,t.radius,t.c))}.bind(this)),this.renderGroupedSideBar(),this.options.clustering){var t=[],e=[53,56,66,78,90],i=0;for(i=1;i<=5;++i)t.push({url:Fabrik.liveSite+"components/com_fabrik/libs/googlemaps/markerclustererplus/images/m"+i+".png",height:e[i-1],width:e[i-1]});var o=null;""!==this.options.icon_increment&&14<(o=parseInt(this.options.icon_increment,10))&&(o=14);var s=60;""!==this.options.cluster_splits&&(s=this.options.cluster_splits.test("/,/")?60:parseInt(this.options.cluster_splits,10)),this.cluster=new MarkerClusterer(this.map,this.clusterMarkers,{splits:this.options.cluster_splits,icon_increment:this.options.icon_increment,maxZoom:o,gridSize:s,styles:t})}this.options.fitbounds&&this.map.fitBounds(this.bounds)},center:function(){var t;switch(this.options.center){case"middle":t=this.noData()?new google.maps.LatLng(this.options.lat,this.options.lon):this.bounds.getCenter();break;case"userslocation":geo_position_js.init()?geo_position_js.getCurrentPosition(this.geoCenter.bind(this),this.geoCenterErr.bind(this),{enableHighAccuracy:!0}):(fconsole("Geo location functionality not available"),t=this.bounds.getCenter());break;case"querystring":t=new google.maps.LatLng(this.options.lat,this.options.lon);break;default:if(this.noData())t=new google.maps.LatLng(this.options.lat,this.options.lon);else{var e=this.options.icons.getLast();t=e?new google.maps.LatLng(e[0],e[1]):this.bounds.getCenter()}}this.map.setCenter(t)},geoCenter:function(t){this.map.setCenter(new google.maps.LatLng(t.coords.latitude.toFixed(2),t.coords.longitude.toFixed(2)))},geoCenterErr:function(t){var e;if(fconsole("geo location error="+t.message),this.noData())e=new google.maps.LatLng(this.options.lat,this.options.lon);else{var i=this.options.icons.getLast();e=i?new google.maps.LatLng(i[0],i[1]):this.bounds.getCenter()}this.map.setCenter(e)},addIcon:function(t,e,i,o,s,n,a,r,l,p){var h={position:new google.maps.LatLng(t,e),map:this.map};""!==o&&(h.flat=!0,"http://"!==o.substr(0,7)&&"https://"!==o.substr(0,8)?h.icon=Fabrik.liveSite+o:h.icon=o),h.title=r;var c=new google.maps.Marker(h);return c.groupkey=a,google.maps.event.addListener(c,"click",function(){this.setCookies(),this.infoWindow.setContent(i),this.infoWindow.open(this.map,c),this.periodCounter=0,this.timer=this.slimboxFunc.periodical(1e3,this),Fabrik.tips.attach(".fabrikTip"),Fabrik.fireEvent("fabrik.viz.googlemap.info.opened",[this,c])}.bind(this)),this.options.clustering&&(this.clusterMarkers.push(c),this.clusterMarkerCursor++),this.options.show_radius&&this.addRadius(c,l,p),this.periodCounter++,c},addRadius:function(t,e,i){this.options.show_radius&&0<e&&new google.maps.Circle({map:this.map,radius:e,fillColor:this.options.radius_fill_colors[i]}).bindTo("center",t,"position")},slimboxFunc:function(){var t=$$("a").filter(function(t){return t.rel&&t.rel.test(/^lightbox/i)});(0<t.length||15<this.periodCounter)&&(clearInterval(this.timer),"undefined"!=typeof Slimbox?$$(t).slimbox({},null,function(t){return this===t||8<this.rel.length&&this.rel===t.rel}):"undefined"!=typeof Mediabox&&$$(t).mediabox({},null,function(t){return this===t||8<this.rel.length&&this.rel===t.rel})),this.periodCounter++},toggleOverlay:function(t){if(t.target.id.test(/overlay_chbox_(\d+)/)){var e=t.target.id.match(/overlay_chbox_(\d+)/)[1].toInt();t.target.checked?this.options.overlays[e].setMap(this.map):this.options.overlays[e].setMap(null)}},addOverlays:function(){this.options.use_overlays&&this.options.overlay_urls.each(function(t,e){var i="1"===this.options.overlay_preserveviewports[e],o="1"===this.options.overlay_suppressinfowindows[e];this.options.overlays[e]=new google.maps.KmlLayer({url:t,preserveViewport:i,suppressInfoWindows:o}),this.options.overlays[e].setMap(this.map),this.options.overlay_events[e]=function(t){this.toggleOverlay(t)}.bind(this),"null"!==typeOf(document.id("overlay_chbox_"+e))&&document.id("overlay_chbox_"+e).addEvent("click",this.options.overlay_events[e])}.bind(this))},watchSidebar:function(){this.options.use_overlays&&$$(".fabrik_calendar_overlay_chbox").each(function(t){}.bind(this))},renderGroupedSideBar:function(){var n,a,r="";if(this.options.use_groups&&(this.grouped={},a=document.id(this.options.container).getElement(".grouped_sidebar"),"null"!==typeOf(a)&&(a.empty(),this.options.icons.each(function(t){if("null"===typeOf(this.grouped[t.groupkey])){t.groupkey;var e=t.groupkey;"string"===typeOf(e)&&(e=e.replace(/[^0-9a-zA-Z_]/g,"")),"null"!==typeOf(this.options.groupTemplates[t.listid])&&(r=this.options.groupTemplates[t.listid][e]);var i=new Element("div").set("html",r);i.getElement("a")&&(i=i.getElement("a")),n=i.get("html"),this.grouped[t.groupkey]=[];var o=t.listid+e;o+=" "+t.groupClass;var s=new Element("a",{events:{click:function(t){var e=t.target.className.replace("groupedLink","groupedContent");e=e.split(" ")[0],document.getElements(".groupedContent").hide(),document.getElements("."+e).show()}},href:"#",class:"groupedLink"+o}).set("html",n);s.store("data-groupkey",t.groupkey),new Element("div",{class:"groupedContainer"+o}).adopt(s).inject(a)}this.grouped[t.groupkey].push(t)}.bind(this)),!this.watchingSideBar))){a.addEvent("click:relay(a)",function(t,e){t.preventDefault(),this.toggleGrouped(e)}.bind(this));var t=this.container.getElements(".clear-grouped");"null"!==typeOf(t)&&t.addEvent("click",function(t){t.stop(),this.toggleGrouped(!1)}.bind(this)),this.watchingSideBar=!0}},toggleGrouped:function(e){this.infoWindow.close(),document.id(this.options.container).getElement(".grouped_sidebar").getElements("a").removeClass("active"),e&&(e.addClass("active"),this.toggledGroup=e.retrieve("data-groupkey")),this.markers.each(function(t){t.groupkey===this.toggledGroup||!1===e?t.setVisible(!0):t.setVisible(!1),t.setAnimation(google.maps.Animation.BOUNCE);(function(){t.setAnimation(null)}).delay(1500)}.bind(this))},addPlugins:function(t){this.plugins=t}});