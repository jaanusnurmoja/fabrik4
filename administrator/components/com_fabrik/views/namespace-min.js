(function(){if(typeOf(window.FabrikAdmin)==="object"){return}FabrikAdmin={};FabrikAdmin.model={fields:{fabriktable:{},element:{}}};FabrikAdmin.reTip=function(){$$(".hasTip").each(function(b){var d=b.get("title");if(d){var c=d.split("::",2);b.store("tip:title",c[0]);b.store("tip:text",c[1])}});var a=new Tips($$(".hasTip"),{maxTitleChars:50,fixed:false})};window.fireEvent("fabrik.admin.namespace")}());if(typeof(jQuery)!=="undefined"){(function(a){a(document).on("click",".btn-group label:not(.active)",null,function(d){var c=a(this);var b=a("#"+c.attr("for"));if(!b.prop("checked")){c.closest(".btn-group").find("label").removeClass("active btn-success btn-danger btn-primary");if(b.val()===""){c.addClass("active btn-primary")}else{if(b.val().toInt()===0){c.addClass("active btn-danger")}else{c.addClass("active btn-success")}}b.prop("checked",true)}})})(jQuery)};