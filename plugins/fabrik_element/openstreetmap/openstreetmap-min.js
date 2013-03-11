var FbOpenStreetMap=new Class({Extends:FbElement,options:{lat:0,lon:0,zoomlevel:"13",drag:0},initialize:function(e,c){this.parent(e,c);this.element_map=e+"_map";OpenLayers.IMAGE_RELOAD_ATTEMPTS=3;OpenLayers.Util.onImageLoadErrorColor="transparent";var f={};this.map=new OpenLayers.Map(this.element_map,f);switch(this.options.defaultLayer){case"openlayers":this.openLayers();break;case"yahoo":this.yahoo();break;case"google":this.google();break;case"virtualearth":this.virtualEarth();break}if(this.options.defaultLayer!=="openlayers"){this.openLayers()}if(this.options.layers.google===1&&this.options.defaultLayer!=="google"){this.google()}if(this.options.layers.virtualEarth===1&&this.options.defaultLayer!=="virtualearth"){this.virtualEarth()}if(this.options.layers.yahoo===1&&this.options.defaultLayer!=="yahoo"){this.yahoo()}var b=this.getLonLat(this.options.lon,this.options.lat);this.map.setCenter(b,this.options.zoomlevel.toInt());this.addMarker();this.map.addControl(new OpenLayers.Control.LayerSwitcher());var a={drag:new OpenLayers.Control.DragMarker(this.markers,{onComplete:function(g){this.dragComplete(g)}.bind(this)})};for(var d in a){this.map.addControl(a[d])}if(this.options.editable===true){a.drag.activate();this.map.addControl(new OpenLayers.Control.MousePosition())}},dragComplete:function(b){var a=b.lonlat;var c=a.toShortString()+":"+this.map.getZoom();this.element.value=c},getLonLat:function(c,b){var a=new OpenLayers.LonLat(parseFloat(c),parseFloat(b));return a},addMarker:function(){this.markers=new OpenLayers.Layer.Markers("");this.map.addLayer(this.markers);var a=this.getLonLat(this.options.lon,this.options.lat);var c=new OpenLayers.Size(20,34);var e=new OpenLayers.Pixel(-(c.w/2),-c.h);var d=new OpenLayers.Icon("http://boston.openguides.org/markers/AQUA.png",c,e);var b=new OpenLayers.Marker(a,d);this.markers.addMarker(b)},openLayers:function(){layerTilesAtHome=new OpenLayers.Layer.OSM.Osmarender("Open streetmap");this.map.addLayer(layerTilesAtHome)},yahoo:function(){var a=[];a.push(new OpenLayers.Layer.Yahoo("Yahoo",{}));a.push(new OpenLayers.Layer.Yahoo("Yahoo Satellite",{type:YAHOO_MAP_SAT}));a.push(new OpenLayers.Layer.Yahoo("Yahoo Hybrid",{type:YAHOO_MAP_HYB}));this.map.addLayers(a)},google:function(){var a=[];a.push(new OpenLayers.Layer.Google("Google Streets",{}));a.push(new OpenLayers.Layer.Google("Google Satellite",{type:G_SATELLITE_MAP}));a.push(new OpenLayers.Layer.Google("Google Hybrid",{type:G_HYBRID_MAP}));this.map.addLayers(a)},virtualEarth:function(){var a=[];a.push(new OpenLayers.Layer.VirtualEarth("Virtual Earth Roads",{type:VEMapStyle.Road}));a.push(new OpenLayers.Layer.VirtualEarth("Virtual Earth Aerial",{type:VEMapStyle.Aerial}));a.push(new OpenLayers.Layer.VirtualEarth("Virtual Earth Hybrid",{type:VEMapStyle.Hybrid}));this.map.addLayers(a)}});