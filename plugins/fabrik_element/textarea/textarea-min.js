/*! Fabrik */

define(["jquery","fab/element"],function(t,e){return window.FbTextarea=new Class({Extends:e,initialize:function(t,e){this.setPlugin("fabriktextarea"),this.parent(t,e),this.periodFn=function(){this.getTextContainer(),"undefined"!=typeof tinyMCE?!1!==this.container&&(clearInterval(n),this.watchTextContainer()):(clearInterval(n),this.watchTextContainer())};var n=this.periodFn.periodical(200,this);Fabrik.addEvent("fabrik.form.page.change.end",function(t){this.refreshEditor()}.bind(this)),Fabrik.addEvent("fabrik.form.submit.start",function(t){this.options.wysiwyg&&t.options.ajax&&"undefined"!=typeof tinyMCE&&tinyMCE.triggerSave()}.bind(this))},unclonableProperties:function(){var t=this.parent();return t.push("container"),t},cloneUpdateIds:function(t){this.element=document.id(t),this.options.element=t,this.options.htmlId=t},watchTextContainer:function(){if("null"===typeOf(this.element)&&(this.element=document.id(this.options.element)),("null"!==typeOf(this.element)||(this.element=document.id(this.options.htmlId),"null"!==typeOf(this.element)))&&!0===this.options.editable){var t=this.getContainer();if(!1===t)return void fconsole("no fabrikElementContainer class found for textarea");var e=t.getElement(".fabrik_characters_left");if("null"!==typeOf(e))if(this.warningFX=new Fx.Morph(e,{duration:1e3,transition:Fx.Transitions.Quart.easeOut}),this.origCol=e.getStyle("color"),this.options.wysiwyg&&"undefined"!=typeof tinymce)if(4<=tinymce.majorVersion){var n=this._getTinyInstance();n.on("keyup",function(t){this.informKeyPress(t)}.bind(this)),n.on("focus",function(t){var e=this.element.getParent(".fabrikElementContainer");e.getElement("span.badge").addClass("badge-info"),e.getElement(".fabrik_characters_left").removeClass("muted")}.bind(this)),n.on("blur",function(t){var e=this.element.getParent(".fabrikElementContainer");e.getElement("span.badge").removeClass("badge-info"),e.getElement(".fabrik_characters_left").addClass("muted")}.bind(this)),n.on("blur",function(t){this.forwardEvent("blur")}.bind(this))}else tinymce.dom.Event.add(this.container,"keyup",function(t){this.informKeyPress(t)}.bind(this)),tinymce.dom.Event.add(this.container,"blur",function(t){this.forwardEvent("blur")}.bind(this));else"null"!==typeOf(this.container)&&(this.container.addEvent("keydown",function(t){this.informKeyPress(t)}.bind(this)),this.container.addEvent("blur",function(t){this.blurCharsLeft(t)}.bind(this)),this.container.addEvent("focus",function(t){this.focusCharsLeft(t)}.bind(this)))}},forwardEvent:function(t){var e=tinyMCE.activeEditor.getElement(),n=this.getContent();e.set("value",n),e.fireEvent("blur",new Event.Mock(e,t))},focusCharsLeft:function(){var t=this.element.getParent(".fabrikElementContainer");t.getElement("span.badge").addClass("badge-info"),t.getElement(".fabrik_characters_left").removeClass("muted")},blurCharsLeft:function(){var t=this.element.getParent(".fabrikElementContainer");t.getElement("span.badge").removeClass("badge-info"),t.getElement(".fabrik_characters_left").addClass("muted")},getCloneName:function(){return this.options.wysiwyg&&this.options.isGroupJoin?this.options.htmlId:this.options.element},cloned:function(t){if(this.options.wysiwyg){var e=this.element.getParent(".fabrikElement"),n=e.getElement("textarea").clone(!0,!0),i=e.getElement(".fabrik_characters_left");e.empty(),e.adopt(n),"null"!==typeOf(i)&&e.adopt(i.clone()),n.removeClass("mce_editable"),n.setStyle("display",""),this.element=n;var o=this.options.isGroupJoin?this.options.htmlId:this.options.element;this._addTinyEditor(o)}this.getTextContainer(),this.watchTextContainer(),this.parent(t)},decloned:function(t){if(this.options.wysiwyg){var e=this.options.isGroupJoin?this.options.htmlId:this.options.element;tinyMCE.execCommand("mceFocus",!1,e),this._removeTinyEditor(e)}this.parent(t)},getTextContainer:function(){if(this.options.wysiwyg&&this.options.editable){var t=this.options.isGroupJoin?this.options.htmlId:this.options.element;document.id(t).addClass("fabrikinput");var e="undefined"!=typeof tinyMCE&&tinyMCE.get(t);e?this.container=e.getDoc():this.contaner=!1}else this.element=document.id(this.options.element),this.container=this.element;return this.container},getContent:function(){return this.options.wysiwyg?tinyMCE.activeEditor.getContent().replace(/<\/?[^>]+(>|$)/g,""):this.container.value},refreshEditor:function(){this.options.wysiwyg&&("undefined"!=typeof WFEditor?WFEditor.init(WFEditor.settings):"undefined"!=typeof tinymce&&tinyMCE.init(tinymce.settings),this.watchTextContainer())},_getTinyInstance:function(){return 4<=tinyMCE.majorVersion.toInt()?tinyMCE.get(this.element.id):tinyMCE.getInstanceById(this.element.id)},_addTinyEditor:function(t){4<=tinyMCE.majorVersion.toInt()?tinyMCE.execCommand("mceAddEditor",!1,t):tinyMCE.execCommand("mceAddControl",!1,t)},_removeTinyEditor:function(t){4<=tinyMCE.majorVersion.toInt()?tinyMCE.execCommand("mceRemoveEditor",!1,t):tinyMCE.execCommand("mceRemoveControl",!1,t)},setContent:function(t){if(this.options.wysiwyg){var e=this._getTinyInstance().setContent(t);return this.moveCursorToEnd(),e}return this.getTextContainer(),"null"!==typeOf(this.container)&&(this.container.value=t),null},moveCursorToEnd:function(){var t=this._getTinyInstance();t.selection.select(t.getBody(),!0),t.selection.collapse(!1)},informKeyPress:function(){var t=this.getContainer().getElement(".fabrik_characters_left"),e=(this.getContent(),this.itemsLeft());this.limitReached()?(this.limitContent(),this.warningFX.start({opacity:0,color:"#FF0000"}).chain(function(){this.start({opacity:1,color:"#FF0000"}).chain(function(){this.start({opacity:0,color:this.origCol}).chain(function(){this.start({opacity:1})})})})):t.setStyle("color",this.origCol),t.getElement("span").set("html",e)},itemsLeft:function(){var t=0,e=this.getContent();return(t="word"===this.options.maxType?this.options.max-e.split(" ").length:this.options.max-(e.length+1))<0&&(t=0),t},limitContent:function(){var t,e=this.getContent();"word"===this.options.maxType?(t=(t=e.split(" ").splice(0,this.options.max)).join(" "),t+=this.options.wysiwyg?"&nbsp;":" "):t=e.substring(0,this.options.max),this.setContent(t)},limitReached:function(){var t=this.getContent();return"word"!==this.options.maxType?this.options.max-(t.length+1)<0:t.split(" ").length>this.options.max},reset:function(){this.update(this.options.defaultVal)},update:function(t){this.getElement(),this.getTextContainer(),this.options.editable?this.setContent(t):this.element.set("html",t)}}),window.FbTextarea});