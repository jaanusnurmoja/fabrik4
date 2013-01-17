var FbGoogleMapViz=new Class({Implements:Options,options:{lat:0,lon:0,clustering:false,maptypecontrol:false,scrollwheel:false,overviewcontrol:false,scalecontrol:false,center:"middle",ajax_refresh:false,use_polygon:false,polyline:[],polylinewidth:[],polylinecolour:[],polygonopacity:[],polygonfillcolour:[],refresh_rate:10000,use_cookies:true,use_groups:false,overlays:[],overlay_urls:[],overlay_labels:[],overlay_events:[],zoom:1,zoomStyle:0,radius_fill_colors:[],styles:[]},initialize:function(e,d){this.element_map=e;this.element=document.id(e);this.clusterMarkerCursor=0;this.clusterMarkers=[];this.markers=[];this.distanceWidgets=[];this.icons=[];this.setOptions(d);if(this.options.ajax_refresh){this.updater=new Request.JSON({url:"",data:{option:"com_fabrik",format:"raw",task:"ajax_getMarkers",view:"visualization",controller:"visualization.googlemap",visualizationid:this.options.id},onSuccess:function(c){this.clearIcons();this.clearPolyLines();this.options.icons=c;this.addIcons();this.setPolyLines();if(this.options.ajax_refresh_center){this.center()}}.bind(this)});this.timer=this.update.periodical(this.options.refresh_rate,this)}switch(this.options.maptype){case"G_NORMAL_MAP":default:this.options.maptype=google.maps.MapTypeId.ROADMAP;break;case"G_SATELLITE_MAP":this.options.maptype=google.maps.MapTypeId.SATELLITE;break;case"G_HYBRID_MAP":this.options.maptype=google.maps.MapTypeId.HYBRID;break;case"TERRAIN":this.options.maptype=google.maps.MapTypeId.TERRAIN;break}if(typeOf(this.element_map)==="null"){return}var g={center:new google.maps.LatLng(this.options.lat,this.options.lon),zoom:this.options.zoomlevel.toInt(),mapTypeId:this.options.maptype,scaleControl:this.options.scalecontrol,mapTypeControl:this.options.maptypecontrol,overviewMapControl:this.options.overviewcontrol,scrollwheel:this.options.scrollwheel,zoomControl:this.options.zoom,zoomControlOptions:{style:this.options.zoomStyle}};this.map=new google.maps.Map(document.id(this.element_map),g);this.map.setOptions({styles:this.options.styles});this.infoWindow=new google.maps.InfoWindow({content:""});this.bounds=new google.maps.LatLngBounds();this.addIcons();this.addOverlays();google.maps.event.addListener(this.map,"click",function(c){this.setCookies(c)}.bind(this));google.maps.event.addListener(this.map,"moveend",function(c){this.setCookies(c)}.bind(this));google.maps.event.addListener(this.map,"zoomend",function(c){this.setCookies(c)}.bind(this));if(this.options.use_cookies){var a=Cookie.read("mymapzoom_"+this.options.id);var f=Cookie.read("mymaplat_"+this.options.id);var b=Cookie.read("mymaplng_"+this.options.id);if(f&&f!=="0"&&a!=="0"){this.map.setCenter(new google.maps.LatLng(f.toFloat(),b.toFloat()),a.toInt())}else{this.center()}}else{this.center()}if(typeof(Slimbox)!=="undefined"){Slimbox.scanPage()}else{if(typeof(Mediabox)!=="undefined"){Mediabox.scanPage()}}this.container=document.id(this.options.container);if(typeOf(this.container)!=="null"){var h=this.container.getElement(".clearFilters");if(h){h.addEvent("click",function(c){this.container.getElements(".fabrik_filter").each(function(i){i.value=""});c.stop();this.container.getElement("form[name=filter]").submit()}.bind(this))}}this.setPolyLines()},setPolyLines:function(){this.polylines=[];this.polygons=[];this.options.polyline.each(function(j,g){var e=[];j.each(function(c){e.push(new google.maps.LatLng(c[0],c[1]))});var d=this.options.polylinewidth[g];var a=this.options.polylinecolour[g];var f=this.options.polygonopacity[g];var b=this.options.polygonfillcolour[g];if(!this.options.use_polygon){var i=new google.maps.Polyline({path:e,strokeColor:a,strokeWeight:d});i.setMap(this.map);this.polylines.push(i)}else{var h=new google.maps.Polygon({paths:e,strokeColor:a,strokeWeight:d,strokeOpacity:f,fillColor:b});h.setMap(this.map);this.polygons.push(h)}}.bind(this))},clearPolyLines:function(){this.polylines.each(function(a){a.setMap(null)});this.polygons.each(function(a){a.setMap(null)})},setCookies:function(){if(this.options.use_cookies){Cookie.write("mymapzoom_"+this.options.id,this.map.getZoom(),{duration:7});Cookie.write("mymaplat_"+this.options.id,this.map.getCenter().lat(),{duration:7});Cookie.write("mymaplng_"+this.options.id,this.map.getCenter().lng(),{duration:7})}},update:function(){this.updater.send()},clearIcons:function(){this.markers.each(function(a){a.setMap(null)})},addIcons:function(){this.markers=[];this.clusterMarkers=[];this.options.icons.each(function(f){this.bounds.extend(new google.maps.LatLng(f[0],f[1]));this.markers.push(this.addIcon(f[0],f[1],f[2],f[3],f[4],f[5],f.groupkey,f.title,f.radius,f.c))}.bind(this));this.renderGroupedSideBar();if(this.options.clustering){var e=[];var d=[53,56,66,78,90];var b=0;for(b=1;b<=5;++b){e.push({url:Fabrik.liveSite+"/components/com_fabrik/libs/googlemaps/markerclustererplus/images/m"+b+".png",height:d[b-1],width:d[b-1]})}var c=null;if(this.options.icon_increment!==""){c=parseInt(this.options.icon_increment,10);if(c>14){c=14}}var a=60;if(this.options.cluster_splits!==""){if(this.options.cluster_splits.test("/,/")){a=60}else{a=parseInt(this.options.cluster_splits,10)}}this.cluster=new MarkerClusterer(this.map,this.clusterMarkers,{splits:this.options.cluster_splits,icon_increment:this.options.icon_increment,maxZoom:c,gridSize:a,styles:e})}},center:function(){var b;switch(this.options.center){case"middle":b=this.bounds.getCenter();break;case"userslocation":if(geo_position_js.init()){geo_position_js.getCurrentPosition(this.geoCenter.bind(this),this.geoCenterErr.bind(this),{enableHighAccuracy:true})}else{fconsole("Geo locaiton functionality not available");b=this.bounds.getCenter()}break;case"querystring":b=new google.maps.LatLng(this.options.lat,this.options.lon);break;default:var a=this.options.icons.getLast();if(a){b=new google.maps.LatLng(a[0],a[1])}else{b=this.bounds.getCenter()}break}this.map.setCenter(b)},geoCenter:function(a){this.map.setCenter(new google.maps.LatLng(a.coords.latitude.toFixed(2),a.coords.longitude.toFixed(2)))},geoCenterErr:function(a){fconsole("geo location error="+a.message)},addIcon:function(k,b,g,e,n,f,o,l,i,j){var m=new google.maps.LatLng(k,b);var a={position:m,map:this.map};if(e!==""){a.flat=true;if(e.substr(0,7)!=="http://"&&e.substr(0,8)!=="https://"){a.icon=Fabrik.liveSite+"media/com_fabrik/images/"+e}else{a.icon=e}}a.title=l;var d=new google.maps.Marker(a);d.groupkey=o;google.maps.event.addListener(d,"click",function(){this.setCookies();this.infoWindow.setContent(g);this.infoWindow.open(this.map,d);this.periodCounter=0;this.timer=this.slimboxFunc.periodical(1000,this)}.bind(this));if(this.options.clustering){this.clusterMarkers.push(d);this.clusterMarkerCursor++}if(this.options.show_radius){this.addRadius(d,i,j)}this.periodCounter++;return d},addRadius:function(b,a,e){if(this.options.show_radius&&a>0){var d=new google.maps.Circle({map:this.map,radius:a,fillColor:this.options.radius_fill_colors[e]});d.bindTo("center",b,"position")}},slimboxFunc:function(){var a=$$("a").filter(function(b){return b.rel&&b.rel.test(/^lightbox/i)});if(a.length>0||this.periodCounter>15){clearInterval(this.timer);if(typeof(Slimbox)!=="undefined"){$$(a).slimbox({},null,function(b){return(this===b)||((this.rel.length>8)&&(this.rel===b.rel))})}else{if(typeof(Mediabox)!=="undefined"){$$(a).mediabox({},null,function(b){return(this===b)||((this.rel.length>8)&&(this.rel===b.rel))})}}}this.periodCounter++},toggleOverlay:function(b){if(b.target.id.test(/overlay_chbox_(\d+)/)){var a=b.target.id.match(/overlay_chbox_(\d+)/)[1].toInt();if(b.target.checked){this.options.overlays[a].setMap(this.map)}else{this.options.overlays[a].setMap(null)}}},addOverlays:function(){if(this.options.use_overlays){this.options.overlay_urls.each(function(b,a){this.options.overlays[a]=new google.maps.KmlLayer(b);this.options.overlays[a].setMap(this.map);this.options.overlay_events[a]=function(c){this.toggleOverlay(c)}.bind(this);if(typeOf(document.id("overlay_chbox_"+a))!=="null"){document.id("overlay_chbox_"+a).addEvent("click",this.options.overlay_events[a])}}.bind(this))}},watchSidebar:function(){if(this.options.use_overlays){$$(".fabrik_calendar_overlay_chbox").each(function(a){}.bind(this))}},renderGroupedSideBar:function(){if(!this.options.use_groups){return}this.grouped={};var a=document.id(this.options.container).getElement(".grouped_sidebar");if(typeOf(a)==="null"){return}this.options.icons.each(function(c){if(typeOf(this.grouped[c.groupkey])==="null"){this.grouped[c.groupkey]=[];var b=c.listid+c.groupkey.replace(/[^0-9a-zA-Z_]/g,"");b+=" "+c.groupClass;var d=new Element("div",{"class":"groupedContainer"+b}).adopt(new Element("a",{events:{click:function(g){var f=g.target.className.replace("groupedLink","groupedContent");f=f.split(" ")[0];document.getElements(".groupedContent").hide();document.getElements("."+f).show()}},href:"#","class":"groupedLink"+b}).set("text",c.groupkey));d.inject(a)}this.grouped[c.groupkey].push(c)}.bind(this));a.addEvent("click:relay(a)",function(d,c){d.preventDefault();this.infoWindow.close();document.id(this.options.container).getElement(".grouped_sidebar").getElements("a").removeClass("active");c.addClass("active");var b=c.get("text");this.toggledGroup=b;this.toggleGrouped()}.bind(this))},toggleGrouped:function(){this.markers.each(function(a){a.groupkey===this.toggledGroup?a.setVisible(true):a.setVisible(false);a.setAnimation(google.maps.Animation.BOUNCE);var b=function(){a.setAnimation(null)};b.delay(1500)}.bind(this))}});