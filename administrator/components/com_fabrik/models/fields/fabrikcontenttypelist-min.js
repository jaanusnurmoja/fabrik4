/*! Fabrik */

"use strict";var FabrikContentTypeList=new Class({options:{},initialize:function(a){var b=this.showUpdate;b(jQuery("#"+a).val()),jQuery("#"+a).on("change",function(){b(jQuery(this).val())})},showUpdate:function(a){Fabrik.loader.start("contentTypeListPreview",Joomla.JText._("COM_FABRIK_LOADING")),jQuery.ajax({dataType:"json",url:"index.php",data:{option:"com_fabrik",task:"contenttype.preview",contentType:a}}).done(function(a){Fabrik.loader.stop("contentTypeListPreview"),jQuery("#contentTypeListPreview").empty().html(a.preview),jQuery("#contentTypeListAclUi").empty().html(a.aclMap)})}});