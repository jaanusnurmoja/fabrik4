/*! Fabrik */

define(["jquery","fab/list-plugin","fab/fabrik"],function(o,t,a){return new Class({Extends:t,initialize:function(t){this.parent(t)},watchSubmit:function(){var n=o("#emailtable"),i=this;n.submit(function(t){"undefined"!=typeof WFEditor?WFEditor.getContent("message"):"undefined"!=typeof tinymce&&tinyMCE.activeEditor&&tinyMCE.activeEditor.save();var e=a.liveSite+"/index.php";""!==i.options.additionalQS&&(e+="?"+i.options.additionalQS),a.loader.start(n),o.ajax({type:"POST",url:e,data:new FormData(this),encode:!0,processData:!1,contentType:!1}).done(function(t){n.html(t),a.loader.stop(n)}),t.preventDefault()})},watchAttachments:function(){o(document.body).on("click",".addattachment",function(t){t.preventDefault();var e=o(this).closest(".attachment");e.clone().insertAfter(e)}),o(document.body).on("click",".delattachment",function(t){t.preventDefault(),1<o(".addattachment").length&&o(this).closest(".attachment").remove()})},watchAddEmail:function(){o("#email_add").on("click",function(t){t.preventDefault(),o("#email_to_selectfrom option:selected").each(function(t,e){o(e).appendTo(o("#list_email_to"))})}),o("#email_remove").on("click",function(t){t.preventDefault(),o("#list_email_to option:selected").each(function(t,e){o(e).appendTo(o("#email_to_selectfrom"))})})},buttonAction:function(){var e=this.options.popupUrl,t=this;this.listform.getElements("input[name^=ids]").each(function(t){!1!==t.get("value")&&!1!==t.checked&&(e+="&ids[]="+t.get("value"))}),this.listform.getElement("input[name=checkAll]").checked?e+="&checkAll=1":e+="&checkAll=0",e+="&task=popupwin";this.windowopts={id:"email-list-plugin",title:"Email",loadMethod:"xhr",contentURL:e,width:520,height:470,evalScripts:!0,minimizable:!1,collapsible:!0,onContentLoaded:function(){t.watchSubmit(),t.watchAttachments(),t.watchAddEmail(),this.fitToContent(!1)}},a.getWindow(this.windowopts)}})});