/*! Fabrik */
var FbGoogleMapViz=new Class({Implements:Options,options:{lat:0,lon:0,clustering:!1,maptypecontrol:!1,scrollwheel:!1,overviewcontrol:!1,scalecontrol:!1,center:"middle",ajax_refresh:!1,ajaxDefer:!1,use_polygon:!1,polyline:[],polylinewidth:[],polylinecolour:[],polygonopacity:[],polygonfillcolour:[],refresh_rate:1e4,use_cookies:!0,use_groups:!1,overlays:[],overlay_urls:[],overlay_labels:[],overlay_events:[],zoom:1,zoomStyle:0,radius_fill_colors:[],streetView:!1,traffic:!1,key:!1,language:"",showLocation:!1,styles:[],heatmap:!1},initialize:function(t,e){var i;this.element_map=t,this.element=document.id(t),this.plugins=[],this.clusterMarkerCursor=0,this.clusterMarkers=[],this.markers=[],this.points=[],this.heatmap=!1,this.weightedLocations=[],this.distanceWidgets=[],this.icons=[],this.setOptions(e),this.container=document.id(this.options.container),this.subContainer=document.id(this.options.container+"_sub"),this.updater=new Request.JSON({url:"",data:{option:"com_fabrik",format:"raw",task:"ajax_getMarkers",view:"visualization",controller:"visualization.googlemap",visualizationid:this.options.id},onSuccess:function(t){this.clearIcons(),this.clearPolyLines(),this.options.icons=t,this.addIcons(),this.options.heatmap&&(this.heatmap=new google.maps.visualization.HeatmapLayer({data:this.weightedLocations}),this.heatmap.setMap(this.map)),this.setPolyLines(),this.options.ajax_refresh_center&&this.center(),Fabrik.fireEvent("fabrik.viz.googlemap.ajax.refresh",[this]),Fabrik.loader.stop(this.subContainer)}.bind(this)}),this.options.ajax_refresh&&(this.timer=this.update.periodical(this.options.refresh_rate,this)),"undefined"!=typeof Slimbox?Slimbox.scanPage():"undefined"!=typeof Mediabox&&Mediabox.scanPage(),"null"!==typeOf(this.container)&&(i=this.container.getElement("form[name=filter]"),(t=this.container.getElement(".clearFilters"))&&t.addEvent("click",function(t){this.container.getElements(".fabrik_filter").each(function(t){t.value=""}),t.stop(),i.submit()}.bind(this)),e=this.container.getElements("input.fabrik_filter_submit"),"null"!==typeOf(e))&&e.addEvent("click",function(t){var e=Fabrik.fireEvent("list.filter",[this]).eventResults;"null"!==typeOf(e)&&0!==e.length&&e.contains(!1)?t.stop():i.submit()}),Fabrik.loadGoogleMap(this.options.key,function(){this.iniGMap()}.bind(this),this.options.language)},iniGMap:function(){switch(this.options.maptype){case"G_NORMAL_MAP":default:this.options.maptype=google.maps.MapTypeId.ROADMAP;break;case"G_SATELLITE_MAP":this.options.maptype=google.maps.MapTypeId.SATELLITE;break;case"G_HYBRID_MAP":this.options.maptype=google.maps.MapTypeId.HYBRID;break;case"G_TERRAIN_MAP":this.options.maptype=google.maps.MapTypeId.TERRAIN}if("null"!==typeOf(this.element_map)){if(this.mapTypeIds=[],"array"!==typeOf(this.options.maptypeids))for(var t in google.maps.MapTypeId)this.mapTypeIds.push(google.maps.MapTypeId[t]);else for(var t in this.options.maptypeids)this.mapTypeIds.push(this.options.maptypeids[t]);var e,i,o,s={center:new google.maps.LatLng(this.options.lat,this.options.lon),zoom:this.options.zoomlevel.toInt(),mapTypeId:this.options.maptype,scaleControl:this.options.scalecontrol,mapTypeControl:this.options.maptypecontrol,overviewMapControl:this.options.overviewcontrol,scrollwheel:this.options.scrollwheel,zoomControl:this.options.zoom,streetViewControl:this.options.streetView,zoomControlOptions:{style:this.options.zoomStyle},mapTypeControlOptions:{mapTypeIds:this.mapTypeIds}};this.map=new google.maps.Map(document.id(this.element_map),s),this.map.setOptions({styles:this.options.styles}),this.options.traffic&&(new google.maps.TrafficLayer).setMap(this.map),this.infoWindow=new google.maps.InfoWindow({content:""}),this.bounds=new google.maps.LatLngBounds,this.addIcons(),this.addOverlays(),this.options.heatmap&&(this.heatmap=new google.maps.visualization.HeatmapLayer({data:this.weightedLocations}),this.heatmap.setMap(this.map)),google.maps.event.addListener(this.map,"click",function(t){this.setCookies(t)}.bind(this)),google.maps.event.addListener(this.map,"moveend",function(t){this.setCookies(t)}.bind(this)),google.maps.event.addListener(this.map,"zoomend",function(t){this.setCookies(t)}.bind(this)),this.infoWindow=new google.maps.InfoWindow({content:""}),this.options.use_cookies&&(s=Cookie.read("mymapzoom_"+this.options.id),e=Cookie.read("mymaplat_"+this.options.id),i=Cookie.read("mymaplng_"+this.options.id),e)&&"0"!==e&&"0"!==s?(this.map.setCenter(new google.maps.LatLng(e.toFloat(),i.toFloat())),this.map.setZoom(s.toInt())):this.center(),this.setPolyLines(),this.options.showLocation&&(o=this,requirejs(["lib/geolocation-marker/geolocation-marker-min"],function(t){o.geoMarker=new t(o.map,{icon:{url:Fabrik.liveSite+"media/com_fabrik/images/gpsloc.png",size:new google.maps.Size(34,34),scaledSize:new google.maps.Size(17,17),origin:new google.maps.Point(0,0),anchor:new google.maps.Point(8,8)}})})),this.options.ajaxDefer&&this.update(),Fabrik.fireEvent("fabrik.viz.googlemap.init.end",this)}},setPolyLines:function(){this.polylines=[],this.polygons=[],this.options.polyline.each(function(t,e){var i=[],t=(t.each(function(t){i.push(new google.maps.LatLng(t[0],t[1]))}),this.options.polylinewidth[e]),o=this.options.polylinecolour[e],s=this.options.polygonopacity[e],e=this.options.polygonfillcolour[e];this.options.use_polygon?((s=new google.maps.Polygon({paths:i,strokeColor:o,strokeWeight:t,strokeOpacity:s,fillColor:e})).setMap(this.map),this.polygons.push(s)):((e=new google.maps.Polyline({path:i,strokeColor:o,strokeWeight:t})).setMap(this.map),this.polylines.push(e))}.bind(this))},clearPolyLines:function(){this.polylines.each(function(t){t.setMap(null)}),this.polygons.each(function(t){t.setMap(null)})},setCookies:function(){this.options.use_cookies&&(Cookie.write("mymapzoom_"+this.options.id,this.map.getZoom(),{duration:7}),Cookie.write("mymaplat_"+this.options.id,this.map.getCenter().lat(),{duration:7}),Cookie.write("mymaplng_"+this.options.id,this.map.getCenter().lng(),{duration:7}))},update:function(){Fabrik.loader.start(this.subContainer),this.updater.send()},clearIcons:function(){this.markers.each(function(t){t.setMap(null)}),this.options.clustering&&this.cluster.clearMarkers(),this.options.heatmap&&!(this.weightedLocations=[])!==this.heatmap&&this.heatmap.setMap(null),this.bounds=new google.maps.LatLngBounds(null)},noData:function(){return 0===this.options.icons.length},showRadiusFilterLocation:function(){var t,n;"null"!==typeOf(this.container)&&(t=this.container.getElement("form[name=filter]"),n=this,jQuery(t).find(".radius_search").each(function(t,e){var i,o,s=jQuery(e).find('input[name="radius_search_active'+t+'[]"]');0<s.length&&"1"===s[0].value&&(s=jQuery(e).find('input[name="radius_search_geocomplete_lat'+t+'"]'),i=jQuery(e).find('input[name="radius_search_geocomplete_lon'+t+'"]'),0<s.length)&&0<i.length&&""!==s[0].value&&""!==i[0].value&&(o=new google.maps.LatLng(s[0].value,i[0].value),e=jQuery(e).find('input[name="radius_search_geocomplete_field'+t+'"]'),t={position:o,map:n.map},0<e.length&&(t.title=e[0].value),new google.maps.Marker(t),n.bounds.extend(new google.maps.LatLng(s[0].value,i[0].value)))}))},addIcons:function(){if(this.options.heatmap)this.options.icons.each(function(t){var e=new google.maps.LatLng(t[0],t[1]);this.bounds.extend(e),this.points.push(e),1!==t.heatmapWeighting?this.weightedLocations.push({location:e,weight:t.heatmapWeighting}):this.weightedLocations.push(e)}.bind(this));else if(this.markers=[],this.clusterMarkers=[],this.options.icons.each(function(t){this.bounds.extend(new google.maps.LatLng(t[0],t[1])),this.markers.push(this.addIcon(t[0],t[1],t[2],t[3],t[4],t[5],t.groupkey,t.title,t.radius,t.c))}.bind(this)),this.showRadiusFilterLocation(),this.renderGroupedSideBar(),this.options.clustering){for(var t=[],e=[53,56,66,78,90],i=0,i=1;i<=5;++i)t.push({url:Fabrik.liveSite+"components/com_fabrik/libs/googlemaps/markerclustererplus/images/m"+i+".png",height:e[i-1],width:e[i-1]});var o=null,s=(""!==this.options.icon_increment&&14<(o=parseInt(this.options.icon_increment,10))&&(o=14),60);""!==this.options.cluster_splits&&(s=this.options.cluster_splits.test("/,/")?60:parseInt(this.options.cluster_splits,10)),this.cluster=new MarkerClusterer(this.map,this.clusterMarkers,{splits:this.options.cluster_splits,icon_increment:this.options.icon_increment,maxZoom:o,gridSize:s,styles:t})}this.options.fitbounds&&this.map.fitBounds(this.bounds)},center:function(){var t,e;switch(this.options.center){case"middle":e=this.noData()?new google.maps.LatLng(this.options.lat,this.options.lon):this.bounds.getCenter();break;case"userslocation":geo_position_js.init()?geo_position_js.getCurrentPosition(this.geoCenter.bind(this),this.geoCenterErr.bind(this),{enableHighAccuracy:!0}):(fconsole("Geo location functionality not available"),e=this.bounds.getCenter());break;case"querystring":e=new google.maps.LatLng(this.options.lat,this.options.lon);break;default:e=this.noData()?new google.maps.LatLng(this.options.lat,this.options.lon):(t=this.options.icons.getLast())?new google.maps.LatLng(t[0],t[1]):this.bounds.getCenter()}this.map.setCenter(e)},geoCenter:function(t){this.map.setCenter(new google.maps.LatLng(t.coords.latitude.toFixed(2),t.coords.longitude.toFixed(2)))},geoCenterErr:function(t){fconsole("geo location error="+t.message),t=this.noData()?new google.maps.LatLng(this.options.lat,this.options.lon):(t=this.options.icons.getLast())?new google.maps.LatLng(t[0],t[1]):this.bounds.getCenter(),this.map.setCenter(t)},addIcon:function(t,e,i,o,s,n,a,r,l,p){var t={position:new google.maps.LatLng(t,e),map:this.map},h=(""!==o&&(t.flat=!0,"http://"!==o.substr(0,7)&&"https://"!==o.substr(0,8)?t.icon=Fabrik.liveSite+o:t.icon=o),t.title=r,new google.maps.Marker(t));return h.groupkey=a,google.maps.event.addListener(h,"click",function(){this.setCookies(),this.infoWindow.setContent(i),this.infoWindow.open(this.map,h),this.periodCounter=0,this.timer=this.slimboxFunc.periodical(1e3,this),Fabrik.tips.attach(".fabrikTip"),Fabrik.fireEvent("fabrik.viz.googlemap.info.opened",[this,h])}.bind(this)),this.options.clustering&&(this.clusterMarkers.push(h),this.clusterMarkerCursor++),this.options.show_radius&&this.addRadius(h,l,p),this.periodCounter++,h},addRadius:function(t,e,i){this.options.show_radius&&0<e&&new google.maps.Circle({map:this.map,radius:e,fillColor:this.options.radius_fill_colors[i]}).bindTo("center",t,"position")},slimboxFunc:function(){var t=$$("a").filter(function(t){return t.rel&&t.rel.test(/^lightbox/i)});(0<t.length||15<this.periodCounter)&&(clearInterval(this.timer),"undefined"!=typeof Slimbox?$$(t).slimbox({},null,function(t){return this===t||8<this.rel.length&&this.rel===t.rel}):"undefined"!=typeof Mediabox&&$$(t).mediabox({},null,function(t){return this===t||8<this.rel.length&&this.rel===t.rel})),this.periodCounter++},toggleOverlay:function(t){var e;t.target.id.test(/overlay_chbox_(\d+)/)&&(e=t.target.id.match(/overlay_chbox_(\d+)/)[1].toInt(),t.target.checked?this.options.overlays[e].setMap(this.map):this.options.overlays[e].setMap(null))},addOverlays:function(){this.options.use_overlays&&(this.options.overlay_urls.each(function(t,e){var i="1"===this.options.overlay_preserveviewports[e],o="1"===this.options.overlay_suppressinfowindows[e];this.options.overlays[e]=new google.maps.KmlLayer({url:t,preserveViewport:i,suppressInfoWindows:o}),this.options.overlays[e].setMap(this.map),this.options.overlay_events[e]=function(t){this.toggleOverlay(t)}.bind(this),"null"!==typeOf(document.id("overlay_chbox_"+e))&&document.id("overlay_chbox_"+e).addEvent("click",this.options.overlay_events[e])}.bind(this)),Fabrik.fireEvent("fabrik.viz.googlemap.overlays.added",[this]))},watchSidebar:function(){this.options.use_overlays&&$$(".fabrik_calendar_overlay_chbox").each(function(t){}.bind(this))},renderGroupedSideBar:function(){var o,s,t,n="";this.options.use_groups&&(this.grouped={},s=document.id(this.options.container).getElement(".grouped_sidebar"),"null"===typeOf(s)||(s.empty(),this.options.icons.each(function(t){var e,i;"null"===typeOf(this.grouped[t.groupkey])&&(t.groupkey,i=t.groupkey,"string"===typeOf(i)&&(i=i.replace(/[^0-9a-zA-Z_]/g,"")),"null"!==typeOf(this.options.groupTemplates[t.listid])&&(n=this.options.groupTemplates[t.listid][i]),(e=new Element("div").set("html",n)).getElement("a")&&(e=e.getElement("a")),o=e.get("html"),this.grouped[t.groupkey]=[],e=t.listid+i,e+=" "+t.groupClass,(i=new Element("a",{events:{click:function(t){t=(t=t.target.className.replace("groupedLink","groupedContent")).split(" ")[0];document.getElements(".groupedContent").hide(),document.getElements("."+t).show()}},href:"#",class:"groupedLink"+e}).set("html",o)).store("data-groupkey",t.groupkey),new Element("div",{class:"groupedContainer"+e}).adopt(i).inject(s)),this.grouped[t.groupkey].push(t)}.bind(this)),this.watchingSideBar)||(s.addEvent("click:relay(a)",function(t,e){t.preventDefault(),this.toggleGrouped(e)}.bind(this)),t=this.container.getElements(".clear-grouped"),"null"!==typeOf(t)&&t.addEvent("click",function(t){t.stop(),this.toggleGrouped(!1)}.bind(this)),this.watchingSideBar=!0))},toggleGrouped:function(e){this.infoWindow.close(),document.id(this.options.container).getElement(".grouped_sidebar").getElements("a").removeClass("active"),e&&(e.addClass("active"),this.toggledGroup=e.retrieve("data-groupkey")),this.markers.each(function(t){t.groupkey===this.toggledGroup||!1===e?t.setVisible(!0):t.setVisible(!1),t.setAnimation(google.maps.Animation.BOUNCE);!function(){t.setAnimation(null)}.delay(1500)}.bind(this))},addPlugins:function(t){this.plugins=t}});