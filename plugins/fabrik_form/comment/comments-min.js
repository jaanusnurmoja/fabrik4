/*! Fabrik */
define(["jquery","fab/fabrik"],function(a){"use strict";var b=new Class({Implements:[Events],options:{formid:0,rowid:0,label:"",wysiwyg:!1},initialize:function(b,c){this.element=document.id(b),"null"!==typeOf(this.element)&&(this.options=a.extend(this.options,c),this.fx={},this.fx.toggleForms=$H(),this.spinner=new Spinner("fabrik-comments",{message:"loading"}),this.ajax={},this.ajax.deleteComment=new Request({url:"",method:"get",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"comment",method:"deleteComment",g:"form",formid:this.options.formid,rowid:this.options.rowid},onComplete:function(a){this.deleteComplete(a)}.bind(this)}),this.ajax.updateComment=new Request({url:"",method:"post",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"comment",method:"updateComment",g:"form",formid:this.options.formid,rowid:this.options.rowid}}),this.watchReply(),this.watchInput())},ajaxComplete:function(a){a=JSON.decode(a);var b=20*a.depth.toInt()+"px",c="comment_"+a.id,d=new Element("li",{id:c,styles:{"margin-left":b}}).set("html",a.content);"li"===this.currentLi.get("tag")?d.inject(this.currentLi,"after"):d.inject(this.currentLi);var e=new Fx.Tween(d,{property:"opacity",duration:5e3});e.set(0),e.start(0,100),this.watchReply(),"null"!==typeOf(a.message)&&window.alert(a.message.title,a.message.message),this.spinner.hide(),this.watchInput(),this.updateThumbs()},watchInput:function(){this.ajax.addComment=new Request({url:"index.php",method:"get",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"comment",method:"addComment",g:"form",formid:this.options.formid,rowid:this.options.rowid,label:this.options.label},onSuccess:function(a){this.ajaxComplete(a)}.bind(this),onError:function(a,b){fconsole(a+": "+b),this.spinner.hide()}.bind(this),onFailure:function(a){window.alert(a.statusText),this.spinner.hide()}.bind(this)}),this.element.getElements(".replyform").each(function(a){var b=a.getElement("textarea");b&&(a.getElement("button.submit").addEvent("click",function(a){this.doInput(a)}.bind(this)),b.addEvent("click",function(a){this.testInput(a)}.bind(this)))}.bind(this))},testInput:function(a){a.target.get("value")===Joomla.JText._("PLG_FORM_COMMENT_TYPE_A_COMMENT_HERE")&&(a.target.value="")},updateThumbs:function(){"null"!==typeOf(this.thumbs)&&(this.thumbs.removeEvents(),this.thumbs.addEvents())},doInput:function(a){this.spinner.show();var b=a.target.getParent(".replyform");if("master-comment-form"===b.id){var c=this.element.getElement("ul").getElements("li");this.currentLi=c.length>0?c.pop():this.element.getElement("ul")}else this.currentLi=b.getParent("li");if("keydown"===a.type&&13!==a.keyCode.toInt())return void this.spinner.hide();this.options.wysiwyg&&"undefined"!=typeof tinyMCE&&tinyMCE.triggerSave();var d=b.getElement("textarea").get("value");if(a.stop(),""===d)return this.spinner.hide(),void alert(Joomla.JText._("PLG_FORM_COMMENT_PLEASE_ENTER_A_COMMENT_BEFORE_POSTING"));var e=b.getElement("input[name=name]");if(e){var f=e.get("value");if(""===f)return this.spinner.hide(),void alert(Joomla.JText._("PLG_FORM_COMMENT_PLEASE_ENTER_A_NAME_BEFORE_POSTING"));this.ajax.addComment.options.data.name=f}var g=b.getElements("input[name^=notify]").filter(function(a){return a.checked});this.ajax.addComment.options.data.notify=g.length>0?g[0].get("value"):"0";var h=b.getElement("input[name=email]");if(h){var i=h.get("value");if(""===i)return this.spinner.hide(),void window.alert(Joomla.JText._("PLG_FORM_COMMENT_ENTER_EMAIL_BEFORE_POSTNG"))}var j=b.getElement("input[name=reply_to]").get("value");if(""===j&&(j=0),b.getElement("input[name=email]")&&(this.ajax.addComment.options.data.email=b.getElement("input[name=email]").get("value")),this.ajax.addComment.options.data.renderOrder=b.getElement("input[name=renderOrder]").get("value"),b.getElement("select[name=rating]")&&(this.ajax.addComment.options.data.rating=b.getElement("select[name=rating]").get("value")),b.getElement("input[name^=anonymous]")){var k=b.getElements("input[name^=anonymous]").filter(function(a){return a.checked===!0});this.ajax.addComment.options.data.anonymous=k[0].get("value")}this.ajax.addComment.options.data.reply_to=j,this.ajax.addComment.options.data.comment=d,this.ajax.addComment.send(),b.getElement("textarea").value=""},saveComment:function(a){var b=a.getParent(".comment").id.replace("comment-","");this.ajax.updateComment.options.data.comment_id=b,this.ajax.updateComment.options.data.comment=a.get("text"),this.ajax.updateComment.send()},watchReply:function(){this.spinner.resize(),this.element.getElements(".replybutton").each(function(a){var b;a.removeEvents();var c=a.getParent().getParent().getNext();if("null"===typeOf(c)&&(c=a.getParent(".comment").getElement(".replyform")),"null"!==typeOf(c)){if(this.options.wysiwyg)b=c;else{var d=a.getParent(".comment").getParent("li");window.ie?b=new Fx.Slide(c,"opacity",{duration:5e3}):this.fx.toggleForms.has(d.id)?b=this.fx.toggleForms.get(d.id):(b=new Fx.Slide(c,"opacity",{duration:5e3}),this.fx.toggleForms.set(d.id,b))}b.hide(),a.addEvent("click",function(a){a.stop(),b.toggle()}.bind(this))}}.bind(this)),this.element.getElements(".del-comment").each(function(a){a.removeEvents(),a.addEvent("click",function(a){this.ajax.deleteComment.options.data.comment_id=a.target.getParent(".comment").id.replace("comment-",""),this.ajax.deleteComment.send(),this.updateThumbs(),a.stop()}.bind(this))}.bind(this)),this.options.admin&&this.element.getElements(".comment-content").each(function(a){a.removeEvents(),a.addEvent("click",function(b){a.inlineEdit({defaultval:"",type:"textarea",onComplete:function(a){this.saveComment(a)}.bind(this)});var c=b.target.getParent(),d=c.id.replace("comment-","");new Request({url:"",method:"get",data:{option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"comment",method:"getEmail",commentid:d,g:"form",formid:this.options.formid,rowid:this.options.rowid},onComplete:function(a){c.getElements(".info").dispose(),new Element("span",{"class":"info"}).set("html",a).inject(c)}.bind(this)}).send(),b.stop()}.bind(this))}.bind(this))},deleteComplete:function(a){var b=document.id("comment_"+a),c=new Fx.Morph(b,{duration:1e3,transition:Fx.Transitions.Quart.easeOut});c.start({opacity:0,height:0}).chain(function(){b.dispose()})}});return b});