/*! Fabrik */

define(["jquery"],function(n){return new Class({Binds:[],Implements:[Options],options:{collapseOthers:!1,startCollapsed:!1,bootstrap:!1},initialize:function(t,e){var o,s,i,a;"null"!==typeOf(t)&&(this.setOptions(e),this.container=t,this.toggleState="shown",this.options.startCollapsed&&this.options.isGrouped&&this.collapse(),t.addEvent("click:relay(.fabrik_groupheading a.toggle)",function(t){if(!t.rightClick)return t.stop(),t.preventDefault(),this.options.collapseOthers&&this.collapse(),s=t.target.getParent(".fabrik_groupheading"),i=this.options.bootstrap?s.getElement('*[data-role="toggle"]'):s.getElement("img"),a=i.retrieve("showgroup",!0),o=s.getNext()&&s.getNext().hasClass("fabrik_groupdata")?s.getNext():s.getParent().getNext(),a?n(o).hide():n(o).show(),a?n(s).find(".groupExtra").hide():n(s).find(".groupExtra").show(),this.setIcon(i,a),a=!a,i.store("showgroup",a),!1}.bind(this)))},setIcon:function(t,e){if(this.options.bootstrap){var o=t.get("data-expand-icon"),s=t.get("data-collapse-icon");e?(t.removeClass(o),t.addClass(s)):(t.addClass(o),t.removeClass(s))}else t.src=e?t.src.replace("orderasc","orderneutral"):t.src.replace("orderneutral","orderasc")},collapse:function(){n(this.container.getElements(".fabrik_groupdata")).hide(),n(this.container.getElements(".groupExtra")).hide();var t=this.options.bootstrap?'*[data-role="toggle"]':"img",e=this.container.getElements(".fabrik_groupheading a "+t);0===e.length&&(e=this.container.getElements(".fabrik_groupheading "+t)),e.each(function(t){t.store("showgroup",!1),this.setIcon(t,!0)}.bind(this))},expand:function(){n(this.container.getElements(".fabrik_groupdata")).show(),n(this.container.getElements(".groupExtra")).show();var t=this.options.bootstrap?'*[data-role="toggle"]':"img",e=this.container.getElements(".fabrik_groupheading a "+t);0===e.length&&(e=this.container.getElements(".fabrik_groupheading "+t)),e.each(function(t){t.store("showgroup",!0),this.setIcon(t,!1)}.bind(this))},toggle:function(){"shown"===this.toggleState?this.collapse():this.expand(),this.toggleState="shown"===this.toggleState?"hidden":"shown"}})});