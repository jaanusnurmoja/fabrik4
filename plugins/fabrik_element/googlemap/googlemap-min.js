function googlemapload(){window.addEvent("domready",function(){if(document.body){window.fireEvent("google.map.loaded")}else{console.log("no body")}})}var FbGoogleMap=new Class({Extends:FbElement,options:{lat:0,lat_dms:0,key:"",lon:0,lon_dms:0,zoomlevel:"13",control:"",maptypecontrol:false,overviewcontrol:false,scalecontrol:false,drag:false,maptype:"G_NORMAL_MAP",geocode:false,latlng:false,latlng_dms:false,staticmap:false,auto_center:false,scrollwheel:false,streetView:false,center:0,reverse_geocode:false},initialize:function(b,a){this.parent(b,a);if(this.options.center===1&&this.options.rowid===0){if(geo_position_js.init()){geo_position_js.getCurrentPosition(this.geoCenter.bind(this),this.geoCenterErr.bind(this),{enableHighAccuracy:true})}else{fconsole("Geo locaiton functionality not available")}}window.addEvent("google.map.loaded",function(){switch(this.options.maptype){case"G_SATELLITE_MAP":this.options.maptype=google.maps.MapTypeId.SATELLITE;break;case"G_HYBRID_MAP":this.options.maptype=google.maps.MapTypeId.HYBRID;break;case"TERRAIN":this.options.maptype=google.maps.MapTypeId.TERRAIN;break;default:case"G_NORMAL_MAP":this.options.maptype=google.maps.MapTypeId.ROADMAP;break}this.makeMap()}.bind(this))},getValue:function(){if($type(this.field)!==false){return this.field.getValue()}return false},makeMap:function(){if(typeOf(this.element)==="null"){return}if(typeof(this.map)!=="undefined"){return}if(this.options.geocode||this.options.reverse_geocode){this.geocoder=new google.maps.Geocoder()}this.field=this.element.getElement("input.fabrikinput");this.watchGeoCode();if(this.options.staticmap){var d=this.element.getElement("img");var c=d.getStyle("width").toInt();var e=d.getStyle("height").toInt()}if(!this.options.staticmap){var b=this.options.control===""?false:true;var j=this.options.control==="GSmallMapControl"?google.maps.ZoomControlStyle.SMALL:google.maps.ZoomControlStyle.LARGE;var g={center:new google.maps.LatLng(this.options.lat,this.options.lon),zoom:this.options.zoomlevel.toInt(),mapTypeId:this.options.maptype,scaleControl:this.options.scalecontrol,mapTypeControl:this.options.maptypecontrol,overviewMapControl:this.options.overviewcontrol,scrollwheel:this.options.scrollwheel,streetViewControl:this.options.streetView,zoomControl:true,zoomControlOptions:{style:j}};console.log(g);this.map=new google.maps.Map(document.id(this.element).getElement(".map"),g);var a=new google.maps.LatLng(this.options.lat,this.options.lon);var f={map:this.map,position:a};f.draggable=this.options.drag;if(this.options.latlng===true){document.id(this.element).getElement(".lat").addEvent("blur",this.updateFromLatLng.bindWithEvent(this));document.id(this.element).getElement(".lng").addEvent("blur",this.updateFromLatLng.bindWithEvent(this))}if(this.options.latlng_dms===true){document.id(this.element).getElement(".latdms").addEvent("blur",this.updateFromDMS.bindWithEvent(this));document.id(this.element).getElement(".lngdms").addEvent("blur",this.updateFromDMS.bindWithEvent(this))}this.marker=new google.maps.Marker(f);if(this.options.latlng===true){document.id(this.element.id).getElement(".lat").value=this.marker.getPosition().lat()+"° N";document.id(this.element.id).getElement(".lng").value=this.marker.getPosition().lng()+"° E"}if(this.options.latlng_dms===true){document.id(this.element.id).getElement(".latdms").value=this.latDecToDMS();document.id(this.element.id).getElement(".lngdms").value=this.lngDecToDMS()}google.maps.event.addListener(this.marker,"dragend",function(){this.field.value=this.marker.getPosition()+":"+this.map.getZoom();if(this.options.latlng===true){document.id(this.element).getElement(".lat").value=this.marker.getPosition().lat()+"° N";document.id(this.element).getElement(".lng").value=this.marker.getPosition().lng()+"° E"}if(this.options.latlng_dms===true){document.id(this.element).getElement(".latdms").value=this.latDecToDMS();document.id(this.element).getElement(".lngdms").value=this.lngDecToDMS()}if(this.options.reverse_geocode){this.geocoder.geocode({latLng:this.marker.getPosition()},function(i,h){if(h===google.maps.GeocoderStatus.OK){if(i[0]){i[0].address_components.each(function(k){k.types.each(function(l){if(l==="street_number"){if(this.options.reverse_geocode_fields.route){$(this.options.reverse_geocode_fields.route).value=k.long_name+" "}}else{if(l==="route"){if(this.options.reverse_geocode_fields.route){$(this.options.reverse_geocode_fields.route).value+=k.long_name}}else{if(l==="street_address"){if(this.options.reverse_geocode_fields.route){$(this.options.reverse_geocode_fields.route).value=k.long_name}}else{if(l==="neighborhood"){if(this.options.reverse_geocode_fields.neighborhood){$(this.options.reverse_geocode_fields.neighborhood).value=k.long_name}}else{if(l==="locality"){if(this.options.reverse_geocode_fields.city){$(this.options.reverse_geocode_fields.locality).value=k.long_name}}else{if(l==="administrative_area_level_1"){if(this.options.reverse_geocode_fields.state){$(this.options.reverse_geocode_fields.state).value=k.long_name}}else{if(l==="postal_code"){if(this.options.reverse_geocode_fields.zip){$(this.options.reverse_geocode_fields.zip).value=k.long_name}}else{if(l==="country"){if(this.options.reverse_geocode_fields.country){$(this.options.reverse_geocode_fields.country).value=k.long_name}}}}}}}}}}.bind(this))}.bind(this))}else{alert("No results found")}}else{alert("Geocoder failed due to: "+h)}}.bind(this))}}.bind(this));google.maps.event.addListener(this.map,"zoom_changed",function(i,h){this.field.value=this.marker.getPosition()+":"+this.map.getZoom()}.bind(this));if(this.options.auto_center&&this.options.editable){google.maps.event.addListener(this.map,"dragend",function(){this.marker.setPosition(this.map.getCenter());this.field.value=this.marker.getPosition()+":"+this.map.getZoom();if(this.options.latlng===true){document.id(this.element).getElement(".lat").value=this.marker.getPosition().lat()+"° N";document.id(this.element).getElement(".lng").value=this.marker.getPosition().lng()+"° E"}if(this.options.latlng_dms===true){document.id(this.element).getElement(".latdms").value=this.latDecToDMS();document.id(this.element).getElement(".lngdms").value=this.lngDecToDMS()}}.bind(this))}}this.watchTab()},updateFromLatLng:function(){var c=document.id(this.element.id).getElement(".lat").get("value").replace("° N","").toFloat();var a=document.id(this.element.id).getElement(".lng").get("value").replace("° E","").toFloat();var b=new google.maps.LatLng(c,a);this.marker.setPosition(b);this.map.setCenter(b,this.map.getZoom());this.field.value=this.marker.getPosition()+":"+this.map.getZoom();document.id(this.element).getElement(".latdms").value=this.latDecToDMS();document.id(this.element).getElement(".lngdms").value=this.lngDecToDMS()},updateFromDMS:function(){var d=document.id(this.element.id).getElement(".latdms").get("value").replace("S","-");d=d.replace("N","");var g=document.id(this.element.id).getElement(".lngdms").get("value").replace("W","-");g=g.replace("E","");var h=d.split("°");var m=h[0];var b=h[1].split("'");var l=b[0].toFloat()*60;var c=(l+b[1].replace('"',"").toFloat())/3600;m=Math.abs(m.toFloat())+c.toFloat();if(h[0].toString().indexOf("-")!==-1){m=-m}var e=g.toString().split("°");var f=e[0];var j=e[1].split("'");var k=Math.abs(j[0].toFloat())*60;var i=(k+Math.abs(j[1].replace('"',"").toFloat()))/3600;f=Math.abs(f.toFloat())+i.toFloat();if(e[0].toString().indexOf("-")!==-1){f=-f}var a=new google.maps.LatLng(m.toFloat(),f.toFloat());this.marker.setPosition(a);this.map.setCenter(a,this.map.getZoom());this.field.value=this.marker.getPosition()+":"+this.map.getZoom();document.id(this.element).getElement(".lat").value=m+"° N";document.id(this.element).getElement(".lng").value=f+"° E"},latDecToDMS:function(){var d=this.marker.getPosition().lat();var e=parseInt(Math.abs(d),10);var b=60*(Math.abs(d).toFloat()-e.toFloat());var g=parseInt(b,10);var f=60*(b.toFloat()-g.toFloat());var a=f.toFloat();if(a===60){g=g.toFloat()+1;a=0}if(g===60){e=e.toFloat()+1;g=0}var c="N";if(d.toString().indexOf("-")!==-1){c="S"}else{c="N"}return c+e+"°"+g+"'"+a+'"'},lngDecToDMS:function(){var c=this.marker.getPosition().lng();var f=parseInt(Math.abs(c),10);var g=60*(Math.abs(c).toFloat()-f.toFloat());var a=parseInt(g,10);var e=60*(g.toFloat()-a.toFloat());var d=e.toFloat();if(d===60){a.value=a.toFloat()+1;d.value=0}if(a===60){f.value=f.toFloat()+1;a.value=0}var b="";if(c.toString().indexOf("-")!==-1){b="W"}else{b="E"}return b+f+"°"+a+"'"+d+'"'},geoCode:function(b){var a="";if(this.options.geocode==="2"){this.options.geocode_fields.each(function(c){a+=document.id(c).value+","});a=a.slice(0,-1)}else{a=document.id(this.element.id).getElement(".geocode_input").value}this.geocoder.geocode({address:a},function(d,c){if(c!==google.maps.GeocoderStatus.OK||d.length===0){fconsole(a+" not found!")}else{this.marker.setPosition(d[0].geometry.location);this.map.setCenter(d[0].geometry.location,this.map.getZoom());this.field.value=d[0].geometry.location+":"+this.map.getZoom();if(this.options.latlng===true){document.id(this.element.id).getElement(".lat").value=d[0].geometry.location.lat()+"° N";document.id(this.element.id).getElement(".lng").value=d[0].geometry.location.lng()+"° E"}if(this.options.latlng_dms===true){document.id(this.element.id).getElement(".latdms").value=this.latDecToDMS();document.id(this.element.id).getElement(".lngdms").value=this.lngDecToDMS()}}}.bind(this))},watchGeoCode:function(){if(!this.options.geocode||!this.options.editable){return false}if(this.options.geocode==="2"){if(this.options.geocode_event!=="button"){this.options.geocode_fields.each(function(a){if(typeOf(document.id(a))!=="null"){document.id(a).addEvent("keyup",this.geoCode.bindWithEvent(this))}}.bind(this))}else{if(this.options.geocode_event==="button"){document.id(this.element).getElement(".geocode").addEvent("click",this.geoCode.bindWithEvent(this))}}}if(this.options.geocode==="1"&&document.id(this.element).getElement(".geocode_input")){if(this.options.geocode_event==="button"){document.id(this.element.id).getElement(".geocode").addEvent("click",this.geoCode.bindWithEvent(this))}else{document.id(this.element.id).getElement(".geocode_input").addEvent("keyup",this.geoCode.bindWithEvent(this))}}},unclonableProperties:function(){return["form","marker","map","maptype"]},cloned:function(b){var a=[];this.options.geocode_fields.each(function(e){var d=$A(e.split("_"));var c=d.getLast();if(c!==c.toInt()){return d.join("_")}c++;d.splice(d.length-1,1,c);a.push(d.join("_"))});this.options.geocode_fields=a;this.makeMap()},update:function(b){b=b.split(":");if(b.length<2){b[1]=this.options.zoomlevel}var c=b[1].toInt();this.map.setZoom(c);b[0]=b[0].replace("(","");b[0]=b[0].replace(")","");var a=b[0].split(",");if(a.length<2){a[0]=this.options.lat;a[1]=this.options.lon}var d=new google.maps.LatLng(a[0],a[1]);this.marker.setPosition(d);this.map.setCenter(d,this.map.getZoom())},geoCenter:function(b){var a=new google.maps.LatLng(b.coords.latitude,b.coords.longitude);this.marker.setPosition(a);this.map.setCenter(a)},geoCenterErr:function(a){fconsole("geo location error="+a.message)},doTab:function(a){(function(){google.maps.event.trigger(this.map,"resize");var b=new google.maps.LatLng(this.options.lat,this.options.lon);this.map.setCenter(b);this.map.setZoom(this.map.getZoom());this.options.tab_dt.removeEvent("click",this.doTabBound)}.bind(this)).delay(500)},watchTab:function(){var a=this.element.getParent(".tabs");if(a){this.options.tab_dt=this.element.getParent(".fabrikGroup").getPrevious();if(!this.options.tab_dt.hasClass("open")){this.doTabBound=this.doTab.bindWithEvent(this);this.options.tab_dt.addEvent("click",this.doTabBound)}}}});