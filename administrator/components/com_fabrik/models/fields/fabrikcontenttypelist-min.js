/*! Fabrik */
"use strict";var FabrikContentTypeList=new Class({options:{},initialize:function(e){var t=this.showUpdate;t(jQuery("#"+e).val()),jQuery("#"+e).on("change",function(){t(jQuery(this).val())})},showUpdate:function(e){Fabrik.loader.start("contentTypeListPreview",Joomla.JText._("COM_FABRIK_LOADING")),jQuery.ajax({dataType:"text",url:"index.php",data:{option:"com_fabrik",task:"contenttype.preview",contentType:e}}).done(function(e){var t=e.indexOf('{"preview');0<t&&document.body.insertAdjacentHTML("beforeend",e.slice(0,t)),e=JSON.parse(e.slice(t)),Fabrik.loader.stop("contentTypeListPreview"),jQuery("#contentTypeListPreview").empty().html(e.preview),jQuery("#contentTypeListAclUi").empty().html(e.aclMap)})}});