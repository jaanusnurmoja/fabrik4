/*! Fabrik */

!function(){"object"!==typeOf(window.FabrikAdmin)&&(FabrikAdmin={},FabrikAdmin.model={fields:{fabriktable:{},element:{}}},FabrikAdmin.reTip=function(){$$(".hasTip").each(function(a){var b=a.get("title");if(b){var c=b.split("::",2);a.store("tip:title",c[0]),a.store("tip:text",c[1])}});new Tips($$(".hasTip"),{maxTitleChars:50,fixed:!1});"undefined"!=typeof jQuery&&(jQuery(".hasTooltip").tooltip({html:!0,container:"body"}),jQuery(document).popover({selector:".hasPopover",trigger:"hover"}))},window.fireEvent("fabrik.admin.namespace"))}(),"undefined"!=typeof jQuery&&function(a){a(document).on("click",".btn-group label:not(.active)",null,function(b){var c=a(this),d=a("#"+c.attr("for"));d.prop("checked")||(c.closest(".btn-group").find("label").removeClass("active btn-success btn-danger btn-primary"),""===d.val()?c.addClass("active btn-primary"):0===d.val().toInt()?c.addClass("active btn-danger"):c.addClass("active btn-success"),d.prop("checked",!0),d.trigger("change"))})}(jQuery);